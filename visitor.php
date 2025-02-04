<?php
// File to store the visitor count
$visitorFile = 'visitors.txt';

// Check if the file exists
if (!file_exists($visitorFile)) {
    // If not, create it and initialize with 0
    file_put_contents($visitorFile, 0);
}

// Read the current visitor count
$visitorCount = (int)file_get_contents($visitorFile);

// Check if this is a new visitor using a session
session_start();
if (!isset($_SESSION['visited'])) {
    $_SESSION['visited'] = true; // Mark the session as visited
    $visitorCount++; // Increment the visitor count for a new session
    file_put_contents($visitorFile, $visitorCount); // Update the file
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visitor Counter</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin: 20px;
        }
        .visitor-counter {
            font-size: 24px;
            color: #333;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1>Welcome to My Website</h1>
    <p class="visitor-counter">Number of Visitors: <strong><?php echo $visitorCount; ?></strong></p>
</body>
</html>
