<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>


      <form action="index.PHP" method="post">
      <input type="text" name="lozinka" placeholder="Unesite lozinku" >
      <input type="submit" value="Promenite lozinku" >
      </form>


      <?php

      include "baza.PHP";
      if(isset($_POST["lozinka"]) && !empty($_POST["lozinka"])) {

          $nova_lozinka=$_POST["lozinka"];
          $upit="UPDATE registracija SET password='$nova_lozinka' WHERE id= '" . $_SESSION["id"] . "' ";
          $upit2=mysqli_query($conn,$upit);
          echo "Uspesno promenjena lozinka!";

      }



      ?>





</body>
</html>
