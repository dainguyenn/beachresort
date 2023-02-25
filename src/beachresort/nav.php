<?php
$page = substr($_SERVER['PHP_SELF'], 17);
$isAdmin = false;
if (isset($_POST['test'])) $isAdmin = !$isAdmin;

?>

<div id="header">
    <div id="logo">
        <a href="index.php"><img src="/src/beachresort/images/logo.png" alt="LOGO" height="112" width="118"></a>
    </div>
    <div id="navigation" style="display:flex; justify-content:space-around; align-items: center;" class="clear-both w-[860px] flex justify-around items-center">
        <?php
        if (!isset($_SESSION)) session_start();

        $url = $_SERVER['PHP_SELF'];

        if (str_contains($url, '/src/beachresort/admin/')) {
            if (empty(unserialize($_SESSION['user']))) {
                print("<script>
                window.location.replace('/src/beachresort/index.php');
               </script>");
            }
        }
        isset($_SESSION['user']) ?
            print("<h5 style='display:inline-block;'>"
                . unserialize($_SESSION['user'])->username . "</h5>"
                . "<a href='/src/beachresort/admin/index.php' style='' name='test'>Quản trị</a> "
                . "<form style='display:inline-block;' 
                 method='post'><button class='btn btn-danger' name='logout'>Logout</button></form>"

            )
            : print "<div style='display:flex; flex: 1; flex-direction: row-reverse; '><a class='btn btn-primary' style='text-decoration: none; margin-right:15px;' href='/src/beachresort/login.php'> Login </a></div>"

        ?>
    </div>
    <div id="navigation">

        <ul>
            <li class="<?php $page === "index.php" ?  print("selected") : "" ?>">
                <a href="/src/beachresort/index.php">Home</a>
            </li>
            <li class="<?php $page === "about.php" ?  print("selected") : "" ?>">
                <a href="/src/beachresort/about.php">About</a>
            </li>
            <li class="<?php $page === "rooms.php" ?  print("selected") : "" ?>">
                <a href="/src/beachresort/rooms.php">Rooms</a>
            </li>
            <li class="<?php $page === "dives.php" ?  print("selected") : "" ?>">
                <a href="/src/beachresort/dives.php">Dive Site</a>
            </li>
            <li class="<?php $page === "foods.php" ?  print("selected") : "" ?>">
                <a href="/src/beachresort/foods.php">Food</a>
            </li>
            <li class="<?php $page === "news.php" ?  print("selected") : "" ?>">
                <a href="/src/beachresort/news.php">News</a>
            </li>
            <li class="<?php $page === "contact.php" ?  print("selected") : "" ?>">
                <a href="/src/beachresort/contact.php">Contact</a>
            </li>
        </ul>
    </div>
    <?php
    if (isset($_POST['logout'])) {
        unset($_SESSION['user']);
        header('Location:' . $_SERVER['PHP_SELF']);
    }
    ?>
</div>