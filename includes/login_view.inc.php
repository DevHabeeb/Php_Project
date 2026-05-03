<?php 

declare(strict_types=1);

function output_username() {
    if (isset($_SESSION["user_id"])) {
        echo '<p class="welcome-message">Welcome, ' . htmlspecialchars($_SESSION["user_username"]) . '!</p>';
    } else {
        echo '<p class="welcome-message">You are not logged in.</p>';
    }
}

function check_login_errors() {
        if (isset($_SESSION["errors_login"])) {
            $errors = $_SESSION["errors_login"];

            echo "<br>";

            foreach ($errors as $error) {
                echo "<p class='error'>" . htmlspecialchars($error) . "</p>";
            } // Display errors and sanitize output to prevent XSS

            unset($_SESSION["errors_login"]); // Clear errors after displaying
        } 
        elseif (isset($_GET["login"]) && $_GET["login"] === "success") {
            echo "<br>";
            echo "<p class='success' id='loginSuccess'>Login successful!</p>";
                    echo "<script>setTimeout(function(){ var msg = document.getElementById('signupSuccess'); if(msg){ msg.style.display='none'; } }, 3000);</script>";
        }
}