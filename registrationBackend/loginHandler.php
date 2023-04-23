  <?php
    session_start();
    //save data from form
    $registerEmail = $_POST["Email"];
    $registerPassword = hash('sha256',$_POST["Password"]);
    
    
    
    $_SESSION["user"] = $registerUsername;

  ?>