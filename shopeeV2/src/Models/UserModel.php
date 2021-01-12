<?php

namespace App\Models;

use PDO;

class UserModel {

    public function addUser($request)
    {
        $db = Database::getInstance()->getDB();
        try
        {
            $db->beginTransaction();
            $sql = "INSERT INTO `user` (username, password, first_name, last_name) VALUES (:username, :password, :first_name, :last_name)";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':username',$request['username']);
            $stmt->bindParam(':password',$request['password']);
            $stmt->bindParam(':first_name',$request['first_name']);
            $stmt->bindParam(':last_name',$request['last_name']);

            $stmt->execute();

            $db->commit();
        }
        catch (\Exception $e)
        {
            $db->rollBack();
            throw $e;
        }

        $sql2 = "SELECT * FROM `user` WHERE username = :username2";
        $stmt2 = $db->prepare($sql2);
        $stmt2->bindParam(':username2',$request['username']);
        $stmt2->execute();
        $result = $stmt2->fetchAll(PDO::FETCH_ASSOC);
        if (count($result)>0){
            return $result;
        }
        return [];
    }

    public function initLogin($email, $password)
    {
        $db = Database::getInstance()->getDB();

        $sql = "SELECT * FROM `user` WHERE password = :pass AND username = :email";

        $stmt = $db->prepare($sql);
        $stmt->bindParam(':pass',$password);
        $stmt->bindParam(':email',$email);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($result)>0){
            return $result;
        }
        return $result;
    }


}