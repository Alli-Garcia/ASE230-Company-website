<?php
session_start();

include_once 'db.php';

function registerUser($username, $password) {
    global $conn;

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $conn->prepare("INSERT INTO user (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username);

    return $stmt->execute();
}

function authenticateUser($username, $password) {
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM user WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    
    // Bind all columns returned by the SELECT query
    $stmt->bind_result($user_id, $username, $email);

    // Fetch the result
    $stmt->fetch();

    /*if ($hashed_password && password_verify($password, $hashed_password)) {
        $_SESSION['user_id'] = $user_id;
        $_SESSION['username'] = $username;
        return true;
    }

    return false;
}*/



function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

function getUserId() {
    return $_SESSION['user_id'] ?? null;
}

function logout() {
    session_unset();
    session_destroy();
}
?>
