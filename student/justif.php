<?php

ob_start();
session_start();
if($_SESSION['name']!='oasis')
{
  header('location: ../index.php');
}
include_once('../connect.php');
if(isset($_POST['submit'])){
    $name = $_POST['Name'];
    $email = $_POST['Email'];
    $ext = substr($_FILES['justif']['name'],strpos($_FILES['justif']['name'],"."),strlen($_FILES['justif']['name']));
    echo $ext;
    $file = str_replace($_FILES['justif']['name'],$_FILES['justif']['name'],$_POST['Name']).$ext;
    move_uploaded_file($_FILES['justif']['tmp_name'],$file);
    $str = "INSERT INTO `jusitif`(`Name`, `Email`, `Jusitf`) VALUES ('$name','$email','$file')";
    $strs = mysqli_query($conn,$str);
    if(!$strs){
        echo "error";
    }else{
      echo"<script>alert('Justification envoyé avec succés')</script>";
    }
};
?>

<!DOCTYPE html>
<html lang="en">

<!-- head started -->
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<!-- head ended -->

<!-- body started -->
<body class="bg" style="color:white;">

<!-- Menus started-->
<header>

  <h1 style="text-align:center;">Systeme de gestion d'absences HEM</h1>
  <div class="navbar">
  <a href="index.php" style="text-decoration:none;">Accueil</a>
  <a href="students.php" style="text-decoration:none;">Etudiant</a>
  <a href="report.php" style="text-decoration:none;">Mon rapport etudiant</a>
  <a href="account.php" style="text-decoration:none;">Mon compte</a>
  <a href="justif.php" style="text-decoration:none;">Justifications</a>
  <a href="../logout.php" style="text-decoration:none;">Se deconnecter</a>

</div>

</header>
<!-- Menus ended -->

<center>

<!-- Content, Tables, Forms, Texts, Images started -->
<div style="width: 50%;" class=" d-flex flex-column  form">
    <h3>Justifier votre absence</h3>
    <form  method="post" enctype="multipart/form-data">
        <div class="form-group" style="display:flex; margin-bottom:10px; flex-direction:column;">
                <label for="Name" class="form-label" style="align-self:flex-start;">Name</label>
                <input type="text" class="form-control w-50" name="Name" id="Name" download>
        </div>
        <div class="form-group" style="display:flex;margin-bottom:10px; flex-direction:column;">
                <label for="Email" class="form-label" style="align-self:flex-start;">Email</label>
                <input type="email" class="form-control" name="Email" id="Email" download>
        </div>
        <div class="form-group" style="display:flex;margin-bottom:10px; flex-direction:column;">
                <label for="justif" class="form-label" style="align-self:flex-start;">Upload file</label>
                <input type="file" class="form-control" name="justif" id="justif" download>
        </div>

        <div class="form-group" style="display:flex;margin-bottom:10px; flex-direction:column;">
                <input type="submit" class="form-control" style="border-radius:5%;background-color:black;color:white;" name="submit" id="submit" download>
        </div>
        
    </form>

</div>
<!-- Contents, Tables, Forms, Images ended -->

</center>

</body>
<!-- Body ended  -->

</html>