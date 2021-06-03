<?php

class User{
    
    private $user_id;
    private $email;
    private $first_name;
    private $last_name;
    private $password;


    //Getters

    function getID(){
        return $this->user_id;
    }
    function getEmail(){
        return $this->email;
    }
    function getFirstName(){
        return $this->first_name;
    }
    function getLastName(){
        return $this->last_name;
    }
    function getPassword(){
        return $this->password;
    }

    //Setters

    function setID($user_id){
        $this->user_id = $user_id;
    }
    function setEmail($email){
        $this->email = $email;
    }
    function setFirstName($first_name){
        $this->first_name = $first_name;
    }
    function setLastName($last_name){
        $this->last_name = $last_name;
    }
    function setPassword($password){
        $this->password = $password;
    }

    



}

?>