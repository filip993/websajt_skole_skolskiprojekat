<?php
$servername = "localhost";
$username = "root";
$password = "";
$baza = "projekat";
$conn = mysqli_connect($servername, $username, $password, $baza) or die("Nije uspesno konektovanje na bazu podataka");
if (isset($_POST["user_name"]) && isset($_POST["ime"]) && isset($_POST["prezime"]) && isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["zanimanje"])) {
    $user_name = $_POST["user_name"];
    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $zanimanje = $_POST["zanimanje"];

    $upit2 = "SELECT email FROM registracija WHERE email= '$email'";
    $upit3 = mysqli_query($conn, $upit2);
    if (mysqli_num_rows($upit3) == 1) {
        echo "<p style=\"color:red\"> Vec ste registrovani !</p>";
    } else {

        $sql = "INSERT INTO registracija (ime, prezime, user_name, email, password, zanimanje)
      VALUES ('$ime','$prezime','$user_name', '$email', '$password', '$zanimanje')";
        if (mysqli_query($conn, $sql)) {

            echo " Registrovali ste se $user_name";
        }
    }
} else {
    echo "Greska: " . $sql . "<br>" . mysqli_error($conn);
}

?>


