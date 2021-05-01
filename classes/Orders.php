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

    public  function getActiveOrdersAmount($name)
    {
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where printermail = :email  and type = 'active'");
        $result->bindValue(':email', $name);
        $result->execute();
        $activeOrders = $result->fetch();
        return   $activeOrders;
    }

    public  function completeOrder($name, $id)
    {
        $conn = Db::getConnection();
        $result = $conn->prepare("update orders set type = 'readyForShipment' where printermail = :email and id = :id ");
        $result->bindValue(':email', $name);
        $result->bindValue(':id', $id);
        $result->execute();
        $UpdateActiveOrders = $result->fetch();
        return $UpdateActiveOrders;
    }

    public  function AcceptOrder($name, $id)
    {
        $conn = Db::getConnection();
        $result = $conn->prepare("update orders set type = 'active' where printermail = :email and id = :id ");
        $result->bindValue(':email', $name);
        $result->bindValue(':id', $id);
        $result->execute();
        $AcceptOrder = $result->fetch();
        return $AcceptOrder;
    }






    public function getAllActiveHoreca($name){

        $conn = Db::getConnection();
        $result = $conn->prepare("select * from orders where horecamail = :email and type = 'active'");
        $result->bindValue(':email', $name);
        $result->execute();
        $ordersA = $result->fetchAll();
        return  $ordersA;
    }

    public function getAllcompleteHorecaOrders($name){

        $conn = Db::getConnection();
        $result = $conn->prepare("select * from orders where horecamail = :email and  type = 'complete' ");
        $result->bindValue(':email', $name);
        $result->execute();
        $ordersHC = $result->fetchAll();
        var_dump($ordersHC);
        return  $ordersHC;
    }

    public function getAllReadyShipement($name){

        $conn = Db::getConnection();
        $result = $conn->prepare("select * from orders where horecamail = :email and  type = 'readyForShipment' ");
        $result->bindValue(':email', $name);
        $result->execute();
        $ordersRS = $result->fetchAll();
        return  $ordersRS;
    }

 /*   public  function getActiveOrdersAmount($name)
    {
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where printermail = :email  and type = 'active'");
        $result->bindValue(':email', $name);
        $result->execute();
        $activeOrders = $result->fetch();
        return   $activeOrders;
    }

    public  function completeOrder($name, $id)
    {
        $conn = Db::getConnection();
        $result = $conn->prepare("update orders set type = 'completed' where printermail = :email and id = :id ");
        $result->bindValue(':email', $name);
        $result->bindValue(':id', $id);
        $result->execute();
        $UpdateActiveOrders = $result->fetch();
        return $UpdateActiveOrders;
    }

    public  function AcceptOrder($name, $id)
    {
        $conn = Db::getConnection();
        $result = $conn->prepare("update orders set type = 'active' where printermail = :email and id = :id ");
        $result->bindValue(':email', $name);
        $result->bindValue(':id', $id);
        $result->execute();
        $AcceptOrder = $result->fetch();
        return $AcceptOrder;
    }*/

}