<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$DBname = "internship";

$DBconn = new mysqli($serverName, $userName, $password, $DBname);

if($DBconn->connect_error){
    die("Connection failed" . $DBconn->connect_error);
}


$sql = "CREATE TABLE IF NOT EXISTS user(
        user_id INTEGER AUTO_INCREMENT,
        first_name VARCHAR(30),
        last_name VARCHAR(30),
        email VARCHAR(50) NOT NULL,
        password VARCHAR(50) NOT NULL,
        PRIMARY KEY(user_id)

)";

if(!$DBconn->query($sql) === TRUE){
    echo "(user)table is not created";
}

$sql = "CREATE TABLE IF NOT EXISTS admin(
        admin_id INTEGER AUTO_INCREMENT,
        name VARCHAR(30) NOT NULL,
        password VARCHAR(50) NOT NULL,
        PRIMARY KEY(admin_id)
)";

if(!$DBconn->query($sql) === TRUE){
    echo "(computer)table is not created";
}

$sql = "CREATE TABLE IF NOT EXISTS computer(
    computer_id INTEGER AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    cpu VARCHAR(50),
    cpu_bench FLOAT,
    gpu VARCHAR(50),
    gpu_bench FLOAT,
    ram VARCHAR(50),
    storage VARCHAR(50),
    price FLOAT,
    rate FLOAT,
    type VARCHAR(10),
    description TEXT,
    PRIMARY KEY(computer_id)
)";

if(!$DBconn->query($sql) === TRUE){
    echo "(computer)table is not created";
}

?>