<form action="process.php" method="POST">
	<?php

		include('connection.php');

		$aid = $_REQUEST['idaidu'];
		$queb=mysql_query("SELECT ID,Bname FROM brand") or die ("Error".mysql_error());
		//echo "<select name='up-bid'>";

		echo "</select>";
		echo "<br>".$aid."<br>";


		$que = mysql_query("SELECT article.ID,Bname,A_NO From brand,article where article.ID=$aid AND brand.ID=article.BID") or die("Error".mysql_error());
		$fec=mysql_fetch_array($que);

		echo $fec[1];

		echo "<select name='up-bid'>";
		
			echo "<option value='".$fec[0]."'>".$fec[1]."</option>";
		while ($fecth=mysql_fetch_array($queb))
		{
			echo "<option value='".$fecth[0]."'>".$fecth[1]."</option>";
		}
		
		echo "</select>";


	?>
	<input type="hidden" name="up-aid" value="<?php echo $aid;?>">
	<input type="text" name="up-article" value="<?php echo $fec[2]; ?>">
	<input type="submit" value="Update">
</form>