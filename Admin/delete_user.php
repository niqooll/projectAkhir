<?php
include "../Profile/config.php";

// Ambil ID pengguna dari parameter URL
$id = $_GET['id'];

// Hapus akun pengguna dari database
$stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
$stmt->execute([$id]);

// Redirect kembali ke halaman kelola_akun.php setelah penghapusan berhasil
header("Location: kelola_akun.php");
exit;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hapus Akun</title>
</head>
<body>
    <h1>Hapus Akun</h1>
    <p>Apakah Anda yakin ingin menghapus akun ini?</p>
    <a href="kelola_akun.php">Batal</a>
    <a href="hapus_akun.php?id=<?php echo $user['id']; ?>">Hapus</a>
</body>
</html>

