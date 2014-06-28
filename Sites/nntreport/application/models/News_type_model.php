<?php
/**
* Model : News Category หมวดหมู่ข่าว 
* Table : NT02_NewsType
*/
class News_type_model extends CI_Model
{
	var $NT02_TypeID="";
	var $NT02_TypeCode="";
	var $NT02_TypeName="";
	var $NT02_Status="";
	var $NT02_TypeNameEn="";
	var $PRD_ID="";
	var $TN_ID="";
	var $SUBTN_ID="";
	var $NT02_Sequence="";
	var $condition = array();
	var $table_name="NT02_NewsType";


	function __construct()
	{
		parent::__construct();
		
	}

	function findAll($status=array()) {
		$statusArray = array();
		foreach($status as $val){
			$statusArray[] = "'".$val."'";
		}
		$status = implode(",",$statusArray);
		
		$this->ait->queryString = "SELECT [NT02_TypeID],[NT02_TypeCode],[NT02_TypeName],
		[NT02_Status],[NT02_TypeNameEn] 
		FROM [NT02_NewsType] 
		WHERE [NT02_Status] IN(".$status.") 
		ORDER BY [NT02_Sequence] ASC";
		$this->ait->init();
		return $this->ait->query();
	}
	
	/*function findAll_pageing($page=1,$row_per_page=20){
		$start = $page==1?0:$page*$row_per_page-($row_per_page);
		$end = $page*$row_per_page;
		
		$this->ait->queryString = "WITH LIMIT AS(SELECT [NT02_TypeID],[NT02_TypeCode],[NT02_TypeName],
		[NT02_Status],[NT02_TypeNameEn] ,
		ROW_NUMBER() OVER (ORDER BY [NT02_Sequence] ASC) AS 'RowNumber'
		FROM [NNT_DataCenter_2].[dbo].[NT02_NewsType]  WHERE [NT02_Status] IN('Y') )
		
		SELECT * from LIMIT WHERE RowNumber BETWEEN $start AND $end";
		$this->ait->init();
		return $this->ait->query();
	}*/
	function findBy(){
		$this->ait->table_name = $this->table_name;
		$this->ait->condition = array("");
	}
	

}