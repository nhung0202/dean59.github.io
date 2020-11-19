<?php
    session_start();
    error_reporting(0);
?>
<h1><strong>Giỏ hàng</strong></h1>
<?php
if(isset($_SESSION['login'])){ 
    echo '<span style="color:#7952b3; font-size: 20px;">Hello </span>'.$_SESSION['login'];
    echo'<button class="btn btn-success" style="float: right;"><a href="index.php?xem=cart&thoat=1" style="color: #ffffff">Đăng xuất</a></button><br><br>';
}
echo '<table class="table">';

    echo '<thead class="navbar navbar-dark bg-dark" style="background:#5d7b76; color: #ffffff; font-weight: bold;">';
        echo '<td scope="col"><div align="center">Mã sản phẩm</div></td>';
        echo '<td scope="col"><div align="center">Ảnh sản phẩm</div></td>';
        echo '<td scope="col"><div align="center">Tên sản phẩm</div></td>';
        echo '<td scope="col"><div align="center">Giá</div></td>';
        echo '<td scope="col"><div align="center">số lượng</div></td>';
        echo '<td scope="col"><div align="center">Tổng tiền</div></td>';
        echo '<td colspan="3"><div align="center">Sửa</div></td>';
    echo '</thead>';

    //session_destroy();
    if(isset($_GET['add1'])&&!empty($_GET['add1'])){
        $id=$_GET['add1'];
        @$_SESSION['cart'.$id]+=1;
        header('location:index.php?xem=cart');
    }
    $valueall=0;
    $totalall=0;
    //đăng xuất 
    if(isset($_GET['thoat'])&&$_GET['thoat']==1){
        unset($_SESSION['login']);
        header('location:index.php?xem=cart');
    }
    //cộng số lượng sản phẩm
    if(isset($_GET['cong'])){
        $_SESSION['cart'.$_GET['cong']]+=1;
    header('location:index.php?xem=cart');
    }
    //trừ số lượng sản phẩm
    if(isset($_GET['tru'])){
        $_SESSION['cart'.$_GET['tru']]--;
    header('location:index.php?xem=cart');
    }
    //xóa sản phẩm
    if(isset($_GET['xoa'])){
        $_SESSION['cart'.$_GET['xoa']]=0;
    header('location:index.php?xem=cart');
    }
    //xóa toàn bộ giỏ hàng
    if(isset($_GET['xoatoanbo'])&&$_GET['xoatoanbo']==1){
        session_destroy();
    header('location:index.php?xem=cart');
    }
    //hiển thị sản phẩm đã chọn
    $i=0;
    foreach($_SESSION as $name1 => $value1){
    $i++;   
        if($value1>0){
            if(substr($name1,0,4)=='cart'){
                $id=substr($name1,4,strlen($name1)-4);
                $sql="SELECT * FROM detailsproduct WHERE id_product='".$id."'";
                $run=mysqli_query($conn, $sql);
                while($row=mysqli_fetch_array($run)){
 
            echo'<tr>';
                echo'<td ><div align="center">'.$i.'</div></td>';
                
                echo'<td><div align="center"><img src="img/'.$row['img'].'" width="100" height="100" /></div></td>';

                echo'<td><div align="center">'.$row['name_product'].'</div></td>';

                echo'<td><div align="center">'.number_format($row['price']).'VND </div></td>';
                '<td><input type="hidden" name="id_product" value="'.$row['id_product'].'"></td>';

                echo'<td><div align="center">'.$value1 .'</div></td>';

                echo'<td><div align="center">'.number_format($total=$row['price']*$value1).'VND </div></td>';

                echo'<td><a href="index.php?xem=cart&cong='.$id.'" style="margin-right:2px;"><img src="img/plus.png" width="40"; height="40"></a>';
                echo'<td><a href="index.php?xem=cart&tru='.$id.'" style="margin-right:2px;"><img src="img/subtract.png" width="40"; height="40"></a>';
                echo'<td><a href="index.php?xem=cart&xoa='.$id.'" style="margin-right:2px;"><img src="img/deletered.png" width="40"; height="40"></a>';
            echo'</tr>';
            
                }
            }
            
  $valueall=$valueall+ $value1;
  $totalall+=$total;
        }
    }
  
  ?><br>
   
  <tr>
    <td colspan="4" style="font-weight: bold; font-size: 20px;">Tổng thanh toán</td>
    <td><div align="center"><?php echo $valueall ?> </div></td>
    <td><div align="center"><?php echo number_format($totalall) ?> VND </div></td>
    <td colspan="3"></td>
  </tr>

  </table>
 </div>
<button type="button" class="btn btn-danger" ><a href="index.php?xem=cart&xoatoanbo=1" style="color:black">Xóa toàn bộ</a></button> <br>
<?php
    if(isset($_SESSION['login'])){
?>
 <button type="button" class="btn btn-success" style="float:right; margin-right: 50px; "><a href="index.php?xem=infororder" style="color:#000;margin:5px;">Đặt hàng</a></button>
<?php
    }
?>
<br>
 (*Hãy đăng nhập để mua hàng bạn nhé !*)<br><br>

<ul class="control">
              <p><a href="index.php">Tiếp tục mua hàng</a></p>
                <p><a href="?xem=signup">Đăng ký mới/</a><a href="?xem=login">Đăng nhập</a></p>
                
            </ul>
    
        </div>
    

