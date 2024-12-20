<?php
session_start();
if(!isset($_SESSION['username'])){
    header("Location: ../HomePage/home+login.php");
    exit();
}

$username = $_SESSION['username'];

// Koneksi ke database
$hostname = "localhost";
$db_username = "root"; // Ganti dengan username database Anda
$db_password = ""; // Ganti dengan password database Anda
$database_name = "users";

$conn = mysqli_connect($hostname, $db_username, $db_password, $database_name);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Ambil data dari form
$current_password = $_POST['current-password'];
$new_password = $_POST['new-password'];
$confirm_password = $_POST['confirm-password'];

// Query untuk mengambil password yang tersimpan di database
$sql = "SELECT password FROM users WHERE username = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();

$message = "";

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $stored_password = $row["password"];

    // Verifikasi apakah password saat ini sesuai dengan yang tersimpan di database
    if ($current_password === $stored_password) {
        // Verifikasi apakah password baru dan konfirmasi password sama
        if ($new_password === $confirm_password) {
            // Update password di database tanpa hashing
            $update_sql = "UPDATE users SET password=? WHERE username=?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("ss", $new_password, $username);
            if ($update_stmt->execute() === TRUE) {
                $message = "Password successfully updated.";
            } else {
                $message = "Error updating password: " . $conn->error;
            }
        } else {
            $message = "New password and confirm password do not match.";
        }
    } else {
        $message = "Current password is incorrect.";
    }
} else {
    $message = "No user found with that username.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Password Update</title>
    <script>
        function showAlert(message) {
            alert(message);
            window.location.href = 'profile.php'; // Ganti dengan halaman yang sesuai setelah menutup popup
        }
    </script>
</head>
<body>
    <?php
    if (!empty($message)) {
        echo "<script>showAlert('$message');</script>";
    }
    ?>
</body>
</html>
