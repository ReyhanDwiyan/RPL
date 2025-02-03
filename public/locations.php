<?php
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $name = $_POST['name'];
    $address = $_POST['address'];
    $delete = isset($_POST['delete']) ? $_POST['delete'] : null;

    if ($delete) {
        $stmt = $pdo->prepare("DELETE FROM locations WHERE id = ?");
        $success = $stmt->execute([$id]);
        echo json_encode(['success' => $success, 'message' => $success ? 'Lokasi berhasil dihapus' : 'Gagal menghapus lokasi']);
    } else {
        if ($id) {
            $stmt = $pdo->prepare("UPDATE locations SET name = ?, address = ? WHERE id = ?");
            $success = $stmt->execute([$name, $address, $id]);
        } else {
            $stmt = $pdo->prepare("INSERT INTO locations (name, address) VALUES (?, ?)");
            $success = $stmt->execute([$name, $address]);
        }
        echo json_encode(['success' => $success, 'message' => $success ? 'Lokasi berhasil disimpan' : 'Gagal menyimpan lokasi']);
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM locations WHERE id = ?");
    $stmt->execute([$id]);
    $location = $stmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($location);
}
?>
