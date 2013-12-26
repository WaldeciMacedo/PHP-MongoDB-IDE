<?php 
require_once("inc/configuration.php");

$m = new MDB("cordoba", "CRM");

$collections = array();

foreach($m->getDB()->listCollections() as $collection){


	array_push($collections, array(
		"name"=>$collection->getName(),
		"count"=>$collection->count()
	));

}

echo json_encode($collections);

?>