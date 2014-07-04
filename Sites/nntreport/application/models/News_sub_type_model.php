<?php
/**
* Model : News_sub_type_model ตารางหมวดหมู่ข่าวย่อย 
* Table : NT03_NewsSubType
*/
class News_sub_type_model extends CI_Model {

	var $db_prefix = "[NNT_DataCenter_2].[dbo].";
	var $table_name="[NT03_NewsSubType]";
	var $NT03_SubTypeID = "";
	var $NT03_SubTypeName = "";
	var $NT02_TypeID = "";
	var $NT02_TypeName = "";
	var $NT03_Status = "";
	
	function getDbPrefix(){
		return $this->db_prefix;
	}
	function getTableName(){
		return $this->table_name;
	}
	function setSubTypeId($subTypeId){
		$this->NT03_SubTypeID = $subTypeId;
	}
	function getSubTypeId(){
		return $this->NT03_SubTypeID;
	}
	function setSubTypeName($subTypeName){
		$this->$NT03_SubTypeName = $subTypeName;
	}
	function getSubTypeName(){
		return $this->NT03_SubTypeName;
	}
	function setTypeId($typeId){
		$this->NT02_TypeID = $typeId;
	}
	function getTypeId(){
		return $this->NT02_TypeID;
	}
	function setTypeName($typeName){
		$this->$NT02_TypeName = $typeName;
	}
	function getTypeName(){
		return $this->NT02_TypeName;
	}
	function setStatus($status){
		$this->NT03_Status = $status;
	}
	function getStatus(){
		return $this->NT03_Status;
	}

	function count(){
		$ait = $this->ait;
		$query = "
			SELECT COUNT([NT03_SubTypeID]) as CountRow
				FROM ".$this->getDbPrefix().$this->getTableName()." 
			WHERE [NT03_Status] IN ('Y') ";
		$ait->queryString = $query;
		$rs =  $ait->query();
		return $rs['result'][0]->CountRow;
	}
	function findAll() {
		$ait = $this->ait;
		$query = "
			SELECT t1.[NT03_SubTypeID] as subTypeId,
				t1.[NT03_SubTypeName] as subTypeName,
				t1.[NT02_TypeID] as typeId,
				t1.[NT03_Status] as status
			FROM ".$this->getDbPrefix().$this->getTableName()." t1 
				INNER JOIN ".$this->getDbPrefix()." [NT02_NewsType] t2 
				ON(t1.[NT02_TypeID] = t2.[NT02_TypeID])
			WHERE t1.[NT03_Status] IN ('Y') ";
		$ait->queryString = $query;
		$rs =  $ait->query();
		return $rs['result'];
	}
	
	function findByTypeID() {
		$ait = $this->ait;
		$query = "
		SELECT t1.[NT03_SubTypeID] as subTypeId,
		t1.[NT03_SubTypeName] as subTypeName,
		t1.[NT02_TypeID] as typeId,
		t1.[NT03_Status] as status
		FROM ".$this->getDbPrefix().$this->getTableName()." t1 
		INNER JOIN ".$this->getDbPrefix()." [NT02_NewsType] t2 
		ON(t1.[NT02_TypeID] = t2.[NT02_TypeID])
		WHERE t1.[NT03_Status] IN ('Y') 
		AND t1.[NT02_TypeID] = ".$this->getTypeId();
		$ait->queryString = $query;
		$rs =  $ait->query();
		return $rs['result'];
	}
	
	function toString(){
		$ait = $this->ait;
		$query = "
		SELECT [NT03_SubTypeName] as subTypeName
		FROM ".$this->getDbPrefix().$this->getTableName()."
		WHERE [NT03_SubTypeID] = '".$this->getSubTypeId()."'";
		$ait->queryString = $query;
		$rs = $ait->query();					
		return $rs['result'][0]->subTypeName;
	}
}