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
    $count_pro = $value['count_pro'];
}
$list = [
    ['img' => 'cocktail.jpg', 'text' => 'A cocktail is an alcoholic mixed drink. Most commonly, cocktails are either a single spirit or a combination of spirits, mixed with other ingredients such as juices, flavored syrups, tonic water, shrubs, and bitters. Cocktails vary widely across regions of the world, and many websites publish both original recipes and their own interpretations of older and more famous cocktails.'],
    ['img' => 'mocktail.png', 'text' => 'Mocktail is a mixed, non-alcoholic drink. It does not contain alcohol or any spirit. Mocktail is made by mixing different fruit juices, soft drinks, iced tea, etc. The word mocktail itself holds a meaning that it mocks the cocktail. But mocktail is different from cocktails as it does not contain any content or pigment of alcohol or spirit. It is alcohol-free. Also, mocktails are termed with a Virgin added to the front of their name. ']


];
// มาจากloginแล้ว
// $logintrue='';
// if (isset($_GET['status']) && $_GET['status'] =='logintrue') {
//    $logintrue = 'logintrue';
// }
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
    <div class="cafename"> <img src="./images/SC.jpg" alt=""></div>
    <div class="bb"><img src="./images/bb.jpg" alt=""></div>
    <div class="login"><a href="login.php">
            <button type="button" class="btn btn-outline-danger">login</button></a>
    </div>
     
    <div class="cart"><a href="order.php"><img src="./images/cart heart.png" alt=""></a></div>

    <?php
    include('nav.php');
    ?> <br><br>
    <div class="container-cocktail">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="./images/slide0.jpg" class="d-block w-100" alt="slide1.jpg">
                </div>
                <div class="carousel-item">
                    <img src="./images/slide1.jpg" class="d-block w-100" alt="slide2.jpg">
                </div>
                <div class="carousel-item">
                    <img src="./images/slide2.jpg" class="d-block w-100" alt="hh.jpg">
                </div>
                <div class="carousel-item">
                    <img src="./images/hh.jpg" class="d-block w-100" alt="hh.jpg">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <?php
        foreach ($list as $key => $value) {
            echo '
        <div class="item"><img src="./images/' . $value['img'] . '" alt=""></div>
        <div class="text">  

        ' . $value['text'] . '
        </div>
        <div class="clear"></div>
';
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


        var count_pro = "<?php echo $count_pro; ?>";
        $('span').text(count_pro);
        
        // var logintrue = "<?php echo $logintrue; ?>";
        // if (logintrue == 'logintrue') {
        //     alert('login');
        // }
});


    </script>

</body>

</html>