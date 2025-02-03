<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $location_id = $_POST['location_id'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $delete = isset($_POST['delete']) ? $_POST['delete'] : null;

    if ($delete) {
        $stmt = $pdo->prepare("DELETE FROM schedules WHERE id = ?");
        $success = $stmt->execute([$id]);
        echo json_encode(['success' => $success, 'message' => $success ? 'Jadwal berhasil dihapus' : 'Gagal menghapus jadwal']);
    } else {
        if ($id) {
            $stmt = $pdo->prepare("UPDATE schedules SET location_id = ?, date = ?, time = ? WHERE id = ?");
            $success = $stmt->execute([$location_id, $date, $time, $id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO schedules (location_id, date, time) VALUES (?, ?, ?)");
            $success = $stmt->execute([$location_id, $date, $time]);
        }
        echo json_encode(['success' => $success, 'message' => $success ? 'Jadwal berhasil disimpan' : 'Gagal menyimpan jadwal']);
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM schedules WHERE id = ?");
    $stmt->execute([$id]);
    $schedule = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($schedule);
}
?>
