<?php

require('./db/connect.php');
$id=isset($_POST['id'])?$_POST['id']:'';
$price=isset($_POST['price'])?$_POST['price']:'';
$login_id=isset($_POST['login_id'])?$_POST['login_id']:'';

$sql="
INSERT INTO orders(
orders.user_id,
orders.pro_id,
orders.pro_price
    )VALUE(
'{$login_id}',
'{$id}',
'{$price}'
        )
";
$result=$conn->query($sql);

if($result){
    echo json_encode(['status'=>'ok']);
}else {
    echo json_encode(['status'=>'notok']);
}
?>