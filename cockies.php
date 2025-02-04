<?php
// 1. Creating a cookie
$cookieName = "user";
$cookieValue = "John Doe";
$expiryTime = time() + (86400 * 7); // 7 days from now
$cookiePath = "/"; // Available across the entire domain
$cookieDomain = ""; // Set to current domain
$secure = false; // Use HTTPS (true if your site is HTTPS)
$httpOnly = true; // Prevent access to cookie via JavaScript

// Set the cookie
setcookie($cookieName, $cookieValue, [
    'expires' => $expiryTime,
    'path' => $cookiePath,
    'domain' => $cookieDomain,
    'secure' => $secure,
    'httponly' => $httpOnly
]);

// Inform the user that the cookie has been set
echo "Cookie '{$cookieName}' has been set.<br>";

// 2. Retrieving all cookies
echo "<h3>All Cookies:</h3>";
if (!empty($_COOKIE)) {
    foreach ($_COOKIE as $key => $value) {
        echo "Cookie Name: $key, Cookie Value: $value<br>";
    }
} else {
    echo "No cookies found.<br>";
}

// 3. Deleting the cookie
if (isset($_COOKIE[$cookieName])) {
    // Set the cookie with an expiry time in the past to delete it
    setcookie($cookieName, '', [
        'expires' => time() - 3600, // Expire 1 hour ago
        'path' => $cookiePath,
        'domain' => $cookieDomain,
        'secure' => $secure,
        'httponly' => $httpOnly
    ]);
    echo "Cookie '{$cookieName}' has been deleted.<br>";
} else {
    echo "Cookie '{$cookieName}' is not set.<br>";
}
?>
