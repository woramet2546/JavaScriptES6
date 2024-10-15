<?php
include "./ShoppingCart/databaseShop.php";
$id = $_GET['id'];

$sql = "DELETE FROM products WHERE id= '$id'";

if (mysqli_query($conn, $sql)) {
    echo "Record deleted successfully";
    echo json_encode(array('isConfirmed' => 1));
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
