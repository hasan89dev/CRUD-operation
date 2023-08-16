<?php
include "db_con.php";

$get=$_GET['delete_id'];
$delete="DELETE FROM studentt where id=$get";
$ex=mysqli_query($con,$delete);

header('location:index.php');
?>