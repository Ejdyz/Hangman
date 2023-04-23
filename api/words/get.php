<?php

$conn = mysqli_connect("localhost", "root", "", "wea");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT id, word FROM words ORDER BY RAND() LIMIT 1"; //* no need for  mysqli_prepare
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $word = $row["word"];
} else {
    $word = "No words found in database.";
}

session_start();
$_SESSION["word_id"] = $row["id"];

header("Content-Type: text/html; charset=utf-8");
echo $word;

mysqli_close($conn);
?>