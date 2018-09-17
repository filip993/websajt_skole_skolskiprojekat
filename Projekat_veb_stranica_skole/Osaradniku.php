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
if(isset($_GET["id"]) && !empty($_GET["id"])) {
    $id=$_GET["id"];

    $upit="SELECT * FROM registracija WHERE id='$id'";
    $upit2=mysqli_query($conn,$upit);
    $rezultat=mysqli_fetch_assoc($upit2);
    $rezultat1=$rezultat["ime"];
    $rezultat2=$rezultat["prezime"];
    echo "<p style=\"font-weight:bold; font-size: 125%  \">  $rezultat1 $rezultat2 </p>";
    $rezultat3 =$rezultat["o_saradniku"];
    echo "<p style=\"font-style:italic;  \">  $rezultat3</p>";
    echo " ";
    echo "Email saradnika za kontakt saradnika: ";
    echo $rezultat["email"];
    echo "<br> <br>";
    $upit3 = "SELECT DISTINCT naziv_predmeta FROM predmeti JOIN saradnici ON predmeti.id_predmeta = saradnici.id_predmeta  WHERE saradnici.id_korisnika = " . $id . " ";
    $upit4=mysqli_query($conn,$upit3);
    while ($rezultat5=mysqli_fetch_assoc($upit4)) {
        $rezultat6 = $rezultat5["naziv_predmeta"];
        echo $rezultat6;
        echo "<br>";
    }
    
}
?>

<?php
if (isset($_SESSION["saradnik"]) && !empty($_SESSION["saradnik"])) {
$upit5="SELECT * FROM registracija WHERE id='$id' AND id='" . $_SESSION["id"] . "' ";
$upit6=mysqli_query($conn,$upit5);
    if (mysqli_num_rows($upit6) == 1) {
     $upit7 = mysqli_fetch_assoc($upit6);


        ?>
     <form action=" <?php echo "Osaradniku.php?id=" . $_GET["id"]; ?> " method="POST" > <br>
         <textarea name="osaradniku" placeholder="Promenite svoju biografiju" cols="30" rows="10"></textarea> <br>
         <input type="submit" value="Promeni o sebi">
     </form>
<?php

}
}
?>
<?php
if(isset($_POST["osaradniku"]) && !empty($_POST["osaradniku"])) {
    $osaradniku=$_POST["osaradniku"];
    $upit8="UPDATE registracija SET o_saradniku= '$osaradniku' WHERE id='" . $_SESSION["id"] . "'";
    if (mysqli_query($conn, $upit8)) {
        echo "Uspesno apdejtovano, Refresh-ujte stranicu  da vidite rezultat";
    } else {
        echo "Greska pri apdejtovanju " . mysqli_error($conn);
    }
}
echo "<br> <br>";
include "proba.PHP";
?>
<?php
if (isset($_SESSION["administrator"]) && !empty($_SESSION["administrator"])) {
    echo "<br> <br>";

    if(isset($_POST["ime"]) && !empty($_POST["ime"])) {
        $id=$_GET["id"];
        $ime=$_POST["ime"];
        $upit20="UPDATE registracija SET ime='$ime' WHERE id='$id'";
        if (mysqli_query($conn, $upit20)) {
            echo "Uspesno apdejtovano, Refresh-ujte stranicu  da vidite rezultat";
        } else {
            echo "Greska pri apdejtovanju " . mysqli_error($conn);
        }

    }
    if(isset($_POST["prezime"]) && !empty($_POST["prezime"])) {
        $id=$_GET["id"];
        $prezime=$_POST["prezime"];
        $upit21="UPDATE registracija SET prezime='$prezime' WHERE id='$id'";
        if (mysqli_query($conn, $upit21)) {
            echo "Uspesno apdejtovano, Refresh-ujte stranicu  da vidite rezultat";
        } else {
            echo "Greska pri apdejtovanju " . mysqli_error($conn);
        }
    }
    if(isset($_POST["email"]) && !empty($_POST["email"])) {
        $id=$_GET["id"];
        $email=$_POST["email"];
        $upit22="UPDATE registracija SET email='$email' WHERE id='$id'";
        if (mysqli_query($conn, $upit22)) {
            echo "Uspesno apdejtovano, Refresh-ujte stranicu  da vidite rezultat";
        } else {
            echo "Greska pri apdejtovanju " . mysqli_error($conn);
        }
    }
    if(isset($_POST["o_saradniku"]) && !empty($_POST["o_saradniku"])) {
        $id=$_GET["id"];
        $o_saradniku=$_POST["o_saradniku"];
        $upit23="UPDATE registracija SET o_saradniku='$o_saradniku' WHERE id='$id'";
        if (mysqli_query($conn, $upit23)) {
            echo "Uspesno apdejtovano, Refresh-ujte stranicu  da vidite rezultat";
        } else {
            echo "Greska pri apdejtovanju " . mysqli_error($conn);
        }
    }

    ?>
    Promenite informacije o saradniku!
    <form action=" <?php echo "Osaradniku.php?id=" . $_GET["id"]; ?> " method="post"><br> <br>
        <input type="text" name="ime" placeholder="Ime"> <br> <br>
        <input type="text" name="prezime" placeholder="Prezime"> <br> <br>
        <input type="email" name="email" placeholder="Email"> <br> <br>
        <textarea name="o_saradniku" cols="30" rows="10" placeholder="Promenite biografiju saradnika"></textarea> <br>
        <input type="submit" value="Promeni informacije o saradniku">
    </form>
    <?php
}
?>

</body>
</html>


