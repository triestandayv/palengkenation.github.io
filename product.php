<?php
    session_start();


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/7b1af0e4c6.js" crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet">
    <title>Home</title>
</head>
<body>
    <!--navigation-->
    <nav class="nav navbar nav-tabs navbar-expand-lg bg-light navbar-light text-white flex-column sticky-top">
        <div class="container pb-2">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"><span class="navbar-toggler-icon"></span></button>                    
            <a href="index.php" class="navbar-brand ms-2"><img class="img-fluid home-logo ms-5 ms-lg-0 me-2" src="assets/homepage/icon.png">Palengke Nation</a>
            <div class="d-flex">
                <?php if (isset($_SESSION['user_un'])) {?>
                    <?php echo "<small class='text-dark'>Welcome, ".$_SESSION['user_fname']."</small>";?>
                    <a href="logout.php" class="mx-3 text-success">Log Out</a>
                <?php } else { ?>
                <a href="login.php" class="mx-3" title="Log In"><i class="fa-sharp fa-solid fa-user fa-lg icon"></i></a>
                <?php }?>
                <a href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping fa-lg icon" title="Cart"></i></a>
            </div>
        </div>
        <div class="container">
            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav me-auto text-center">
                    <li class="nav-item"> <a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item dropdown"> <a href="categories.php" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"role="button">Products</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="categories/fruits.php">Fruits</a></li>
                            <li><a class="dropdown-item" href="categories/vegetables.php">Vegetables</a></li>
                            <li><a class="dropdown-item" href="categories/meat.php">Meat</a></li>
                            <li><a class="dropdown-item" href="categories/fish.php">Fish</a></li>
                            <li><a class="dropdown-item" href="categories/dry goods.php">Dry Goods</a></li>
                            <li><a class="dropdown-item" href="categories/condiments.php">Condiments</a></li>
                      </ul>
                    </li>
                    <li class="nav-item"> <a href="faq.php" class="nav-link">FAQ</a></li>
                    <?php if (isset($_SESSION['user_un'])) {?>
                    <li class="nav-item"> <a href="account.php" class="nav-link">Account</a></li>
                    <?php } else {}?>
                </ul>
            </div>
            <form action="search.php" method="GET" class="input-group searchbar">
                <input type="text" class="form-control" name="pdsearch" placeholder="Search Product" name="pdsearch">
                <button class="btn btn-success" type="submit" name="search" title="Search"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </form>
            
        </div>
    </nav>
    <!--showcase-->
    <section class="py-5">
        <div class="container-fluid">
            <div class="cover-image">
                <div class="p-3 overlay d-flex justify-content-center align-items-center flex-column text-center">
                    <h1 class="display-6">Fresh products everyday!</h1>
                    <p class="mx-5"> Offers wide selection of fresh produce to frozen goods palengke needs and grocery items.</p>
                    <a href="categories.php" class="btn btn-lg btn-success">Order now</a>
                </div>
            </div>
        </div>
    </section>
    <!--categories-->
    <section class="pt-5 text-center">
        <div class="container">
            <h2 class="pb-3"> Shop by Category</h2>
            <div class="row g-2">
                <div class="col-md-3 col-lg-2 col-6 text-white">
                    <div class="img-container">
                        <img src="assets/categories/fruits.jpg" alt="fruits" class="img-fluid">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <h3>Fruits</h3>
                            <a href="categories/fruits.php">
                                <div class="overlay-transition">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-2 col-6 text-white">
                    <div class="img-container">
                        <img src="assets/categories/vegetables.jpg" alt="vegetables" class="img-fluid">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <h3>Vegetables</h3>
                            <a href="categories/vegetables.php">
                                <div class="overlay-transition">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-2 col-6 text-white">
                    <div class="img-container">
                        <img src="assets/categories/meat.jpg" alt="meat" class="img-fluid">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <h3>Meat</h3>
                            <a href="categories/meat.php">
                                <div class="overlay-transition">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-2 col-6 text-white">
                    <div class="img-container">
                        <img src="assets/categories/seafood.jpg" alt="fish" class="img-fluid">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <h3>Fish</h3>
                            <a href="categories/fish.php">
                                <div class="overlay-transition">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-2 col-6 text-white">
                    <div class="img-container">
                        <img src="assets/categories/dry-goods.jpg" alt="dry goods" class="img-fluid">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <h3>Dry Goods</h3>
                            <a href="categories/dry goods.php">
                                <div class="overlay-transition">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-lg-2 col-6 text-white">
                    <div class="img-container">
                        <img src="assets/categories/condiment.jpg" alt="condiments" class="img-fluid">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <h3>Condiments</h3>
                            <a href="categories/condiments.php">
                                <div class="overlay-transition">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--products section-->
    <section class="py-5 text-center">
        <div class="container">
            <h2 class="pb-3"> Quick Pick Section</h2>
            <div class="row g-2 py-2">
                    <h4 class="py-2 bg-success text-white">Fruits</h4>
                <?php include "quickpickfruits.php"?>
                <div class="d-flex justify-content-center">
                    <a href="categories/fruits.php" class="btn btn-success my-3 w-25">View All</a>
                </div>
            </div>
            <div class="row g-2 py-2">
                    <h4 class="py-2 bg-success text-white">Vegetables</h4>
                <?php include "quickpickvegetables.php"?>
                <div class="d-flex justify-content-center">
                    <a href="categories/vegetables.php" class="btn btn-success my-3 w-25">View All</a>
                </div>
            </div>
            <div class="row g-2 py-2">
                    <h4 class="py-2 bg-success text-white">Meat</h4>
                <?php include "quickpickmeat.php"?>
                <div class="d-flex justify-content-center">
                    <a href="categories/meat.php" class="btn btn-success my-3 w-25">View All</a>
                </div>
            </div>
            <div class="row g-2 py-2">
                    <h4 class="py-2 bg-success text-white">Fish</h4>
                <?php include "quickpickfish.php"?>
                <div class="d-flex justify-content-center">
                    <a href="categories/fish.php" class="btn btn-success my-3 w-25">View All</a>
                </div>
            </div>
        </div>
    </section>
    <!--contact section-->
    <?php include "footer.php"?>