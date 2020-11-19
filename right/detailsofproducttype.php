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
	$id=$_GET['id'];
	$sql_producttype="SELECT *FROM producttype WHERE id_producttype='$id'";
	$query_producttype=mysqli_query($conn,$sql_producttype);
	$row_producttype=mysqli_fetch_array($query_producttype);
?>
<?php
	    $sql = mysqli_query($conn,"SELECT * FROM producttype WHERE id_producttype=".$_GET["id"].";");
        while($row = mysqli_fetch_array($sql)){
            ?>
<div><p class="right-titleproduct">Danh sách sản phẩm thuộc danh mục <?php echo $row['producttypename'] ?></p></div>

<?php }?>
<div class="row">
	<?php
	    $sql = mysqli_query($conn,"SELECT * FROM detailsproduct WHERE detailsproduct.id_producttype=".$_GET["id"].";");
        while($row = mysqli_fetch_array($sql)){
            ?>
     
              

            <div class="col-4">
                <a href="index.php?xem=detailsproduct&id_product=<?php echo $row['id_product'] ?>"><img src="img/<?php echo $row['img'] ?>" width="200" height="228"></a><br>
                <center>
                <a href="index.php?xem=detailsproduct&id_product=<?php echo $row['id_product'] ?>"><p style="font-weight: bold; font-size: 18px;;"><?php echo $row ['name_product'] ?></p></a>
                <p><?php echo $row['title'] ?></p> 
                <p><span class="btn btn-default" role="button"><?php echo $row['price'] ?></span> <a href="#" class="btn btn-default" role="button">Đặt hàng</a></p> 
                </center>
            </div>
            <?php
            }
            ?>
        </div>
