<?php

$txtname=isset($_POST['txtname'])?$_POST['txtname']:'';
$txtemail=isset($_POST['email'])?$_POST['email']:'';
$txtarea=isset($_POST['txtarea'])?$_POST['txtarea']:'';

$text="\nชื่อ : ".$txtname."\n";
$text.="เมล์ : ".$txtemail."\n";
$text.="ข้อความ : ".$txtarea."\n";

$message=['message'=>$text];

define('LINE_API',"https://notify-api.line.me/api/notify");  
define('LINE_TOKEN',"FuxpkgMJJL6BKO8HcxgcnwN8ydCnhPvVWjUw6aY3Mvf");  
$queryData = http_build_query($message,'','&');
$headerOptions = array(
    'http' => array(
        'method' => 'POST',
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n"
                    ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                    ."Content-Length: ".strlen($queryData)."\r\n",
        'content' => $queryData
    )
);
$context = stream_context_create($headerOptions);
$result = file_get_contents(LINE_API,FALSE,$context);
$resp = json_decode($result);
if($resp->status == 200)
{
    echo '<script>alert ("ส่งข้อมูลเรียบร้อยแล้ว")</script>';
    header('Refresh:0; url=contact.php');
} else {
    echo '<script>alert ("ส่งข้อมูลไม่สำเร็จ โปรดติดต่อเราทางช่องทางอื่น")</script>';
    header('Refresh:0; url=contact.php');
}
echo $resp->status;
?> 