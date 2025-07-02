<?php
require_once '../inc/connection.php';
$inv_no=$_REQUEST["inv_no"];
$vid=$_REQUEST["vid"];
$pid=$_REQUEST["pid"];
$qty=$_REQUEST["qty"];
$cp=$_REQUEST["cp"];


$sql1="INSERT INTO `purchase` (`inv_no`,`vid`,`pid`,`qty`,`cp`) VALUES('$inv_no','$vid','$pid','$qty','$cp')";
$res1=mysqli_query($con,$sql1);

$sql2="SELECT `qty` AS `old_qty` FROM `products` WHERE `id` = '$pid' ";
$res2=mysqli_query($con,$sql2);
$row=mysqli_fetch_assoc($res2);
 

$old_qty=$row["old_qty"];
$new_qty = $old_qty + $qty;

$sql3="UPDATE `products` SET `qty`='$new_qty',`cost_price`='$cp' WHERE `id='$pid'";
$res3=mysqli_query($con,$sql3);

if($res3){
    echo 1;
}
else
  echo 0;



?>