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
    }

    .container {
      text-align: center;
      padding: 20px;
      border: 2px solid purple;
      background-color: #800080;
      transition: border 0.5s, background-color 0.5s;
    }

    .container:hover {
      border: 2px solid #0f6;
      background-color: #006400;
    }

    .options-container {
      background-color: #222;
      padding: 20px;
      border-radius: 10px;
      border: 2px solid #0f6;
      margin-top: 20px;
    }

    .option-button {
      background-color: #0f6;
      color: #000;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
      margin: 10px 0;
    }

    .option-button:hover {
      background-color: #006400;
    }

    .stop-button {
      background-color: #f00;
      color: #000;
      border: none;
      padding: 10px 20px;
      cursor: pointer;
      border-radius: 5px;
      margin: 10px 0;
    }

    .stop-button:hover {
      background-color: #800000;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Check Packets</h1>
    <div class="options-container">
      <form method="post" action="checkpackets.php">
        <button class="option-button" type="submit" name="fetchNew">Fetch New Packets</button>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['fetchNew'])) {
          echo '<button class="stop-button" type="submit" name="stopFetching">Stop</button>';
        }
        ?>
        <button class="option-button" type="submit" name="fetchExisting">Fetch Existing Packets</button>
      </form>
    </div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      if (isset($_POST['fetchNew'])) {
        // Execute the shell script to fetch new packets
        $output = '';
        if (file_exists('abort_fetch.txt')) {
          // Check if the "Stop" button was pressed
          echo '<p>Fetching new packets aborted.</p>';
          $output = file_get_contents('abort_fetch.txt');
        } else {
          $output = shell_exec('./lantest.sh');
        }
        echo '<p>Fetching new packets...</p>';
        // Display the output of the shell script
        echo '<pre>' . $output . '</pre>';
      } elseif (isset($_POST['fetchExisting'])) {
        // Add code to fetch existing packets
        echo '<p>Fetching existing packets...</p>';
      }
      if (isset($_POST['stopFetching'])) {
        // Create a file to signal the script to stop
        file_put_contents('abort_fetch.txt', 'Fetching new packets aborted.');
      }
    }
    ?>
  </div>
</body>
</html>

