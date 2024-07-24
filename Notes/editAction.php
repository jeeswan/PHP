<?php
require_once("dbConnection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// if (isset($_POST['update'])) {
	// $id = mysqli_real_escape_string($conn, $_POST['id']);
	$id = $_POST['id'];
	$title = $_POST['title'];
	$description = $_POST['description'];

	// Check for empty fields
	if (empty($title) || empty($description)) {
		if (empty($title)) {
			echo "<font color='red'>Title field is empty.</font><br/>";
		}

		if (empty($description)) {
			echo "<font color='red'>Description field is empty.</font><br/>";
		}
	} else {
		// Update the database table
		$result = mysqli_query($conn, "UPDATE notes SET `title` = '$title', `description` = '$description' WHERE `id` = $id");
		if (!$result) {
			die("Error updating record: " . mysqli_error($conn));
		}
		// Display success message
		echo "<p><font color='green'>Data updated successfully!</p>";
		echo "<a href='index.php'>View Result</a>";
	}
}