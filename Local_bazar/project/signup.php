<?php
require_once 'inc/header.php';
require_once 'inc/nav.php';
?>
<div class="form-container">
  <div id="res"></div>
  <div class="title">SignUp</div>
  <div class="mb-3 input-box">
    <label for="" class="form-label">Mobile Number</label>
    <input type="text" class="form-control" id="mob" >
    
  </div>
  <div class="mb-3 input-box">
    <label for="" class="form-label">Password</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="mb-3 input-box">
    <label for="" class="form-label">Name</label>
    <input type="text" class="form-control" id="name">
  </div>
  <div class="mb-3 input-box">
    <label for="" class="form-label">Email</label>
    <input type="text" class="form-control" id="email">
  </div>
  <div class="mb-3 input-box">
    <label for="" class="form-label">Address</label>
    <input type="text" class="form-control" id="adr">
  </div>
  
  <button onclick="SignUp()" class="btn btn-primary">Sign Up</button>

</div>
<?php
require_once 'inc/footer.php';
?>
