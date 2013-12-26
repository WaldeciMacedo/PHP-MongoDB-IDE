<?php
class Page {
  
	public $options = array(
		"data"=>array(
			"js"=>array(),
			"title"=>"",
			"meta_description"=>"",
			"meta_author"=>"João Rangel"
		)
	);
 
	public function __construct($options = array()){
 
		$options = array_merge($this->options, $options);
 
		$tpl = $this->getTpl();
		$this->options = $options;
 
		if(gettype($this->options['data'])=='array'){
			foreach($this->options['data'] as $key=>$val){
				$tpl->assign($key, $val);
			}
			if(isset($_SESSION['conn'])){
				
				$tpl->assign("conn_server", $_SESSION['conn']['server']);
				$tpl->assign("conn_database", $_SESSION['conn']['database']);

			}
		}
 
		$tpl->draw("header", false);
 
	}
 
	public function __destruct(){
 
		$tpl = $this->getTpl();
 
		if(gettype($this->options['data'])=='array'){
			foreach($this->options['data'] as $key=>$val){
				$tpl->assign($key, $val);
			}
		}
 
		$tpl->draw("footer", false);
 
	}

	public function setTpl($tplname, $data = array(), $returnHTML = false){

		$tpl = $this->getTpl();
 
		if(gettype($data)=='array'){
			foreach($data as $key=>$val){
				$tpl->assign($key, $val);
			}
		}
 
		return $tpl->draw($tplname, $returnHTML);

	}
  
	public function getTpl(){

		raintpl::configure("base_url", null );
		raintpl::configure("tpl_dir", PATH."/res/tpl/" );
		raintpl::configure("cache_dir", PATH."/res/tpl/tmp/" );

		return ($this->Tpl)?$this->Tpl:$this->Tpl = new RainTPL;

	}
 
}
?>