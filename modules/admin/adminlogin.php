<?php 
include('../database-connection.php');

if(isset($_REQUEST['user_login'])){
    $useremail = $_REQUEST['user_email'];
    $userpassword = $_REQUEST['user_password'];


        $sql = $con->prepare('select * from admin where adminemail = ? && adminpassword = ?');
        $sql->bindParam(1,$useremail);
        $sql->bindParam(2,$userpassword);

        $sql->execute();

        $count = $sql->rowCount();


        if($count == 0){
            echo "<script>alert('Invalid Credentials')</script>";
        }
        else{
            $_SESSION['user_email'] = $useremail;
            header('location: ./dashboard.php');
        }



}

?>

<?php
    include('../template/header.php'); 
?>
<link rel="stylesheet" href="../registration/css/index.css">

    <div class="container">
        <div class="row main-section col-6">
            <div class=" mt-5">
                <h2 class="main-heading">Login As An Admin</a></h1>
            <form class="mt-5" method="POST">
                <div class="mb-3">
                    <label for="email" class="form-label">Email address</label>
                    <input type="email" class="form-control" id="email" name="user_email" >
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="user_password">
                </div>
                <input class="btn btn-large btn-transition" type="submit" name="user_login" value="LogIn">

                <!-- <p class="mt-4">Don't Have An Account? <a href="./register.php">Click Here To Register</a></p>   -->
            </form>
            </div>
        </div>
    </div>

<br>
<br>
    <?php include('../template/footer.php'); ?>