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
	<title>Add Brand</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Add a Brand</h1>
	<form action="process.php" method="POST">
	<input type="text" name="a-brand" placeholder="Enter Brand">
	<input type="submit" value="ADD">
	</form>
	<br>
	<?php
		include('connection.php');
		$que = mysql_query("select * from brand") or die("Error".mysql_error());
		echo "<table>";
		echo "<tr>";
		echo "<th>S/no</th>
		<th>Brand Name</th>";
		echo "</tr>";
		$counter = 1;
		while ($fec=mysql_fetch_array($que))
		{
			$up_brand = $fec[0];
			echo "<tr>";
			echo "<td>".$counter++."</td>";
			echo "<td>".$fec[1]."</td>";
			echo "<td><a href =up-brand.php?id=".$up_brand.">Update</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	?>
</body>
</html>