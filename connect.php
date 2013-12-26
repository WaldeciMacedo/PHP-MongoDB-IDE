<?php 
require_once("inc/configuration.php");

foreach ($_SESSION['connections'] as $value) {

	if($value['id']==$_SERVER["QUERY_STRING"]){

		$_SESSION['conn'] = $value;

	}

}

header("Location: collections.php");
?>