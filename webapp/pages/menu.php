<?php 
	$sql_danhmuc="SELECT * FROM tbl_danhmuc ORDER BY id_danhmuc ASC";
	$query_danhmuc=mysqli_query($mysqli,$sql_danhmuc);
?>
<?php 
	if(isset($_GET['dangxuat']) &&  $_GET['dangxuat']==1){
		unset($_SESSION['dangnhap']);
		header("location:index.php");
	}
?>
<div class="menu">
	<ul class="list_menu">
		<li><a href="index.php">Trang chủ</a></li>
		<?php 
			while($row_danhmuc=mysqli_fetch_array($query_danhmuc)){
		?>
		<li><a href="index.php?quanly=danhmucsanpham&id=<?php echo $row_danhmuc['id_danhmuc'] ?>"><?php echo $row_danhmuc['tendanhmuc'] ?></a></li>
		<?php 
			}
		?>

		<?php 
			if(isset($_SESSION['dangnhap'])){
		?>
			<li><a href="index.php?dangxuat=1">Đăng xuất</a></li>
			<li><a href="index.php?quanly=profile">My profile</a></li>
		<?php 
			}else{	
		?>
			<li><a href="index.php?quanly=dangky">Login/Signup</a></li>
		<?php
			} 
		?>
		<li><a href="index.php?quanly=giohang">Giỏ hàng</a></li>
	</ul>
	<p>
		<form action="index.php?quanly=timkiem" method="POST">
			<input type="text" required="" placeholder="Tìm kiếm sản phẩm" name="tukhoa" style="float: right;" >
			<input type="submit"  name="timkiem" value="Tìm kiếm" style="float: right;" >			
		</form>
	</p>
</div>