<?php 
class MDB {

	private $mongo;
	private $server;
	private $database;

	public function __construct($server, $database = "test", $user = NULL, $pass = NULL){

		$this->server = $server;
		$this->database = $database;

		if($user && $pass){

			$this->mongo = new MongoClient("mongodb://$server/$database:$user@$pass");

		}else{

			$this->mongo = new MongoClient("mongodb://$server/$database");

		}

	}

	public function getDB(){

		return $this->mongo->selectDB($this->database);

	}

	public function getCollections(){

		$collections = array();
		foreach($this->getDB()->listCollections() as $collection){

			array_push($collections, array(
				"id"=>base64_encode($collection->getName()),
				"collection"=>$collection,
				"server"=>$this->server,
				"database"=>$this->database,
				"name"=>$collection->getName(),
				"count"=>$collection->count()
			));

		}

		return $collections;

	}

	public function getCollection($name){

		return $this->getDB()->selectCollection($name);

	}

	public function getCollectionRows($name, $limit = 50, $skip = 0){

		$collection = $this->getCollection($name);

		$total = $collection->count();

		$cursor = $collection->find()->limit($limit)->skip($skip);

		$documents = array();

		foreach ($cursor as $doc) {
			
			$keys = array();

			foreach ($doc as $key => $value) {
				array_push($keys, $key);
			}

			array_push($documents, array(
				"document"=>$doc,
				"name"=>json_encode($doc),
				"fields"=>count($keys),
				"keys"=>$keys,
				"id"=>base64_encode($name."|".$doc["_id"])
			));

		}

		$page = $skip/$limit;
		$totalpages = (int)($total/$limit);

		$pages = array();

		$pagesAfterAndBefore = 10;

		if($page-$pagesAfterAndBefore > 0) array_push($pages, "...");

		for ($i = $page-$pagesAfterAndBefore; $i <= $page+$pagesAfterAndBefore; $i++) {			
			if($i > 0) array_push($pages, $i);
		}

		if($page+$pagesAfterAndBefore < $totalpages) array_push($pages, "...");

		return array(
			"rows"=>$documents,
			"total"=>$total,
			"limit"=>$limit,
			"skip"=>$skip,
			"totalpages"=>$totalpages,
			"pages"=>$pages,
			"page"=>(int)($page)
		);

	}

}
?>