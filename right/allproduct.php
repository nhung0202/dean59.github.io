<?php
	$sql_all="SELECT *FROM detailsproduct";
	$query=mysqli_query($conn,$sql_all);
?>
<div><p class="right-titleproduct">Danh sách sản phẩm</p></div>
<div class="allproduct" >
        <?php
        while($row_all=mysqli_fetch_array($query)){
        ?>
   <div class="col-4 ">

        <a href="index.php?xem=detailsproduct&id_product=<?php echo $row_all['id_product'] ?>" >
            <img src="/new/img/<?php echo $row_all['img']?>" width="200" height="228"><br>
            <p height="50" style="color: black; font-size: 18px;"><b><?php echo $row_all['name_product'] ?></b></p><br>
            <p height="70" style="color: black;"><?php echo $row_all['title'] ?></p><br>
            <div  height="50"> <span class="btn btn-success" role="button"><?php echo $row_all['price'] ?> VND</span>
                <a href="index.php?xem=detailsproduct&id_product=<?php echo $row_all['id_product']?>" class="btn btn-default" role="button">Chi Tiết</a>
                <span class="products-info"><a  class="cart" href="index.php?xem=cart&add1=<?php echo $row_all['id_product']?>"> </a></span>
            </div> 
        </a>       
        </div>

        <?php
        }
        ?>
</div>

