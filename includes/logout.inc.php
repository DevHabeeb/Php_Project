<?php

session_start(); // Start the session to access session variables
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

header("Location: ../index.php?logout=success"); // Redirect to index.php with a success message
die(); // Stop further execution