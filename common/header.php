<?php session_start(); ?>
<?php
include("db.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volunteer Network</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="resources/style.css" />
</head>

<body class="bg-light">

    <nav class="bg-light">
        <div class="container-fluid">
            <div class="d-flex align-items-center justify-content-between p-1">
                <div>
                    <a href="#" class="text-dark"><i class="fa-brands fa-facebook"></i></a>
                    <a href="#" class="text-dark"><i class="fa-brands fa-linkedin"></i></a>
                    <a href="#" class="text-dark"><i class="fa-brands fa-square-twitter"></i></a>
                    <a href="#" class="text-dark"><i class="fa-brands fa-square-instagram"></i></a>
                </div>
                <div>
                    <?php
                    if (isset($_SESSION["email"])) {
                    ?>
                        <div class="dropdown">
                            <a class="text-success fw-bold" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false"><i class="fa-regular fa-user"></i> <?= $_SESSION["name"] ?></a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                <li class="border-bottom"><a class="dropdown-item" href="/volunteer_network/volunteer_profile.php">Profile</a></li>
                                <li><a class="dropdown-item" href="/volunteer_network/logout.php">Logout</a></li>
                            </ul>
                        </div>
                    <?php
                    } else {
                    ?>
                        <a class="text-dark fw-bold" href="/volunteer_network/login.php"><i class="fa-regular fa-user"></i> Login</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </nav>

    <nav class="navbar custom-nav-bg navbar-expand-lg text-white">
        <div class="container-fluid">
            <a class="navbar-brand text-white" href="/volunteer_network">Volunteer</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="/volunteer_network">Home</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn custom-nav-search-btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>