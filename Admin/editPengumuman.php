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

    // Ambil data pengumuman dari database
    $stmt = $pdo->prepare("SELECT * FROM announcements WHERE id = ?");
    $stmt->execute([$id]);
    $announcement = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$announcement) {
        echo "Pengumuman tidak ditemukan.";
        exit();
    }
} else {
    echo "ID pengumuman tidak ditemukan.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['title'];
    $content = $_POST['content'];

    // Update pengumuman di database
    $stmt = $pdo->prepare("UPDATE announcements SET title = ?, content = ? WHERE id = ?");
    $stmt->execute([$title, $content, $id]);

    header("Location: kelolaData.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="kelolaData.css">
    <title>Edit Pengumuman</title>
</head>
<body>
    <nav class="navbar">
        <a href="#" class="navbar-logo">Didikin<span>.com</span></a>
        <div class="navbar-nav">
            <a href="../Home/homeLogin.php">Home</a>
            <a href="../ProgramKelas/programKelas.php">Program Kelas</a>
            <a href="../Shop/shop.php">Shop</a>
        </div>
        <div class="navbar-extra">
            <div class="testing">
                <a href="../Profile/profile.php" class="Profile">Halo, <?= $_SESSION['username'];?></a>
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

    <h1>Edit Pengumuman</h1>

    <div class="announcement-container">
        <form action="editPengumuman.php?id=<?php echo $announcement['id']; ?>" method="post">
            <div class="form-group">
                <label for="title">Judul</label>
                <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($announcement['title']); ?>" required>
            </div>
            <div class="form-group">
                <label for="content">Konten</label>
                <textarea id="content" name="content" rows="4" required><?php echo htmlspecialchars($announcement['content']); ?></textarea>
            </div>
            <button type="submit" class="edit-btn">Update</button>
        </form>
    </div>
</body>
</html>
