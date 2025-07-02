<?php
require_once 'inc/session.php';
require_once 'inc/header.php';
require_once 'inc/nav.php';
?>
<div class="container">
  <div id="msg"></div>
  <h3>ADD VENDOR</h3>
  <hr>
  <form id="add_vendor">

    <div class="row mb-5">
      <div class="col">
        <input type="text" class="form-control" placeholder="Shop Name" name="shop-name">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Owner Name" name="owner-name">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Mobile number" name="mob">
      </div>
    </div>

    <div class="row mb-5">
      <div class="col">
        <input type="text" class="form-control" placeholder="Address" name="address">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Email" name="email">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="GST number" name="gst-no">
      </div>
      <div class="col">
        <button class="btn btn-success" type="submit">Save
      </div>

    </div>
  </form>
<div id="resl"></div>
</div>
<?php
require_once 'inc/footer.php';
?>
<script>loadvendor();</script>