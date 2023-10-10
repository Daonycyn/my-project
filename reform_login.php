<?php
session_start();
require('./db/connect.php');
$user=isset($_POST['user'])?$_POST['user']:'';
$pass=isset($_POST['pass'])?$_POST['pass']:'';
$sql="
SELECT *
FROM
users
WHERE
users.user='{$user}'
AND
users.pass='{$pass}'

";
$result=$conn->query($sql);
if ($result->num_rows>0) {
    foreach ($result as $key => $value) {
       $_SESSION['login_id']=$value['id'];
       $_SESSION['login_fname']=$value['fname'];
    }
    echo json_encode(['status'=>'ok']);
    
    
}else {
    echo json_encode(['status'=>'notok']);
    
   
}
?>
