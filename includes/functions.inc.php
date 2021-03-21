<?php

include_once 'dbh.inc.php';

function customerexist ($conn, $receiverid, $receivername){
    $query = mysqli_query($conn,"SELECT * FROM customer WHERE customerid = '$receiverid' AND customername = '$receivername';");
    if (mysqli_num_rows($query) > 0){
        return true;
    }
    else{
        return false;
    }
}

function samecustomer($conn,$customerid,$receiverid){
    if ((!empty($customerid)) && (!empty($receiverid)) ){
        if($customerid === $receiverid){
            return true;
        }
        else{
            return false;
        }
    }
}

