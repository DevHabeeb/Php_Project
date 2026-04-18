<?php 

$pwdSignup  = 'habeeb123!';
$options = [
    'cost' => 12, // The cost parameter determines the computational cost of hashing. Higher values increase security but also increase processing time.
];

$hashedPwd = password_hash($pwdSignup, PASSWORD_BCRYPT, $options);

$pwdLogin = 'habeeb123!';

if (password_verify($pwdLogin, $hashedPwd)) {
    echo "Password is valid!";
} else {
    echo "Invalid password.";
}