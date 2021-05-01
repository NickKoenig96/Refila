<?php

include_once(__DIR__ . "/Database.php");


class Orders{

    public function getAllActivePrinter($name){

        $conn = Db::getConnection();
        $result = $conn->prepare("select * from orders where printermail = :email and type = 'active'");
        $result->bindValue(':email', $name);
        $result->execute();
        $ordersA = $result->fetchAll();
        return  $ordersA;
    }

    public function getAllNotActivePrinter(){

        $conn = Db::getConnection();
        $result = $conn->prepare("select * from orders where type = 'notActive'");
        $result->execute();
        $ordersNA = $result->fetchAll();
        return  $ordersNA;
    }

    public function getAllCompletedPrinter($name){

        $conn = Db::getConnection();
        $result = $conn->prepare("select * from orders where printermail = :email and  type = 'completed' ");
        $result->bindValue(':email', $name);
        $result->execute();
        $ordersC = $result->fetchAll();
        return  $ordersC;
    }

}