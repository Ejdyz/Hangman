<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".././styles/form-style.css">
    <title>Register</title>
    
</head>

<body>

    <div class="login-box" >
        <h2>Register</h2>
        <form method="POST" action="../registrationBackend/registrationHandler.php">
            <div class="user-box">
                <input type="text" name="Username" required>
                <label>Username</label>
            </div>
            <div class="user-box">
                <input type="email" name="Email" required>
                <label>Email</label>
            </div>
            <div class="user-box">
                <input type="password" id="password" name="Password" required>
                <label>Password</label>

            </div>
            <div class="user-box">
                <input type="password" id="checkPassword" name="CheckPassword" required oninput="checkForPassword(this)">
                <label>Password Again</label>
            </div>
            <button type="submit" >
                <span></span>
                <span></span>
                <span></span>
                <span></span>

                Submit
            </button>
        </form>
    </div>

    <script>
function checkForPassword(element) {
    if (element.value !== document.getElementById('password').value) {
    element.setCustomValidity('Passwords must match.');
  } else {
    element.setCustomValidity('');
  }
}
</script>
</body>
</html>