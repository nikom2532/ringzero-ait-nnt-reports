<?php
class Province_model extends CI_Model{
	
	var $CM06_ProvinceID = "";
	var $CM06_ProvinceName ="" ;
	var $CM05_RegionID = "";
	var $CM06_Status = "";
	var $CM06_ProvinceNameEn = "";
	var $PRD_ID = "";
	var $TN_ID = "";
	
	
	function __construct() {
		parent::__construct();
	}
	
	public function findAll($status=array()) {
			$statusArray = array();
		foreach($status as $val){
			$statusArray[] = "'".$val."'";
		}
		$status = implode(",",$statusArray);
		
		$this->ait->queryString ="SELECT t2.[CM05_RegionName],t1.[CM06_ProvinceID],
		t1.[CM06_ProvinceName],t1.[CM05_RegionID],t1.[CM06_Status],
		t1.[CM06_ProvinceNameEn],t1.[PRD_ID],t1.[TN_ID],
		ROW_NUMBER() OVER (ORDER BY t1.[CM05_RegionID] ASC, t1.CM06_ProvinceID ASC) AS 'RowNumber' 
		FROM [NNT_DataCenter_2].[dbo].[CM06_Province] t1 
		INNER JOIN  [NNT_DataCenter_2].[dbo].[CM05_Region] t2 
		ON(t1.[CM05_RegionID] = t2.[CM05_RegionID])
		WHERE t1.[CM06_Status] IN(".$status.")";
		$this->ait->init();
		return $this->ait->query();
	}
	
	public function findByRegionId($status=array()){
		$statusArray = array();
		foreach($status as $val){
			$statusArray[] = "'".$val."'";
		}
		$status = implode(",",$statusArray);
		
		$this->ait->queryString = "SELECT [CM06_ProvinceID],[CM06_ProvinceName],[CM05_RegionID],
			[CM06_Status],[CM06_ProvinceNameEn],[PRD_ID],[TN_ID] 
			FROM [CM06_Province] 
			WHERE [CM06_Status] IN(".$status.") AND [CM05_RegionID] = '".$this->CM05_RegionID."' 
			ORDER BY [CM06_ProvinceID] ASC";
		$this->ait->init();
		return $this->ait->query();
	}
}