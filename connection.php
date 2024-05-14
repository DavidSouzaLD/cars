<?php

$hostname = "localhost";
$database = "cars";
$user = "admin";
$password = "admin";

$mysqli = new mysqli($hostname, $user, $password, $database);

if ($mysqli->connect_errno) {
    echo "Database Error! (" . $mysqli->connect_error . ") " . $mysqli->connect_error;
}
else
{
    echo "Connected on Database!";
}