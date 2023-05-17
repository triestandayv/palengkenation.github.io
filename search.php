<?php include "searchsql.php";?>
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
    <title>Search</title>
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
                    <li class="nav-item"> <a href="index.php" class="nav-link">Home</a></li>
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
        </div>
    </nav>
    <section class="py-5">
        <div class="container">
            <div class="container text-center">
            <form action="<?php echo ($_SERVER['PHP_SELF'])?>" method="GET" class="input-group">
                <input type="text" class="form-control" name="pdsearch" placeholder="Search for a product">
                <button class="btn btn-success" type="submit" name="search"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </form>
            </div>
            <div class="row g-2 mt-5">
                <?php if($results) :?>
                    <h4 class="text-center"><?php echo 'Showing results for "'.$pdsearch.'"' ?></h4>
                <?php foreach($row as $item) :?>
                    <div class="col-md-3 col-lg-2 col-6">
                    <div class="card">
                        <img src="<?php echo str_replace(array('../'), '',$item["Image"])?>" class="card-img-top img-fluid" alt="fruits">
                        <div class="card-body">
                            <h3 class="h6 text-center fw-bold"> <?php echo $item['Name']?></h3>
                            <p class="card-text text-center"> ₱<?php echo $item['Price']?> </p>
                            <button class="btn w-100 btn-success">View</button>
                        </div>
                    </div>
                </div>
                <?php endforeach?>
                <?php else : ?>
                    <?php echo $showresult?>
                    <?php echo $noresult?>
                <?php endif ?>
            </div>
        </div>
    </section>
    <!--contact section-->
<?php include "footer.php"?>