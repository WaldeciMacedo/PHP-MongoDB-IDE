<?php 
$GLOBALS['CONN'] = true;
require_once("inc/configuration.php");

$qs = explode("|", base64_decode($_SERVER['QUERY_STRING']));

$collection_name = $qs[0];
$_id = $qs[1];

$page = new Page(array(
	"data"=>array(
		"title"=>"Collection - ".$collection_name,
		"link"=>$_SERVER['HTTP_REFERER']
	)
));

$document = $mongo->getCollection($collection_name)->findOne(array("_id"=>new MongoId($_id)));

$doc = array();

foreach ($document as $key => $value) {

	switch(gettype($value)){

		case 'array':
		$doc[$key] = implode(", ", $value);
		break;

		case 'object':
		$doc[$key] = $value;
		break;

		default:
		$doc[$key] = $value;
		break;

	}

	//array_push($data, $doc);

}

$page->setTpl("document-edit", array("fields"=>$doc, "collection"=>$collection_name, "msg_success"=>$_SESSION['msg-save']));

unset($_SESSION['msg-save']);
?>