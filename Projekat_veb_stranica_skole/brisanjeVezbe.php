<?php
include "baza.PHP";
$id = $_POST["id"];
$upit = "DELETE  FROM dokumenti WHERE id=" . $id;

if (mysqli_query($conn, $upit)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}

?>

