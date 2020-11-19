<?php
  header("Content-type: text/html; charset=utf-8");
	$localhostname='localhost';
	$accoutname='root';
	$pass='';
	$database='nhung';
	$conn=mysqli_connect($localhostname,$accoutname,$pass,$database);
  mysqli_set_charset($conn, 'UTF8');
?>
<?php
if(isset($_POST['ok'])){
	$search=$_POST['search'];
	$sql_search="SELECT * FROM detailsproduct WHERE description LIKE '%$search%'";
	$query_search=mysqli_query($conn,$sql_search);
	$nums=mysqli_num_rows($query_search);
}if($nums==0){
	echo 'Không tìm thấy sản phẩm nào';

}else{
	echo $nums.' kết quả với từ khóa '.'" '.$search.'"' ;
?>

	<ul>
	<?php
    while($row_search=mysqli_fetch_array($query_search)){
    ?>
        <div class="col-4  ">

        <a href="index.php?xem=detailsproduct&id_product=<?php echo $row_search['id_product'] ?>" >
            <img src="/new/img/<?php echo $row_search['img']?>" width="200" height="228">
            <p style="color: black; font-size: 18px;"><b><?php echo $row_search['name_product'] ?></b></p><br>
            <p style="color: black;"><?php echo $row_search['title'] ?></p>
            <p> <span class="btn btn-success" role="button"><?php echo $row_search['price'] ?> VND</span>
                <a href="index.php?xem=detailsproduct&id_product=<?php echo $row_search['id_product']?>" class="btn btn-default" role="button">Chi Tiết</a>
                <span class="products-info"><a  class="cart" href="index.php?xem=cart&add1=<?php echo $row_search['id_product']?>"> </a></span>
            </p> 
        </a>       
    </div>
	<?php
    }
}
    ?>
    </ul>
    			
		
			
