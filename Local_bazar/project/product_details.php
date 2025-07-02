<?php
require_once 'inc/header.php';
require_once 'inc/nav.php';
?>
<div id="total"></div>
<div class="container-fluid">
    <div id="res" class="products"></div>
</div>



<?php
require_once 'inc/footer.php';
?>

 <script>
    let url = new URL(location.href);
    let pid = url.searchParams.get("pid") ;
    load_product_detail(pid);
</script>