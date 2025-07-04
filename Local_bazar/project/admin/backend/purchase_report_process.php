<?php
require_once "../inc/connection.php";
$srch=$_REQUEST["srch"];
// echo $srch;

$sql = "SELECT `purchase`.`invno` , `purchase`.`qty` , `purchase`.`cp` , `vendor`.`shop_name` , `vendor`.`mobile` , `vendor`.`address` , `products`.`name` FROM `vendor` JOIN `purchase` ON `purchase`.`vid` = `vendor`.`id` JOIN `products` ON `purchase`.`pid` = `products`.`id` WHERE `purchase`.`invno` LIKE '%$srch' OR `vendor`.`mobile` LIKE '%$srch%'" ;
$res=mysqli_query($con,$sql);

if (mysqli_num_rows($res) > 0) {
echo '
<table class="table">
  <thead>
    <tr>
      <th >invoice number</th>
      <th >quantity</th>
      <th >Cost PRice</th>
      <th >Shop name</th>
      <th >Mobile number</th>
      <th >Adress</th>
      <th>name</th>
    </tr>
  </thead>
  <tbody>';
    while ($row = mysqli_fetch_assoc($res)) {
        echo '
     <tr>
      <th>' . $row["invno"] . '</th>
      <td>' . $row["qty"] . '</td>
      <td>' . $row["cp"] . '</td>
      <td>' . $row["shop_name"] . '</td>
      <td>' . $row["mobile"] . '</td>
      <td>' . $row["address"] . '</td>
      <td>' . $row["name"] . '</td>
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