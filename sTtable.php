<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survivaltips";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // sql to create table
    $sql = "CREATE TABLE MyTips (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
    Tip VARCHAR(30) NOT NULL,
    reg_date TIMESTAMP
    )";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Table MyTips created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
?>