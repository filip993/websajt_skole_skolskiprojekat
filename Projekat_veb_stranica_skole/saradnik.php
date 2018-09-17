<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <style>
        select {
            width: 50%;
            padding: 16px 20px;
            border: none;
            border-radius: 4px;
            background-color: #f1f1f1;
        }
        textarea {
            background-color: lightblue;
        }
    </style>
</head>
<body>

<?php
include "baza.PHP";
echo "<h> Dodajte saradnika </h>";
if (isset($_SESSION["administrator"]) && !empty($_SESSION["administrator"])) {
    if (isset($_POST["ime"]) && isset($_POST["prezime"]) && isset($_POST["email"]) && isset($_POST["o_saradniku"]) && isset($_POST["password"]) && isset($_POST["user_name"]) && isset($_POST["zanimanje"]) && !empty($_POST["password"]) && !empty($_POST["user_name"]) && !empty($_POST["zanimanje"]) && !empty($_POST["ime"]) && !empty($_POST["prezime"]) && !empty($_POST["email"]) && !empty($_POST["o_saradniku"])) {
        $ime = $_POST["ime"];
        $prezime = $_POST["prezime"];
        $user_name = $_POST["user_name"];
        $password = $_POST["password"];
        $email = $_POST["email"];
        $zanimanje = $_POST["zanimanje"];
        $o_saradniku = $_POST["o_saradniku"];
        $upit2 = "SELECT email FROM registracija WHERE email= '$email'";
        $upit3 = mysqli_query($conn, $upit2);
        if (mysqli_num_rows($upit3) == 1) {
            echo "Vec ste registrovani!";
        } else if (mysqli_num_rows($upit3) == 0) {
            $sql = "INSERT INTO registracija (ime, prezime, user_name, email, password, zanimanje, o_saradniku)
      VALUES ('$ime','$prezime','$user_name', '$email', '$password', '$zanimanje' , '$o_saradniku')";
            if (mysqli_query($conn, $sql)) {

                echo " Registrovali ste saradnika $user_name";
            }

        } else {
            echo "Greska:" . $sql . "<br>" . mysqli_error($conn);
        }
    }

    ?>
    <form method="post" action="index.PHP"><br> <br>
        <input type="text" name="ime" required="required" placeholder="Ime"> <br> <br>
        <input type="text" name="prezime" required="required" placeholder="Prezime"> <br> <br>
        <input type="text" name="user_name" required="required" placeholder="user_name"> <br> <br>
        <input type="email" name="email" required="required" placeholder="Email"> <br> <br>
        <input type="password" name="password" required="required" placeholder="Password"> <br> <br>
        <select name="zanimanje" required="required">
            <option value="1"> administrator</option>
            <option value="2"> saradnik</option>
        </select> <br> <br>
        <textarea name="o_saradniku" id="" cols="30" rows="10" placeholder="Napisite nesto o saradniku"></textarea>
        <input type="submit" value="Posalji">
    </form>
    <?php
}
?>
</body>
</html>
