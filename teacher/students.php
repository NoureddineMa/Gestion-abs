<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>
<?php include('connect.php');?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Attendance Management System</title>
<meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="../css/main.css">
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" >
   
  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >
   
  <link rel="stylesheet" href="styles.css" >
   
  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</style>

</head>
<body class="bg" style="color:white;">

<header>

  <h1>Systeme de gestion des absences HEM</h1>
  <div class="navbar">
  <a href="index.php" style="text-decoration:none;">Accueil</a>
  <a href="students.php" style="text-decoration:none;">Etudiants</a>
  <a href="teachers.php" style="text-decoration:none;">Campus HEM</a>
  <a href="attendance.php" style="text-decoration:none;">Gestion des absences</a>
  <a href="report.php" style="text-decoration:none;">Rapport des etudiants</a>
  <a href="../logout.php" style="text-decoration:none;">Se deconnecter</a>


</div>

</header>

<center>

<div class="row">

  <div class="content">
    <h3>Liste des etudiants</h3>
    <br>
    <form method="post" action="">
      <label>Annee</label>
      <input type="text" name="sr_batch">
      <input type="submit" name="sr_btn"  style="border-radius:5%;background-color:black;color:white;" class="btn" style="border-radius:0%" value="Rechercher" >
    </form>
    <br>
    <table class="table bg-primary">
      <thead>
        <tr>
          <th scope="col">Numero d'etudiant.</th>
          <th scope="col">Nom</th>
          <th scope="col">Campus HEM</th>
          <th scope="col">Annee</th>
          <th scope="col">Semestre</th>
          <th scope="col">Mail</th>
        </tr>
      </thead>

   <?php

    if(isset($_POST['sr_btn'])){
     
     $srbatch = $_POST['sr_batch'];
     $i=0;
     
     $all_query = mysqli_query($conn,"select * from students where students.st_batch = '$srbatch' order by st_id asc ");
     
     while ($data = mysqli_fetch_array($all_query)) {
       $i++;
     
     ?>
  <tbody>
     <tr>
       <td><?php echo $data['st_id']; ?></td>
       <td><?php echo $data['st_name']; ?></td>
       <td><?php echo $data['st_dept']; ?></td>
       <td><?php echo $data['st_batch']; ?></td>
       <td><?php echo $data['st_sem']; ?></td>
       <td><?php echo $data['st_email']; ?></td>
     </tr>
  </tbody>

     <?php 
          } 
              }
      ?>
      
    </table>

  </div>

</div>

</center>

</body>
</html>
