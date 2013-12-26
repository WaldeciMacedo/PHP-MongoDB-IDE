<?php 
$GLOBALS['CONN'] = true;
require_once("inc/configuration.php");

$collection_name = post("__collection_name");

unset($_POST['__collection_name']);

$collection = $mongo->getCollection($collection_name);

$_POST['_id'] = new MongoID(post("_id"));

if($collection){

	$collection->save($_POST);

}

$_SESSION['msg-save'] = "Document saved successfully in ".date("m/d/Y H:i");

header("Location: document-edit.php?".base64_encode($collection_name."|".post("_id")));
?>