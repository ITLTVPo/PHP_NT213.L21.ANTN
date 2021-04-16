<h3 style="margin:10px;padding: 20px;text-align: center;">Thông tin người dùng</h3>
<?php 
	$sql_chitiet="SELECT * FROM tbl_dangky LIMIT 1";
	$query_chitiet=mysqli_query($mysqli,$sql_chitiet);
	while($row_chitiet=mysqli_fetch_array($query_chitiet)){
?>
<div class="wrapper_chitiet">
	
	<div class="chitiet_user" style="font-size: 15px">
		<p style="font-size: 18px;">Họ và tên : <?php echo $row_chitiet['tenkhachhang'] ?></p>
		<p style="font-size: 18px;">Email: <?php echo $row_chitiet['email'] ?></p>
		<p style="font-size: 18px;">Địa chỉ : <?php echo $row_chitiet['diachi'] ?></p>
		<p style="font-size: 18px;">Số điện thoại : <?php echo $row_chitiet['sdt'] ?></p>
	</div>
</div>
<?php 
} 
?>