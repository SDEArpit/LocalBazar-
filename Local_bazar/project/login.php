<?php
require_once 'inc/header.php';
require_once 'inc/nav.php';
?>
<div class="form-container">
  <div id="msg"></div>
  <div class="title">Login</div>
  <div class="mb-3 input-box">
    <label for="" class="form-label">Mobile Number</label>
    <input type="text" class="form-control" id="mob" >
    
  </div>
  <div class="mb-3 input-box">
    <label for="" class="form-label">Password</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  
  <button onclick="login()" class="btn btn-primary">Login</button>

</div>
<?php
require_once 'inc/footer.php';
?>
