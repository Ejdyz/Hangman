<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=".././styles/form-style.css">
    <script src="../scripts/register-script.js"></script>
    <title>Register</title>
</head>

<body>
    <div class="login-box" >
        <h2>Register</h2>
        <form method="POST" action="../registrationBackend/registrationHandler.php">
            <div class="user-box">
                <input type="text" name="Username" required>
                <label>Usernamel</label>
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
                <input type="password" id="checkPassword" name="CheckPassword" required>
                <label>Password Again</label>
            </div>
            <button>
                <span></span>
                <span></span>
                <span></span>
                <span></span>

                Submit
            </button>
        </form>
    </div>
</body>

</html>