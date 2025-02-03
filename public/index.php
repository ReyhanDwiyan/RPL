<?php
include '../includes/auth.php';

if (!is_logged_in()) {
    header('Location: login.php');
    exit;
}

include '../includes/db.php';

// Fetch locations
$stmt = $pdo->query("SELECT * FROM locations");
$locations = $stmt->fetchAll();

// Fetch schedules
$stmt = $pdo->query("SELECT * FROM schedules");
$schedules = $stmt->fetchAll();

// Fetch reports
$stmt = $pdo->query("SELECT * FROM reports");
$reports = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="../js/scripts.js"></script>
</head>
<body>
    <nav>
        <h1>Pengelolaan Sampah</h1>
        <button onclick="logout()">Logout</button>
    </nav>
    <div class="container">
        <div class="left">
            <h2>Lokasi</h2>
            <form id="locationForm">
                <input type="hidden" id="locationId" name="id">
                <input type="text" id="locationName" name="name" placeholder="Nama Lokasi" required>
                <textarea id="locationAddress" name="address" placeholder="Alamat" required></textarea>
                <button type="submit">Simpan</button>
            </form>
            <ul id="locationList">
                <?php foreach ($locations as $location): ?>
                    <li>
                        <span><?php echo htmlspecialchars($location['name']); ?></span>
                        <button onclick="editLocation(<?php echo $location['id']; ?>)">Edit</button>
                        <button onclick="deleteLocation(<?php echo $location['id']; ?>)">Hapus</button>
                    </li>
                <?php endforeach; ?>
            </ul>

            <h2>Jadwal</h2>
            <form id="scheduleForm">
                <input type="hidden" id="scheduleId" name="id">
                <select id="scheduleLocation" name="location_id" required>
                    <option value="">Pilih Lokasi</option>
                    <?php foreach ($locations as $location): ?>
                        <option value="<?php echo $location['id']; ?>"><?php echo htmlspecialchars($location['name']); ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="date" id="scheduleDate" name="date" required>
                <input type="time" id="scheduleTime" name="time" required>
                <button type="submit">Simpan</button>
            </form>
            <ul id="scheduleList">
                <?php foreach ($schedules as $schedule): ?>
                    <li>
                        <span><?php echo htmlspecialchars($schedule['date']); ?> - <?php echo htmlspecialchars($schedule['time']); ?></span>
                        <button onclick="editSchedule(<?php echo $schedule['id']; ?>)">Edit</button>
                        <button onclick="deleteSchedule(<?php echo $schedule['id']; ?>)">Hapus</button>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="right">
            <h2>Laporan</h2>
            <form id="reportForm">
                <input type="hidden" id="reportId" name="id">
                <select id="reportLocation" name="location_id" required>
                    <option value="">Pilih Lokasi</option>
                    <?php foreach ($locations as $location): ?>
                        <option value="<?php echo $location['id']; ?>"><?php echo htmlspecialchars($location['name']); ?></option>
                    <?php endforeach; ?>
                </select>
                <input type="date" id="reportDate" name="date" required>
                <textarea id="reportDescription" name="description" placeholder="Deskripsi" required></textarea>
                <button type="submit">Simpan</button>
            </form>
            <ul id="reportList">
                <?php foreach ($reports as $report): ?>
                    <li>
                        <span><?php echo htmlspecialchars($report['date']); ?> - <?php echo htmlspecialchars($report['description']); ?></span>
                        <button onclick="deleteReport(<?php echo $report['id']; ?>)">Hapus</button>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>
