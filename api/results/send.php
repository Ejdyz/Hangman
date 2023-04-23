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

if (isset($_POST["win"])) {
    $win = boolval($_POST["win"]); // 0 or 1
} else {
    header("HTTP/1.1 400 Bad Request");
    echo "Bad request";
    exit();
}

if (isset($_SESSION["word_id"])) {
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo "No word is selected";
    exit();
}

$word_id = $_SESSION["word_id"];
$user_id = /*$_SESSION["user_id"]*/ 1; //todo add

$stmt = mysqli_prepare($conn,"INSERT INTO stats (id, win, user_id, word_id) VALUES (NULL, ?, ?, ?)",);
mysqli_stmt_bind_param($stmt, "iii", $win, $user_id, $word_id);

if (mysqli_stmt_execute($stmt)) {
    echo "The result was successfully recorded";
} else {
    header("HTTP/1.0 500 Internal Server Error");
    echo "Error";
    exit();
}

mysqli_stmt_close($stmt);
mysqli_close($conn);

?>
