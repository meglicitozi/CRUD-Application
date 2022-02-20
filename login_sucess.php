<?php
session_start();
if(isset($_SESSION["username"])){
    
    echo '<a href = "logout.php">Logout</a>';
}else{
    header("location: login.php");
}