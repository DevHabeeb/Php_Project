<?php
//     if ($_SERVER["REQUEST_METHOD"] == "POST") {
//         $firstname = htmlspecialchars($_POST["firstname"]);
//         $lastname = htmlspecialchars($_POST["lastname"]);
//         $occupation = htmlspecialchars($_POST["Occupation"]);

//         echo "Firstname: " . $firstname . "<br>";
//         echo "Lastname: " . $lastname . "<br>";
//         echo "Occupation: " . $occupation . "<br>";

//  header("Location: ../index.php");
        
//     }

//     if (empty($firstname) || empty($lastname) || empty($occupation)) {

//         echo "Please fill in all fields.";
//         exit();
//         header("Location: ../index.php");
//     }

//     else {
//         header("Location: ../index.php");
//         echo "No data submitted.";
        
//     }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST["username"]);
    $pwd = htmlspecialchars($_POST["pwd"]);
    $email = htmlspecialchars($_POST["email"]);

    echo "Username: " . $username . "<br>";
    echo "Password: " . $pwd . "<br>";
    echo "Email: " . $email . "<br>";
  

    try {
        require_once "databasehandler.inc.php"; // Include the database connection

        // Prepare and execute the SQL statement to insert data into the database
        $query = "INSERT INTO users (username, pwd, email) VALUES (?, ?, ?);";


        $options = [
    'cost' => 12, // The cost parameter determines the computational cost of hashing. Higher values increase security but also increase processing time.
];

$hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);


        $stmt = $pdo->prepare($query);

        $stmt->execute([$email, $username, $hashedPwd]);

        $pdo = null; // Close the database connection
        $stmt = null; // Close the statement

        header("Location: ../index.php"); // Redirect to index.php after successful insertion

        die("Data inserted successfully!"); // Output success message and stop execution

        echo "Data inserted successfully!";
    }
    catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }   
    
} else {
    echo "No data submitted.";
    header("Location: ../index.php");
}