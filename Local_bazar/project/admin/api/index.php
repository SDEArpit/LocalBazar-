<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../inc/connection.php';
$data=[];
$task=$_REQUEST["task"];
if($task=='Load_ALL_Product'){
    $sql="SELECT * FROM `products` WHERE `status`='1'";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($res)){
        array_push($data,$row);
    }

}else if($task=='login'){

}else if($task=='signup'){

}else{
    echo 'invalid';
}











echo json_encode($data);
?>