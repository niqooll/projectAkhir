<?php
session_start();
include ("../Profile/config.php");

if (!isset($_SESSION['username'])) {
    header("Location: ../HomePage/home+login.php");
    exit();
}

$username = $_SESSION['username'];

// Ambil data pengguna dari database
$stmt = $pdo->prepare("SELECT id, username, role, foto FROM users WHERE username = ?");
$stmt->execute([$username]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($user['role'] != '1') {
    echo "Anda tidak memiliki akses untuk halaman ini.";
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus pengumuman dari database
    $stmt = $pdo->prepare("DELETE FROM announcements WHERE id = ?");
    $stmt->execute([$id]);

    header("Location: kelolaData.php");
    exit();
} else {
    echo "ID pengumuman tidak ditemukan.";
    exit();
}
?>
