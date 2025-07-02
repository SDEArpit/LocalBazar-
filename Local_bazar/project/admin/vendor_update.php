<?php
require_once 'inc/session.php';
require_once 'inc/header.php';
require_once 'inc/nav.php';
require_once 'inc/connection.php';
$pid =$_GET["id"];
$sql="SELECT * FROM `vendors` WHERE `id`='$pid'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);

?>
<div class="container">
  <div id="msg"></div>
  <h3>UPDATE vendor</h3>
  <hr>
  <form id="update_vendor">
  <input type="text" class="form-control" name="pid" value="<?=$pid?>" hidden>
    <div class="row mb-5">
      <div class="col">
        <input type="text" class="form-control" name="shop-name" value="<?=$row["shop-name"]?>">
      </div>
      <div class="col">
        <input type="text" class="form-control"  name="owner-name"value="<?=$row["owner-name"]?>">
      </div>
      <div class="col">
        <input type="text" class="form-control"  name="mob"value="<?=$row["mob_no"]?>">
      </div>
    </div>

    <div class="row mb-5">
      <div class="col">
        <input type="text" class="form-control"  name="address" value="<?=$row["address"]?>">
      </div>
      <div class="col">
        <input type="text" class="form-control" name="email"value="<?=$row["email"]?>">
      </div>
       <div class="col">
        <input type="text" class="form-control"  name="gst-no"value="<?=$row["gst_no"]?>">
      </div>
      <div class="col">
        <button class="btn btn-success" type="Update">Save
      </div>

    </div>
  </form>

<?php
require_once 'inc/footer.php';
?>
