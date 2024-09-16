<?php

echo "LOGIN SYSTEM";
echo " PROCESSING ";

/*
This File contains Database configuration assuming you are running mysql using user "root" and password ""
*/

define('DB_SERVER','localhost');
define('DB_USERNAME','anubhav');
define('DB_PASSWORD','a');
define('DB_NAME','ssn');
//define('TBL_NAME','login');

//Try connecting to the database

$conn = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

//Check the connection
if ($conn == false){
	die('Error: Cannot Connect');
}

$myusername=$_POST['username'];
$mypassword=$_POST['password'];
$tbl_name='login';

/*$myusername="anubhav";
$mypassword="anubhav123";
*/
echo " for $myusername >>>";


$sql = "select * from $tbl_name where passwd='$mypassword' AND name='$myusername'";

$result = mysqli_query($conn,$sql);


$part=mysqli_num_rows($result);


if ($part == 1)
{
	header("Location: firstpage.html");
//echo "SUCCESS :)) YOU HAVE LOGGED IN TO THE WEBSITE" ;
}
else
{
echo "AUTHENTICATION FAILURE" ;
}

?>
