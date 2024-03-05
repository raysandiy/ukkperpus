<?php
if(!isset($_SESSION["user_id"]) )
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
  <meta charset="UTF-8" />
  <title>Eperpus</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="register/register.css" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <style>
    body {
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      padding: 10px;

      background-image: url('assets/background.png'); /* Menggunakan gambar background */
      background-size: cover; /* Untuk memastikan gambar mencakup seluruh latar belakang */
      background-position: center; /* Untuk memastikan gambar terletak di tengah latar belakang */
    }
  </style>
</head>
<body>
  <div class="container p-5">
    <div class="d-flex justify-content-center">
      <div class="card" style="width: 30rem; background: whitesmoke;">
        <img src="assets/logoo.png" class="card-body pt-2" alt="logo" />
        <hr />
        <div class="card-body pt-2">
          <h3 class="card-text text-center">Portal Login EPerpus</h3>
        </div>          
      </div>
    </div>
  </div>

  <div class="container">
    <div class="title">Login</div>
    <div class="content">
      <form action="backend/login.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Username/Email</span>
            <input
              type="text"
              placeholder="Enter your username/email"
              required
              name="username_email"
            />
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input
              type="password"
              placeholder="Enter your password"
              required
              name="password"
            />
          </div>
          <p>
            Don't have an account yet?
            <a href="register/register.html" class="text-decoration-none text-primary"
              >Sign Up</a
            >
          </p>
        </div>
        <div class="button">
          <input type="submit" value="Login" />
        </div>
      </form>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
