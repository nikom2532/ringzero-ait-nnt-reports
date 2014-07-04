<?php
class Province_model extends CI_Model{
	
	var $db_prefix = "[NNT_DataCenter_2].[dbo].";
	var $table_name = "[CM06_Province]";
	var $CM06_ProvinceID = "";
	var $CM06_ProvinceName ="" ;
	var $CM05_RegionID = "";
	var $CM06_Status = "";
	
	function getDbPrefix(){
		return $this->db_prefix;
	}
	function getTableName(){
		return $this->table_name;
	}
	function setProvinceId($provinceId){
		$this->CM06_ProvinceID = $provinceId;
	}
	function getProvinceId(){
		return $this->CM06_ProvinceID;
	}
	function setProvinceName($provinceName){
		$this->CM06_ProvinceName = $provinceName;
	}
	function getProvinceName(){
		return $this->CM06_ProvinceName;
	}
	function setRegionId($regionId){
		$this->CM05_RegionID = $regionId;
	}
	function getRegionId(){
		return  $this->CM05_RegionID;
	}
	function setStatus($status){
		$this->CM06_Status = $status;
	}
	function getStatus(){
		return $this->CM06_Status;
	}
	
	function count(){
		$ait = $this->ait;	
		$query = "
			SELECT COUNT([CM06_ProvinceID]) as CountRow
			FROM ".$this->getDbPrefix().$this->getTableName()." 
			WHERE [CM06_Status] IN('Y')";
		$ait->queryString = $query;
		$rs =  $ait->query();
		return $rs['result'][0]->CountRow;
	}
	function findAll() {
		$ait = $this->ait;	
		$query = "
			SELECT t1.[CM06_ProvinceID] as provinceId,
				t1.[CM06_ProvinceName] as provinceName,
				t1.[CM05_RegionID] as regionId,
				t1.[CM06_Status] as status,
				t2.[CM05_RegionName] as RegionName
				ROW_NUMBER() OVER (ORDER BY t1.[CM05_RegionID] ASC, t1.CM06_ProvinceID ASC) AS 'RowNumber' 
			FROM ".$this->getDbPrefix().$this->getTableName()." t1 
				INNER JOIN  ".$this->getDbPrefix()."[CM05_Region] t2 
				ON(t1.[CM05_RegionID] = t2.[CM05_RegionID])
			WHERE t1.[CM06_Status] IN('Y')";	
		$ait->queryString = $query;
		$rs =  $ait->query();
		return $rs['result'];
	}
	
	function findByRegionId(){
		$ait = $this->ait;		
		$query = "
			SELECT [CM06_ProvinceID] as provinceId,
				[CM06_ProvinceName] as provinceName,
				[CM05_RegionID] as regionId,
				[CM06_Status] as status
			FROM ".$this->getDbPrefix().$this->getTableName()."
			WHERE [CM06_Status] IN('Y') AND [CM05_RegionID] = '".$this->getRegionId()."' 
			ORDER BY [CM06_ProvinceID] ASC";
		$ait->queryString = $query;
		$rs =  $ait->query();
		return $rs['result'];
	}

	function toString(){
		$ait = $this->ait;
		$query = "
			SELECT [CM06_ProvinceName] as provinceName 
			FROM ".$this->getDbPrefix().$this->getTableName()."
			WHERE [CM06_ProvinceID] = '".$this->getProvinceId()."' ";
		$ait->queryString = $query;
		$rs = $ait->query();
		return $rs['result'][0]->provinceName;
	}
}