let API = "admin/api/";

function loadProduct() {
    const task = 'Load_ALL_Product';
    $.ajax({
        url: API,
        method: 'POST',
        data: { task: task },
        success: function (res) {
            $("#res").html('');
            res.map(item => {
                $("#res").append(`
                <div class="card" style="width: 18rem;">
                <a href="product_details.php?pid=${item.id}">
                    <img src="admin/uploads/${item.image}" class="card-img-top" alt="product image">
                </a>    
                    <div class="card-body">
                        <h5 class="card-title"> ${item.name} </h5>
                        <p class="card-text"> 
                            ${item.sell_price} Rs. <br> 
                            <b class="fp"> ${item.fake_price} Rs. <b> 
                        </p>
                        <button onclick="add_to_cart(${item.id})" class="btn btn-primary">add to cart</a>
                    </div>
                </div>
                `);
            })
        }
    });
}
function login() {
    const task = "Login";
    let username = $("#mob").val();
    let password = $("#pwd").val();

    $.ajax({
        url: API,
        method: 'POST',
        data: { username: username, password: password, task: task },
        success: function (res) {
            if (res.status == 1) {
                localStorage.setItem("user_id", res.user_id);
                localStorage.setItem("name", res.name);
                localStorage.setItem("status", res.status);
                location.href = "index.php";
            }else if(res.status==0){
                 $("#msg").html(` 
                    <div class="alert alert-danger" >
                      ${res.msg}
                    </div>`);
            }
        }
    });
}
function SignUp(){
    const task='signup';
    let username=$("#mob").val();
    let pwd=$("#pwd").val();
    let name=$("#name").val();
    let email=$("#email").val();
    let address=$("#adr").val();
    $.ajax({
        url:API,
        method:'POST',
        data:{username:username,pwd:pwd,name:name,email:email,address:address,task:task},
        success:function (res){
            if(res.status == 1){
                localStorage.setItem("user_id", res.user_id);
                localStorage.setItem("name", res.name);
                localStorage.setItem("status", res.status);
                location.href = "index.php";
            }
            
        }
    })
}
function Logout(){
      localStorage.removeItem("user_id");
                localStorage.removeItem("name");
                localStorage.removeItem("status");
                 location.href = "index.php";

}
function button_control(){
if(localStorage.getItem("status") == null){
    $("#logout-btn").hide();
    $("signup-btn").show();
     $("#login-btn").show();
}
else{
    $("#signup-btn").hide();
     $("#login-btn").hide();
     $("#logout-btn").show();
}
}
 button_control();

function add_to_cart(id){
    let user_id=localStorage.getItem("user_id");
    let product_id=id;
    const task='add_to_cart';
   $.ajax({
    url: API,
    method: 'POST',
    data:{user_id:user_id,product_id:product_id,task:task},
    success:function(res){
        if(res){
            Cart_No();
           $("#msg").html(`
            <div class="alert alert-success" >
                ${res.msg}
            </div>
        `);
        }
        else{
             $("#msg").html(`
            <div class="alert alert-danger" >
                ${res.msg}
            </div>
        `);
        }
    }
   });

 }

 function Cart_No(){
    if(localStorage.getItem("status") == null){
        return null;
    }else{
    const task = 'cart_no';
    let user_id=localStorage.getItem("user_id");
    $.ajax({
      url: API,
      method: 'POST',
      data:{user_id: user_id,task: task},
      success: function (res){
    //    console.log(res.total_no_items);
        $("#cart_no").html(res.total_no_items);
      }
    });
   }
    
 }
 Cart_No();

 function load_cart(){
    let user_id=localStorage.getItem("user_id");
    const task='load_cart';
    $.ajax({
        url:API,
        method:'POST',
        data:{user_id:user_id,task:task},
        success:function (res){
         $("#cart_res").html('');
            res.map(item => {
                $("#cart_res").append(`
               
                    <div class="card">
                    <div class="card-header" style="width: 18rem;">
                         <img src="admin/uploads/${item.image}" class="card-img-top" alt="product image">
                    </div>
                    <div class="card-body">
                         <h5 class="card-title">Card title</h5>
                        <p class="card-text"> 
                                ${item.sell_price} Rs. <br> 
                                <b class="fp">quantity: ${item.qty} <b> 
                            </p>
                    </div>
                     <button class="btn btn-danger" onclick="delete_cart(${item.product_id})">Delete</button>
                    </div>
                
                `);
            })
            let total=0;
            total=res.reduce((sum,val)=>sum+=(parseInt(val.qty)*parseInt(val.sell_price)),0);
            // console.log(total);
            $("#total").html(`<h1>Total:${total}</h1>`);

        }
    });
 }
 function delete_cart(id){
    let product_id=id;
    let user_id=localStorage.getItem("user_id");
    const task='delete_cart'
    $.ajax({
        url:API,
        method:'POST',
        data:{product_id:product_id,user_id:user_id,task:task},
        success:function (res){
            if(res.status){
                load_cart();
                alert(res.msg);
            }
        }
    })

 }
 $("#srch").on("keyup",function(){
    const task='search';
    let key=(this.value);
    $.ajax({
        url:API,
        method:'POST',
        data:{key:key,task:task},
        success:function(res){
            $("#res").html('');
            res.map(item => {
                $("#res").append(`
                <div class="card" style="width: 18rem;">
                    <img src="admin/uploads/${item.image}" class="card-img-top" alt="product image">
                    <div class="card-body">
                        <h5 class="card-title"> ${item.name} </h5>
                        <p class="card-text"> 
                            ${item.sell_price} Rs. <br> 
                            <b class="fp"> ${item.fake_price} Rs. <b> 
                        </p>
                        <button onclick="add_to_cart(${item.id})" class="btn btn-primary">add to cart</a>
                    </div>
                </div>
                `);
            })

        }
    })
 });
function load_product_detail(pid){
    let product_id =pid;
    const task='get_product_details';
    $.ajax({
        url:API,
        method:'POST',
        data:{product_id:product_id,task:task},
        success:function(res){
           
            $("#res").html('');
          
                $("#res").append(`
                <div class="card" style="width: 18rem;">
               
                    <img src="admin/uploads/${res.image}" class="card-img-top" alt="product image">
                   
                    <div class="card-body">
                        <h5 class="card-title"> ${res.name} </h5>
                        <p class="card-text"> 
                            ${res.sell_price} Rs. <br> 
                            <b class="fp"> ${res.fake_price} Rs. <b> 
                        </p>
                        <button onclick="add_to_cart(${res.id})" class="btn btn-primary">add to cart</a>
                    </div>
                </div>
                `);
          
        }
    });

}
 function load_checkout_page(){
   
    user_id=localStorage.getItem("user_id");
    const task='load_checkout';
    $.ajax({
        url:API,
        method:'POST',
        data:{user_id:user_id,task:task},
        success:function(res){
            $("#name").val(res.user_data.name) ;
            $("#mobile").val(res.user_data.mobile) ;
            $("#address").val(res.user_data.address) ;
          
               $("#product-div").html('');
                res.product_data.map(item => {
                    $("#product-div").append(`
                   
                        <div class="card">
                        <div class="card-header" style="width: 100%">
                             <img src="admin/uploads/${item.image}" class="card-img-top" alt="product image">
                        </div>
                        <div class="card-body">
                             <h5 class="card-title">Card title</h5>
                            <p class="card-text"> 
                                    ${item.sell_price} Rs. <br> 
                                    <b class="fp">quantity: ${item.qty} <b> 
                                </p>
                        </div>
                         <button class="btn btn-danger" onclick="delete_cart(${item.product_id})">Delete</button>
                        </div>
                    
                    `);
                })
                 let total = 0;
            
            total = res.product_data.reduce((sum, item) => sum = sum + (parseInt(item.sell_price) * parseInt(item.qty)), 0);
            
             $("#total").val(`${total}`);
        }
    });
}
function proceed_checkout(){
    let user_id=localStorage.getItem("user_id");
    
    let status='order_placed';
    let mobile=$("#mobile").val();
    let address=$("#address").val();
    const task='proceed_checkout';
    total=$("#total").val();
   
     
    $.ajax({
        url:API,
        method:'POST',
        data:{total:total,status:status,mobile:mobile,address:address,user_id:user_id,task:task},
        success:function (res){
           $("#msg").html(` 
                    <div class="alert alert-success" >
                      ${res.msg}
                    </div>`);
        }
    })
}
