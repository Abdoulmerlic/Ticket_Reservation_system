<?php
if (!defined('DB_SERVER'))   define('DB_SERVER', 'localhost');
if (!defined('DB_USERNAME')) define('DB_USERNAME', 'root');
if (!defined('DB_PASSWORD')) define('DB_PASSWORD', '');
if (!defined('DB_NAME'))     define('DB_NAME', 'booking_db');

// Attempt to connect to MySQL database
try {
    $conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    
    // Check connection
    if(!$conn) {
        throw new Exception("Connection failed: " . mysqli_connect_error());
    }
    
    // Set charset to ensure proper encoding
    mysqli_set_charset($conn, "utf8mb4");
    
} catch(Exception $e) {
    error_log("Database Connection Error: " . $e->getMessage());
    die("Sorry, there was an error connecting to the database. Please try again later.");
}
?>