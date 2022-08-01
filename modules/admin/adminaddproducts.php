<?php 
include('../template/header.php'); 
require('../database-connection.php');


if(isset($_REQUEST['product_add'])){
    $productname = $_REQUEST['product_name'];
    $productprice = $_REQUEST['product_price'];
    $productdiscount = $_REQUEST['product_discount'];
    $productstock = $_REQUEST['product_stock'];
    $productcategoryid = $_REQUEST['product_category'];
    $productdescription = $_REQUEST['product_description'];
    $productimagename = $_FILES["product_image"]['name'];
    $productimagetype = $_FILES["product_image"]['type'];
    $productimagetmpname = $_FILES["product_image"]['tmp_name'];
    $productimagesize = $_FILES["product_image"]['size'];

    if($productimagesize < 5000000 ){
        if($productimagetype ==  'image/png'){
            move_uploaded_file($productimagetmpname, "../../upload/$productimagename");
            $sql = $con->prepare('insert into products(productname, productstock, productprice, productdiscount, productdescription, productcategoryid, productimage) values (?, ?, ?, ?, ?, ?, ?)');
            $sql->bindParam(1,$productname);
            $sql->bindParam(2,$productstock);
            $sql->bindParam(3,$productprice);
            $sql->bindParam(4,$productdiscount);
            $sql->bindParam(5,$productdescription);
            $sql->bindParam(6,$productcategoryid);
            $sql->bindParam(7,$productimagename);
        
            $sql-> execute();
        } else{
            echo "<script>alert('Please upload only png format images')</script>";
        }
    } else{
        echo "<script>alert('Please check the size of your image')</script>";
    }



    // $sql->bindParam(8,$userpicture);
}

// if(isset($_REQUEST['user_edit_image'])){
//     $userimagename = $_FILES["user_image"]['name'];
//     $userimagetype = $_FILES["user_image"]['type'];
//     $userimagetmpname = $_FILES["user_image"]['tmp_name'];
//     $userimagesize = $_FILES["user_image"]['size'];


//     if($userimagesize < 5000000 ){
//         if($userimagetype == 'image/png'){
//             $orignaluseremail = $_SESSION['user_email'];
//             move_uploaded_file($userimagetmpname, "../../upload/$userimagename");
//             $sql = $con->prepare('update users set userpicture = ? where useremail = ?');
//             $sql->bindParam(1,$userimagename);
//             $sql->bindParam(2,$orignaluseremail);
//             $sql-> execute();

//         } else{
//             echo "<script>alert('Please upload only png format images')</script>";
//         }
//     } else{
//         echo "<script>alert('Please check the size of your image')</script>";
//     }
// }

if(!isset($_SESSION['admin_email'])){
    ?>
    <script>
        location.href = '../registration/login.php';
    </script>
    <?php
}
?>


<div class="container-xl px-4 mt-4">
<h2 class="text-center">Add Product</h1>

    <hr class="mt-0 mb-4">
    <div class="row">
    <div class="col-xl-4">

    <form action="" method="POST" enctype="multipart/form-data">

        <!-- Profile picture card-->
            <div class="card mb-4 mb-xl-0">
                <div class="card-header">Add Product's Image</div>
                <div class="card-body text-center">
                    <!-- Profile picture help block-->
                    <div class="small font-italic text-muted mb-4">Upload An Image Below 5MB</div>
                    <!-- Profile picture upload button-->
                    <input type="file" class="form-control form-control-lg" name="product_image" required>
                </div>
            </div>

    
        
            
        </div>
        <div class="col-xl-8">
            <!-- Account details card-->
            <div class="card mb-4">
                <div class="card-header">Add Product's Details</div>
                <div class="card-body">
                        <div class="row gx-3 mb-3">
                            <!-- Form Group (first name)-->
                            <div class="col-md-12">
                                <label class="small mb-1" for="product_name">Product Name</label>
                                <input class="form-control" id="product_name" type="text" placeholder="Enter product's name" name="product_name" required >
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">

                            <div class="col-md-6">
                                <label class="small mb-1" for="product_price">Product Price</label>
                                <input class="form-control" id="product_price" type="number" placeholder="Enter product's price" name="product_price" required>
                            </div>

                            <div class="col-md-6">
                                <label class="small mb-1" for="product_discount">Product Discount</label>
                                <input class="form-control" id="product_discount" type="number" placeholder="Enter product's discount" name="product_discount" required>
                            </div>
                        </div>

                        <div class="row gx-3 mb-3">

                        <div class="col-md-6">
                                <label class="small mb-1" for="product_stock">Product Stock</label>
                                <input class="form-control" id="product_stock" type="number" placeholder="Enter product's stock" name="product_stock" required>
                            </div>

                        <div class="col-md-6">
                        <label class="small mb-1" for="product_category">Product Category</label>
                            <select  required class="form-select " id="product_category"  name="product_category" >
                            <option selected disable>Categories</option>
                                <?php
                                    $query = $con->prepare('select * from category');
                                    $query->execute();
                                    $record = $query->fetchAll(PDO::FETCH_OBJ);
                                    foreach($record as $row){
                                        ?>
                                        <option value=" <?php echo $row->categoryid; ?>"> <?php echo $row->categoryname ?> </option>
                                        <?php
                                    }
                                ?>
                                
                            </select>
                        </div>
                            
                        </div>
                        <div class="row gx-3 mb-3">
                            <div class="col-md-12">
                            <div class="mb-3">
                                <label for="product_description" class="form-label">Product Description</label>
                                <textarea class="form-control" id="product_description" name="product_description" rows="5" maxlength="1500"></textarea>
                            </div>
                            </div>
                        </div>


                        <div class="row">
                        <div class="col-md-3">
                        <input class="btn btn-primary form-control" type="submit" name="product_add"  value="Add Product"required />

                        </div>

                        <?php
                        if(isset($_POST['product_add'])){
                                    echo '<div class="success alert-success col-9" role="alert">
                                    Your Product Has Been Added!
                                    </div>';
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