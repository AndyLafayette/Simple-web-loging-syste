<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<title>Event List</title>         
</head>
<body>
<?php
$con = mysqli_connect("localhost","zy15765","zy15765");
    if (!$con)
    {
      die('Could not connect.');
    }
	
        $eId = $_POST['id_e'];
	    $eTitle = $_POST['title_e'];
		$Location = $_POST['location_e'];
		$Capacity = $_POST['capacity_e'];
		$Date = $_POST['date_e'];
		$Describ = $_POST['describ_e'];
	
        $query = mysqli_prepare($con, "UPDATE db_zy15765.Events SET eTitle = ?, eDate = ?, describ = ?, location = ?, capacity = ? WHERE eId = ?" );
        
		
		
		$eId = mysqli_real_escape_string($con,$eId);
	    $eTitle = mysqli_real_escape_string($con,$eTitle);
		$Location = mysqli_real_escape_string($con,$Location);
		$Capacity = mysqli_real_escape_string($con,$Capacity);
		$Date = mysqli_real_escape_string($con,$Date);
		$Describ = mysqli_real_escape_string($con,$Describ);
		
		
		mysqli_stmt_bind_param($query, "ssssss",$eTitle,$Date,$Describ,$Location,$Capacity,$eId);
    
	/*else
	{
		$eTitle = $_GET['eTitle'];
		$eDate = $_GET['eDate'];
		$describ = $_GET['describ'];
		$location = $_GET['location'];
		$capacity = $_GET['capacity'];
        $query = mysqli_prepare($con, "INSERT INTO db_zy15765.Events (eTitle,eDate,describ,location,capacity) VALUES (?,?,?,?,?)" );
        $eTitle = mysqli_real_escape_string($con,$eTitle);
		$eDate =  mysqli_real_escape_string($con,$eDate);
		$describ =  mysqli_real_escape_string($con,$describ);
		$location =  mysqli_real_escape_string($con,$location);
		$capacity =  mysqli_real_escape_string($con,$capacity);
	    mysqli_stmt_bind_param($query, "sssss" ,$eTitle, $eDate, $describ, $location, $capacity);
	}*/

    $r = mysqli_stmt_execute($query);
	  if ($r)
	  {
		  echo "<div id = 'mainblock'>success</a></div>";
		  header('location:Events_List.php');
	  }
	  else
	  {
		  echo "<div id = 'mainblock'><a>failure</a><br>";
		  echo "<a href = 'Events_List.php'>Click to go back to event list!</a></div>";
		  
	  }
?>
</body>
</html>