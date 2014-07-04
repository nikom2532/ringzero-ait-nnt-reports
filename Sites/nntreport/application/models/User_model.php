<?php
/**
* Model : User_model
*/
class User_model extends CI_Model
{		
    var $db_prefix = "[NNT_DataCenter_2].[dbo].";
    var $table_name = "[SC03_User]";

    //for Search
    var $startDate = "";
    var $endDate = "";
    var $regionId = "";
    var $provinceId = "";
    var $departmentId = "";
    var $parentDepartmentId = "";

    var $pageRow = "";
    var $currentPage = "";

    var $SC03_UserId = "";
    var $SC03_TName = "";
    var $SC03_FName = "";
    var $SC03_LName = "";
    var $SC03_RegisterDate = "";
    var $SC03_UserName ="";
    var $CM05_RegionId = "";
    var $CM06_ProvinceId = "";
    var $SC07_DepartmentId = "";
    var $SC03_Status = "";
    var $SC03_PositionType = "";
    var $SC03_Position = "";

    function setPageRow($row_per_page){$this->pageRow = $row_per_page;}
    function getPageRow(){return $this->pageRow;}
    function setCurrentPage($page){$this->currentPage = $page;}
    function getCurrentPage(){return $this->currentPage;}
    function getDbPrefix(){return $this->db_prefix;}
    function getTableName(){return $this->table_name;}
    function setStartDate($startDate){$this->startDate = $startDate;}
    function getStartDate(){return $this->startDate;}
    function setEndDate($endDate){$this->endDate = $endDate;}
    function getEndDate(){return $this->endDate;}
    function setRegionId($regionId){$this->regionId = $regionId;}
    function getRegionId(){return $this->regionId;}
    function setProvinceId($provinceId){$this->provinceId  = $provinceId;}
    function getProvinceId(){return $this->provinceId;}
    function setDepartmentId($departmentId){$this->departmentId = $departmentId;}
    function getDepartmentId(){return $this->departmentId;}
    function setParentDepartmentId($parentDepartmentId){$this->ParentDepartmentId = $parentDepartmentId;}
    function getParentDepartmentId(){return $this->ParentDepartmentId;}
    function setSC03UserId($userId){$this->SC03_UserId = $userId;}
    function getSC03UserId(){return $this->SC03_UserId;}
    function setSC03TName($title){$this->SC03_TName = $SC03_TName;}
    function getSC03TName(){return $this->SC03_TName;}
    function setSC03FName($fname){$this->SC03_FName = $fname;}
    function getSC03FName(){return $this->SC03_FName;}
    function setSC03LName($lname){$this->SC03_LName = $lname;}
    function getSC03LName(){return $this->SC03_LName;}
    function setSC03RegisterDate($registerDate){$this->SC03_RegisterDate = $registerDate;}
    function getSC03RegisterDate(){return $this->SC03_RegisterDate;}
    function setSC03UserName($username){$this->SC03_UserName = $username;}
    function getSC03UserName(){return $this->SC03_UserName;}
    function setCM05RegionId($regionId){$this->CM05_RegionId = $regionId;}
    function getCM05RegionId(){return $this->CM05_RegionId;}
    function setCM06ProvinceId($provinceId){$this->CM06_ProvinceId = $provinceId;}
    function getCM06ProvinceId(){return $this->CM06_ProvinceId;}
    function setSC07DepartmentId($departmentId){$this->SC07_DepartmentId = $departmentId;}
    function getSC07DepartmentId(){return $this->SC07_DepartmentId;}
    function setSC03Status($status){$this->SC03_Status = $status;}
    function getSC03Status(){return $this->SC03_Status;}
    function setSC03PositionType($positionType){$this->SC03_PositionType = $positionType;}
    function getSC03PositionType(){return $this->SC03_PositionType;}
    function setSC03Position($position){$this->SC03_Position = $position;}
    function getSC03Position(){return $this->SC03_Position;}

    function findAll(){
        $ait = $this->ait;
        $query = "
            SELECT  [SC03_UserId] as userID,
                    [SC03_TName] as title,
                    [SC03_FName] as fname,
                    [SC03_LName] as lname,
                    [SC03_RegisterDate] as registerDate,
                    [SC03_UserName] as userName,
                    [CM05_RegionId] as regionId,
                    [CM06_ProvinceId] as provinceId,
                    [SC07_DepartmentId] as departmentId,
                    [SC03_Status] as status,
                    [SC03_PositionType] as positionType,
                    [SC03_Position] as position
            FROM ".$this->getDbPrefix().$this->getTableName()."
            ORDER BY [SC03_UserId] ASC";
        $ait->queryString = $query;
        $rs =  $ait->query();
        return $rs['result'];
    }
    function toString(){
        $ait = $this->ait;
        $query = "
            SELECT  [SC03_UserId] as userId,
                    [SC03_TName] as title,
                    [SC03_FName] as fname,
                    [SC03_LName] as lname
            FROM ".$this->getDbPrefix().$this->getTableName()."
            WHERE [SC03_UserId] = '".$this->getSC03UserId()."'";
        $ait->queryString = $query;
        $result = $ait->query();
        $rs = $result['result'][0];
        $fullname = $rs->title."".$rs->fname." ".$rs->lname;
        return $fullname;
    }
    function find(){
        $ait = $this->ait;
        $condition = array();
        if ($this->startDate != "") {
            $formatStart = explode("/", $this->startDate);
            $newFormat = $formatStart[2] . "-" . $formatStart[1] . "-" . $formatStart[0] . " 00:00:00";
            array_push($condition, " t1.[SC03_RegisterDate]>= '" . $newFormat . "' ");
        }
        if ($this->endDate != "") {
            $formatEnd = explode("/", $this->endDate);
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 23:59:59";
            array_push($condition, " t1.[SC03_RegisterDate]<= '" . $newFormat . "' ");
        }
        if ($this->SC07_ParentDepartmentId != "0"&&$this->SC07_ParentDepartmentId != "") {
            $dept = " (t2.[SC07_ParentDepartmentId] = '" . $this->SC07_ParentDepartmentId . "' ";
                if ($this->SC07_DepartmentId != "0"&&$this->SC07_DepartmentId != "") {
                    $dept .= " AND t2.[SC07_DepartmentId] = '" . $this->SC07_DepartmentId . "' ";
                }
            $dept .= ") ";
            array_push($condition, $dept);
        }
        if ($this->CM05_RegionId != "0"&&$this->CM05_RegionId != "") {
              array_push($condition, " t1.[CM05_RegionID] = '" . $this->CM05_RegionId . "' ");
        }
        if ($this->CM06_ProvinceId != "0"&&$this->CM05_RegionId != "") {
            array_push($condition, " t1.[CM06_ProvinceID] = '" . $this->CM06_ProvinceId . "' ");
        }
        if ($this->SC03_Status != "0"&&$this->SC03_Status != "") {
            array_push($condition, " t1.[SC03_Status] = '" . $this->SC03_Status . "' ");
        }
        $conditionArr = array();
        foreach ($condition as $val) {
            $conditionArr[] = $val;
        }

        $condition = implode(" AND ", $conditionArr);

        $start = $this->getCurrentPage() == 1 ? 0 : $this->getCurrentPage() * $$this->getPageRow() - ($this->getPageRow());
        $end = $this->getCurrentPage() * $this->getPageRow();
        $query = "WITH DATASET AS (
                    SELECT  t1.[SC03_UserId] as userId,
                            t1.[SC03_TName] as title,
                            t1.[SC03_FName] as fname,
                            t1.[SC03_LName] as lname,
                            t1.[SC03_UserName] as username,
                            t1.[CM05_RegionId] as regionId,
                            t1.[CM06_ProvinceId] as provinceId,
                            t1.[SC07_DepartmentId] as departmentId,
                            t1.[SC03_Status] as status,
                            t1.[SC03_PositionType] as positionType,
                            t1.[SC03_Position] as position,
                            t1.[SC07_MainDepartmentId] as mainDepartmentId,
                            CONVERT(VARCHAR(11),t1.[SC03_RegisterDate],121) as registerDate,
                            ROW_NUMBER() OVER (ORDER BY t1.[SC03_UserId]) AS 'RowNumber'
                    FROM ".$this->getDbPrefix().$this->getTableName()." t1
                        INNER JOIN ".$this->getDbPrefix()."[SC07_Department] t2 
                        ON(t1.[SC07_DepartmentId] = t2.[SC07_DepartmentId])
                    ".($condition!=""?" WHERE $condition":"").")
                SELECT * FROM DATASET WHERE RowNumber BETWEEN $start AND $end";
        $ait->queryString = $query;
        $rs = $ait->query();
        return $result['result'];
    }
    function count(){
        $ait = $this->ait;
        $condition = array();
        if ($this->startDate != "") {
            $formatStart = explode("/", $this->startDate);
            $newFormat = $formatStart[2] . "-" . $formatStart[1] . "-" . $formatStart[0] . " 00:00:00";
            array_push($condition, " t1.[SC03_RegisterDate]>= '" . $newFormat . "' ");
        }
        if ($this->endDate != "") {
            $formatEnd = explode("/", $this->endDate);
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 23:59:59";
            array_push($condition, " t1.[SC03_RegisterDate]<= '" . $newFormat . "' ");
        }
        if ($this->SC07_ParentDepartmentId != "0"&&$this->SC07_ParentDepartmentId != "") {
            $dept = " (t2.[SC07_ParentDepartmentId] = '" . $this->SC07_ParentDepartmentId . "' ";
            if ($this->SC07_DepartmentId != "0"&&$this->SC07_DepartmentId != "") {
                $dept .= " AND t2.[SC07_DepartmentId] = '" . $this->SC07_DepartmentId . "' ";
            }
            $dept .= ") ";
            array_push($condition, $dept);
        }

        if ($this->CM05_RegionId != "0"&&$this->CM05_RegionId != "") {
            array_push($condition, " t1.[CM05_RegionID] = '" . $this->CM05_RegionId . "' ");
        }
        if ($this->CM06_ProvinceId != "0"&&$this->CM05_RegionId != "") {
            array_push($condition, " t1.[CM06_ProvinceID] = '" . $this->CM06_ProvinceId . "' ");
        }
        if ($this->SC03_Status != "0"&&$this->SC03_Status != "") {
            array_push($condition, " t1.[SC03_Status] = '" . $this->SC03_Status . "' ");
        }
        $conditionArr = array();
        foreach ($condition as $val) {
            $conditionArr[] = $val;
        }
        $condition = implode(" AND ", $conditionArr);

        $query = "
            SELECT COUNT (t1.[SC03_UserId]) as CountRow  
            FROM ".$this->getDbPrefix().$this->getTableName()." t1
            INNER JOIN ".$this->getDbPrefix()."[SC07_Department] t2 
                ON(t1.[SC07_DepartmentId] = t2.[SC07_DepartmentId])
            ".($condition!=""?" WHERE $condition":"");
        $ait->queryString = $query;
        $result = $ait->query();
        return  $result['result'][0]->CountRow;
    }
    public function getStatusName($status=""){
        $statusName = array(
                "T"=>"ใช้งาน",
                "F"=>"-",
                "N"=>"ไม่ใช้งาน",
                "R"=>"-"
            );
        return $statusName[$status];
    }
}