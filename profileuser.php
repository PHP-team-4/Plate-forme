<?php
// session_start();
include('includes/header.php'); 
include('includes/navbaruser.php'); 
include('includes/config.php');
$email=$_SESSION['email'];

$reqt = "SELECT * FROM `employer` WHERE email='$email' ";
    
   $results = mysqli_query($conn, $reqt);
   $row= mysqli_fetch_assoc($results);
  
   
?>

<form action="includes/scripts.php" method="POST" id="form" class="formsave">

<div class="modal-body">
      <div class="imgprofile">
            <img  src="https://source.unsplash.com/QAB-WJcbgJk/60x60">
           <input type="file" name="image">
           <?php if (isset($_GET['erroradmin'])) { ?>
     		<p class="erroradmin "><?php echo $_GET['erroradmin']; ?></p>
     	<?php } ?>
       <?php if (isset($_GET['erroradmin-successful'])) { ?>
     		<p class="erroradmin-successful "><?php echo $_GET['erroradmin-successful']; ?></p>
     	<?php } ?>
        </div>
   <div>
    <div class="form-group">
        <label> Username </label>
        <input type="text" name="username" class="form-control" value="<?php echo $row['username'];?>" placeholder="Enter Username" required>
    </div>
    <div class="form-group">
        <label> Your Password</label>
        <input type="password" name="altpassword" class="form-control" placeholder="Enter Your Password" id="password" required>
    </div>
    <div class="form-group">
        <label> New Password</label>
        <input type="password" name="password" class="form-control" placeholder="Enter Password" id="password" required>
    </div>
    <div class="form-group">
        <label>Confirm Password</label>
        <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password" id="password2"required>
    </div>

</div>
<div class="modal-footer">
    <button type="submit" name="saveinfo" class="btn btn-primary">Save</button>
</div>
</form>
</div>

<?php
include('includes/scripts.php');

?>

