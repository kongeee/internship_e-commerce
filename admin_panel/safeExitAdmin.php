<?php

session_start();

ob_start();
session_destroy();
echo "<center>You are redirected to the admin page... Please wait ...</center>";

header("Refresh: 3; url=adminLogin.html");
ob_end_flush();
?>