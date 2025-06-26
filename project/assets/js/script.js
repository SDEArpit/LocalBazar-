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
                    <img src="admin/uploads/${item.image}" class="card-img-top" alt="product image">
                    <div class="card-body">
                        <h5 class="card-title"> ${item.name} </h5>
                        <p class="card-text"> 
                            ${item.sell_price} Rs. <br> 
                            <b class="fp"> ${item.fake_price} Rs. <b> 
                        </p>
                        <button onclick="login()" class="btn btn-primary">add to cart</a>
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
        sucess:function (res){
            if(res.status == 1){
                
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
    $("signup-btn").hide();
     $("#login-btn").hide();
     $("#logout-btn").show();
}
}
 button_control();