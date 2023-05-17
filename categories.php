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
    <title>Categories</title>
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
                    <li class="nav-item"> <a href="index.html" class="nav-link active">Home</a></li>
                    <li class="nav-item dropdown"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"role="button">Products</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../categories/fruits.html">Fruits</a></li>
                            <li><a class="dropdown-item" href="../categories/vegetables.html">Vegetables</a></li>
                            <li><a class="dropdown-item" href="../categories/meat.html">Meat</a></li>
                            <li><a class="dropdown-item" href="../categories/fish.html">Fish</a></li>
                            <li><a class="dropdown-item" href="../categories/dry goods.html">Dry Goods</a></li>
                            <li><a class="dropdown-item" href="../categories/condiments.html">Condiments</a></li>
                      </ul>
                    </li>
                    <li class="nav-item"> <a href="#" class="nav-link">FAQ</a></li>
                    <?php if (isset($_SESSION['user_un'])) {?>
                    <li class="nav-item"> <a href="account.php" class="nav-link">Account</a></li>
                    <?php } else {}?>
                </ul>
            </div>
            <form action="search.php" method="GET" class="input-group searchbar">
                <input type="text" class="form-control" placeholder="Search Product" name="pdsearch">
                <button class="btn btn-success" type="submit" title="Search" name="search"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </form>
            
        </div>
    </nav>
    <!--categories-->
    <section class="py-5 text-center">
        <div class="container">
            <h2 class="pb-3"> CATEGORIES</h2>
            <div class="row g-2">
                <div class="col-md-4 col-6 text-white">
                    <div class="img-container">
                        <img src="assets/categories/fruits.jpg" alt="image of a fruit" class="img-fluid">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <h3>Fruits</h3>
                            <a href="categories/fruits.php">
                                <div class="overlay-transition">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6 text-white">
                    <div class="img-container">
                        <img src="assets/categories/vegetables.jpg" alt="image of a vegetable" class="img-fluid">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <h3>Vegetables</h3>
                            <a href="categories/vegetables.php">
                                <div class="overlay-transition">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6 text-white">
                    <div class="img-container">
                        <img src="assets/categories/meat.jpg" alt="image of a meat" class="img-fluid">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <h3>Meat</h3>
                            <a href="categories/meat.php">
                                <div class="overlay-transition">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6 text-white">
                    <div class="img-container">
                        <img src="assets/categories/seafood.jpg" alt="image of fishes" class="img-fluid">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <h3>Fish</h3>
                            <a href="categories/fish.php">
                                <div class="overlay-transition">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6 text-white">
                    <div class="img-container">
                        <img src="assets/categories/dry-goods.jpg" alt="image of eggs" class="img-fluid">
                        <div class="overlay d-flex justify-content-center align-items-center">
                            <h3>Dry Goods</h3>
                            <a href="categories/dry goods.php">
                                <div class="overlay-transition">
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-6 text-white">
                    <div class="img-container">
                        <img src="assets/categories/condiment.jpg" alt="image of spices" class="img-fluid">
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
    <!--contact section-->
    <?php include "footer.php"?>