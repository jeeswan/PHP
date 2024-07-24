<?php
// Include the database connection file
require_once("dbConnection.php");

$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM notes WHERE id = $id");
if (!$result) {
	die("Error: " . mysqli_error($conn));
}
if (mysqli_num_rows($result) == 0) {
	die("Error: No record found with id $id.");
}
$resultData = mysqli_fetch_assoc($result);
$title = $resultData['title'];
$description = $resultData['description'];
?>

<html>

<head>
	<title>Edit Note</title>
</head>

<body>
	<h2>Edit Note</h2>
	<p>
		<a href="index.php">Home</a>
	</p>

	<form method="post" action="editAction.php">
		<label>Name: </label>
		<input type="text" name="title" value="<?php echo $title; ?>">
		<br><br>
		<label>Description: </label>
		<textarea name="description"><?php echo $description; ?></textarea>
		<br><br>
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<input type="submit" name="update">
		</table>
	</form>
</body>

</html>