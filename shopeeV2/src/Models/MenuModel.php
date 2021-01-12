<?php

namespace App\Models;

use PDO;

class MenuModel {

    public function addMenu($prod_name, $price, $user_id, $image)
    {
        $db = Database::getInstance()->getDB();
        try
        {
            $db->beginTransaction();

            $sql = "INSERT INTO `menu` (name, price, user_id, image) VALUES (:prod_name, :price, :user_id, :image)";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':prod_name',$prod_name);
            $stmt->bindParam(':price',$price);
            $stmt->bindParam(':user_id',$user_id);
            $stmt->bindParam(':image',$image);

            $stmt->execute();

            $db->commit();
        }
        catch (\Exception $e)
        {
            $db->rollBack();
            throw $e;
        }
        return ['message' => 'ok'];
    }

    public function deleteMenu($id)
    {
        $db = Database::getInstance()->getDB();
        try
        {
            $db->beginTransaction();

            $sql = "DELETE FROM `menu` WHERE menu_id = :menu_id";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':menu_id',$id);

            $stmt->execute();

            $db->commit();
        }
        catch (\Exception $e)
        {
            $db->rollBack();
            throw $e;
        }
        return ['message' => 'ok'];
    }

    public function updateMenu($request)
    {
        $db = Database::getInstance()->getDB();
        try
        {

            $db->beginTransaction();

            $sql = "DELETE FROM `menu` WHERE menu_id = :menu_id";

            $stmt = $db->prepare($sql);
            $stmt->bindParam(':menu_id',$id);

            $stmt->execute();

            $db->commit();
        }
        catch (\Exception $e)
        {
            $db->rollBack();
            throw $e;
        }
        return ['message' => 'ok'];
    }

    public function getItems()
    {
        $db = Database::getInstance()->getDB();

        $sql = "SELECT * FROM `menu`";

        $stmt = $db->prepare($sql);

        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getMyItems($id)
    {
        $db = Database::getInstance()->getDB();

        $sql = "SELECT * FROM `menu` WHERE user_id = :user_id";
        $stmt = $db->prepare($sql);
        $stmt->bindParam(':user_id',$id);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}