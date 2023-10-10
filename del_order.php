<?php

require('./db/connect.php');
$id=isset($_GET['id'])?$_GET['id']:'';
$sql ="
DELETE FROM orders
WHERE
orders.id='{$id}'

";
if ($result) {
 header('location:order.php');
 }else{
     header('location:order.php');
 }
$result= $conn->query($sql);