<?php 
require_once("inc/configuration.php");

try{

	if(post("user") && post("pass")){

		$mongo = new MongoClient("mongodb://".post('server')."/".post('database').":".post('user')."@".post('pass'));

	}else{

		$mongo = new MongoClient("mongodb://".post('server')."/".post('database'));

	}

	if(!isset($_SESSION['connections']) || !gettype($_SESSION['connections'])=="array") $_SESSION['connections'] = array();

	$id = base64_encode(microtime(true));

	array_push($_SESSION['connections'], array(
		"server"=>post("server"),
		"database"=>post("database"),
		"user"=>post("user"),
		"pass"=>post("pass"),
		"date"=>date("Y-m-d H:i"),
		"id"=>$id
	));

	header("Location: connect.php?".$id);

}catch(Excpetion $e){

	$page = new Page();
	$page->setTpl("error", array(
		"msg"=>$e->getMessage(),
		"code"=>$e->getCode()
	));

}
?>