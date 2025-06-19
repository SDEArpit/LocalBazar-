<?php
require_once '../inc/connection.php';
$sql = "SELECT * FROM `vendors` WHERE `status`='1'";
$res = mysqli_query($con, $sql);

if (mysqli_num_rows($res) > 0) {


    echo '
<table class="table">
  <thead>
    <tr>
      <th >#</th>
      <th >Shop Name</th>
      <th >owner Name</th>
      <th >Mobile Number</th>
      <th >Address</th>
      <th >Email</th>
      <th >Gst number</th>
      <th colspan=2 >Action</th>
    </tr>
  </thead>
  <tbody>';
    while ($row = mysqli_fetch_assoc($res)) {
        echo '
     <tr>
      <th>' . $row["id"] . '</th>
      <td>' . $row["shop-name"] . '</td>
      <td>' . $row["owner-name"] . '</td>
      <td>' . $row["mob_no"] . '</td>
       <td>' . $row["address"] . '</td>
      <td>' . $row["email"] . '</td>
      <td>' . $row["gst_no"] . '</td>
      <td>
        <a class="btn btn-warning" href="vendor_update.php?id=' . $row["id"] . '"><i class="bi bi-pencil-fill"></i> </a>
        <button class="btn btn-danger" onclick="delete_vendor(' . $row["id"] . ')"> <i class="bi bi-trash3-fill"></i> </button>
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
