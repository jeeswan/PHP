<!-- How do you define an Array in PHP? write a PHP script -->
<!-- to create a multidimensional array name Product that  -->
<!-- will contain pcode, pname. and price. Initialize the  -->
<!-- array with at least three instances. Also, Write an HTML  -->
<!-- script to display the initialized values of the array  -->
<!-- in an HTML Table. -->

<?php
// Define a multidimensional array
$products = [
    [
        "pcode" => "P001",
        "pname" => "Product 1",
        "price" => 100
    ],
    [
        "pcode" => "P002",
        "pname" => "Product 2",
        "price" => 200
    ],
    [
        "pcode" => "P003",
        "pname" => "Product 3",
        "price" => 300
    ]
];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Product List</title>
    <style>
        table {
            width: 50%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Product List</h1>
    <table>
        <tr>
            <th>PCode</th>
            <th>PName</th>
            <th>Price</th>
        </tr>
        <?php
        foreach ($products as $product) {
            echo "<tr>";
            echo "<td>" . $product["pcode"] . "</td>";
            echo "<td>" . $product["pname"] . "</td>";
            echo "<td>" . $product["price"] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>

</html>