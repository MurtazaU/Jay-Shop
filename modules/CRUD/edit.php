
<?php include('./template/header.php'); ?>
<div class="container-xl px-4 mt-4">

    <hr class="mt-0 mb-4">
    <div class="row">
        <div class="col-xl-4">
            <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Profile Picture</div>
                <div class="card-body text-center">
                    <!-- Profile picture image-->
                    <img class="img-account-profile rounded-circle mb-2" src="" alt="">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">Please Upload An Image Below 5MB</div>
                    <!-- Profile picture upload button-->
                    <input type="file" class="form-control form-control-lg">
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Account Details</div>
                <div class="card-body">
                    <form>
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="user_name">Full Name</label>
                                <input class="form-control" id="user_name" type="text" placeholder="Enter your full name" name="user_name" >
                            </div>
                        </div>
                        <!-- Form Row        -->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (Address)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="user_address">Street Address</label>
                                <input class="form-control" id="user_address" type="text" placeholder="Enter your street address" name="user_street_address">
                            </div>
                            <!-- Form Group (Country)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="user_country">Country</label>
                                <input class="form-control" id="user_country" type="text" placeholder="Enter your country" name="user_country">
                            </div>
                        </div>
                        <!-- Form Group (email address)-->
                        <div class="mb-3">
                            <label class="small mb-1" for="user_email">Email address</label>
                            <input class="form-control" id="user_email" type="email" placeholder="Enter your email address" name="user_email">
                        </div>
                        <!-- Form Row-->
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (phone number)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="user_number">Phone number</label>
                                <input class="form-control" id="user_number" type="tel" placeholder="Enter your phone number" name="user_number">
                            </div>
                            <!-- Form Group (birthday)-->
                            <div class="col-md-6">
                                <label class="small mb-1" for="user_dob">Date Of Birth</label>
                                <input class="form-control" id="user_dob" type="date" name="user_dob">
                            </div>
                        </div>
                        <!-- Save changes button-->
                        <button class="btn btn-primary" type="button" name="user_edit">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php 
include('./template/footer.php');
?>