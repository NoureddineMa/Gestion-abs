<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: ../index.php');
}
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
<body class="bg">

<!-- Menus started-->
<header>

  <h1 class="text  text-center">Systeme de gestion d'absences HEM</h1>
  <div class="navbar ">
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
<div class="column">
    <div class="content">
    
    <img src="../img/att.png" width="400px" />

  </div>

</div>
<!-- Contents, Tables, Forms, Images ended -->

</center>

</body>
<!-- Body ended  -->

</html>
