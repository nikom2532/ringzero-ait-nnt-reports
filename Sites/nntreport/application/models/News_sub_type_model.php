<?php
/**
* Model : News_sub_type_model ตารางหมวดหมู่ข่าวย่อย 
* Table : NT03_NewsSubType
*/
class News_sub_type_model extends CI_Model {

	var $NT03_SubTypeID = "";
	var $NT03_SubTypeName = "";
	var $NT02_TypeID = "";
	var $NT03_Status = "";
	var $NT03_SubTypeNameEn = "";
	var $TN_ID = "";
	var $SUBTN_ID = "";
	
	function __construct() {
		parent::__construct();
	}
	
	public function findAll($status=array()) {
		$statusArray = array();
		foreach($status as $val){
			$statusArray[] = "'".$val."'";
		}
		$status = implode(",",$statusArray);
		   		
		$queryString = "SELECT [NT03_SubTypeID],[NT03_SubTypeName],[NT02_TypeID],[NT03_Status],[NT03_SubTypeNameEn],[TN_ID],[SUBTN_ID]	FROM [NT03_NewsSubType] WHERE [NT03_Status] IN (".$status.") ";
		$this->ait->queryString = $queryString;
		$this->ait->init();
		return $this->ait->query();
	}
		   
	
	public function findByTypeID($status=array()) {
		$statusArray = array();
		foreach($status as $val){
			$statusArray[] = "'".$val."'";
		}
		$status = implode(",",$statusArray);
		
		$queryString = "SELECT [NT03_SubTypeID],[NT03_SubTypeName],[NT02_TypeID],[NT03_Status],[NT03_SubTypeNameEn],[TN_ID],[SUBTN_ID]	FROM [NT03_NewsSubType] WHERE [NT03_Status] IN (".$status.") AND [NT02_TypeID] = '".$this->NT02_TypeID."'";
		$this->ait->queryString = $queryString;
		$this->ait->init();
		return $this->ait->query();
	}
	
	
}