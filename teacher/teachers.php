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
<body>

<header>

  <h1>Systeme de gestion d'absences HEM</h1>
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
    <h3>Liste de professeurs</h3>
    
    <table class="table table=stripped">
        <thead>  
          <tr>
            <th scope="col">Numero du professeur</th>
            <th scope="col">Nom</th>
            <th scope="col">Campus</th>
            <th scope="col">Email</th>
            <th scope="col">Matiere</th>
          </tr>
        </thead>

      <?php

        $i=0;
        $tcr_query = mysql_query("select * from teachers order by tc_id asc");
        while($tcr_data = mysql_fetch_array($tcr_query)){
          $i++;

        ?>
          <tbody>
              <tr>
                <td><?php echo $tcr_data['tc_id']; ?></td>
                <td><?php echo $tcr_data['tc_name']; ?></td>
                <td><?php echo $tcr_data['tc_dept']; ?></td>
                <td><?php echo $tcr_data['tc_email']; ?></td>
                <td><?php echo $tcr_data['tc_course']; ?></td>
              </tr>
          </tbody>

          <?php } ?>
          
    </table>

  </div>

</div>

</center>

</body>
</html>
