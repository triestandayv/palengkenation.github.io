<?php require_once "config.php";

    $query = "SELECT * FROM products WHERE Category='Fish' LIMIT 4";
    $result = mysqli_query($conn, $query);
    $shelf = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    foreach($shelf as $item) {
        echo '<div class="col-md-3 col-6">
                <div class="card">
                    <img src="'.str_replace(array('../'), '',$item["Image"]).'" class="card-img-top img-fluid" alt="fruits">
                    <div class="card-body">
                        <h3 class="h6 fw-bold">'.$item["Name"].'</h3>
                        <p class="card-text"> ₱'.$item["Price"].'</p>
                        <button class="btn w-100 btn-success">View</button>
                        <form action="cart.php" method="POST" class="row g-1 mt-1">
                            <div class="col-lg-4">
                                <input type="number" class="form-control text-center" name="quantity" value="1" min="1" max="'.$item['Quantity'].'" placeholder="Quantity" required>
                                <input type="hidden" class="form-control" name="ID" value='.$item['ID'].'">
                            </div>
                            <div class="col-lg-8">
                            <input type="submit" class="btn btn-success w-100"value="Add To Cart">
                            </div>
                        </form>
                    </div>
                </div>
            </div>';
    }
?>