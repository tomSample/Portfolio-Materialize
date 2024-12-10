<?php
namespace App\Models;

use App\Database;

class Model {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->connect();
    }

}