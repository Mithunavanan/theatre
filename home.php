<!DOCTYPE html>
<html>
<head>
    <title>V CINEMAS</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <style>
        body {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url("biryanibackground.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }

        .show-container{
            padding: 10;
            padding-left: 50;
        }

        .carousel-item img {
            width:100%;
            height: 100%;
        }

        .carousel-item video{
            width: 100%;
            height: 100%;
        }

        h1{
            text-align:center;
            color:gold;
        }

        h4{
            text-align:center;
            color:gold;
        }

        h2 {
            text-align: center;
            background-color: gold;
        }

        /* Custom Navbar Styling */
        .navbar {
            background-color: black;
        }

        .navbar .navbar-nav .nav-link {
            color: gold;
        }
    </style>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>
    <header>
        <h1>V CINEMAS</h1>
        <h4>A WHOLESOME EXPERIENCE..!!</h4>
    </header>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="home.php">V CINEMAS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="showtimes.php">Shows</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                </li>
            </ul>
        </div>
    </nav>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="screen-1.jpg" alt="Image 1">
                <h2>VEERA - DOLBY ATMOS(3D)</h2>
            </div>
            <div class="carousel-item">
                <img src="image2.jpg_large" alt="Image 2">
                <h2>VETRI - DOLBY ATMOS(3D)</h2>
            </div>
            <div class="carousel-item">
                <img src="image3.jpg" alt="Image 3">
                <h2>VELAN - DOLBY ATMOS(3D)</h2>
            </div>
            <div class="carousel-item">
                <img src="lobby.jpg" alt="Image 3">
                <h2>V CINEMAS LOBBY</h2>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
