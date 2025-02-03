<?php
include '../includes/auth.php';

if (is_logged_in()) {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include '../includes/db.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];

    if (register($pdo, $username, $password, $email)) {
        header('Location: login.php');
        exit;
    } else {
        $error = 'Registration failed';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Register</h2>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a></p>
</body>
</html>
