<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/output.css">
    <title>Document</title>
</head>

<body>
    <!-- <form method="post" class="form w-50">
        <h2 class="form-header">Đăng nhập</h2>
        <div class="form-group colum ">
            <label for="" class="form-label">Tài khoản</label>
            <input name="username" type="text" class="form-input">
        </div>

        <div class="form-group colum ">
            <label for="" class="form-label">Mật khẩu</label>
            <input type="password" name="password" class="form-input">
        </div>

        <div class="form-group">
            <button name="submit" class="btn btn-primary">
                Login
            </button>
        </div>

    </form> -->
    <?php
    include_once './repo/UserRepo.php';
    if (!isset($_SESSION)) session_start();
    $userRepo = new UserRepo();
    $validate = true;
    if (isset($_POST['submit'])) {
        if (!empty($_POST['username']) || !empty($_POST['password'])) {
            $result = $userRepo->login($_POST['username'], $_POST['password']);

            if ($result == false) {
                $validate = false;
            } else {
                header('Location:' . $_POST['prev']);
                exit;
            }
        } else {
            echo "Không được để trống";
        }
    }
    ?>
    <div class="flex justify-center items-center bg-slate-200 container h-screen max-h-screen content-center">
        <form class="bg-white container rounded-3xl w-4/12 border-solid border-2" method="POST">
            <input type="hidden" name="prev" value=<?php echo ('index.php') ?>>

            <h3 class="text-4xl mt-5 font-bold text-center">Đăng nhập</h3>
            <?php
            if (!$validate) echo "<div class='text-center mt-3 text-red-500'>Sai tài khoản hoặc mật khẩu</div>"
            ?>
            <div class="mt-11 m-auto px-14">
                <label class="font-medium" for="">Tài khoản:</label>
                <input name="username" class="block w-full border-solid py-2 px-3 border-2 rounded-md  hover:border-cyan-300 focus:outline-none focus-visible:border-cyan-300" type="text">

            </div>
            <div class="my-9 m-auto px-14">
                <label class="font-medium" for="">Mật Khẩu:</label>
                <input name="password" type="password" class="block w-full border-solid py-2 px-3 border-2 rounded-md  hover:border-cyan-300 focus:outline-none focus-visible:border-cyan-300" type="text">
            </div>
            <div class="px-14 py-5 m-auto flex justify-center items-center">

                <button class="mr-5 rounded-md
                    px-6 py-[6px] font-bold bg-cyan-400 color-white 
                    hover:bg-cyan-300
                    transition-all duration-300
                " name="submit">Đăng nhập</button>
                <a class="mr-5 rounded-md
                    px-6 py-[6px] font-bold bg-cyan-400 color-white 
                    hover:bg-cyan-300
                    transition-all duration-300
                " href="/src/beachresort/register.php">Đăng ký</a>
                <a href="">Quên mật khẩu</a>
            </div>
        </form>
    </div>



</body>

</html>