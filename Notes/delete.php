<?php
require_once ("dbConnection.php");

if (!isset($_GET['id'])) {
  die("Error: No id parameter provided.");
}
$id = $_GET['id'];
$result = mysqli_query($conn, "DELETE FROM notes WHERE id = $id");
if (!$result) {
  die("Error: " . mysqli_error($conn));
}

if (mysqli_affected_rows($conn) == 0) {
  die("Error: No record found with id $id.");
}

header("Location:index.php");
exit();