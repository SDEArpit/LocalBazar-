<?php
session_start();
if ( isset( $_SESSION["login_status"] ) ) {
    if ( $_SESSION["login_status"] == 1 ) {
        $name = $_SESSION["name"] ;
        $id = $_SESSION["id"] ;
        header('location:home.php');
    }
}
require_once 'inc/header.php';
?>

    <div class="container myform">
        <h1>LOGIN</h1>
        <hr>
        <?php
            if ( isset ( $_REQUEST["msg"] ) ) {
                echo '
                <div class="alert alert-danger" >
                  ' . $_REQUEST["msg"] . '
                </div>
                ';
            }
        ?>
        <form action="backend/login_process.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Mobile no</label>
                <input type="text" class="form-control" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <button type="submit" class="btn btn-primary">LOGIN</button>
        </form>
    </div>


<?php
require_once 'inc/footer.php';
?>