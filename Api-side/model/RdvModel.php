<?php

    require_once "DataBase/connection.php";

    // reservation classe
    class RdvModel{

        //select  
        function select(){
            $query ="SELECT * FROM `rendez-vous`";
            $obj = new connection();
            $con=$obj->connect();
            $result= $con->query($query);
            return $result;
        }

        //inset
        function insert($Date, $Horaire, $T_cons, $Reference){
            
            $query ="INSERT INTO `rendez-vous`(`Date`,`T_Consultation`,`Horaire`,`Reference`) VALUES ('$Date','$Horaire','$T_cons','$Reference')";
            $obj = new connection();
            $con=$obj->connect();

            if($result= $con->query($query)){
                return true;
            }else{
                return false;
            }
        }

        //edit
        function edit($Id) {         
            $query ="SELECT * FROM `rendez-vous` WHERE Id=$Id";
            $obj = new connection();
            $con=$obj->connect();
            $result =  $con->query($query);
            $res=$result->fetch(PDO::FETCH_ASSOC);
            if($res){
                return $res;
            }else{
                return false;
            }
        }

        //update
        function update ($Id,$Date, $Horaire, $T_cons,$Reference) {
            $query = "UPDATE `rendez-vous` SET `Id`= '$Id',`Date`='$Date',`Horaire`='$Horaire',`T_Consultation`='$T_cons',`Reference`='$Reference' WHERE Id=$Id";
            $Nobjet = new connection();
            $con=$Nobjet->connect();
            $result= $con->query($query);

            if($result){
                return true;
            } else{
                return false;
            }

        }
        
        //delete
        function delete($Id){

            $query= "DELETE FROM `rendez-vous` WHERE Id=$Id";
            $obj = new connection();
            $con=$obj->connect();
            
            if($con->query($query)){
                return true;
            }else{
                return false;
            }
        }

    }
