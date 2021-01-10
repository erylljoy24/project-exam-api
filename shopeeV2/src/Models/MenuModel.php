<?php

namespace App\Models;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use PDO;

class MenuModel {

    public function getItems()
    {
        $db = Database::getInstance()->getDB();

        $sql = "SELECT * FROM `menu`";

        $stmt = $db->prepare($sql);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}