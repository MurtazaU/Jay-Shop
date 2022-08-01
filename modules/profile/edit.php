<?php 
include('../template/header.php'); 
require('../database-connection.php');


if(isset($_REQUEST['user_edit_submit'])){
    $orignaluseremail = $_SESSION['user_email'];
    $username = $_REQUEST['user_name'];
    $userstreet = $_REQUEST['user_street_address'];
    $usercountry = $_REQUEST['user_country'];
    $useremail = $_REQUEST['user_email'];
    $usernumber = $_REQUEST['user_number'];
    $userdob = $_REQUEST['user_dob'];
    $userpassword = $_REQUEST['user_password'];

    $sql = $con->prepare('update users set username = ?, useremail = ?, userpassword = ?, userstreet = ?, usercountry = ?, usernumber = ?, userdob = ? where useremail = ?');
    $sql->bindParam(1,$username);
    $sql->bindParam(2,$useremail);
    $sql->bindParam(3,$userpassword);
    $sql->bindParam(4,$userstreet);
    $sql->bindParam(5,$usercountry);
    $sql->bindParam(6,$usernumber);
    $sql->bindParam(7,$userdob);
    $sql->bindParam(8,$orignaluseremail);

    $sql-> execute();
    // $sql->bindParam(8,$userpicture);
}

if(isset($_REQUEST['user_edit_image'])){
    $userimagename = $_FILES["user_image"]['name'];
    $userimagetype = $_FILES["user_image"]['type'];
    $userimagetmpname = $_FILES["user_image"]['tmp_name'];
    $userimagesize = $_FILES["user_image"]['size'];


    if($userimagesize < 5000000 ){
        if($userimagetype == 'image/png'){
            $orignaluseremail = $_SESSION['user_email'];
            move_uploaded_file($userimagetmpname, "../../upload/$userimagename");
            $sql = $con->prepare('update users set userpicture = ? where useremail = ?');
            $sql->bindParam(1,$userimagename);
            $sql->bindParam(2,$orignaluseremail);
            $sql-> execute();

        } else{
            echo "<script>alert('Please upload only png format images')</script>";
        }
    } else{
        echo "<script>alert('Please check the size of your image')</script>";
    }
}




?>
<div class="container-xl px-4 mt-4">
    <hr class="mt-0 mb-4">
    <div class="row">
    <div class="col-xl-4">


    <form action="" method="POST" enctype="multipart/form-data">
        <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Update Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="../../upload/<?php
                    echo '';
                    ?> " alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">Upload An Image Below 5MB</div>
                    <!-- Profile picture upload button-->
                    <input type="file" class="form-control form-control-lg" name="user_image">
                    <button class="btn btn-primary mt-3 w-50 form-control" type="submit" name="user_edit_image" >Upload Image </button>
                </div>
            </div>
    </form>
    
        
            
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Update Account Details</div>
                <div class="card-body">
                    <form method="POST" action="">
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="user_name">Full Name</label>
                                <input class="form-control" id="user_name" type="text" placeholder="Enter your full name" name="user_name" required >
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Address)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="user_street_address">Street Address</label>
                                <input class="form-control" id="user_street_address" type="text" placeholder="Enter your street address" name="user_street_address" required>
                            </div>
                            <!-- Form Group (Country)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="user_country">Country</label>
                                <input class="form-control" id="user_country" type="text" placeholder="Enter your country" name="user_country" required>
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="user_email">Email address</label>
                            <input class="form-control" id="user_email" type="email" placeholder="Enter your email address" name="user_email" required>
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="user_number">Phone number</label>
                                <input class="form-control" id="user_number" type="tel" placeholder="Enter your phone number" name="user_number" required>
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="user_dob">Date Of Birth</label>
                                <input class="form-control" id="user_dob" type="date" name="user_dob" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <!-- Form Group (Password)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="user_password">Password</label>
                                <input class="form-control" id="user_password" type="password" placeholder="Enter your password" name="user_password" required>
                            </div>
                            <div class="col-md-6">
                                <label class="small mb-1" for="user_confirm_password">Confirm Password</label>
                                <input class="form-control" id="user_confirm_password" type="password" placeholder="Confirm your password" name="user_confirm_password" required>
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <div class="row">
                        <div class="col-md-3">
                        <input class="btn btn-primary form-control" type="submit" name="user_edit_submit"  value="Save changes"required />

                        </div>

                        <?php
                        if(isset($_POST['user_edit_submit'])){
                                if($_REQUEST['user_password'] !== $_REQUEST['user_confirm_password']){
                                    echo '<div class="alert alert-danger col-9" role="alert">
                                    Please check your password
                                    </div>';
                                } else{
                                    echo '<div class="success alert-success col-9" role="alert">
                                    Your Details Have Been Updated!
                                    </div>';
                                    // updateProfile();
                                }
                            ?>
                                
                                
                            <?php
                            
                            }
                        
                        ?>
                       

                        </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
include('../template/footer.php');
?>