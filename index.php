<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kaisei+HarunoUmi&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="css/main2.css" />
    <title>PlateForme</title>
  </head>
  <body>
   
<!-- ------------------------------------------------------------------------------------------- -->

      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Log In
            </div>
            <div class="title signup">
               Sign Up
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Log In</label>
               <label for="signup" class="slide signup">Sign Up</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="includes/function.php" method="POST" class="login">
               <?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
       <?php if (isset($_GET['erroruser'])) { ?>
                  <p class="erroruser"><?php echo $_GET['erroruser']; ?></p>
                <?php } ?>
                <?php if (isset($_GET['erroruser-successful'])) { ?>
                  <p class="erroruser-successful "><?php echo $_GET['erroruser-successful']; ?></p>
                <?php } ?>
                  <div class="field">
                     <input type="text" name="email" placeholder="Email Address" required>
                  </div>
                  <div class="field">
                     <input type="password" name="password"placeholder="Password" required>
                  </div>
                  <div class="pass-link">
                     <a href="includes/password_reset.php" >Forgot password?</a>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" value="Login" name="login" >
                  </div>
                  <div class="signup-link">
                     Not a member? <a href="">Signup now</a>
                  </div>
               </form>
                <form action="includes/function.php" method="POST" id="form" onsubmit=" return verifForm()">
                 
                <div class="field">
                    <input type="text" id="username" name="username" placeholder="User Name" onblur="verifPseudo()" required>
                    <span></span>
                 </div>
                  <div class="field">
                     <input type="email" id="email"  name="email"placeholder="Email Address" onblur="verifMail()" required>
                     <span></span>
                  </div>
                  
                  <div class="field form-control">
                     <input type="password" id="password"  name="password" placeholder="Password"  required>
                     <span></span>
                  </div>
                  <div class="field">
                     <input type="password" id="password2" name="confirmpassword" placeholder="Confirm password" onblur="verifPass()" required>
                     <span></span>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit"name="btn" value="Signup">
                  </div>
               </form>
            </div>
         </div>
      </div>
     <script src="js/main.js">
         
   </script>
            <div class="social-media">
            <a  target="_blank" href="http://groupetadlaoui.ma/">
              <img src="img/logo-1.png"  alt="GROPE TADLAOUI" class="GROPEt">
            </a>
            <p class="description">
                      Le Groupe TADLAOUI est un des opérateurs économiques leaders au Maroc. Il dispose d’un grand savoir-faire industriel et une parfaite maîtrise des techniques de production et de distribution.
          Le groupe dispose d’unités de production, de stockage et de distribution dans l’ensemble du Maroc.
          </p>
        
            <p class="social-text">Contact us with social platforms</p>
            <div class="social-media-icon">
            <a href="https://www.facebook.com/Doussy-1798116193768125/" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="https://www.youtube.com/channel/UCGux1JiIHtygwTVkw1JBfJQ" class="social-icon">
                <i class="fab fa-youtube"></i>
              </a>
              <a href="mailto:contact@groupetadlaoui.ma" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="https://www.linkedin.com/in/groupe-tadlaoui-121480172/" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
              </div>
            </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>
