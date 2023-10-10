<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Document</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Mitr:wght@300&display=swap');
body{
    margin: 0px;
    padding: 0px;
    font-family: 'Mitr', sans-serif !important;
}
img{
    width: 100%;
   
    position: absolute;
    z-index: 5;
   
}
.container{
    width: 100%;
    position: absolute;
    z-index: 10;
    
    
    margin-top: 10px;
    margin-left: 100px;
}
form{
    position: absolute;
    z-index: 5;  
  
  left: 600px;
  margin-top: 100px;
    width: 300px;
    height: 300px;
}
a,label,input{
    color: grey;
    text-decoration: none;
    
}
button{
    margin-left: 70px;
}
@media screen and (max-width:500px) {
    body{
    margin: 0px;
    padding: 0px;
    font-family: 'Mitr', sans-serif !important;
}
img{
    width: 100%;
    height: 100%;
    position: absolute;
    z-index: 10;
}

form{
    position: absolute;
    z-index: 10;  
    margin: 0px auto;
    left: 0px;
  right: 0px;
  margin-top: 100px;
    width: 300px;
    height: 300px;
  text-align: center;
    
}
a,label,input{
    color: grey;
    text-decoration: none;
    
}
button{
    margin-right: 70px;
}
}
</style>
<body>
<img src="./images/สายไหม.png" alt="">
        <form action="reform_register.php" method="post">
        <label for="fname">ชื่อ นามสกุล</label><br>
            <input type="text" name="fname" required><br><br>

            <label for="user">ชื่อผู้ใช้งาน</label><br>
            <input type="text" name="user"required><br><br>

            <label for="pass">รหัสผ่าน</label><br>
            <input type="password" name="pass"required><br><br>

            <button class="btn btn-secondary" type="submit">บันทึก</button>

        </form>
    
<script src="./js/jquery-3.6.3.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>
</html>