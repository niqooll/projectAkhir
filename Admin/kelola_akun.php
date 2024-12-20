<?php
// Koneksi ke database
include "../Profile/config.php";

// Mulai sesi jika belum dimulai
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: ../HomePage/home+login.php");
    exit();
}

// Query untuk mengambil data pengguna
$stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
$stmt->execute([$_SESSION['username']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Periksa apakah pengguna adalah admin
if ($user['role'] != '1') {
    echo "Anda tidak memiliki akses untuk halaman ini.";
    exit();
}

// Query untuk mengambil data pengguna
$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Akun</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
            color: #333;
        }
        a:hover {
            text-decoration: underline;
        }
        
    </style>
</head>
<body>
    <h1>Kelola Akun</h1>
    <a href="tambah_user.php">Tambah Akun Baru</a>
    <table>
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Aksi</th>
        </tr>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo $user['username']; ?></td>
                <td><?php echo $user['email']; ?></td>
                <td>
                    <a href="edit_user.php?id=<?php echo $user['id']; ?>">Ubah</a> |
                    <a href="delete_user.php?id=<?php echo $user['id']; ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Hapus</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
    <br>
    
    <a href="../Profile/profile.php">Kembali Ke Profil</a>
</body>
</html>
