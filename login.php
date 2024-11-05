<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted username and password
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username and password are provided
    if (empty($username) || empty($password)) {
        echo "<script>alert('Please enter both username and password.');</script>";
    } else {
        // Connect to the database
        $servername = "localhost";
        $dbusername = "root";
        $dbpassword = "";
        $dbname = "theatree";

        $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Verify user credentials
        $sql = "SELECT * FROM signup WHERE username = '$username' AND password = '$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // User credentials are correct, redirect to home.php
            header("Location: home.php");
            exit();
        } else {
            // User credentials are incorrect, display an error message
            echo "<script>alert('Invalid username or password. Please try again.');</script>";
        }

        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
    }
    .container {
      width: 300px;
      margin: 0 auto;
      margin-top: 100px;
      background-color: #ffffff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0px 0px 5px 0px rgba(0,0,0,0.3);
    }
    h2 {
      text-align: center;
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
    .error {
      color: red;
    }
    .logo img {
      max-width: 200px;
      background-color: white;
      margin-left: 45px;
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
    }
    h1 {
      text-align: center;
    }
    .form-group {
      margin-bottom: 15px;
    }
    .form-group label {
      display: block;
      font-weight: bold;
      margin-bottom: 5px;
    }
    .cta-button {
      display: inline-block;
      background-color: black;
      color: goldenrod;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      text-decoration: none;
      margin-top: 30px;
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="background-image"></div>
    <div class="login-box">
      <div class="logo">
        <img src="vcinemaslogo.webp" alt="V Cinemas Logo">
      </div>
      <h1>WELCOME...!</h1>
      <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <input type="text" id="username" name="username" placeholder="Username">
        <input type="password" id="password" name="password" placeholder="Password">
        <input type="submit" value="Login">
        <p>Create a New Account</p>
        <a class="cta-button" href="signup.php">Signup</a><br>
      </form>
    </div>
  </div>
</body>
</html>