<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
session_start();
include "baza.PHP";
if (isset($_SESSION["administrator"]) && !empty($_SESSION["administrator"])) {
    $upit = "SELECT * FROM registracija WHERE status=0 ";
    $upit2 = mysqli_query($conn, $upit);
    while ($rezultat = mysqli_fetch_assoc($upit2)) {
        echo $rezultat["ime"];
        echo " ";
        echo $rezultat["prezime"];
        echo " ";
        echo "<a href=\"aktivirajj.php?id=" . $rezultat["id"] . "\" > Aktiviraj saradnika </a> ";
        echo "<br>";

    }
}

?>

</body>
</html>