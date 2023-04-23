<?php
  session_start();
$conn = mysqli_connect("localhost", "root", "", "wea");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql_count = "SELECT COUNT(*) as count FROM words";
$result_count = mysqli_query($conn, $sql_count);
$row_count = mysqli_fetch_assoc($result_count);
$count = $row_count['count'];

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

    <title>Statistics</title>
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

                    <?php if (isset($_SESSION["user"])){?>
                        <li class="nav-item">
                            <a class="nav-link" href="./words.php">Words</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="./stats.php">Statistics</a>
                        </li>

                <?php } ?>
                </ul>
                <?php if (isset($_SESSION["user"])){?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item pull-right">
                            <a class="btn btn-outline-success me-2 disabled" type="button" href="./sites/register.php"><?php echo $_SESSION["user"]  ?></a>
                        </li>
                    </ul>
                <?php }else{?>

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
			<div class="col-md-12">
				<form id="add-word-form">
					<div class="form-group">
						<h5>Win rate: 50%</h5>
            <h5>number of games: 80</h5>
            <h5>number of lost games: 40</h5>
            <h5>number of win games: 40</h5>
					</div>
				</form>
			</div>
		</div>
		<div class="row" style="padding-top: 20px; border-top: 1px solid gray;">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered text-center">
						<thead>
							<tr>
								<th style="width: 15%;">game id</th>
                <th style="width: 70%;">Word</th>
                <th style="width: 15%;">Win/lose</th>
							</tr>
						</thead>
						<tbody>
              <tr>
                <td>1</td>
                <td>Slovicko</td>
                <td>False</td>
              </tr>
						</tbody>
					</table>
				</div>
				
    </div>
		</div>
	</div>
</body>

</html>