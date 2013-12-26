<?php 
session_start();
/* ********************************************************* */
define("PATH", $_SERVER["DOCUMENT_ROOT"]."/mongodb/");
/* ********************************************************* */
require_once("function.php");
require_once("raintpl-v.2.7.2/inc/rain.tpl.class.php");
/* ********************************************************* */
if(isset($GLOBALS['CONN'])){

	if(!isset($_SESSION['conn'])){

		header("Location: default.php");
		exit;

	}else{

		$mongo = new MDB($_SESSION['conn']['server'], $_SESSION['conn']['database'], $_SESSION['conn']['user'], $_SESSION['conn']['pass']);

	}

}
/* ********************************************************* */
?>