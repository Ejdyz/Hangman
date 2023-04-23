<?php
session_start();


if (!isset($_SESSION["user_id"])) {
    // header("HTTP/1.1 401 Unauthorized"); //todo add login
    // exit;
}


if (!isset($_POST["word"])) {
    http_response_code(400);
    echo json_encode(["message" => "The word for removal was not provided."]);
    exit();
}

$conn = mysqli_connect("localhost", "root", "", "wea");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$word = $_POST["word"];

$sql = "DELETE FROM words WHERE word = '{$word}'";

$result = mysqli_query($conn, $sql);

if ($result) {
    echo json_encode(array("message" => "The word was removed"));
} else {
    header("HTTP/1.0 500 Internal Server Error");
    echo json_encode(array("message" => "Error"));
    exit;
}
mysqli_close($conn);
