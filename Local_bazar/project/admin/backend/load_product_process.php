<?php
require_once '../inc/connection.php';
$sql = "SELECT * FROM `products` WHERE `status`='1'";
$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {


    echo '
<table class="table">
  <thead>
    <tr>
      <th >#</th>
      <th >Name</th>
      <th >Image</th>
      <th >Sku</th>
      <th >Selling price</th>
      <th >Fake price</th>
      <th colspan=2 >Action</th>
    </tr>
  </thead>
  <tbody>';
    while ($row = mysqli_fetch_assoc($res)) {
        echo '
     <tr>
      <th>' . $row["id"] . '</th>
      <td>' . $row["name"] . '</td>
      <td>' . $row["image"] . '</td>
      <td>' . $row["sku"] . '</td>
      <td>' . $row["sell_price"] . '</td>
      <td>' . $row["fake_price"] . '</td>
      <td>
        <a class="btn btn-warning" href="product_update.php?id='.$row["id"].'"><i class="bi bi-pencil-fill"></i> </a>
        <button class="btn btn-danger" onclick="delete_product('.$row["id"].')"> <i class="bi bi-trash3-fill"></i> </button>
      </td>
    </tr>';
    }
    echo '
   </tbody>
</table>

   ';
} else {
    echo '
    <div class="alert alert-danger">
      No product found !!!
    </div>
    ';
}
