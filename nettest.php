<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #000;
            color: #fff;
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('networkwires2.jpg');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
        }

        .box {
            /*position: relative;
            perspective: 500px; Define the perspective */
            width: 500px;
            height: 75px;
            background-color: #6677CC;
            color: #fff;
            font-size: 18px;
            text-align: center;
            padding: 10px;
            border: 3px solid violet;
            border-radius: 10px;
            transition: all 0.5s;
            transform-style: preserve-3d;
            margin: 30px;
            /*position: fixed;
            top:0;
            z-index=1;*/
        }

        .box:hover {
        background-color: #800080 ;
         border: 5px solid violet;
            transform: translateZ(-20px);
            box-shadow: 0 0 10px #0FF; 
        }

        h1 {
            text-align: center;
        }

        .content-box {
            /*width: 500px; */
            margin-top: 10px;
            padding: 10px;
            background-color:  #02075D;
            border: 3px solid orange;
            text-align: center;
            border-radius: 10px;
            transition: border 0.5s, background-color 0.5s;
            max-height:65vh;
            overflow-y:auto;
        }
        
         .content-box:hover {
         background-color: #AA336A;
         border: 5px solid pink;
            transform: translateZ(-20px); /* Extend the depth on hover */
            box-shadow: 0 0 10px #0FF; /* Add radiance effect */
        }
        
        .go-back-button {
        background-color: #666;
        color: #fff;
        border: 3px solid #777;
        padding: 10px 20px;
        margin: 30px;
        padding: 15px;
        font-size: 15px;
        font-weight:bold;
        border-radius: 10px;
        cursor: pointer;
        width:500px;
        transition: background-color 0.5s; /* Smooth color transition on hover */
        }
        
        .go-back-button:hover {
        background-color: #FF4500;
        border: 5px solid red;
        transform: translateZ(-20px); /* Extend the depth on hover */
        box-shadow: 0 0 10px #0FF; /* Add radiance effect */
        }
        
        .info{
        font-weight: bold; 
        color: pink; 
        }
        
        
    </style>
</head>
<body>
    <div class="box">
        <h1>Protocol Research Analysis</h1>
    </div>
    <div class="content-box">
        <?php
$question1 = $_POST['question1'];
$question2 = $_POST['question2'];
echo '<p class="info"> Chosen protocol is '.$question1.' & field is '.$question2.' </p>';

$filename;
switch($question1){
case "TCP" :
	switch($question2){
	case "TimeStamp":
		$filename ="timestamptcp";
		break;
	case "SourceMac":
		$filename = "sourcemactcp";
		break;
	case "DestinationMac":
		$filename = "destinationmactcp";
		break;
	case "SourceIP":
                $filename = "sourceiptcp";
		break;
	case "DestinationIP":
                $filename = "destinationiptcp";
                break;
        case "Destinationport":
                $filename = "destinationporttcp";
                break;
	case "All":
                $filename = "tcp";
                break;
	default:
		echo "<p>Invalid Selection. Please try again</p>";
	}
	break;
case "UDP" :
       	switch($question2){
        case "TimeStamp":
                $filename ="timestampudp";
                break;
        case "SourceMac":
                $filename = "sourcemacudp";
                break;
        case "DestinationMac":
                $filename = "destinationmacudp";
                break;
        case "SourceIP":
                $filename = "sourceipudp";
                break;
        case "DestinationIP":
                $filename = "destinationipudp";
                break;
        case "Destinationport":
                $filename = "destinationportudp";
                break;
	case "All":
                $filename = "udp";
                break;
                
        default:
                echo "<p>Invalid Selection. Please try again</p>";
	}
	break;
case "ARP" :
	switch($question2){
        case "TimeStamp":
                $filename ="timestamparp";
                break;
        case "SourceMac":
                $filename = "sourcemacarp";
                break;
        case "DestinationMac":
                $filename = "destinationmacarp";
                break;
        case "SourceIP":
                $filename = "sourceiparp";
                break;
        case "DestinationIP":
                $filename = "destinationiparp";
                break;
        case "Destinationport":
                $filename = "destinationportarp";
                break;
	case "All":
                $filename = "arp";
                break;
        default:
                echo "<p>Invalid Selection. Please try again</p>";
	}
	break;
default:
	echo "<p>Invalid Selection. Please try again</p>";
}

/*echo "<p> File is $filename</p>";*/

$fp = fopen("$filename","r") or die ("Unable to open file!");
echo "<h1> Content of $filename is : </h1>";
$content = fread($fp, filesize("$filename"));
echo "<pre>$content</pre>";
fclose($fp);

?>

    </div>
    
    <button class="go-back-button" onclick="window.location.href='nettest.html'">Go Back</button>
    
</body>
</html>


