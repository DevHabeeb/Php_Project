<?php 
declare(strict_types=1);

function is_username_wrong(bool|array $result) {
    if (!$result) {
        return true; // Username does not exist in the database
    } else {
        return false; // Username exists in the database
    }
}


function is_password_wrong(string $pwd, string $hashedPwd) {
    if (!password_verify($pwd, $hashedPwd)) {
        return true; // Password does not match the hashed password
    } else {
        return false; // Password matches the hashed password
    }
}

function is_input_empty(string $username, string $pwd) {
    if (empty($username) || empty($pwd)) {
        return true; // One or both fields are empty
    } else {
        return false; // Both fields are filled
    }
}
   

 