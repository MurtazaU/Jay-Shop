<?php 
include('../database-connection.php');

if(isset($_REQUEST['user_login'])){
    $username = $_REQUEST['user_name'];
    $useremail = $_REQUEST['user_email'];
    $userpassword = $_REQUEST['user_password'];
    $userconfirmpassword = $_REQUEST['user_confirm_password'];

    if($userpassword !== $userconfirmpassword){
        echo "<script>alert('The Passwords Do Not Match')</script>";
       } else{

        $sql = $con->prepare('insert into users(name,email,password) values (?,?,?)');
        $sql->bindParam(1,$username);
        $sql->bindParam(2,$useremail);
        $sql->bindParam(3,$userpassword);

        $sql->execute();

        header('location: ./login.php');


   }

}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/index.css">


    <title>Register</title>
</head>
<body>
    <div class="container">
        <div class="row main-section">
            <div class=" mt-5">
            <h2 class="main-heading">Register To <a class="main-heading-logo"> WOG </a></h1>

            <form class="mt-5" method="POST" >
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="user_name" >
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="user_email" >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="user_password">
                </div>
                <div class="mb-3">
                    <label for="confirm-password" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="confirm-password" name="user_confirm_password">
                </div>
                <input class="btn btn-large btn-transition" type="submit" name="user_login" value="Register">
                
                <p class="mt-4">Already Have An Account? <a href="./login.php">Click Here To Login</a></p>  
            </form>
            
            </div>
        </div>
    </div>
</body>
</html>