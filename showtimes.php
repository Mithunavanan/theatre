<!DOCTYPE html>
<html>
<head>
  <style>
    body {
      background-image: url("seatbackground.jpg");
      background-repeat: no-repeat;
      background-size: cover;
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
    }
   
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
      background-color: red;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
   
    h1 {
      text-align: center;
      margin: 20px 0;
    }
   
    .movie-card {
      display: flex;
      align-items: center;
      padding: 10px;
      margin-bottom: 20px;
      background-color: #f2f2f2;
      border-radius: 5px;
    }
   
    .movie-image {
      flex: 0 0 150px;
      height: 200px;
      background-color: #ccc;
      background-position: center;
      background-repeat: no-repeat;
      background-size: cover;
      margin-right: 10px;
      border-radius: 5px;
    }
   
    .movie-details {
      flex: 1;
    }
   
    .movie-title {
      font-size: 24px;
      font-weight: bold;
      margin: 0;
    }
   
    .showtimes {
      margin-top: 10px;
      margin-left: 40px;
     
    }


   
   
   
    .showtime {
      display: inline-block;
      background-color: #4286f4;
      color: #fff;
      padding: 5px 10px;
      margin-right: 5px;
      border-radius: 3px;
      cursor: pointer;
    }
   
    .showtime.selected {
      background-color: #ff5722;
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
      margin-left: 10px;
    }


    p {
      margin-left: 40px;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Movie Showtimes</h1>
 
    <div class="movie-card">
      <div class="movie-image" style="background-image: url('pos\ 2.jpg');"></div>
      <div class="movie-details">
        <h2 class="movie-title">PONNIYIN SELVAN - 2</h2>
        <div class="showtimes">
          <a class="cta-button" href="seat.php">10.00 AM</a>
          <p>VEERA - DOLBY ATMOS(3D)</p>
          <a class="cta-button" href="seat1.php">2.00 PM</a>
          <p>VELAN - DOLBY ATMOS(3D)</p>
          <a class="cta-button" href="seat.php">6.00 PM</a>
          <p>VETRI - DOLBY ATMOS(3D)</p>
          <a class="cta-button" href="seat.php">10.00 PM</a>
          <p>VEERA - DOLBY ATMOS(3D)</p>
          <p></p>
        </div>
      </div>
    </div>
 
    <div class="movie-card">
      <div class="movie-image" style="background-image: url('PATHU\ THALA.jpg');"></div>
      <div class="movie-details">
        <h2 class="movie-title">PATHU THALA</h2>
        <div class="showtimes">
          <a class="cta-button" href="seat.php">11.00 AM</a>
          <p>VELAN - DOLBY ATMOS(3D)</p>
          <a class="cta-button" href="seat.php">3.00 PM</a>
          <p>VETRI - DOLBY ATMOS(3D)</p>
          <a class="cta-button" href="seat.php">7.00 PM</a>
          <p>VEERA - DOLBY ATMOS(3D)</p>
          <a class="cta-button" href="seat.php">11.00 PM</a>
          <p>VELAN - DOLBY ATMOS(3D)</p>
        </div>
      </div>
    </div>
   
    <div class="movie-card">
      <div class="movie-image" style="background-image: url('veeran.jpg');"></div>
      <div class="movie-details">
        <h2 class="movie-title"> VEERAN</h2>
        <div class="showtimes">
          <a class="cta-button" href="seat.php">9.00 AM</a>
          <p>VETRI - DOLBY ATMOS(3D)</p>
          <a class="cta-button" href="seat.php">1.00 PM</a>
          <p>VEERA - DOLBY ATMOS(3D)</p>
          <a class="cta-button" href="seat.php">5.00 PM</a>
          <p>VELAN - DOLBY ATMOS(3D)</p>
          <a class="cta-button" href="seat.php">9.00 PM</a>
          <p>VETRI - DOLBY ATMOS(3D)</p>
        </div>
      </div>
    </div>
  </div>
 
  <script>
    var showtimes = document.querySelectorAll('.showtime');
   
    function selectShowtime(event) {
      var selectedShowtime = event.target;
     
      if (selectedShowtime.classList.contains('selected')) {
        selectedShowtime.classList.remove('selected');
      } else {
        for (var i = 0; i < showtimes.length; i++) {
          showtimes[i].classList.remove('selected');
        }
       
        selectedShowtime.classList.add('selected');
      }
    }
   
    for (var i = 0; i < showtimes.length; i++) {
      showtimes[i].addEventListener('click', selectShowtime);
    }
  </script>
</body>
</html>