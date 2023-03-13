<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html>

<head>
    <meta charset="UTF-8">
    <title>News - Bhaccasyoniztas Beach Resort Website Template</title>
    <link rel="stylesheet" href="/dist/output.css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
</head>

<body>
    <?php
    require_once './repo/CartRepo.php';
    $cart = new CartRepo();
    session_start();
    if (!$_SESSION['user']) {
        header('Location:index.php');
    }
    $user = unserialize($_SESSION['user']);
    $items = $cart->findAllByUser($user->id);
    $errOrder = [];
    $errEnd = [];
    if (isset($_POST['edit'])) {
        $date_order = (new DateTime($_POST['date_order']))->format('Y-m-d');
        $date_end = (new DateTime($_POST['date_end']))->format('Y-m-d');
        $currentDate = (new DateTime(date('Y-m-d')))->format('Y-m-d');
        if ($date_order < $currentDate) {
            $errOrder[$_POST['id']] = 'Ngày đặt phải lớn hơn hoặc bằng ngày hiện tại';
        }

        if ($date_end < $currentDate || $date_end < $date_order) {
            $errEnd[$_POST['id']] = 'Ngày kết thúc phải lớn hơn hoặc bằng ngày hiện tại và ngày đặt';
        }

        if (empty($errOrder) && empty($errOrder)) {
            $p = $_POST;
            $cart->update($_POST['id'], $p['date_order'], $p['date_end']);
            $items = $cart->findAllByUser($user->id);
        }
    }
    ?>
    <div id="background">
        <div id="page">
            <?php include_once 'nav.php' ?>

            <div id="contents">
                <div class="box">
                    <div class="w-[860px]">
                        <div class="body">
                            <table class="table-auto w-full">
                                <tr>
                                    <th class="border border-slate-500">Tên</th>
                                    <th class="border border-slate-500">Ảnh</th>
                                    <th class="border border-slate-500">Mô tả</th>
                                    <th class="border border-slate-500">Từ</th>
                                    <th class="border border-slate-500">Đến</th>
                                    <th class="border border-slate-500">Giá</th>
                                    <th class="border border-slate-500"></th>
                                </tr>
                                <?php
                                foreach ($items as $item) {
                                    $order = new DateTime($item['date_order']);
                                    $total = 0;
                                    if ($item['date_end']) {
                                        $end = new DateTime($item['date_end']);
                                        $interval = $order->diff($end);
                                        $total = $interval->d * $item['rate'];
                                    }

                                ?>

                                    <tr>
                                        <form action="" method="POST">
                                            <td class="border border-slate-500 "><?php echo $item['name']; ?></td>
                                            <td class="border border-slate-500"><img class="img" src="<?php echo $item['img']; ?>" alt=""></td>
                                            <td class="border border-slate-500"><?php echo $item['description']; ?></td>
                                            <td class="border border-slate-500 "><input type="date" name="date_order" value="<?php echo $item['date_order']; ?>" name="" id="">
                                                <?php isset($errOrder[$item['id']]) ? print("<i class='text-red-500 block'>" . $errOrder[$item['id']] . "</i>") : '';
                                                ?>
                                            </td>
                                            <td class="border border-slate-500"><input type="date" name="date_end" value="<?php echo $item['date_end']; ?>" name="" id="">
                                                <?php isset($errEnd[$item['id']]) ? print("<i class='text-red-500 block'>" . $errEnd[$item['id']] . "</i>") : '';
                                                ?>

                                            </td>
                                            <input type="hidden" name="id" value="<?php echo $item['id']; ?>" />
                                            <td class="border border-slate-500"><?php echo $total; ?>$</td>
                                            <td class="border border-slate-500">
                                                <button name="edit">Sửa</button>
                                                <button name="delete">Xóa</button>
                                            </td>
                                            <td><input type="checkbox"></td>
                                        </form>
                                    </tr>
                                <?php } ?>
                            </table>
                            <a>Đặt phòng</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php



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

                <style>
                    .img {
                        width: 155px;
                    }
                </style>
                =<div id="connect">
                    =<a href="http://pinterest.com/fwtemplates/" target="_blank" class="pinterest"></a> <a href="http://freewebsitetempl