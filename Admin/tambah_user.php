<?php
include "../Profile/config.php";

// Lakukan proses penambahan jika metode permintaan adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Insert data pengguna baru ke database
    $query = "INSERT INTO users (username, password, email) VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username,$password,$email]);

    // Redirect kembali ke halaman kelola_akun.php setelah penambahan berhasil
    header("Location: kelola_akun.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Akun Baru</title>
</head>
<body>
    <h1>Tambah Akun Baru</h1>
    <form action="" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="text" id="password" name="password"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email"><br><br>
        <button type="submit">Tambah Akun</button>
    </form>
</body>
</html>

