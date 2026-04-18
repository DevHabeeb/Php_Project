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

        // Prepare and execute the SQL statement to delete data in the database
        $query = "DELETE FROM users WHERE username = ? AND pwd = ? ";

        $stmt = $pdo->prepare($query);

        $stmt->execute([$username, $pwd]);

        $pdo = null; // Close the database connection
        $stmt = null; // Close the statement

        header("Location: ../index.php"); // Redirect to index.php after successful deletion 

        die("Data deleted successfully!"); // Output success message and stop execution

        echo "Data deleted successfully!";
    }
    catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }   
    
} else {
    echo "No data submitted.";
    header("Location: ../index.php");
}