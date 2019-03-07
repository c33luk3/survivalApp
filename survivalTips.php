<!DOCTYPE HTML>
<html>
<body>
<link rel='stylesheet' type='text/css' href= 'myheader.php'>
<h1>Survival Tip adder</h1>
<h2>Insert a Tip! Then select "Submit".</h2>

<br>
<form action="./tipAdder.php" method="get" action ="<?php echo $_SERVER['PHP_SELF'];?>">
      Enter Tip here: <input type="text" name="Tip">
                  <input type="submit">
                  
</form>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survivaltips";
$item = $_POST;
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT category FROM MyTips"); 
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $myTips = $stmt->fetchALL();
    foreach ($myTips as $T) {
        echo "<tr>";
        echo "<td>" . $T["tip"] . "</td>";
        echo "<td>" . "<form method='post' action='./tipDeleter.php'>" . "<input hidden name ='id' value=".$T['id'].">
        <input type ='submit' value = 'DELETE'> </form>" . "</td>";
        echo "</tr>";
    } 
}
catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
}
if ($_POST) {
$item = $_POST["item"];
}
function validateItem($item) {
    $item=trim('item');
    $item=stripslashes('item');
    $item=htmlspecialchars('item');
    return $item;
}
validateItem($item);
?>