<?php

$conn = mysqli_connect("localhost", "root", "", "wea");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


session_start();
// if (!isset($_SESSION['user_id'])) { //todo add login
//     header("HTTP/1.1 401 Unauthorized");
//     echo "You need to be logged in";
//     exit;
// }


if (isset($_POST['word'])) {
    $word = $_POST['word'];
} else {
    header("HTTP/1.1 400 Bad Request");
    echo "Bad request";
    exit;
}

$stmt = mysqli_prepare($conn, "INSERT INTO words (word) VALUES (?)");
mysqli_stmt_bind_param($stmt, "s", $word);
mysqli_stmt_execute($stmt);

if (mysqli_affected_rows($conn) > 0) {
    echo "The word was added";
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo "Error";
}

mysqli_close($conn);

?>
