<?php

include_once(__DIR__ . "/Database.php");


class Products{

    public function getPopularProducts(){

        $popular = 'popular';
        $conn = Db::getConnection();
        $result = $conn->query("select * from products where cat = 'popular' order by id desc limit 4 ");

        $result->execute();

        $products = $result->fetchAll();

         return  $products;
    }

    public function getRecommendedProducts(){

        $popular = 'popular';
        $conn = Db::getConnection();
        $result = $conn->query("select * from products where cat = 'recommended' order by id desc limit 4 ");

        $result->execute();

        $products = $result->fetchAll();

        return  $products;
    }

}

