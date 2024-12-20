<!-- 
1. Tema : Pendidikan
2. 
- link/url 1 : https://www.youtube.com/watch?v=lLBrgnYZjUE&t=43s
- link/url 2 : https://www.youtube.com/watch?v=hlwlM4a5rxg 
- link/url 3 : https://www.youtube.com/watch?v=4u-tfH_RuD4

Kelompok 10 : 
- Niqo Zuriyat Ramadhana (225150401111037) 
- Chaizar Zaky Alrum (225150407111004) 
- Hanifan Thoriqul Ibad (225150407111089) 
-->

<?php
error_reporting(0);
include "database.php";
session_start();

if(isset($_SESSION["username"])) {
  header("location: ../Home/homeLogin.php");
  exit();
}

if(isset($_POST["Login"])) {
  $username = $_POST['Username'];
  $password = $_POST['Password'];

  $username = mysqli_real_escape_string($db, $username);
  $password = mysqli_real_escape_string($db, $password);

  $sql = "SELECT * FROM users WHERE username='$username' AND 
  password = '$password'
  ";
  $result = $db->query($sql);

  if($result->num_rows > 0) {
      $data = $result->fetch_assoc();
      $_SESSION["username"] = $data["username"];

      header("location: ../Home/homeLogin.php");

  }else{
      $salah = "<p style='color:red; text align: center'> Username atau Password Salah<p>";
  }
}
$register_massage = "";

    if(isset($_POST["Signup"])) {
        $username = $_POST['Username1'];
        $email = $_POST['Email1'];
        $password = $_POST['Password1']; 
        
        $username = mysqli_real_escape_string($db, $username);
        $email = mysqli_real_escape_string($db, $email);
        $password = mysqli_real_escape_string($db, $password);

        try {
          $sql = "INSERT INTO users (username, email, password) VALUES
            ('$username', '$email', '$password')";
                if($db->query($sql)) {
                    echo "<script>alert('Daftar akun berhasil silahkan login');</script>";
                }
        } catch (mysqli_sql_exception) {
          $register_massage = "Username sudah digunakan, Gunakan Username lain!"  ;
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="stylesheet" href="homePage.css" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
      rel="stylesheet" />
    <!-- Feather Icons -->
    <script
      src="https://kit.fontawesome.com/a3736883c4.js"
      crossorigin="anonymous"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <title>Home Page</title>
  </head>
  <body>
    <!-- Navbar start -->
    <nav class="navbar">
      <a href="#" class="navbar-logo">Didikin<span>.com</span></a>
      <!-- Navbar-Extra Start-->
      <div class="navbar-extra">
        <a href="#" class="login-btn" id="button">Login</a>
        <a href="#" id="hamburger-menu"><i data-feather="menu"></i></a>
      </div>
      <!-- Navbar-Extra End-->
    </nav>
    <!-- Navbar End -->

    <!-- Hero Section Start -->
    <section class="hero" id="home">
      <main class="content">
        <div class="box">
          <h1>Kursus Ngoding Online Java | PHP | HTML | CSS</h1>
          <p>
            Jika kamu mencari tempat untuk meningkatkan skill dalam hal Ngoding,
            Pembuatan Web, Desain Web, Kamu berada ditempat yang tepat!
          </p>
          <a href="#" class="cta">
            <i class="fa fa-whatsapp" aria-hidden="true"></i
            ><span>Whatsapp</span></a
          >
        </div>
      </main>
    </section>
    S
    <!-- Hero Section End -->

    <!-- Popup Start -->
    <div class="popup" id="popup">
      <div class="blur-bg-overlay"></div>
      <div class="wrapper">
        <div class="signin-signup">
          <form action="" class="sign-in-form" method="post" id="signInForm">
            <h2 class="title">Sign In</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="Username" id="Username" />
              <span class="error" id="loginUsernameError">Username harus diisi.</span>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="Password" id="Password"/>
              <span class="error" id="loginPasswordError">Password harus diisi.</span>
            </div>
            <a href="../Home/homeLogin.Html"> </a>
            <input type="submit" value="Login" class="btn" name="Login" />
            <?php
                echo $salah;
                ?>
            <p class="social-text">Or Sign in with social platform</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook"></i>
              </a>
              <a href="" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            <p class="account-text1">
              Don't have an account? <a href="#" id="sign-up-btn2">Sign Up</a>
            </p>
          </form>

          <form action="" class="sign-up-form" method="POST" id="signUpForm">
            <h2 class="title">Sign Up</h2>
            <div class="input-field">
              <i class="fas fa-user"></i>
              <input type="text" placeholder="Username" name="Username1" id="username">
              <span class="error" id="usernameError">Username harus diisi dan minimal 3 karakter.</span>
            </div>
            <div class="input-field">
              <i class="fas fa-envelope"></i>
              <input type="text" placeholder="Email" name="Email1" id="email"/>
              <span class="error" id="emailError">Email harus diisi dan format email tidak valid.</span>
            </div>
            <div class="input-field">
              <i class="fas fa-lock"></i>
              <input type="password" placeholder="Password" name="Password1" id="password"/>
              <span class="error" id="passwordError">Password harus diisi dan minimal 6 karakter.</span>
            </div>
            <span class="rMes"><?= $register_massage?></span>
            <input type="submit" value="Sign Up" class="btn" name="Signup"/>

            <p class="social-text">Or Sign in with social platform</p>
            <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook"></i>
              </a>
              <a href="" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
            <p class="account-text1">
              Already have an account?
              <a href="#" id="sign-in-btn2">Sign In</a>
            </p>
          </form>
        </div>

        <div class="panels-wrapper">
          <div class="panel left-panel">
            <div class="content">
              <h3>Bergabung bersama kami!</h3>
              <p>
                Tempat Kursus & Belajar Programming yang berdedikasi untuk
                membantu Calon Programmer yang mempunyai kesulitan untuk belajar
                Programming
              </p>
              <button class="btn" id="sign-in-btn">Sign In</button>
            </div>
            <img src="img/undraw_bitcoin_re_urgq.svg" alt="" class="BG" />
          </div>
          <div class="panel right-panel">
            <span class="close-btn"><i class="fa-solid fa-xmark"></i> </span>
            <div class="content">
              <h3>Didikin.com</h3>
              <p>
                Tempat Kursus & Belajar Programming yang berdedikasi untuk
                membantu Calon Programmer yang mempunyai kesulitan untuk belajar
                Programming
              </p>
              <button class="btn" id="sign-up-btn">Sign Up</button>
            </div>
            <img src="img/bg2.png" alt="" class="BG" />
          </div>
        </div>
      </div>
      <script src="homePage.js"></script>
    </div>
    <!-- Popup End -->

    <!-- Section 1 Start -->
    <section class="Menu">
      <div class="sec1">
        <h2>PROGRAM KELAS</h2>
        <p>Kursus kelas yang ditawarkan</p>
      </div>
      <div class="img">
        <img src="img/java.png" alt="Java" class="img1" />
        <img src="img/php_logo.png" alt="php" class="img2" />
        <img src="img/html.png" alt="html" class="img1" />
        <img src="img/css.png" alt="css" class="img1" />
      </div>
      <h2 class="Untung">Keuntungan Belajar di Didikin!</h2>
      <div class="sec2">
        <div class="side1">
          <img src="img/dollar (1).png" alt="" class="image" />
          <p class="p1">Biaya kelas terjangkau</p>
        </div>
        <div class="side2">
          <img src="img/clock.png" alt="" class="image" />
          <p class="p2">Waktu belajar yang fleksibel</p>
        </div>
        <div class="side3">
          <img src="img/book.png" alt="" class="image" />
          <p class="p3">Materi pembelajaran lengkap</p>
        </div>
      </div>
      <div class="sec3">
        <div class="side4">
          <img src="img/google-docs.png" alt="" class="image" />
          <p class="p4">Dapat Sertifikat</p>
        </div>
        <div class="side5">
          <img src="img/hand-shake.png" alt="" class="image" />
          <p class="p5">Networking yang ahli dalam bidangnya</p>
        </div>
      </div>
    </section>
    <!-- Section 1 Stop -->

    <!-- Profil Start -->
    <div class="intro">
      <h2>Yuk Kenalan sama pengajarnya!</h2>
    </div>
    <!-- Profil End -->

    <!-- Profile 2 Start -->
    <div class="pengajar">
      <div class="foto">
        <img src="img/niqo1.jpg" alt="niqo" class="bgProfile" />
        <div class="profil">
          <h3>Niqo Zuriyat Ramadhana</h3>
          <p>Sistem Informasi 2022</p>
          <p>Universitas Brawijaya</p>
        </div>
      </div>
      <div class="foto">
        <img src="img/inad.jpg" alt="niqo" class="bgProfile" />
        <div class="profil">
          <h3>Haniifan Thoriqul Ibad</h3>
          <p>Sistem Informasi 2022</p>
          <p>Universitas Brawijaya</p>
        </div>
      </div>
      <div class="foto">
        <img src="img/zaki.jpg" alt="niqo" class="bgProfile" />
        <div class="profil">
          <h3>Chaizhar Zaky Alrum</h3>
          <p>Sistem Informasi 2022</p>
          <p>Universitas Brawijaya</p>
        </div>
      </div>
    </div>
    <!-- Profile 2 End -->

    <!-- FAQ Start -->
    <div class="FAQ">
      <h3>FAQ</h3>
      <h1>Pertanyaan?</h1>
      <p>
        Gak usah ragu, mungkin pertanyaan kamu bisa terjawab oleh admin kami !
      </p>
      <a href="#" class="wa">
        <i class="fa fa-whatsapp" aria-hidden="true"></i
        ><span>Hubungi Admin!</span>
      </a>
    </div>
    <!-- FAQ END -->

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

    <!-- Feather Icons -->
    <script>
      document.getElementById("button").addEventListener("click", function () {
        document.querySelector(".popup").style.display = "flex";
      });
      document
        .querySelector(".close-btn")
        .addEventListener("click", function () {
          document.getElementById("popup").style.display = "none";
        });
    </script>
    <script>
      feather.replace();
    </script>
    <script src="homePage.js"></script>
  </body>
</html>

