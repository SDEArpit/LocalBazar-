<?php
session_start();
if ( isset( $_SESSION["login_status"] ) ) {
    if ( $_SESSION["login_status"] == 1 ) {
        $name = $_SESSION["name"] ;
        $id = $_SESSION["id"] ;
    } else {
        header('location:index.php');
    }
} else {
    header('location:index.php');
}
?>