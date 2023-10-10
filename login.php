<?php
session_start();
require('./db/connect.php');
$user = isset($_POST['user']) ? $_POST['user'] : '';
$pass = isset($_POST['pass']) ? $_POST['pass'] : '';
$sql = "
SELECT *
FROM
users
WHERE
users.user='{$user}'
AND
users.pass='{$pass}'

";
$result = $conn->query($sql);
foreach ($result as $key => $value) {
    $user=$value['data_user'];
    $pass=$value['data_pass'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./vendor/toats/src/css/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
   <script src="./vendor1/jquery-validation-1.19.5/dist/jquery.validate.min.js"></script>
   <script src="./vendor1/jquery-validation-1.19.5/dist/jquery.validate.js"></script>
    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap');

    body {
        margin: 0px;
        padding: 0px;
        font-family: 'Mitr', sans-serif !important;
    }

    img {
        width: 100%;
        height: 100%;
        position: absolute;
        z-index: -10;
    }

    form img {
        position: absolute;
        z-index: -20;
        text-align: center;
        bottom: 50px;
        right: 0px;


    }

    form {
        position: absolute;
        z-index: 100;
        text-align: center;
        margin-left: 500px;
        margin-top: 150px;
        width: 500px;
        height: 500px;
    }

    a {
        color: white;
        text-decoration: none;

    }

    @media screen and (max-width:500px) {
        body {
            margin: 0px;
            padding: 0px;
        }

        img {
            width: 100%;


            position: absolute;
            z-index: -10;

        }


        form img {
            position: absolute;
            z-index: -20;
            width: 300px;
            height: 300px;
            bottom: 250px;
            right: 0px;
            text-align: center;
        }

        form {
            position: absolute;
            z-index: 100;
            right: 45px;
            top: 0px;
            text-align: center;
            width: 65%;
            margin-left: 0px;


        }


    }
</style>

<body>

    <img src="./images/สายไหม.png" alt="">
    <form action="reform_login.php" method="post"><img src="./images/ทะเลพาสเทล.png" alt="">

        <label for="user">ชื่อผู้ใช้งาน</label>
        <input id="user" style="border: 2px solid grey;"  type="text" name="user" required><br><br>
        <div class="clear"></div>

        <label for="pass">รหัสผ่าน</label>
        <input id="pass" style="border: 2px solid grey;"  type="password" name="pass" required><br><br>
        <div class="clear"></div>

        
     <button style="color: white"  class="btn btn-info" >เข้าสู่ระบบ</button>
      <a href="register.php"><button type="submit" class="btn btn-success">สมัครสมาชิก</a>
    </form>








    <script src="./js/jquery-3.6.3.min.js"></script>
    <script src="./vendor/toats/src/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script>
        $(function() {
            $( '.btn.btn-info').click(function(e){
                e.preventDefault();
                
            var data_user = $('#user').val();
            var data_pass = $('#pass').val();
            $.ajax({
                url:'reform_login.php',
                method:'post',
                dataType:'json',
                data: {
                    user: data_user,
                    pass: data_pass
                    

                },
                success: function(res) {

                    if (res.status == 'ok') {
                        
                        $.toastr.success('login', {
                            time: 3000,
                            position: 'top-right',
                            size: 'xs',
                            callback: function() {
                                location.href="index.php?status=logintrue";

                            }
                        });

                    } else {
                        
                        $.toastr.error('error', {
                            time: 3000
                        });

                    }

                    
                }
            });
           
        

        });

        });
    </script>



</body>

</html>