<?php
session_start();

if (!isset($_SESSION["user_id"])) {
    header("HTTP/1.1 401 Unauthorized");
    echo "You need to be logged in";
    exit();
}

if (isset($_POST["word"])) {
    $word = $_POST["word"];
} else {
    header("HTTP/1.1 400 Bad Request");
    echo "Bad request";
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "wea");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$word = $_POST["word"];

$sql = "DELETE FROM words WHERE word = ?";

$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "s", $word);
mysqli_stmt_execute($stmt);

if (mysqli_stmt_affected_rows($stmt) > 0) {
    echo "The word was removed";
} else {
    header("HTTP/1.0 500 Internal Server Error");
    echo "Error";
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
