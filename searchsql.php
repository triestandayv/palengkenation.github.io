<?php include "config.php";

$pdimg = "";
$pdname = "";
$pdprice = "";
$display = "";
$results = "";
$noresult = "";
$showresult = "";
$row = array();
if (isset($_GET["search"])) {
    $pdsearch = htmlspecialchars($_GET["pdsearch"]);
    $query = "SELECT * FROM products WHERE Name LIKE '%$pdsearch%'";
    $result = mysqli_query($conn,$query);
    
    if($results = mysqli_num_rows($result) > 0) {
        while ($item = mysqli_fetch_assoc($result)) {
            $row[] = $item;
            }
        $showresult = '<h4 class="text-center">Showing results for "'.$pdsearch.'"</h4>';
    } else {
        $showresult = '<h4 class="text-center">Showing results for "'.$pdsearch.'"</h4>';
        $noresult = "<h5 class='mt-5 text-center'>No Results Found</h5>";
    }
    }
?>