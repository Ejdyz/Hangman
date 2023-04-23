  <?php
  session_start();
  $conn = mysqli_connect("localhost", "root", "", "wea");

  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }

  //save data from form
  $registerEmail = $_POST["Email"];
  $registerPassword = hash("sha256", $_POST["Password"]);

  $sql = "SELECT * FROM users WHERE email LIKE '$registerEmail'";
  $result = mysqli_query($conn, $sql);

  if (mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);

      $dtbId = $row["id"];
      $dtbEmail = $row["email"];
      $dtbUsername = $row["username"];
      $dtbPassword = $row["password"];

      if ($dtbEmail == $registerEmail && $dtbPassword == $registerPassword) {
          //succesful login
          $_SESSION["user"] = $dtbUsername;
          $_SESSION["user_id"] = $dtbId;
          header("Location:../index.php");
      } elseif (
          $dtbEmail != $registerEmail ||
          $dtbPassword != $registerPassword
      ) {
          //invalid login
          $_SESSION["invalidLogin"] = true;
          header("Location:../sites/login.php");
      }
  } else {
      //user is not in database
      header("Location:../sites/errorSite/userDontExist.php");
  }

?>
