
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
        <div >
                <p>verification code.</p>
        </div>
       
        <div class="principale">
            <?php if (isset($_GET['erroruser-successful'])) { ?>
     		<p class="erroruser-successful " id="perrorsucc"><?php echo $_GET['erroruser-successful']; ?></p>
     	<?php } ?>
         <?php if (isset($_GET['erroruser'])) { ?>
     		<p class="erroruser" id="perror"><?php echo $_GET['erroruser']; ?></p>
     	<?php } ?>
            <form action="functionreset.php" method="POST">
                <input type="number" name="code" placeholder=" Enter Code">
                <input  id="btnS" name="codevir"type="submit">
            </form>
        </div>
    </div>
</body>
</html>