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
	<title>Add Dealer</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<h1>Add a Dealer</h1>
	<form action="process.php" method="POST">
	<input type="text" name="a-dealer" placeholder="Enter Dealer">
	<input type="submit" value="ADD">
	</form>
	<br>
	<?php
		include('connection.php');
		$que = mysql_query("select * from dealer") or die("Error".mysql_error());
		echo "<table>";
		echo "<tr>";
		echo "<th>S/no</th>
		<th>Dealer Name</th>";
		echo "</tr>";
		$counter = 1;
		while ($fec=mysql_fetch_array($que))
		{
			$up_dealer = $fec[0];
			echo "<tr>";
			echo "<td>".$counter++."</td>";
			echo "<td>".$fec[1]."</td>";
			echo "<td><a href =up-dealer.php?id=".$up_dealer.">Update</a></td>";
			echo "</tr>";
		}
		echo "</table>";
	?>

</body>
</html>