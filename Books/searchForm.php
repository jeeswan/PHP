<!-- Create web form for book search catalog. The form should contain  -->
<!-- a dropdown defining search type, a text box for search keyword,  -->
<!-- a radio button for download type true or false, now write PHP  -->
<!-- script to store data from the form into database table and also  -->
<!-- retrive the results from stored table in a new page. -->

<?php
require_once "dbConnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_type = $_POST['search_type'];
    $keyword = $_POST['search_keyword'];
    $download = $_POST['download_type'];

    $result = mysqli_query($conn, "INSERT INTO searches (`search_type`, `keyword`, `download`) VALUES ('$search_type', '$keyword', '$download')");
    if (!$result) {
        die("<font color='red'>Error Inserting. " . mysqli_error($conn) . "</font><br/>");
    }

    echo "<p><font color='green'>Search Data added successfully!</p>";
    echo "<a href='list_search.php'>View Result</a>";
}

mysqli_close($conn);
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Book Search Catalog</title>
  </head>
  <body>
    <h1>Book Search Catalog</h1>
    <form action="searchForm.php" method="POST">
      <label for="search_type">Search Type:</label>
      <select name="search_type" id="search_type">
        <option value="title">Title</option>
        <option value="author">Author</option>
        <option value="isbn">ISBN</option>
      </select>
      <br /><br />
      <label for="search_keyword">Search Keyword:</label>
      <input type="text" name="search_keyword" id="search_keyword" required />
      <br /><br />
      <label>Download Type:</label>
      <input
        type="radio"
        name="download_type"
        id="download_true"
        value="1"
        required
      />
      <label for="download_true">Downloadable</label>
      <input
        type="radio"
        name="download_type"
        id="download_false"
        value="0"
        required
      />
      <label for="download_false">Not Downloadable</label>
      <br /><br />
      <input type="submit" value="Search" />
    </form>
  </body>
</html>