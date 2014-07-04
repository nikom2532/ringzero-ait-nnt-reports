<?php
/**
* Model : Region ภูมิภาค
* Table : CM05_RegionID
*/
class Region_model extends CI_Model
{
	var $db_prefix = "[NNT_DataCenter_2].[dbo].";
	var $table_name = "[CM05_Region]";
	var $CM05_RegionID = "";
	var $CM05_RegionName = "";
	var $CM05_Status = "";
	var $CM05_RegionNameEn = "";

	function getDbPrefix(){
		return $this->db_prefix;
	}
	function getTableName(){
		return $this->table_name;
	}
	function setRegionId($regionId){
		$this->CM05_RegionID = $regionId;
	}
	function getRegionId(){
		return $this->CM05_RegionID;
	}
	function setRegionName($regionName){
		$this->CM05_RegionName = $regionName;
	}
	function getRegionName(){
		return $this->CM05_RegionName;
	}
	function setStatus($status){
		$this->CM05_Status = $status;
	}
	function getStatus(){
		return $this->CM05_Status;
	}

	function count(){
		$ait = $this->ait;
		$ait->queryString = "
			SELECT COUNT([CM05_RegionID]) as CountRow
			FROM ".$this->getDbPrefix().$this->getTableName()." 
			WHERE [CM05_Status] IN('Y')";
		$rs = $ait->query();
		return $rs['result'][0]->CountRow;
	}
	function findAll()
	{
		$ait = $this->ait;
		$ait->queryString = "
			SELECT [CM05_RegionID] as regionId,
				[CM05_RegionName] as regionName,
				[CM05_Status] as status
			FROM ".$this->getDbPrefix().$this->getTableName()." 
			WHERE [CM05_Status] IN('Y') 
			ORDER BY [CM05_RegionID] ASC";
		$rs = $ait->query();
		return $rs['result'];
	}
	
	function findById(){
		$ait = $this->ait;
		$ait->queryString = "
			SELECT [CM05_RegionName] as regionName,
				[CM05_Status] as status
			FROM ".$this->getDbPrefix().$this->getTableName()." 
			WHERE [CM05_Status] IN('Y') 
			AND [CM05_RegionID] = ".$this->getRegionId;
		$rs = $ait->query();
		$this->setRegionName($rs['result'][0]->regionName);
		$this->setRegionId($rs['result'][0]->status);
	}

	function toString(){
		$ait = $this->ait;
		$query = "
			SELECT [CM05_RegionName] as regionName
			FROM ".$this->getDbPrefix().$this->getTableName()." 
			WHERE [CM05_RegionID] = '".$this->getRegionId()."' ";
		$ait->queryString = $query;
		$result = $ait->query();
		$this->setRegionName($result['result'][0]->regionName);
	}
}