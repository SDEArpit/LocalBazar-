<?php
require_once 'inc/session.php';
require_once 'inc/header.php';
require_once 'inc/nav.php';
require_once 'inc/connection.php';
$pid =$_GET["id"];
$sql="SELECT * FROM `products` WHERE `id`='$pid'";
$res=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($res);

?>
<div class="container">
  <div id="msg"></div>
  <h3>UPDATE PRODUCT</h3>
  <hr>
  <form id="update_product">
  <input type="text" class="form-control" name="pid" value="<?=$pid?>" hidden>
    <div class="row mb-5">
      <div class="col">
        <input type="text" class="form-control" placeholder="Name of product" name="name" value="<?=$row["name"]?>">
      </div>
      <div class="col">
        <input type="file" class="form-control" placeholder="Image" name="image"value="<?=$row["image"]?>">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="SKU" name="sku"value="<?=$row["sku"]?>">
      </div>
    </div>

    <div class="row mb-5">
      <div class="col">
        <input type="text" class="form-control" placeholder="selling price" name="sell_price" value="<?=$row["sell_price"]?>">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="fake price" name="fake_price"value="<?=$row["fake_price"]?>">
      </div>
      <div class="col">
        <button class="btn btn-success" type="Update">Save
      </div>

    </div>
  </form>

<?php
require_once 'inc/footer.php';
?>
