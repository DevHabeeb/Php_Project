<?php 
declare(strict_types=1);

function signup_inputs() {
    

        if (isset($_SESSION["signup_data"]["username"]) && !isset($_SESSION["errors_signup"]["username_taken"])) {
            echo '<input type="text" name="username" placeholder="Username" value="' . $_SESSION["signup_data"]["username"] . '" >'; 
            

        } else {
            echo '<input type="text" name="username" placeholder="Username" >';
        }

        echo '<input type="password" name="pwd" placeholder="Password" >';

        if ( isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_used"]) && !isset($_SESSION["errors_signup"]["invalid_email"]) ) {
            echo '<input type="text" name="email" placeholder="Email" value="' . $_SESSION["signup_data"]["email"] . '" >'; 
            

        } else {
            echo '<input  name="email" placeholder="Email" >';
        }

}


function check_signup_errors() {
    if (isset($_SESSION["errors_signup"])) {
        foreach ($_SESSION["errors_signup"] as $error) {
            echo "<p class='error'>" . htmlspecialchars($error) . "</p>";
        } // Display errors and sanitize output to prevent XSS
        unset($_SESSION["errors_signup"]); // Clear errors after displaying
    } elseif (isset($_GET["signup"]) && $_GET["signup"] === "success") {
        unset($_SESSION["signup_data"]);
        echo "<p class='success' id='signupSuccess'>Signup successful!</p>";
        echo "<script>setTimeout(function(){ var msg = document.getElementById('signupSuccess'); if(msg){ msg.style.display='none'; } }, 3000);</script>";
    }
} 