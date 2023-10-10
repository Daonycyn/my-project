<?php
session_start();
$login_id = isset($_SESSION['login_id']) ? $_SESSION['login_id'] : '';
require('./db/connect.php');
$sql = "
        SELECT 
        project.id,
        project.name,
        project.price,
        project.pic,
        project.active,
        project.key,
        (SELECT COUNT(orders.id)FROM orders WHERE orders.user_id='{$login_id}') AS count_pro
         FROM
         project
         WHERE
         project.active='active'
         AND
         project.cate_id='1'
    ";
$result = $conn->query($sql);
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
    <div class="container-cocktail">
        <?php
        foreach ($result as $key => $value) {
            if ($value['key'] == 'right') {
                echo '
         <div class="product2"  >
   <img  src="./images/' . $value['pic'] . '" ></div>
   <div class="buy1">
   <button  data-id="' . $value['id'] . '" data-price="' . $value['price'] . '" class="btn btn-secondary"   >Buy</button>
   </div>
    <div class="product2-text2" ><p>' . $value['name'] . '</p><br></br> <p>' . $value['price'] . ' bath</p></div>
    

<div class="clear"></div>
';
            } else {
                echo '
<div class="product0" >
<img  src="./images/' . $value['pic'] . '" ></div>  
<div class="buy2" >
<button data-id="' . $value['id'] . '" data-price="' . $value['price'] . '" class="btn btn-secondary " >Buy</button>
</div>
<div class="product1-text1" ><p>' . $value['name'] . ' </p> <br></br> <p>' . $value['price'] . ' bath</p></div>
  
   <div class="clear"></div>

';
            }
        }
        ?>
</div>
<div class="clear"></div>
               

        <?php
    include('footer.php');
    ?>
    
    <script src="./js/jquery-3.6.3.min.js"></script>
    <script src="./vendor/toats/src/js/toastr.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script> 
         $(function() {
             var login_id = "<?php echo $login_id; ?>";
             var count_pro = "<?php echo $value['count_pro']; ?>";

             $('span').text(count_pro);
             $( '.btn.btn-secondary').click(function(){
                 console.log('aaa');
                if (login_id == '') {
                    location.href = 'login.php';
                 } else {
                     var data_id = $(this).attr('data-id');
                     var data_price = $(this).attr('data-price');

                     $.ajax({
                         url: 'r_cocktail.php',
                         method: 'post',
                         dataType: 'json',
                         data: {
                             id: data_id,
                            price: data_price,
                             login_id: login_id
                         },
                       success: function(res) {

                             if (res.status == 'ok') {
                                 $.toastr.success('เพิ่มสินค้าลงในตะกร้าแล้ว', {
                                    time: 3000,
                                    position: 'top-right',
                                    size: 'xs',
                                    callback: function() {
                                        location.reload();
                                    }


                                });

                           } else {
                               $.toastr.error('เพิ่มสินค้าไม่สำเร็จ', {
                                     time: 3000
                                 });

                             }

                             console.log(res);
                         }
                     });

                 }

             });
        });
     </script>
</body>

</html>