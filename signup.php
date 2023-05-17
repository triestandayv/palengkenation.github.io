<?php include 'config.php';

$userErr = $passErr = '';
$success = '';
if(isset($_POST['submit'])){

    $fname = htmlspecialchars($_POST['fname']);
    $lname = htmlspecialchars($_POST['lname']);;
    $user =  htmlspecialchars($_POST['user']);;
    $pass =  htmlspecialchars($_POST['password']);
    $conpass = htmlspecialchars($_POST['conpass']);
    $phone = htmlspecialchars($_POST['phone']);
    $hashed_pass = password_hash($pass, PASSWORD_DEFAULT);

    $select = "SELECT * FROM accounts WHERE user = '$user'";
    $result = mysqli_query($conn, $select);

    if(mysqli_num_rows($result) > 0){
        $userErr = "Username already exists. Please enter a different one.";
    }else{
        if($pass != $conpass){  
            $passErr = "Passwords did not match. Try again.";

        } else{
            $insert = "INSERT INTO accounts(fname, lname, user, pass, phone) VALUES('$fname','$lname' ,'$user', '$hashed_pass','$phone' )"; 
            $results = mysqli_query($conn, $insert);
            if ($results == TRUE) {
                $success = TRUE;
            }
        }
    }
    mysqli_close($conn);
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
    <title>Sign Up</title>
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
            <form action="search.php" method="GET" class="input-group searchbar">
                <input type="text" class="form-control" placeholder="Search Product" name="pdsearch">
                <button class="btn btn-success" type="submit" name="search" title="Search"><i class="fa-sharp fa-solid fa-magnifying-glass"></i></button>
            </form>
        </div>
    </nav>
    <!--signup section-->
    <section class="section-cover py-md-5 vh-100">
        <div class="container">
            <div class="row mt-4">
                <div class="col-lg-2">
                </div>
                <div class="col-lg-8">
                    <?php if($success) {?>
                        <div class="alert alert-success text-center" role="alert">
                            You have successfully signed up! <a href="login.php">Log In</a> now.
                        </div>
                    <?php } else {?>
                    <form action="<?php echo ($_SERVER['PHP_SELF'])?>" method="POST" class="bg-light shadow-lg p-5">
                        <h3 class="mb-3 text-center">CREATE ACCOUNT</h3>
                        <div class="row g-3 mt-2">
                            <div class="col-md-6">
                                <input type="firstname" name="fname" class="form-control" placeholder="First Name" required>
                            </div>
                            <div class="col-md-6">
                                <input type="lastname" name="lname" class="form-control" placeholder="Last Name" required>
                            </div>
                            <div class="col-12">
                                <input type="user" name="user" class="form-control <?php echo $userErr ? 'is-invalid' : null;?>" placeholder="Username" minlength="4" maxlength="14" required>
                                <div class="invalid-feedback">
                                    <?php echo $userErr;?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="password"  class="form-control passwords" placeholder="Password" required>
                            </div>
                            <div class="col-md-6">
                                <input type="password" name="conpass" class="form-control passwords <?php echo $passErr ? 'is-invalid' : null;?>" placeholder="Confirm pasword" required>
                                <div class="invalid-feedback">
                                    <?php echo $passErr;?>
                                </div>
                            </div>
                            <div class="mt-2 d-flex ms-1">
                                    <input type="checkbox" class="form-check" id="togglePassword"><label for="togglePassword" class="ms-2">Show Password</label>
                                </div>
                            <div class="col-12">
                                <input type="phonenumber" name="phone" class="form-control" placeholder="PhoneNumber" maxlength="11" required>
                            </div>
                            <div class="col-12 ">
                                <input  type="submit" name="submit" class="btn btn-warning w-100" value="Sign Up">
                            </div>
                        </div>
                            <p class="mt-3 text-center">Already have an account?<a href="login.php"> Log In </a></p>
                    </form>
                    <?php }?>
                </div>
                <div class="col-lg-2">
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
                    <a href="#" class="list-group-item">All Categories</a>
                    <a href="#" class="list-group-item">Search</a>
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
    const passwords = document.querySelectorAll(".passwords");
    const togglePass = document.querySelector("#togglePassword");
    togglePass.addEventListener("click", function() {
        passwords.forEach((password) => {
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
        });
    });
</script>
</script>
</body>
</html>