<?php

/*
/* Ways to connect to a MYSql Database
1. MYSQLi Extension
2. PDO - php data objects





$conn = mysqli_connect($servername,$username,$password) or die ("cannot connect");

//Die if connection was not successful
if (!$conn){
die("Sorry we failed to connect: ",mysqli_connect_error());
}
else{
echo "connection was successful";
}*/


$servername = "localhost";
$username = "root";
$password = "";
$tbl_name="login";
$conn= mysqli_connect("localhost","root","","ssn") or die("cannot connect");
//$myusername=$_POST['usr'];
$myusername="anubhav";
$mypassword="anubhav123";
//$mypassword=$_POST['pwd'];
$sql="select * from $tbl_name where passwd=$mypassword AND name=$myusername";
$result=mysqli_query($conn,$sql);
$count=mysqli_num_rows($result);
if ($count == 1)
{
echo "SUCCESS" ;
}
else
{
echo "AUTHENTICATION FAILURE" ;
}
*/

?>
