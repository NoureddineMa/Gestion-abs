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
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../css/main.css">

</head>
<body class="bg" style="color:white;">

<header>

  <h1 class="">Systeme de gestion d'absences HEM</h1>
  <div class="navbar">
  <a href="index.php" style="text-decoration:none;">Accueil</a>
  <a href="students.php" style="text-decoration:none;">Etudiants</a>
  <a href="teachers.php" style="text-decoration:none;">Campus HEM</a>
  <a href="attendance.php" style="text-decoration:none;">Gestion des absences</a>
  <a href="report.php" style="text-decoration:none;">Rapport des etudiants</a>
  <a href="../logout.php" style="text-decoration:none;">Se déconnecter</a>

</div>

</header>

<center>

<div class="row">
    <div class="content">
<p class="text-white"> FICHE DE COORDINATION PEDAGOGIQUE 2ANEE </p>
<a href="download.php" class="telech" > Telechager le fichier ... </a>

  </div>

</div>

</center>

</body>
</html>
