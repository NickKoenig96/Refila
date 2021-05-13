<?php

include_once(__DIR__ . "/Database.php");


class Products{

    public function getPopularProductsP(){

      
        $conn = Db::getConnection();
        $result = $conn->query("select * from products where cat = 'popular' and user = 'printer' order by id desc limit 4 ");

        $result->execute();

        $products = $result->fetchAll();
         return  $products;
    }

    public function getRecommendedProductsP(){

      
        $conn = Db::getConnection();
        $result = $conn->query("select * from products where cat = 'recommended' and user = 'printer' order by id desc limit 4 ");

        $result->execute();

        $products = $result->fetchAll();

        return  $products;
    }

    public function getAllProductsP(){
        $conn = Db::getConnection();
        $result = $conn->query("select * from products where user = 'printer'");

        $result->execute();

        $products = $result->fetchAll();

        return  $products;
    }




    public function getPopularProductsH(){

      
        $conn = Db::getConnection();
        $result = $conn->query("select * from products where cat = 'popular' and user = 'horeca' order by id desc limit 4 ");

        $result->execute();

        $products = $result->fetchAll();
         return  $products;
    }

    public function getRecommendedProductsH(){

      
        $conn = Db::getConnection();
        $result = $conn->query("select * from products where cat = 'recommended' and user = 'horeca' order by id desc limit 4 ");

        $result->execute();

        $products = $result->fetchAll();

        return  $products;
    }

    public function getAllProductsH(){
        $conn = Db::getConnection();
        $result = $conn->query("select * from products where user = 'horeca'");

        $result->execute();

        $products = $result->fetchAll();

        return  $products;
    }


    public function getProductPById($id){
        $conn = Db::getConnection();
        $result = $conn->prepare("select * from products where id = :id ");
        $result->bindValue(':id', $id);
        $result->execute();

        $products = $result->fetchAll();

        return  $products;
    }




}

