<?php
session_start();
require_once '../inc/connection.php';

$username = $_REQUEST["username"];
$password = $_REQUEST["password"];

$sql = "SELECT `id` , `password` , `name` , `type` , `status` FROM `users` WHERE `mobile` = '$username' ";
$res = mysqli_query( $con , $sql );

if ( mysqli_num_rows($res) > 0 ) {

    $row = mysqli_fetch_assoc($res);
    
    $dbpassword = $row["password"];
    $type = $row["type"];
    $status = $row["status"];

    if ( $type == 2 ) {

        if ( $status == 1 ) {

            if ( $dbpassword == $password ) {

                $_SESSION["login_status"] = 1 ;
                $_SESSION["id"] = $row["id"] ;
                $_SESSION["name"] = $row["name"] ;
                header('location:../home.php') ;
                
            } else {
                header('location:../index.php?msg=wrong password') ;        
            }

        } else {
            header('location:../index.php?msg=Username blocked') ;    
        }

    } else {
        header('location:../index.php?msg=Unauthorized User') ;
    }

} else {
    header('location:../index.php?msg=Invalid Username') ;
}

?>