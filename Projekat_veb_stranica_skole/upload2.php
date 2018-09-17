<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
include "baza.PHP";
if (isset($_SESSION["administrator"]) && !empty($_SESSION["administrator"])) {


    if (isset($_FILES ["file"]["name"]) && !empty($_FILES ["file"]["name"])) {
        $name = $_FILES ["file"]["name"];
        $extension = strtolower(substr($name, strpos($name, '.') + 1));
        //$size=$_FILES["file"] ["size"];
        $type = $_FILES["file"] ["type"];
        $tmp_name = $_FILES ["file"] ["tmp_name"];
        //$error=$_FILES["file"] ["error"];

        if (isset($name) && !empty($name)) {
            if (($extension == "pdf" || $extension == "zip" || $extension == "ppt" || $extension == "pptx" || $extension == "xls" || $extension == "xlsx" || $extension == "doc" || $extension == "docx")) {
                $location = "uploads/";
                move_uploaded_file($tmp_name, $location . $name);
                $id_saradnika = $_SESSION["id"];
                $id_vezbe = $_POST["vezba_id"];
                $upit = "INSERT INTO dokumenti (naziv_dokumenta, id_vezbe,id_saradnika) VALUES ('$name' , '$id_vezbe', '$id_saradnika'  )";
                $upit2 = mysqli_query($conn, $upit);


                echo "Uploaded!";
            } else {
                echo "Nije dozvoljen taj fajl!";
            }


        }
    }

    ?>

    <form action="<?php echo "Ovezbi.php?id=" . $_GET["id"]; ?>" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="vezba_id" value="<?php echo $_GET["id"]; ?> ">
        <input type="file" name="file">
        <input type="submit" value="Postavite dokument">

    </form>
    <?php
}
?>
<ul>
    <?php
    if (isset($_GET["id"]) && !empty($_GET["id"])) {
        $id = $_GET["id"];
        $upit = "SELECT * FROM dokumenti WHERE id_vezbe= '$id' ";
        $upit2 = mysqli_query($conn, $upit);
        while ($rez = mysqli_fetch_assoc($upit2)) {
            ?>
            <li><a href="/kurtaj/uploads/<?php echo $rez['naziv_dokumenta']; ?>"
                   target="_blank"> <?php echo $rez['naziv_dokumenta']; ?> </a>
                <button data-id="<?php echo $rez['id']; ?>" style="margin-left: 30px;" class="dugme_brisanje_dokumenta">
                    Izbrisi fajl
                </button>
            </li>
            <?php
        }
    }
    ?>
</ul>
<script src="js/jquery-3.1.0.min.js"></script>
<script>
    $(".dugme_brisanje_dokumenta").on("click", function () {
        var id_dokumenta = $(this).attr("data-id");
        var dugme = this;
        if (window.confirm("Da li ste sigurni da zelite da obrisete?")) {
            $.ajax({
                url: "brisanjeVezbe.php",
                type: "POST",
                data: {id: id_dokumenta},
                success: function () {
                    var list = $(dugme).parent();
                    list.remove();
                    alert("Uspesno ste obrisali dokument");
                }, error: function (res) {
                    console.log(res)
                }
            });
        }
    });
</script>
</body>
</html>