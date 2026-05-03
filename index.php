<?php 

// session_start();

// $_SESSION["username"] = "devhabeeb";

require_once 'config.php';
require_once 'includes/signup_view.inc.php';
require_once 'includes/login_view.inc.php';


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<!-- <?php 
   $a = 5;

   echo $a++;
   echo $a;
?> -->
    <!-- <main> 
        <form action="includes/formhandler.php" method="post">
            <label for="firstname">Firstname</label>
            <input type="text" name="firstname" placeholder="Firstname" required>

            <label for="lastname">Lastname</label>
            <input type="text" name="lastname" placeholder="Lastname" required>

            <label for="Occupation">Occupation</label>
            <select name="Occupation" id="Occupation">
                <option value="Student">Student</option>
                <option value="Teacher">Teacher</option>
                <option value="Doctor">Doctor</option>
                <option value="Engineer">Engineer</option>
            </select>


            <button type="submit">Submit</button>
        </form>
    </main> -->


    <!-- <form action= "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
       Form for calculator
          <input type="number" name="number1" placeholder="Number 1">
         <select name="operation">
             <option value="add">+</option>
             <option value="subtract">-</option>
             <option value="multiply">×</option>
             <option value="divide">/</option>
         </select>
         <input type="number" name="number2" placeholder="Number 2">
         <button type="submit">Calculate</button> 

    </form> -->

  

    <?php 
        // if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //     // Sanitize and Get the input values
        //     $number1 = filter_input(INPUT_POST, "number1", FILTER_SANITIZE_NUMBER_FLOAT);
        //     $number2 = filter_input(INPUT_POST, "number2", FILTER_SANITIZE_NUMBER_FLOAT);
        //     $operation = htmlspecialchars($_POST["operation"]);
        //     $value = 0;

        //     // Error handling for invalid inputs
        //     $errors = false;
        //         if (empty($number1) || empty($number2) || empty($operation) ) {
        //             echo "Please input all fields!";
        //             $errors = true;
        //         }

        //         if (!is_numeric($number1) || !is_numeric($number2)) {
        //             echo "Please enter valid numbers!";
        //             $errors = true;
        //         }

              
        //       if (!$errors) { 
        //     switch ($operation) {
        //         case "add":
        //             $value = $number1 + $number2;
        //             break;
        //         case "subtract":
        //             $value = $number1 - $number2;
        //             break;
        //         case "multiply":
        //             $value = $number1 * $number2;
        //             break;
        //         case "divide":
        //             if ($number2 != 0) {
        //                 $value = $number1 / $number2;
        //             } else {
        //                 echo "Cannot divide by zero!";
        //                 exit;
        //             }
        //             break;
        //         default:
        //             echo "Invalid operation!";
        //             exit;
        //     }
        // }
        //     echo "Result: " . $value;
        // }
        

        ?>


<!--

Creating user on SQL.

INSERT INTO users(username, pwd, email) VALUES ('devhabeeb', 'habeeb123!', 'habeeb@gmail.com');

INSERT INTO users(username, pwd, email) VALUES ('devhabeeb', 'habeeb123!', 'habeeb@gmail.com');



//Creating comment on SQL
INSERT INTO comments(users_id, comment_text) VALUES (1, 'This is a comment from devhabeeb');

// SELECTING data in SQL
SELECT username, email FROM users WHERE id = 1;
SELECT username, comment_text FROM comments WHERE users_id = 1;
SELECT * FROM users LEFT JOIN comments ON users.id = comments.users_id;
SELECT * FROM users INNER JOIN comments ON users.id = comments.users_id;
SELECT * FROM users RIGHT JOIN comments ON users.id = comments.users_id;

// Diff between LEFT JOIN, RIGHT JOIN, INNER JOIN
// LEFT JOIN: Returns all records from the left table (users) and the matched records from the right table (comments). If there is no match, the result is NULL on the right side.
// RIGHT JOIN: Returns all records from the right table (comments) and the matched records from the left table (users). If there is no match, the result is NULL on the left side.
// INNER JOIN: Returns only the records that have matching values in both tables (users and comments). If there is no match, the record is not included in the result.


Some data on SQL
INSERT INTO users(username, pwd, email) VALUES ('devhabeeb', 'habeeb123!', 'habeeb@gmail.com'); -->

<h3>
    <?php 
    output_username();
    ?>
</h3>

<main class="auth-container change">
    <h3>Sign up</h3>
    <p class="auth-intro">Create your account and start using the site.</p>
    <form class="auth-form" action="includes/signup.inc.php" method="post">
         <?php 
            signup_inputs();
        ?>
        <button> Sign up</button>
    </form>
    <div class="error">
        <?php
check_signup_errors();
?>
    </div>
    
</main>

<main class="auth-container change">
    <h3>Login</h3>
    <p class="auth-intro">Create your account and start using the site.</p>
    <form class="auth-form" action="includes/login.inc.php" method="post">
        <input type="text" name="username" placeholder="Username" >
        <input type="password" name="pwd" placeholder="Password" >
        <button>Login</button>
    </form>

    <?php 
    check_login_errors();
    ?>
</main>

<main class="auth-container change">
    <h3>Log Out</h3>
    <form class="auth-form" action="includes/logout.inc.php" method="post">
     
        <button>Log Out</button>
    </form>

</main>




<!-- <main class="auth-container change">
    <h3>Change Account</h3>
    <p class="auth-intro">Create your account and start using the site.</p>
    <form class="auth-form" action="includes/userupdate.inc.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="pwd" placeholder="Password" required>
        <input type="email" name="email" placeholder="Email" required>
        <button> Update</button>
    </form>
</main> -->

<!-- <main class="auth-container delete">
    <h3>Delete Account</h3>
    <p class="auth-intro">Create your account and start using the site.</p>
    <form class="auth-form" action="includes/userdelete.inc.php" method="post">
        <input type="text" name="username" placeholder="Username" required>
        <input type="password" name="pwd" placeholder="Password" required>
        <button>Delete</button>
    </form>
</main> -->


<!-- <form class="searchform" action="search.php" method="post">
    <label for="search">Search users:</label>
    <input type="text" id="search" name="usersearch" placeholder="Enter username...">
    <button>Search</button>
</form>  -->

<?php
// echo "Welcome, " . $_SESSION["username"] . "!"; 
?>
</body>
</html> 