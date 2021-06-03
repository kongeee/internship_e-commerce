<?php

interface UserService{
    function add($user);
    function edit($user, $user_id, $email, $first_name, $last_name);
    function resetPassword($user, $newPassword);
    function delete($user_id);
    function emailControl($email);
    function connectionWithDBorForm($user, $row);

}

?>