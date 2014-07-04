<?php
/**
* Model : Department 
* Table : ตารางสังกัด/หน่วยงาน [SC07_Department]
*/
class Department_model extends CI_Model {
	
	var $db_prefix = "[NNT_DataCenter_2].[dbo].";
	var $table_name = "[SC07_Department]";
	var $SC07_DepartmentId = "";
	var $SC07_ParentDepartmentId = "";
	var $SC07_DepartmentName = "";
	var $SC07_Status = "";
	var $CM06_ProvinceID = "";
	var $CM05_RegionID = "";
	var $NT01_ReporterID = "";
	var $NT02_TypeID = "";
	var $current_page = 1;
	var $page_row = 20;
	var $num_rows = 0;

	function setDepartmentId($departmentId){
		$this->SC07_DepartmentId = $departmentId;
	}	
	function getDepartmentId(){
		return $this->SC07_DepartmentId;
	}
	function setParentDepartmentId($parentDepartmentId){
		$this->SC07_ParentDepartmentId = $parentDepartmentId;
	}
	function getParentDepartmentId(){
		return $this->SC07_ParentDepartmentId;
	}
	function setDepartmentName($departmentName){
		$this->SC07_DepartmentName = $departmentName;
	}
	function getDepartmentName(){
		return $this->SC07_DepartmentName;
	}
	function setStatus($status){
		$this->SC07_Status = $status;
	}
	function setProvinceId($provinceId){
		$this->CM06_ProvinceID = $provinceId;
	}
	function getProvinceId(){
		return $this->CM06_ProvinceID;
	}
	function setRegionId($region){
		$this->CM05_RegionID = $region;
	}
	function getRegionId(){
		return $this->CM05_RegionID;
	}
	function setReporterId($reporterId){
		$this->NT01_ReporterID = $reporterId;
	}
	function getReporterId(){
		return $this->NT01_ReporterID;
	}
	function setTypeId($typeId){
		$this->NT02_TypeID = $typeId;
	}
	function getTypeId(){
		return $this->NT02_TypeID;
	}
	function getTableName(){
		return $this->table_name;
	}
	function getDbPrefix(){
		return $this->db_prefix;
	}
	function setCurrentPage($current_page){
		$this->current_page = $current_page;
	}
	function getCurrentpage(){
		return $this->current_page;
	}
	function setPageRow($page_row){
		$this->page_row = $page_row;
	}
	function getPageRow(){
		return $this->page_row;
	}
	function setNumRows($num_rows){
		$this->num_rows = $num_rows;
	}
	function numRows(){
		return $this->count();
	}

	function __construct(){
		$ait = $this->ait;
	}

	function count() {
		// conditon for search
		$condition = array();
		if($this->getParentDepartmentId()!="0"&&$this->getParentDepartmentId()!=""){
			$dept = " (t1.[SC07_ParentDepartmentId]= '".$this->getParentDepartmentId()."' ";
				if($this->getDepartmentId()!="0"&&$this->getDepartmentId()!=""){
					$dept.=" AND t1.[SC07_DepartmentId]= '".$this->getDepartmentId()."' ";
				}
			$dept.=")";
			array_push($condition,$dept);
		}
		if($this->getRegionId()!="0"&&$this->getRegionId()!=""){
			array_push($condition,"t2.[CM05_RegionID] = '".$this->getRegionId()."'");
		}
		if($this->getReporterId()!="0"&&$this->getReporterId()!=""){
			array_push($condition,"t2.[SC03_UserId] = '".$this->getReporterId()."'");
		}
		if($this->getTypeId()!="0"&&$this->getTypeId()!=""){
			array_push($condition,"t5.[NT02_TypeID] = '".$this->getTypeId()."'");
		}
		if($this->getProvinceId()!="0"&&$this->getProvinceId()!=""){
			array_push($condition,"t2.[CM06_ProvinceID] = '".$this->getProvinceId()."'");
		}
		$conditionArr = array();
		if(count($condition)>0){
			foreach($condition as $val){
				$conditionArr[] = $val;
			}
			$condition = implode(" AND ",$conditionArr);
		} else{
			$condition = "";
		}
		$ait = $this->ait;
		$query = "WITH COUNTLIMIT AS(
					SELECT distinct t1.[SC07_DepartmentId] as departmentId , 
						t1.[SC07_DepartmentName]
					FROM ".$this->getDbPrefix().$this->getTableName()." t1
					INNER JOIN ".$this->getDbPrefix()."[SC03_User] t2
						ON(t1.SC07_DepartmentId = t2.SC07_DepartmentId)
					INNER JOIN ".$this->getDbPrefix()."[CM05_Region] t3
						ON(t2.[CM05_RegionId] = t3.[CM05_RegionID])
					INNER JOIN ".$this->getDbPrefix()."[CM06_Province] t4
						ON(t2.[CM06_ProvinceId] = t4.[CM06_ProvinceId])
					INNER JOIN ".$this->getDbPrefix()."[NT01_News] t5
						ON(t2.[SC03_UserId] = t5.[NT01_ReporterID])
					WHERE [SC07_Status] IN ('Y')".($condition!=""?" AND $condition ":"").")
				SELECT COUNT(departmentId) as CountDepartment FROM COUNTLIMIT";
		$ait->queryString = $query;
		$rs = $this->ait->query();
		return $rs['result'][0]->CountDepartment;
	}

	// TODO : FindAll
	function findAll() {
		// variable for limit 0,0
		$start = ($this->getCurrentpage()==1?0:$this->getCurrentpage()*$this->getPageRow()-($this->getPageRow())+1);
		$end = $this->getCurrentpage()*$this->getPageRow();
		// end of limit
		// conditon for search
		$condition = array();
		if($this->getParentDepartmentId()!="0"&&$this->getParentDepartmentId()!=""){
			$dept = " (t1.[SC07_ParentDepartmentId]= '".$this->getParentDepartmentId()."' ";
				if($this->getDepartmentId()!="0"&&$this->getDepartmentId()!=""){
					$dept.=" AND t1.[SC07_DepartmentId]= '".$this->getDepartmentId()."' ";
				}
			$dept.=")";
			array_push($condition,$dept);
		}
		if($this->getRegionId()!="0"&&$this->getRegionId()!=""){
			array_push($condition,"t2.[CM05_RegionID] = '".$this->getRegionId()."'");
		}
		if($this->getReporterId()!="0"&&$this->getReporterId()!=""){
			array_push($condition,"t2.[SC03_UserId] = '".$this->getReporterId()."'");
		}
		if($this->getTypeId()!="0"&&$this->getTypeId()!=""){
			array_push($condition,"t5.[NT02_TypeID] = '".$this->getTypeId()."'");
		}
		if($this->getProvinceId()!="0"&&$this->getProvinceId()!=""){
			array_push($condition,"t2.[CM06_ProvinceID] = '".$this->getProvinceId()."'");
		}
		$conditionArr = array();
		if(count($condition)>0){
			foreach($condition as $val){
				$conditionArr[] = $val;
			}
			$condition = implode(" AND ",$conditionArr);
		} else{
			$condition = "";
		}

		$condition = implode(" AND ",$conditionArr);
		// end of condition for search 

		$ait = $this->ait;
		$query= "WITH DATASET AS(SELECT t1.[SC07_DepartmentId] as departmentId,
			ROW_NUMBER() OVER (ORDER BY t1.[SC07_DepartmentId] ASC) AS 'RowNumber'
			FROM ".$this->getDbPrefix().$this->getTableName()." t1
			INNER JOIN ".$this->getDbPrefix()."[SC03_User] t2
			ON(t1.SC07_DepartmentId = t2.SC07_DepartmentId)
			INNER JOIN ".$this->getDbPrefix()."[CM05_Region] t3
			ON(t2.[CM05_RegionId] = t3.[CM05_RegionID])
			INNER JOIN ".$this->getDbPrefix()."[CM06_Province] t4
			ON(t2.[CM06_ProvinceId] = t4.[CM06_ProvinceId])
			INNER JOIN ".$this->getDbPrefix()."[NT01_News] t5
			ON(t2.[SC03_UserId] = t5.[NT01_ReporterID])
			WHERE t1.[SC07_Status] IN ('Y') ".($condition!=""?"AND $condition":"")."
			GROUP BY t1.[SC07_DepartmentId]
			) 
		SELECT * FROM DATASET t1  
		".($this->getCurrentpage()!=0?"WHERE t1.RowNumber between $start and $end ":"");
		// echo $query;
		$ait->queryString=$query;
		$rs = $ait->query();
		return $rs['result'];
	}

	function findParentDepartment() {
		$ait = $this->ait;
		$ait->queryString = "
			SELECT [SC07_DepartmentId] as departmentId,
				[SC07_ParentDepartmentId] as parentDepartmentId,
				[SC07_DepartmentName] as departmentName,
				[SC07_Status] as status 
			FROM ".$this->getDbPrefix().$this->getTableName()." 
			WHERE [SC07_Status] IN ('Y') AND [SC07_ParentDepartmentId] IS NULL";
		$rs = $ait->query();
		return $rs['result'];
	}

	function findChildDepartment() {
		$ait = $this->ait;
		$ait->queryString = "
			SELECT [SC07_DepartmentId] as departmentId,
				[SC07_ParentDepartmentId] as parentDepartmentId,
				[SC07_DepartmentName] as departmentName,
				[SC07_Status] as status  
			FROM ".$this->getDbPrefix().$this->getTableName()." 
			WHERE [SC07_Status] IN ('Y') 
				AND [SC07_ParentDepartmentId] = '".$this->getParentDepartmentId()."' ";
		$rs = $ait->query();
		return $rs['result'];
	}

	function getParentDepartmentName(){
		$ait = $this->ait;
		$ait->queryString = "
			SELECT [SC07_ParentDepartmentId] as parentDepartmentName
			FROM  ".$this->getDbPrefix().$this->getTableName()."
			WHERE  [SC07_DepartmentId] = '".$this->getDepartmentId()."'";
		$result = $ait->query();
		$parentId = "";
		$parentName = "";
		$parentId = $result['result'][0]->parentDepartmentName;
		
		$ait->queryString = "
			SELECT [SC07_DepartmentName] as departmentName 
			FROM  ".$this->getDbPrefix().$this->getTableName()."
			WHERE  [SC07_ParentDepartmentId] = '$parentId'";
			$parentResult = $ait->query();
		return $parentResult['result'][0]->departmentName;
	}

	function toString(){
		$ait = $this->ait;
		$ait->queryString = "
			SELECT [SC07_DepartmentName] as departmentName
			FROM  ".$this->getDbPrefix().$this->getTableName()."
			WHERE  [SC07_DepartmentId] = '".$this->getDepartmentId()."'";
		$result = $ait->query();
		return  $result['result'][0]->departmentName; 
	}
}