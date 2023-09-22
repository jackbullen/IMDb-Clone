<?php

include_once '../controllers/MoviesController.php';
include_once '../controllers/NamesController.php';

$movieController = new MoviesController();
$nameController = new NamesController();

$action = $_GET['action'] ?? 'listMovies';

if ($action == 'listMovies') {
    $movies = $movieController->listMovies();
} 
elseif ($action == 'listNames') {
    $names = $nameController->listNames();
}
elseif ($action == 'nameDetails') {
    $nconst = $_GET['nconst'];
    $nameDetails = $nameController->nameDetails($nconst);
}
elseif ($action == 'movieDetails') {
    $tconst = $_GET['tconst'];
    $movieDetails = $movieController->movieDetails($tconst);
} 
elseif ($action == 'addReview') {
    $tconst = $_POST['tconst'];
    $review = $_POST['review'];
    $rating = $_POST['rating'];
    $movieController->addMovieReview($tconst, $review, $rating);
    header("Location: index.php?action=movieDetails&tconst=$tconst");
    exit();
}