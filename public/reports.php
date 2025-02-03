<?php
include 'db.php';

session_start();
$user_id = $_SESSION['user_id'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $action = $_POST['action'];
    $report_id = isset($_POST['report_id']) ? $_POST['report_id'] : null;
    $location_id = $_POST['location_id'];
    $date = $_POST['date'];
    $description = $_POST['description'];

    switch ($action) {
        case 'add':
            $stmt = $conn->prepare("INSERT INTO reports (location_id, date, description) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $location_id, $date, $description);
            break;
        case 'delete':
            $stmt = $conn->prepare("DELETE FROM reports WHERE id = ?");
            $stmt->bind_param("i", $report_id);
            break;
    }

    if ($stmt->execute()) {
        echo "Action successful!";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
