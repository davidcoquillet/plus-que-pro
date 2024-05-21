import './bootstrap';

const editMovieButton = document.getElementById("editMovie")

if(editMovieButton !== null && editMovieButton.length !== 'undefined') {
    editMovieButton.onclick = function () {
        location.href = '/movie/editMode/' + this.dataset.movieId;
    };
}
