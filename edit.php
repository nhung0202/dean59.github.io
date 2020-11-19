

<?php 
    require_once __DIR__ ."/../../autoload/autoload.php"; 
     ?>
<!-------------------------------------------Header-------------------------------------------------------->
<?php  require_once __DIR__ ."/../../layouts/header.php";  ?>
<!---------------------------------------content--------------------------------------------------------->
<div _ngcontent-c10="" class="col-xl-12">
    <br>
    <h2 _ngcontent-c10="" class="page-header"> Sửa danh mục </h2>
    <br>
    <ol _ngcontent-c10="" class="breadcrumb">
        <li _ngcontent-c10="" class="breadcrumb-item"><i _ngcontent-c10="" class="fa fa-dashboard"></i><a _ngcontent-c10="">Dashboard</a></li>
        <li _ngcontent-c10="" class="breadcrumb-item "><i _ngcontent-c10="" class="fa fa-edit"></i> Danh mục</li>
        <li _ngcontent-c10="" class="breadcrumb-item active"><i _ngcontent-c10="" class="fa fa-edit"></i> Sửa</li>
    </ol>
    <br><br>
            <?php

            $Conn = mysqli_connect("localhost","root","","nhung");
            mysqli_set_charset($Conn, 'UTF8');
            if(isset($_GET['submit']))
            {
                $sql = mysqli_query($Conn, "UPDATE detailsproduct SET name_product='".$_GET['name_product']."',  description= '".$_GET['description']."', img ='".$_GET['img']."', price='".$_GET['price']."',stock='".$_GET['stock']."' WHERE id_product='".$_GET['id_product']."';");
                echo "<center><h2>Bạn đã cập nhật thành công !</h2></center>";
            }

            else
            {
                $sql = mysqli_query($Conn, "SELECT * FROM detailsproduct where id_product='".$_GET['id_product']."'");
                while($row = mysqli_fetch_assoc($sql))
                {
                ?>
    <h2><strong>Cập nhật danh mục sản phẩm</strong></h2>
    <br>
<form>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputID">Mã sản phẩm</label>
      <input type="text" readonly class="form-control" id="inputID"  name="id_product" required value="<?php echo $_GET['id_product'];?>">
    </div>
    <div class="form-group col-md-4">
      <label for="inputName">Tên sản phẩm</label>
      <input type="text" class="form-control" id="inputName" name="name_product" required value="<?php echo $row['name_product'];?>">      
    </div>
    <div class="form-group col-md-4">
      <label for="inputName">Ảnh</label>
      <input type="text" class="form-control" id="inputName" name="img" required>
    </div>
    
  </div>
<div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputState">Danh mục</label>
      <select id="inputState" class="form-control" name="producttypename" required>
                    <option value=""><?php echo $row['producttypename'];?></option>
            <?php
            $Conn = mysqli_connect("localhost", "root", "", "nhung");
            mysqli_set_charset($conn, 'UTF8');
                $sql = mysqli_query($Conn, "SELECT * from producttype;");
                while($row = mysqli_fetch_assoc($sql))
                {?>
                    <option value="<?php echo $row['producttypename'];?>"><?php echo $row['producttypename'];?></option>
                <?php
                }
            ?>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPrice">Giá</label>
      <input type="text" class="form-control" id="inputCity" name="price" required value="<?php echo $row['price'];?>">      
    </div>
    <div class="form-group col-md-2">
      <label for="inputStock">Kho</label>
      <input type="text" class="form-control" id="inputZip" name="stock" required>
    </div>
  </div>
<div class="form-group">
    <label for="inputDescription">Mô tả</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" value="<?php echo $row['description'];?>" name="description" required></textarea>
</div><br>
<center>
  <input class="btn btn-success" type="submit" name="submit" value="Thêm mới">
</center>  
</form>
       <?php
                } 
            }
            mysqli_close($Conn);
            ?>


</div>
<!---------------------------------footer--------------------------------------------------------------------->
<?php require_once __DIR__ ."/../../layouts/footer.php"; ?>

