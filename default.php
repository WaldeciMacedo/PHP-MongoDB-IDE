<?php 
require_once("inc/configuration.php");

unset($_SESSION['conn']);

$page = new Page(array(
	"data"=>array(
		"title"=>"MongoDB IDE - BETA"
	)
));

$data = array(
	"connections"=>$_SESSION['connections']
);

$page->setTpl("default", $data);
?>