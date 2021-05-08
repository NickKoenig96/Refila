<?php

include_once(__DIR__ . "/Database.php");
include_once(__DIR__ . "/Users.php");





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

    public function getAllAwaitingPrinter(){

        $conn = Db::getConnection();
        $result = $conn->prepare("select * from orders where type = 'readyForShipment'");
        $result->execute();
        $ordersAW = $result->fetchAll();
        return  $ordersAW;
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

    public  function getActiveOrdersAmountHoreca($name)
    {
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where horecamail = :email  and type = 'active'");
        $result->bindValue(':email', $name);
        $result->execute();
        $activeOrdersHoreca = $result->fetch();
        return   $activeOrdersHoreca;
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

    public  function ReceiveOrder($name, $id)
    {
        $conn = Db::getConnection();
        $result = $conn->prepare("update orders set type = 'completed' where  horecamail = :email and id = :id ");
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
        $result = $conn->prepare("select * from orders where horecamail = :email and  type = 'completed' ");
        $result->bindValue(':email', $name);
        $result->execute();
        $ordersHC = $result->fetchAll();
        //var_dump($ordersHC);
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

    public function getAllCompletePrinterOrdersCount($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and printermail = :email ");
        $result->bindValue(':email', $name);
        $result->execute();
        $ordersRS = $result->fetch();
        return  $ordersRS;
    }

    public function getAllmonthCoinsPrinter($month,$name){
        $string = str_replace(' ', '', $month);
        $conn = Db::getConnection();
        $result = $conn->prepare("select price from orders where type = 'completed' and printermail = :email and month = :month");
        $result->bindValue(':email', $name);
        $result->bindValue(':month', $string);
        $result->execute();
        $coinsMonth = $result->fetchall();
        //var_dump($coinsMonth[1]);

        $arraySum = array_sum($coinsMonth[1]);
        return  $arraySum;
    }

    public function getAllCompleteOrdersPrintersMonth($month,$name){
        $string = str_replace(' ', '', $month);
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and printermail = :email and month = :month");
        $result->bindValue(':email', $name);
        $result->bindValue(':month', $string);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function getMaxIncomePrintersMonth($month,$name){
        $string = str_replace(' ', '', $month);
        $conn = Db::getConnection();
        $result = $conn->prepare("select Max(price) from orders where type = 'completed' and printermail = :email and month = :month");
        $result->bindValue(':email', $name);
        $result->bindValue(':month', $string);
        $result->execute();
        $priceMonth = $result->fetchall();
     //var_dump($priceMonth);
        return   $priceMonth;
    }

    public function getMaxIncome($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select Max(price) from orders where type = 'completed' and printermail = :email ");
        $result->bindValue(':email', $name);
        $result->execute();
        $priceMonth = $result->fetchall();
     //var_dump($priceMonth);
        return   $priceMonth;
    }







    public function getAllCompleteHorecaOrdersCount($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and Horecamail = :email ");
        $result->bindValue(':email', $name);
        $result->execute();
        $ordersRS = $result->fetch();
        return  $ordersRS;
    }

    public function getMaxIncomeH($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select Max(price) from orders where type = 'completed' and horecamail = :email ");
        $result->bindValue(':email', $name);
        $result->execute();
        $priceMonth = $result->fetchall();
        return   $priceMonth;
    }

    public function getAllmonthCoinsHoreca($month,$name){
        $string = str_replace(' ', '', $month);
        $conn = Db::getConnection();
        $result = $conn->prepare("select price from orders where type = 'completed' and horecamail = :email and month = :month");
        $result->bindValue(':email', $name);
        $result->bindValue(':month', $string);
        $result->execute();
        $coinsMonth = $result->fetchall();

        $arraySum = array_sum($coinsMonth[1]);
        return  $arraySum;
    }

    public function getAllCompleteOrdersHorecaMonth($month,$name){
        $string = str_replace(' ', '', $month);
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and horecamail = :email and month = :month");
        $result->bindValue(':email', $name);
        $result->bindValue(':month', $string);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function getMaxIncomeHorecaMonth($month,$name){
        $string = str_replace(' ', '', $month);
        $conn = Db::getConnection();
        $result = $conn->prepare("select Max(price) from orders where type = 'completed' and horecamail = :email and month = :month");
        $result->bindValue(':email', $name);
        $result->bindValue(':month', $string);
        $result->execute();
        $priceMonth = $result->fetchall();
        return   $priceMonth;
    }


    public function averageRatingPrinter($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select AVG(ratingP) from orders where type = 'completed' and printermail = :email ");
        $result->bindValue(':email', $name);
        $result->execute();
        $priceMonth = $result->fetchall();
        return   $priceMonth;
    }

    public function averageRatingPrinterC($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and printermail = :email ");
        $result->bindValue(':email', $name);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function averageRatingPrinterC5($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and printermail = :email and ratingP = 5 ");
        $result->bindValue(':email', $name);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function averageRatingPrinterC4($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and printermail = :email and ratingP = 4 ");
        $result->bindValue(':email', $name);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function averageRatingPrinterC3($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and printermail = :email and ratingP = 3 ");
        $result->bindValue(':email', $name);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function averageRatingPrinterC2($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and printermail = :email and ratingP = 2 ");
        $result->bindValue(':email', $name);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function averageRatingPrinterC1($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and printermail = :email and ratingP = 1 ");
        $result->bindValue(':email', $name);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    




    public function averageRatingHoreca($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select AVG(ratingH) from orders where type = 'completed' and horecamail = :email ");
        $result->bindValue(':email', $name);
        $result->execute();
        $priceMonth = $result->fetchall();
        return   $priceMonth;
    }

    public function averageRatingHorecaC($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and horecamail = :email ");
        $result->bindValue(':email', $name);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function averageRatingHorecaC5($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and horecamail = :email and ratingH = 5 ");
        $result->bindValue(':email', $name);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function averageRatingHorecaC4($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and horecamail = :email and ratingH = 4 ");
        $result->bindValue(':email', $name);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function averageRatingHorecaC3($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and horecamail = :email and ratingH = 3 ");
        $result->bindValue(':email', $name);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function averageRatingHorecaC2($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and horecamail = :email and ratingH = 2 ");
        $result->bindValue(':email', $name);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function averageRatingHorecaC1($name){
        $conn = Db::getConnection();
        $result = $conn->prepare("select COUNT(*) from orders where type = 'completed' and horecamail = :email and ratingH = 1 ");
        $result->bindValue(':email', $name);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function addHorecaRating($rating, $mail,$id){
        $conn = Db::getConnection();
        $result = $conn->prepare("update orders set ratingH = :rating where horecamail = :mail and id =:id ");
        $result->bindValue(':mail', $mail);
        $result->bindValue(':rating', $rating);
        $result->bindValue(':id', $id);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }

    public function addPrinterRating($rating, $mail,$id){
        $conn = Db::getConnection();
        $result = $conn->prepare("update orders set ratingP = :rating where printermail = :mail and id =:id ");
        $result->bindValue(':mail', $mail);
        $result->bindValue(':rating', $rating);
        $result->bindValue(':id', $id);
        $result->execute();
        $coinsMonth = $result->fetchall();
     
        return   $coinsMonth;
    }



 

}