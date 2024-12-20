<?php
session_start();
include ("../Profile/config.php");

// Cek apakah pengguna sudah login
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

// Fungsi untuk menambah pengumuman/berita
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];
    $type = $_POST['type']; // pengumuman atau berita

    $stmt = $pdo->prepare("INSERT INTO announcements (title, content, type) VALUES (?, ?, ?)");
    $stmt->execute([$title, $content, $type]);

    echo "Data berhasil disimpan!";
}

// Fungsi untuk mengambil semua pengumuman
$stmt = $pdo->prepare("SELECT * FROM announcements ORDER BY created_at DESC");
$stmt->execute();
$announcements = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kelolaData.css">
    <title>Kelola Data</title>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-logo">Didikin<span>.com</span></a>
        <div class="navbar-nav">
            <a href="../Home/homeLogin.php">Home</a>
        </div>
        <div class="navbar-extra">
            <div class="testing">
                <a href="../Profile/profile.php" class="Profile">Halo, <?= $username;?></a>
                <div class="dropdown1">
                    <li><a href="../Profile/profile.php">Profile</a></li>
                    <li><a href="#" id="button">Logout</a></li>
                </div>
            </div>
            <span>
                <img class="fotoProfile1" id="profile-picture-preview" src="<?php echo '../Profile/uploads/' . ($user['foto'] ? $user['foto'] : 'default-profile.png'); ?>" alt="Foto Profil">
            </span>
        </div>
    </nav>

    <h1>Kelola Data</h1>
    <form method="POST" action="kelolaData.php">
        <label for="type">Tipe:</label>
        <select id="type" name="type">
            <option value="pengumuman">Pengumuman</option>
            <option value="berita">Berita</option>
        </select><br><br>
        
        <label for="title">Judul:</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="content">Konten:</label>
        <textarea id="content" name="content" rows="4" cols="50" required></textarea><br><br>

        <button type="submit">Submit</button>
    </form>
    <h1>Kelola Data Pengumuman/Berita</h1>

    <div class="announcement-container">
        <table class="announcement-table">
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Konten</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($announcements as $announcement): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($announcement['title']); ?></td>
                        <td><?php echo nl2br(htmlspecialchars($announcement['content'])); ?></td>
                        <td><?php echo htmlspecialchars($announcement['created_at']); ?></td>
                        <td>
                            <a href="editPengumuman.php?id=<?php echo $announcement['id']; ?>" class="edit-btn">Edit</a>
                            <a href="hapusPengumuman.php?id=<?php echo $announcement['id']; ?>" class="delete-btn" onclick="return confirm('Anda yakin ingin menghapus pengumuman ini?');">Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <h1>Dashboard Pengumuman/Berita</h1>

    <!-- Tampilkan Pengumuman -->
    <div class="announcement-container">
        <div class="announcement-list">
            <?php foreach ($announcements as $announcement): ?>
                <div class="announcement-item">
                    <h3><?php echo htmlspecialchars($announcement['title']); ?></h3>
                    <p><?php echo nl2br(htmlspecialchars($announcement['content'])); ?></p>
                    <small><?php echo htmlspecialchars($announcement['created_at']); ?></small>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Tambahkan skrip JavaScript untuk konfirmasi logout -->
    <div class="popup">
      <div class="popup-content">
        <h3>Log Out Akun</h3>
        <p>Anda yakin ingin keluar dari akun Anda ?</p>
        <a href="homeLogin.php" class="button">Tidak</a>
        <a href="../Logout/logout.php" class="button">Yakin</a>
      </div>
    </div>
    <script>
        document.getElementById("button").addEventListener("click", function () {
            document.querySelector(".popup").style.display = "flex";
        });
    </script>
    <script src="kelolaData.js"></script>
</body>
</html>
