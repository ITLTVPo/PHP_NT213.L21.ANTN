<?php 
	if(isset($_POST['dangnhap'])){
		$taikhoan=$_POST['username'];
		$matkhau=md5($_POST['password']);
		$sql="SELECT * FROM tbl_dangky WHERE username='".$taikhoan."'AND password='".$matkhau."' LIMIT 1";
		$query=mysqli_query($mysqli,$sql);
		$count=mysqli_num_rows($query);
		if($count>0){
			$_SESSION['dangnhap']=$taikhoan;
			header("Location:index.php");
		}else{
			echo '<p style="color:red">  Tài khoản hoặc mật khẩu không chính xác</p>';
		}
	}
?>
<form action="" method="POST">
			<table border="1" class="login" style="text-align: center;border-collapse: collapse;padding: 10px;margin: 10px;width: 50%">
				<tr>
					<td colspan="2"><h3>Đăng nhập</h3></td>
				</tr>
				<tr>
					<td>Tải khoản</td>
					<td><input style="width: 95%" required="" type="text"  name="username" placeholder="username..."></td>
				</tr>
				<tr>
					<td>Mật khẩu</td>
					<td><input style="width: 95%" required="" type="password"  name="password" placeholder="password..."></td>
				</tr>
				<tr>
					<td colspan="2" > <input type="submit" name="dangnhap" value="Đăng nhập"></td>
				</tr>
			</table>
		</form>