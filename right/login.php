<?php
  $localhostname='localhost';
  $accoutname='root';
  $pass='';
  $database='nhung';
  $conn=mysqli_connect($localhostname,$accoutname,$pass,$database);
  //session_destroy();
  @session_start();
  if(isset($_POST['login'])){
    $email=$_POST['email'];
    $password=$_POST['password'];
    $sql_login="SELECT * from signup where email='$email' and password='$password' limit 1";
    $run_login=mysqli_query($conn, $sql_login);
    $nums_login=mysqli_num_rows($run_login);
    if($nums_login>0){
      $_SESSION['login']=$email;
      header('location:index.php?xem=cart');
    }else{
      echo '<p style="text-align:center;width:auto;padding:30px;background:red;color:#fff;font-size:20px;">Email and Account are wrong </p>';
    }
  }
?>
<div class="title" align="center" >
  <strong>LOGIN FOR CUSTOMERS</strong>
</div>
<div class="table-responsive">
    <form action="" method="post" enctype="multipart/form-data">
        <table class="table table-bordered table-hover" style="width:1100">
            <tr>
                <td width="40%">Email : <strong style="color:red;"> (*)</strong></td>
                <td width="60%"><input type="text" name="email" size="50"></td>
            </tr>
                <td>Mật khẩu : <strong style="color:red;"> (*)</strong></td>
                <td width="60%"><input type="password" name="password" size="50"></td>
            </tr>
            <tr>
              <td colspan="2"><p align="center"><input type="submit" name="login" value="Login" /></p></td>
            </tr>
        </table>
    <i><a href="index.php?xem=signup">Bạn chưa có tài khoản? Đăng kí tài khoản mới</a></i>
    </form>
</div>