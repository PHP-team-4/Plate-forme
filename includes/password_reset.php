
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main2.css">
    <title>Forgot your password?</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
</head>
<body class="forgot">
    <div class="reset">
        <div >
                <img src="../img/forgot.svg" alt="">
                <p>Reset your password</p>
        </div>
       
        <div class="principale">
        
            <p>Enter email address for your user account and we'll send you a reset password code.</p>
            <?php if (isset($_GET['erroruser'])) { ?>
     		<p class="erroruser" id="perror"><?php echo $_GET['erroruser']; ?></p>
     	<?php } ?>
            <form action="functionreset.php" method="POST">
                <input type="email" name="email" id="" placeholder=" Entrez votre e-mail..." required>
                <input  id="btnS" type="submit" name="submit" value="send password reset email">
               
            </form>
        </div>
    </div>
</body>
</html>