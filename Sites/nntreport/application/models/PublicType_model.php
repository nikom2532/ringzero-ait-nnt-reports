<?php
class PublicType_model extends CI_Model {

	var $db_prefix = "[NNT_DataCenter_2].[dbo].";
	var $table_name ="NT08_PublicType";
	var $NT08_PubTypeID = "";
	var $NT08_PubTypeName = "";
	var $NT08_Status = "";
	
	function getTableName(){
		return $this->table_name;
	}
	function getDbPrefix(){
		return $this->db_prefix;
	}
	function setPubTypeId($id){
		$this->NT08_PubTypeID = $id;
	}
	function getPubTypeId(){
		return $this->NT08_PubTypeID;
	}
	function setPubTypeName($pubTypeName){
		$this->NT08_PubTypeName = $pubTypeName;
	}
	function getPubTypeName(){
		return $this->NT08_PubTypeName;
	}
	function setStatus($status){
		$this->NT08_Status = $status;
	}
	function getStatus(){
		return $this->NT08_Status;
	}

	function count(){
		$ait = $this->ait;
		$ait->queryString = "
			SELECT COUNT([NT08_PubTypeID]) as CountRow
			FROM ".$this->getDbPrefix().$this->getTableName()."
			WHERE [NT08_Status] IN ('Y') ";
		$rs = $ait->query();
		return $rs['result'][0]->CountRow;
	}
	function findAll(){
		$ait = $this->ait;
		$ait->queryString = "
			SELECT [NT08_PubTypeID] as pubTypeId,
				[NT08_PubTypeName] as pubTypename,
				[NT08_Status] as status
			FROM ".$this->getDbPrefix().$this->getTableName()."
			WHERE [NT08_Status] IN ('Y') ";
		$rs = $ait->query();
		return $rs['result'];
	}

	function findById(){
		$ait = $this->ait;
		$ait->queryString = "
			SELECT [NT08_PubTypeID] as pubTypeId,
				[NT08_PubTypeName]as pubTypeName,
				[NT08_Status] as status 
			FROM ".$this->getDbPrefix().$this->getTableName()."
			WHERE [NT08_Status] IN ('Y') AND [NT08_PubTypeID] = ".$this->getPubTypeId();
		$rs = $ait->query();
		$this->setPubTypeName($rs['result'][0]->pubTypeName);
		$this->setStatus($rs['result'][0]->status);
	}

	function toString(){
		$ait = $this->ait;
		$ait->queryString = "
			SELECT [NT08_PubTypeName] as pubTypeName
			FROM ".$this->getDbPrefix().$this->getTableName()." 
			WHERE [NT08_Status] IN ('Y') 
				AND [NT08_PubTypeID] = ".$this->getPubTypeId();
		$rs = $ait->query();
		$this->setPubTypeName($rs['result'][0]->pubTypeName);
	}
}