<?php
include_once("../admin_panel/sessionAdmin.php");

interface ComputerService{
    function add($computer);
    function delete($id);
    function connecionWithDBorForm($computer, $row);
    function edit($computer, $id, $name, $cpu, $gpu, $ram, $storage, $price, $discount, $type, $description);
    function nameCheck($computer);
}

?>