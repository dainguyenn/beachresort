<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/output.css">
    <link rel="stylesheet" href="/src/beachresort/css/style.css">
    <title>Create new Room</title>
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
        <?php include_once PATH_DIR_RESORT . '/nav.php' ?>
        <div class=" flex justify-center items-center">
            <form action="" method="POST" enctype="multipart/form-data" class="w-10/12 mt-5  md:w-5/12 bg-slate-300 rounded-lg">
                <h3 class="text-4xl text-center font-bold pt-3"><?php echo $isEdit ? 'Update Room' : 'Create new Room' ?></h3>
                <div class="px-10 md:px-20 my-20">

                    <div class="mt-11">
                        <label for="" class="font-medium">Name</label>
                        <input type="text" name="name" value="<?php echo $isEdit ? $roomUpd['name'] : '' ?>" class="block border-solid py-2 px-3 border-2 rounded-md  hover:border-cyan-300 focus:outline-none focus-visible:border-cyan-300" />
                    </div>
                    <div class="mt-11">
                        <label for="" class="font-medium">description</label>
                        <input type="text" name="description" value="<?php echo $isEdit ? $roomUpd['description'] : '' ?>" class="block border-solid py-2 px-3 border-2 rounded-md  hover:border-cyan-300 focus:outline-none focus-visible:border-cyan-300" />
                    </div>
                    <div class="mt-11">
                        <label for="" class="font-medium">Img</label>
                        <input type="file" name="img" class="block   py-2 px-3 " />
                        <?php if ($isEdit) {
                            echo "<img src='" . $roomUpd['img'] . "' alt='img'/>";
                        } ?>
                    </div>
                    <div class="mt-11">
                        <label for="" class="font-medium">Rate</label>
                        <img />
                        <input type="text" name="rate" value="<?php echo $isEdit ? $roomUpd['rate'] : '' ?>" class="block border-solid py-2 px-3 border-2 rounded-md  hover:border-cyan-300 focus:outline-none focus-visible:border-cyan-300" />
                    </div>
                    <div class="px-14 py-5 m-auto flex justify-center items-center">
                        <button class="mr-5 rounded-md px-6 py-[6px] font-bold bg-cyan-400 color-white 
                    hover:bg-cyan-300
                    transition-all duration-300
                " name="createOrUpdate"><?php echo $isEdit ? 'Update' : 'Create' ?></button>
                        <a class="mr-5 rounded-md
                    px-6 py-[6px] font-bold bg-cyan-400 color-white 
                    hover:bg-cyan-300
                    transition-all duration-300
                " name="list" href="../adminRoom.php">List</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php

    if (isset($_POST['createOrUpdate'])) {
        $p = $_POST;
        if (empty($p['name']) || empty($p['description']) || isset($_FILE['img']) || empty($p['rate'])) echo "Không để trống";
        else {
            $pathImgStore  = "S:/_Ky5/PHP/src/fileUpload/imgs/" . $_FILES['img']['name'];
            $pathImg  = "/src/fileUpload/imgs/" . $_FILES['img']['name'];
            $room = (new RoomBuilder())
                ->setName($p['name'])
                ->setDescription($p['description'])
                ->setImg($pathImg)
                ->setRate($p['rate']);
            if (isset($_GET['upd'])) $room->setId($_GET['upd']);
            $room = $room->build();
            move_uploaded_file($_FILES['img']['tmp_name'], $pathImgStore);

            $roomRepo->save($room);

            header("Location:../adminRoom.php");
        }
    }

    ?>
</body>

</html>