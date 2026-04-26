<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try { 
        require_once "databasehandler.inc.php";
        require_once "signup_model.inc.php";
        require_once "signup_contr.inc.php";

         // Error handling
    $errors = [];
    if (is_input_empty($username, $pwd, $email)) {
        $errors["empty_input"] = "Please fill in all fields.";
    }

    if (!is_email_valid($email)) {
        $errors["invalid_email"] = "Please enter a valid email address.";
    }

    if (is_username_taken($pdo, $username)) {
        $errors["username_taken"] = "Username already taken.";
    }

    if (is_email_registered($pdo, $email)) {
        $errors["email_used"] = "Email already registered.";
    }

    require_once "../config.php"; // Include the config file to access the database connection 

    if ($errors) {
        $_SESSION["errors_signup"] = $errors; // Store errors in session to display on the form

        $signupData = [
           "username" => $username,
           "email" => $email
        ];
       $_SESSION["signup_data"] = $signupData; // Store the entered username and email in session to pre-fill the form
        

        header("Location: ../index.php"); // Redirect back to the form page
        die(); // Stop further execution   
    }

    create_user($pdo, $email, $username, $pwd); // Call the function to create the user in the database
    header("Location: ../index.php?signup=success"); // Redirect to index.php with a success message
    $pdo = null; // Close the database connection
    $stmt = null; // Close the statement
    die("User created successfully!"); // Output success message and stop execution 
 
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }

   





    // if (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    //     header("location: ../index.php?error=invalidmailuid");
    //     echo "Invalid email or username.";
    //     exit();
    // }
   
    // if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    //     header("location: ../index.php?error=invaliduid");
    //     echo "Invalid username.";
    //     exit();
    // }

    // Check if user already exists
    // $sql = "SELECT username FROM users WHERE username = ?";
    // $stmt = mysqli_stmt_init($conn);
    // if (!mysqli_stmt_prepare($stmt, $sql)) {
    //     header("location: ../index.php?error=sqlerror");
    //     exit();
    // } else {
    //     mysqli_stmt_bind_param($stmt, "s", $username);  // Bind the username parameter to the SQL statement
    //     mysqli_stmt_execute($stmt);  // Execute the prepared statement
    //     mysqli_stmt_store_result($stmt); // Store the result to check if any rows were returned
    //     $resultCheck = mysqli_stmt_num_rows($stmt); // Get the number of rows returned by the query
    //     if ($resultCheck > 0) {
    //         header("location: ../index.php?error=usernametaken");
    //         exit();
    //     } else {
    //         // Insert user into database
    //         $sql = "INSERT INTO users (username, pwd, email) VALUES (?, ?, ?)";        }
    // }
} else {
    header("location: ../index.php");
    exit();
}
