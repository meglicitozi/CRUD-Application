<?php 
include "header.php";

if(isset($_POST["login"])){
    if(empty($_POST["username"]||empty($_POST["password"]))){
        $message = '<label>All required fields!</label>';
    }else{
        $pass = $_POST["password"];
        $user = $_POST["username"];
        $query = "SELECT * FROM user WHERE username = :username AND password = :password";
        $stmt = $conn->prepare($query);
        $stmt->execute(
            array(
                ':username' => $_POST["username"],
                ':password' => $_POST["password"]
            )
        );
        $count = $stmt->rowCount();
        if($count > 0){
            $_SESSION["username"] = $_POST["username"];
            header("location: employee.php");
        }else{
            $message = '<label>Wrong data!</label>';
        }
    }
}


?>
<div class="container">
    <?php 
       if(isset($message)){
           echo '<label class="text-danger">'.$message.'</label>';
       }
    ?>
    <div class="row login-container"> 
        
        <div class="col-md-6 form-group">
            <br>
            <h3>Login</h3>
            <br>
            <form method="post">
                <label>Username:</label>
                <input type="text" name="username" class="form-control"/>
                <br>
                <label>Password:</label>
                <input type="text" name="password" class="form-control"/>
                <br>
                <input type="submit" name="login" class="btn btn-info" value="Login" />
            </form>
        </div>
        <div class="col-md-6">
            <img  src="img/login-photo.png" width="500px">
        </div>
    </div>
</div>




<?php include "footer.php"; ?>