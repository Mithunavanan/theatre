<!DOCTYPE html>
<html>
<head>
  <title>UPI Payment</title>
  <style>
    body {
      background-image: url('upibackground.jpg');
      background-size: cover;
      background-position: center;
      font-family: Arial, sans-serif;
      color: #fff;
    }
   
    .container {
      width: 400px;
      margin: 0 auto;
      padding: 20px;
      background-color: rgba(0, 0, 0, 0.7);
      border-radius: 10px;
      text-align: center;
    }
   
    h1 {
      font-size: 24px;
      margin-bottom: 20px;
    }
   
    .upi-form {
      text-align: left;
    }
   
    .form-group {
      margin-bottom: 20px;
    }
   
    .form-group label {
      display: block;
      font-size: 16px;
      margin-bottom: 5px;
    }
   
    .form-group input[type="text"],
    .form-group select {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: none;
    }
   
    .form-group input[type="password"] {
      width: 100%;
      padding: 10px;
      font-size: 16px;
      border-radius: 5px;
      border: none;
    }
   
    .form-group input[type="submit"] {
      width: auto;
      padding: 10px 20px;
      font-size: 16px;
      background-color: #ff5722;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
   
    .qr-code {
      margin-top: 20px;
    }
   
    .qr-code img {
      width: 200px;
      height: 200px;
      background-color: #fff;
    }


    .cta-button {
      display: inline-block;
      background-color: #4CAF50;
      color: white;
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
    <h1>UPI Payment</h1>
    <form class="upi-form" action="complete.php" method="post" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="upi-id">UPI ID</label>
        <input type="text" id="upi-id" name="upi-id" required>
      </div>
      <div class="form-group">
        <label for="amount">Amount</label>
        <input type="text" id="amount" name="amount" required>
      </div>
      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
      </div>
      <div class="form-group">
        <label for="pin">PIN</label>
        <input type="password" id="pin" name="pin" required>
      </div>

      <div class="form-group">
        <label for="otp">Enter OTP</label>
        <input type="password" id="otp" name="otp" required>
      </div>
     
      <div class="form-group">        
        <input type="submit" value="Proceed">
      </div>
    </form>
    <div class="qr-code">
      <img src="qrcode.png" alt="QR Code">
      <p>Scan the QR Code For Your Payment</p>
    </div>
  </div>
  <script>
    function validateForm() {
      var upiId = document.getElementById("upi-id").value;
      var amount = document.getElementById("amount").value;
      var name = document.getElementById("name").value;
      var pin = document.getElementById("pin").value;
      var otp = document.getElementById("otp").value;

      var upiIdPattern = /^[a-zA-Z0-9@]+$/;
      var amountPattern = /^[0-9]+$/;
      var namePattern = /^[a-zA-Z\s]+$/;
      var pinPattern = /^[0-9]{4}$/;
      var otpPattern = /^[0-9]{4}$/;

      if (!upiId.match(upiIdPattern)) {
        alert("Please enter a correct UPI ID");
        return false;
      }

      if (!amount.match(amountPattern)) {
        alert("Amount should only contain numbers");
        return false;
      }

      if (!name.match(namePattern)) {
        alert("Name should only contain alphabets");
        return false;
      }

      if (!pin.match(pinPattern)) {
        alert("PIN should be a 4-digit number");
        return false;
      }

      if (!otp.match(otpPattern)) {
        alert("OTP should be a 4-digit number");
        return false;
      }

      return true;
    }
  </script>
</body>
</html>
