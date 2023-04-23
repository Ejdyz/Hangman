<?php 
    session_start();
    //$_SESSION["user"] = "ejdy";
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<!-- data-bs-theme="light" for light mode -->

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    
    <link rel="stylesheet" href="styles/home-page-style.css">


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

    <!-- BODY of page  -->
    <div class="body">
        <h1>Welcome to Hangman</h1>
        <hr>

        <br>
        <h4>Welcome to our hangman game, created as part of our school project and graduation question! Our names are Jan and Vladimir, and we've worked hard to bring you this fun and challenging game.</h4>
        <br>
        <h4>Our hangman game is written in PHP and JavaScript, making it a dynamic and interactive experience. To play, simply click on the buttons with every letter of the alphabet to try and guess the hidden word. But be careful - with each incorrect guess, a part of the hangman's body will be added to the gallows. Can you guess the word before the hangman is fully formed?</h4>
        <br>
        <h4>We hope you enjoy playing our hangman game as much as we enjoyed creating it. Good luck, and have fun!</h4>
        <br>
        <br>
        <?php if (isset($_SESSION["user"]) == false){?>
        <div class="alert alert-danger" role="alert" style="text-align: center; ">
            You can play without <a href="./sites/register.php">sigining in</a>, but your stats wont be counted!
        </div>
        <?php }?>
        
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous">
    </script>
</body>

</html>