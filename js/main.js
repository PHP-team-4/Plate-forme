
        function surlinge(champ,erreur)
        {
            if(erreur==true)
            champ.style.border= "1.5px solid red";
         else if (erreur==false)
         champ.style.borderColor="#fff";
            

        }
        function verifPseudo(){
            
            if(document.getElementById('username').value.length <= 2 || document.getElementById('nom').value.length >= 25)
            {
                surlinge(document.getElementById('username'),true);
            return false;

            }
            else{
            surlinge(document.getElementById('username'),false);
            return true;
         }

        }
        function verifMail(){
          var  w=/^[a-zA-Z0-9._-]+@[a-zA-Z.]{2,}\.[a-z]{2,3}$/;
          if(!(w.test(document.getElementById("email").value)))
          {
              surlinge(document.getElementById("email"),true);
              return false;
          }else
          {
          surlinge(document.getElementById("email"),false);
          return true;
          }
        }
        function verifPass()
        {
            if(document.getElementById("password").value!=document.getElementById("password2").value)
            {
            surlinge(document.getElementById("password2"),true);
            return false;
            }
            else
            {
                surlinge(document.getElementById("password2"),false)
                return true;
            }
        }
        function verfForm(){
            var name=verifPseudo();
            var pwd=verifPass();
           var  email=verifMail();

            if(name && pwd && email)
            return true;
            else
            return false;
        }