<?php
session_start(); 
if (!isset($_SESSION['role']) || $_SESSION['role'] == 'guest') {
    header("Location: ../register.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="movie_details.css">
    <link rel="icon" href="../assets/netflix.ico">
    <title>Movie Details</title>
</head>

<body>
    <!-- Header section -->
    <header class="header">
        <img src="../assets/cinefly.png" alt="logo" class="logo">
    </header>

    <!-- Movie details section -->
    <div class="movie-details">

        <!-- Movie poster section -->
        <div class="movie-poster">
            <img id="moviePoster" src="" alt="Movie Poster">
            <iframe frameborder="0" allowfullscreen
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                src="" id="iframe"></iframe>
        </div>

        <!-- Movie information section -->
        <div class="movie-info">

            <h1 id="movieTitle"></h1>
            <p id="plot"></p>

            <div class="movie-data">
                <div class="design">
                    <span>Released :</span>
                    <p id="movieYear"></p>
                </div>

                <div class="design">
                    <span>Language :</span>
                    <p id="language"></p>
                </div>
            </div>

            <div class="movie-data rating-data">
                <div class="design">
                    <span>Rating :</span>
                    <p id="rating"></p>
                </div>
                <div class="design">
                    <span>Genre :</span>
                    <p id="genre"></p>
                </div>
            </div>

            <!-- watchList button section -->
            <button class="watchListBtn"></button>
        </div>
    </div>

    <script src="movie_details.js"></script>
</body>

</html>