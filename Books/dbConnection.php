<?php
$databaseHost = 'localhost';
$databaseName = 'books';
$databaseUsername = 'root';
$databasePassword = '';

// Open a new connection to the MySQL server
$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}