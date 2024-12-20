<?php
if (session_status() === PHP_SESSION_NONE) {
  session_start();
}
include('config.php');
if(!isset($_SESSION['username'])){
    header("Location: ../HomePage/home+login.php");
    exit();
}
$username = $_SESSION['username'];
$usernameSession = $_SESSION['username'];

// Ambil data pengguna dari database
$stmt = $pdo->prepare("SELECT id, username,role, email, foto FROM users WHERE username = ?");
$stmt->execute([$usernameSession]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    echo 'Pengguna tidak ditemukan';
    exit;
}

$role = $user['role'];
if ($role == '1') {
  $show_manage_users = true; // Set variabel untuk menampilkan menu "Kelola Akun Pengguna"
} else {
  $show_manage_users = false; // Set variabel untuk menyembunyikan menu "Kelola Akun Pengguna"
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="tes.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />
    <!-- Feather Icons -->
    <script
      src="https://kit.fontawesome.com/a3736883c4.js"
      crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Profile</title>
  </head>
  <body>
    <nav class="navbar">
        <a href="../Home/homeLogin.php" class="navbar-logo">Didikin<span>.com</span></a>
        <div class="navbar-nav">
          <a href="../Home/homeLogin.php">Home</a>
          <a href="../ProgramKelas/programKelas.php">Pesanan Saya</a>
        </div>

        <!-- Navbar-Extra Start-->
        <div class="navbar-extra">
        <a href="#" id="button">Logout</a>
        <a href="../Profile/profile.php" class="Profile"> Halo, <?= $username;?>
        </a>
        <span>
          <img class = "img1" id="profile-picture-preview" src="<?php echo './uploads/' . ($user['foto'] ? $user['foto'] : 'default-profile.png'); ?>" alt="Foto Profil">
        </span>
        
        </div>
        <!-- Navbar-Extra End-->
        
      </nav>
    <!-- Navbar End -->
      <div class="menu">
        
      </div>
    
    <!-- hero section -->

    <div class="container">
        <main>
            <section class="account-management">
                <div class="content">
                    <aside>
                    <h1>Manajemen Akun</h1>
                        <ul>
                          <a href="#bag1">
                            <li class="active">DIDIKIN ID</li>
                          </a>
                          <a href="#bag2">
                            <li>INFORMASI AKUN</li>
                          </a>
                          <a href="#bag3">
                            <li>EDIT AKUN</li>
                          </a>
                          <?php if ($show_manage_users): ?>
                            <a href="#bag4">
                            <li>KELOLA AKUN USER</li>
                            </a>
                            
                          <?php endif; ?>
                            
                        </ul>
                    </aside>
                    <div class="details">
                        <div class="didikin-title">
                            <h2>Didikin ID</h2>
                            <p>ID akun ini dapat digunakan oleh pengguna lain untuk menemukan anda</p>
                        </div>
                        <div class="didikin-detail" id="bag1">
                            <div class="input-group">
                                <label for="game-name">Didikin Name</label>
                                <input type="text" id="game-name" value="<?= htmlspecialchars ($user['username']);?>" readonly>
                            </div>
                            <div class="input-group">
                                <label for="tagline">ID Tagline</label>
                                <input type="text" id="tagline" value="<?= ($user['id']);?>" readonly>
                            </div>
                        </div>  
                    </div>
                    <div class="details1" >
                        <div class="didikin-title1">
                            <h2>Informasi Akun</h2>
                            <p>Kami menyarankan agar Anda secara berkala memperbarui kata sandi Anda untuk membantu mencegah akses tidak sah ke akun Anda.</p>
                        </div>
                        <div class="container1" id="bag2">
                        <h2>Ganti Password</h2>
                        <form action="change_password.php" method="post">
                          <div class="form-group">
                            <label for="current-password">Password Lama</label>
                            <input type="password" id="current-password" name="current-password" required>
                          </div>
                          <div class="form-group">
                            <label for="new-password">Password Baru</label>
                            <input type="password" id="new-password" name="new-password" required>
                          </div>
                          <div class="form-group">
                            <label for="confirm-password">Konfirmasi Password Baru</label>
                            <input type="password" id="confirm-password" name="confirm-password" required>
                          </div>
                          <button type="submit" name="submit">Ganti Password</button>
                        </form>
                        </div>
                    </div>
                    <div class="details2">
                        <div class="didikin-title2" id="bag3">
                            <h2>Edit Akun Didikin</h2>
                            <p>Informasi ini bersifat pribadi dan tidak akan dibagikan dengan user lain. Baca Pemberitahuan Privasi Didikin kapan saja</p>
                        </div>
                        <div class="container2">
                            <h2>Edit Profil</h2>
                            <?php if (isset($_GET['status']) && $_GET['status'] === 'success'): ?>
                              <p style="color: green;">Profil berhasil diperbarui</p>
                            <?php endif; ?>
                            <form action="edit_profile.php" method="post" enctype="multipart/form-data">
                              <div class="profile-picture-container">
                                <img id="profile-picture-preview" src="<?php echo './uploads/' . ($user['foto'] ? $user['foto'] : 'default-profile.png'); ?>" alt="Foto Profil">
                              </div>
                              <div class="form-group">
                                <label for="profile-picture">Ubah Foto Profil</label>
                                <input type="file" id="profile-picture" name="profile-picture" accept="image/*" onchange="previewProfilePicture(event)">
                              </div>
                              <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" id="username" name="username" value="<?= htmlspecialchars ($user['username']); ?>" required>
                              </div>
                              <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
                              </div>
                              <button type="submit" name="submit">Simpan Perubahan</button>
                              </form>
                        </div>

                          <script>
                            function previewProfilePicture(event) {
                              var reader = new FileReader();
                              reader.onload = function() {
                                var output = document.getElementById('profile-picture-preview');
                                output.src = reader.result;
                              }
                              reader.readAsDataURL(event.target.files[0]);
                            }
                          </script>
                    </div>
                    <?php if ($show_manage_users): ?>
                      <div class="details3">
                        <div class="didikin-title3">
                            <h2>Selamat Datang Admin!!</h2>
                            <p>Pilih menu kelola yang admin inginkan</p>
                        </div>
                        <div class="didikin-detail3" id="bag4">
                            <div class="input-group3">
                              <a href="../Admin/kelola_akun.php">Kelola Akun User</a>
                            </div>
                            <div class="input-group3">
                              <a href="../admin/kelolaData.php">Kelola Data</a>
                            </div>
                        </div>  
                    </div>
                    <?php endif; ?>
                </div>
            </section>
        </main>
    </div>
    <script src="popupLogout.js"></script>


    <!-- Popup start -->
    <div class="popup">
      <div class="popup-content">
        <h3>Log Out Akun</h3>
        <p>Anda yakin ingin keluar dari akun Anda ?</p>
        <a href="profile.php" class="button">Tidak</a>
        <a href="../Logout/logout.php" class="button">Yakin</a>
      </div>
    </div>
    <script>
      document.getElementById("button").addEventListener("click", function () {
        document.querySelector(".popup").style.display = "flex";
      });
    </script>
    <!-- Footer -->
    <section class="closeEnd">
      <div class="footer1">
        <h2>Didikin</h2>
        <p>
          Tempat Kursus & Belajar Programming yang berdedikasi untuk membantu
          Calon Programmer yang mempunyai kesulitan untuk belajar Programming
        </p>
        <a href="#" class="WA"><i class="fa-brands fa-whatsapp"></i></a>
        <a href="#" class="IG"><i class="fa-brands fa-instagram"></i></a>
      </div>
      <div class="footer2">
        <p class="copy">Copyright © 2024 - Didikin</p>
      </div>
    </section>
    <!-- Footer End -->
  </body>
</html>
