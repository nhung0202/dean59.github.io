

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
            $sql = mysqli_query($Conn, "UPDATE producttype SET producttypename='".$_GET['name']."'WHERE id_producttype='".$_GET['id']."';");
            echo "<center><h2>Bạn đã cập nhật thành công !</h2></center>";
        }
        
        else
        {
            $sql = mysqli_query($Conn, "SELECT * FROM producttype where id_producttype='".$_GET['id']."'");
            while($row = mysqli_fetch_assoc($sql))
            {
        ?>
    <h2><strong>Cập nhật danh mục sản phẩm</strong></h2>
    <br>
    <form>
        <div class="form-group row">
            <label for="staticId" class="col-sm-2 col-form-label">Mã danh mục</label>
            <div class="col-sm-10">
                <input type="text" readonly name="id" value="<?php echo $_GET['id'];?>">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Tên danh mục</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="inputName" name="name" value="<?php echo $row['producttypename'];?>">
            </div>
        </div>
        <center>
            <input class="btn-success" type="submit" name="submit" value="Cập nhật" >
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

