<?php
/**
* Model : News Category หมวดหมู่ข่าว 
* Table : NT02_NewsType
*/
class News_type_model extends CI_Model
{
	var $db_prefix = "[NNT_DataCenter_2].[dbo].";
	var $table_name="[NT02_NewsType]";
	var $NT02_TypeID="";
	var $NT02_TypeName="";
	var $NT02_Status="";
	function __construct()
	{
		parent::__construct();
	}
	function getDbPrefix(){
		return $this->db_prefix;
	}
	function getTableName(){
		return $this->table_name;
	}
	function setTypeId($typeId){
		$this->NT02_TypeID = $typeId;
	}
	function getTypeId(){
		return $this->NT02_TypeID;
	}
	function setTypeName($typeName){
		$this->NT02_TypeName = $typeName;
	}
	function getTypeName(){
		return $this->NT02_TypeName;
	}
	function setStatus($status){
		$this->NT02_Status = $status;
	}
	function getStatus(){
		return $this->NT02_Status;
	}

	function count(){
		$ait = $this->ait;
		$query = "
			SELECT COUNT([NT02_TypeID]) as CountRow
			FROM ".$this->getDbPrefix().$this->getTableName()."
			WHERE [NT02_Status] IN('Y') 
			ORDER BY [NT02_Sequence] ASC";
		$ait->queryString($query);
		$rs = $ait->query();
		return $rs['result'][0]->CountRow;
	}
	function findAll() {
		$ait = $this->ait;
		$query = "
			SELECT [NT02_TypeID] as typeId,
				[NT02_TypeName] as typeName,
				[NT02_Status] as status
			FROM ".$this->getDbPrefix().$this->getTableName()."
			WHERE [NT02_Status] IN('Y') 
			ORDER BY [NT02_Sequence] ASC";
		$ait->queryString($query);
		$rs = $ait->query();
		return $rs['result'];
	}
	function findById() {
		$ait = $this->ait;
		$query = "
			SELECT [NT02_TypeName] as typeName,
				[NT02_Status] as status
			FROM ".$this->getDbPrefix().$this->getTableName()."
			WHERE [NT02_Status] IN('Y') 
				AND [NT02_TypeID] =".$this->getTypeId();
		$ait->queryString($query);
		$rs = $ait->query();
		$this->setTypeName($rs['result'][0]->typeName);
		$this->setStatus($rs['result'][0]->status);
	}
	function toString(){
		$ait = $this->ait;
		$query = "
			SELECT [NT02_TypeName] as typeName
            FROM ".$this->getDbPrefix().$this->getTableName()."
            WHERE [NT02_TypeID] ='".$this->getTypeId()."'";
        $ait->queryString = $query ;
        $result = $ait->query();
        return $result['result'][0]->typeName;
	}
}