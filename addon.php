<!DOCTYPE html>
<html>
<head>
  <title>Movie Ticket Booking - Snacks Add-on</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }
    body {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url("snackss.jpg");
      background-repeat: no-repeat;
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

    .form-group {
      margin-bottom: 20px;
    }

    label {
      display: block;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .snack-option {
      display: flex;
      align-items: center;
      margin-bottom: 10px;
    }

    .snack-image {
      width: 50px;
      height: 50px;
      margin-right: 10px;
    }

    select[multiple] {
      height: 150px;
    }

    .submit-button {
      display: block;
      width: 100%;
      padding: 10px;
      font-size: 16px;
      text-align: center;
      background-color: #4CAF50;
      color: #fff;
      border: none;
      cursor: pointer;
    }

    .submit-button:hover {
      background-color: #45a049;
    }

    .cta-button {
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
    <h1>Snacks Add-on</h1>

    <form action="amount.php" method="post" onsubmit="return validateForm()">
      <div class="form-group">
        <label for="snacks_addon">Add Snacks:</label>
        <input type="checkbox" id="snacks_addon" name="snacks_addon" value="yes" onclick="toggleSnacks()">
      </div>

      <div id="snacks_section" style="display: none;">
        <div class="form-group">
          <label for="snacks">Select Snacks:</label>
          <div class="snack-option">
            <img class="snack-image" src="popcorn.jpg" alt="Popcorn">
            <input type="checkbox" id="popcorn" name="snacks[]" value="popcorn" data-price="70" onchange="calculateTotal()">
            <label for="popcorn">Popcorn - $70</label>
          </div>
          <div class="snack-option">
            <img class="snack-image" src="candy.jpg" alt="Candy">
            <input type="checkbox" id="candy" name="snacks[]" value="candy" data-price="40" onchange="calculateTotal()">
            <label for="candy">Candy - $40</label>
          </div>
          <div class="snack-option">
            <img class="snack-image" src="frankie.jpg" alt="Frankie">
            <input type="checkbox" id="frankie" name="snacks[]" value="frankie" data-price="60" onchange="calculateTotal()">
            <label for="frankie">Frankie - $60</label>
          </div>
          <div class="snack-option">
            <img class="snack-image" src="chickenfingers.jpg" alt="Chicken Fingers">
            <input type="checkbox" id="chickenfingers" name="snacks[]" value="chickenfingers" data-price="80" onchange="calculateTotal()">
            <label for="chickenfingers">Chicken Fingers - $80</label>
          </div>
          <div class="snack-option">
            <img class="snack-image" src="bhelpuri.jpg" alt="Bhel Puri">
            <input type="checkbox" id="bhelpuri" name="snacks[]" value="bhelpuri" data-price="50" onchange="calculateTotal()">
            <label for="bhelpuri">Bhel Puri - $50</label>
          </div>
        </div>
      </div>
      <input type="hidden" name="seat_amount" id="seat_amount_input" value="">
      <input type="hidden" name="snacks_amount" id="snacks_amount_input" value="">
      <input type="hidden" id="total_amount_input" name="total_amount" value="0">

      <h4>Total Amount: <span id="total-amount">0</span> Rupees</h4>

      <input class="submit-button" type="submit" name="submit" value="Proceed to Payment">
    </form>
  </div>

  <script>
    function toggleSnacks() {
      var snacksAddonCheckbox = document.getElementById("snacks_addon");
      var snacksSection = document.getElementById("snacks_section");

      snacksSection.style.display = snacksAddonCheckbox.checked ? "block" : "none";
      calculateTotal();
    }

    const urlParams = new URLSearchParams(window.location.search);
    const seatAmount = parseFloat(urlParams.get('amount')) || 0;

    function calculateTotal() {
      // Calculate snacks amount
      var snacksAmount = 0;
      var snacksAmountInput = document.getElementById("snacks_amount_input");
      var selectedSnacks = document.querySelectorAll('input[name="snacks[]"]:checked');
      for (var i = 0; i < selectedSnacks.length; i++) {
        snacksAmount += parseFloat(selectedSnacks[i].getAttribute("data-price")) || 0;
      }
      snacksAmountInput.value = snacksAmount;

      // Calculate total amount
      var totalAmount = seatAmount + snacksAmount;

      // Update the total amount display
      var totalAmountDisplay = document.getElementById('total-amount');
      totalAmountDisplay.innerText = totalAmount;

      // Update the total amount input field
      var totalAmountInput = document.getElementById('total_amount_input');
      totalAmountInput.value = totalAmount;
    }

    function validateForm() {
      var snacksAddonCheckbox = document.getElementById("snacks_addon");

      if (snacksAddonCheckbox.checked) {
        var selectedSnacks = document.querySelectorAll('input[name="snacks[]"]:checked');
        if (selectedSnacks.length === 0) {
          alert("Please select at least one snack.");
          return false;
        }
      }

      return true;
    }
  </script>
</body>
</html>