<?php
    header("Content-type: text/html; charset=utf-8");
    $localhostname='localhost';
    $accoutname='root';
    $pass='';
    $database='nhung';
    $conn=mysqli_connect($localhostname,$accoutname,$pass,$database);
    mysqli_set_charset($conn, 'UTF8');
?>
<div class="wrap">
		    <div class="content">  
         <img src="/new/img/connie_02.png" alt="ảnh giới thiệu">

<div class="small-container">


     <h2 class="title">Sản phẩm mới nhất</h2>
        <div class="row">
            
              <?php
        $sql_product_new = mysqli_query($conn,"SELECT * FROM detailsproduct ORDER BY created DESC limit 0,8;");
        while($row_product_new = mysqli_fetch_array($sql_product_new)){
            ?>
            
    <div class="col-4  ">

        <a href="index.php?xem=detailsproduct&id_product=<?php echo $row_product_new['id_product'] ?>" >
            <img src="/new/img/<?php echo $row_product_new['img']?>" width="200" height="228">
            <p style="color: black; font-size: 18px;"><b><?php echo $row_product_new['name_product'] ?></b></p><br>
            <p style="color: black;"><?php echo $row_product_new['title'] ?></p>
            <p> <span class="btn btn-success" role="button"><?php echo $row_product_new['price'] ?> VND</span>
                <a href="index.php?xem=detailsproduct&id_product=<?php echo $row_product_new['id_product']?>" class="btn btn-default" role="button">Chi Tiết</a>
                <span class="products-info"><a  class="cart" href="index.php?xem=cart&add1=<?php echo $row_product_new['id_product']?>"> </a></span>
            </p> 
        </a>       
    </div>
          <?php
            }
            ?>
        </div>

        <br><br><br>
            
        <h2 class="title">Sản phẩm bán chạy</h2>
        <div class="row">
                <?php
        $sql_product_bestselling = mysqli_query($conn,"SELECT * FROM detailsproduct,tbl_order WHERE detailsproduct.id_product = tbl_order.id_product GROUP BY tbl_order.id_product ORDER BY tbl_order.quatity DESC limit 0,8;");
        while($row_product_bestselling = mysqli_fetch_array($sql_product_bestselling)){
            ?>
    <div class="col-4  ">
        <a href="index.php?xem=detailsproduct&id_product=<?php echo $row_product_bestselling['id_product'] ?>" >
            <img src="/new/img/<?php echo $row_product_bestselling['img']?>" width="200" height="228">
            <p style="color: black; font-size: 18px;"><b><?php echo $row_product_bestselling['name_product'] ?></b></p><br>
            <p style="color: black;"><?php echo $row_product_bestselling['title'] ?></p>
            <p> <span class="btn btn-success" role="button"><?php echo $row_product_bestselling['price'] ?> VND</span>
                <a href="index.php?xem=detailsproduct&id_product=<?php echo $row_product_bestselling['id_product']?>" class="btn btn-default" role="button">Chi Tiết</a>
                <span class="products-info"><a  class="cart" href="index.php?xem=cart&add1=<?php echo $row_product_bestselling['id_product']?>"> </a></span>
            </p> 
        </a>       
    </div>
            <?php
            }
            ?>
        </div>
        
        <br><br><br>
     </div> 
    </div>
     
<h2 class="title">Sản phẩm nổi bật</h2>
       <div class="row">
            
                <?php
        $sql_product_hot = mysqli_query($conn,"SELECT * FROM detailsproduct WHERE hot= 1 limit 0,8;");
       
        while($row_product_hot = mysqli_fetch_assoc($sql_product_hot)){
            ?>
    <div class="col-4  ">

        <a href="index.php?xem=detailsproduct&id_product=<?php echo $row_product_hot['id_product'] ?>" >
            <img src="/new/img/<?php echo $row_product_hot['img']?>" width="200" height="228">
            <p style="color: black; font-size: 18px;"><b><?php echo $row_product_hot['name_product'] ?></b></p><br>
            <p style="color: black;"><?php echo $row_product_hot['title'] ?></p>
            <p> <span class="btn btn-success" role="button"><?php echo $row_product_hot['price'] ?> VND</span>
                <a href="index.php?xem=detailsproduct&id_product=<?php echo $row_product_hot['id_product']?>" class="btn btn-default" role="button">Chi Tiết</a>
                <span class="products-info"><a  class="cart" href="index.php?xem=cart&add1=<?php echo $row_product_hot['id_product']?>"> </a></span>
            </p> 
        </a>       
    </div>
            <?php
            }
            ?>
        </div><br>

</div>