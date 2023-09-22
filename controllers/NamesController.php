<?php

include_once '../models/NamesModel.php';

class NamesController {
    public $namesModel;

    public function __construct() {
        $this->namesModel = new Name();
    }

    public function listNames() {
        $offset = isset($_GET['offset'] ) ? $_GET['offset'] : 0;
        $limit = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
    
        $searchQuery = $_GET['searchQuery'] ?? null;

        if ($searchQuery) {
            $names = $this->namesModel->searchNames($searchQuery, $limit, $offset);
        } else {
            $names = $this->namesModel->fetchAllNames($limit, $offset);
        }
    
        // send the data to the view
        include '../views/list_names.php';
    }
    
    public function nameDetails($nconst) {
        $nameDetails = $this->namesModel->fetchNameDetails($nconst);
        include '../views/name_details.php';
    }
}