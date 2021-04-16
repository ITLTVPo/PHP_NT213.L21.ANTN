<?php 
	if(isset($_POST['timkiem'])){
		$tukhoa=$_POST['tukhoa'];
	}
	$sql_product="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'";
	$query_pro=mysqli_query($mysqli,$sql_product);
?>


<h3>Các sản phẩm phù hợp với từ khóa : <?php echo $_POST['tukhoa'] ?></h3>
				<ul class="product_list">
					<?php 
					while($row=mysqli_fetch_array($query_pro)){
					?>
					<li>
						<a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
							<img src="admincpanel/modules/quanlisanpham/uploads/<?php echo $row['hinhanh'] ?>">
							<p class="title_product"><?php echo $row['tensanpham'] ?></p>
							<p class="price">Giá : <?php echo number_format($row['giasp'],0,',','.').' vnd' ?></p>
							<p class="cate_pro" style="text-align: center; font-size: 18px;">Danh mục : <?php echo $row['tendanhmuc'] ?></p>
						</a>
					</li>
					<?php
					} 
					?>
				</ul>