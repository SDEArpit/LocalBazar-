<?php

require_once '../inc/connection.php';


$name=$_REQUEST["name"];
$sku=$_REQUEST["sku"];
$sp=$_REQUEST["selling_price"];
$fp=$_REQUEST["fake_price"];

$from = $_FILES["image"]["tmp_name"] ;
$image_name = 'LB' . date('Ymdhms') . '.jpg' ;

$to = '../uploads/' . $image_name ;

if ( move_uploaded_file( $from , $to ) ) {

    $sql = "INSERT INTO `products` ( `name`, `image`, `sku`, `sell_price`, `fake_price`, `cost_price`, `qty`, `status` ) VALUES ('$name','$image_name','$sku','$sp','$fp','0','0','1')" ;

    $res = mysqli_query($con , $sql);

    if( $res ) {
        echo 1 ;
    } else {
        echo 0 ;
    }

} else {
    echo 0 ;
}


?>

