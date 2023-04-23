<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
    

  <title>Document</title>
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
                        <a class="nav-link" aria-current="page" href="../../index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../game.php">Game</a>
                    </li>

                    <?php if (isset($_SESSION["user"])){?>
                        <li class="nav-item">
                            <a class="nav-link" href="../words.php">Words</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../stats.php">Statistics</a>
                        </li>

                <?php } ?>
                </ul>
                <?php if (isset($_SESSION["user"])){?>
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item pull-right">
                            <a class="btn btn-outline-success me-2 disabled" type="button" href="../stats.php"><?php echo $_SESSION["user"]  ?></a>
                        </li>
                    </ul>
                <?php }else{?>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item pull-right">
                        <a class="btn btn-outline-success me-2" type="button" href="../register.php">Register</a>
                        <a class="btn btn-sm btn-outline-secondary" type="button" href="../login.php">Login</a>
                    </li>
                </ul>
                <?php }?>
            </div>
        </div>
    </nav>



<div class="display-flex flex-column justify-content-center" style="
    display: flex;
    flex-direction: column;
    flex-wrap: nowrap;
    align-content: flex-start;
    align-items: center;
    justify-content: center;
    margin-top:20px;">
      <div class="alert alert-danger text-center" style="width: 70%;">
          <h4 class="alert-heading">Well, this is awkward!</h4>
          <p>It seems that this profile already exists.</p>
          <hr>
          <p class="mb-0">You can login here:  <form style="display:inline"action="../login.php"><br><button class='btn btn-danger btn-sm delete-word' >Login</button></form></p>
      </div>
  </div>
</body>
</html>





