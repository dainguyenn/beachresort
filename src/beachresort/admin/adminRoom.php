<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Room manage</title>
    <link rel="stylesheet" href="/dist/output.css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
</head>

<body>
    <?php
    include_once '../repo/RoomRepo.php';
    $roomRepo = new RoomRepo();
    $rooms = $roomRepo->findAll();
    if (isset($_GET['del'])) {
        $room = mysqli_fetch_array($roomRepo->findById($_GET['del']));
        unlink('S:/_Ky5/PHP' . $room['img']);
        echo $room['img'];

        $roomRepo->deleteById($_GET['del']);
        header("Location:" . $_SERVER['PHP_SELF']);
    }

    ?>

    <div id="background">
        <div id="page">

            <?php
            include_once '../nav.php';
            ?>
            <div id="contents">
                <div class="box">
                    <div class="w-[860px]">
                        <div id=" " class="body">
                            <h1>Rooms</h1>
                            <a href="./pages/CURoom.php" class='mr-5 rounded-md
                                px-6 py-[6px] font-bold bg-cyan-400 color-white hover:bg-cyan-300
                                transition-all duration-300' name='submit' name='createRoom'>Create new Room</a>
                            <table class='border border-slate-500 mt-5 w-full'>
                                <thead>
                                    <tr '>
                                        <th class="w-[31px] border border-slate-500">id</th>
                                        <th class="border border-slate-500">name</th>
                                        <th class="border border-slate-500 w-2/6">description</th>
                                        <th class="border border-slate-500  w-[155px]">img</th>
                                        <th class="border border-slate-500">rate</th>
                                        <th class="border border-slate-500"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($rooms as $c) {
                                    ?>
                                        <tr>
                                            <td class="border border-slate-500"><?php echo $c['id'] ?></td>
                                            <td class="border border-slate-500"><?php echo $c['name'] ?></td>
                                            <td class="border border-slate-500"><?php echo $c['description'] ?></td>
                                            <td class="border border-slate-500 "><img src="<?php echo $c['img'] ?>" alt=""></td>
                                            <td class="border border-slate-500"><?php echo $c['rate'] ?></td>
                                            <td class="border border-slate-500">
                                                <a class="px-[5px] py-[3px] bg-slate-400" href="<?php echo './pages/CURoom.php?upd=' . $c['id'] ?>">Update</a>
                                                <a class="px-[5px] py-[3px] bg-slate-400" href="<?php echo '?del=' . $c['id'] ?>">Delete</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                         
                        </div>
                    </div>
                </div>
            </div>
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
                        <li>
                            <a href="news.php">News</a>
                        </li>
                        <li class="active">
                            <a href="contact.php">Contact</a>
                        </li>
                    </ul>
                    <div id="connect">
                        <a href="http://pinterest.com/fwtemplates/" target="_blank" class="pinterest"></a> <a href="http://freewebsitetemplates.com/go/facebook/" target="_blank" class="facebook"></a> <a href="http://freewebsitetemplates.com/go/twitter/" target="_blank" class="twitter"></a> <a href="http://freewebsitetemplates.com/go/googleplus/" target="_blank" class="googleplus"></a>
                    </div>
                </div>
                <p>
                    © 2023 by BHACCASYONIZTAS BEACH RESORT. All Rights Reserved
                </p>
            </div>
        </div>

        <?php


        ?>



</body>

</html>