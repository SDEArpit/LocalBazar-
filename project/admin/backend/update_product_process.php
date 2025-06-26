<?php

require_once '../inc/connection.php';


$name=$_REQUEST["name"];
$sku=$_REQUEST["sku"];
$sp=$_REQUEST["sell_price"];
$fp=$_REQUEST["fake_price"];
$pid=$_REQUEST["pid"];

$from=$_FILES["image"]["tmp_name"];
$image_name = 'LB' . date("Ymdhms") . '.jpeg' ;

$to='../uploads/'.$image_name;

if( move_uploaded_file( $from , $to ) ){
   $sql="UPDATE `products` SET `name`='$name',`image`='$image_name',`sku`='$sku',`sell_price`='$sp',`fake_price`='$fp',`cost_price`='0',`qty`='0',`status`='1' WHERE `id`='$pid'";

   $res=mysqli_query($con,$sql);

   if($res){

     echo 1;

   }else{

    echo 0;

   }
}else{
    echo 0;
}


?>

