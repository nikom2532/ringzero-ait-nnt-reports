<?php
class News_model extends CI_Model{

	var $start_date = "";
	var $end_date = "";
	var $newsType = "";
	var $sub_newsType = "";
	var $department= "";
	var $sub_department = "";
	var $region ="";
	var $province = "";
	var $portal = "";
	var $reporter = "";
	var $userId = "";
	function __construct(){
		parent::__construct();
	}

	function setStartDate($start_date){
		$this->start_date = $start_date;
	}

	function getStartDate(){
		return $this->start_date;
	}

	function setEndDate($end_date){
		$this->end_date = $end_date;
	}

	function getEndDate(){
		return $this->end_date;
	}

	function setNewsType($newsType){
		$this->newsType = $newsType;
	}

	function getNewsType(){
		return $this->newsType;
	}

	function setSubNewsType($sub_newsType){
		$this->sub_newsType = $sub_newsType;
	}

	function getSubNewsType(){
		return $this->sub_newsType;
	}

	function setDepartment($department){
		$this->department = $department;
	}

	function getDepartment(){
		return $this->department;
	}
	
	function setSubDepartment($sub_department){
		$this->sub_department = $sub_department;
	}

	function getSubDepartment(){
		return $this->sub_department;
	}

	function setRegion($region){
		$this->region = $region;
	}

	function getRegion(){
		return $this->region;
	}

	function setProvince($province){
		$this->province = $province;
	}

	function getProvince(){
		return $this->province;
	}

	function setReporter($reporter){
		$this->reporter = $reporter;
	}

	function gerReporter(){
		return $this->reporter;
	}
	
	
	function setPortal($portal){
		$this->portal = $portal;
	}

	function getPortal(){
		return $this->portal;
	}
	function setUserId($userId){
		$this->userId = $userId;

	}
	function getUserId(){
		return $this->userId;
	}

	// for summary Exchange 
	public function countNewsByDate($departmentId,$newsType,$date){
		$this->ait->queryString="SELECT count(*) as CountNews FROM [NNT_DataCenter_2].[dbo].[NT01_News] 
WHERE CONVERT(VARCHAR(11), [NT01_NewsDate], 121) LIKE '$date%'
AND [NT02_TypeID] = '$newsType'
AND [SC07_DepartmentId] ='$departmentId'";
		$this->ait->init();
		$query = $this->ait->query();
		$count = 0;
		foreach($query['result'] as $val){
			$count=$val->CountNews;
		}
		return $count;
		
	}

	public function getDistinctDate($date){
		
		$this->ait->queryString="WITH DATASETS AS(SELECT DISTINCT SUBSTRING(CONVERT(VARCHAR(19), 
			[NT01_NewsDate], 121),0,11) AS NT01_NewsDate,
			ROW_NUMBER() OVER (ORDER BY NT01_NewsDate DESC) AS 'RowDateNumber'
			FROM [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y')
			SELECT NT01_NewsDate, RowDateNumber FROM DATASETS ";
		$this->ait->init();
		$query = $this->ait->query();
		return $query;			
			
	}

	public function count(){
		$this->ait->queryString="SELECT COUNT([NT01_NewsID]) as NUMROW from [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y'";
		$this->ait->init();
		$result = $this->ait->query();
		foreach($result['result'] as $val){
			return $val->NUMROW;
		}
	}
	
	public function countBy(){
		$condition = array();
		if($this->getStartDate()!=""){
			$formatStart = explode("/",$this->getStartDate());
			$newFormat = $formatStart[2]."-".$formatStart[1]."-".$formatStart[0]." 00:00:00";
			array_push($condition," [NT01_NewsDate]>= '".$newFormat."' ");
		}
		if($this->getEndDate()!=""){
			$formatEnd = explode("/",$this->getEndDate());
			$newFormat = $formatEnd[2]."-".$formatEnd[1]."-".$formatEnd[0]." 23:59:59";
			array_push($condition," [NT01_NewsDate]<= '".$newFormat."' ");
		}		
		if($this->getNewsType()!="0"){
			array_push($condition," [NT02_TypeID]= '".$this->getNewsType()."' ");
		}
		if($this->getSubNewsType()!="0"){
			array_push($condition," [NT03_SubTypeID]= '".$this->getSubNewsType()."' ");
		}
		if($this->getDepartment()!="0"){
			
			$dept = " ([SC07_DepartmentId] = '".$this->getDepartment()."' ";
			
			if($this->getSubDepartment()!="0"){
				$dept.=" OR [SC07_DepartmentId] = '".$this->getSubDepartment()."' ";
			}
			$dept.=") ";
			array_push($condition,$dept);
		}
		
		if($this->getRegion()!="0"){
			array_push($condition," [CM05_RegionID] = '".$this->getRegion()."' ");
		}
		if($this->getProvince()!="0"){
			array_push($condition," [CM06_ProvinceID] = '".$this->getProvince()."' ");
		}
		if($this->getUserId()!="0"){
			array_push($condition," [NT01_ReporterID] = '".$this->getUserId()."' ");
		}
		
		$conditionArr = array();
		foreach($condition as $val){
			$conditionArr[] = $val;
		}
		
		$condition = implode(" AND ",$conditionArr);
		
		$this->ait->queryString="SELECT COUNT([NT01_NewsID]) as NUMROW from [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y' ".($condition!=""?" AND ".$condition:"");
		$this->ait->init();
		$result = $this->ait->query();
		foreach($result['result'] as $val){
			return $val->NUMROW;
		}
	}
	
	public function findAll($page=1,$row_per_page=20) {
		
		$start = $page==1?0:$page*$row_per_page-($row_per_page);
		$end = $page*$row_per_page;
		
		$this->ait->queryString="WITH LIMIT AS(SELECT [NT01_NewsID],[NT01_NewsTitle], 
		CONVERT(VARCHAR(19), [NT01_NewsDate], 121) AS NT01_NewsDate,
		ROW_NUMBER() OVER (ORDER BY [NT01_NewsID] DESC) AS 'RowNumber'
		FROM [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y' )
		
		SELECT * from LIMIT WHERE RowNumber BETWEEN $start AND $end";
		$this->ait->init();
		return $this->ait->query();
	}
		   
		   
	public function search($page=1,$row_per_page=20){

		$condition = array();
		if($this->getStartDate()!=""){
			$formatStart = explode("/",$this->getStartDate());
			$newFormat = $formatStart[2]."-".$formatStart[1]."-".$formatStart[0]." 00:00:00";
			array_push($condition," [NT01_NewsDate]>= '".$newFormat."' ");
		}
		if($this->getEndDate()!=""){
			$formatEnd = explode("/",$this->getEndDate());
			$newFormat = $formatEnd[2]."-".$formatEnd[1]."-".$formatEnd[0]." 23:59:59";
			array_push($condition," [NT01_NewsDate]<= '".$newFormat."' ");
		}		
		if($this->getNewsType()!="0"){
			array_push($condition," [NT02_TypeID]= '".$this->getNewsType()."' ");
		}
		if($this->getSubNewsType()!="0"){
			array_push($condition," [NT03_SubTypeID]= '".$this->getSubNewsType()."' ");
		}
		if($this->getDepartment()!="0"){
			
			$dept = " ([SC07_DepartmentId] = '".$this->getDepartment()."' ";
			
			if($this->getSubDepartment()!="0"){
				$dept.=" OR [SC07_DepartmentId] = '".$this->getSubDepartment()."' ";
			}
			$dept.=") ";
			array_push($condition,$dept);
		}
		
		if($this->getRegion()!="0"){
			array_push($condition," [CM05_RegionID] = '".$this->getRegion()."' ");
		}
		if($this->getProvince()!="0"){
			array_push($condition," [CM06_ProvinceID] = '".$this->getProvince()."' ");
		}
		if($this->getUserId()!="0"){
			array_push($condition," [NT01_ReporterID] = '".$this->getUserId()."' ");
		}
		
		$conditionArr = array();
		foreach($condition as $val){
			$conditionArr[] = $val;
		}
		
		$condition = implode(" AND ",$conditionArr);
		
		$start = $page==1?0:$page*$row_per_page-($row_per_page);
		$end = $page*$row_per_page;
		
		$this->ait->queryString="WITH LIMIT AS(SELECT [NT01_NewsID],[NT01_NewsTitle], 
		CONVERT(VARCHAR(19), [NT01_NewsDate], 121) AS NT01_NewsDate,
		ROW_NUMBER() OVER (ORDER BY [NT01_NewsID] DESC) AS 'RowNumber'
		FROM [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y' ".
		($condition!=""?" AND ".$condition:"")." )
		SELECT * from LIMIT WHERE RowNumber BETWEEN $start AND $end";
		// echo "WITH LIMIT AS(SELECT [NT01_NewsID],[NT01_NewsTitle], 
		// CONVERT(VARCHAR(19), [NT01_NewsDate], 121) AS NT01_NewsDate,
		// ROW_NUMBER() OVER (ORDER BY [NT01_NewsID] DESC) AS 'RowNumber'
		// FROM [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y' ".
		// ($condition!=""?" AND ".$condition:"")." )
		// SELECT * from LIMIT WHERE RowNumber BETWEEN $start AND $end";
		$this->ait->init();
		return $this->ait->query();
	}
	
	public function findAllGroupByDate($page=1,$row_per_page=20) {
		
		$condition = array();
		if($this->getStartDate()!=""){
			$formatStart = explode("/",$this->getStartDate());
			$newFormat = $formatStart[2]."-".$formatStart[1]."-".$formatStart[0]." 00:00:00";
			array_push($condition," [NT01_NewsDate]>= '".$newFormat."' ");
		}
		if($this->getEndDate()!=""){
			$formatEnd = explode("/",$this->getEndDate());
			$newFormat = $formatEnd[2]."-".$formatEnd[1]."-".$formatEnd[0]." 23:59:59";
			array_push($condition," [NT01_NewsDate]<= '".$newFormat."' ");
		}		
		if($this->getNewsType()!="0"){
			array_push($condition," [NT02_TypeID]= '".$this->getNewsType()."' ");
		}
		if($this->getSubNewsType()!="0"){
			array_push($condition," [NT03_SubTypeID]= '".$this->getSubNewsType()."' ");
		}
		if($this->getDepartment()!="0"){
			
			$dept = " ([SC07_DepartmentId] = '".$this->getDepartment()."' ";
			
			if($this->getSubDepartment()!="0"){
				$dept.=" OR [SC07_DepartmentId] = '".$this->getSubDepartment()."' ";
			}
			$dept.=") ";
			array_push($condition,$dept);
		}
		
		if($this->getRegion()!="0"){
			array_push($condition," [CM05_RegionID] = '".$this->getRegion()."' ");
		}
		if($this->getProvince()!="0"){
			array_push($condition," [CM06_ProvinceID] = '".$this->getProvince()."' ");
		}
		if($this->getUserId()!="0"){
			array_push($condition," [NT01_ReporterID] = '".$this->getUserId()."' ");
		}
		
		$conditionArr = array();
		foreach($condition as $val){
			$conditionArr[] = $val;
		}
		
		$condition = implode(" AND ",$conditionArr);

		$start = $page==1?0:$page*$row_per_page-($row_per_page);
		$end = $page*$row_per_page;
		
		$this->ait->queryString="WITH LIMIT AS(SELECT [NT01_NewsID],[NT01_NewsTitle], CONVERT(VARCHAR(19), [NT01_NewsDate], 121) AS NT01_NewsDate,
		ROW_NUMBER() OVER ( ORDER BY [NT01_NewsID] DESC ) AS 'RowNumber'
		FROM [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y' ".
		($condition!=""?" AND ".$condition:"")." )
		SELECT * from LIMIT WHERE RowNumber BETWEEN $start AND $end";
		$this->ait->init();
		return $this->ait->query();
	}


	//for CrossPortal
	function countNewsbyDepartmentAndPublictype($dept,$publicType){
        $condition = array();
        $condition_dummy = "";
        if($this->getNewsType()!="0"&&$this->getNewsType()!=""){
            $condition_dummy = " (t1.[NT02_TypeID]= '".$this->getNewsType()."' ";
            if($this->getSubNewsType()!="0"&&$this->getSubNewsType()!=""){
                $condition_dummy.=" AND t1.[NT03_SubTypeID]= '".$this->getSubNewsType()."' ";
            }
            $condition_dummy.=")";
            array_push($condition,$condition_dummy);
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

        $query = "SELECT COUNT(*) as CountNews
		FROM [NNT_DataCenter_2].[dbo].[NT01_News] t1
	 	INNER JOIN
	 	[NNT_DataCenter_2].[dbo].[SC03_User] t2 ON(t1.[NT01_ReporterID] = t2.[SC03_UserId])
	 	INNER JOIN
	 	[NNT_DataCenter_2].[dbo].[SC07_Department] t3 ON(t2.[SC07_DepartmentId] = t3.[SC07_DepartmentId])
		WHERE  t3.[SC07_DepartmentId] = '$dept' and t1.[NT08_PubTypeID] = '$publicType' ".($condition!=""?" AND $condition ":"")."";

		$this->ait->queryString = $query ;
		$this->ait->init();
		$rs = $this->ait->query();
		$count = 0;
		foreach ($rs['result'] as $val) {
			$count = $val->CountNews;
		}
		return $count;

	}

	/**
	* Count RawNews by Condition select
	*/
	function countRawNewsByDepartment($dept){
        $condition = array();
        $condition_dummy = "";
        if($this->getNewsType()!="0"&&$this->getNewsType()!=""){
            $condition_dummy = " (t1.[NT02_TypeID]= '".$this->getNewsType()."' ";
            if($this->getSubNewsType()!="0"&&$this->getSubNewsType()!=""){
                $condition_dummy.=" AND t1.[NT03_SubTypeID]= '".$this->getSubNewsType()."' ";
            }
            $condition_dummy.=")";
            array_push($condition,$condition_dummy);
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
		$query = "SELECT COUNT(*)as CountRaw 
		FROM [NNT_DataCenter_2].[dbo].[VW01_RawNews] t1 
	 	INNER JOIN 	[NNT_DataCenter_2].[dbo].[SC03_User] t2 ON(t1.[NT01_ReporterID] = t2.[SC03_UserId])
	 	INNER JOIN 	[NNT_DataCenter_2].[dbo].[SC07_Department] t3 ON(t2.[SC07_DepartmentId] = t3.[SC07_DepartmentId])
		WHERE  t3.[SC07_DepartmentId] = '$dept' ".($condition!=""?" AND $condition ":"")."";
//               echo $query;
		$this->ait->queryString = $query;
		$this->ait->init();
		$rs = $this->ait->query();
		$countRaw = 0;
		foreach ($rs['result'] as $val) {
			$countRaw = $val->CountRaw;
		}
		return $countRaw;
	}

	//for CrossPortal
	function countPublicRawNewsByDepartment($dept){
        $condition = array();
        $condition_dummy = "";
        if($this->getNewsType()!="0"&&$this->getNewsType()!=""){
            $condition_dummy = " (t1.[NT02_TypeID]= '".$this->getNewsType()."' ";
            if($this->getSubNewsType()!="0"&&$this->getSubNewsType()!=""){
                $condition_dummy.=" AND t1.[NT03_SubTypeID]= '".$this->getSubNewsType()."' ";
            }
            $condition_dummy.=")";
            array_push($condition,$condition_dummy);
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

        $query = "SELECT COUNT(*)as CountRaw
		FROM [NNT_DataCenter_2].[dbo].[VW02_PublishNews] t1
	 	INNER JOIN
	 	[NNT_DataCenter_2].[dbo].[SC03_User] t2 ON(t1.[NT01_ReporterID] = t2.[SC03_UserId])
	 	INNER JOIN
	 	[NNT_DataCenter_2].[dbo].[SC07_Department] t3 ON(t2.[SC07_DepartmentId] = t3.[SC07_DepartmentId])
		WHERE  t3.[SC07_DepartmentId] = '$dept'".($condition!=""?" AND $condition ":"")."";

		$this->ait->queryString = $query;
		$this->ait->init();
		$rs = $this->ait->query();
		$countRaw = 0;
		foreach ($rs['result'] as $val) {
			$countRaw = $val->CountRaw;
		}
		return $countRaw;
	}

	function countByNewsType($newsType){

		$this->ait->queryString="SELECT COUNT(*) AS CountRow
		FROM [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y' AND [NT02_TypeID]= '".$newsType."'";
		$this->ait->init();
		$count = 0;
		foreach($this->ait->query()['row'] as $val){
			$count = $val;
		}
		return $count;
	}
}