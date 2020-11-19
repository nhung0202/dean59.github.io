

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
        <h2 _ngcontent-c10="" class="page-header"> Sản phẩm </h2>
    </span>
    <button class="btn btn-success" style="float: right;"><a href="add.php" style="color: #ffffff">Thêm mới</a></button><br><br>
    <ol _ngcontent-c10="" class="breadcrumb">
        <li _ngcontent-c10="" class="breadcrumb-item"><i _ngcontent-c10="" class="fa fa-dashboard"></i><a _ngcontent-c10="">Dashboard</a></li>
        <li _ngcontent-c10="" class="breadcrumb-item active"><i _ngcontent-c10="" class="fa fa-edit"></i> Danh sách sản phẩm</li>
    </ol>
</div>
<table class="table table-striped" border="1px">
            <tr align="center">
            <th>Mã</th>
            <th>Tên sản phẩm</th>
            <th>Danh mục</th>
            <th>Ảnh</th>
            <th>Mô tả</th>
            <th>Giá</th>
            <th>Kho</th>
            <th colspan="2">Tùy chọn</th>
            </tr>
<center></center>
<?php
            $conn = @mysqli_connect("localhost","root","","nhung");
            mysqli_set_charset($conn, 'UTF8');
            $sql= mysqli_query($conn,"SELECT * from detailsproduct,producttype WHERE detailsproduct.id_producttype = producttype.id_producttype ORDER BY detailsproduct.id_product ASC");
            while($row = mysqli_fetch_assoc($sql))
            {                  
              echo"<td><center>".$row['id_product'].'</center></td>';
              echo"<td><center>".$row['name_product'].'</center></td>';
              echo"<td><center>".$row['producttypename'].'</center></td>';  ?>

                  <td><div align="center"><img src="img/<?php echo $row['img'] ?>" width="60" height="60" ></div></td>
    
              <?php       
              echo"<td><center>".$row['description'].'</center></td>';             
              echo"<td><center>".$row['price'].'</center></td>';
              echo"<td><center>".$row['stock'].'</center></td>';

              echo'<td><a href ="edit.php?id_product='.$row['id_product'].'">Sửa</a></td>';
              echo'<td><a href="delete.php?id_product='.$row['id_product'].'">Xóa</a></td></tr>';
              
            }

            ?>
   </table>         
<!---------------------------------footer--------------------------------------------------------------------->
<?php require_once __DIR__ ."/../../layouts/footer.php"; ?>

