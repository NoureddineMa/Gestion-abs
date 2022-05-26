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

</head>
<body class="bg" style="color:white;">

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
    <h3>Rapport individuel</h3>

    <form method="post" action="">

    <label>Choisir matiere</label>
    <select name="whichcourse">
    <option  value="algo">Programmation web</option>
         <option  value="algolab">Rcherche operationnelle</option>
        <option  value="dbms">Droit</option>
        <option  value="dbmslab">Anglais</option>
        <option  value="weblab">Sql</option>
        <option  value="os">developpement mobile</option>
        <option  value="oslab">Francais</option>
    </select>

      <p>  </p>
      <label>Numero de l'etudiant</label>
      <input type="text" name="sr_id">
      <input type="submit" name="sr_btn"  style="border-radius:5%;background-color:black;color:white;" value="Go!" >

    </form>

    <h3>Rapport de toute la classe</h3>

    <form method="post" action="">

    <label>Choisir matiere</label>
    <select name="course">
    <option  value="algo">Programmation web</option>
         <option  value="algolab">Rcherche operationnelle</option>
        <option  value="dbms">Droit</option>
        <option  value="dbmslab">Anglais</option>
        <option  value="weblab">Sql</option>
        <option  value="os">developpement mobile</option>
        <option  value="oslab">Francais</option>
    </select>
    <p>  </p>
      <label>Date ( yyyy-mm-dd )</label>
      <input type="text" name="date">
      <input type="submit" name="sr_date" style="border-radius:5%;background-color:black;color:white;"  value="Go!" >
    </form>

    <br>

    <br>

   <?php

    if(isset($_POST['sr_btn'])){

     $sr_id = $_POST['sr_id'];
     $course = $_POST['whichcourse'];

     $single = mysqli_query($conn,"select stat_id,count(*) as countP from attendance where attendance.stat_id='$sr_id' and attendance.course = '$course' and attendance.st_status='Present'");
      $singleT= mysqli_query($conn,"select count(*) as countT from attendance where attendance.stat_id='$sr_id' and attendance.course = '$course'");
    //  $count_tot = mysqli_num_rows($singleT);
  } 

    if(isset($_POST['sr_date'])){

     $sdate = $_POST['date'];
     $course = $_POST['course'];

     $all_query = mysqli_query($conn,"select * from attendance where reports.stat_date='$sdate' and reports.course = '$course'");

    }
    if(isset($_POST['sr_date'])){

      ?>

    <table class="table table-stripped">
      <thead>
        <tr>
          <th scope="col">Numero d'etudiant.</th>
          <th scope="col">nom</th>
          <th scope="col">Campus</th>
          <th scope="col">Annee</th>
          <th scope="col">Date</th>
          <th scope="col">Statut de l'absence</th>
        </tr>
     </thead>


    <?php

     $i=0;
     while ($data = mysqli_fetch_array($all_query)) {

       $i++;

     ?>
        <tbody>
           <tr>
             <td><?php echo $data['st_id']; ?></td>
             <td><?php echo $data['st_name']; ?></td>
             <td><?php echo $data['st_dept']; ?></td>
             <td><?php echo $data['st_batch']; ?></td>
             <td><?php echo $data['stat_date']; ?></td>
             <td><?php echo $data['st_status']; ?></td>
           </tr>
        </tbody>

     <?php 
   } 
  }
     ?>
     
    </table>


    <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
    <table class="table bg-primary">

    <?php


    if(isset($_POST['sr_btn'])){

       $count_pre = 0;
       $i= 0;
       $count_tot;
       if ($row=mysqli_fetch_row($singleT))
       {
       $count_tot=$row[0];
       }
       while ($data = mysqli_fetch_array($single)) {
       $i++;
       
       if($i <= 1){
     ?>


     <tbody>
      <tr>
          <td>Numero d'etudiant </td>
          <td><?php echo $data['stat_id']; ?></td>
      </tr>

           <?php
         //}
        
        // }

      ?>
      
      <tr>
        <td>Total de cours : </td>
        <td><?php echo $count_tot; ?> </td>
      </tr>

      <tr>
        <td>Present  </td>
        <td><?php echo $data[1]; ?> </td>
      </tr>

      <tr>
        <td>Absent  </td>
        <td><?php echo $count_tot -  $data[1]; ?> </td>
      </tr>

    </tbody>

   <?php

     }  
    }}
     ?>
    </table>
  </form>

  </div>

</div>

</center>

</body>
</html>
