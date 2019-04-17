<?php

$con = mysql_connect("localhost","root","");
if (!$con) echo "Not Connect DATABASE";else echo "LocalHost Connected<br>";
$database = mysql_select_db("euroshoes");
if (!$database) echo "Error DATABASE";else echo "DB Connected";

?>