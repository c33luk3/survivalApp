<!DOCTYPE HTML>
<html lang="en">

<head>
<meta charset="utf-8">
<link rel='stylesheet' type='text/css' href= 'myheader.php'>

<div class="topnav">
  
  <a href="https://www.midwayusa.com/survival-gear/br?cid=22021">SHOP</a>
  <a href="https://www.amazon.com/SAS-Survival-Handbook-Third-Surviving/dp/0062378074">BOOKS</a>
  <a href="https://www.bioliteenergy.com/products?gclid=CjwKCAiAwojkBRBbEiwAeRcJZLZCcKbmJ-JM92u7szGRbcwdPKCv1AhJxGwFnIC54H4ltP8eEvIcThoC-lMQAvD_BwE">SOLAR</a>
  <a href="https://www.lifestraw.com/collections/outdoors">WATER</a>
  <a href="https://www.gosun.co/collections/our-solar-powered-cookers">COOKWARE</a>
  <a href="https://www.crkt.com/black-woods-chogan-t-hawk-with-sheath.html">BUSHCRAFT</a>
  <a href="https://www.attainable-sustainable.net/rocket-stove/">ROCKET-STOVE</a>
  <a href="http://www.acebeam.com/x80">LIGHT</a>
  <a href="https://www.rei.com/c/tents/f/fet-gore-tex">SHELTER</a>
  <a href="https://www.narescue.com/community-preparedness">FIRST-AID</a>
  <a href="https://wildoaktrail.com/products/inergy-solar-kodiak?gclid=CjwKCAiAwojkBRBbEiwAeRcJZPvfPvsKaUIP1vyBlvVFAlsGo_WnOrBCxIJa9UvKSOQJx3l2u2qPcxoCJeEQAvD_BwE">GENERATOR</a>
  <a href="http://www.energyweb.co.za/little-green-monster-biogas-domestic-digester/">BIO-GAS</a>
</div>

</head>

<body>

<h1>Survival Tip Jar</h1>

<div class="img">
    <img src="http://worldartsme.com/images/animated-storm-clipart-1.jpg">

</div>

<img src="http://considerthis.ctpodcasting.com/wp-content/uploads/TipJar.png">

<h2>Insert a Tip! Then select "Submit".</h2>


<br>
<form action="./tipAdder.php" method="get" >
      ENTER TIP HERE: <input type="text" name="tip">
                  <input type="SUBMIT">
</form>


<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "survivaltips";
$item = $_POST;
$T="category";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT category FROM mytips"); 
    $stmt->execute();
    $stmt ->setFetchMode(PDO::FETCH_ASSOC);
    $myTips = $stmt->fetchALL();
    foreach ($myTips as $T) {
        echo "<tr>";
        echo "<td>" . $T["category"] . "</td>";
        echo "<td><form method='post' action='./tipDeleter.php'><input hidden name='category' value='" . $T['category'] . "'>";
        echo "<input type ='submit' value = 'DELETE'> </form></td>";
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