<?php

$conn = mysqli_connect("localhost", "root", "", "wea");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();
$word_id = $_SESSION["word_id"];
$win = boolval($_GET["win"]);       // 0 or 1
$user_id = /*$_SESSION["user_id"]*/ 1; //todo add

$sql = "INSERT INTO stats (id, win, user_id, word_id) VALUES (NULL, '$win', '$user_id', '$word_id')";
if (mysqli_query($conn, $sql)) {
    echo "The result was successfully recorded";
} else {
    echo "Errora: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
