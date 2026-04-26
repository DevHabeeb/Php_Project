<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $pwd = htmlspecialchars($_POST["pwd"]);
    $email = htmlspecialchars($_POST["email"]);

    echo "Username: " . $username . "<br>"; 
    echo "Password: " . $pwd . "<br>";
    echo "Email: " . $email . "<br>";
  

    try {
        require_once "databasehandler.inc.php"; // Include the database connection

        // Prepare and execute the SQL statement to update data in the database
        $query = "UPDATE users SET pwd = ?, email = ? WHERE username = ?";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$pwd, $email, $username]);

        $pdo = null; // Close the database connection
        $stmt = null; // Close the statement

        header("Location: ../index.php"); // Redirect to index.php after successful insertion

        die("Data updated successfully!"); // Output success message and stop execution

        echo "Data updated successfully!";
    }
    catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }   
    
} else {
    echo "No data submitted.";
    header("Location: ../index.php");
}