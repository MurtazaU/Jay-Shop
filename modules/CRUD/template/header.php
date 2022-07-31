<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>WOG: World Of Games</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="../../assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="../../assets/img/favicon.ico">

    <!-- <link rel="stylesheet" href="./assets/css/bootstrap.min.css"> -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/templatemo.css">
    <link rel="stylesheet" href="../../assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="./assets/css/fontawesome.min.css">

   
    <?php 
        $page_url = $_SERVER['REQUEST_URI'];
        if(strpos($page_url, 'contact.php')){
            ?>
            <!-- Load map styles -->
            <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <?php
}
    ?>

<!--
    
Completed By Murtaza Usmani

-->
</head>

<body>
    <!-- Start Top Nav -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-light d-none d-lg-block" id="templatemo_nav_top">
        <div class="container text-light">
            <div class="w-100 d-flex justify-content-between">
                <div>
                    <i class="fa fa-envelope mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="mailto:info@company.com">info@company.com</a>
                    <i class="fa fa-phone mx-2"></i>
                    <a class="navbar-sm-brand text-light text-decoration-none" href="tel:010-020-0340">010-020-0340</a>
                </div>
                <div>
                    <a class="text-light" href="#" target="_blank" rel="sponsored"><i class="fab fa-facebook-f fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="#" target="_blank"><i class="fab fa-instagram fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="#" target="_blank"><i class="fab fa-twitter fa-sm fa-fw me-2"></i></a>
                    <a class="text-light" href="#" target="_blank"><i class="fab fa-linkedin fa-sm fa-fw"></i></a>
                </div>
            </div>
        </div>
    </nav>
    <!-- Close Top Nav -->


    <!-- Header -->
    <nav class="navbar navbar-expand-lg navbar-light shadow">
        <div class="container d-flex justify-content-between align-items-center">

            <a class="navbar-brand text-success logo h1 align-self-center" href="index.html">
            WOG
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#templatemo_main_nav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="align-self-center collapse navbar-collapse flex-fill  d-lg-flex justify-content-lg-between" id="templatemo_main_nav">
                <div class="flex-fill">
                    <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../../index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../about.php">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../shop.php">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../../contact.php">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="navbar align-self-center d-flex">
                    <div class="d-lg-none flex-sm-fill mt-3 mb-4 col-7 col-sm-auto pr-3">
                        <div class="input-group">
                            <input type="text" class="form-control" id="inputMobileSearch" placeholder="Search ...">
                            <div class="input-group-text">
                                <i class="fa fa-fw fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <a class="nav-icon d-none d-lg-inline" href="#" data-bs-toggle="modal" data-bs-target="#templatemo_search">
                        <i class="fa fa-fw fa-search text-dark mr-2"></i>
                    </a>
                    <a class="nav-icon position-relative text-decoration-none" href="#">
                        <i class="fa fa-fw fa-cart-arrow-down text-dark mr-1"></i>
                        <span class="position-absolute top-0 left-100 translate-middle badge rounded-pill bg-light text-dark">7</span>
                    </a>
                    <?php 
                    if(isset($_SESSION['user_email'])){
?>
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="user-profile" data-bs-toggle="dropdown" aria-expanded="false">
                            Profile
                        </button>
                        <ul class="dropdown-menu" aria-labelledby="user-profile">
                            <li><a class="dropdown-item" href="./edit.php">Edit Profile</a></li>
                            <li><a class="dropdown-item" href="#">Settings</a></li>
                            <li><a class="dropdown-item" href="#">Security</a></li>
                            <li><a class="dropdown-item" href="#">Updates</a></li>
                            <li><a class="dropdown-item" href="../modules/logout.php">Log Out</a></li>
                        </ul>
                    </div>
                    <?php
                    } else{
                        ?>
                            <ul class="nav navbar-nav d-flex justify-content-between mx-lg-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="../modules/registration/register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../modules/registration/login.php">Login</a>
                        </li>
                    </ul>
                        <?php
                    }
                    ?>
                </div>
            </div>       <div>
                    
                
                </div>

        </div>
    </nav>
    <!-- Close Header -->