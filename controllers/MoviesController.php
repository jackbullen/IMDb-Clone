<?php

include_once '../models/MoviesModel.php';

class MoviesController {
    public $moviesModel;

    public function __construct() {
        $this->moviesModel = new Movie();
    }

    public function listMovies() {
        $searchQuery = $_GET['searchQuery'] ?? null;
        if ($searchQuery) {
            $movies = $this->moviesModel->searchMovies($searchQuery);
        } else {
            $movies = $this->moviesModel->fetchAllMovies();
        }

        // send the data to the view
        include '../views/list_movies.php';
    }
}

