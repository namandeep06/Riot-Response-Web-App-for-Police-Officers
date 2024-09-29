<!DOCTYPE html>
<html lang="en">
<head>
<!-- <meta http-equiv="refresh" content="2"></meta> -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>

.traffic-lightconst {
    position: relative;
    width: 100px;
    height: 300px;
    border: 1px solid #333;
    border-radius: 10px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 10px;
  }

  .pole1 {
    position: absolute;
    bottom: 0;
    width: 20px;
    height: 150px;
    background-color: #333;
  }

  .light1 {
    width: 80px;
    height: 80px;
    border-radius: 50%;
    margin-bottom: 10px;
  }

  .red1 {
    background-color: #ff0000;
  }

  .yellow1 {
    background-color: #ffff00;
  }

  .green1 {
    background-color: #00ff00;
  }
          
  @keyframes flicker {
    0% { opacity: 1; }
    50% { opacity: 0.2; }
    100% { opacity: 1; }
  }

  .light {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    margin-bottom: 10px;
    animation: flicker 0.5s infinite alternate;
  }
  .light1 {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    margin-bottom: 10px;
    
  }
.traffic-signal{
    padding: 20px;
    background-color: black;
    width: 50px;
    padding: 8px;
    position: absolute;
    left: 143px;
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    position: relative;
    top: -540px;
    padding-top:13px
}



.pole {
    position: absolute;
    bottom: -88px;
    width: 20px;
    height: 88px;
    background-color: #333;
  }

  .light {
    width: 20px;
    height: 20px;
    border-radius: 50%;
    margin-bottom: 10px;
    animation: flicker 0.5s infinite alternate;
  }

  .red {
    background-color: #ff0000;
    box-shadow: 0 0 20px #ff0000;
  }

  .yellow {
    background-color: #ffff00;
    box-shadow: 0 0 20px #ffff00;
  }

  .green {
    background-color: #00ff00;
    box-shadow: 0 0 20px #00ff00;
  }
       body{
        margin:0;
       }
        .container {
    display: flex;
    justify-content: end;
    align-items: center;
    /* margin-top: 50px; */
    background-color: #4fb94f;
    column-gap: 10px;
    padding: 53px;
    
    padding-right: 23px;
        }

        .door {
            width: 163px;
    height: 166px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            position:absolute;
            bottom: -34px;
            
        }

        .closed {
            background-image: url('closed_door.png')  ;        
           
        }

        .open {
            background-image: url('open_door.png');
        }
        .back{
            width: 177px;
    height: 177px;         
            display:flex;
            justify-content:center;
            background-color:#f1dfb7;
            position:relative;
            border:1px solid black;
            

        }


        .controls {
            text-align: center;
            margin-top: 20px;
        }

        button {
            padding: 10px 20px;
            margin: 0 10px;
            cursor: pointer;
        }
        .road{
            background-color:#DED4E8;
            padding:60px;
        }
        .intersection{
            position: absolute;
    width: 114px;
    left: 119px;
    height: 650px;
    background-color: #DED4E8;
    top: 0;
        }
    </style>
    <!-- <meta http-equiv="refresh" content="3"> -->
</head>
<body>
    <div class="container">

        <?php
            // Function to fetch temperature value from ThingSpeak API
            function getTemperatureValue() {
                // Your ThingSpeak Channel ID and Read API Key
                $channelID = '2472958'; // Replace with your actual channel ID
                $apiKey = '8A9REPRTD4IP4G6L'; // Replace with your actual Read API Key

                // Prepare the URL for the ThingSpeak API
                $url = "https://api.thingspeak.com/channels/$channelID/feeds.json?api_key=$apiKey&results=1";

                // Fetch data from ThingSpeak
                $response = file_get_contents($url);

                // Check if data retrieval was successful
                if ($response === FALSE) {
                    return NULL;
                } else {
                    // Decode JSON response
                    $data = json_decode($response, true);

                    // Check if data exists and if field1 (Temperature) has a value
                    if (!empty($data['feeds']) && isset($data['feeds'][0]['field1'])) {
                        // Retrieve the value of field1 (Temperature)
                        return $data['feeds'][0]['field1'];
                    } else {
                        return NULL;
                    }
                }
            }

            // Fetch temperature value
            $temperatureValue = getTemperatureValue();

            // Determine door status based on temperature value
            $doorStatus = ($temperatureValue == 1) ? 'closed' : 'open';
            
            // Print door HTML based on door status
            for ($i = 1; $i <= 5; $i++) {
                if ($i <= 5) {
                    echo '<div class="back"><div class="door ' . $doorStatus . '" id="door' . $i . '"></div></div>';
                } else {
                    echo '<div class="back"><div class="door open" id="door' . $i . '"></div></div>';
                }
            }
           
           
        ?>
       
    </div>
    <div class="intersection"></div>
    <div class="road"></div>
    <div class="container">
        <?php
    for ($i = 1; $i <= 5; $i++) {
                if ($i <= 5) {
                    echo '<div class="back"><div class="door ' . $doorStatus . '" id="door' . $i . '"></div></div>';
                } else {
                    echo '<div class="back"><div class="door open" id="door' . $i . '"></div></div>';
                }
            }
           
           
        ?>
    </div>
<?php
    if($temperatureValue == '1')
{
    
   echo '
   
   <div class="traffic-signal">
            <div class="light red"></div>
            <div class="light yellow"></div>
            <div class="light green"></div>
            <div class="pole"></div>
   
    </div>';
}
if($temperatureValue == '0')
{
   echo '<div class="traffic-signal">
            <div class="light1 red1"></div>
            <div class="light1 yellow1"></div>
            <div class="light1 green1"></div>
            <div class="pole"></div>
    </div>';
}
    ?>
    
    <!-- <div class="controls">
        <button id="openBtn">Open 4 Doors</button>
        <button id="closeBtn">Close 4 Doors</button>
        <button id="toggleBtn">Toggle All Doors</button>
    </div> -->
    <script>
        function reloadPage() {
            setTimeout(function() {
                location.reload();
            }, 5000); // 5000 milliseconds = 5 seconds
        }
        function fetchAndUpdateDoors() {
            // Fetch temperature value from the PHP script
            fetch('temperature.php')
                .then(response => response.json())
                .then(data => {
                    // Simulate button click based on temperature value
                    if (data.temperature === 0) {
                        document.getElementById('openBtn').click();
                    } else if (data.temperature === 1) {
                        document.getElementById('closeBtn').click();
                    }
                })
                .catch(error => console.error('Error:', error));
        }

        // Fetch and update doors every 3 seconds
        setInterval(fetchAndUpdateDoors, 3000);
        fetchAndUpdateDoors();

        // Rest of your JavaScript code for button click events...
        // Ensure that the button click event handlers are properly set up.
    </script>
     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
