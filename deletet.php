<?php
require("db.php");
$save=$_GET['deleteid'];
echo $save;
$res=mysqli_query($db,"DELETE FROM teachers WHERE name='$save' ");
header('location:registerworker.php')

?>