<?php
session_start(); // Mulai session

// Hapus semua data session
session_unset();
session_destroy();

// Redirect ke halaman login setelah logout
header('Location: ../HomePage/home+login.php');
exit;
?>