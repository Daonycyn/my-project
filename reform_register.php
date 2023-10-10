<?php
require('./db/connect.php');
$fname=isset($_POST['fname'])?$_POST['fname']:'';
$user=isset($_POST['user'])?$_POST['user']:'';
$pass=isset($_POST['pass'])?$_POST['pass']:'';

$sql="
INSERT INTO users(
users.fname,
users.user,
users.pass
    )VALUES(
        '{$fname}',
        '{$user}',
        '{$pass}'
        )
";
$result=$conn->query($sql);
if ($result) {
    header('location:login.php');
} else {
    header('location:register.php');
}

?>