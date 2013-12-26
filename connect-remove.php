<?php 
require_once("inc/configuration.php");

$newConnections = array();

foreach ($_SESSION['connections'] as $value) {

	if($value['id']!=$_SERVER["QUERY_STRING"]){

		array_push($newConnections, $value);

	}

}

$_SESSION['connections'] = $newConnections;

header("Location: default.php");
?>