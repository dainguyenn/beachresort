<!DOCTYPE html>
<!-- Website template by freewebsitetemplates.com -->
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Contact - Bhaccasyoniztas Beach Resort Website Template</title>
    <link rel="stylesheet" href="/src//beachresort/css/style.css" type="text/css">
</head>

<body>
    <?php
    include_once '/_Ky5/PHP/const.php';
    include_once '../../builder/FoodsBuilder.php';
    include_once '../../repo/FoodsRepo.php';
    $foodsRepo = new FoodsRepo();

    $isEdit = isset($_GET['upd']);
    if ($isEdit) {
        $foodUp = $diveRepo->findById($_GET['upd']);
        $foodUp = mysqli_fetch_array($foodUp);
    }
    ?>
    <div id="background">
        <div id="page">
            <?php
            include_once '/_Ky5/PHP/const.php';
            include_once PATH_DIR_RESORT . '/nav.php';
            ?>

            <div id="contents">
                <div class="box">
                    <div>
                        <div id="contact" class="body">
                            <h1>Foods</h1>
                            <form method="POST" enctype="multipart/form-data">
                                <table>
                                    <tbody>
                                        <tr>
                                            <td>Category:</td>
                                            <td><input type="text" name="category" value="<?php echo $isEdit ? $foodUp['category'] : '' ?>" class="txtfield"></td>
                                        </tr>
                                        <tr>
                                            <td>Name:</td>
                                            <td><input type="text" name="name" value="<?php echo $isEdit ? $foodUp['name'] : '' ?>" class="txtfield"></td>
                                        </tr>

                                        <tr>
                                            <td>Img:</td>
                                            <td><input type="file" value="" name="img" class="txtfield"></td>
                                        </tr>
                                        <tr>
                                            <td class="txtarea">Description:</td>
                                            <td><textarea name="description"> <?php echo $isEdit ? $foodUp['description'] : '' ?></textarea></td>
                                        </tr>
                                        <tr>
                                            <td><input required type="submit" name="createOrUpdate" value="" class="btn"></td>
                                            <td><a href="../adminDive.php" class="">quay lai</a></td>

                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                            <!-- <img src="/src/fileUpload/imgs/deluxe.jpg" alt=""> -->
                            <?php
                            if ($isEdit) {
                                print("<img style='width:300px' src='" . $foodUp['img'] . "'/>");
                            } ?>
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
    if (isset($_POST['createOrUpdate'])) {
        $p = $_POST;
        if (empty($p['name']) || empty($p['description'])   || empty($p['category'])) {
            echo "Không để trống";
        } else {

            $foods = (new FoodsBuilder())
                ->setName($p['name'])
                ->setCategory($p['category'])
                ->setDescription($p['description']);
            if ($_FILES['img']['size'] > 0) {
                $pathImgStore  = "S:/_Ky5/PHP/src/fileUpload/imgs/" . $_FILES['img']['name'];
                $pathImg  = "/src/fileUpload/imgs/" . $_FILES['img']['name'];
                move_uploaded_file($_FILES['img']['tmp_name'], $pathImgStore);
                $foods->setImg($pathImg);
            }
            if (isset($_GET['upd'])) {
                $foods->setId($_GET['upd']);
                if ($_FILES['img']['size'] <= 0) {
                    $foods->setImg($foodsUp['img']);
                }
            }
            $foods = $foods->build();


            $foodsRepo->save($foods);

            print("<script>
            window.location.replace('../adminFoods.php   ');
           </script>");
        }
    }

    ?>

</body>

</html>