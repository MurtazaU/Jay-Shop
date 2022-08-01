<!-- Header Link -->
<?php 
include('../template/header.php');
include('../database-connection.php');

$sql = $con->prepare('select * from users where useremail = ?');
$sql->bindParam(1, $_SESSION['user_email']);
$sql->execute();
$count = $sql->rowCount();
$record = $sql->fetchAll(PDO::FETCH_OBJ);

// echo "<pre>";
// print_r($record);
// echo "</pre>";


?>

<section style="background-color: #eee;">
  <div class="container py-5">
    <h2 class="text-center">Admin Profile</h1>
    <?php
        foreach($record as $row)
        {                        
    ?>
    <div class="row">
      <div class="col-lg-4">
        <div class="card h-100 mb-4">
          <div class="card-body text-center">

            <img src="../../upload/<?php echo $row->userpicture;?>" alt="Profile-Picture"
              class="img-fluid" style="width: 250px; height:250px;   border-radius: 50%;">
            <div class="text-center mt-5">
            <a href="./edit.php"> <button type="button" class="btn text-white btn-primary text-decoration-none"> Edit Account </button> </a>
            <a href="./delete.php"> <button type="button" class="btn text-white btn-danger text-decoration-none"> Delete Account </button> </a>
            </div>
           
          </div>
        </div>

      </div>
      <div class="col-lg-8">
        <div class="card h-100 mb-4">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Full Name</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"> <?php echo $row->username ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Email</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row->useremail ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Phone Number</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row->usernumber ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Street Address</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row->userstreet ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Country</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row->usercountry ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">DOB</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row->userdob ?></p>
              </div>
            </div>
            <hr>
            <div class="row">
              <div class="col-sm-3">
                <p class="mb-0">Country</p>
              </div>
              <div class="col-sm-9">
                <p class="text-muted mb-0"><?php echo $row->usercountry ?></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <?php
        }                      
    ?>

  </div>
</section>


<?php

include('../template/footer.php');
?>