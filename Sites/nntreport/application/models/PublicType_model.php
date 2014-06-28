<?php
class PublicType_model extends CI_Model {
	
	var $NT08_PubTypeID = "";
	var $NT08_PubTypeName = "";
	var $NT08_Status = "";
	var $table_name ="NT08_PublicType";
	
	function __construct() {
		parent::__construct();
	}
	
	function findAll($status=array()){
		$statusArray = array();
		foreach($status as $val){
			$statusArray[] = "'".$val."'";
		}
		$status = implode(",",$statusArray);
		
		$this->ait->queryString = "SELECT [NT08_PubTypeID],[NT08_PubTypeName],[NT08_Status] FROM [NT08_PublicType] WHERE [NT08_Status] IN (".$status.") ";
		$this->ait->init();
		return $this->ait->query();
	}
}