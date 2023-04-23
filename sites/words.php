<?php

session_start();
if (!isset($_SESSION["user_id"])) {
    header("HTTP/1.1 401 Unauthorized");
    echo "You need to be logged in";
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "wea");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql_count = "SELECT COUNT(*) as count FROM words";
$result_count = mysqli_query($conn, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count["count"];

$midpoint = ceil($count / 2);

$sql_first_half = "SELECT * FROM words LIMIT $midpoint";
$result_first_half = mysqli_query($conn, $sql_first_half);

$sql_second_half = "SELECT * FROM words LIMIT $midpoint, $count";
$result_second_half = mysqli_query($conn, $sql_second_half);
?><!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<!-- data-bs-theme="light" for light mode -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <title>Home</title>
</head>

<body>


    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                Hangman
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="game.php">Game</a>
                    </li>

                    <?php if (isset($_SESSION["user"])) { ?>
                        <li class="nav-item">
                            <a class="nav-link active" href="./words.php">Words</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./stats.php">Statistics</a>
                        </li>

                <?php } ?>
                </ul>
                <?php if (isset($_SESSION["user"])) { ?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item pull-right">
                            <a class="btn btn-outline-success me-2 disabled" type="button" href="./register.php"><?php echo $_SESSION["user"]  ?></a>
                            <a href="../utils/logout.php"class="btn btn-outline-danger">Logout</a>
                        </li>
                    </ul>
                <?php } else { ?>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item pull-right">
                        <a class="btn btn-outline-success me-2" type="button" href="./sites/register.php">Register</a>
                        <a class="btn btn-sm btn-outline-secondary" type="button" href="./sites/login.php">Login</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </nav>


    <div class="container" style="margin-top: 30px;">
		<!-- <h1>Edit Words</h1> -->
		<div class="row" style="margin-bottom: 30px;">
			<div class="col-md-6">
				<form id="add-word-form">
					<div class="form-group">
						<label for="word" style="margin-bottom: 10px;">New Word</label><br>
						<input type="text" class="form-control"  style="display:inline;width:80%;vertical-align:middle;" id="word" name="word">
                        <button type="button" class="btn btn-primary"onclick="addWord()" style="display:inline-block;vertical-align:middle;">Add Word</button>

					</div>
				</form>
			</div>
		</div>
		<div class="row" style="padding-top: 20px; border-top: 1px solid gray;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-6">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Word</th>
								<th class="text-center" style="width: 10%;">Delete</th>
							</tr>
						</thead>
						<tbody>
                        <?php if (mysqli_num_rows($result_first_half) > 0) {
                            while (
                                $row = mysqli_fetch_assoc($result_first_half)
                            ) {
                                echo "<tr>";
                                echo "<td>" . $row["word"] . "</td>";
                                echo "<td><button class='btn btn-danger btn-sm delete-word' onclick='removeWord(this.parentNode.parentNode.firstChild.innerHTML)'>Delete</button></td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='2'>No words found.</td></tr>";
                        } ?>
						</tbody>
					</table>
				</div>
				<div class="col-md-6" style="border-left: 1px solid gray;">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Word</th>
								<th class="text-center" style="width: 10%;">Delete</th>
							</tr>
						</thead>
						<tbody>
                        <?php
                        $current_row = $midpoint;
                        if (mysqli_num_rows($result_second_half) > 0) {
                            while (
                                $row = mysqli_fetch_assoc($result_second_half)
                            ) {
                                $current_row++;
                                echo "<tr>";
                                echo "<td>" . $row["word"] . "</td>";
                                echo "<td><button class='btn btn-danger btn-sm delete-word' onclick='removeWord(this.parentNode.parentNode.firstChild.innerHTML)'>Delete</button></td>";
                                echo "</tr>";
                            }

                            if ($count % 2 != 0 && $current_row == $count) {
                                echo "<tr><td colspan='2' style = 'height: 47px'></td></tr> ";
                            }
                        } else {
                            echo "<tr><td colspan='2'>No words found.</td></tr>";
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>  
        </div>
    </div>
		</div>
	</div>
    <script>
        const word = document.getElementById("word");
        function addWord(){
            axios({
                method: "post",
                url: "../api/words/add.php",
                headers: { "Content-Type": "multipart/form-data" },
                data: {
                    word: word.value
                }
            }).then((response) => {
                // alert(response.data)
                location.reload()
            })
        }

        function removeWord(remWord) {
            axios({
                method: "post",
                url: "../api/words/remove.php",
                headers: { "Content-Type": "multipart/form-data" },
                data: {
                    word: remWord
                }
            }).then((response) => {
                // alert(response.data.message)
                location.reload()
            })
        }
    </script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>