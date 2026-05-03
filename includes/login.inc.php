<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];

    try { 
        require_once "databasehandler.inc.php";
        require_once "login_model.inc.php";
        require_once "login_contr.inc.php";

         // Error handling

          $errors = [];
    if (is_input_empty($username, $pwd)) {
        $errors["empty_input"] = "Please fill in all fields.";
    }

    $result = get_user($pdo, $username);

    if (is_username_wrong($result)) {
        $errors["login_incorrect"] = "Incorrect login info!";
    } if (!is_username_wrong($result) && is_password_wrong($pwd, $result["pwd"])) {
       $errors["login_incorrect"] = "Incorrect login info!";
    }

    

    

    require_once "../config.php"; // Include the config file to access the database connection 

    if ($errors) {
        $_SESSION["errors_login"] = $errors; // Store errors in session to display on the form


       

        header("Location: ../index.php"); // Redirect back to the form page
        die(); // Stop further execution   
    }

    $newSessionId = session_create_id(); // Create a new session ID
    $session_id = $newSessionId . "_" . $result["id"]; // Set the new session ID
    session_id($session_id); // Update the session ID
    $_SESSION["user_id"] = $result["id"]; // Store the user ID in the session
    $_SESSION["user_username"] = htmlspecialchars($result["username"]); // Store the username in the session
    $_SESSION["last_regeneration"] = time(); // Store the time of the last regeneration
    header("Location: ../index.php?login=success"); // Redirect to index.php with a success message
    $pdo = null; // Close the database connection   
    $stmt = null; // Close the statement
    die("Login successful!"); // Output success message and stop execution
     
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    } 
} else {
    header("Location: ../index.php"); // Redirect to index.php if the request method is not POST
    die();
}