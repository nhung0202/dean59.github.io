<?php
  header("Content-type: text/html; charset=utf-8");
	$localhostname='localhost';
	$accoutname='root';
	$pass='';
	$database='nhung';
	$conn=mysqli_connect($localhostname,$accoutname,$pass,$database);
  mysqli_set_charset($conn, 'UTF8');

if(isset($_POST['payment'])){
	$name=$_POST['name'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];
	$note=$_POST['note'];
	$hinhthucgiao=$_POST['delivery'];
	$sql_infororder="INSERT INTO tbl_infororder(name, phone, email, address, note, delivery) VALUES('$name', '$phone', '$email', '$address', '$note', '$delivery')";
	$run_infororder=mysqli_query($conn,$sql_infororder);
	if($run_infororder){
		$sql_select_infororder= mysqli_query($conn,"SELECT * FROM tbl_infororder ORDER BY id_custormer DESC LIMIT 1");
		$codeorder='#'.rand(0,99999);
		$row_infororder=mysqli_fetch_array($sql_select_infororder);
		$id_custormer=$row_infororder['id_custormer'];
		for($i=0;$i<count($_POST['payment_id_product']);$i++){
			$id_product=$_POST['payment_id_product'][$i];
			$quatity=$_POST['payment_quatity'][$i];
			$sql_order=mysqli_query($conn,"INSERT INTO tbl_order(id_cart, id_product, img,price, quatity) VALUES ('$id_cart','$id_product','$id_custormer','$quatity')");
			$sql_delete_payment=mysqli_query($conn,"DELETE FROM tbl_cart WHERE id_product='$id_product'");	
		}
	}
	 header('location:index.php?xem=thank');
}

?>
<div class="container">
  <h2>Thông tin vận chuyển</h2>
  <form action="" method="post">
      <div class="form-group">
          <label for="name">Họ tên :</label>
          <input type="name" class="form-control" name="name" style="width:1000px">
      </div>
      <div class="form-group">
        <label for="email">Số điện thoại :</label>
        <input type="phone" class="form-control" name="phone" style="width:1000px">
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" class="form-control" name="email" style="width:1000px">
      </div>
      <div class="form-group">
        <label for="pwd">Địa chỉ :</label>
        <input type="address" class="form-control" name="address" style="width:1000px">
      </div>
      <div class="form-group">
      	<select class="" name="delivery">
        	<option>Chọn phương thức thanh toán</option>
            <option value="1">Thanh toán bằng thẻ </option>
            <option value="0">Tiền mặt</option>
        </select>
      </div>
      <div class="form-group">
        <label for="pwd">Ghi chú :</label>
        <input type="note" class="form-control" name="note" style="width:1000px">
      </div>
      <?php
		$sql_choose_cart="SELECT * FROM tbl_cart ORDER BY id_cart DESC";
		$run_choose_cart=mysqli_query($conn, $sql_choose_cart);
		while($row_payment = mysqli_fetch_array($run_choose_cart)){
        ?>
        <input type="hidden"  name="payment_quatity[]" value="<?php echo $row_payment['quatity']?>" />
        <input type="hidden"  name="payment_id_product[]" value="<?php echo $row_payment['id_product']?>" />
      <?php 
		}
	  ?>
  <div align="center"><input type="submit" name="payment"class="btn btn-default" value="Thanh toán"></div>
  </form>
</div>