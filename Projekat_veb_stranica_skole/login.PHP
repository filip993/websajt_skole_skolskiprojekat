<?php
include "baza.php";
if (isset($_POST["user_name"]) && isset($_POST["email"]) && isset($_POST["password"])) {
    $user_name = $_POST["user_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];



    if (!empty($_POST["user_name"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        $upit = "SELECT id FROM registracija WHERE user_name= '$user_name' AND email='$email' AND password = '$password' ";
        if ($upit2 = mysqli_query($conn, $upit)) {
            $redovi = mysqli_num_rows($upit2);
            if ($redovi == 0) {
                echo "Pogresan username ili email ili lozinka!";
            } else if ($redovi == 1) {

                $row = mysqli_fetch_assoc($upit2);
                $id = $row["id"];


                $_SESSION["id"] = $id;
                header("Location:index.php");


            }
        }
    } else if (empty($_POST["user_name"]) or empty($_POST["email"])) {
        echo "Morate popuniti sva polja!";
    }
}

?>

<form action="index.PHP" method="POST">
    <input type="text" name="user_name" placeholder="user_name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <input type="submit" value="Ulogujte se">
</form>
