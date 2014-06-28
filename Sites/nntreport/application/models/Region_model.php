<?php
/**
* Model : Region ภูมิภาค
* Table : CM05_RegionID
*/
class Region_model extends CI_Model
{
	var $CM05_RegionID = "";
	var $CM05_RegionName = "";
	var $CM05_Status = "";
	var $CM05_RegionNameEn = "";
	var $table_name = "[CM05_Region]";

	function __construct()
	{
		parent::__construct();
	}

	public function findAll($status=array())
	{
		$statusArray = array();
		foreach($status as $val){
			$statusArray[] = "'".$val."'";
		}
		$status = implode(",",$statusArray);
		
		$this->ait->queryString = "SELECT [CM05_RegionID],[CM05_RegionName],[CM05_Status],
			[CM05_RegionNameEn] FROM ".$this->table_name." WHERE [CM05_Status] IN(".$status.") 
			ORDER BY [CM05_RegionID] ASC";
		$this->ait->init();
		return $this->ait->query();
	}
	
}