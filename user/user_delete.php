<?php
include_once("../server.php");
include_once("../user/user.php");
include_once("../user/userService.php");
include_once("../user/userManager.php");
include_once("../user/user_cookie.php");

$userService = new UserManager();
echo $userService->delete($_GET['user_id']);


?>