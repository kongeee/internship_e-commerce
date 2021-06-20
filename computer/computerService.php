<?php


interface ComputerService{
    function add($computer);
    function delete($id);
    function connectionWithDBorForm($computer, $row);
    function edit($computer, $id, $name,$stock, $cpu, $gpu, $ram, $storage, $price, $discount, $type, $description);
    function nameCheck($computer);
    function getImages($id);
    function deleteAllImages($id);
}

?>