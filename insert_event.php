<?php 
    $con = mysqli_connect("localhost","zy15765","zy15765");
    if (!$con)
    {
      die('Could not connect.');
    }
    //echo "the mysql connectd successfully. ";
    //echo '<br/>';
    
	$Username = $_GET['Username'];
    $userId =$_GET['userId'];
    $uType = $_GET['uType'];
    $eId = $_GET['eId'];
    $eTitle = $_GET['eTitle'];
   	$capacity = $_GET['newCapacity'];
	
    $query = mysqli_prepare($con, "INSERT INTO db_zy15765.Userevent (userId, Username, uType, eId, Event) VALUES ( ?,?,?,?,? )" );
    
    //$Username = mysqli_real_escape_string($db,$Username);
    //$Password = mysqli_real_escape_string($db,$Password);

	
	mysqli_stmt_bind_param($query, "sssss" ,$userId, $Username, $uType, $eId, $eTitle);
	
	
	$Username = mysqli_real_escape_string($con,$Username);
    $userId = mysqli_real_escape_string($con,$userId);
    $uType = mysqli_real_escape_string($con,$uType);
    $eId = mysqli_real_escape_string($con,$eId);
    $eTitle = mysqli_real_escape_string($con,$eTitle);
	$capacity = mysqli_real_escape_string($con,$capacity);
    
	//$query = "INSERT INTO Userevent (userId, Username, uType, eId, Event) 
    //                VALUES ( '$userId', '$Username' , '$uType', '$eId', '$eTitle' )";
    //mysqli_query($con,$query);
	
    
	if ( $capacity != 0 )
    {
	  $r = mysqli_stmt_execute($query);
	  if ($r)
	  {
	    $capacity = $capacity - 1;
	    
	    $query_2 = mysqli_prepare($con, "UPDATE db_zy15765.Events SET capacity = ? WHERE eId = ?" );
	    mysqli_stmt_bind_param($query_2, "ss" ,$capacity, $eId);
	    $r_2 = mysqli_stmt_execute($query_2);
	  
	    if($r_2)
	    {
	      echo "success";
	    }
	  }
	  else
	  {
		  echo "failure: attend failed";
	  }
	   /*
         $display_string = "<table>";
		 $display_string .= "<tr>";
         $display_string .= "<td> Event </td>";
         $display_string .= "<td> Date </td>";
		 $display_string .= "<td> description </td>";
		 $display_string .= "<td> location </td>";
		 $display_string .= "<td> capacity </td>";
         $display_string .= "</tr>";
		 
		 while($row = mysqli_fetch_array($result)){
         $display_string .= "<tr>";
         $display_string .= "<td> $row[Username] </td>";
         $display_string .= "<td> $row[uType] </td>";
		 $display_string .= "<td> $row[eId] </td>";
		 $display_string .= "<td> $row[Event] </td>";
		 $display_string .= "<td> $row[userId] </td>";
		 $display_string .= "</tr>";
		 }
         $display_string .= "</table>";
	     echo $display_string;
		 echo $eTitle;*/
    }
	else
	{
	     echo "failure: there are no capacity";
	}
    //echo "The information have been recorded successfully.";
    //header('location:index.html');*/
	
	/*
	$con = mysqli_connect("localhost","zy15765","zy15765","db_zy15765");
    if (!$con)
    {
      die('Could not connect.');
    }
    echo "the mysql connectd successfully. ";
    echo '<br/>';
    
    $Username = mysqli_real_escape_string($con,$_GET['Username']);
    $userId = mysqli_real_escape_string($con,$_GET['userId']);
    $uType = mysqli_real_escape_string($con,$_GET['uType']);
    $eId = mysqli_real_escape_string($con,$_GET['eId']);
    $eTitle = mysqli_real_escape_string($con,$_GET['eTitle']);
    
    $sql = "INSERT INTO db_zy15765.Userevent (userId, Username, uType, eId, Event) VALUES ( '$userId', '$Username', '$uType', '$eId', '$eTitle' )";
    /*
    $sql = "INSERT INTO Orders (Name, Email, Phone, CoffeeOrder, DeliveryInfo) 
                VALUES ('$_POST[name]', '$_POST[email]', '$_POST[phone]', '$_POST[coffee]', '$_POST[info]')";
    
    if (!mysqli_query($con,$sql))
    {
      die('Error: ' . mysqli_error($con));
    }
    echo "The information have been recorded successfully.";
    */
	//header('location:index.html');
?>
