<!DOCTYPE HTML>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php
   setcookie("user",$_GET['Username'],time()+3600);

   if (!session_id()) session_start();
   //if (!session_id()) session_start();
   //$_SESSION['s_username'] = $_GET['Username'];
   //$_SESSION['s_password'] = $_GET['Password'];
   
   $dbhost = "localhost";
   $dbuser = "zy15765";
   $dbpass = "zy15765";
   $dbname = "db_zy15765";
   
   //Connect to MySQL Server
   $db = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   //echo $_GET['Username'];
   //echo "<br>";
   // Retrieve data from Query String
   $Username = $_GET['Username'];
   $Password = $_GET['Password'];
   $Type = $_GET['Type'];
   
   $Username = mysqli_real_escape_string($db,$Username);
   $Password = mysqli_real_escape_string($db,$Password);
   $Type = mysqli_real_escape_string($db,$Type);
   
   //$query = mysqli_prepare($db, "SELECT * FROM db_zy15765.users WHERE ( Username = ?  AND  Passwords = ?  AND  uType = ? )" );
   $query = "SELECT * FROM db_zy15765.users WHERE ( Username = '$Username'  AND  Passwords = '$Password'  AND  uType = '$Type' )" ;   
   //echo $query;
   //mysqli_stmt_bind_param($query, "sss" ,$Username, $Password, $Type);
   
   
   
   $r = mysqli_query($db,$query);
   //$result = mysqli_stmt_get_result($query);
   if ($r) 
   {
	  if (mysqli_num_rows($r) == 0)
	  {
		$display_string = "<div id = 'mainblock'><p>The user does not exist !!!</p><p>Click to main page: <a href = 'index.html'>main page</a></p></div>";
		echo $display_string;
	  }
	  else
	  {
	    echo "Number of Results - ", mysqli_num_rows($r);

        //Build Result String
        $display_string = "<table>";
        $display_string .= "<tr>";
        $display_string .= "<th>Username</th>";
        $display_string .= "<th>Password</th>";
        $display_string .= "</tr>";
      // Insert a new row in the table for each person returned
        /*while*/
		 $row = mysqli_fetch_array($r); 
         $display_string .= "<tr>";
         $display_string .= "<td> $row[Username]</td>";
         $display_string .= "<td> $row[Passwords]</td>";
         $display_string .= "</tr>";
        
         $display_string .= "</table>";
	    
		$_SESSION['s_username'] = $row['Username'];
        $_SESSION['s_password'] = $row['Passwords'];
		$_SESSION['s_uType'] = $row['uType'];
		$_SESSION['s_userId'] = $row['userId'];
		echo $display_string;
		header('location:Events_List.php');
	  }
      
	  
        
	  //echo $_COOKIE["user"];
	  
    }
	
?>
</body>
</html>