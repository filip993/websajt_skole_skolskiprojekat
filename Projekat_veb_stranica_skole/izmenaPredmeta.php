<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<?php
include "baza.php";
if (isset($_GET["id"]) && !empty($_GET["id"])) {

    $id = $_GET["id"];
    if (isset($_POST["naziv_predmeta"]) && !empty($_POST["naziv_predmeta"])) {

        $novinaziv = $_POST["naziv_predmeta"];
        $sql2 = "UPDATE predmeti SET naziv_predmeta='$novinaziv' WHERE id_predmeta='$id' ";
        $sql3 = mysqli_query($conn, $sql2);
        echo "Uspesno ste apdejtovali!";

    }
    $upit = "SELECT * FROM predmeti WHERE id_predmeta='$id'";
    $rezultat = mysqli_query($conn, $upit);
    $rezultat2 = mysqli_fetch_assoc($rezultat);
    


    ?>
    <a href="predmet.PHP">Vratite se nazad</a>

    <form action="izmenaPredmeta.php?id=<?php echo $id; ?>" method="post">
        <label for="naziv_predmeta">Naziv predmeta:</label>
        <input type="text" name="naziv_predmeta" id="naziv_predmeta" placeholder="Unesite naziv"
               value="<?php echo $rezultat2['naziv_predmeta']; ?>">
        <input type="submit" value="Izmenite">
    </form>
    <?php
}
?>
</body>
</html>
