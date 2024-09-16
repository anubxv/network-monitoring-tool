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
      background-image: url('networktop.png');
      background-size: cover;
      background-repeat: no-repeat;
      background-attachment: fixed;
    }

    .container {
      text-align: center;
      padding: 20px;
      border: 2px solid purple;
      border-radius:10px;
      background-color: #800080;
      transition: border 0.5s, background-color 0.5s;
    }

    .container:hover {
      border: 2px solid #0f6;
      background-color: #006400;
      transform: translateZ(-20px);
      box-shadow: 0 0 10px #0FF; 
    }
    
    .go-back-button, .logout-button {
      background-color: pink;
      color: #000;
      border: 2px solid white;
      padding: 10px 25px;
      cursor: pointer;
      border-radius: 5px;
      margin: 10px 5px;
    }
    
    .go-back-button:hover, .logout-button:hover {
      background-color: #0f6;
      border: 3px solid yellow;
      transform: translateZ(-20px);
      box-shadow: 0 0 10px #0FF; 
    }
    
    .select {
    font-weight: bold;
    color: pink;
    
  }
  
  </style>
</head>
<body>
  <div class="container">
    <h1>Top Packets Analysis</h1>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
   $selectedPacketType = $_POST["packetType"];
   $fileName = "";
   echo '<p class="select"> Selected field is '.$selectedPacketType.'</p>';

      switch ($selectedPacketType) {
        case "ARP":
          $fileName = "toparp";
          break;
        case "UDP":
          $fileName = "topudp";
          break;
        case "TCP":
          $fileName = "toptcp";
          break;
        default:
          echo "Invalid selection.";
          break;
      }
      echo $filename;

      if (!empty($fileName)) {
        $fileContent = file_get_contents($fileName);
        echo "<h2>Top $selectedPacketType Packets</h2>";
        echo "<pre>$fileContent</pre>";
      }
       } 
    ?>
    <br>
    <a href="toptalker.html"><button class="go-back-button">Go Back</button></a>
    <a href="logout.php"><button class="logout-button">Log Out</button></a>
  </div>
</body>
</html>

