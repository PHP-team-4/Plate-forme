  
 

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>
 
  
<?php
     if(!isset($_SESSION)) 
     { 
         session_start(); 
     } 
 require 'config.php';

  
  if (isset($_POST['registerbtn'])) {
  
    function validate($data){
         $data = trim($data);
       $data = stripslashes($data);
       $data = htmlspecialchars($data);
       return $data;
    }
    $username=validate($_POST['username']);
    $email = validate($_POST['email']);
    $pass = validate($_POST['password']);
    $pass2=validate($_POST['confirmpassword']);
  
    $sql = "SELECT email FROM `employer` WHERE email='$email'";
    
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	
    if (empty($email) & empty($username)) {
    
      header("Location: ../register.php?erroradmin=User Name and Email is required");

        exit();
    }else if(empty($pass) && empty($pass2)){
      
      header("Location: ../register.php?erroradmin=Password is required");
        exit();
    }else{
      if($pass2!=$pass){
        
        header("Location: ../register.php?erroradmin= password is not matched");
        
      }elseif ($row['email']== $email){

        header("Location:../register.php?erroradmin=this email already exists");
			exit();
      } else {
        $sql = "INSERT INTO `employer`( `username`, `email`, `password`, `type`,`code`) VALUES ('$username','$email','$pass','admin',0)";
  
      $result = mysqli_query($conn, $sql);
    
      header("Location: ../register.php?erroradmin-successful=successful insertion a new Admin.");
      
            exit();
      }
      
    }	
  }
  
// ---------------Delete user or admin---------
if(isset($_POST['delete_btn'])){
  $id=$_POST['delete_id'];
   $rqt="DELETE FROM `employer` WHERE id_emp='$id'";
   $result = mysqli_query($conn, $rqt);
   header("Location: ../register.php?erroradmin-successful=successful Delete.");

}


//============articles============
if (isset($_POST['articlesave'])) {
      // name of the uploaded file
      
      $email=$_SESSION['email'];
      $message=$_POST['pub'];
      $filename = $_FILES['file']['name'];
      $sql="SELECT * FROM `employer` WHERE email='$email'";
      $res=mysqli_query($conn, $sql);
      $row=mysqli_fetch_assoc($res);
      $username=$row['username'];
      $id_emp=$row['id_emp'];
      if(!empty($filename)){
          // destination of the file on the server
      $destination = 'uploades/' . $filename;
      // get the file extension
      $extension = pathinfo($filename, PATHINFO_EXTENSION);
      $file = $_FILES['file']['tmp_name'];
      $size = $_FILES['file']['size'];
      if (!in_array($extension, ['zip', 'pdf', 'docx','png','jpg'])) {
        if($row['type']==='user'){
          header("Location: ../articles.php?errorarticle=You file extension must be .zip,.pdf, .docx, .pbg, .jpg");
        }else {
          header("Location: ../articlesAdmin.php?errorarticle=You file extension must be ..zip,.pdf, .docx, .pbg, .jpg");
        }
      } elseif ($_FILES['file']['size'] > 1000000) { // file shouldn't be larger than 1Megabyte
        if($row['type']==='user'){
          header("Location: ../articles.php?errorarticle=File too large!");
        }else {
          header("Location: ../articlesAdmin.php?errorarticle=File too large!");
        }
      }else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO `articles`  (`username`,`pub`, `file`,`size`, `downloads`,`id_emp`) VALUES ('$username','$message','$filename', '$size', 0,'$id_emp')";
            if (mysqli_query($conn, $sql)) {
                if($row['type']==='user'){
                  header("Location: ../articles.php?errorarticle-successful=Article  uploaded successfully.");
              }else {
                header("Location: ../articlesAdmin.php?errorarticle-successful=Article  uploaded successfully.");
              }
            }
            
        }else {
          if($row['type']==='user'){
          header("Location: ../articles.php?errorarticle=Failed to Add Article.."); 
          }else {
            header("Location: ../articlesAdmin.php?errorarticle=Failed to Add Article..");
          }
      }
    }

    } else {
              $sql = "INSERT INTO `articles`(`username`,`pub`,`id_emp`) VALUES('$username','$message','$id_emp')";
              if (mysqli_query($conn, $sql)) {
                if($row['type']==='user'){
                  header("Location: ../articles.php?errorarticle-successful=Article  uploaded successfully.");
                }else {
                  header("Location: ../articlesAdmin.php?errorarticle-successful=Article  uploaded successfully.");
                }
              } else {
                    if($row['type']==='user'){
                    header("Location: ../articles.php?errorarticle=Failed to Add Article.."); 
                }else {
                  header("Location: ../articlesAdmin.php?errorarticle=Failed to Add Article..");
                }
          }
      }
  }
  
// --------------------edits profile----------------
 
if (isset($_POST['saveinfo'])) {
  
  function validate($data){
       $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }

  $email = $_SESSION['email'];
  $username=validate($_POST['username']);
  $altpass = validate($_POST['altpassword']);
  $pass = validate($_POST['password']);
  $pass2=validate($_POST['confirmpassword']);

  $sql = "SELECT * FROM `employer` WHERE email='$email'";
  
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$type=$row['type'];
$altname=$row['username'];

  if ($row['password']!=$altpass) {
  
    header("Location: ../profile.php?erroradmin=Password is Incorect");

      exit();
  }else if($pass2!=$pass){
      
    header("Location: ../profile.php?erroradmin= password is not matched");
      exit();
  }else{
   
      $sql = "UPDATE  `employer` SET `username`='$username',`password`='$pass' WHERE `email`='$email'";

    $result = mysqli_query($conn, $sql);
    $sql = "UPDATE `articles` SET `username`='$username' WHERE  `username`='$altname'";

    $result = mysqli_query($conn, $sql);
    header("Location: ../profile.php?erroradmin-successful=successful Update.");
    
          exit();
    }
    
}
  ?>
  </body>
  </html>


