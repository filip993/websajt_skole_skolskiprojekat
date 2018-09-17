<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

</body>
</html>
<?php
session_start();
include "baza.PHP";
if (isset($_GET["id"]) && !empty($_GET["id"]))  {
    $id = $_GET["id"];
    $upit = "SELECT * FROM vezbe WHERE id_vezba='$id'";
    $upit2 = mysqli_query($conn, $upit);
    $rezultat = mysqli_fetch_assoc($upit2);
    $rezultat2 = $rezultat["ime_vezbe"];
    echo "<p style=\"font-weight:bold; font-size: 125%  \"> $rezultat2 </p>";
    echo $rezultat["opis_vezbe"];
    echo "<br> <br>";
    echo "Vezba je odrzana:";
    echo " ";
    echo $rezultat["datum_vezbe"];
    echo "<br> <br>";
    echo "Informacije o saradniku koji je drzao vezbu:";
    $upit3 = "SELECT * FROM registracija JOIN vezbe ON  registracija.id=vezbe.id_saradnik WHERE id_vezba='$id'";
    $upit4 = mysqli_query($conn, $upit3);
    $rezultat3 = mysqli_fetch_assoc($upit4);
    echo " ";
    $rezultat4 = $rezultat3["o_saradniku"];
    echo "<p style=\"font-style:italic;  \">  $rezultat4 </p>";
}
?>
<?php
if (isset($_SESSION["administrator"]) || isset($_SESSION["saradnik"])) {
    if (isset($_POST["opis_vezbe"]) && !empty($_POST["opis_vezbe"])) {
        $opis_vezbe = $_POST["opis_vezbe"];
        $upit200 = "UPDATE vezbe SET opis_vezbe='$opis_vezbe' WHERE id_vezba='$id'";
        if (mysqli_query($conn, $upit200)) {
            echo "Uspesno ste ubacili!";
        } else {
            echo "Greska " . $sql . " < br>" . mysqli_error($conn);
        }

    }

    ?>
    <form action="<?php echo "Ovezbi.php?id=" . $_GET["id"]; ?>" method="POST">
        <textarea name="opis_vezbe" placeholder="Upisite nesto o vezbi" cols="30" rows="10"></textarea> <br>
        <input type="submit" value="Unesite opis vezbe">
    </form>


    <?php
}
?>
<?php
$upit201 = "SELECT * FROM vezbe WHERE id_vezba='$id'";
$upit202 = mysqli_query($conn, $upit201);
$rezultat20 = mysqli_fetch_assoc($upit202);
echo "Opis vezbe";
echo "<br>";
echo $rezultat20["opis_vezbe"];
include "upload2.php";
?>

