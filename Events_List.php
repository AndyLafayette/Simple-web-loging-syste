<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" type="text/css" href="style.css">
<title>Event List</title>         
</head>

<body>
<?php
session_start();
?>
      <script src="https://code.jquery.com/jquery-2.2.2.min.js"></script>
	  <script type = "text/javascript">
	     
		 $(document).ready(function(){
			    $('.select').click(function(){
                console.log("User clicked the Event Select Button");
                
				var x = parseInt($(this).parents('tr:first').find('#capacity').text());
				var temp = x;
				var mythis = $(this);
                $.ajax("insert_event.php", 
                  {
                    //async: false,
					// The type of data we're receiving
                    dataType: 'html',

                    data:{
                        "Username": $('#username').html(),
                        "userId": $('#userId').html(),
						"uType": $('#userType').html(),
						"eId": $(this).parents('tr:first').find('#eid').html(),
						"eTitle": $(this).parents('tr:first').find('#etitle').html(),
						"newCapacity": x
                    },

                    // Define a function to be executed on success
                    success: function(data) {
                        console.log("Data Received");
                        //alert($('input').parents('tr:first').find('#eid').html());
                        $('#hint').html(data);
						//alert($('#hint').html());
						
						if( data == "success")
						{
							x = x - 1; 
							alert("The event selected successfully!");
							mythis.parents('tr:first').find('#capacity').html(x);
							mythis.parents('tr:first').find('#selected').show();
							mythis.hide();
						}
						else
						{
							if (x != 0)
							{
							    alert("Failure! You have selected this event!");
							}
							else
							{
								alert("Failure! This event has no capacity!");
							}
						}
                    },

                    // What to do on error
                    error: function() {
                        $('#hint').html("Error Receiving Data");
                    },

                    // How to send the data
                    type:'GET'
                });
			    //if(x != temp)
				
				//$(this).hide();
				//alert($(this).parents('tr:first').find('#etitle').html());
				//window.location.href="Events_list.php"; 
              });
			  
			  $('.un-register').click(function(){
                console.log("User clicked the Event Select Button");
                
				var x = parseInt($(this).parents('tr:first').find('#capacity').text());
				var temp = x;
				var mythis = $(this);
                $.ajax("un_register.php", 
                  {
                    //async: false,
					// The type of data we're receiving
                    dataType: 'html',

                    data:{
                        "userId": $('#userId').html(),
						"eId": $(this).parents('tr:first').find('#eid').html(),
						"newCapacity": x
                    },

                    // Define a function to be executed on success
                    success: function(data) {
                        console.log("Data Received");
                        //alert($('input').parents('tr:first').find('#eid').html());
                        $('#hint').html(data);
						//alert($('#hint').html());
						
						if( data == "success" )
						{
							x = x + 1; 
							alert("The event un-register successfully!");
							mythis.parents('tr:first').find('#selected').hide();
							mythis.parents('tr:first').find('.select').show();
							mythis.parents('tr:first').find('#capacity').html(x);
						}
						else
						{
							alert("Failure! Cannot un-register!");
						}
                    },

                    // What to do on error
                    error: function() {
                        $('#hint').html("Error Receiving Data");
                    },

                    // How to send the data
                    type:'GET'
                });
				//alert($('#describ').html);
				//alert("last x = " + x + " last temp " + temp);
			    //if(x != temp)
			    
				//$(this).hide();
				//alert($(this).parents('tr:first').find('#etitle').html());
				//window.location.href="Events_list.php"; 
              });
			  
			  
			  //delete
			  $('.delete').click(function(){
                console.log("User clicked the Event Select Button");
                var mythis = $(this);
                var x = parseInt($('#num').text()) - 1;
				$.ajax("change_event.php", 
                  {
                    //async: false,
					// The type of data we're receiving
                    dataType: 'html',

                    data:{
						"eId": $(this).parents('tr:first').find('#eid').html()			
                    },

                    // Define a function to be executed on success
                    success: function(data) {
                        console.log("Data Received");
                        $('#hint').html(data);
						
						if( data == "success")
						{
							alert("The event deleted successfully!");
							alert($('#num').text());
							mythis.parents('tr:first').hide();
							$('#num').html(x)
						}
						else
						{
							alert("Failure!");
						}
                    },

                    // What to do on error
                    error: function() {
                        $('#hint').html("Error Receiving Data");
                    },

                    // How to send the data
                    type:'GET'
                });
              });
			  
			  
			  //submit
			  /*
			  $('#edit_event_form').click(function(){
                console.log("User clicked the Event Select Button");
                var mythis = $(this);
                $.ajax("edit_event.php", 
                  {
                    //async: false,
					// The type of data we're receiving
                    dataType: 'html',

                    data:{
					    /*"id_e": $(this).parents('tr:first').find('#id_e').val(),
                        "title_e": $(this).parents('tr:first').find('#title_e').val(),
                        "date_e": $(this).parents('tr:first').find('#date_e').val(),						
						"location_e": $(this).parents('tr:first').find('#location_e').val(),
						"capacity_e": $(this).parents('tr:first').find('#capacity_e').val(),
						"describ_e": $(this).parents('tr:first').next().find('#describ_e').val()
						"id_e": $('#id_e').val(),
                        "title_e": $('#title_e').val(),
                        "date_e": $('#date_e').val(),						
						"location_e": $('#location_e').val(),
						"capacity_e": $('#capacity_e').val(),
						"describ_e": $('#describ_e').val()
                    },

                    // Define a function to be executed on success
                    success: function(data) {
                        console.log("Data Received");
                        $('#hint').html(data);
						
						if( data == "success")
						{
							alert("The event edited successfully!");
							
							//mythis.parents('tr:first').hide();
							//mythis.parents('tr:first').next().hide();
							//mythis.parents('tr:first').prev().prev().show();
							//edit previous record
						}
						else
						{
							alert("Failure!");
						}
                    },

                    // What to do on error
                    error: function() {
                        $('#hint').html("Error Receiving Data");
						alter($('#eid_e').val());
                    },

                    // How to send the data
                    type:'POST'
                });
              });*/
			  
			  //edit
			  $('.edit').click(function(){
                console.log("User clicked the Event Select Button");
                $(this).parents('tr:first').hide();
				$(this).parents('tr:first').next().next().next().show();
				$(this).parents('tr:first').next().next().next().next().show();
				alert($(this).parents('tr:first').find('#eId').html());//
              });
				/*
				//ajax
				$.ajax("change_event.php", 
                  {
                    //async: false,
					// The type of data we're receiving
                    dataType: 'html',

                    data:{
						"eId": $(this).parents('tr:first').find('#eid').html()			
                    },

                    // Define a function to be executed on success
                    success: function(data) {
                        console.log("Data Received");
                        $('#hint').html(data);
						
						if( data == "success")
						{
							alert("The event deleted successfully!");
							mythis.parents('tr:first').hide();
						}
						else
						{
							alert("Failure!");
						}
                    },

                    // What to do on error
                    error: function() {
                        $('#hint').html("Error Receiving Data");
                    },

                    // How to send the data
                    type:'GET'
                });
              });*/
			  
			  
			  /*$('#add').click(function(){
                console.log("User clicked the Event Select Button");
                
                $.ajax("change_event.php", 
                  {
                    //async: false,
					// The type of data we're receiving
                    dataType: 'html',

                    data:{
						"option": 1,
						"eTitle": $("#eTitle_n").val(),
                        "eDate": $("#eDate_n").val(),
                        "describ": $("#describ_n").val(),
                        "location": $("#location_n").val,
                        "capacity":	$("#capacity_n").val()					
                    },

                    // Define a function to be executed on success
                    success: function(data) {
                        console.log("Data Received");
                        $('#hint').html(data);
						
						if( data == "success")
						{
							alert("The event added successfully!");
							window.location.href="Events_list.php";
						}
						else
						{
							alert("Failure!");
						}
                    },

                    // What to do on error
                    error: function() {
                        $('#hint').html("Error Receiving Data");
                    },

                    // How to send the data
                    type:'GET'
                });
              });*/
			  $('.cancel').click(function(){
				  $(this).parents('tr:first').hide();
				  $(this).parents('tr:first').next().hide();
				  $(this).parents('tr:first').prev().prev().show();
				  $(this).parents('tr:first').prev().prev().prev().show();
			  });
			  
			  $('.row').hover(function() {
                  $(this).next().animate({opacity: "show", top: "-75"}, "slow");
                  }, function() {
                  $(this).next().animate({opacity: "hide", top: "-85"}, "fast");
                  });
		      
			  
			  $('#show_add').click(function(){
				  	if($('#add_event').css("display")=="none"){
						$('#add_event').animate({opacity: "show"}, "slow");
						$(this).val('hide');
                    }
					else{
                        $('#add_event').animate({opacity: "hide"}, "fast");
						$(this).val('Add an event');
				    }
				  //$('#add_event').animate({opacity: "show"}, "slow");
				  //$(this).after("<input type = 'button' value = 'hide' id = 'hide_add'>");
			  }
			  );
			  /*
			  $('#hide_add').click(function(){
				  
				  //$('#add_event').animate({opacity: "hide"}, "slow");
				  $(this).after("<input type = 'button' value = 'Add an event' id = 'show_add'>");
			  }
			  );
			  
			  /*
			  $('#show_add').toggle(
			      function() {
                  $('#add_event').animate({opacity: "show", top: "-75"}, "slow");
                  }, 
				  function() {
                  $('#add_event').animate({opacity: "hide", top: "-85"}, "fast");
                  }
			  );*/
			  
			});
			</script>
			
<?php
if (isset($_SESSION['s_username']))
{
$username = $_SESSION['s_username'];
$userId = $_SESSION['s_userId'];
$userType = $_SESSION['s_uType'];
echo "<div id = 'userinfo' style = 'font-weight: bold'>";
echo "Welcome! <span id = 'username'>$username</span> <sapn style = 'color: white'>  |  </sapn>  ";
echo "id: <span id = 'userId'>$userId</span>   <span style = 'color: white'>  |  </span>";
echo "Type: <span id = 'userType'>$userType</span><sapn style = 'color: white'>  |  </sapn>";
echo "<a href = 'log_off.php'>Log off</a></div>";
//$_SESSION['s_username'] = $_SESSION['s_username'] + 1;
//echo "the user is " . $_SESSION['s_username']. "<br>";
//echo "the password is " . $_SESSION['s_password'] . "<br>";

   $dbhost = "localhost";
   $dbuser = "zy15765";
   $dbpass = "zy15765";
   $dbname = "db_zy15765";
    //Connect to MySQL Server
   $db = mysqli_connect($dbhost, $dbuser, $dbpass);

if ($userType == 'Normal')
{
   $date = Date('y-m-d');
   //select all the upcoming event from table
   $query = mysqli_prepare($db, "SELECT * FROM db_zy15765.Events WHERE eDate >= ?" );
   mysqli_stmt_bind_param($query, "s", $date);
   $r = mysqli_stmt_execute($query);
   $result = mysqli_stmt_get_result($query);
   if ($r) 
   {
	  if (mysqli_num_rows($result) == 0)
	  {
		echo "<h1 class = 'title'>University of Nottingham <br><b id = 'subtitle'>Event List</b></h1><br>";
		echo "<div id = 'mainblock'>";
		echo "<p>Number of Results - ", mysqli_num_rows($result);
        echo "</p>";
		echo "<div style = 'position: relative; left: -210px; font-size: 15px'><span style = 'color: red'>*</span>You can move mouse on event to see more details</div>";
 		 $display_string = "<table class = 'etable' style = 'table-layout:fixed' width = '90%'>";
		 $display_string .= "<tr>";
         $display_string .= "<td> Id </td>";
		 $display_string .= "<td> Title </td>";
         $display_string .= "<td> Date </td>";
		 $display_string .= "<td> Location </td>";
		 $display_string .= "<td> Capacity </td>";
		 $display_string .= "<td> Register </td>";
		 $display_string .= "<td> un-Register </td>";
         $display_string .= "</tr></table>";
		 $display_string .= "<br><div>No upcomming event !!!</div></div>" ;
	  }
	  else
	  {
		echo "<h1 class = 'title'>University of Nottingham <br><b id = 'subtitle'>Event List</b></h1><br>";
		echo "<div id = 'mainblock'>";
		echo "<p>Number of Results - ", mysqli_num_rows($result);
        echo "</p>";
		echo "<div style = 'position: relative; left: -210px; font-size: 15px'><span style = 'color: red'>*</span>You can move mouse on event to see more details</div>";
	     $eId = "";
 		 $display_string = "<table class = 'etable' style = 'table-layout:fixed' width = '90%'>";
		 $display_string .= "<tr>";
         $display_string .= "<td> Id </td>";
		 $display_string .= "<td> Title </td>";
         $display_string .= "<td> Date </td>";
		 $display_string .= "<td> Location </td>";
		 $display_string .= "<td> Capacity </td>";
		 $display_string .= "<td> Register </td>";
		 $display_string .= "<td> un-Register </td>";
         $display_string .= "</tr>";
         
		while($row = mysqli_fetch_array($result)) {
		 $display_string .= "<tr class = 'row'>";
         $display_string .= "<td id = 'eid'>$row[eId]</td>";
		 $display_string .= "<td id = 'etitle'>$row[eTitle]</td>";
         $display_string .= "<td id = 'edate'> $row[eDate] </td>";
		 $display_string .= "<td id = 'location'> $row[location] </td>";
	     $display_string .= "<td id = 'capacity'> $row[capacity] </td>";
		 
		 $query = mysqli_prepare($db, "SELECT * FROM db_zy15765.Userevent WHERE userId = ? AND eId = ?" );
         mysqli_stmt_bind_param($query, "ss", $userId, $row['eId']);
         $r = mysqli_stmt_execute($query);
         $result_2 = mysqli_stmt_get_result($query);
		 
		 if (mysqli_num_rows($result_2) == 0)
		 {
			 $display_string .= "<td><input type = 'button' class='select' value = 'select'/><a id = 'selected' style = 'display: none'>selected</a></td>";
		 }
		 else
		 {
			 $display_string .= "<td><input type = 'button' class='select' value = 'select' style = 'display: none'/><a id = 'selected'>selected</a></td>";
		 }
		 
		 $display_string .= "<td><input type = 'button' class='un-register' value = 'un-register' /></td></tr>";
		 //$display_string .= "<tr style = 'display: none'><td colspan = 7 class = 'describ' style = 'word-break: break-all'> $row[describ]</td></tr>";
		 if (empty($row['describ']))
		 {
			 $display_string .= "<tr style = 'display: none'><td colspan = 7 class = 'describ' style = 'word-break: break-all'> None </td></tr>";
		 }
		 else
		 {
			 $display_string .= "<tr style = 'display: none'><td colspan = 7 class = 'describ' style = 'word-break: break-all'> $row[describ] </td></tr>";
		 }
        }
      $display_string .= "</table>";
	  $display_string .= "<p id = 'hint'>Result</p></div>";
	  }
      echo $display_string;
	  
	  //echo $_COOKIE["user"];
    }
}
else
{
   $query = mysqli_prepare($db, "SELECT * FROM db_zy15765.Events" );
   
   $r = mysqli_stmt_execute($query);
   $result = mysqli_stmt_get_result($query);
   if ($r) 
   {
	  if (mysqli_num_rows($result) == 0)
	  {
		$num_result = mysqli_num_rows($result);
		echo "<h1 class = 'title'>University of Nottingham <br><b id = 'subtitle'>Event List</b></h1><br>";
		echo "<div id = 'mainblock'>";
		echo "<p>Number of Results - <span id = 'num'>$num_result</span></p>";
		echo "<a style = 'font-size: 15px;float: left'><span style = 'color: red'>*</span>You can move mouse on event to see more details</a>";
	    echo "<div style = 'float: right'><input type = 'button' value = 'Add an event' id = 'show_add'></div>"; 
		echo "<div id = 'add_event' style = 'display: none'>
		      <form action = 'add_event.php' method = 'GET'>
		      <h3 id = 'logonFormTitle'><b>Add new event</b></h3>
              <label>Title:</label> <br>
                <input type = 'text' name = 'eTitle_n'/><br>
              <label>Date:</label> <br>
                <input type = 'date' name = 'eDate_n' /><br>
			  <label>Location:</label> <br>
			    <input type = 'text' name = 'location_n' /><br>
			  <label>Capacity:</label> <br>
			    <input type = 'number' name = 'capacity_n' /><br>
		      <label>Description:</label> <br>
			    <textarea type = 'text' name = 'describ_n'></textarea><br>
              <input type = 'submit' value = 'submit' class = 'click'/> 
            </form></div>";
		 $display_string = "<table class = 'etable' style = 'table-layout:fixed' width = '100%'>";
		 $display_string .= "<tr>";
         $display_string .= "<td> Id </td>";
		 $display_string .= "<td> Title </td>";
         $display_string .= "<td> Date </td>";
		 $display_string .= "<td> Location </td>";
		 $display_string .= "<td> Capacity </td>";
		 $display_string .= "<td> Delete </td>";
		 $display_string .= "<td> Edit </td>";
         $display_string .= "</tr></table>";
		 $display_string .=  "<br><p>No upcomming event !!!<p></div>";
	  }
	  else
	  {
		$num_result = mysqli_num_rows($result);
		echo "<h1 class = 'title'>University of Nottingham <br><b id = 'subtitle'>Event List</b></h1><br>";
		echo "<div id = 'mainblock'>";
		echo "<p>Number of Results - <span id = 'num'>$num_result</span></p>";
        echo "</p>";
		echo "<a style = 'font-size: 15px;float: left'><span style = 'color: red'>*</span>You can move mouse on event to see more details</a>";
	    echo "<div style = 'float: right'><input type = 'button' value = 'Add an event' id = 'show_add'></div>"; 
		echo "<div id = 'add_event' style = 'display: none'>
		      <form action = 'add_event.php' method = 'GET'>
		      <h3 id = 'logonFormTitle'><b>Add new event</b></h3>
              <label>Title:</label> <br>
                <input type = 'text' name = 'eTitle_n'/><br>
              <label>Date:</label> <br>
                <input type = 'date' name = 'eDate_n' /><br>
			  <label>Location:</label> <br>
			    <input type = 'text' name = 'location_n' /><br>
			  <label>Capacity:</label> <br>
			    <input type = 'number' name = 'capacity_n' /><br>
		      <label>Description:</label> <br>
			    <textarea type = 'text' name = 'describ_n'></textarea><br>
              <input type = 'submit' value = 'submit' class = 'click'/> 
            </form></div>";
		 $eId = "";
 		 $display_string = "<table class = 'etable' style = 'table-layout:fixed' width = '100%'>";
		 $display_string .= "<tr>";
         $display_string .= "<td> Id </td>";
		 $display_string .= "<td> Title </td>";
         $display_string .= "<td> Date </td>";
		 $display_string .= "<td> Location </td>";
		 $display_string .= "<td> Capacity </td>";
		 $display_string .= "<td> Delete </td>";
		 $display_string .= "<td> Edit </td>";
         $display_string .= "</tr>";
         
		while($row = mysqli_fetch_array($result)) {
		 $display_string .= "<tr class = 'row'>";
         $display_string .= "<td id = 'eid'>$row[eId]</td>";
		 $display_string .= "<td id = 'etitle'>$row[eTitle]</td>";
         $display_string .= "<td> $row[eDate] </td>";
		 $display_string .= "<td> $row[location] </td>";
		 $display_string .= "<td id = 'capacity'> $row[capacity] </td>";
		 $display_string .= "<td><input type = 'button' class='delete' value = 'delete'></td>";
		 $display_string .= "<td><input type = 'button' class='edit' value = 'edit'></td></tr>";
		 //$display_string .= "<tr style = 'display: none'><td colspan = 7 class = 'describ' style = 'word-break: break-all'> $row[describ]</td></tr>";
         
		 if (empty($row['describ']))
		 {
			 $display_string .= "<tr style = 'display: none'><td colspan = 7 class = 'describ' style = 'word-break: break-all'> None </td></tr>";
		 }
		 else
		 {
			 $display_string .= "<tr style = 'display: none'><td colspan = 7 class = 'describ' style = 'word-break: break-all'> $row[describ] </td></tr>";
		 }
		 
		 if (empty($row['eTitle'])) $row['eTitle'] = 'None';
		 if (empty($row['eDate'])) $row['eDate'] = 'None';
		 if (empty($row['location'])) $row['location'] = 'None';
		 if (empty($row['capacity'])) $row['capacity'] = 0;
		 if (empty($row['describ'])) $row['describ'] = 'None';
		 
		 $display_string .= 
		"<form action = 'edit_event.php' method = 'POST'><tr id = 'edit_event'>
		 <td><label>$row[eId]</label><input name = 'id_e' id = 'id_e' style = 'display: none' value = $row[eId]></td> 
		 <td><textarea type = 'text' style = 'width: 90px' name = 'title_e' id = 'title_e'>$row[eTitle]</textarea></td>
         <td><input type = 'date' value = $row[eDate] style = 'width: 90px;height: 20px' name = 'date_e' id = 'date_e'></td>
         <td><textarea type = 'text' style = 'width: 90px; height: 20px' name = 'location_e' id = 'location_e'>$row[location]</textarea></td>
         <td><input type = 'number' value = $row[capacity] style = 'width: 90px;height: 20px' name = 'capacity_e' id = 'capacity_e'></td>
         <td><input type = 'submit' id = 'edit_event_form' value = 'submit'></td>
		 <td><input type = 'button' class = 'cancel' value = 'cancel'></td></tr>
         <tr id = 'edit_event'><td colspan = 7>Description: <textarea type = 'describ' style = 'height: 25px;width: 350px' name = 'describ_e' id = 'describ_e'>$row[describ]</textarea></td></tr>
		 </form>";
        }
      $display_string .= "</table>";
	  $display_string .= "<p id = 'hint'>Result</p><br></div>";
	  }
      echo $display_string;
	  
	  //echo $_COOKIE["user"];
    }
}

}
else
{
	echo "You have not log on, plaese click here to main page: <a href = 'index.html'>Main page </a>";
}
?>
</body>
</html>
