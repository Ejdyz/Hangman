<?php

$conn = mysqli_connect("localhost", "root", "", "wea");


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

session_start();

if (isset($_SESSION["word_id"])) {
} else {
    header("HTTP/1.1 500 Internal Server Error");
    echo "No word is selected";
    exit();
}

$word_id = $_SESSION["word_id"];




$sql = "SELECT SUM(win) AS wins, COUNT(*)-SUM(win) AS losses FROM stats WHERE word_id = $word_id";

$result = mysqli_query($conn, $sql);


if ($result) {
    $row = mysqli_fetch_assoc($result);


    header("Content-Type: application/json");
    echo json_encode([
        "win" => (int) $row["wins"],
        "lose" => (int) $row["losses"]
    ]);
} else {
    echo "error";
}
