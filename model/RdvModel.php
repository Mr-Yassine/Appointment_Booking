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
        function insert($date, $Horaire, $T_Consultation, $Reference){
            
            $obj = new connection();
            $query ="INSERT INTO `rendez-vous`(`Date`,`T_Consultation`,`Horaire`,`Reference`) VALUES ('$date','$T_Consultation','$Horaire','$Reference')";
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
            return $result->fetch(PDO::FETCH_ASSOC);
        }

        //update
        function update ($Id,$date, $Horaire, $T_Consultation) {
            $query = "UPDATE `rendez-vous` SET `Id`= '$Id',`date`='$date',`Horaire`='$Horaire',`T_Consultation`='$T_Consultation' WHERE Id=$Id";
            // die($query);
            $Nobjet = new connection();
            $con=$Nobjet->connect();
            
            if($result= $con->query($query)){
                return true;
            }
            else{
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
?>