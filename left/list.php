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
	$sql_producttype="SELECT * FROM producttype ";
	$query=mysqli_query($conn,$sql_producttype);

?>
<p class="left-titleproduct">Danh mục</p>
    <div class="left-listproduct">
        <ul>
        <?php
			while ($row_product=mysqli_fetch_array($query)){
        ?>
           <li><a href="index.php?xem=detailsofproducttype&id=<?php echo $row_product['id_producttype'] ?>"><button class="left-dropbtn"><?php echo $row_product['producttypename']?></button></a></li>
                      <?php
			}
                      ?>
                    </ul> 
               </div>
           