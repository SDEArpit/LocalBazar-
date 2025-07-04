<?php
require_once "../inc/connection.php";
$srch=$_REQUEST["srch"];
// echo $srch;
$sql="SELECT * FROM `products` WHERE `name` LIKE '%$srch%'";
$res=mysqli_query($con,$sql);

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
      <th>quantity</th>
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
      <td>' . $row["qty"] . '</td>
      <td>
      </td>
    </tr>';
    }
    echo '
   </tbody>
</table>

   ';
}

?>