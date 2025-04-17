const movieTitle = document.getElementById('movieTitle');
const moviePoster = document.getElementById('moviePoster');
const movieYear = document.getElementById('movieYear');
const rating = document.getElementById('rating');
const genre = document.getElementById('genre');
const plot = document.getElementById('plot');
const language = document.getElementById("language");
const iframe = document.getElementById("iframe");
const watchListBtn = document.querySelector('.watchListBtn');
const watchlist = JSON.parse(localStorage.getItem('watchlist')) || [];

// API key for TMDB API
const api_Key = '4626200399b08f9d04b72348e3625f15';

// Retrieve the TMDb ID and Media from the URL parameter
const params = new URLSearchParams(window.location.search);
const id = params.get('id');
let media = params.get("media"); // 'movie' or 'tv'

// If media is undefined, try to retrieve it from the watchlist
if (!media) {
    const movieFromWatchlist = watchlist.find(movie => movie.id === parseInt(id));
    if (movieFromWatchlist) {
        media = movieFromWatchlist.media_type; // Retrieve media_type from watchlist
    }
}

// Function to check user role before displaying movie details
async function checkUserRole() {
    const response = await fetch('getSessionRole.php');
    const role = await response.text();
    if (role.trim() === 'guest') {
        window.location.href = 'register.php';  // Redirect guest users to register
    } else {
        displayMovieDetails();  // Proceed to display movie details for 'user' or 'owner'
    }
}

// Function to fetch detailed information using its TMDb ID
async function fetchMovieDetails(id) {
    const response = await fetch(`https://api.themoviedb.org/3/${media}/${id}?api_key=${api_Key}`);
    const data = await response.json();
    return data;
}

// Display the movie details on the page
async function displayMovieDetails() {
    try {
        const movieDetails = await fetchMovieDetails(id);

        // Set the language
        var spokenlanguage = movieDetails.spoken_languages.map(language => language.english_name);
        language.textContent = spokenlanguage.join(', ');

        // Set genres
        var genreNames = movieDetails.genres.map(genre => genre.name);
        genre.innerText = genreNames.join(', ');

        // Set movie plot (trimmed if it's too long)
        movieDetails.overview.length > 290
            ? plot.textContent = `${movieDetails.overview.substring(0, 290)}...`
            : plot.textContent = movieDetails.overview;

        // Set title, poster, year, rating
        movieTitle.textContent = movieDetails.name || movieDetails.title;
        moviePoster.src = `https://image.tmdb.org/t/p/w500${movieDetails.backdrop_path}`;
        movieYear.textContent = `${movieDetails.release_date || movieDetails.first_air_date}`;
        rating.textContent = movieDetails.vote_average;

        // Updating the favorite button text and adding a click event listener to toggle favorites
        if (watchlist.some(favoriteMovie => favoriteMovie.id === movieDetails.id)) {
            watchListBtn.textContent = "Remove From WatchList";
        } else {
            watchListBtn.textContent = "Add To WatchList";
        }
        watchListBtn.addEventListener('click', () => toggleFavorite(movieDetails));

    } catch (error) {
        movieTitle.textContent = "Details are not available right now! Please try after some time.";
    }

    // Fetch video details (trailers)
    try {
        const videoDetails = await fetchVideoDetails(id);
        const trailer = videoDetails.find(video => video.type === 'Trailer');
        if (trailer) {
            iframe.src = `https://www.youtube.com/embed/${trailer.key}?autoplay=1`;
            moviePoster.style.display = "none";
        } else {
            iframe.style.display = "none";
        }
    } catch (error) {
        iframe.style.display = "none";
    }
}

// Function to toggle adding/removing from favorites (Watchlist)
function toggleFavorite(movieDetails) {
    const index = watchlist.findIndex(movie => movie.id === movieDetails.id);
    if (index !== -1) {
        watchlist.splice(index, 1); // Remove movie from watchlist
        watchListBtn.textContent = "Add To WatchList";
    } else {
        watchlist.push({ ...movieDetails, media_type: media }); // Add movie to watchlist with media_type
        watchListBtn.textContent = "Remove From WatchList";
    }
    localStorage.setItem('watchlist', JSON.stringify(watchlist));
}

// Function to fetch video details (trailers) for a movie or TV show
async function fetchVideoDetails(id) {
    const response = await fetch(`https://api.themoviedb.org/3/${media}/${id}/videos?api_key=${api_Key}`);
    const data = await response.json();
    return data.results;
}

// Call the function to check role and then display movie details when the page loads
window.addEventListener('load', () => {
    checkUserRole();  // Ensure role is checked first
});
