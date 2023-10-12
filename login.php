<?php
include("connect.php");

session_start();

if(isset($_SESSION['username'])){
    header("location: index.php");
}

function setValue($name){
    if(isset($_POST[$name])){
        echo $_POST[$name];
    }
   
}


// print_r(isset($_SESSION));
// print_r(isset($_POST));

?>

<html>
    <head>
    <link rel="stylesheet" href="main.css">
    </head>
    <body>
    <h2 class="logintitle">Login</h2>  
        <div class="login">
            <form action="script.php" method = "POST">

            
            <label for="userName">User Name</label><br>
            <input type="text" name ="userName"  value = "<?php setValue("userName");?>">
            <br><br>

            <label for="password">Password</label><br>
            <input type="password" name ="password" value = "<?php setValue("password");?>">
            <br><br>

            <button type= "submit" name = "login" value = "<?php setValue("login");?>">Login</button>

            </form>
         </div>
    </body>


</html>