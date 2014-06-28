<?php
/**
* Model : Department 
* Table : ตารางสังกัด/หน่วยงาน [SC07_Department]
*/
class Department_model extends CI_Model {
	
	var $table_name = "SC07_Department";
	var $SC07_DepartmentId = "";
	var $SC07_ParentDepartmentId = "";
	var $SC07_DepartmentCode = "";
	var $SC07_DepartmentSeq = "";
	var $SC07_DepartmentName = "";
	var $SC07_DepartmentEmail = "";
	var $UpdUser = "";
	var $UpdDate = "";
	var $SC07_DepartmentNameEn = "";
	var $SC07_DepartmentIP = "";
	var $SC07_DepartmentPath = "";
	var $SC07_Status = "";
	var $CM06_ProvinceID = "";
	var $CM05_RegionID = "";
    var $NT01_ReporterID = "";
    var $NT02_TypeID = "";
	
	
	function __construct() {
		parent::__construct();
	}
	
	function count($status=array()) {
		$statusArray = array();
		foreach($status as $val){
			$statusArray[] = "'".$val."'";
		}
		$status = implode(",",$statusArray);

        $condition = array();
        if($this->SC07_ParentDepartmentId!="0"&&$this->SC07_ParentDepartmentId!=""){
            $dept = " (t1.[SC07_DepartmentId]= '".$this->SC07_ParentDepartmentId."' ";
            if($this->SC07_DepartmentId!="0"&&$this->SC07_DepartmentId!=""){
                $dept.=" AND t1.[SC07_DepartmentId]= '".$this->SC07_DepartmentId."' ";
            }
            $dept.=")";
            array_push($condition,$dept);
        }
        if($this->CM05_RegionID!="0"&&$this->CM05_RegionID!=""){
            array_push($condition,"t2.[CM05_RegionID] = '".$this->CM05_RegionID."'");
        }

        if($this->NT01_ReporterID!="0"&&$this->NT01_ReporterID!=""){
            array_push($condition,"t2.[SC03_UserId] = '".$this->NT01_ReporterID."'");
        }
        if($this->NT02_TypeID!="0"&&$this->NT02_TypeID!=""){
            array_push($condition,"t5.[NT02_TypeID] = '".$this->NT02_TypeID."'");
        }
        if($this->CM06_ProvinceID!="0"&&$this->CM06_ProvinceID!=""){
            array_push($condition,"t2.[CM06_ProvinceID] = '".$this->CM06_ProvinceID."'");
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

		$query = "WITH COUNTLIMIT AS(
SELECT distinct t1.[SC07_DepartmentId] as departmentId , t1.[SC07_DepartmentName]
FROM [NNT_DataCenter_2].[dbo].[SC07_Department] t1
	INNER JOIN [NNT_DataCenter_2].[dbo].[SC03_User] t2
	ON(t1.SC07_DepartmentId = t2.SC07_DepartmentId)
	INNER JOIN [NNT_DataCenter_2].[dbo].[CM05_Region] t3
	ON(t2.[CM05_RegionId] = t3.[CM05_RegionID])
	INNER JOIN [NNT_DataCenter_2].[dbo].[CM06_Province] t4
	ON(t2.[CM06_ProvinceId] = t4.[CM06_ProvinceId])
	INNER JOIN [NNT_DataCenter_2].[dbo].[NT01_News] t5
	ON(t2.[SC03_UserId] = t5.[NT01_ReporterID])
	WHERE [SC07_Status] IN ('Y')".($condition!=""?" AND $condition ":"").")
    SELECT COUNT(departmentId) as CountDepartment FROM COUNTLIMIT
    ";
//        echo $query;
		$this->ait->queryString = $query;
		$this->ait->init();
		$rs = $this->ait->query();
		$count = 0;
		foreach($rs['result'] as $val){
			$count = $val->CountDepartment;
		}

		return $count;
	}
	// TODO : For Portal Summary
	function findAll($page=1,$row_per_page=20) {
		$start = ($page==1?0:$page*$row_per_page-($row_per_page)+1);
		$end = $page*$row_per_page;

		$condition = array();
		if($this->SC07_ParentDepartmentId!="0"&&$this->SC07_ParentDepartmentId!=""){
			$dept = " (t1.[SC07_DepartmentId]= '".$this->SC07_ParentDepartmentId."' ";
			if($this->SC07_DepartmentId!="0"&&$this->SC07_DepartmentId!=""){
				$dept.=" AND t1.[SC07_DepartmentId]= '".$this->SC07_DepartmentId."' ";
			}
			$dept.=")";
			array_push($condition,$dept);
		}
        if($this->CM05_RegionID!="0"&&$this->CM05_RegionID!=""){
            array_push($condition,"t2.[CM05_RegionID] = '".$this->CM05_RegionID."'");
        }

        if($this->NT01_ReporterID!="0"&&$this->NT01_ReporterID!=""){
            array_push($condition,"t2.[SC03_UserId] = '".$this->NT01_ReporterID."'");
        }
        if($this->NT02_TypeID!="0"&&$this->NT02_TypeID!=""){
            array_push($condition,"t5.[NT02_TypeID] = '".$this->NT02_TypeID."'");
        }
        if($this->CM06_ProvinceID!="0"&&$this->CM06_ProvinceID!=""){
            array_push($condition,"t2.[CM06_ProvinceID] = '".$this->CM06_ProvinceID."'");
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
		$query = "WITH DATASET AS(SELECT t1.[SC07_DepartmentId] as SC07_DepartmentId ,
ROW_NUMBER() OVER (ORDER BY t1.[SC07_DepartmentId] ASC) AS 'RowNumber'
FROM [NNT_DataCenter_2].[dbo].[SC07_Department] t1
	INNER JOIN [NNT_DataCenter_2].[dbo].[SC03_User] t2
	ON(t1.SC07_DepartmentId = t2.SC07_DepartmentId)
	INNER JOIN [NNT_DataCenter_2].[dbo].[CM05_Region] t3
	ON(t2.[CM05_RegionId] = t3.[CM05_RegionID])
	INNER JOIN [NNT_DataCenter_2].[dbo].[CM06_Province] t4
	ON(t2.[CM06_ProvinceId] = t4.[CM06_ProvinceId])
	INNER JOIN [NNT_DataCenter_2].[dbo].[NT01_News] t5
	ON(t2.[SC03_UserId] = t5.[NT01_ReporterID])
WHERE t1.[SC07_Status] IN ('Y') ".($condition!=""?"AND $condition":"")."

    GROUP BY t1.[SC07_DepartmentId]
) 
SELECT *
FROM DATASET t1
WHERE t1.RowNumber between $start and $end ";
		$this->ait->queryString=$query;
		$this->ait->init();
		return $this->ait->query();
	}

	function findParentDepartment($status=array()) {
		$statusArray = array();
		foreach($status as $val){
			$statusArray[] = "'".$val."'";
		}
		$status = implode(",",$statusArray);
		
		$this->ait->queryString = "SELECT [SC07_DepartmentId],[SC07_ParentDepartmentId],[SC07_DepartmentName] FROM [SC07_Department] WHERE [SC07_Status] IN (".$status.") AND [SC07_ParentDepartmentId] IS NULL";
		$this->ait->init();
		return $this->ait->query();
	}
	
	function findChildDepartment($status=array()) {
		$statusArray = array();
		foreach($status as $val){
			$statusArray[] = "'".$val."'";
		}
		
		$status = implode(",",$statusArray);	
		$this->ait->queryString = "SELECT [SC07_DepartmentId],[SC07_ParentDepartmentId],
		[SC07_DepartmentName] FROM [SC07_Department] WHERE [SC07_Status] IN (".$status.") AND [SC07_ParentDepartmentId] = '".$this->SC07_ParentDepartmentId."' ";
		$this->ait->init();
		return $this->ait->query();
	}
	
	function countDapartment() {
		$this->ait->queryString = "SELECT count(*) as CountRow FROM [SC07_Department] WHERE [SC07_Status] IN ('Y') ";
		$this->ait->init();
		$result =  $this->ait->query();
		$count = 0;
		foreach($result['result'] as $val){
			$count = $val->CountRow;
		}
		return $count;
	}

    function getDepartmentName(){
        $this->ait->queryString = "SELECT [SC07_DepartmentName] FROM  [SC07_Department]
        WHERE  [SC07_DepartmentId] = '".$this->SC07_DepartmentId."'";
        $this->ait->init();
        $result = $this->ait->query();
        foreach($result['result'] as $val){
            $this->SC07_DepartmentName = $val->SC07_DepartmentName;
        }
        return $this->SC07_DepartmentName;
    }
}