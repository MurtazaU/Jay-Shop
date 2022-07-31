<?php 
include('../database-connection.php');

if(isset($_REQUEST['user_login'])){
    $useremail = $_REQUEST['user_email'];
    $userpassword = $_REQUEST['user_password'];


        $sql = $con->prepare('select * from users where email = ? && password = ?');
        $sql->bindParam(1,$useremail);
        $sql->bindParam(2,$userpassword);

        $sql->execute();

        $count = $sql->rowCount();
        echo $count;


        if($count == 0){
            echo "<script>alert('Invalid Credentials')</script>";
        }
        else{
            $_SESSION['user_email'] = $useremail;
            header('location: ../../index.php');

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


    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="row main-section">
            <div class=" mt-5">
                <h2 class="main-heading">Login To <a class="main-heading-logo"> WOG </a></h1>
            <form class="mt-5">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="user_email" >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="user_password">
                </div>
                <input class="btn btn-large btn-transition" type="submit" name="user_login" value="LogIn">

                <p class="mt-4">Don't Have An Account? <a href="./register.php">Click Here To Register</a></p>  
            </form>
            </div>
        </div>
    </div>
</body>
</html>