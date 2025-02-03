<?php
session_start();

function register($pdo, $username, $password, $email) {
    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
    $stmt = $pdo->prepare("INSERT INTO users (username, password, email) VALUES (?, ?, ?)");
    return $stmt->execute([$username, $hashed_password, $email]);
}

function login($pdo, $username, $password) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        return true;
    }
    return false;
}

function is_logged_in() {
    return isset($_SESSION['user_id']);
}

function logout() {
    session_destroy();
}
?>
