<!DOCTYPE html>
<html>
<head>
  <title>Signup Page</title>
  <style>
    .container {
      position: relative;
      width: 100%;
      height: 0;
      padding-bottom: 56.25%;
    }

    .background-image {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url("login.gif");
      background-repeat: no-repeat;
      background-size: cover;
      z-index: -1;
    }

    .login-box {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 300px;
      background-color: gold;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      opacity: 0.9;
    }

    h1 {
      text-align: center;
    }

    .form-group {
      margin-bottom: 5px;
    }

    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }

    input[type="text"],
    input[type="password"] {
      width: 90%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 3px;
    }

    input[type="submit"] {
      width: 20%;
      background-color: black;
      color: gold;
      padding: 10px;
      border: none;
      border-radius: 3px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #45a049;
    }

    .logo img {
      max-width: 200px;
      background-color: white;
      margin-left: 45px;
    }

    p {
      margin-top: 10px;
    }

    .cta-button {
      display: inline-block;
      background-color: black;
      color: gold;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      text-decoration: none;
      margin-top: 30px;
    }
  </style>
  <script>
    function validateForm() {
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;
      var mobile = document.getElementById("mobile").value;

      if (username.trim() === "" || password.trim() === "" || mobile.trim() === "") {
        alert("Please enter all the required fields.");
        return false;
      }

      if (mobile.length !== 10) {
        alert("Mobile number should contain exactly 10 digits.");
        return false;
      }

      if (!/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()])[A-Za-z\d!@#$%^&*()]{6,}$/.test(password)) {
        alert("Password should be at least 6 characters long, and contain at least 1 capital letter, 1 symbol, and 1 number.");
        return false;
      }

      return true;
    }
  </script>
</head>
<body>
  <div class="container">
    <div class="background-image"></div>
    <div class="login-box">
      <h1>Signup</h1>
      <div class="logo">
        <img src="vcinemaslogo.webp" alt="V Cinemas Logo">
      </div>
      <form id="signupForm" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" onsubmit="return validateForm()">
        <input type="text" id="username" name="username" placeholder="Username">
        <input type="password" id="password" name="password" placeholder="Password">
        <input type="text" id="mobile" name="mobile" placeholder="Mobile Number">
        <input type="submit" value="Signup">
      </form>
      <p>Already have an account?</p>
      <a class="cta-button" href="login.php">Login</a>
    </div>
  </div>
  
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $mobile = $_POST["mobile"];

    if (empty($username) || empty($password) || empty($mobile)) {
      echo "<script>alert('Please enter all the required fields.');</script>";
    } elseif (strlen($mobile) !== 10) {
      echo "<script>alert('Mobile number should contain exactly 10 digits.');</script>";
    } elseif (!preg_match("/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()])[A-Za-z\d!@#$%^&*()]{6,}$/", $password)) {
      echo "<script>alert('Password should be at least 6 characters long, and contain at least 1 capital letter, 1 symbol, and 1 number.');</script>";
    } else {
    
      $servername = "localhost";
      $dbusername = "root";
      $dbpassword = "";
      $dbname = "theatree";

      $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

      if ($conn->connect_error) {
          die("Connection failed: " . $conn->connect_error);
      }

    
      $sql = "INSERT INTO signup (username, password, mobile) VALUES ('$username', '$password', '$mobile')";

      if ($conn->query($sql) === TRUE) {
          echo "<script>alert('Signup successful.');</script>";
          header("Location: home.php");
      } else {
          echo "Error: " . $sql . "<br>" . $conn->error;
      }

      $conn->close();
    }
  }
  ?>
</body>
</html>