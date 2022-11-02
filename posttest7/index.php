<?php
session_start();
require "admin/terang/koneksi.php";

if(isset($_SESSION['login'])){
   header("Location: admin/terang/index.php");
   exit;
}

if(isset($_POST['register'])){
   $username = $_POST['username'];
   $password = $_POST['password'];
   $cpassword = $_POST['cpassword'];
   $email = $_POST['email'];

   if($password===$cpassword){
      $password = password_hash($password, PASSWORD_DEFAULT);
      $result = mysqli_query($conn, "SELECT username from user WHERE username = '$username'");
      if(mysqli_fetch_assoc($result)){
         echo "<script>
                  alert('Username Telah Digunakan. Coba Username Lain');
                  document.location.href='index.php';
         ";
      }else{
         $sql = "INSERT INTO user VALUES('', '$username', '$password', '$email')";
         $result = mysqli_query($conn, $sql);
         if(mysqli_affected_rows($conn)>0){
            echo "
               <script>
                  alert('Registrasi Berhasil');
                  document.location.href='index.php';
               </script>
            ";
         }else{
            echo "
               <script>
                  alert('Registrasi Gagal');
                  document.location.href='index.php';
               </script>
            ";
         }
      }
   }else{
      echo "
         <script>
         alert('Konfirmasi Password Tidak Sesuai');
         document.location.href='index.php';
         </script>

      ";
   }

}else if(isset($_POST['login'])){
   $username = $_POST['username'];
   $password = $_POST['password'];
   $result = mysqli_query($conn, "SELECT username, password FROM user WHERE username = '$username'");
   if(mysqli_num_rows($result)===1){
      $row = mysqli_fetch_assoc($result);
      if(password_verify($password, $row['password'])){
         $_SESSION['login']=true;
         header("Location: admin/terang/index.php");
         exit;
      }
   }$error=true;
}




?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
   <head>
      <meta charset="utf-8">
      <title>Login</title>
      <link rel="stylesheet" href="index.css">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
   <body>
      <div class="wrapper">
         <div class="title-text">
            <div class="title login">
               Login
            </div>
            <div class="title signup">
               Sign Up
            </div>
         </div>
         <div class="form-container">
            <div class="slide-controls">
               <input type="radio" name="slide" id="login" checked>
               <input type="radio" name="slide" id="signup">
               <label for="login" class="slide login">Login</label>
               <label for="signup" class="slide signup">Sign Up</label>
               <div class="slider-tab"></div>
            </div>
            <div class="form-inner">
               <form action="" method="post" class="login">
                  <br><br>
                  <?php if(isset($error)){
                   echo"<p style='color: red;'>Username atau Password Salah</p>";
                  }
                  ?>
                  <div class="field">
                     <input type="text" name="username" placeholder="Username" required>
                  </div>
                  <div class="field">
                     <input type="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="login" value="Masuk">
                  </div>
               </form>
               <form action="" method="post" class="signup">
                  <div class="field">
                     <input type="text" name="email" placeholder="E-mail" required>
                  </div>
                  <div class="field">
                     <input type="text" name="username" placeholder="Username" required>
                  </div>
                  <div class="field">
                     <input type="password" name="password" placeholder="Password" required>
                  </div>
                  <div class="field">
                     <input type="password" name="cpassword" placeholder="Confirm Password" required>
                  </div>
                  <div class="field btn">
                     <div class="btn-layer"></div>
                     <input type="submit" name="register" value="Daftar">
                  </div>
               </form>
            </div>
         </div>
      </div>
      <script>
         const loginText = document.querySelector(".title-text .login");
         const loginForm = document.querySelector("form.login");
         const loginBtn = document.querySelector("label.login");
         const signupBtn = document.querySelector("label.signup");
         const signupLink = document.querySelector("form .signup-link a");
         signupBtn.onclick = (()=>{
           loginForm.style.marginLeft = "-50%";
           loginText.style.marginLeft = "-50%";
         });
         loginBtn.onclick = (()=>{
           loginForm.style.marginLeft = "0%";
           loginText.style.marginLeft = "0%";
         });
         signupLink.onclick = (()=>{
           signupBtn.click();
           return false;
         });
      </script>
   </body>
</html>