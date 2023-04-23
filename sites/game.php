<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="../styles/game-style.css" />
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
                        <a class="nav-link" aria-current="page" href="../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="game.php">Game</a>
                    </li>

                    <?php if (isset($_SESSION["user"])){?>
                        <li class="nav-item">
                            <a class="nav-link" href="./words.php">Words</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="./stats.php">Statistics</a>
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
                        <a class="btn btn-outline-success me-2" type="button" href="./register.php">Register</a>
                        <a class="btn btn-sm btn-outline-secondary" type="button" href="./login.php">Login</a>
                    </li>
                </ul>
                <?php } ?>
            </div>
        </div>
    </nav>

  <div class="game">
    <div class="lose" id="overGame">
    </div>
      <img src="" alt="" id="hangman" />
      <div id="buttons" class="input">
        <h3 id="hiddenWord"></h3>



      </div>
  </div>
  <div id="stats">
    <p id="win">
    
    </p>

    <p id="lose">
    </p>
  </div>



    <script src="../scripts/game-script.js"></script>

  </body>
</html>