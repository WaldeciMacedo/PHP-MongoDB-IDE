<?php 
$GLOBALS['CONN'] = true;
require_once("inc/configuration.php");

$collection_name = base64_decode(get("collection"));

$page = new Page(array(
	"data"=>array(
		"title"=>"Collection - ".$collection_name,
		"link"=>$_SERVER['HTTP_REFERER']
	)
));

$limit = (get("limit"))?(int)get("limit"):NULL;
$skip = (get("skip"))?(int)get("skip"):NULL;

if($limit && $skip){

	$result = $mongo->getCollectionRows($collection_name, $limit, $skip);

}elseif($limit){

	$result = $mongo->getCollectionRows($collection_name, $limit);

}else{

	$result = $mongo->getCollectionRows($collection_name);

}

$result['collection'] = base64_encode($collection_name);

$data = $result;

$page->setTpl("collection-view", $data);
?>