<!DOCTYPE HTML>
<?php
   if (!session_id()) session_start();
   $_SESSION['views'] = 1;
?>
<html>
   <body>
      <script language = "javascript" type = "text/javascript">
            function ajaxFunction(){
               var xhttp;
               
               xhttp = new XMLHttpRequest();
                    
               xhttp.onreadystatechange = function(){
                  if(xhttp.readyState == 4){
                     var ajaxDisplay = document.getElementById('ajaxDiv');
                     ajaxDisplay.innerHTML = xhttp.responseText;
                  }
               }
                    
               var username= document.getElementById('username').value;
               var password = document.getElementById('password').value;
               //var Email    = document.getElementById('email').value;
               var queryString = "?";
            
               queryString +=  "&Username=" + username + "&Password=" + password;

               xhttp.open("GET", "DB_Ajax.php" + queryString, true);
               xhttp.send(null); 
            }
         
      </script>
        
      <form name = 'myForm'>
        <label>username:</label> 
        <input type = "text" id = "username" name = "username"/><br>
        <label>password:</label>
        <input type = "text" id = "password" name = "password"/><br>
        <input type = "button" onclick = 'ajaxFunction()' value = "Log On" /> 
      </form>
    <?php
    // Print a cookie
    echo "hello world";
	?>
    <p>If you have not sign in, please click:</p>
    <a href = "sign_in.html">sign in</a>
	<br>
	<div id = 'ajaxDiv'>Your result will display here</div>
   </body>
   <a href = "Events_List.php">jump</a>
</html>
