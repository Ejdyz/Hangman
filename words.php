<!DOCTYPE html>
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
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./sites/game.php">Game</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item pull-right">
                        <a class="btn btn-outline-success me-2" type="button" href="./sites/register.php">Register</a>
                        <a class="btn btn-sm btn-outline-secondary" type="button" href="./sites/login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container">
		<h1>Edit Words</h1>
		<div class="row">
			<div class="col-md-6">
				<form id="add-word-form">
					<div class="form-group">
						<label for="word" style="margin-bottom: 10px;">New Word</label>
						<input type="text" class="form-control" id="word" name="word">
					</div>
                    <button type="button" class="btn btn-primary" onclick="addWord()" style="display:inline">Add Word</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table class="table">
					<thead>
						<tr>
							<th>Word</th>
							<th class="text-center" style="width: 10%;">Delete</th>
						</tr>
					</thead>
					<tbody>
						<?php
							// Connect to database
							$conn = mysqli_connect("localhost", "root", "", "wea");

							// Check connection
							if (!$conn) {
								die("Connection failed: " . mysqli_connect_error());
							}

							// Query for words
							$sql = "SELECT * FROM words";
							$result = mysqli_query($conn, $sql);

							// Loop through words and create table rows
							if (mysqli_num_rows($result) > 0) {
								while($row = mysqli_fetch_assoc($result)) {
									echo "<tr>";
									echo "<td>" . $row["word"] . "</td>";
									echo "<td><button class='btn btn-danger btn-sm delete-word' onclick='removeWord(this.parentNode.parentNode.firstChild.innerHTML)'>Delete</button></td>";
									echo "</tr>";
								}
							} else {
								echo "<tr><td colspan='2'>No words found.</td></tr>";
							}

							// Close database connection
							mysqli_close($conn);
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
    <script>
        const word = document.getElementById("word");
        function addWord(){
            axios({
                method: "post",
                url: "api/words/add.php",
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
                url: "api/words/remove.php",
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