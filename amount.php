<!DOCTYPE html>
<html>
<head>
  <title>Movie Ticket Booking - Amount Details</title>
  <style>
    body {
      font-family:Times new roman;
      margin: 0;
      padding: 20px;
      background-image:url(rupeess.jpg);
      background-repeat:no repeat;
      background-size: cover;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    .container {
      max-width: 600px;
      margin: 0 auto;
      background-color: goldenrod;
      padding: 30px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .amount-details {
      margin-bottom: 20px;
    }

    .amount-label {
      font-weight: bold;
    }

    .amount-value {
      margin-left: 10px;
      font-size: 50px;
    }

    .payment-button {
      display: inline-block;
      background-color: gold;
      color: black;
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
    <h1>Amount Details</h1>

    <div class="amount-details">
      <h2>Total Amount to be Paid:</h2>
      <span class="amount-label"></span>
      <span class="amount-value"><?php echo isset($_POST['total_amount']) ? $_POST['total_amount'] : 0; ?></span>
    </div>

    <a href="realpayment.php" class="payment-button">Click for Payment Options</a>
  </div>
</body>
</html>