<?php
session_start();
if (!isset($_SESSION['email'])) {
  header("Location: home.php");
  exit();
}

$role = $_SESSION['role'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <link rel="icon" href="assets/netflix.ico">
    <title>Netflix</title>
</head>

<body>
    <header class="header">
    <img src="assets/cinefly.png" alt="logo" id="netflix-logo">

    <!-- Search di tengah -->
    <div class="center-container">
        <div class="input-container">
        <input type="text" id="searchInput" placeholder="Search movies...">
        <div id="searchResults"></div>
        </div>
    </div>

    <!-- Tombol di kanan atas -->
    <div class="right-buttons">
        <?php if ($role === 'owner') : ?>
        <button onclick="window.location.href='owner.php'" class="watchList-Btn">Owner </button>
        <?php endif; ?>
        <button id="goToWatchlist" class="watchList-Btn"><span class="btnText">WatchList</span></button>
        <button onclick="window.location.href='logout.php'" class="watchList-Btn"><span class="btnText">Logout</span></button>
    </div>
    </header>


    <!-- Banner container -->
    <div id="banner-container">
        <img id="banner" src="" alt="banner" />
        <div id="details-container">
            <h1 id="banner-title"></h1>
            <div id="button-container">
                <button id="play-button">
                    <img style="width: 0.8rem; height: 0.8rem;" src="assets/play.png" />
                    <span>Play</span>
                </button>
                <button id="more-info">
                    <img id="info-icon" src="assets/info.png" />
                    <span>More Information</span>
                </button>
            </div>
        </div>
        <div id="empty"></div>
    </div>

    <!-- Netflix Originals container -->
    <section class="movie-section">
        <h1>NETFLIX ORIGINALS</h1>

        <div class=" movie-container">
            <button class="navigation-button previous netflix-previous">&lt;</button>

            <!-- Display netflix movies here -->
            <div class="movies-box netflix-container"></div>

            <button class="navigation-button next netflix-next">&gt;</button>
        </div>
    </section>

    <!-- Netflix Shows container -->
    <section class="movie-section ">
        <h1>NETFLIX SHOWS</h1>

        <div class=" movie-container">
            <button class="navigation-button previous netflixShows-previous">&lt;</button>

            <!-- Display netflixShows movies here -->
            <div class="movies-box netflixShows-container"></div>

            <button class="navigation-button next netflixShows-next">&gt;</button>
        </div>
    </section>

    <!-- Trending Movies container -->
    <section class="movie-section">
        <h1>Trending Now</h1>

        <div class="movie-container">
            <button class="navigation-button previous trending-previous">&lt;</button>

            <!-- Display trending movies here -->
            <div class="movies-box trending-container"></div>

            <button class="navigation-button next trending-next">&gt;</button>
        </div>
    </section>

    <!-- Top Movies container -->
    <section class="movie-section ">
        <h1>Top Rated </h1>

        <div class=" movie-container">
            <button class="navigation-button previous top-previous">&lt;</button>

            <!-- Display top movies here -->
            <div class="movies-box top-container"></div>

            <button class="navigation-button next top-next">&gt;</button>
        </div>
    </section>

    <!-- Horror Movies container -->
    <section class="movie-section ">
        <h1>Horror Movies </h1>

        <div class=" movie-container">
            <button class="navigation-button previous horror-previous">&lt;</button>

            <!-- Display horror movies here -->
            <div class="movies-box  horror-container"></div>

            <button class="navigation-button next horror-next">&gt;</button>
        </div>
    </section>

    <!-- romantic Movies container -->
    <section class="movie-section ">
        <h1>Romantic Movies </h1>

        <div class=" movie-container">
            <button class="navigation-button previous romantic-previous">&lt;</button>

            <!-- Display romantic movies here -->
            <div class="movies-box romantic-container"></div>

            <button class="navigation-button next romantic-next">&gt;</button>
        </div>
    </section>

    <!-- comedy Movies container -->
    <section class="movie-section ">
        <h1>Comedy Movies </h1>

        <div class=" movie-container ">
            <button class="navigation-button previous comedy-previous">&lt;</button>

            <!-- Display comedy movies here -->
            <div class="movies-box comedy-container"></div>

            <button class="navigation-button next comedy-next">&gt;</button>
        </div>
    </section>

    <!-- action Movies container -->
    <section class="movie-section ">
        <h1>Action Movies </h1>

        <div class=" movie-container ">
            <button class="navigation-button previous action-previous">&lt;</button>

            <!-- Display action movies here -->
            <div class="movies-box action-container"></div>

            <button class="navigation-button next action-next">&gt;</button>
        </div>
    </section>

    <script src="home.js"></script>
</body>

</html>