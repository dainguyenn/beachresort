<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
    <meta charset="UTF-8">
    <title>News - Bhaccasyoniztas Beach Resort Website Template</title>
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <?php
    include_once './repo/RoomRepo.php';
    $roomRepo = new RoomRepo();

    $room = $roomRepo->findById($_GET['id']);


    ?>
    <div id="background">
        <div id="page">
            <?php include_once 'nav.php' ?>

            <div id="contents">
                <ul id="rooms">
                    <?php foreach ($room as $r) {
                    ?>
                        <li>
                            <a href="#"><img class="w-[399px]" src="<?php echo $r['img'] ?>" alt="Img"></a>
                            <h2><a href="#"><?php echo $r['name'] ?></a></h2>
                            <p>
                                <?php echo $r['description'] ?>
                            </p>
                            <span class="rate">Rate: <?php echo $r['rate'] ?> / Day</span>

                        </li>
                        <form method="post">
                            <input type="hidden" name="add" value="<?php echo $r['id'] ?>" id="">
                            <button name="sub">Thêm vào giỏ hàng</button>
                        </form>
                    <?php } ?>

                </ul>
            </div>
        </div>
        <?php
        if (isset($_POST['sub'])) {
            if ($_SESSION['user']) {

                require_once './repo/CartRepo.php';
                $cart = new CartRepo();

                $user = unserialize($_SESSION['user']);
                $cart->addToCart($user->id, $_POST['add']);
            } else {
                header('Location:login.php');
            }
        }

        ?>
        <div id="footer">
            <div>
                <ul class="navigation">
                    <li>
                        <a href="index123.php">Home</a>
                    </li>
                    <li>
                        <a href="about.php">About</a>
                    </li>
                    <li>
                        <a href="rooms.php">Rooms</a>
                    </li>
                    <li>
                        <a href="dives.php">Dive Site</a>
                    </li>
                    <li>
                        <a href="foods.php">Food</a>
                    </li>
                    <li class="active">
                        <a href="news.php">News</a>
                    </li>
                    <li>
                        <a href="contact.php">Contact</a>
                    </li>
                </ul>
                <div id="connect">
                    <a href="http://pinterest.com/fwtemplates/" target="_blank" class="pinterest"></a> <a href="http://freewebsitetempl