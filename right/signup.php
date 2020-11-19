<?php
	$localhostname='localhost';
	$accoutname='root';
	$pass='';
	$database='nhung';
	$conn=mysqli_connect($localhostname,$accoutname,$pass,$database);
	if(isset($_POST['signup'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		if ( $email == "" || $password == "" ) {
			echo "Bạn vui lòng nhập đầy đủ thông tin";
  		}else{
			// Kiểm tra tài khoản đã tồn tại chưa
			$sql="SELECT * FROM signup WHERE email='$email'";
			$kt=mysqli_query($conn, $sql);
			if(mysqli_num_rows($kt)  > 0){
				echo '<p style="color:red"><strong>Tài khoản đã tồn tại. Mời đăng kí lại</strong></p>';
				
			//Kiểm tra định dạng email
			}else{
				$email_temple = '/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.com)$/';
				
				$password_temple='/^[A-Za-z0-9.!@#$%^&*()]{6,20}$/';
				if(preg_match($email_temple ,$email, $matchs)&&preg_match($password_temple ,$password, $matchs)){
   					$sql_signup="INSERT INTO signup (email,password) VALUES('$email', '$password')";
					$run_signup=mysqli_query($conn,$sql_signup);
					if ($run_signup){
					  header('location:index.php?xem=login');
					}
				}else{ 
					echo "Định dạng Email hoặc Password không đúng"; 
				} 
			}
		}
	}
?>
<div class="title" align="center" style="font-size:18px">
<strong>WELCOME TO SIGN UP</strong></div>

<div class="signup">
<p style="color:red;margin:5px;">Các mục dấu * là bắt buộc tối thiểu. Vui lòng điền đầy đủ và chính xác.</p>
<div class="table-responsive">
<form action="index.php?xem=signup" method="post" enctype="multipart/form-data">
    <table class="table table-bordered table-hover" style="width:1100">
        <tr>
            <td>Email <strong style="color:red;"> (*)</strong></td>
            <td width="60%"><input type="text" name="email" size="50"></td>
        </tr>
        <tr>
            <td>Password<strong style="color:red;"> (*)</strong></td>
            <td width="60%"><input type="password" name="password" size="50"></td>
        </tr>
        <td colspan="2"><p align="center"><input type="submit" name="signup" value="SIGN UP" /></p></td>
        </tr>
    </table>
</form>
</div>
<p><strong>Password:</strong> gồm ít nhất 6 kí tự, chữ hoa chữ thường và các kí tự đặc biệt:<strong>.!@#$%^&*() </strong>.</p>
<p><strong>Email:</strong> đúng định dạng. Ví dụ: nguyenvanxxxxx@xxxxx.com</br>.</p>
