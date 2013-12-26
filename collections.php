<?php 
$GLOBALS['CONN'] = true;
require_once("inc/configuration.php");

$page = new Page(array(
	"data"=>array(
		"title"=>"Collections"
	)
));

$data = array(
	"collections"=>$mongo->getCollections()
);

$page->setTpl("collections", $data);
?>