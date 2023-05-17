<?php include 'config.php';
    session_start();
    $username = $_SESSION['user_un'];
    $fname = $_SESSION['user_fname'];
    $lname = $_SESSION['user_lname'];
    $phone = $_SESSION['phone'];
    $id = $_SESSION['user_id'];
    $opassErr = "";
    $npassErr = "";
    $changes = "";

    if (isset($_POST['changepass'])) {
        $oldpass = htmlspecialchars($_POST['oldpass']);
        $newpass = htmlspecialchars($_POST['newpass']);
        $cnewpass =  htmlspecialchars($_POST['cnewpass']);

        $select = "SELECT pass FROM accounts WHERE id=$id";
        $res = mysqli_query($conn, $select);

        $row = mysqli_fetch_assoc($res);
        $storedhash = $row['pass'];

        if($newpass != $cnewpass){  
            $npassErr = "Passwords did not match. Try again.";
        } else {
            if(password_verify($oldpass, $storedhash)) {
                $hashed_pass = password_hash($newpass, PASSWORD_DEFAULT);

                $query = "UPDATE accounts SET pass='$hashed_pass' WHERE id=$id";
                $result = mysqli_query($conn, $query);

                if ($result == TRUE) {
                    $changes = "<small class='text-success text-center'>You have successfully changed your password.</small>";
                } else {
                    $changes = "<small class='text-warning text-center'>There was an erro in changing your password. Please try again.</small>";
                }
            } else {
                $opassErr = "Current password is incorrect.";
            }
        }
    }
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
    <title>Account</title>
</head>
<body>
    <!--navigation-->
    <nav class="nav navbar nav-tabs navbar-expand-lg bg-light navbar-light text-white flex-column">
        <div class="container pb-2">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu"><span class="navbar-toggler-icon"></span></button>                    
            <a href="index.php" class="navbar-brand ms-2"><img class="img-fluid home-logo ms-5 ms-lg-0 me-2" src="assets/homepage/icon.png">Palengke Nation</a>
            <div class="d-flex">
                <?php if (isset($_SESSION['user_un'])) {?>
                    <?php echo "<small class='text-dark d-none d-md-block'>Welcome, ".$_SESSION['user_fname']."</small>";?>
                    <a href="logout.php" class="mx-3 text-success">Log Out</a>
                <?php } else { ?>
                <a href="login.php" class="mx-3" title="Log In"><i class="fa-sharp fa-solid fa-user fa-lg icon"></i></a>
                <?php }?>
                <a href="cart.php"><i class="fa-sharp fa-solid fa-cart-shopping fa-lg icon" title="Cart"></i></a>
            </div>
        </div>
<?php include "nav_config/navacc.php"?>
<section class="py-3 bg-success">
    <div class="container">
                <h5 class="text-center text-light h3">Account Settings</h5>
        <div class="row mt-4">
            <div class="col-lg-3">
            </div>
            <div class="col-lg-6">
                <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" class="row g-3 bg-light shadow-lg p-5">
                    <?php echo $changes;?>
                    <div class="col-12">
                        <label for="oldpw" class="form-label">Current Password</label>
                        <input id="oldpw" class="form-control passwords <?php echo $opassErr ? 'is-invalid' : null;?>" type="password" name="oldpass" placeholder="Enter current password" required>
                        <div class="invalid-feedback">
                            <?php echo $opassErr;?>
                        </div>
                    </div>
                    <div class="col-12">
                        <label for="newpw" class="form-label">New Password</label>
                        <input id="newpw" class="form-control passwords" type="password" name="newpass" placeholder="Enter new password" required>
                    </div>
                    <div class="col-12">
                        <label for="cnewpw" class="form-label">Confirm New Password</label>
                        <input id="cnewpw" class="form-control passwords <?php echo $npassErr ? 'is-invalid' : null;?>" type="password" name="cnewpass" placeholder="Confirm new password" required>
                        <div class="invalid-feedback">
                            <?php echo $npassErr;?>
                        </div>
                    </div>
                    <div class="my-2 d-flex ms-1">
                        <input type="checkbox" class="form-check" id="togglePassword"><label for="togglePassword" class="ms-2">Show Password</label>
                    </div>
                    <button type="submit" name="changepass" class="btn btn-primary w-100">Change Password</button>
                    <a href="account.php" class="btn btn-secondary w-100">Cancel</a>
                </form>
            </div>
            <div class="col-lg-3">
            </div>
        </div>
    </div>
</section>
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
        const passwords = document.querySelectorAll(".passwords");
        const togglePass = document.querySelector("#togglePassword");
        togglePass.addEventListener("click", function() {
            passwords.forEach((password) => {
                const type = password.getAttribute("type") === "password" ? "text" : "password";
                password.setAttribute("type", type);
            });
        });
    </script>
</body>
</html>