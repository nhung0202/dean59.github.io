

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
        <h2 _ngcontent-c10="" class="page-header"> Danh sách người dùng </h2>
    </span>
    <ol _ngcontent-c10="" class="breadcrumb">
        <li _ngcontent-c10="" class="breadcrumb-item"><i _ngcontent-c10="" class="fa fa-dashboard"></i><a _ngcontent-c10="">Dashboard</a></li>
        <li _ngcontent-c10="" class="breadcrumb-item active"><i _ngcontent-c10="" class="fa fa-edit"></i> Users</li>
    </ol>
</div>
<table class="table table-striped" border="1px">
    <tr>
        <th>Mã người dùng</th>
        <th>Tên người dùng</th>
        <th>Email</th>
        <th>Password</th>
    </tr>
    <?php
        $conn = @mysqli_connect("localhost","root","","nhung");
        mysqli_set_charset($conn, 'UTF8');
        $sql= mysqli_query($conn,"SELECT * from signup ");
        while($row = mysqli_fetch_assoc($sql))
        { 

            echo"<tr><td><center>".$row['id_customer'].'</center></td>';
            echo"<td><center>".$row['name_customer'].'</center></td>';
            echo"<td><center>".$row['email'].'</center></td>';
            echo"<td><center>".$row['password'].'</center></td></tr>';
                }
        
        ?>
</table>
<!---------------------------------footer--------------------------------------------------------------------->
<?php require_once __DIR__ ."/../../layouts/footer.php"; ?>

