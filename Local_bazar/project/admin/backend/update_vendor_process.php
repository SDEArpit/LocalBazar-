<?php

require_once '../inc/connection.php';


$shop_name=$_REQUEST["shop-name"];
$owner_name=$_REQUEST["owner-name"];
$mob=$_REQUEST["mob"];
$address=$_REQUEST["address"];
$email=$_REQUEST["email"];
$gst_no=$_REQUEST["gst-no"];
$pid=$_REQUEST["pid"];


$sql="UPDATE `vendor` SET `shop-name`='$shop_name', `owner-name`='$owner_name', `mob_no`='$mob', `address`='$address', `email`='$email', `gst_no`='$gst_no' WHERE `id`='$pid'";
$res=mysqli_query($con,$sql);
if($res){
  echo 1;
}
else{
    echo 0;
}


?>

