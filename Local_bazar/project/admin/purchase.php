<?php
require_once 'inc/session.php';
require_once 'inc/connection.php';
require_once 'inc/header.php';
require_once 'inc/nav.php';
?>
<div class="container">
  <div id="msg"></div>
  <h3>Purchase Product</h3>
  <hr>
  
    <div class="row">
        <div class="col">
             <input type="text" class="form-control" placeholder="invoice number" id="invoice_no">
        </div>
    </div>
    <div class="row mb-5">
      <div class="col">
        <select class="form-select" id="ven_shop" >
            <option value="">select shop</option>
            <?php
           $sql = "SELECT * FROM `vendor` WHERE `status` = '1'" ;
                    $res = mysqli_query( $con , $sql );
                    while ( $row = mysqli_fetch_assoc($res) ) {
                        echo '<option value="' . $row["id"] . '-' . $row["mobile"] . '-' . $row["address"] . ' "> ' . $row["shop_name"] . ' </option>';
                    }
            ?>

        </select>
      </div>
      <div class="col">
        <div class="vid"><input type="text" id="vid"hidden></div>
        <input type="number" class="form-control" placeholder="Mobile number of shop" id="mob" readonly>
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Address of shop" id="add_shop" readonly>
      </div>
    </div>

    <div class="row mb-5">
      <div class="col">
        <select class="form-select" id="prod">
            <option value="">select Product</option>
            <?php
                 $sql = "SELECT * FROM `products` WHERE `status` = '1'" ;
                    $res = mysqli_query( $con , $sql );
                    while ( $row = mysqli_fetch_assoc($res) ) {
                        echo '<option value="' . $row["id"] . '"> ' . $row["name"] . ' </option>';
                    }
            
            ?>
        </select>
      </div>
      <div class="col">
         <input type="text" id="pid" name="pid" hidden>
        <input type="text" class="form-control" placeholder="Cost Price" id="cp">
      </div>
      <div class="col">
        <input type="text" class="form-control" placeholder="Quantity" id="qty">
      </div>
      
    </div>
    <div id="total"></div>
    <div class="col">
        <button class="btn btn-success" onclick="purchase()">Buy</button>
    </div>
 

<?php
require_once 'inc/footer.php';
?>
