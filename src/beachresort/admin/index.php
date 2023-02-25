<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/dist/output.css">
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <title>Admin</title>
</head>

<body>
    <div id="background">
        <?php include_once '/_Ky5/PHP/const.php';
        include_once PATH_DIR_RESORT . '/nav.php';

        ?>
        <div id="page">
            <div id="contents">
                <div class="box">
                    <div class=" w-[860px] ">
                        <div id=" " class="body flex justify-around">
                            <a href="/src/beachresort/admin/adminRoom.php">Room</a>
                            <a href="/src/beachresort/admin/admin_contact.php">Contact</a>
                            <a href="/src/beachresort/admin/adminDive.php">Dive</a>
                            <a href="/src/beachresort/admin/adminFoods.php">Foods</a>
                        </div>
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
</body>

</html>