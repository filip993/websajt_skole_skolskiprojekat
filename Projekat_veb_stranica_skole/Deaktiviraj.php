<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
include "baza.PHP";
if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $id=$_GET["id"];
    $upit="UPDATE registracija SET status=0 WHERE id='$id'";
    if (mysqli_query($conn, $upit)) {
        echo "Uspesno deaktiviran saradnik!";
    } else {
        echo "Greska pri deaktiviranju saradnika! " . mysqli_error($conn);
    }

}

?>
</body>
</html>
