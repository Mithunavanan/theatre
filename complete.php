<!DOCTYPE html>
<html>
<head>
  <title>Payment Completed</title>
  <style>
    body {
      font-family: Times New Roman;
      background-image: url("completebackground.jpg");
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .container {
      max-width: 600px;
      padding: 30px;
      background-color: gold;
      border-radius: 8px;
      text-align: center;
    }
    
    h1 {
      color: black;
      font-size: 36px;
      margin-bottom: 30px;
    }
    
    .payment-message {
      color: black;
      font-size: 24px;
      margin-bottom: 20px;
    }
    
    .logo {
      max-width: 150px;
      margin-bottom: 20px;
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
</head>
<body>
  <div class="container">
    <img src="vcinemaslogo.webp" alt="V Cinemas Logo" class="logo">
    <h1>Your Payment is Completed</h1>
    <div class="payment-message">
      <p>Thank you for your payment!</p>
      <p>Tickets Has been Sent Through Message and also E-Mail</p>
      <h2>Thanks For Choosing V Cinemas...!!!</h2>

      <a class="cta-button" href="home.php">Return To Home</a>

    </div>
  </div>
</body>
</html>
