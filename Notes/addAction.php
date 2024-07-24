<?php
	require_once("dbConnection.php");
	// if (isset($_POST['submit'])) {
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// $title = mysqli_real_escape_string($conn, $_POST['title']);
		$title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'UTF-8');
		// $title = $_POST['title'];
		$description = $_POST['description'];

		if (empty($title) || empty($description)) {
			if (empty($title)) {
				echo "<font color='red'>Title field is empty.</font><br/>";
			}

			if (empty($description)) {
				echo "<font color='red'>Description field is empty.</font><br/>";
			}

			// Show link to the previous page
			echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		} else {
			$result = mysqli_query($conn, "INSERT INTO notes (`title`, `description`) VALUES ('$title', '$description')");
			if (!$result) {
				die("<font color='red'>Error Inserting. " . mysqli_error($conn) . "</font><br/>");
			}

			// Display success message
			echo "<p><font color='green'>Data added successfully!</p>";
			echo "<a href='index.php'>View Result</a>";

			mysqli_close($conn);
		}
	}
	?>