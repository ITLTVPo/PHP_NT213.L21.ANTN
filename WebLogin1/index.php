<?php
	include_once 'header.php';
	?>		
		<?php
			if(isset($_SESSION["userId"])){
				echo "<h1> Hello Mr." . $_SESSION["userUid"] . "</h1>";
			}

			else{
				echo "<h1> Hello! </h1>";
			}
		?>
<?php
	include_once 'footer.php';
	?>