<?php
session_start();
require('./db/connect.php');
if ($_SESSION['login_id']=='') {
    header('location:login.php');
}
$login_id=isset($_SESSION['login_id'])?$_SESSION['login_id']:'';
$login_fname=isset($_SESSION['login_fname'])?$_SESSION['login_fname']:'';
$sql="
SELECT
project.name,
project.price,
orders.created,
orders.id
FROM
orders LEFT JOIN project
ON
orders.pro_id=project.id
WHERE
orders.user_id='{$login_id}'
";
$result=$conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
    <style>
        img{
            width: 30%;
        }
        @media screen and (max-width:500px) {
            img{
            width: 100%;
        }
        }
    </style>
</head>
<body>
    <div class="container">
       <div class="lo"> <a href="logout.php"><button class="btn btn-outline-danger" type="submit">LOG OUT</button></a></div>
       <div class="in"> <a href="index.php"><button class="btn btn-outline-primary" type="submit">HOME</button></a></div>
    <h4>สวัสดีคุณ : <?php echo $login_fname;?></h4>
    <table class="table table-hover">
        <thead><tr class="table-success">
            <th>ลำดับ</th>
            <th>ชื่อสินค้า</th>
            <th>ราคา</th>
            <th>วันที่ซื้อ</th>
            <th>ลบ</th>

        </tr></thead>
        <tbody>
<?php
$num=0;
foreach ($result as $key => $value) {
    echo"
    <tr>
    <td>".++$num."</td>
    <td>".$value['name']."</td>
    <td>".$value['price']."</td>
    <td>".$value['created']."</td>
    <td>
    <a href='del_order.php?id=".$value['id']."'>
    <img src='./images/trash3.svg'>
    </a>
    </td>
    </tr>
    ";
}
?>
        </tbody>
    </table>
    </div>
    <div class="pay"> <a href=""><button class="btn btn-outline-success" type="submit">PAY HERE</button></a></div>
<script src="./js/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>