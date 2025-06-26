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
    $sql="INSERT INTO `users`(`mobile`,`password`,`name`,`email`,`address`) VALUES('$username','$password','$Name','$Email', '$Address')";
    $res=mysqli_query($con,$sql);
    
    if($res){
        $data = [
                      
                        "name" => $Name,
                        "status" => 1,
                        "msg" => "Registered"];
    }
    else{
          $data = [
                        "name" => NULL,
                        "status" => 0,
                        "msg" => "not inserted"];

    }
    
} else {
    $data = [
        "user_id" => NULL ,
                    "name" => NULL ,
                    "status" => 0 ,
                    "msg" => "error"
    ];
}

echo json_encode($data);
