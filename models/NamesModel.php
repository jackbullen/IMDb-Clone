<?php

include_once 'Database.php';

class Name extends Database {
    
    public function fetchAllNames($limit = 5, $offset = 0) {
        $sql = "SELECT * FROM names LIMIT ?, ?";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("SQL statement failed: " . $this->conn->error);
        }
        $stmt->bind_param("ii", $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $names = [];
        while ($row = $result->fetch_assoc()) {
            $names[] = $row;
        }
        $stmt->close();
        return $names;
    }

    public function searchNames($query, $limit = 5, $offset = 0) {
        $searchQuery = "%$query%";
        $sql = "SELECT * FROM names WHERE primaryName LIKE ? LIMIT ?, ?";
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("SQL statement failed: " . $this->conn->error);
        }
        $stmt->bind_param("sii", $searchQuery, $offset, $limit);
        $stmt->execute();
        $result = $stmt->get_result();
        $names = [];
        while ($row = $result->fetch_assoc()) {
            $names[] = $row;
        }
        $stmt->close();
        return $names;
    }
    

    // need to modify for names
    public function fetchNameDetails($tconst) {
        $sql = "SELECT * FROM names WHERE nconst = ?";
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

    // need to modify for names
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
