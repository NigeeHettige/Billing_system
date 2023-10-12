<?php
include("connect.php");

    if(isset($_GET['cartid'])){
        $cartid = $_GET['cartid'];

        $query = "DELETE FROM cart WHERE cartid='$cartid'";
        $result = mysqli_query($con,$query);

        if($result){
            header("location: index.php");
            exit;
        }else{
            echo "Error".mysqli_connect_error();
        }
    }


?>