<?php 
 if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $userSearch = htmlspecialchars($_POST["usersearch"]);
  

    try {
        require_once "includes/databasehandler.inc.php"; // Include the database connection

        // Prepare and execute the SQL statement to fetch matching comments
        $query = "SELECT * FROM comments WHERE username = :usersearch";

        $stmt = $pdo->prepare($query);

        $stmt->execute(['usersearch' => $userSearch]);

        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $pdo = null; // Close the database connection
        $stmt = null; // Close the statement
    }
    catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }   
    
} else {
    echo "No data submitted.";
    header("Location: ../index.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head> 

<h3> Search Results</h3>

<?php 
    if (!empty($results)) {
        foreach ($results as $result) {
            echo "<p>" . $result['comment_text'] . "</p>";
            echo "<p>" . $result['username'] . "</p>";
        }
    } else {
        echo "<p>No results found for '" . htmlspecialchars($_POST["usersearch"]) . "'.</p>";
    }
?>

<body>



  










</body>
</html> 