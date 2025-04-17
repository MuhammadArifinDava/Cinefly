const logo = document.querySelector('.logo');
const watchListItems = document.getElementById('watchList-Items');

// Function to display the list of WatchList
function showWatchListItems() {
    const storedWatchList = JSON.parse(localStorage.getItem('watchlist')) || [];

    if (storedWatchList.length === 0) {
        const emptyMessage = document.createElement('p');
        emptyMessage.textContent = "It's lonely here. Add some Movies or TV shows to WatchList!";
        watchListItems.appendChild(emptyMessage);
    } else {
        storedWatchList.forEach(movie => {
            const shortenedTitle = movie.title || movie.name;
            const date = movie.release_date || movie.first_air_date;
            const watchList_Item = document.createElement('div');
            watchList_Item.classList.add('watchlist-item');
            watchList_Item.innerHTML = `
                <div class="search-item-thumbnail">
                    <img src="https://image.tmdb.org/t/p/w500${movie.poster_path}" />
                </div>
                <div class="search-item-info">
                    <h3>${shortenedTitle}</h3>
                    <h4>Year: ${date}</h4>
                </div>
                <button class="removeBtn" id="${movie.id}">Remove From WatchList</button>
            `;
            watchListItems.appendChild(watchList_Item);

            // Add a click event listener to remove button
            const removeBtn = watchList_Item.querySelector('.removeBtn');
            removeBtn.addEventListener('click', () => removeMovieFromWatchList(movie.id));

            // Add a click event listener to navigate to respective movie details page
            const thumbnail = watchList_Item.querySelector('.search-item-thumbnail');
            thumbnail.addEventListener('click', () => {
                // Ensure media_type is included in the URL
                const movieDetailsURL = `../movie_details/movie_details.php?media=${movie.media_type}&id=${movie.id}`;
                window.location.href = movieDetailsURL;
            });
        });
    }
}

// Function to remove a movie from the WatchList
function removeMovieFromWatchList(movieId) {
    let storedWatchList = JSON.parse(localStorage.getItem('watchlist')) || [];
    const movieIndex = storedWatchList.findIndex(movie => movie.id === movieId);

    if (movieIndex !== -1) {
        storedWatchList.splice(movieIndex, 1);
        localStorage.setItem('watchlist', JSON.stringify(storedWatchList));

        const movieElement = document.getElementById(movieId);
        if (movieElement) {
            movieElement.parentElement.remove();
        }

        if (storedWatchList.length === 0) {
            watchListItems.innerHTML = "";
            const emptyMessage = document.createElement('p');
            emptyMessage.textContent = "It's lonely here. Add some Movies or TV shows to WatchList!";
            watchListItems.appendChild(emptyMessage);
        }
    }
}

window.addEventListener('load', () => {
    showWatchListItems();
});

logo.addEventListener('click', () => {
    window.location.href = 'home.php';
});