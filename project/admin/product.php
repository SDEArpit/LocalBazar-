<?php
require_once 'inc/session.php';
require_once 'inc/header.php';
require_once 'inc/nav.php';
?>
<div class="container">
  <div id="msg"></div>
  <h3>ADD PRODUCT</h3>
  <hr>
  <form id="add_product">

    <div class="row mb-5">
      <div class="col">
        <input type="text" class="form-control" placeholder="Name of product" name="name">
      </div>
      <div class="col">
        <input type="file" class="form-control" placeholder="Upload Image" name="image">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="SKU" name="sku">
      </div>
    </div>

    <div class="row mb-5">
      <div class="col">
        <input type="text" class="form-control" placeholder="selling price" name="selling_price">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="fake price" name="fake_price">
      </div>
      <div class="col">
        <button class="btn btn-success" type="submit">Save
      </div>

    </div>
  </form>
<div id="res"></div>
</div>
<?php
require_once 'inc/footer.php';
?>
<script>loadProduct();</script>