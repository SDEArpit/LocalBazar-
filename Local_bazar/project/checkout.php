<?php
require_once 'inc/header.php';

?>

<div class="container" id="msg"></div>

<div class="container my-2">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Checkout</h4>
                </div>
                <div class="card-body">

                    <div>
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" id="name" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="mobile" class="form-label">Mobile Number</label>
                            <input type="text" class="form-control" id="mobile" placeholder="Enter your mobile number">
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Address</label>
                            <input type="text" class="form-control" id="address" placeholder="Enter your address ">
                        </div>

                        <hr>

                        <div id="product-div"></div>

                        <div class="d-flex justify-content-between mb-3">
                            <strong>Total:</strong>
                            <span ><input type="text" id="total" style="all: unset;" readonly></span>
                        </div>


                        <button onclick="proceed_checkout()" class="btn btn-success w-100">Place Order</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>



<?php
require_once 'inc/footer.php';
?>
<script>
    load_checkout_page()
</script>
