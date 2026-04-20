<?php 

ini_set('session.use_only_cookies', 1); // Ensure sessions use cookies only 
ini_set('session.use_strict_mode', 1); // Enable strict mode for sessions 

session_set_cookie_params([
    'lifetime' => 1800, // Session cookie will expire after 30 minutes
    'path' => '/',
    'domain' => 'localhost', // Set to your domain  
    'secure' => true, // Ensure cookies are sent over HTTPS
    'httponly' => true, // Prevent JavaScript access to session cookies
]);

session_start();

if (!isset($_SESSION["last_regeneration"])) {
    regenerateSession(); // Regenerate session ID on first load
} else {
    $interval = 60 * 30; // Regenerate every 30 minutes
    if (time() - $_SESSION["last_regeneration"] >= $interval) {
        regenerateSession(); // Regenerate session ID after the specified interval  
    }
}

function regenerateSession() {
    session_regenerate_id(true); // Regenerate session ID to prevent fixation
    $_SESSION["last_regeneration"] = time(); // Store the time of the last regeneration 
}