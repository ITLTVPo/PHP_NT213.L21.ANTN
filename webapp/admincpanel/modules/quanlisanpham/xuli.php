<?php
include('../../config/config.php');
$tensp=$_POST['tensp']; 
$masp=$_POST['masp'];
$giasp=$_POST['giasp'];
$soluong=$_POST['soluong'];
$hinhanh=$_FILES['hinhanh']['name'];
$hinhanh_tmp=$_FILES['hinhanh']['tmp_name'];
$hinhanh=time().'_'.$hinhanh;
$tomtat=$_POST['tomtat'];
$noidung=$_POST['noidung'];
$tinhtrang=$_POST['tinhtrang']; 
$danhmuc=$_POST['danhmuc']; 



if(isset($_POST['themsanpham'])){
	$sql_them="INSERT INTO tbl_sanpham(tensanpham,masp,giasp,soluong,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) VALUE('".$tensp."','".$masp."','".$giasp."','".$soluong."','".$hinhanh."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."')";
	mysqli_query($mysqli,$sql_them);
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
	header('Location:../../index.php?action=quanlysanpham&query=them');
	}
elseif (isset($_POST['suasanpham'])) {
	$id=$_GET['idsanpham'];
	if($hinhanh!=''){
		move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
		$sql_sua="UPDATE tbl_sanpham SET tensanpham='".$tensp."', masp='".$masp."', giasp='".$giasp."',soluong='".$soluong."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."' ,tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='".$_GET[idsanpham]."'";
		$sql="SELECT * FROM tbl_sanpham WHERE id_sanpham='".$_GET[idsanpham]."' LIMIT 1";
		$query=mysqli_query($mysqli,$sql);
		while($row = mysqli_fetch_array($query)){
			unlink('uploads/'.$row['hinhanh']);
		}	
	}else{
		$sql_sua="UPDATE tbl_sanpham SET tensanpham='".$tensp."', masp='".$masp."', giasp='".$giasp."',soluong='".$soluong."',tomtat='".$tomtat."',noidung='".$noidung."' ,tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id_sanpham='$_GET[idsanpham]'";
	}
	mysqli_query($mysqli,$sql_sua);
	header('Location:../../index.php?action=quanlysanpham&query=them');
}else{
	$id=$_GET['idsanpham'];
	$sql="SELECT * FROM tbl_sanpham WHERE id_sanpham='".$id."' LIMIT 1";
	$query=mysqli_query($mysqli,$sql);
	while($row = mysqli_fetch_array($query)){
		unlink('uploads/'.$row['hinhanh']);
	}
	$sql_xoa="DELETE FROM tbl_sanpham WHERE id_sanpham='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlysanpham&query=them');
}
 ?>
