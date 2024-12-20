<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include("config.php");

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    echo 'Anda harus login untuk mengedit profil Anda';
    exit;
}

$usernameSession = $_SESSION['username'];

// Ambil data pengguna dari database
$stmt = $pdo->prepare("SELECT username, email, foto FROM users WHERE username = ?");
$stmt->execute([$usernameSession]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo 'Pengguna tidak ditemukan';
    exit;
}

// Set path for profile picture
$profilePicturePath = './uploads/' . $user['foto'];

// Cek jika metode permintaan adalah POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $fotoProfil = $user['foto']; // Set default to current photo

    // Cek apakah username baru sudah ada di database
    if ($username !== $usernameSession) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $count = $stmt->fetchColumn();

        if ($count > 0) {
            echo 'Username sudah ada, silakan pilih username lain.';
            exit;
        }
    }

    // Cek apakah ada file yang diunggah dan tidak ada kesalahan
    if (isset($_FILES['profile-picture']) && $_FILES['profile-picture']['error'] === UPLOAD_ERR_OK) {
        $uploadFileDir = './uploads/';
        if (!is_dir($uploadFileDir)) {
            mkdir($uploadFileDir, 0777, true);
        }
        $fileTmpPath = $_FILES['profile-picture']['tmp_name'];
        $fileName = $_FILES['profile-picture']['name'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));
        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;
        $dest_path = $uploadFileDir . $newFileName;

        // Pindahkan file yang diunggah ke direktori tujuan
        if (move_uploaded_file($fileTmpPath, $dest_path)) {
            $fotoProfil = $newFileName;
        } else {
            echo 'Error saat memindahkan file yang diunggah';
            exit;
        }
    }

    // Perbarui data pengguna di database
    $query = "UPDATE users SET username = ?, email = ?, foto = ? WHERE username = ?";
    $params = [$username, $email, $fotoProfil, $usernameSession];
    $stmt = $pdo->prepare($query);
    if ($stmt->execute($params)) {
        $_SESSION['username'] = $username; // Perbarui sesi username jika username diubah
        header('Location: edit_profile.php?status=success');
        exit;
    } else {
        echo 'Error saat memperbarui profil';
    }
}

include('profile.php');
?>
