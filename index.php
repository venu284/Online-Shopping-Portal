<?php
		include 'includes/header.php';
		include 'includes/left-bar.php';
		include 'config/database.php';
?>
	<div class="col-md-10" style="background:#808080;min-height:570px;">
	
		<br/>
		<?php
		    $data=$_SESSION['sid'];
			
			$res=mysqli_query($link,"select * from product c where model in (select distinct b.model from cart a,product b 
			where a.pid=b.id )")or die(mysql_error());
			while($arr=mysqli_fetch_row($res))
			{
				echo "<div class='col-md-3 game'>";
					echo "<div class='game-price'>&#8377;$arr[3]</div>";
					echo "<a href='$arr[2]'><img src='$arr[2]'/></a>";
					echo "<div class='game-title'><u>$arr[0]</u> $arr[4]</div>";
					if(!isset($_SESSION['sadmin']))
					{	
						echo "<form action='user/addToCart.php'>";
							echo "<div class='game-add' style='float:left;'><button name='subject' value ='$arr[0]' class='btn btn2' type='submit'>Add To Cart</button></div>";
						echo "</form>";
						echo "<form action='user/addToWishlist.php'>";
							echo "<div class='game-add' style='float:right;'><button name='subject' value='$arr[0]' class='btn btn2' type='submit'><img src='images/icons/9.png' style='height:20px;width:20px;float:right;'></button></div>";
						echo "</form>";
					}
				echo "<br/></div>";
			}
		?>
	</div>
<?php include 'includes/footer.php'?>			

