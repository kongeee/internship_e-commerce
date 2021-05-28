<?php
include_once("../admin_panel/sessionAdmin.php");

interface ComputerService{
    function add($computer);
    function delete($computer);
    function edit($computer, $name, $cpu, $gpu, $ram, $storage, $type, $description);
}

?>