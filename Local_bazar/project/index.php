<?php
require_once 'inc/header.php';
require_once 'inc/nav.php';
?>
<div id="msg"></div>
<div class="container " ><input class="form-control" id="srch" type="text" placeholder="search"></div>
<div class="container-fluid">
    <div id="res" class="products"></div>
</div>



<?php
require_once 'inc/footer.php';
?>
<script>
    loadProduct();
</script>