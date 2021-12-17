
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main2.css">
    <title>Forgot your password?</title>
</head>
<body class="forgot">
    <div class="reset">
        
        <div class="principale">
        <?php if (isset($_GET['erroruser'])) { ?>
     		<span class="erroruser" id="spanerror"><?php echo $_GET['erroruser']; ?></span>
     	<?php } ?>
            <form action="functionreset.php" method="POST">
                <input type="password" name="password" id="" placeholder="New password">
                <input type="password" name="confirmpassword" id="" placeholder="Confirm password">
                <input  id="btnS" name="submitnewpwd" type="submit"value="Send">
            </form>
        </div>
    </div>
</body>
</html>
