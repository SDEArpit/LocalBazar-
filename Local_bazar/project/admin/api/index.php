<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once '../inc/connection.php';
$data = [];
$task = $_REQUEST["task"];
if ($task == 'Load_ALL_Product') {
    $sql = "SELECT * FROM `products` WHERE `status`='1'";
    $res = mysqli_query($con, $sql);
    while ($row = mysqli_fetch_assoc($res)) {
        array_push($data, $row);
    }
} else if ($task == 'Login') {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["password"];

    $sql = "SELECT `id`,`name`,`type`,`status`,`password` FROM `users` WHERE `mobile`='$username'";
    $res = mysqli_query($con, $sql);

    if (mysqli_num_rows($res) > 0) {
        $row = mysqli_fetch_assoc($res);
        
        if ($row["type"] == 1) {
            if ($row["status"] == 1) {
                if ($password == $row["password"]) {
                    
                    $data = [
                        "user_id" => $row["id"],
                        "name" => $row["name"],
                        "status" => 1,
                        "msg" => "success"
                    ];
                }else{
                    $data = [
                        "user_id" => NULL,
                        "name" => NULL,
                        "status" => 0,
                        "msg" => "WRONG PASSWORD"
                    ];
                }
            } else {
                $data = [
                     "user_id" => $row["id"] ,
                    "name" => $row["name"] ,
                    "status" => 1 ,
                    "msg" => "Blocked user"
                ];
            }
        }else {
            $data = [
                 "user_id" => $row["id"] ,
                    "name" => $row["name"] ,
                    "status" => 1 ,
                    "msg" => "This is for user only"
            ];
        }
    } else {
        $data = [
            "user_id" => $row["id"] ,
                    "name" => $row["name"] ,
                    "status" => 1 ,
                    "msg" => "no user found"
        ];
    }
} else if ($task == 'signup') {
    $username = $_REQUEST["username"];
    $password = $_REQUEST["pwd"];
    $Name = $_REQUEST["name"];
    $Email = $_REQUEST["email"];
    $Address = $_REQUEST["address"];
    $sql="INSERT INTO `users`(`mobile`,`password`,`name`,`email`,`address`,`type`,`status`) VALUES('$username','$password','$Name','$Email', '$Address','1','1')";
    $res=mysqli_query($con,$sql);
    $id=mysqli_insert_id($con);
    if($res){
        $data = [
                        "user_id" => $id,
                        "name" => $Name,
                        "status" => 1,
                        "msg" => "Registered"];
    }
    else{
          $data = [     "user_id" => NULL,
                        "name" => NULL,
                        "status" => 0,
                        "msg" => "not inserted"];

    }
    
} else if($task == 'add_to_cart'){

    $uid=$_REQUEST["user_id"];
    $pid=$_REQUEST["product_id"];

   $s1="SELECT `qty`  FROM `cart` WHERE `pid`='$pid' AND `uid`='$uid'";
   $r1=mysqli_query($con,$s1);
  
   if(mysqli_num_rows($r1)==0){
     $s2="INSERT INTO `cart`(`uid`,`pid`,`qty`) VALUES('$uid','$pid','1')";

    $r2=mysqli_query($con,$s2);
    if($r2){
        $data=[
            "status" => "1",
            "msg" =>"cart added",
            "qty"=>"1"

        ];
    }else{
         $data=[
            "status" => "0",
            "msg" =>"Error",
              "qty"=>NULL

        ];

    }
   }else{
    $row=mysqli_fetch_assoc($r1);
    $qty=$row["qty"];
    $qty++;
    $s3="UPDATE `cart` SET `qty`='$qty' WHERE `pid`='$pid' AND `uid`='$uid'";

    $r3=mysqli_query($con,$s3);
    if($r3){
        $data=[
            "status" => "1",
            "msg" =>"cart updated",
            "qty"=>"$qty"

        ];

   }else{
        $data=[
            "status" => "0",
            "msg" =>"Error",
            "qty"=>NULL

        ];
    }
}
}else if($task == 'cart_no'){

    $uid = $_REQUEST["user_id"];

    $sql="SELECT `id`, `uid`, `pid`, `qty` FROM `cart` WHERE `uid` = '$uid' ";
    $res=mysqli_query( $con , $sql );

    if( mysqli_num_rows($res) > 0){

        $data=[
            "total_no_items" => mysqli_num_rows($res)
        ];
    }
    else{
        $data=[
            "total_no_items" => 0
        ];
    }
    


}else if($task =='load_cart'){
    $uid=$_REQUEST["user_id"];
    $sql="SELECT `products`.`id` AS 'product_id' , `products`.`name` , `products`.`image` , `products`.`sell_price` , `cart`.`qty` FROM `products` JOIN `cart` ON `products`.`id` = `cart`.`pid` WHERE `cart`.`uid` =  '$uid' ";
    $res=mysqli_query($con,$sql);
   if(mysqli_num_rows($res) > 0){
     while($row = mysqli_fetch_assoc($res)){
        array_push($data,$row);
    }
}
}else if($task == 'delete_cart'){
    $pid=$_REQUEST["product_id"];
    $uid=$_REQUEST["user_id"];
    $sql="DELETE FROM `cart` WHERE `uid`='$uid' AND `pid`='$pid'";
    $res=mysqli_query($con,$sql);
    if($res){
        $data=[
            "status"=>"1",
            "msg"=>"product deleted"
        ];
    }

}else if($task=='search'){
    $key=$_REQUEST["key"];
    $sql="SELECT * FROM `products` WHERE `name` LIKE '%$key%'";
    $res=mysqli_query($con,$sql);
    while($row=mysqli_fetch_assoc($res)){
            array_push($data,$row);
    }


}else if($task =='get_product_details'){
    $id = $_REQUEST["product_id"] ;

    $sql = "SELECT * FROM `products` WHERE `id` = '$id' " ;
    $res = mysqli_query( $con , $sql );

    $data = mysqli_fetch_assoc( $res ) ;
}else if($task=='load_checkout'){
   
    $uid = $_REQUEST["user_id"];

    $sql1 = "SELECT `products`.`id` AS 'product_id' , `products`.`name` , `products`.`image` , `products`.`sell_price` , `cart`.`qty` FROM `products` JOIN `cart` ON `products`.`id` = `cart`.`pid` WHERE `cart`.`uid` =  '$uid' ";
    $res1 = mysqli_query( $con , $sql1 );

    $product_data = [] ;
    if ( mysqli_num_rows($res1) > 0 ) {
        
        while ( $row1 = mysqli_fetch_assoc($res1) ) {
            array_push( $product_data , $row1 );
        }

    }

    $data["product_data"] = $product_data ;

    $sql2 = "SELECT * FROM `users` WHERE `id` = '$uid' ";
    $res2 = mysqli_query( $con , $sql2 );
    $row = mysqli_fetch_assoc($res2) ;

    $user_data = [
        "name" => $row["name"],
        "mobile" => $row["mobile"],
        "address" => $row["address"],
    ];

    $data["user_data"] = $user_data ;

}else if($task =='proceed_checkout'){
    $mb=$_REQUEST["mobile"];
     $addr=$_REQUEST["address"];
      $st=$_REQUEST["status"];
       $o_no='LBO'.date('Ymhms');
       $uid=$_REQUEST["user_id"];
       $total=$_REQUEST["total"];
       $sql1="INSERT INTO `orders`( `order_id`, `uid`, `mobile`, `address`, `total`, `status`) VALUES('$o_no','$uid',' $mb','$addr','$total','$st')";
       $res1=mysqli_query($con,$sql1);
      
       $order_tb_id=mysqli_insert_id($con);
       $sql2="SELECT * FROM `cart` WHERE `uid`='$uid'";
       $res2=mysqli_query($con,$sql2);
       while($row2=mysqli_fetch_assoc($res2)){
        $product_id=$row2["pid"];
        $qty=$row2["qty"];
        $sql3="INSERT INTO `order_products`(`product_id`,`qty`,`order_tb_id`)VALUES('$product_id','$qty',' $order_tb_id')";
        $res3=mysqli_query($con,$sql3);
        

        $sql4="SELECT `qty` FROM `products` WHERE `id`='$product_id'";
        $res4=mysqli_query($con,$sql4);
        $row4=mysqli_fetch_assoc($res4);
        $old_qty=$row4["qty"];
        $new_qty=$old_qty-$qty;

        $sql5="UPDATE `products` SET `qty`='$new_qty' WHERE `id`='$product_id'";
        $res5=mysqli_query($con,$sql5);
       
       }
       $sql6="DELETE FROM `cart` WHERE `uid`='$uid'";
       $res6=mysqli_query($con,$sql6);
       if($res6){
        $data=["msg"=>"checkout done"];
       }
}
else {
    $data = [
        "user_id" => NULL ,
                    "name" => NULL ,
                    "status" => 0 ,
                    "msg" => "error"
    ];
}

echo json_encode($data);
