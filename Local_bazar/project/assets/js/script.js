function loadProduct(){
    const task='Load_ALL_Product';
    $.ajax({
      url:'admin/api/',
      method:'POST',
      data:{task:task},
      success :function(res){
         $("#res").html('');
            res.map( item => {
                $("#res").append(`
                <div class="card" style="width: 18rem;">
                    <img src="admin/uploads/${item.image}" class="card-img-top" alt="product image">
                    <div class="card-body">
                        <h5 class="card-title"> ${item.name} </h5>
                        <p class="card-text"> 
                            ${item.sell_price} Rs. <br> 
                            <b class="fp"> ${item.fake_price} Rs. <b> 
                        </p>
                        <a href="#" class="btn btn-primary">add to cart</a>
                    </div>
                </div>
                `);
      } )
    }
     });
}
