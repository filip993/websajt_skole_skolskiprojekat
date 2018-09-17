<style>a{
        padding: 10px 5px ;
    } </style>
<?php
include "baza.php";

if (isset($_SESSION["administrator"]) && !empty($_SESSION["administrator"])) {
    if (isset($_POST["naziv_predmeta"]) && !empty($_POST["naziv_predmeta"])) {


        $naziv_predmeta = $_POST["naziv_predmeta"];
        $upit5 = "INSERT INTO predmeti (naziv_predmeta) VALUES ('$naziv_predmeta')";
        $upit6 = mysqli_query($conn, $upit5);
    }
    ?>

    <form action="index.PHP" method="POST">
        <input type="text" name="naziv_predmeta" placeholder="Unesite predmet" required="required">
        <input type="submit" value="Dodajte predmet">
    </form>


    <?php
}


    $upit = "SELECT * FROM predmeti ";
    $upit2 = mysqli_query($conn, $upit);
    while ($rez = mysqli_fetch_assoc($upit2)) {
        echo "<br>";
        $link = "<a href=\"izmenaPredmeta.php?id=" . $rez['id_predmeta'] . " \">Izmena</a>" ;
        $link2 = "<a href=\"brisanjePredmeta.php?id=" . $rez['id_predmeta'] . " \" class='remove'>Izbrisi</a>";
        $link3 = "<a href=\"predmet2.php?id=" . $rez['id_predmeta'] . " \" >" . $rez['naziv_predmeta'] . " </a> ";
        echo " ";
        echo $link3;
        echo " ";

        $broj=4;
        if (isset($_SESSION['administrator']) && !empty($_SESSION['administrator'])) {
            echo " ";
            echo $link;
            echo " ";
            echo " ";
            echo $link2;
        }

    }

?>

<script src="js/jquery-3.1.0.min.js"></script>
<script>$('.remove').on('click', function () {
        return confirm('Da li ste sigurni da želite da obrišete?');
    });</script>
