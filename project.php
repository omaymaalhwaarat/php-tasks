<?php
echo "<br>";
echo "Q4";
echo "<br>";
// Get the script name
$scriptName = basename($_SERVER['SCRIPT_NAME']); // Example: index.php

// Get the project name
$projectName = explode('/', trim($_SERVER['SCRIPT_NAME'], '/'))[0]; // First folder in the path

echo "Project Name: " . $projectName . "<br>";
echo "Script Name: " . $scriptName;
echo "<br>";
?>

<?php
echo "<br>";
echo "Q5";
echo "<br>";
// Get the request time as a timestamp
$requestTime = $_SERVER['REQUEST_TIME'];

// Convert the timestamp to a readable date and time
$requestTimeFormatted = date('Y-m-d H:i:s', $requestTime);

// Display the request time
echo "Page requested at: " . $requestTimeFormatted;
echo "<br>";
?>

<?php
echo "<br>";
echo "Q6";
echo "<br>";
// File to store the counter value
$counterFile = 'counter.txt';

// Check if the file exists
if (!file_exists($counterFile)) {
    // If not, create it and initialize with 0
    file_put_contents($counterFile, 0);
}

// Read the current counter value from the file
$counter = (int)file_get_contents($counterFile);

// Increment the counter
$counter++;

// Save the new counter value back to the file
file_put_contents($counterFile, $counter);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Counter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        .counter {
            font-size: 24px;
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Welcome to My Website</h1>
    <p class="counter">Page Views: <strong><?php echo $counter; ?></strong></p>
</body>
</html>


