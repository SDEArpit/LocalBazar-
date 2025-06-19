$("#add_product").submit(function (e) {
    
    e.preventDefault();
    const formData = new FormData(this);

    $.ajax({
        url: 'backend/addproduct_process.php',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data == 1) {
               loadProduct()
                $("#msg").html(`
                    <div class="alert alert-success" >
                        Product Added
                    </div>
                    `);
            } else {
                $("#msg").html(`
                    <div class="alert alert-danger" >
                        Error ... Try again !!!
                    </div>
                    `);
            }
            $("#add_product")[0].reset();
        }
    })
});

function loadProduct(){
    $.ajax({
        url:'backend/load_product_process.php',
        method:'GET',
        success:function(data){
            $("#res").html(data);
        }
    });
}

function delete_product(id){
    if(confirm("Are you sure")){
        $.ajax({
          url:'backend/delete_product_process.php',
          method:'POST',
          data:{id:id},
          success:function (res){
            if(res){
                loadProduct();
                $("#msg").html(` <div class="alert alert-danger" >
                       Row deleted(:
                    </div>`);
            }
            else{
              $("#msg").html(` <div class="alert alert-danger" >
                        Error ... Try again !!!
                    </div>`);
            }
             }

        });
    }

}

$("#update_product").submit(function (e) {
    
    e.preventDefault();
    const formData = new FormData(this);

    $.ajax({
        url: 'backend/update_product_process.php',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data == 1) {
               
                $("#msg").html(`
                    <div class="alert alert-success" >
                        Product Updated
                    </div>
                    `);
            } else {
                $("#msg").html(`
                    <div class="alert alert-danger" >
                        Error ... Try again !!!
                    </div>
                    `);
            }
        }
    })
});

$("#add_vendor").submit(function (e) {
    
    e.preventDefault();
    const formData = new FormData(this);

    $.ajax({
        url: 'backend/add_vendor_process.php',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data == 1) {
               loadvendor();
                $("#msg").html(`
                    <div class="alert alert-success" >
                        vendor Added
                    </div>
                    `);
            } else {
                $("#msg").html(`
                    <div class="alert alert-danger" >
                        Error ... Try again !!!
                    </div>
                    `);
            }
             $("#add_vendor")[0].reset();
        }
    })
});

function loadvendor(){
    $.ajax({
        url:'backend/load_vendor_process.php',
        method:'GET',
        success:function(data){
            $("#resl").html(data);
        }
    });
}
function delete_vendor(id){
      if(confirm("Are you sure")){
        $.ajax({
          url:'backend/delete_vendor_process.php',
          method:'POST',
          data:{id:id},
          success:function (res){
            if(res){
                loadvendor();
                $("#msg").html(` <div class="alert alert-danger" >
                       Row deleted(:
                    </div>`);
            }
            else{
              $("#msg").html(` <div class="alert alert-danger" >
                        Error ... Try again !!!
                    </div>`);
            }
             }

        });
    }

}
$("#update_vendor").submit(function (e) {
    
    e.preventDefault();
    const formData = new FormData(this);

    $.ajax({
        url: 'backend/update_vendor_process.php',
        method: 'POST',
        data: formData,
        contentType: false,
        processData: false,
        success: function (data) {
            if (data == 1) {
               
                $("#msg").html(`
                    <div class="alert alert-success" >
                        vendor Updated
                    </div>
                    `);
            } else {
                $("#msg").html(`
                    <div class="alert alert-danger" >
                        Error ... Try again !!!
                    </div>
                    `);
            }
        }
    })
});