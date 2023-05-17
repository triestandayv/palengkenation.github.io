<?php include "config.php";
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
    <title>My Cart</title>
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
                    <li class="nav-item dropdown"> <a href="categories.html" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"role="button">Products</a>
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
                    <li class="nav-item"> <a href="#" class="nav-link">Account</a></li>
                </ul>
            </div>
            <form action="search.php" method="GET" class="input-group searchbar">
                <input type="text" class="form-control" placeholder="Search Product" name="pdsearch">
                <button class="btn btn-success" type="submit" title="Search" name="search"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </nav>
<section>
    <div class="container">
        <h1 class="ms-2 my-5">My Cart</h1>
        <table class="table table-striped">
            <thead class="text-center">
                <tr>
                    <th scope="col">
                        Image
                    </th>
                    <th scope="col">
                        Product
                    </th>
                    <th scope="col">
                        Price
                    </th>
                    <th scope="col">
                        Quantity
                    </th>
                    <th scope="col">
                        Total
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($products)): ?>
                <tr>
                    <td colspan="5" style="text-align:center;">You have no products added in your Shopping Cart</td>
                </tr>
                <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                    <td>
                        <img src="<?=str_replace(array('../'), '',$item["Image"])?>" width="50" height="50" alt="<?=$product['Name']?>">
                    </td>
                    <td>
                        <a href="#"><?=$product['Name']?></a>
                        <br>
                        <a href="index.php?page=cart&remove=<?=$product['ID']?>" class="remove">Remove</a>
                    </td>
                    <td class="price"><?=$product['Price']?></td>
                    <td class="quantity">
                        <input type="number" name="quantity-<?=$product['ID']?>" value="<?=$products_in_cart[$product['ID']]?>" min="1" max="<?=$product['Quantity']?>" placeholder="Quantity" required>
                    </td>
                    <td class="price">&dollar;<?=$product['Price'] * $products_in_cart[$product['ID']]?></td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <table>
            <tr></tr>
        </table>
    </div>
</section>
<?php include "footer.php"?>