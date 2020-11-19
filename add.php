

<?php 
    require_once __DIR__ ."/../../autoload/autoload.php"; 
    ?>
<!-------------------------------------------Header-------------------------------------------------------->
<?php  require_once __DIR__ ."/../../layouts/header.php";  ?>
<!---------------------------------------content--------------------------------------------------------->
<div _ngcontent-c10="" class="col-xl-12">
    <br>
    <h2 _ngcontent-c10="" class="page-header"> Thêm sản phẩm mới </h2>
    <br>
    <ol _ngcontent-c10="" class="breadcrumb">
        <li _ngcontent-c10="" class="breadcrumb-item"><i _ngcontent-c10="" class="fa fa-dashboard"></i><a _ngcontent-c10="" >Dashboard</a></li>
        <li _ngcontent-c10="" class="breadcrumb-item "><i _ngcontent-c10="" class="fa fa-edit"></i> Sản phẩm</li>
        <li _ngcontent-c10="" class="breadcrumb-item active"><i _ngcontent-c10="" class="fa fa-edit"></i> Thêm mới</li>
    </ol>
    <br>
<?php 
            if(isset($_GET['submit']))
            {                        
                $Conn = mysqli_connect("localhost","root","","nhung");
                mysqli_set_charset($Conn, 'UTF8');

                $sql = mysqli_query($Conn, "INSERT INTO detailsproduct(id_product,name_product,id_producttype,img, description,price,stock) VALUES('".$_GET['id_product']."','".$_GET['name_product']."','".$_GET['producttypename']."','".$_GET['img']."', '".$_GET['description']."', '".$_GET['price']."', '".$_GET['stock']."');");
                echo "<center><h2>Thêm sản phẩm mới thành công !</h2></center>";
                mysqli_close($Conn);
            }
            else
            {
            ?>
            <center><strong><span style=" color: #33b35a; font-size: 25px;">SẢN PHẨM MỚI</span></strong></center><br>
<form>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label for="inputID">Mã sản phẩm</label>
      <input type="text" class="form-control" id="inputID"  name="id_product" required>
    </div>
    <div class="form-group col-md-4">
      <label for="inputName">Tên sản phẩm</label>
      <input type="text" class="form-control" id="inputName" name="name_product" required>
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
     <option value="">---</option>
            <?php
            $Conn = mysqli_connect("localhost", "root", "", "nhung");
            mysqli_set_charset($conn, 'UTF8');
                $sql = mysqli_query($Conn, "SELECT * from producttype;");
                while($row = mysqli_fetch_assoc($sql))
                {?>
                    <option value="<?php echo $row['id_producttype'];?>"><?php echo $row['producttypename'];?></option>
                <?php
                }
            ?>
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPrice">Giá</label>
      <input type="text" class="form-control"  name="price" required>
    </div>
    <div class="form-group col-md-2">
      <label for="inputStock">Kho</label>
      <input type="text" class="form-control" name="stock" required>
    </div>
  </div>
<div class="form-group">
    <label for="inputDescription">Mô tả</label>
    <textarea class="form-control" rows="3" name="description" required></textarea>
</div><br>
<center>
  <input class="btn btn-success" type="submit" name="submit" value="Thêm mới">
</center>  
</form>
        <?php
    }
    ?>
</div>
<!---------------------------------footer--------------------------------------------------------------------->
<?php require_once __DIR__ ."/../../layouts/footer.php"; ?>

