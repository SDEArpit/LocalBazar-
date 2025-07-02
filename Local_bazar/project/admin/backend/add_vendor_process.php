<?php

require_once '../inc/connection.php';


$shop_name=$_REQUEST["shop-name"];
$owner_name=$_REQUEST["owner-name"];
$mob=$_REQUEST["mob"];
$address=$_REQUEST["address"];
$email=$_REQUEST["email"];
$gst_no=$_REQUEST["gst-no"];


$sql="INSERT INTO `vendor` ( `shop_name`, `owner_name`, `mobile`, `address`, `email`, `gst`,`status`) 
VALUES ('$shop_name', '$owner_name', '$mob', '$address', '$email', '$gst_no','1')";
$res=mysqli_query($con,$sql);
if($res){
  echo 1;
}
else{
    echo 0;
}


?>

