<?php 
    $con = mysqli_connect("localhost","zy15765","zy15765");
    if (!$con)
    {
      die('Could not connect.');
    }
	
    $userId =$_GET['userId'];
    $eId = $_GET['eId'];
   	$capacity = $_GET['newCapacity'];
	
    $userId = mysqli_real_escape_string($con,$userId);
    $eId = mysqli_real_escape_string($con,$eId);
	$capacity = mysqli_real_escape_string($con,$capacity);
	
	$query = mysqli_prepare($con, "SELECT * FROM db_zy15765.Userevent WHERE userId = ? AND eId = ?" );
	
	mysqli_stmt_bind_param($query, "ss" ,$userId, $eId);
  
    $r = mysqli_stmt_execute($query);
    $result = mysqli_stmt_get_result($query);
	
	if (mysqli_num_rows($result) == 0)
    {
		echo "Failure: You have not attended this event!";
	}
	else
	{
		$query = mysqli_prepare($con, "DELETE FROM db_zy15765.Userevent WHERE userId = ? AND eId = ?" );
		mysqli_stmt_bind_param($query, "ss" ,$userId, $eId);
		$r = mysqli_stmt_execute($query);
		if($r)
		{
		    $capacity = $capacity + 1;
			$query_2 = mysqli_prepare($con, "UPDATE db_zy15765.Events SET capacity = ? WHERE eId = ?" );
	        mysqli_stmt_bind_param($query_2, "ss" ,$capacity, $eId);
	        $r_2 = mysqli_stmt_execute($query_2);
			if($r_2)
	        {
	            echo "success";
	        }
			else
			{
				echo "Failure: Update the event failed!";
			}
		}
		else
		{
			echo "Failure: Delete failed!";
		}
	}
	
?>