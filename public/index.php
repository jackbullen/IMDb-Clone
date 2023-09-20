<?php

include_once '../controllers/MoviesController.php';

$controller = new MoviesController();

if (!isset($_GET['action'])) {
    $movies = $controller->listMovies();
} 

else if ($_GET['action'] == 'movieDetails') {
    $tconst = $_GET['tconst'];
    $movieDetails = $controller->movieDetails($tconst);
    include '../views/movie_details.php';
} 

else if ($_GET['action'] == 'addReview') {
    $tconst = $_POST['tconst'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $controller->addMovieReview($tconst, $review, $rating);
    header("Location: index.php?action=movieDetails&tconst=$tconst");
    exit();
}
