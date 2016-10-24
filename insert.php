<?php 
    $con = mysqli_connect("localhost","zy15765","zy15765","db_zy15765");
    if (!$con)
    {
      die('Could not connect.');
    }
    echo "the mysql connectd successfully. ";
    echo '<br/>';
    
    $Username = mysqli_real_escape_string($con,$_POST['Username']);
    $Passwords = mysqli_real_escape_string($con,$_POST['Passwords']);
    $Email = mysqli_real_escape_string($con,$_POST['Email']);
    $Phone = mysqli_real_escape_string($con,$_POST['Phone']);
    $Type = mysqli_real_escape_string($con,$_POST['Type']);
    
    $sql = "INSERT INTO Users (Username, Passwords, Email, Phone, uType) 
                VALUES ( '$Username', '$Passwords' , '$Email', '$Phone', '$Type' )";
    /*
    $sql = "INSERT INTO Orders (Name, Email, Phone, CoffeeOrder, DeliveryInfo) 
                VALUES ('$_POST[name]', '$_POST[email]', '$_POST[phone]', '$_POST[coffee]', '$_POST[info]')";
    */
    if (!mysqli_query($con,$sql))
    {
      die('Error: ' . mysqli_error($con));
    }
    echo "The information have been recorded successfully.";
    header('location:index.html');
?>
