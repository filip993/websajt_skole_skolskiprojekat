<!DOCTYPE>
<html>
<head>
    <style>
        body {
            background-color: lightblue;
        }
        .odvojeno {
            float: right;
        }
        table, th, td {
            text-align: left;
            border: 1px solid black;
            border-collapse: collapse;
            background:ghostwhite;
        }
        td:hover{background-color:#8B0000}
        input[type=text]:focus {
            background-color: lightblue;
        }
        input[type=email]:focus {
            background-color: lightblue;
        }
        input[type=password]:focus {
            background-color: lightblue;
        }
        input[type=button], input[type=submit] {
            background-color: #4CAF50;
            border: none;
            color: blue;
            padding: 4px 6px;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
<table style="width:100%">
    <tr>
        <td><a href="http://localhost/V5/ee.php" target="_blank"> Programiranje veb aplikacija </a> <br>
            <b> Datum: </b> 18.5.2016. 19:30 <br>
            <b> Laboratorija: </b> 403 <br>
            <a href="file:///C:/Users/filip_000/Desktop/PVA/vezba4.html" target="_blank"> Vezba 4 </a></td>
        <td><b> Saradnik: </b> <br> <a href="file:///C:/Users/filip_000/Desktop/PVA/saradnik.html" target="_blank">
                dipl.inz.Bosko Bogojevic </a></td>
    </tr>
    <tr>
        <td><a href="http://localhost/V5/tt.php" target="_blank"> Objektno orijentisano projektovanje </a> <br>
            <b> Datum: </b> 18.05.2016. 19:30 <br>
            <b> Laboratorija </b> 209 <br>
            <a href="file:///C:/Users/filip_000/Desktop/PVA/vezbaa4.html" target="_blank"> Vezba 4 </a></td>
        <td><b> Saradnik: </b> <br> <a href="file:///C:/Users/filip_000/Desktop/PVA/saradnik2.html" target="_blank">
                spec.Dusan Coko</td>
    </tr>

</table>
<br>
<br>
<?php
require "baza.php";
include "core.php";
echo "<br>";
if (ulogovan()) {
    echo "Ulogovani ste!  <a href=\"logout.php\"> Izlogujte se </a>";
    echo "<br> <br>";
    echo "<div class='odvojeno'>";
    include "saradnik.php"; echo "</div>";

    $upit5 = 'SELECT zanimanje FROM registracija WHERE id=' . $_SESSION["id"] . ' AND zanimanje = 1 ';
    $upit6 = mysqli_query($conn, $upit5);
    if (mysqli_num_rows($upit6) > 0) {
        $upit7 = mysqli_fetch_assoc($upit6);
        $za = $upit7["zanimanje"];
        $_SESSION["administrator"] = $za;
        echo '<a href="proba.php">Proverite kako ste ulogovani!</a>';
        echo "<br> <br> ";
        include "izmena_lozinke.php";
    }
    $upit7 = "SELECT zanimanje FROM registracija WHERE id = '" . $_SESSION["id"] . "' AND zanimanje = 2 ";
    $upit8 = mysqli_query($conn, $upit7);
    if (mysqli_num_rows($upit8) > 0) {
        $upit10 = mysqli_fetch_assoc($upit8);
        $z = $upit10["zanimanje"];
        $_SESSION["saradnik"] = $z;
        echo '<a href="proba.php">Proverite kako ste ulogovani!</a>';
    }
} else {
    echo "<strong> Registrujte se!";
    include "registracija.php";
    echo "<br><br>";
    echo " <strong> Ulogujte se!";
    include "login.PHP";


}
?>

<?php include "predmet.php"; ?>
</body>
</html>