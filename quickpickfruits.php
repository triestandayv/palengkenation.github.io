<?php require_once "config.php";

    $query = "SELECT * FROM products WHERE Category='Fruits' LIMIT 4";
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
                    </div>
                </div>
            </div>';
    }
?>