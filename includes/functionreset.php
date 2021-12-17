<?php
   session_start();
 require 'config.php';
 function validate($data){
    $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
$email = validate($_POST['email']);
if (isset($_POST['submit'])) {
  

    
    $email = validate($_POST['email']);
	$sql = "SELECT email FROM `employer` WHERE email='$email'";
    
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	if ($row['email']== $email) {
			
			
            $code = rand(100000,999999); 
            //   send email and store data in session
            $subject = "Email Verification Code";
            $message = "Your verification code is $code";
            $sender = "From: imadejanaoui@gmail.com";
            $retval=mail($email, $subject,$message,$sender);
            var_dump($result);
                 if($result==1){ 
                    header("Location:password_reset_code.php?erroruser-successful=we've sent code for reset password  to your email-'$email'");
                    $sql ="UPDATE `employer` SET `code`='$code' WHERE email='$email'";
                    $result = mysqli_query($conn, $sql);
                    $_SESSION['email'] = $email;
			        exit();
                 }else {
                    header("Location:password_reset.php?erroruser= Email is does not sent");
                 }
	
    }else{
        header("Location:password_reset.php?erroruser= this address Eamil does exist");      
            exit();
      }
}
  	

// --------------------verfication code-------------------

if(isset($_POST['codevir'])){
    $code = validate($_POST['code']);
	$sql = "SELECT code FROM `employer` WHERE code='$code'";
    
	$result = mysqli_query($conn, $sql);
    $_SESSION['code']=$code;
    $row = mysqli_fetch_assoc($result);
	if ($row['code']==$code) {
       
        header("Location:Change_password.php");
}else {
    header("Location:password_reset_code.php?erroruser= this code is Incorect");  
    echo($row['code']);    
            exit();
}
}
//  -------------------------new password---------------------
if(isset($_POST['submitnewpwd'])){
    $pass = validate($_POST['password']);
    $pass2=validate($_POST['confirmpassword']);
    $email= $_SESSION['email'];
    $code=$_SESSION['code'];
    if($pass!=$pass2){
        header("Location:Change_password.php?erroruser= password is not matched");
    }else {
        $sql ="UPDATE `employer` SET `password`='$pass' WHERE email='$email'";
                    $result = mysqli_query($conn, $sql);
        $reqt="UPDATE `employer` SET `code`=0 WHERE code='$code'";
        $result = mysqli_query($conn, $reqt);
                    header("Location:../index.php?");
                    exit();
    }
    
}

?>