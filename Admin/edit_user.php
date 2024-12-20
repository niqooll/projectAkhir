<?php
include "../Profile/config.php";

// Ambil ID pengguna dari parameter URL
$id = $_GET['id'];

// Ambil data pengguna dari database berdasarkan ID
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Lakukan proses update jika metode permintaan adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    

    // Perbarui data pengguna di database
    $query = "UPDATE users SET username = ?, password = ?, email = ? WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$username,$password, $email, $id]);

    // Redirect kembali ke halaman kelola_akun.php setelah update berhasil
    header("Location: kelola_akun.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Akun</title>
</head>
<body>
    <h1>Edit Akun</h1>
    <form action="" method="POST">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars ($user['username']); ?>"><br>
        <label for="password">Password:</label><br>
        <input type="text" id="password" name="password" value="<?php echo htmlspecialchars ($user['password']); ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars ($user['email']); ?>"><br><br>
        <button type="submit">Simpan Perubahan</button>
    </form>
</body>
</html>

