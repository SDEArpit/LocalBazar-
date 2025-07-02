<?php
require_once 'inc/header.php';
require_once 'inc/nav.php';
?>
<div id="total"></div>
<div class="container-fluid">
    <div id="cart_res" >
    </div>
    <div class="checkout-link">
        <a href="checkout.php" class="btn btn-primary">Proceed to checkout</a>
    </div>
</div>



<?php
require_once 'inc/footer.php';
?>
<script> load_cart()</script>