<?php
session_start();
$login_id = isset($_SESSION['login_id']) ? $_SESSION['login_id'] : '';
require('./db/connect.php');
$sql = "
SELECT 

(SELECT COUNT(orders.id)FROM orders WHERE orders.user_id='{$login_id}') AS count_pro
 FROM
orders
 WHERE
 orders.user_id='{$login_id}'
  ";
 $result = $conn->query($sql);
 foreach ($result as $key => $value) {
    $count_pro=$value['count_pro'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./vendor/toats/src/css/toastr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="cafename">  <img  src="./images/SC.jpg" alt=""></div> 
    <div class="bb"><img src="./images/bb.jpg" alt=""></div>
    <div class="login"><a href="login.php">
        <button type="button"class="btn btn-outline-danger">login</button></a>
        </div> 
        <span>0</span> <div class="cart"><a href="order.php"><img  src="./images/cart heart.png" alt=""></a></div>
        
        
        <?php
    include('nav.php');
    ?>  
    
    <div class="container-contact">
        <form action="reform_contact.php" method="post">
        <label style="color:  grey;"; for="txtname">ชื่อ - นามสกุล</label><br>
            <input style="border: 2px solid grey;"; type="text" name="txtname" id="txtname" required><br><br>
            <label style="color:  grey;"; for="email">อีเมล์</label><br>
            <input style="border: 2px solid grey;";type="email" name="email" id="email" required><br><br>
            <label style="color:  grey;"; for="txtarea">ข้อความ</label><br>
            <textarea style="border: 2px solid grey;"; name="txtarea" id="txtarea" cols="60" rows="10" required></textarea><br>
       <button type="submit"class="btn btn-outline-danger">ส่งข้อความ</button>


        </form>
        <div class="bar"><img width="100%" src="./images/contact1.png" alt=""></div>
    </div>
    <div class="clear"></div>

    <?php
    include('footer.php');
    ?>
    <script src="./js/jquery-3.6.3.min.js"></script>
    <script src="./vendor/toats/src/js/toastr.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
 <script>
 $(function(){
                     

                          var count_pro = "<?php echo $count_pro; ?>";
                          $('span').text(count_pro);
      

             });
      
             
 
        
</script>
</body>
</html>