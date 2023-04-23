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
  $sql = "SELECT * FROM users WHERE email LIKE '$registerEmail'";
  $result = mysqli_query($conn, $sql);
  
  if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
        if($row['email'] == $registerEmail){  //overuje zda je to stejny jestli ano tak to posle ze uz je registered
        header("Location:../sites/errorsite/userExist.php");
      }
    }else{
    $stmt = $conn->prepare("INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES (NULL, '$registerUsername', '$registerEmail', '$registerPassword');");
    $stmt->execute();
    header("Location:../sites/login.php");
  }

?>