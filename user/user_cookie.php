<?php

ob_start();
session_start();

if(!isset($_COOKIE['user'])){
    header("Location:../sessionError.php");
}

?>