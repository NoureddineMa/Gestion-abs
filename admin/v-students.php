<?php

ob_start();
session_start();

if($_SESSION['name']!='oasis')
{

  header('location: ../index.php');
}
?>


<?php

//establishing connection
include('connect.php');

  try{

    //validation of empty fields
      if(isset($_POST['signup'])){

        if(empty($_POST['email'])){
          throw new Exception("Email cann't be empty.");
        }

          if(empty($_POST['uname'])){
             throw new Exception("Username cann't be empty.");
          }

            if(empty($_POST['pass'])){
               throw new Exception("Password cann't be empty.");
            }
              
              if(empty($_POST['fname'])){
                 throw new Exception("Username cann't be empty.");
              }
                if(empty($_POST['phone'])){
                   throw new Exception("Username cann't be empty.");
                }
                  if(empty($_POST['type'])){
                     throw new Exception("Username cann't be empty.");
                  }

        //insertion of data to database table admininfo
        $result = mysqli_query($conn,"insert into admininfo(username,password,email,fname,phone,type) values('$_POST[uname]','$_POST[pass]','$_POST[email]','$_POST[fname]','$_POST[phone]','$_POST[type]')");
        $success_msg="Signup Successfully!";

  
  }
}
  catch(Exception $e){
    $error_msg =$e->getMessage();
  }

?>

<!DOCTYPE html>
<html lang="en">

<!-- head started -->
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
<!-- head ended -->

<!-- body started -->
<body class="bg" style="color:black;">

    <!-- Menus started-->
    <header>

      <h1 style ="color:white !important;">Systeme de gestion des absences HEM</h1>
      <div class="navbar">
        <a href="signup.php" style="text-decoration:none;">Creer utilisateurs</a>
        <a href="index.php" style="text-decoration:none;">Ajouter professeur/etudiant</a>
        <a href="v-students.php" style="text-decoration:none;">voir etudiants</a>
      <a href="v-teachers.php" style="text-decoration:none;">voir professeurs</a>
        <a href="../logout.php" style="text-decoration:none;">Se deconnecter</a>
      </div>

    </header>
    <!-- Menus ended -->

<center>
<h1 style ="color:white !important;">Tous les etudiants</h1>

<div class="content">

  <div class="row">
   
    <table class="table bg-primary">
      
        <thead>
        <tr>
          <th scope="col">Numero d'etudiant</th>
          <th scope="col">Name</th>
          <th scope="col">Campus</th>
          <th scope="col">annee</th>
          <th scope="col">Semestre</th>
          <th scope="col">Email</th>
        </tr>
        </thead>
     <?php
       
       $i=0;
       
       $all_query = mysqli_query($conn,"SELECT * from students ORDER BY st_id asc");
       
       while ($data = mysqli_fetch_array($all_query)) {
         $i++;
       
       ?>
  
       <tr>
         <td><?php echo $data['st_id']; ?></td>
         <td><?php echo $data['st_name']; ?></td>
         <td><?php echo $data['st_dept']; ?></td>
         <td><?php echo $data['st_batch']; ?></td>
         <td><?php echo $data['st_sem']; ?></td>
         <td><?php echo $data['st_email']; ?></td>
       </tr>
  
       <?php 
            } 
              
        ?>
      </table>
    
  </div>
    

</div>

</center>

</body>
<!-- Body ended  -->

</html>
