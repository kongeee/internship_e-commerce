<?php


interface ComputerService{
    function add($computer);
    function delete($id);
    function connectionWithDBorForm($computer, $row);
    function edit($computer, $id, $name, $cpu, $gpu, $ram, $storage, $price, $discount, $type, $description);
    function nameCheck($computer);
}

?>