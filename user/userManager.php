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
                header("location:../state/confirm.php");
            }
            else{
                header("location:../state/reject.php");
            }

        }

    }
    
    
    public function edit($user, $user_id, $email, $first_name, $last_name){
        global $DBconn;
        
        $sql = "UPDATE user SET email='$email', first_name='$first_name', last_name='$last_name' WHERE user_id='$user_id'";

        if($user->getEmail() == $email || $this->emailControl($email)){
            if($DBconn->query($sql) === TRUE){
                header("location:../state/confirm.php");
            }
        }
        

        
        header("location:../state/reject.php");

    }
    
    
    
    public function resetPassword($user, $newPassword){
        global $DBconn;
        $newPassword = md5($newPassword);
        $user_id = $user->getID();
        $sql = "UPDATE user SET password='$newPassword' WHERE user_id='$user_id'";
        if($DBconn->query($sql) === TRUE){
           
            header("location:../state/confirm.php");
        }

        header("location:../state/reject.php");
        
    }
    
    
    public function delete($user_id){
        global $DBconn, $serverName;
        $sql = "DELETE FROM user WHERE user_id='$user_id'";
        if($DBconn->query($sql) === TRUE){
            setcookie("user", $user_id, time()-3600, "/", $serverName);
            header("location:../state/confirm.php");
        }
        header("location:../state/reject.php");
    }
    
    
    
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
        if(isset($row['user_id'])){ //for forms
            $user->setID($row['user_id']);
        }

        $user->setEmail($row['email']);
        $user->setFirstName($row['first_name']);
        $user->setLastName($row['last_name']);
        $user->setPassword($row['password']);

    }
}
?>