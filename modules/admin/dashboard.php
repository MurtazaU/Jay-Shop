<?php 
include('../template/header.php');

include('../database-connection.php');

$sql = $con->prepare('select * from users');
$sql->execute();
$count = $sql->rowCount();
$record = $sql->fetchAll(PDO::FETCH_OBJ);



// echo "<pre>";
// print_r($record);
// echo "</pre>";

?>

<section style="background-color: #eee;">
  <div class="container py-5 h-100">
  <form action="" method="POST">
  <div class="row d-flex h-100">
    
    <?php
      foreach($record as $row){                        
        ?>
        <div class="col-3 mb-5">
      <div class="card" style="border-radius: 15px;">
        <div class="card-body text-center">
          <div class="mt-3 mb-4">
            <img src="../../upload/<?php echo $row->userpicture;?>"
              class="rounded-circle img-fluid" style="width: 100px; height:100px;" />
          </div>
          <h2 class="mb-2"> <?php echo $row->username ?> </h4>
          <p class="text-muted mb-4"> <?php echo $row->useremail ?> </p>
          <p class="mb-2">Street Address : <?php echo $row->userstreet?></p>
          <p class="mb-2">Country : <?php echo $row->usercountry ?></p>
          <p class="mb-2">Date Of Birth : <?php echo $row->userdob ?></p>
          <p class="mb-2">Phone Number : <?php echo $row->usernumber ?></p>
        </div>
      </div>
    </div>
    <?php } ?>
  </div>
  </form>
    
  </div>
</section>

<?php 
include('../template/footer.php');

?>