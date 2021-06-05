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
    stock INTEGER,
    cpu VARCHAR(50),
    cpu_bench FLOAT,
    gpu VARCHAR(50),
    gpu_bench FLOAT,
    ram VARCHAR(50),
    storage VARCHAR(50),
    price FLOAT,
    discount FLOAT,
    rate FLOAT,
    type VARCHAR(10),
    description TEXT,
    PRIMARY KEY(computer_id)
)";

if(!$DBconn->query($sql) === TRUE){
    echo "(computer)table is not created";
}

$sql = "CREATE TABLE IF NOT EXISTS comment(
    comment_id INTEGER AUTO_INCREMENT,
    user_id INTEGER,
    computer_id INTEGER,
    caption VARCHAR(100),
    comment VARCHAR(255),
    rate INTEGER,
    PRIMARY KEY(comment_id),
    FOREIGN KEY(user_id) REFERENCES user(user_id),
    FOREIGN KEY(computer_id) REFERENCES computer(computer_id)
    )";

if(!$DBconn->query($sql) === TRUE){
    echo "(comment)table is not created";
}

$sql = "CREATE TABLE IF NOT EXISTS address(
    address_id INTEGER AUTO_INCREMENT,
    user_id INTEGER,
    location VARCHAR(255),

    PRIMARY KEY(address_id),
    FOREIGN KEY(user_id) REFERENCES user(user_id)
    
)";

if(!$DBconn->query($sql) === TRUE){
    echo "(address)table is not created";
}

$sql = "CREATE TABLE IF NOT EXISTS image(
    img_id INTEGER AUTO_INCREMENT,
    computer_id INTEGER,
    path VARCHAR(255),

    PRIMARY KEY(img_id),

    FOREIGN KEY(computer_id) REFERENCES computer(computer_id)
)";

if(!$DBconn->query($sql) === TRUE){
    echo "(image)table is not created";
}

$sql = "CREATE TABLE IF NOT EXISTS sale(
    sale_id INTEGER AUTO_INCREMENT,
    computers TEXT,
    user_id INTEGER,
    price FLOAT,
    state VARCHAR(50),
    address_id INTEGER,

    PRIMARY KEY(sale_id),
    FOREIGN KEY(user_id) REFERENCES user(user_id),
    FOREIGN KEY(address_id) REFERENCES address(address_id)

)";

if(!$DBconn->query($sql) === TRUE){
    echo "(sale)table is not created";
}

?>