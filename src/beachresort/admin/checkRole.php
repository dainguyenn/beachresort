<?php
include_once '../../authentication/Authenticate.php';
include_once '../entity/User.php';
if (!isset($_SESSION)) session_start();
$auth = new Authenticate();

$isRole = $auth->hasRole('ROLE_ADMIN', array('ROLE_MANAGER', 'ROLE_EDITOR'));
if ($isRole) {
    echo "<form method='POST'><button class='mr-5 rounded-md
    px-6 py-[6px] font-bold bg-cyan-400 color-white hover:bg-cyan-300
    transition-all duration-300' name='submit' name='change'>CHANGE</button></form>";
}
if (empty($_SESSION['nav'])) $_SESSION['nav'] = false;
if (isset($_POST['change'])) {
    $_SESSION['nav'] = !$_SESSION['nav'];
}
