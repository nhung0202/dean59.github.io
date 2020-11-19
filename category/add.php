

<?php 
    require_once __DIR__ ."/../../autoload/autoload.php"; 
    ?>
<!-------------------------------------------Header-------------------------------------------------------->
<?php  require_once __DIR__ ."/../../layouts/header.php";  ?>
<!---------------------------------------content--------------------------------------------------------->
<div _ngcontent-c10="" class="col-xl-12">
    <br>
    <h2 _ngcontent-c10="" class="page-header"> Thêm danh mục mới </h2>
    <br>
    <ol _ngcontent-c10="" class="breadcrumb">
        <li _ngcontent-c10="" class="breadcrumb-item"><i _ngcontent-c10="" class="fa fa-dashboard"></i><a _ngcontent-c10="" >Dashboard</a></li>
        <li _ngcontent-c10="" class="breadcrumb-item "><i _ngcontent-c10="" class="fa fa-edit"></i> Danh mục</li>
        <li _ngcontent-c10="" class="breadcrumb-item active"><i _ngcontent-c10="" class="fa fa-edit"></i> Thêm mới</li>
    </ol>
    <br><br>
    <?php 
        if(isset($_GET['submit']))
        {                        
            $Conn = mysqli_connect("localhost","root","","nhung");
            mysqli_set_charset($Conn, 'UTF8');
        
            $sql = mysqli_query($Conn, "INSERT INTO producttype(producttypename) VALUES('".$_GET['name']."');");
        
            echo "<center><h2>Thêm danh mục mới thành công !</h2></center>";
            mysqli_close($Conn);
        }
        else
        {
        ?>
    <strong>THÊM DANH MỤC MỚI</strong>
    <form>
        <div class="form-group" >
            <label> Tên danh mục:</label>
            <input type="text" name="name"  autofocus required>
        </div>
        <input class="btn btn-success" type="submit" name="submit" value="Thêm mới">
    </form>
    <?php
        }
        ?>
</div>
</div>
</div>
<!---------------------------------footer--------------------------------------------------------------------->
<?php require_once __DIR__ ."/../../layouts/footer.php"; ?>

