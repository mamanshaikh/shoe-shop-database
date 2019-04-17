<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Article</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Add a Article</h1>
	<form action="process.php" method="POST">
		<?php
		include('connection.php');

		$que=mysql_query("SELECT Bname,ID FROM brand") or die ("Error".mysql_error());
		echo "<select name='a-bid'>";
		while ($fecth=mysql_fetch_array($que))
		{
			echo "<option value='".$fecth[1]."'>".$fecth[0]."</option>";
		}
		echo "</select>";


		?>
	<input type="text" name="a-article" placeholder="Enter Article">
	<input type="submit" value="ADD">
	</form>
	<br>
	<?php
		include('connection.php');
		$que = mysql_query("SELECT article.ID,Bname,A_NO from article,brand WHERE brand.ID=article.BID") or die("Error".mysql_error());
		echo "<table>";
		echo "<tr>";
		echo "<th>S/no</th>
		<th>Brand ID</th>
		<th>Article</th>";
		echo "</tr>";
		$counter = 1;
		while ($fec=mysql_fetch_array($que))
		{
			$aidu = $fec[0];
			$didu = $fec[0];
			echo "<tr>";
			echo "<td>".$counter++."</td>";
			echo "<td>".$fec[1]."</td>";
			echo "<td>".$fec[2]."</td>";
			echo "<td><a href=article_update.php?idaidu=".$aidu.">update</a></td>";
			echo "<td><a href=process.php?id=".$didu.">Delete</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	?>

</body>
</html>