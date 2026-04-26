<?php 
declare(strict_types=1);

function get_username(object $pdo, string $username) {
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email) {
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email, PDO::PARAM_STR);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(object $pdo, string $email , string $username, string $pwd) {
    $query = "INSERT INTO users (email, username, pwd) VALUES (:email, :username, :pwd);";
    $options = [
    'cost' => 12, // The cost parameter determines the computational cost of hashing. Higher values increase security but also increase processing time.
];

$hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':pwd', $hashedPwd);
    $stmt->execute();
}