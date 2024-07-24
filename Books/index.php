<?php
require_once "dbConnection.php";

$sql = "SELECT * FROM search";
$result = mysqli_query($conn, $sql);
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search List</title>
</head>

<body>
    <?php
    if (mysqli_num_rows($result) > 0) {
        echo "<h1>Search Results</h1>";
        echo "<table border='1'>
            <tr>
                <th>ID</th>
                <th>Search Type</th>
                <th>Keyword</th>
                <th>Download Available</th>
            </tr>";
        while ($res = mysqli_fetch_assoc($result)) {
            echo "<tr>
                <td>" . $res["id"] . "</td>
                <td>" . $res["search_type"] . "</td>
                <td>" . $res["keyword"] . "</td>
                <td>" . $res["download"] . "</td>
            
              </tr>";
        }
        echo "</table>";
    } else {
        echo "<h1>No results Found</h1>";
    }
    mysqli_close($conn);
    ?>
</body>

</html>