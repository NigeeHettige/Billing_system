<?php
include("connect.php");
session_start();

function setValue($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }
}


?>

<html>
    <head>
        <link rel ="stylesheet"  href = "main.css">
    </head>
    <body>
        
        <h2 class="logintitle">Add new Product</h2>
        <div class="login">
            <form action="index.php" method= "POST">
            

            <input type="hidden" name ="id" value = "<?php setValue("id");?>">

            <label for="productName">ProductName</label>
            <input type="text" name= "productname" value = "<?php setValue("productname");?>">
            <br><br>

            <label for="price">Price</label>
            <input type="number" name= "price"  value = "<?php setValue("price");?>">
            <br><br>

            <label for="discount">Discount</label>
            <input type="number" name= "discount" value = "<?php setValue("discount");?>">
            <br><br>

            <button type="submit" name="add" value = "Add">Add</button>



        </form>
        </div>
    </body>
</html>
