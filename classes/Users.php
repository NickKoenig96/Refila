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

                header('Location: login.php');
                
       
    }else{
        throw new Exception("From not filled in correctly");    }
    }

    public function canLogin($email, $password) {

        $conn = Db::getConnection();
        $statement = $conn->prepare("select * from users where email = :email");
        $statement->bindValue(':email', $email);
        $statement->execute();
        $user = $statement->fetch();
        var_dump($user);



        if(!$user){
            //echo 'test';
            throw new Exception("user does not exist");    

        }
        $hash = $user["password"];
        if (password_verify($password, $hash)) {
            return true;
        } else {
            throw new Exception("the password is wrong");
            return false;
        }
    }

  
}
