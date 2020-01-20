<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "jointures";

$conn = new Mysqli($servername, $username, $password);

if ($conn->connect_error) {
    echo $conn->connect_error;
} else {
    $conn->select_db($dbname);
}

