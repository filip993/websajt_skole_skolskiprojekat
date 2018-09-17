<?php
include "baza.php";
if (isset($_GET["id"]) && !empty($_GET["id"])) {

    $id = $_GET["id"];
    echo "<br>";
    $sql = "DELETE  FROM predmeti WHERE id_predmeta='$id'";
    $sql2 = "DELETE  FROM vezbe WHERE id_predmet='$id'";
    $sql3 = "DELETE  FROM saradnici WHERE id_predmeta='$id' ";

    if (mysqli_query($conn, $sql)) {
        echo "Uspesno";
    } else {
        echo "Greska";
    }
        if (mysqli_query($conn, $sql2)) {
            echo " brisanje";
        } else {
            echo " pri";
        }
        if (mysqli_query($conn, $sql3)) {
            echo " predmeta!";
        } else {
            echo " brisanju!";
        }

}
?>
