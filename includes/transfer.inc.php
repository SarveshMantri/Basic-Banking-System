<?php

require_once 'dbh.inc.php';
require_once 'functions.inc.php';

if (isset($_POST["submit"])){
    
    $customerid = $_POST["customerid"];
    $customername = $_POST["customername"];
    $receiverid = $_POST["receiver_id"];
    $receivername = $_POST["receiver_name"];
    $amount = $_POST["amount"];

     if(customerexist ($conn, $receiverid, $receivername) != false ){
        if (samecustomer($conn,$customerid,$receiverid) != false){
            header("location: ../customer.php?error=samecustomer");
        }
        else{
            try{
                $db_name = "mysql:host=localhost;dbname=banksystem";
                $username = "root";
                $password = "";


                $connection = new PDO($db_name, $username, $password);
                $connection->beginTransaction();
            
                $sql1 = $connection->prepare("INSERT INTO transfers (sender_id, sender_name, receiver_id, receiver_name, transfered_amount) VALUES ('$customerid', '$customername', '$receiverid', '$receivername', '$amount');");
                $sql2 = $connection->prepare("UPDATE customer SET customerbalance = customerbalance - $amount WHERE customerid = $customerid;");
                $sql3 = $connection->prepare("UPDATE customer SET customerbalance = customerbalance + $amount WHERE customerid = $receiverid;");

                if(!$sql1->execute()){
                    throw new Exception('TRANSFER FAILED');
                }
                if(!$sql2->execute()){
                    throw new Exception('UPDATION FAILED');
                }
                if(!$sql3->execute()){
                    throw new Exception('UPDATION FAILED');
                }

                $connection->commit();
                header("location: ../transfers.php?error=transfersuccess");
            
            }catch(Exception $e){
                $connection->rollback();
                echo $e->getMessage();
                header("location: ../customer.php?error=Rollback");
            }
            
        }
    }
    else{
        header("location: ../customer.php?error=receivernotexist");
    }

    }
else{
    header("location:../index.php");
}