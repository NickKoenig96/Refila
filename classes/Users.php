<?php

include_once(__DIR__ . "/Database.php");


class Users
{

    public  function register($surname, $name, $email, $username, $password, $accountType) {

         //if form filled in correctly
         if (!empty($surname) && !empty($name) && !empty($email) && !empty($username) && !empty($password) && !empty($accountType)) {

        $options = [
            'cost' => 15
        ];
        $hash = password_hash($password, PASSWORD_DEFAULT, $options);

        $conn = Db::getConnection();
        $stm = $conn->prepare("INSERT INTO users (name, surname, username, password, account, email) VALUES (:name, :surname, :username, :password, :account, :email)");
                $stm->bindValue(':surname', $surname);
                $stm->bindValue(':name', $name);
                $stm->bindValue(':username', $username);
                $stm->bindValue(':password', $hash);
                $stm->bindValue(':account', $accountType);
                $stm->bindValue(':email', $email);
                $stm->execute();
       
    }else{
        throw new Exception("From not filled in correctly");    }
    }

   /* public static function register($surname, $name, $email, $username, $password, $accountType)
    {
        //if form filled in correctly
        if (!empty($surname) && !empty($name) && !empty($email) && !empty($username) && !empty($password) && !empty($accountType)) {

            //check if username already exist in DB
            $conn = Db::getConnection();
            $stm = $conn->prepare("SELECT * FROM users WHERE username = :username");
            $stm->bindValue(':username', $username);
            $stm->execute();
            $result = $stm->fetchAll();

            //check of 
            if (count($result) === 0) {

                //password cost & hash
                $option = [
                    'cost' => 12,
                ];
                $password = password_hash($_POST['password'], PASSWORD_DEFAULT, $option);


                //insert new user in DB
                $conn = Db::getConnection();
                $stm = $conn->prepare("INSERT INTO users (surname, name, email, username, password, accountType) VALUES (:surname, :name, :email, :username, :password, :accounttype)");
                $stm->bindValue(':surname', $surname);
                $stm->bindValue(':name', $name);
                $stm->bindValue(':email', $email);
                $stm->bindValue(':username', $username);
                $stm->bindValue(':password', $password);
                $stm->bindValue(':accountType', $accountType);
                $stm->execute();

               // header('Location: login.php');
            } else {
                echo "error: username already exists";
                //throw new Exception ("error: username already exists");
            }
        } else {
            echo "error: form not filled in correctly";
            //throw new Exception ("error: form not filled in correctly");
        }
    }*/
}
