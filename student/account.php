  <?php

  ob_start();
  session_start();

  //checking if the session is valid
  if($_SESSION['name']!='oasis')
  {
    header('location: ../login.php');
  }
  ?>

  <?php include('connect.php');?>


<?php 
try{

         //checking form data and empty fields
          if(isset($_POST['done'])){

          if (empty($_POST['name'])) {
            throw new Exception("Name cannot be empty");
            
          }
              if (empty($_POST['dept'])) {
               
                throw new Exception("Department cannot be empty");
                
              }
                  if(empty($_POST['batch']))
                  {
                    throw new Exception("Batch cannot be empty");
                    
                  }
                      if(empty($_POST['email']))
                      {
                        throw new Exception("Email cannot be empty");
                        
                      }

  //initializing the student id
  $sid = $_POST['id'];

  //udating students information to database table "students"
  $result = mysqli_query($conn,"update students set st_name='$_POST[name]',st_dept='$_POST[dept]',st_batch='$_POST[batch]',st_sem='$_POST[semester]', st_email = '$_POST[email]' where st_id='$sid'");
  $success_msg = 'Updated  successfully';
  
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
<body class="bg" style="color:white;">

<!-- Menus started-->
<header>

  <h1 class="text text-center">Systeme de gestion d'absences HEM</h1>
  <div class="navbar">
  <a href="index.php" style="text-decoration:none;">Accueil</a>
  <a href="students.php" style="text-decoration:none;">Etudiants</a>
  <a href="report.php" style="text-decoration:none;">Mon rapport etudiant</a>
  <a href="account.php" style="text-decoration:none;">Mon compte</a>
  <a href="../logout.php" style="text-decoration:none;">Se deconnecter</a>

</div>

</header>
<!-- Menus ended -->

<!-- Content, Tables, Forms, Texts, Images started -->
<center>

<div class="row">
    <div class="content">

          <h3>Mis a jour compte</h3>
          <br>
          
          <!-- Error or Success Message printint started --><p>
      <?php

          if(isset($success_msg))
          {
            echo $success_msg;
          }
          if(isset($error_msg))
          {
            echo $error_msg;
          }

        ?>
          </p><!-- Error or Success Message printint ended -->

          <br>
   
          <form method="post" action="" class="form-horizontal col-md-6 col-md-offset-3">
            <div class="form-group">
                <label for="input1" class="col-sm-3 control-label">numero d'etudiant.</label>
                <div class="col-sm-7">
                  <input type="text" name="sr_id"  class="form-control" id="input1" placeholder="Entrez votre numero etudiant" />
                </div>
            </div>
            <input type="submit" class="btn col-md-3 col-md-offset-7" style="border-radius:5%;background-color:black;color:white;" value="Go!" name="sr_btn" />
          </form>
          <div class="content"></div>


      <?php

      if(isset($_POST['sr_btn'])){

      //initializing student ID from form data
       $sr_id = $_POST['sr_id'];

       $i=0;

       //searching students information respected to the particular ID
       $all_query = mysqli_query($conn,"select * from students where students.st_id='$sr_id'");
       while ($data = mysqli_fetch_array($all_query)) {
         $i++;
       
       ?>
<form action="" method="post" class="form-horizontal col-md-6 col-md-offset-3">
   <table class="table table-striped">
  
          <tr>
            <td>numero d'etudiant:</td>
            <td><?php echo $data['st_id']; ?></td>
          </tr>

          <tr>
              <td>Nom d'etudiant:</td>
              <td><input type="text" name="Nom" value="<?php echo $data['st_name']; ?>"></input></td>
          </tr>

          <tr>
              <td>Campus HEM ou il etudie:</td>
              <td><input type="text" name="Campus" value="<?php echo $data['st_dept']; ?>"></input></td>
          </tr>

          <tr>
              <td>Annee:</td>
              <td><input type="text" name="annee" value="<?php echo $data['st_batch']; ?>"></input></td>
          </tr>
          
          <tr>
              <td>Semestre:</td>
              <td><input type="text" name="Semestre" value="<?php echo $data['st_sem']; ?>"></input></td>
          </tr>

          <tr>
              <td>Email:</td>
              <td><input type="text" name="email" value="<?php echo $data['st_email']; ?>"></input></td>
          </tr>
          <input type="hidden" name="id" value="<?php echo $sr_id; ?>">
          
          <tr><td></td></tr>
          <tr>
                <td></td>
                <td><input type="submit"  style="border-radius:5%;background-color:black;color:white;" class="btn col-md-3 col-md-offset-7" value="Update" name="Soumettre" /></td>
                
          </tr>

    </table>
</form>
     <?php 
   } 
     }  
     ?>


      </div>

  </div>

  </center>
<!-- Contents, Tables, Forms, Images ended -->

</body>
<!-- Menus ended -->

</html>
