<?php

    require_once "DataBase/connection.php";

    //create a new user
    class UsersModel{

        // //insert
        // function selectAll(){
        //     $query = "SELECT * FROM  `users` ";
        //     $obj = new connection();
        //     $con=$obj->connect();
        //     $result= $con->query($query);
        //     return $result->fetchAll(PDO::FETCH_ASSOC);
        // }

        function insert ($Reference,$Nom,$Prenom,$Email,$Tel,$Age) {

            $query = "INSERT INTO `users`(`Reference`, `Nom`, `Prenom`, `Email`, `Tel`, `Age`) VALUES ('$Reference','$Nom','$Prenom','$Email','$Tel','$Age')";        
            $obj = new connection();
            $con=$obj->connect();
            $result= $con->query($query);
            $result->fetchAll(PDO::FETCH_ASSOC);
            
            if($result){
                return true;    
            }else{
                return false;
            }
        }

        function select($Reference){
            $query = "SELECT * FROM  `users` WHERE Reference = '$Reference' ";
            $obj = new connection();
            $con=$obj->connect();
            $result= $con->query($query);
            return $result->fetchAll(PDO::FETCH_ASSOC);
        }

        
    }