<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Document </title>
    <style>
        select {
            width: 10%;
            padding: 16px 20px;
            border: none;
            border-radius: 4px;
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>


<?php
session_start();
include "baza.PHP";
if (isset($_GET["id"]) && !empty($_GET["id"])) {
$id = $_GET["id"];
$upit = "SELECT * FROM predmeti WHERE id_predmeta='$id'   ";
$upit2 = mysqli_query($conn, $upit);
$rezultat = mysqli_fetch_assoc($upit2);
$rezultat2 = $rezultat['naziv_predmeta'];
echo "<p style=\"font-weight:bold; font-size: 125%  \">  $rezultat2 </p>";
$upit3 = "SELECT * FROM registracija JOIN saradnici ON registracija.id = saradnici.id_korisnika WHERE saradnici.id_predmeta = " . $id . " AND status=1 ";
$upit4 = mysqli_query($conn, $upit3);
echo "Saradnici na ovom predmetu su";
echo "<br>";
?>
<ul>
    <?php
    while ($rez = mysqli_fetch_assoc($upit4)) {
        $rezultat4 = $rez["ime"];
        $rezultat5 = $rez["prezime"];
        echo "<br>";
        echo " <li>" . "<a href=\"Osaradniku.php?id=" . $rez['id_korisnika'] . "  \" > $rezultat4 $rezultat5  </a> <button data-id=\"" . $rez['id'] . "\" data-id-predmeta=\"". $_GET["id"] ."\"  style=\"margin-left: 30px;\" class=\"dugme_ukloni_saradnika\">
                    Ukloni korisnika sa predmeta
                </button>  </li> ";
        if (isset($_SESSION["administrator"]) && !empty($_SESSION["administrator"])) {
            $id_korisnika = $rez["id_korisnika"];
            $upit10 = "SELECT * FROM registracija WHERE id='$id_korisnika' AND status=1";
            $upit11 = mysqli_query($conn, $upit10);
            $rez2 = mysqli_fetch_assoc($upit11);
            if (mysqli_num_rows($upit11) == 1) {
                echo " ";
                echo "<a href=\"Deaktiviraj.php?id=" . $rez["id_korisnika"] . "\" > Deaktiviraj saradnika </a>  ";
            }
        }
        echo "<br>";

    }
    }

    ?>
</ul>
<?php
if (isset($_SESSION["administrator"]) && !empty($_SESSION["administrator"]) || (isset($_SESSION["saradnik"]) && !empty($_SESSION["saradnik"]))) {

    if (isset($_POST["ime_vezbe"]) && isset($_POST["datum_vezbe"]) && isset($_POST["id_predmeta"]) && isset($_POST["id_saradnika"])) {

        $ime_vezbe = $_POST["ime_vezbe"];
        $datum_vezbe = $_POST["datum_vezbe"];
        $id_predmeta = $_POST["id_predmeta"];
        $id_saradnika = $_SESSION["id"];
        $upit5 = "INSERT INTO vezbe(ime_vezbe, id_saradnik, datum_vezbe, id_predmet) VALUES('$ime_vezbe', '$id_saradnika', '$datum_vezbe','$id_predmeta')";
        if (mysqli_query($conn, $upit5)) {
            echo "Uspesno ste ubacili!";
        } else {
            echo "Greska " . $upit5;
        }
    }
    ?>

    <form action=" <?php echo "predmet2.php?id=" . $_GET["id"]; ?> " method="post">
        <input type="hidden" name="id_predmeta" value="<?php echo $_GET["id"]; ?>">
        <input type="hidden" name="id_saradnika" value="<?php echo $_SESSION["id"]; ?>">
        <input type="text" name="ime_vezbe" required="required" placeholder="Ime vezbe"> <br> <br>
        <input type="date" name="datum_vezbe" required="required"> <br> <br>
        <input type="submit" value="Dodaj vezbu">
    </form>
    <br> <br>
    <form action="predmet2.php?id=<?php echo $_GET['id']; ?>" method="post">
        <input type="hidden" name="id_predmeta" value="<?php echo $_GET["id"]; ?>">
        <select name="id_korisnika">

            <?php
            $upit7 = "SELECT * FROM registracija";
            $upit8 = mysqli_query($conn, $upit7);
            while ($rez = mysqli_fetch_assoc($upit8)) { ?>
                <option value=" <?php echo $rez["id"]; ?> "> <?php echo $rez["ime"]; ?> </option>
                <?php
            }
            ?>
        </select>
        <br>
        <input type="submit" value="Dodaj saradnika">

    </form>
    <?php
}
?>



<?php
if (isset($_POST["id_predmeta"]) && isset($_POST["id_korisnika"])) {

    $id_predmeta = $_POST["id_predmeta"];
    $id_korisnika = $_POST["id_korisnika"];
    $upit9 = "INSERT INTO saradnici (id_predmeta,id_korisnika) VALUES ('$id_predmeta','$id_korisnika')";
    if (mysqli_query($conn, $upit9)) {
        echo "Uspesno ste ubacili!";
    } else {
        echo "Greska " . $sql . " < br>" . mysqli_error($conn);
    }
}
?>
<ul>


    <?php
    $id = $_GET["id"];
    $upit7 = "SELECT * FROM vezbe WHERE id_predmet='$id'";
    $upit8 = mysqli_query($conn, $upit7);
    while ($rez = mysqli_fetch_assoc($upit8)) {
        $vezba = $rez["datum_vezbe"] . "<a href=\"Ovezbi.php?id=" . $rez["id_vezba"] . "\">" . $rez["ime_vezbe"] . "</a>";
        echo "<li>" . $vezba . "</li>";


    }
    ?>
</ul>
<?php
if (isset($_SESSION["administrator"]) || isset($_SESSION["saradnik"])) {
    if (isset($_POST["opis_predmeta"]) && !empty($_POST["opis_predmeta"])) {
        $opis_predmeta = $_POST["opis_predmeta"];
        $upit100 = "UPDATE predmeti SET opis_predmeta='$opis_predmeta' WHERE id_predmeta='$id'";
        if (mysqli_query($conn, $upit100)) {
            echo "Uspesno ste ubacili!";
        } else {
            echo "Greska " . $sql . " < br>" . mysqli_error($conn);
        }

    }

    ?>
    <form action="<?php echo "predmet2.php?id=" . $_GET["id"]; ?>" method="POST">
        <textarea name="opis_predmeta" placeholder="Upisite nesto o predmetu" cols="30" rows="10"></textarea> <br>
        <input type="submit" value="Unesite opis predmeta">
    </form>


    <?php
}
?>
<?php
$upit101 = "SELECT * FROM predmeti WHERE id_predmeta='$id'";
$upit102 = mysqli_query($conn, $upit101);
$rezultat10 = mysqli_fetch_assoc($upit102);
echo "Opis predmeta";
echo "<br>";
echo $rezultat10["opis_predmeta"];
?>
</body>
</html>