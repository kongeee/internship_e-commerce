<?php

include_once("../server.php");

class UserManager implements UserService{

    public function add($user){
        global $DBconn;
        $email = $user->getEmail();
        $first_name = $user->getFirstName();
        $last_name = $user->getLastName();
        $password = md5($user->getPassword());

        $email_check = $this->emailControl($email);

        if($email_check){
            $sql = "INSERT INTO user (email, first_name, last_name, password)
            VALUES('$email', '$first_name', '$last_name', '$password')";

            if($DBconn->query($sql) === TRUE){
                echo "Registiration is complete";
            }
            else{
                echo "E mail is already used";
            }

        }

    }
    public function edit($user, $user_id, $email, $first_name, $last_name){}
    public function resetPassword($user){}
    public function delete($user_id){}
    public function emailControl($email){
        global $DBconn;

        $sql = "SELECT U.email FROM user U WHERE U.email='$email'";
        $result = $DBconn->query($sql);

        if($result->num_rows == 0){
            return true;
        }
        return false;
    }
    
    public function connectionWithDBorForm($user, $row){
        $user->setEmail($row['email']);
        $user->setFirstName($row['first_name']);
        $user->setLastName($row['last_name']);
        $user->setPassword($row['password']);

    }
}
?>