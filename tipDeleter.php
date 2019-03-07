<a href="survivalTips.php">Home</a>
<?php
$category= $_POST['category'];
echo $category;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survivaltips";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // sql to delete a record
    $sql = "DELETE FROM mytips WHERE category='$category'";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "Record deleted successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
?>