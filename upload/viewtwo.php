<?php

require 'connection.php';

$id = isset($_GET['id'])? $_GET['id'] : "";

$query = "select * from otherdoc where id=$id";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
header('Content-Type:'.$row['mime']);
echo $row['data'];
//@readfile($row['data']);
 ?>
