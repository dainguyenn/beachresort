<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/dist/output.css">
    <title>Register</title>
</head>

<body>

    <?php
    include_once '/_Ky5/PHP/const.php';
    include_once PATH_DIR_RESORT . '/builder/UserBuilder.php';
    include_once PATH_DIR_RESORT . '/repo/UserRepo.php';

    $userRepo = new UserRepo();


    if (isset($_POST['sub'])) {
        $p = $_POST;
        if (!empty($p['username']) || !empty($p['password']) || !empty($p['email'])) {
            if ($p['password'] == $p['repass']) {

                $user = (new UserBuilder())
                    ->setFullName($p['fullname'])
                    ->setUsername($p['username'])
                    ->setPassword($p['password'])
                    ->setAddress($p['address'])
                    ->setEmail($p['email'])
                    ->setDob($p['dob'])
                    ->setGender(isset($p['gender']) ? $p['gender'] : '')
                    ->setHobby(isset($p['hobby']) ? $p['hobby'] : null);

                if ($_FILES['avatar']['size'] > 0) {
                    move_uploaded_file($_FILES['avatar']['tmp_name'], PATH_DIR_FILE_IMG . $_FILES['avatar']['name']);
                    $user = $user->setAvatar('/src/fileUpload/imgs/' . $_FILES['avatar']['name']);
                }

                $user = $user->build();
                $userTemp = $userRepo->findByUsername($p['username']);

                if ($userTemp !== false) {
                    echo "Tài khoản đã được sử dụng";
                } else {
                    $userRepo->save($user);
                    echo 'ok';
                }
            } else {
                echo 'Mật khẩu không khớp';
            }
        }
    }


    ?>


    <div class="container flex items-center justify-center flex-col">
        <h1 class="text-3xl">Đăng ký thông tin</h1>
        <form class="flex flex-col w-1/2 mt-7 justify-center items-center" action="" method="POST" enctype="multipart/form-data">
            <input class="py-[5px] px-[12px] border-2 border-solid border-slate-500 rounded-lg mt-2 w-1/2" name="fullname" type="text" placeholder="FullName" />
            <input class="py-[5px] px-[12px] border-2 border-solid border-slate-500 rounded-lg mt-2 w-1/2" name="username" type="text" placeholder="username" />
            <?php if (isset($_POST['sub'])) {
                if (empty($_POST['username'])) {
                    printf('<i class="text-red-500">Không để trống trường username!</i>');
                }
            } ?>
            <input class="py-[5px] px-[12px] border-2 border-solid border-slate-500 rounded-lg mt-2 w-1/2" name="password" type="password" placeholder="password" />
            <?php if (isset($_POST['sub'])) {
                if (empty($_POST['password'])) {
                    printf('<i class="text-red-500">Không để trống trường password!</i>');
                }
            } ?>
            <input class="py-[5px] px-[12px] border-2 border-solid border-slate-500 rounded-lg mt-2 w-1/2" name="repass" type="password" placeholder="Re_Password" />
            <input class="py-[5px] px-[12px] border-2 border-solid border-slate-500 rounded-lg mt-2 w-1/2" name="email" type="email" placeholder="email" />
            <?php if (isset($_POST['sub'])) {
                if (empty($_POST['email'])) {
                    printf('<i class="text-red-500">Không để trống trường email!</i>');
                }
            } ?>
            <input class="py-[5px] px-[12px] border-2 border-solid border-slate-500 rounded-lg mt-2 w-1/2" name="address" type="text" placeholder="address" />
            <input class="py-[5px] px-[12px] border-2 border-solid border-slate-500 rounded-lg mt-2 w-1/2" name="dob" type="date" />
            <input class="py-[5px] px-[12px] border-2 border-solid border-slate-500 rounded-lg mt-2 w-1/2" name="avatar" type="file" />
            <div>
                Giới tính:
                <input type="radio" name="gender" value="Male" />Male
                <input type="radio" name="gender" value="Female" />Female
                <input type="radio" name="gender" value="Other" />Other
            </div>
            <div>
                Sở thích:
                <input type="radio" name="hobby" value="Football" />Football
                <input type="radio" name="hobby" value="Film" />Film
                <input type="radio" name="hobby" value="Game" />Game
            </div>
            <button class="mr-5 rounded-md
                    px-6 py-[6px] font-bold bg-cyan-400 color-white 
                    hover:bg-cyan-300
                    transition-all duration-300
                    max-w-max
                " name="sub">Register</button>
            <a class="mr-5 rounded-md
                    px-6 py-[6px] font-bold bg-cyan-400 color-white 
                    hover:bg-cyan-300
                    transition-all duration-300
                    max-w-max
                " href="/src/beachresort/index.php">Back</a>
        </form>
    </div>
</body>

</html>