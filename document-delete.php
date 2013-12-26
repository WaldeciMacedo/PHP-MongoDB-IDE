<?php 
$GLOBALS['CONN'] = true;
require_once("inc/configuration.php");

$qs = explode('|',base64_decode($_SERVER['QUERY_STRING']));
$collection_name = $qs[0];
$_id = $qs[1];

$collection = $mongo->getCollection($collection_name);

$collection->remove(array('_id' => new MongoId($_id)));

header("Location: collection-view.php?collection=".base64_encode($collection_name));
?>