<?php
session_start();
$host		= "localhost";      
$username	= "root";
$password	= ""; 
$db_name	= "cdk"; 
 
$con = mysqli_connect($host, $username, $password,$db_name);

	$username =$_POST['rollnumber'];
	$password =$_POST['password'];

$querry="SELECT * FROM authentication WHERE username= '$username' AND password='$password'";
$result=mysqli_query($con,$querry);
if(mysqli_num_rows($result) > 0)
{
    
    while($row = mysqli_fetch_array($result))
{
    $sara=$row["uservalid"];
}
}
if($sara == "1")
{

	$_SESSION['username'] =$_POST['rollnumber'];

	header('location:staff/staffdashboard.php');	
}
elseif($sara =="0")
{
    
	$_SESSION['username'] =$_POST['rollnumber'];

	header('location:student/studentdashboard.php
');	
        
    
}
elseif($sara == "2")
{
   
	$_SESSION['username'] =$_POST['rollnumber'];

	header('location:admin/admindashboard.php');	
        
   
}
else
{
	header('location:index.html');
}
mysqli_close($con);
?>
