<?php 
    $con = mysqli_connect("localhost","zy15765","zy15765");
    if (!$con)
    {
      die('Could not connect.');
    }
	
        $eId = $_GET['eId'];
	
        $query = mysqli_prepare($con, "DELETE FROM db_zy15765.Events WHERE ( eId = ? )" );
        $eId = mysqli_real_escape_string($con,$eId);
	    mysqli_stmt_bind_param($query, "s" ,$eId);
    
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
	      echo "success";
	  }
	  else
	  {
		  echo "failure";
	  }
?>
