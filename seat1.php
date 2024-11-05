<?php
// seat.php

// Replace with your database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "seat_booking";

// Check if the request contains the selected seats data
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["seats"])) {
    // Get the selected seats data from the request
    $seats = json_decode($_POST["seats"], true);

    // Create a new connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Iterate over the selected seats and insert them into the database
    foreach ($seats as $seat) {
        if (isset($seat["row"]) && isset($seat["seatColumn"])) {
            $row = $seat["row"];
            $seatColumn = $seat["seatColumn"];
            $bookingDate = date("Y-m-d");

            // Prepare the SQL statement
            $sql = "INSERT INTO bookings1 (seat_row, seat_column, booking_date) VALUES ('$row', '$seatColumn', '$bookingDate')";

            // Execute the query
            if ($conn->query($sql) !== true) {
                echo "Error: " . $sql . "<br>" . $conn->error;
                exit(); // Terminate the script if there's an error
            }
        }
    }

    // Close the database connection
    $conn->close();

    // Return a response to the client
    echo "Seats booked successfully.";
    exit(); // Terminate the script after sending the success message
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Seat Selection</title>
  <style>
    /* CSS styles for seat selection */
    .seat {
      display: inline-block;
      width: 40px;
      height: 40px;
      margin: 5px;
      text-align: center;
      line-height: 40px;
      cursor: pointer;
    }

    .available {
      background-color: green;
      color: white;
    }

    .selected {
      background-color: red;
      color: white;
    }

    .blocked{
      background-color: grey;
      color: white;  
    }

    #total-amount {
      font-weight: bold;
      margin-top: 10px;
    }

    body {
      background-image: url("seatbackground.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }

    h1 {
      text-align: center;
      margin: 20px 0;
    }

    h4 {
      text-align: center;
    }

    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: rgba(255, 255, 255, 0.8);
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      text-align: center;
      opacity: 0.85;
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

    .cta-button:hover {
      background-color: darkorange;
    }
    /* Rest of your existing styles... */
  </style>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    // JavaScript code for seat selection
    $(document).ready(function() {
      var selectedSeats = [];

      $(".seat").click(function() {
        var seat = $(this);

        if (!seat.hasClass("blocked")) {
          seat.toggleClass("selected");

          var seatIndex = selectedSeats.findIndex(function(selectedSeat) {
            return selectedSeat.seat === seat;
          });

          if (seatIndex === -1) {
            selectedSeats.push({ seat: seat, row: seat.data("row"), seatColumn: seat.data("column") });
          } else {
            selectedSeats.splice(seatIndex, 1);
          }

          updateTotalAmount();
        }
      });

      function updateTotalAmount() {
        var totalAmount = selectedSeats.length * 100;
        $("#total-amount").text("Total Amount: $" + totalAmount);
      }

      $("#book-seats").click(function() {
        if (selectedSeats.length > 0) {
          var jsonData = JSON.stringify(selectedSeats.map(function(seat) {
            return { row: seat.seat.data("row"), seatColumn: seat.seat.data("column") };
          }));

          $.ajax({
            url: "seat1.php",
            type: "POST",
            data: { seats: jsonData },
            success: function(response) {
              alert(response);
              location.reload(); // Refresh the page after successful booking
            },
            error: function(xhr, status, error) {
              alert("An error occurred while booking the seats. Please try again later.");
              console.log(xhr.responseText);
            }
          });
        } else {
          alert("Please select at least one seat.");
        }
      });
    });
  </script>
</head>
<body>
  <h1>Seat Selection</h1>
  <div class="container">
    <?php
    // Create a new connection to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve the booked seats from the database
    $sql = "SELECT seat_row, seat_column FROM bookings1";
    $result = $conn->query($sql);

    $bookedSeats = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $bookedSeats[$row["seat_row"]][$row["seat_column"]] = true;
        }
    }

    // Close the database connection
    $conn->close();

    // Display the seat layout
    $seatMatrix = [
        ['A','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['B','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['C','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['D','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['E','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['F','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['G','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['H','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['I','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['J','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['K','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['L','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['M','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['N','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['O','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15'],
        ['P','1', '2', '3', '4', '5','6','7','8','9','10','11','12','13','14','15']
    ];

    foreach ($seatMatrix as $row) {
        $seatRow = $row[0];
        $seatColumns = array_slice($row, 1);

        echo "<div class='row'>";
        echo "<div class='seat'>" . $seatRow . "</div>";

        foreach ($seatColumns as $seatColumn) {
            $seatClass = "seat available";

            // Check if the seat is already booked
            if (isset($bookedSeats[$seatRow][$seatColumn])) {
                $seatClass = "seat blocked";
            }

            echo "<div class='" . $seatClass . "' data-row='" . $seatRow . "' data-column='" . $seatColumn . "'>" . $seatColumn . "</div>";
        }

        echo "</div>";
    }
    ?>
    <br>
    <button id="book-seats" class="cta-button">Book Seats</button>
    <div id="total-amount"></div>
  </div>
</body>
</html>