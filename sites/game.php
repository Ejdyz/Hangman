<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../styles/game-style.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"> 
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
                        <a class="nav-link" href="#">Game</a>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item pull-right">
                        <a class="btn btn-outline-success me-2" type="button" href="./register.php">Register</a>
                        <a class="btn btn-sm btn-outline-secondary" type="button" href="./login.php">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

  <div class="game">
    <div class="lose" id="overGame">
    </div>
      <img src="" alt="" id="hangman" />
      <div class="input">
        <h3 id="hiddenWord"></h3>


          <input class="inputLetter"type="text" id="letter" />

          <button class="btn btn-outline-success me-2" id="button" type="submit" onclick="onGuessClick()">Guess</button>

        <h5 style="color:white; margin-top:10px;" id="usedLetters">Použitá písmena: </h5>
      </div>
  </div>


    <script src="https://randojs.com/2.0.0.js"></script>

    <script src="../scripts/game-script.js"></script>

  </body>
</html>