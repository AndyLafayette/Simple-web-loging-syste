<?php
    $con = mysqli_connect("localhost","zy15765","zy15765","db_zy15765");
    if (!$con)
    {
      die('Could not connect.');
    }
    echo "the mysql connectd successfully. ";
    echo '<br/>';
		
		
        $eTitle = $_GET['eTitle_n'];
		$eDate = $_GET['eDate_n'];
		$describ = $_GET['describ_n'];
		$location = $_GET['location_n'];
		$capacity = $_GET['capacity_n'];
        $query = mysqli_prepare($con, "INSERT INTO db_zy15765.Events (eTitle,eDate,describ,location,capacity) VALUES (?,?,?,?,?)" );
        
		$eTitle = mysqli_real_escape_string($con,$eTitle);
		$eDate =  mysqli_real_escape_string($con,$eDate);
		$describ =  mysqli_real_escape_string($con,$describ);
		$location =  mysqli_real_escape_string($con,$location);
		$capacity =  mysqli_real_escape_string($con,$capacity);
	    
		mysqli_stmt_bind_param($query, "sssss" ,$eTitle, $eDate, $describ, $location, $capacity);
		$r = mysqli_stmt_execute($query);
	    if ($r)
	    {
	        echo "success";
	    }
	    else
	    {
		    echo "failure";
	    }
	header('location:Events_List.php');
?>
