<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact - Bhaccasyoniztas Beach Resort Website Template</title>
    <link rel="stylesheet" href="/src//beachresort/css/style.css" type="text/css">
</head>

<body>
    <?php
    include_once '/_Ky5/PHP/const.php';
    include_once '../../builder/RoomBuilder.php';
    include_once '../../repo/RoomRepo.php';
    $roomRepo = new RoomRepo();

    $isEdit = isset($_GET['upd']);
    if ($isEdit) {
        $roomUpd = $roomRepo->findById($_GET['upd']);
        $roomUpd = mysqli_fetch_array($roomUpd);
    }
    ?>
    <div id="background">
        <div id="page">
            <?php
            include_once '/_Ky5/PHP/const.php';
            include_once PATH_DIR_RESORT . '/nav.php'; ?>

            <div id="contents">
                <div class="box">
                    <div>
                        <div id="contact" class="body">
                            <h1>Room</h1>
                            <form method="POST" enctype="multipart/form-data">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Name:</td>
                                            <td><input required type="text" name="name" value="<?php echo $isEdit ? $roomUpd['name'] : '' ?>" class="txtfield"></td>
                                        </tr>
                                        <tr>
                                            <td>Price:</td>
                                            <td><input required type="text" value="<?php echo $isEdit ? $roomUpd['rate'] : '' ?>" name="rate" class="txtfield"></td>
                                        </tr>
                                        <tr>
                                            <td>Img:</td>
                                            <td><input type="file" value="" name="img" class="txtfield"></td>
                                        </tr>
                                        <tr>
                                            <td class="txtarea">Description:</td>
                                            <td><textarea name="description"> <?php echo $isEdit ? $roomUpd['description'] : '' ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><input required type="submit" name="createOrUpdate" value="" class="btn"></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!-- <img src="/src/fileUpload/imgs/deluxe.jpg" alt=""> -->
                            <?php
                            if ($isEdit) {
                                echo "<img style='width:300px' src='" . $roomUpd['img'] . "'/>";
                            }
                            ?>
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

    <?php
    include_once PATH_DIR . '/utils/UploadFile.php';
    $upload = new UploadFile();

    if (isset($_POST['createOrUpdate'])) {
        $p = $_POST;
        if (empty($p['name']) || empty($p['description']) || isset($_FILE['img']) || empty($p['rate'])) echo "Không để trống";
        else {

            $room = (new RoomBuilder())
                ->setName($p['name'])
                ->setDescription($p['description'])
                ->setRate($p['rate']);
            if ($_FILES['img']['size'] > 0) {
                // $pathImgStore  = "S:/_Ky5/PHP/src/fileUpload/imgs/" . $_FILES['img']['name'];
                $pathImg  = "/src/fileUpload/imgs/" . $_FILES['img']['name'];
                // move_uploaded_file($_FILES['img']['tmp_name'], $pathImgStore);
                $upload->save($_FILES['img']['tmp_name'], $_FILES['img']['name']);
                $room->setImg($pathImg);
            }
            if (isset($_GET['upd'])) {
                $room->setId($_GET['upd']);
                if ($_FILES['img']['size'] <= 0) {
                    $room->setImg($roomUpd['img']);
                }
            }
            $room = $room->build();


            $roomRepo->save($room);

            print("<script>
            window.location.replace('../adminRoom.php   ');
           </script>");
        }
    }
    ?>

</body>

</html>