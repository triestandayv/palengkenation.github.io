<?php include 'config.php';

    $userErr = $passErr = '';
    if(isset($_POST['submit'])){
        $user =  htmlspecialchars($_POST['user']);
        $pass = htmlspecialchars($_POST['pass']);

    $select = "SELECT * FROM accounts WHERE user = '$user'";
    $result = mysqli_query($conn, $select);
    
    if(mysqli_num_rows($result)> 0){
       $row = mysqli_fetch_assoc($result);
       $storedhash = $row['pass'];

       if($row['user'] == 'admin' AND $row['pass'] == 'admin'){

        session_start();
        $_SESSION['admin_name'] = $row['fname'];
        header('location: admin/addproduct.php');
    
       } else {
        if(password_verify($pass, $storedhash)) {

            session_start();
            $_SESSION['loggedIn'] == true;
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_fname'] = $row['fname'];
            $_SESSION['user_lname'] = $row['lname'];
            $_SESSION['user_un'] = $row['user'];
            $_SESSION['phone'] = $row['phone'];
            header('location:index.php');
        } else {
            $passErr = "Password is incorrect.";
        }
        
       }
    } else {
        $userErr = "Username is incorrect.";
       }

};

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
    <title>Log In</title>
</head>
<body class="d-flex flex-column">
    <!--navigation-->
    <nav class="nav navbar nav-tabs navbar-expand-lg bg-light navbar-light text-white flex-column">
        <div class="container pb-2">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"><span class="navbar-toggler-icon"></span></button>                    
            <a href="index.php" class="navbar-brand ms-2"><img class="img-fluid home-logo ms-5 ms-lg-0 me-2" src="assets/homepage/icon.png">Palengke Nation</a>
            <div class="d-flex">
                <a href="login.php" class="mx-3" title="Log In"><i class="fa-sharp fa-solid fa-user fa-lg icon"></i></a>
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
    <!--login section-->
    <section class="py-5 section-cover">
        <div class="container d-flex justify-content-between h-100">
            <div class="container flex-lg-grow-1 text-white d-none d-md-flex flex-column justify-content-center">
                <h1 class="display-4">
                    Your Gateway to Seamless Shopping
                </h1>
                <p class="lead">
                    Get ready to experience the best of e-commerce right at your fingertips.
                </p>
            </div>
            <div class="container flex-grow-1 w-50 bg-white rounded d-flex flex-column text-center justify-content-around">
                <h3>LOG IN</h3>   
                <form action="<?php echo ($_SERVER['PHP_SELF'])?>" method="POST" class="d-flex flex-column align-items-stretch my-2">
                        <input type="text" class="form-control w-100 <?php echo $userErr ? 'is-invalid' : null;?>" placeholder="Username" name="user" required>
                        <div class="invalid-feedback">
                            <?php echo $userErr?>
                        </div>
                        <input type="password" class="form-control w-100 mt-3 <?php echo $passErr ? 'is-invalid' : null;?>" placeholder="Password" id="password" name="pass" required>
                        <div class="invalid-feedback">
                            <?php echo $passErr?>
                        </div>
                        <div class="mt-2 mb-3 d-flex ms-1">
                        <input type="checkbox" class="form-check" id="togglePassword"><label for="togglePassword" class="ms-2">Show Password</label>
                        </div>
                    <input type="submit" class="btn btn-warning" value="Sign In" name="submit">
                </form>
                <div>
                <a href="#" class="d-block">Forgot your password?</a>
                <a href="signup.php">Create account</a>
                </div>
            </div>
        </div>
    </section>
    <!--contact section-->
    <section class="pt-5 pb-2 pb-md-5 bg-dark text-white text-center text-md-start">
        <div class="container">
        <div class="d-md-flex justify-content-between">
            <div class="container">
                <h3> NAVIGATION </h3>
                <div class="list-group-flush">
                    <a href="categories.php" class="list-group-item">All Categories</a>
                    <a href="search.php" class="list-group-item">Search</a>
                    <a href="#" class="list-group-item">Refund Policy</a>
                    <a href="#" class="list-group-item">Terms of Service</a>
                    <a href="#" class="list-group-item">Shipping Policy</a>
                </div>
            </div>
            <div class="container my-5 my-md-0">
                <div class="text-center">
                <h3> WHERE TO REACH US</h3>
                <a href="https://www.facebook.com" class="mx-3"><i class="fa-brands fa-square-facebook fa-2xl"></i></a>
                <a href="https://www.instagram.com"><i class="fa-brands fa-square-instagram fa-2xl"></i></a>
                </div>
            </div>
            <div class="container my-5 my-md-0">
                <h3 class="text-center mb-3">OUR NEWSLETTER</h3>
                    <form class="input-group d-flex">
                        <input type="email" class="form-control" placeholder="Email Address">
                        <button type="button" class="btn btn-primary">Subscribe</button>
                    </form>
            </div>
        </div>
        </div>
    </section>
    <!--footer-->
    <footer class="pb-1 bg-dark text-white">
        <div class="container">
        <small>&copy; Online Palengke . Powered by <a href="https://getbootstrap.com/" target="_blank" class="text-decoration-none">Bootstrap 5</a></small>
        </div>  
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script>
        const pass = document.querySelector("#password");
        const togglePass = document.querySelector("#togglePassword");
        togglePass.addEventListener("click", function() {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
        });
    </script>
</body>
</html>