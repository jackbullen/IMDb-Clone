<?php

include_once 'Database.php';

class Movie extends Database {

    public function fetchAllMovies($limit = 5, $offset = 0) {
        $sql = "SELECT * FROM titles LIMIT ?, ?";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("SQL statement failed: " . $this->conn->error);
        }
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $movies = [];
        while ($row = $result->fetch_assoc()) {
            $movies[] = $row;
        }
        $stmt->close();
        return $movies;
    }

    public function searchMovies($query, $limit = 5, $offset = 0) {
        $searchQuery = "%$query%";
        $sql = "SELECT * FROM titles WHERE primaryTitle LIKE ? LIMIT ?, ?";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("SQL statement failed: " . $this->conn->error);
        }
        $stmt->bind_param("sii", $searchQuery, $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $movies = [];
        while ($row = $result->fetch_assoc()) {
            $movies[] = $row;
        }
        $stmt->close();
        return $movies;
    }

    public function fetchMovieDetails($tconst) {
        $sql = "SELECT * FROM titles WHERE tconst = ?";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("SQL statement failed: " . $this->conn->error);
        }
        $stmt->bind_param("s", $tconst);
        $stmt->execute();
        $result = $stmt->get_result();
        $details = $result->fetch_assoc();
        $stmt->close();
        return $details;
    }

    public function addMovieReview($tconst, $review, $rating) {
        $sql = "INSERT INTO reviews (tconst, review, rating, reviewDate) VALUES (?, ?, ?, CURDATE())";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("SQL statement failed: " . $this->conn->error);
        }
        $stmt->bind_param("ssi", $tconst, $review, $rating);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }
}