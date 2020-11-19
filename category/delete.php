<?php 
require_once __DIR__ ."/../../autoload/autoload.php"; 
 ?>
 <!-------------------------------------------Header-------------------------------------------------------->
 <?php  require_once __DIR__ ."/../../layouts/header.php";  ?>

    <!---------------------------------------content--------------------------------------------------------->

 <div _ngcontent-c10="" class="col-xl-12"><br>
    <h2 _ngcontent-c10="" class="page-header"> Xóa danh mục </h2><br>
    <ol _ngcontent-c10="" class="breadcrumb">
        <li _ngcontent-c10="" class="breadcrumb-item"><i _ngcontent-c10="" class="fa fa-dashboard"></i><a _ngcontent-c10="">Dashboard</a></li>
        <li _ngcontent-c10="" class="breadcrumb-item "><i _ngcontent-c10="" class="fa fa-edit"></i> Danh mục</li>
        <li _ngcontent-c10="" class="breadcrumb-item active"><i _ngcontent-c10="" class="fa fa-edit"></i> Xóa</li>
    </ol><br><br>
 <?php
            $Conn = mysqli_connect("localhost", "root", "", "nhung");
            $sql = mysqli_query($Conn, "DELETE FROM producttype where id_producttype='".$_GET['id']."'");
            if ($sql)   
            {
                echo "<center><h2>Xóa thành công !</h2></center>";
            }
            mysqli_close($Conn);
 ?>
               
</div>
<!---------------------------------footer--------------------------------------------------------------------->
<?php require_once __DIR__ ."/../../layouts/footer.php"; ?>
