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
session_start();

if(isset($_POST['Login'])){
    $username = $_POST['Username'];
    $password = $_POST['Password'];
    if($username == 'admin' && $password == '12345'){
        session_start();
        $_SESSION['berhasil'] = true;
        header("Location: ../Home/homeLogin.php");
    }else{
        $salah = "<p style='color:red; text align: center'> Username atau Password Salah<p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="loginFix.css" />
    <script
      src="https://kit.fontawesome.com/a3736883c4.js"
      crossorigin="anonymous"></script>
  </head>

  <body>
    <div class="wrapper">
      <div class="signin-signup">
        <form action="" class="sign-in-form" method="post">
          <h2 class="title">Sign In</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="Password" />
          </div>
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

        <form action="" class="sign-up-form">
          <h2 class="title">Sign Up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="text" placeholder="Email" />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" />
          </div>

          <input type="submit" value="Sign Up" class="btn" />
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
            Already have an account? <a href="#" id="sign-in-btn2">Sign In</a>
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
          <img src="img/undraw_bitcoin_re_urgq.svg" alt="" class="image" />
        </div>
        <div class="panel right-panel">
          <div class="content">
            <h3>Didikin.com</h3>
            <p>
              Tempat Kursus & Belajar Programming yang berdedikasi untuk
              membantu Calon Programmer yang mempunyai kesulitan untuk belajar
              Programming
            </p>
            <button class="btn" id="sign-up-btn">Sign Up</button>
          </div>
          <img src="img/bg2.png" alt="" class="image" />
        </div>
      </div>
    </div>
    <script src="jsLogin.js"></script>
  </body>
</html>
