<?php 
session_start(); 
require "config.php";
if(isset($_POST['login'])){
if (isset($_POST['email']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}
	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);

	if (empty($email)) {
		header("Location: ../index.php?error=Your email is required");
	    exit();
	}else if(empty($pass)){
        header("Location: ../index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM `employer` WHERE email='$email' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['email'] === $email && $row['password'] === $pass) {
            	$_SESSION['email'] = $row['email'];
				$_SESSION['username']=$row['username'];
				if($row['type']==='admin'){
            	header("Location: ../articlesAdmin.php");
		        exit();
				}else {
					header("Location: ../articles.php");
				}
            }else{
				header("Location: ../index.php?error=Incorect Email or password");
		        exit();
			}
		}else{
			header("Location: ../index.php?error=Incorect Email or password");
	        exit();
		}
	}
	
}else{
	header("Location:../index.php");
	exit();
}
}
// >>>>>>>>>Sign up<<<<<<<<<<<<
if (isset($_POST['btn'])) {
  
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
	if ($row['email']== $email) {
			
			header("Location:../index.php?erroruser=this email already exists");
			exit();
		}else if(empty($pass) && empty($pass2)){
      
      header("Location: ../index.php?erroruser=Password is required");
        exit();
    }else{
      if($pass2!=$pass){
        
        header("Location: ../index.php?erroruser= password is not matched");
        
      }else {
        $sql = "INSERT INTO `employer`(`username`, `email`, `password`, `type`,`code`) VALUES ('$username','$email','$pass','user',0)";
		
      $result = mysqli_query($conn, $sql);
      header("Location: ../index.php?erroruser-successful=successful sign up .");
      
            exit();
      }
      
    }	
}
