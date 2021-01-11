<?php

namespace App\Models;

use PDO;

class CartModel {

    public function addToCart($request)
    {
        $db = Database::getInstance()->getDB();
        try
        {
            $db->beginTransaction();
            $sql = "INSERT INTO `cart` (menu_id, quantity, user_id) VALUES (:menu_id, :quantity, :user_id)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':menu_id',$request['menu_id']);
            $stmt->bindParam(':quantity',$request['quantity']);
            $stmt->bindParam(':user_id',$request['user_id']);
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

    public function updateCart($quantity, $cart_id)
    {
        $db = Database::getInstance()->getDB();
        try
        {
            $db->beginTransaction();
            $sql = "UPDATE `cart` SET quantity = :quantity WHERE cart_id = :cart_id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':cart_id',$cart_id);
            $stmt->bindParam(':quantity',$quantity);
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

    public function removeCart($cart_id)
    {
        $db = Database::getInstance()->getDB();
        try
        {
            $db->beginTransaction();
            $sql = "DELETE FROM `cart` WHERE cart_id = :cart_id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':cart_id',$cart_id);
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

}