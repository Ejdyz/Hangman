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

$stmt_check = mysqli_prepare($conn, "SELECT * FROM words WHERE word=?");
mysqli_stmt_bind_param($stmt_check, "s", $word);
mysqli_stmt_execute($stmt_check);
$result = mysqli_stmt_get_result($stmt_check);
if (mysqli_num_rows($result) > 0) {
    header("HTTP/1.1 409 Conflict");
    echo "The word already exists";
    exit;
}

$stmt_insert = mysqli_prepare($conn, "INSERT INTO words (word) VALUES (?)");
mysqli_stmt_bind_param($stmt_insert, "s", $word);
mysqli_stmt_execute($stmt_insert);

if (mysqli_affected_rows($conn) > 0) {
    echo "The word was added";
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo "Error";
}

mysqli_close($conn);

?>
