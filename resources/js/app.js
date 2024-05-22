import './bootstrap';

const editMovieButton = document.getElementById("editMovie")
const deleteMovieButton = document.getElementById("deleteMovie")
const searchMovieField = document.getElementById("searchMovie")
const resetTests = document.getElementById("resetTests")
const csrfToken = document.head.querySelector("[name~=csrf-token][content]").content;

if(editMovieButton !== null && editMovieButton.length !== 'undefined') {
    editMovieButton.onclick = function () {
        location.href = '/movie/editMode/' + this.dataset.movieId;
    };
}

if(deleteMovieButton !== null && deleteMovieButton.length !== 'undefined') {
    deleteMovieButton.onclick = function () {
        location.href = '/movie/delete/' + this.dataset.movieId;
    };
}

if(resetTests !== null && resetTests.length !== 'undefined') {
    resetTests.onclick = function () {
        location.href = '/resetTests';
    };
}

async function searchMovie(query) {
    const response = await fetch("/movie/search/", {
        headers: {
            'Content-Type': 'application/json',
            "X-CSRF-Token": csrfToken
        },
        method: "POST",
        body: JSON.stringify(query),
    });

    return response.json();
}

if(searchMovieField !== null && searchMovieField.length !== 'undefined') {
    searchMovieField.onkeyup = (function() {
        var query = this.value;
        document.getElementById('movieList').innerHTML = '';
        searchMovie({query:query}).then((data) => {
            document.getElementById('movieList').innerHTML += data;
        });
    });
}