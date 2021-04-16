<?php 
	if(isset($_POST['dangky'])){
		$tenkhachhang=$_POST['hoten'];
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$email=$_POST['email'];
		$sdt=$_POST['sdt'];
		$diachi=$_POST['diachi'];
		$sql="INSERT INTO tbl_dangky(tenkhachhang,email,diachi,sdt,username,password) VALUE('".$tenkhachhang."','".$email."','".$diachi."','".$sdt."','".$username."','".$password."')";
		$sql_dangky=mysqli_query($mysqli,$sql);
		if($sql_dangky){
			echo '<p style="color:green">Bạn đã đăng ký thành công </p>';
		}
	}
?>

<h3>Đăng ký thành viên</h3>
<style type="text/css">
	table.dangky tr td{
		padding:5px;
	}
</style>
<form action="" method="POST">
	<table class="dangky" border="1" style="border-collapse: collapse;" width="50%">
		<tr>
			<td>Họ và tên</td>
			<td><input required="" type="text" name="hoten" size="50"></td>
		</tr>
		<tr>
			<td>Username</td>
			<td><input required="" type="text" name="username" size="50"></td>
		</tr>
		<tr>
			<td>Password</td>
			<td><input required="" type="password" name="password" size="50"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input required="" type="text" name="email" size="50"></td>
		</tr>
		<tr>
			<td>Số điện thoại</td>
			<td><input required="" type="text" name="sdt" size="50"></td>
		</tr>
		<tr>
			<td>Địa chỉ</td>
			<td><input required="" type="text" name="diachi" size="50"></td>
		</tr>
		<tr>
			<td><input required="" type="submit" name="dangky" size="50" value=" Đăng ký"></td>
			<td><a href="index.php?quanly=dangnhap">Đăng nhập nếu đã có tài khoản</a></td>
		</tr>
	</table>
</form>