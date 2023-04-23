<?php 
  session_start();
  $conn = mysqli_connect("localhost", "root", "", "wea");


  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }

  //save data from form
  $registerUsername = $_POST["Username"];
  $registerEmail = $_POST["Email"];
  $registerPassword = hash('sha256', $_POST["Password"]);

  //zjistovani a overovani zda je uzivatel v dat.
  $stmt = $conn->prepare("SELECT * FROM users WHERE username LIKE '$registerEmail'");
  $stmt->execute();
  $getdetails = $stmt->fetch();

  if($getdetails){                                    //pokud to sehnalo detaily
      if($getdetails[0]['email'] == $registerEmail){  //overuje zda je to stejny jestli ano tak to posle ze uz je registered
          //header("Location:../errors/user-already-registred.php");
        echo("user exist");
      }
  }else{
    $stmt = $conn->prepare("INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES (NULL, '$registerUsername', '$registerEmail', '$registerPassword');");
    $stmt->execute();
    header("Location:../sites/login.php");
  }

?>