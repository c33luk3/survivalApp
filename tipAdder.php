<a href="survivalTips.php">Home</a>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survivaltips";
try {
    $tip = $_GET['tip'];
    $conn = new PDO ("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO MyTips (tip)
    VALUES ('$tip')";
    $conn->exec($sql);
    echo  "record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql  . $e->getMessage();
    }
?>