<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Urban Forge</title>
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
    background-color: #536058;
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
    /* left: 143px; */
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    position: relative;
    /* top: -540px; */
    padding-top:13px
    left: -144px;
    bottom: 92px;
}
.signals{
  left:85px;
  z-index: 555;
}



.pole {
    position: absolute;
    bottom: -88px;
    width: 20px;
    height: 88px;
    background-color: #536058;
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
            bottom: -33px;
            
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
            background-color:#c9b791;
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
    left: 60px;
    bottom:0;
    background-color: #DED4E8;
    top: 0;
        }
        .main-container{
          /* row-gap:140px; */
        }
        .road{
          padding:84px
        }
        .white-mark {
  position: absolute;
  width: 50px; /* adjust width of the white mark */
  height: 3px; /* adjust height of the white mark */
  background-color: white;
}

.white-mark:nth-child(1) {
  top: 50%;
  left: 20%;
}

.white-mark:nth-child(2) {
  top: 50%;
  left: 40%;
}

.white-mark:nth-child(3) {
  top: 50%;
  left: 60%;
}

.white-mark:nth-child(4) {
  top: 50%;
  left: 80%;
}
.top-mark {
  position: absolute;
  width: 5px; /* adjust width of the white mark */
  height: 63px; /* adjust height of the white mark */
  background-color: white;
  transform: rotate(360deg); 
  z-index: 23;/* rotate the white mark */
  left: 50%;
}

.top-mark:nth-child(1) {
  top: 6%!important;
  
}
.main-container{
background-color:#3b6e3d;
}
.navbar{
 background-color: rgb(200 223 181)!important;
}

.top-mark:nth-child(n) {
  top: 80%;

}
    </style>
    <meta http-equiv="refresh" content="2">
  </head>
  <body>
    
    <!-- //navigation  -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="index-copy.php"><b>UrbanForge</b></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <b><a class="nav-link active" aria-current="page" href="">Home</a></b>
        <b><a class="nav-link" href="mockup.php">MockUp images</a></b>
        <b><a class="nav-link" href="https://drive.google.com/uc?export=download&id=1mBVx8r2PJxK4RQaNWkXQeAAgfaBRNG2t" download>Instruction-guide</a></b>
        
      </div>
    </div>
  </div>
</nav>
<!--  -->


<!-- main-code -->

<div class="container-fluid d-flex align-items-end justify-content-center flex-column main-container p-0 position-relative">
  <div class="div position-absolute intersection bg-dark" >
    <div class="top-mark"></div>
   
    <div class="top-mark"></div>

  </div>
  <div class="d-flex gap-4 p-3">
<?php
// Function to fetch temperature value from ThingSpeak API
function getTemperatureValue()
{
    // Your ThingSpeak Channel ID and Read API Key
    $channelID = '2472958'; // Replace with your actual channel ID
    $apiKey    = '8A9REPRTD4IP4G6L'; // Replace with your actual Read API Key
    
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
       <div class="container-fluid bg-dark road position-relative">
       <div class="white-mark"></div>
  <div class="white-mark"></div>
  <div class="white-mark"></div>
  <div class="white-mark"></div>

       </div>
        <div class="d-flex gap-4 p-3">
        <?php
for ($i = 1; $i <= 5; $i++) {
    if ($i <= 5) {
        echo '<div class="back"><div class="door ' . $doorStatus . '" id="door' . $i . '"></div></div>';
    } else {
        echo '<div class="back"><div class="door open" id="door' . $i . '"></div></div>';
    }
}


?>
       <div class="signals position-absolute">
        <?php
if ($temperatureValue == '1') {
    
    echo '
  
   <div class="traffic-signal position-absolute">
            <div class="light red"></div>
            <div class="light yellow"></div>
            <div class="light green"></div>
            <div class="pole position-absolute"></div>
  
    </div>';
}
if ($temperatureValue == '0') {
    echo '<div class="traffic-signal position-absolute">
            <div class="light1 red1"></div>
            <div class="light1 yellow1"></div>
            <div class="light1 green1"></div>
            <div class="pole  position-absolute"></div>
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
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>