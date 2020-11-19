

<?php
    session_start();
    if(!isset($_SESSION['loginadmin'])){
        header('location:loginadmin.php');
    }else{
        echo 'Xin chào admin <strong>' .$_SESSION['loginadmin'].'</strong>';
    } 
      ?>
<?php 
    require_once __DIR__ ."/../../autoload/autoload.php"; 
     ?>
<!-------------------------------------------Header-------------------------------------------------------->
<?php  require_once __DIR__ ."/../../layouts/header.php";  ?>
<!---------------------------------------content--------------------------------------------------------->
<div _ngcontent-c10="" class="col-xl-12">
    <br>
    <span>
        <h2 _ngcontent-c10="" class="page-header"> Danh mục sản phẩm </h2>
    </span>
    <button class="btn btn-success" style="float: right;"><a href="add.php" style="color: #ffffff">Thêm mới</a></button><br><br>
    <ol _ngcontent-c10="" class="breadcrumb">
        <li _ngcontent-c10="" class="breadcrumb-item"><i _ngcontent-c10="" class="fa fa-dashboard"></i><a _ngcontent-c10="">Dashboard</a></li>
        <li _ngcontent-c10="" class="breadcrumb-item active"><i _ngcontent-c10="" class="fa fa-edit"></i> Danh sách danh mục</li>
    </ol>
</div>
<table class="table table-striped" border="1px">
    <tr>
        <th>Mã danh mục</th>
        <th>Tên danh mục</th>
        <th colspan="2">Tùy chọn</th>
    </tr>
    <?php
        $conn = @mysqli_connect("localhost","root","","nhung");
        mysqli_set_charset($conn, 'UTF8');
        $sql= mysqli_query($conn,"SELECT * from producttype ");
        while($row = mysqli_fetch_assoc($sql))
        {               
          echo "<tr><td><center>".$row['id_producttype']."</center></td>";
          echo"<td>".$row['producttypename'].'</td>';
        
          echo'<td><a href ="edit.php?id='.$row['id_producttype'].'">Sửa</a></td>';
          echo'<td><a href="delete.php?id='.$row['id_producttype'].'">Xóa</a></td></tr>';
        }
        
        ?>
</table>
<!---------------------------------footer--------------------------------------------------------------------->
<?php require_once __DIR__ ."/../../layouts/footer.php"; ?>

