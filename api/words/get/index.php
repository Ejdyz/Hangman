<?php

$conn = mysqli_connect("localhost", "root", "", "wea");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT word FROM words ORDER BY RAND() LIMIT 1"; // get word form database
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $word = $row["word"];
} else {
    $word = "No words found in database.";
}

header('Content-Type: application/json; charset=utf-8');
echo json_encode(array("word" => $word));

mysqli_close($conn);
