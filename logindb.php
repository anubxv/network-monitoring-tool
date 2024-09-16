<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-color: #000;
      color: #fff;
      font-family: Arial, sans-serif;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      margin: 0;
      background-image: url('network.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }
    
    h1 {
    font-weight: bold;
    color: #00008B;
    } 

    .container {
      text-align: center;
      padding: 20px;
      border: 2px solid purple;
      border-radius: 10px;
      background-color: #87CEFA;
      transition: border 0.5s, background-color 0.5s;
    }

    .container:hover {
      border: 2px solid #FFA500;
      background-color: #FFC0CB;
      transform: translateZ(-20px); 
      box-shadow: 0 0 10px #0FF; 
      
    }
    
    .success {
      font-weight: bold; /* Add bold font style */
      color: #006400; /* Change color to green or your preferred color */
    }
    
    .failure {
      font-weight: bold; /* Add bold font style */
      color: #f00; /* Change color to red or your preferred color */
    }
    
    .user{
    color: #8B008B;
    }
    
    .protocol-button {
    background-color: #FFA500;
    color: #fff;
    border: none;
    padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
      margin: 10px auto;
      display: block;
    }

    .protocol-button:hover {
      background-color: #009500;
    }
    
     .logout-button {
      background-color: #f00; /* Red color for the button */
      color: #fff; /* White text color */
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
      margin: 10px auto;
      display: block;
    }

    .logout-button:hover {
      background-color: #800000; /* Darker red when hovered */
    }

  </style>
</head>
<body>
  <div class="container">
    <h1>Login System</h1>
    <?php
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
echo '<p class="user"> Hey '."$myusername".', </p>';


$sql = "select * from $tbl_name where passwd='$mypassword' AND name='$myusername'";

$result = mysqli_query($conn,$sql);


$part= mysqli_num_rows($result);


if ($part == 1)
{
	//header("Location: firstpage.html");
 echo'<p class="success"> SUCCESS :)) YOU HAVE LOGGED IN TO THE WEBSITE </p>' ;
 echo '<button class="protocol-button" onclick="window.location.href=\'firstpage.html\'">Go to Network Analysis page</button>';
  echo '<button class="logout-button" onclick="window.location.href=\'login.html\'">Try with another account</button>';

}
else
{
 echo '<p class="failure"> AUTHENTICATION FAILED! </p>';
 echo '<button class="logout-button" onclick="window.location.href=\'login.html\'">Logout and Try again</button>';
}


?>
  </div>
  
  
</body>
</html>
