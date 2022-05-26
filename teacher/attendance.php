<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{
  header('location: login.php');
}
?>

<?php
    include('connect.php');
    try{
      
    if(isset($_POST['att'])){

      $course = $_POST['whichcourse'];

      foreach ($_POST['st_status'] as $i => $st_status) {
        
        $stat_id = $_POST['stat_id'][$i];
        $dp = date('Y-m-d');
        $course = $_POST['whichcourse'];
        
        $stat = mysqli_query($conn,"insert into attendance(stat_id,course,st_status,stat_date) values('$stat_id','$course','$st_status','$dp')");
        
        $att_msg = "Attendance Recorded.";

      }



    }
  }
  catch(Exception $e){
    $error_msg = $e->$getMessage();
  }
 ?>

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


<style type="text/css">
  .status{
    font-size: 10px;
  }

</style>

</head>
<body class="bg" style="color:white;">

<header>

  <h1>Gestion des absences</h1>
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
    <h3>Date de <?php echo date('Y-m-d'); ?></h3>
    <br>

    <center><p><?php if(isset($att_msg)) echo $att_msg; if(isset($error_msg)) echo $error_msg; ?></p></center> 
    
    <form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">

     <div class="form-group">

               <!-- <label>Select Batch</label>
                
                <select name="whichbatch" id="input1">
                      <option name="eight" value="38">38</option>
                      <option name="seven" value="37">37</option>
                </select>-->


                <label>entrez l'annee</label>
                <input type="text" name="whichbatch" id="input2" placeholder="Entrez la date">
              </div>
               
     <input type="submit"  style="border-radius:5%;background-color:black;color:white;" class="btn col-md-2 col-md-offset-5" style="border-radius:0%" value="Rechercher" name="batch" />

    </form>

    <div class="content"></div>
    <form action="" method="post">

      <div class="form-group">

        <label >Choisir matiere</label>
              <select name="whichcourse" id="input1">
              <option  value="algo">Programmation web</option>
         <option  value="algolab">Rcherche operationnelle</option>
        <option  value="dbms">Droit</option>
        <option  value="dbmslab">Anglais</option>
        <option  value="weblab">Sql</option>
        <option  value="os">developpement mobile</option>
        <option  value="oslab">Francais</option>
              </select>

      </div>

    <table class="table bg-primary">
      <thead>
        <tr>
          <th scope="col">numero etudiant.</th>
          <th scope="col">Nom</th>
          <th scope="col">Campus</th>
          <th scope="col">année</th>
          <th scope="col">Semestre</th>
          <th scope="col">Email</th>
          <th scope="col">Statut de l'etudiant</th>
        </tr>
      </thead>
   <?php

    if(isset($_POST['batch'])){

     $i=0;
     $radio = 0;
     $batch = $_POST['whichbatch'];
     $all_query = mysqli_query($conn,"select * from students where students.st_batch = '$batch' order by st_id asc");

     while ($data = mysqli_fetch_array($all_query)) {
       $i++;
     ?>
  <body>
     <tr>
       <td><?php echo $data['st_id']; ?> <input type="hidden" name="stat_id[]" value="<?php echo $data['st_id']; ?>"> </td>
       <td><?php echo $data['st_name']; ?></td>
       <td><?php echo $data['st_dept']; ?></td>
       <td><?php echo $data['st_batch']; ?></td>
       <td><?php echo $data['st_sem']; ?></td>
       <td><?php echo $data['st_email']; ?></td>
       <td>
         <label>Present</label>
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Present" >
         <label>Absent </label>
         <input type="radio" name="st_status[<?php echo $radio; ?>]" value="Absent" checked>
       </td>
     </tr>
  </body>

     <?php

        $radio++;
      } 
}
      ?>
    </table>

    <center><br>
    <input type="submit"  style="border-radius:5%;background-color:black;color:white;" class="btn  col-md-2 col-md-offset-10" value="Enregistrer" name="att" />
  </center>

</form>
  </div>

</div>

</center>

</body>
</html>
