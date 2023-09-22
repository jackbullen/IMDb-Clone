<?php

include_once '../models/MoviesModel.php';

class MoviesController {
    public $moviesModel;

    public function __construct() {
        $this->moviesModel = new Movie();
    }

    public function listMovies() {
        $offset = isset($_GET['offset'] ) ? $_GET['offset'] : 0;
        $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;


        $searchQuery = $_GET['searchQuery'] ?? null;
        
        if ($searchQuery) {
            $movies = $this->moviesModel->searchMovies($searchQuery, $limit, $offset);
        } else {
            $movies = $this->moviesModel->fetchAllMovies($limit, $offset);
        }

        // send the data to the view
        include '../views/list_movies.php';
    }

    public function movieDetails($tconst) {
        $movieDetails = $this->moviesModel->fetchMovieDetails($tconst);
        include '../views/movie_details.php';
    }
}