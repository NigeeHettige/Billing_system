<?php
include("connect.php");

session_start();

if(!isset($_SESSION['username'])){
    header("location: login.php");
    exit;
}

if(isset($_POST["add"])){
    $productname = $_POST['productname'];
    $price = $_POST['price'];
    $discount = $_POST['discount'];

    $query = "INSERT INTO `product`(name,price,discount)VALUES('$productname','$price','$discount')";
    $result = mysqli_query($con,$query);

    if($result){
        header("location: index.php");

    }else{
        echo "Connection Error".mysqli_connect_error();
    }
}


?>
<html>
    <head>
        <link rel="stylesheet" href= "main.css">
    </head>
    <body style="background-color: #d9dcf4;">
    
        <div class="nav">
            <div class="maintitle" style="float: left;"><h1>Billing System</h1></div>
            <div class="logoutbutton" style="float: right;"><a href="script.php?action=logout">Log out</a></div>
        </div>

    <div class="product">
        <div class= "productTitle">
            <h2 style ="float:left; margin-top: 150px; margin-left: 487px; margin-bottom: 20px;">Product Details</h2>
            <a href="product.php" style ="float:right; margin-top: 150px; margin-right: 540px; margin-bottom: 20px;">+</a>
            <br><br>
        </div>

        <div class= "ptable">
        <table>
            <thead>
                <th>ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Discount</th>
                <th>Action</th>
            </thead>
            <tbody>

        <?php
            $query = "SELECT*FROM product";
            $result = mysqli_query($con,$query);
            
            while($row = mysqli_fetch_assoc($result)){ ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td style="text-align:center;"><?php echo number_format($row['price'],2); ?></td>
                    <td><?php echo $row['discount']; ?></td>
                    <td class = "item"><a href="index.php?id=<?php echo $row["id"];?>">AddItem</a></td>
                </tr>
            <?php
            }
            ?>

        </tbody>


        </table>
        </div>
    </div>

<?php

if(isset($_GET["id"])){
    $id = $_GET['id'];

    $query = "SELECT*FROM product WHERE id='$id'";
    $result = mysqli_query($con,$query);
    if($result){
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $price = $row['price'];
        $discount = $row['discount'];
        
    }else{
        echo "Error fetching details".mysqli_error($con);
    }

    $query1 = "INSERT INTO cart(name,price,discount)VALUES('$name','$price','$discount')";
    $result1 = mysqli_query($con,$query1);
    if($result1){
        header("Location: index.php");
        exit;
    }else{
        echo "Error";
    }

    
}
        
  ?>
        <br><br>
        <div class ="product" >
            <div class = "productTitle"><h2 style="float:left; margin-left: 487px; margin-bottom: 20px;">Shopping Cart</h2></div>
        <div class="ptable">
        <table>
        
                <thead>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Action</th>
                </thead>
                <tbody>
                <?php
                $price = 0;
                $query2 ="SELECT*FROM cart";
                $result2 = mysqli_query($con,$query2);
                while($row = mysqli_fetch_assoc($result2)){
                ?>
                    
                    <tr>
                        <td><?php echo $row['name'];?></td>
                        <td><?php echo number_format($row['price'],2); $price += $row['price'];?></td>
                        <td><?php echo $row['discount'];?></td>
                        <td><a href="delete.php?cartid=<?php echo $row['cartid']?>">Remove Item</a></td>
                        
                    </tr>
                    

                <?php 
                }
                
                ?>
                <b><td>Total <?php echo "Rs. ".number_format($price,2); ?></td></b>
                


                </tbody>


            </table>
        </div>
        
        </div>
    </body>
</html>

