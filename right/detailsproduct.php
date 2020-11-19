<?php
    header("Content-type: text/html; charset=utf-8");
    $localhostname='localhost';
    $accoutname='root';
    $pass='';
    $database='nhung';
    $conn=mysqli_connect($localhostname,$accoutname,$pass,$database);
    mysqli_set_charset($conn, 'UTF8');    
  $id_sp = $_GET['id_product'];
  $sql_detailsproduct="SELECT * FROM detailsproduct WHERE id_product=$id_sp;";
  $query_detailsproduct=mysqli_query($conn,$sql_detailsproduct);
  $row_detailsproduct=mysqli_fetch_array($query_detailsproduct);
?>
<div class="table-responsive">
    <div class="right-titleproduct" align="center"><strong style="font-size: 28px;">Chi tiết sản phẩm</strong></div><br>
    <table >    
    <tr>
    	<td rowspan="7"><img src="img/<?php echo $row_detailsproduct['img'] ?>" width="400" height="457" /></td>
    <tr>
    <td style="padding-left : 50px; font-size: 18px;"><b><span style="color: #5d7b76; ">Tên sản phẩm : </span> <?php echo $row_detailsproduct['name_product'] ?></b></td>
    </tr>
    <td style="padding-left : 50px; font-size: 18px;"><b><span style="color: #5d7b76; ">Giá :</span> <?php echo $row_detailsproduct['price'] ?> VND</b></td>
    </tr>
    <tr>
        <td style="padding-left : 50px; font-size: 18px;"><b><span style="color: #5d7b76; ">Kho : </span><?php echo $row_detailsproduct['stock'] ?> </b></td>
    </tr>
    <tr>
    	<td colspan="2"><div align="center" style="font-size: 20px; color: #5d7b76;"><b>Mô tả sản phẩm</b></div></td>
    </tr>
    
    <tr>
    	<td colspan="2" style="padding-left: 50px; padding-right: 20px; text-align: justify;"><?php echo $row_detailsproduct['description'] ?></td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: center;">
         <form action="?xem=cart" method="post">
    <fieldset>
        <input type="hidden" name="id_product" value="<?php echo $row_detailsproduct['id_product'] ?>" />
        <input type="hidden" name="name" value="<?php echo $row_detailsproduct['name_product']?>" />        
        <input type="hidden" name="img" value="<?php echo $row_detailsproduct['img']?>" />
        <input type="hidden" name="description" value="<?php echo $row_detailsproduct['description']?>" />
        <input type="hidden" name="price" value="<?php echo $row_detailsproduct['price'] ?>"/>
        <input type="hidden" name="quatity" value="1">
    </fieldset>
    <a href="index.php?xem=cart&add1=<?php echo $row_detailsproduct['id_product']?>"><img src="img/botton/mua_ngay.png" height="80" width="120" style="float:right"></a><br>
    
    </form>   
        </td>
    </tr>
</table>
<br>
<div class="panel panel-primary">
	<div class="panel-body"><strong><p class="right-titleproduct">Sản phẩm liên quan</p></strong></div>
</div> 
<?php
    $id_producttype = $row_detailsproduct['id_producttype'];    
    $sql_lienquan="SELECT * FROM detailsproduct WHERE id_producttype=$id_producttype AND id_product!=$id_sp ORDER BY RAND () LIMIT 3 ";
        $query_lienquan=mysqli_query($conn,$sql_lienquan);
        $count_lienquan=mysqli_num_rows($query_lienquan);
        if($count_lienquan>0){
            
?>
<div class="allproduct" >
        <?php
        while($row_lienquan=mysqli_fetch_array($query_lienquan)){
        ?>
        <div class="col-4 ">

        <a href="index.php?xem=detailsproduct&id_product=<?php echo $row_lienquan['id_product'] ?>" >
            <img src="/new/img/<?php echo $row_lienquan['img']?>" width="200" height="228"><br>
            <p height="50" style="color: black; font-size: 18px;"><b><?php echo $row_lienquan['name_product'] ?></b></p><br>
            <p height="70" style="color: black;"><?php echo $row_lienquan['title'] ?></p><br>
            <div  height="50"> <span class="btn btn-success" role="button"><?php echo $row_lienquan['price'] ?> VND</span>
                <a href="index.php?xem=detailsproduct&id_product=<?php echo $row_lienquan['id_product']?>" class="btn btn-default" role="button">Chi Tiết</a>
                <span class="products-info"><a  class="cart" href="index.php?xem=cart&add1=<?php echo $row_lienquan['id_product']?>"> </a></span>
            </div> 
        </a>       
        </div>
        <?php
            }
        ?>
    </ul>
</div><!-- Ket thuc box sp liên quan -->
	<?php
		}else{
			echo'<p style="padding:30px;">Hiện chưa có thêm sản phẩm nào</p>';
		}
    ?>
      
<div class="clear"></div>
