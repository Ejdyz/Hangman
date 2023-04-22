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

          <button class="btn btn-outline-success me-2" id="a" type="submit" onclick="guess('a')">A</button>
          <button class="btn btn-outline-success me-2" id="b" type="submit" onclick="guess('b')">B</button>
          <button class="btn btn-outline-success me-2" id="c" type="submit" onclick="guess('c')">C</button>
          <button class="btn btn-outline-success me-2" id="d" type="submit" onclick="guess('d')">D</button>
          <button class="btn btn-outline-success me-2" id="e" type="submit" onclick="guess('e')">E</button>
          <button class="btn btn-outline-success me-2" id="f" type="submit" onclick="guess('f')">F</button>
          <button class="btn btn-outline-success me-2" id="g" type="submit" onclick="guess('g')">G</button>
          <button class="btn btn-outline-success me-2" id="h" type="submit" onclick="guess('h')">H</button>
          <button class="btn btn-outline-success me-2" id="i" type="submit" onclick="guess('i')">I</button>
          <button class="btn btn-outline-success me-2" id="j" type="submit" onclick="guess('j')">J</button>
          <button class="btn btn-outline-success me-2" id="k" type="submit" onclick="guess('k')">K</button>
          <button class="btn btn-outline-success me-2" id="l" type="submit" onclick="guess('l')">L</button>
          <button class="btn btn-outline-success me-2" id="m" type="submit" onclick="guess('m')">M</button>
          <button class="btn btn-outline-success me-2" id="n" type="submit" onclick="guess('n')">N</button>
          <button class="btn btn-outline-success me-2" id="o" type="submit" onclick="guess('o')">O</button>
          <button class="btn btn-outline-success me-2" id="p" type="submit" onclick="guess('p')">P</button>
          <button class="btn btn-outline-success me-2" id="q" type="submit" onclick="guess('q')">Q</button>
          <button class="btn btn-outline-success me-2" id="r" type="submit" onclick="guess('r')">R</button>
          <button class="btn btn-outline-success me-2" id="s" type="submit" onclick="guess('s')">S</button>
          <button class="btn btn-outline-success me-2" id="t" type="submit" onclick="guess('t')">T</button>
          <button class="btn btn-outline-success me-2" id="u" type="submit" onclick="guess('u')">U</button>
          <button class="btn btn-outline-success me-2" id="v" type="submit" onclick="guess('v')">V</button>
          <button class="btn btn-outline-success me-2" id="w" type="submit" onclick="guess('w')">W</button>
          <button class="btn btn-outline-success me-2" id="x" type="submit" onclick="guess('x')">X</button>
          <button class="btn btn-outline-success me-2" id="y" type="submit" onclick="guess('y')">Y</button>
          <button class="btn btn-outline-success me-2" id="z" type="submit" onclick="guess('z')">Z</button>


        <h5 style="color:white; margin-top:10px;" id="usedLetters">Použitá písmena: </h5>
      </div>
  </div>


    <script src="https://randojs.com/2.0.0.js"></script>

    <script src="../scripts/game-script.js"></script>

  </body>
</html>