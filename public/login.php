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

    if (login($pdo, $username, $password)) {
        header('Location: index.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error)) echo "<p style='color: red;'>$error</p>"; ?>
    <form method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="register.php">Register here</a></p>
</body>
</html>
