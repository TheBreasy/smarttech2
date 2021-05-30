<?php

include_once ("includes/Db.php");
$conn = Db::getConnection();
var_dump($conn);
//sla de gemeten data op van de sensor naar de databank
$statementPost =$conn->prepare("INSERT INTO DHT11 (temp) VALUES ('".$_GET["temp"]."', '".$_GET["humidity"]."')");
$statementPost->execute();