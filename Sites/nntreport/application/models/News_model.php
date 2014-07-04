<?php
class News_model extends CI_Model
{
    var $db_prefix = "[NNT_DataCenter_2].[dbo].";
    var $table_name = "[NT01_News]";
    //Search
    var $start_date = "";
    var $end_date = "";
    var $news_type_id = "";
    var $sub_news_type_id = "";
    var $parent_department_id = "";
    var $department_id = "";
    var $region_id = "";
    var $province_id = "";
    var $reporter_id = "";
    var $pubType_id = "";
    //end Search
    // fields
    var $NT01_NewsID = "";
    var $NT01_NewsTitle = "";
    var $NT01_NewsTag = "";
    var $NT01_NewsDate = "";
    var $NT01_ReporterID = "";
    var $NT01_ReWriteID = "";
    var $NT01_EditorID = "";
    var $NT02_TypeID = "";
    var $NT03_SubTypeID = "";
    var $NT01_Status = "";
    var $CM05_RegionID = "";
    var $CM06_ProvinceID = "";
    var $NT08_PubTypeID = "";
    var $SC07_DepartmentId = "";
    var $NT26_IssueID = "";
    var $NT01_ViewCount = "";

    // end fields

    var $current_page = 1;
    var $page_row = 20;

    function getDbPrefix()
    {
        return $this->db_prefix;
    }

    function getTableName()
    {
        return $this->table_name;
    }

    function setStartDate($start_date)
    {
        $this->start_date = $start_date;
    }

    function getStartDate()
    {
        return $this->start_date;
    }

    function setEndDate($end_date)
    {
        $this->end_date = $end_date;
    }

    function getEndDate()
    {
        return $this->end_date;
    }

    function setNewsTypeId($news_type_id)
    {
        $this->news_type_id = $news_type_id;
    }

    function getNewsTypeId()
    {
        return $this->news_type_id;
    }

    function setSubNewsTypeId($sub_news_type_id)
    {
        $this->sub_news_type_id = $sub_news_type_id;
    }

    function getSubNewsTypeId()
    {
        return $this->sub_news_type_id;
    }

    function setParentDepartmentId($parent_department_id)
    {
        $this->parent_department_id = $parent_department_id;
    }

    function getParentDepartmentId()
    {
        return $this->parent_department_id;
    }

    function setDepartmentId($departmentId)
    {
        $this->department_id = $departmentId;
    }

    function getDepartmentId()
    {
        return $this->department_id;
    }

    function setRegionId($region_id)
    {
        $this->region_id = $region_id;
    }

    function getRegionId()
    {
        return $this->region_id;
    }

    function setProvinceId($province_id)
    {
        $this->province_id = $province_id;
    }

    function getProvinceId()
    {
        return $this->province_id;
    }

    function setReporterId($reporter_id)
    {
        $this->reporter_id = $reporter_id;
    }

    function getReporterId()
    {
        return $this->reporter_id;
    }

    function setPubTypeId($pubType_id)
    {
        $this->pubType_id = $pubType_id;
    }

    function getPubTypeId()
    {
        return $this->pubType_id;
    }

    function setCurrentPage($current_page)
    {
        $this->current_page = $current_page;
    }

    function getCurrentpage()
    {
        return $this->current_page;
    }

    function setPageRow($page_row)
    {
        $this->page_row = $page_row;
    }

    function getPageRow()
    {
        return $this->page_row;
    }

    function setNT01NewsId($newsId)
    {
        $this->NT01_NewsID = $newsId;
    }

    function getNT01NewsID()
    {
        return $this->NT01_NewsID;
    }

    function setNT01NewsTitle($newsTitle)
    {
        $this->NT01_NewsTitle = $newsTitle;
    }

    function getNT01NewsTitle()
    {
        return $this->NT01_NewsTitle;
    }

    function setNT01NewsTag($newsTag)
    {
        $this->NT01_NewsTag = $newsTag;
    }

    function getNT01NewsTag()
    {
        return $this->NT01NewsTag;
    }

    function setNT01NewsDate($newsDate)
    {
        $this->NT01_NewsDate = $newsDate;
    }

    function getNT01NewsDate()
    {
        return $this->NT01_NewsDate;
    }

    function setNT01ReporterID($reporterId)
    {
        $this->NT01_ReporterID = $reporterId;
    }

    function getNT01ReporterID()
    {
        return $this->NT01_ReporterID;
    }

    function setNT01ReWriteID($rewriteId)
    {
        $this->NT01_ReWriteID = $rewriteId;
    }

    function getNT01ReWriteID()
    {
        return $this->NT01_ReWriteID;
    }

    function setNT01EditorID($editorId)
    {
        $this->NT01_EditorID = $editorId;
    }

    function getNT01EditorID()
    {
        return $this->NT01_EditorID;
    }

    function setNT02TypeID($typeId)
    {
        $this->NT02_TypeID = $typeId;
    }

    function getNT02TypeID()
    {
        return $this->NT02_TypeID;
    }

    function setNT03SubTypeID($subTypeId)
    {
        $this->NT03_SubTypeID = $subTypeId;
    }

    function getNT03SubTypeID()
    {
        return $this->NT03_SubTypeID;
    }

    function setNT01Status($status)
    {
        $this->NT01_Status = $status;
    }

    function getNT01Status()
    {
        return $this->NT01_Status;
    }

    function setCM05RegionID($regionId)
    {
        $this->CM05_RegionID = $regionId;
    }

    function getCM05RegionID()
    {
        return $this->CM05_RegionID;
    }

    function setCM06ProvinceID($provinceId)
    {
        $this->CM06_ProvinceID = $provinceId;
    }

    function getCM06ProvinceID()
    {
        return $this->CM06_ProvinceID;
    }

    function setNT08PubTypeID($pubTypeId)
    {
        $this->NT08_PubTypeID = $pubTypeId;
    }

    function getNT08PubTypeID()
    {
        return $this->NT08_PubTypeID;
    }

    function setSC07DepartmentId($departmentId)
    {
        $this->SC07_DepartmentId = $departmentId;
    }

    function getSC07DepartmentId()
    {
        return $this->SC07_DepartmentId;
    }

    function setNT26IssueID($issueId)
    {
        $this->NT26_IssueID = $issueId;
    }

    function getNT26IssueID()
    {
        return $this->NT26_IssueID;
    }

    function setNT01ViewCount($viewCount)
    {
        $this->NT01_ViewCount = $viewCount;
    }

    function getNT01ViewCount()
    {
        return $this->NT01_ViewCount;
    }

    /** 1. Count RawNews By DepartmentID
     *   Uses Broadcast |
     */
    function countRawNewsByDepartmentId()
    {
        $condition = array();
        if ($this->getStartDate() != "") {
            $formatEnd = explode("/", $this->getStartDate());
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 00:00:00";
            array_push($condition, " NT01.[NT01_NewsDate]>= '" . $newFormat . "' ");
        }
        if ($this->getEndDate() != "") {
            $formatEnd = explode("/", $this->getEndDate());
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 23:59:59";
            array_push($condition, " NT01.[NT01_NewsDate]<= '" . $newFormat . "' ");
        }

        $condition_dummy = "";
        if ($this->getNewsTypeId() != "0" && $this->getNewsTypeId() != "") {
            $condition_dummy = " (NT01.[NT02_TypeID]= '" . $this->getNewsTypeId() . "' ";
            if ($this->getSubNewsTypeId() != "0" && $this->getSubNewsTypeId() != "") {
                $condition_dummy .= " AND NT01.[NT03_SubTypeID]= '" . $this->getSubNewsTypeId() . "' ";
            }
            $condition_dummy .= ")";
            array_push($condition, $condition_dummy);
        }
        if ($this->getParentDepartmentId() != "0" && $this->getParentDepartmentId() != "") {
            $dept = " (SC07.[SC07_ParentDepartmentId] = '" . $this->getParentDepartmentId() . "' ";
            if ($this->getDepartmentId() != "0" && $this->getDepartmentId() != "") {
                $dept .= " AND SC07.[SC07_DepartmentId] = '" . $this->getDepartmentId() . "' ";
            }
            $dept .= ") ";
            array_push($condition, $dept);
        }

        if ($this->getRegionId() != "0" && $this->getRegionId() != "") {
            array_push($condition, " CM05.[CM05_RegionID] = '" . $this->getRegionId() . "' ");
            if ($this->getProvinceId() != "0" && $this->getProvinceId() != "") {
                array_push($condition, " CM06.[CM06_ProvinceID] = '" . $this->getProvinceId() . "' ");
            }
        }

        if ($this->getReporterId() != "0" && $this->getReporterId() != "") {
            array_push($condition, " NT01.[NT01_ReporterID] = '" . $this->getReporterId() . "' ");
        }

        $conditionArr = array();
        if (count($condition) > 0) {
            foreach ($condition as $val) {
                $conditionArr[] = $val;
            }
            $condition = implode(" AND ", $conditionArr);
        } else {
            $condition = "";
        }

        $ait = $this->ait;
        $query = "
            SELECT   COUNT(NT01.[NT01_NewsID]) AS CountRow
            FROM    " . $this->getDbPrefix() . $this->getTableName() . " AS NT01
               INNER JOIN [NNT_DataCenter_2].[dbo].[SC03_User] AS SC03
                  ON(NT01.[NT01_ReporterID] = SC03.[SC03_UserId])
               INNER JOIN [NNT_DataCenter_2].[dbo].[SC07_Department] AS SC07
                  ON(SC03.[SC07_DepartmentId] = SC07.[SC07_DepartmentId])
               INNER JOIN [NNT_DataCenter_2].[dbo].[CM05_Region] AS CM05
                  ON(SC03.[CM05_RegionId] = CM05.[CM05_RegionID])
               INNER JOIN [NNT_DataCenter_2].[dbo].[CM06_Province] AS CM06
                  ON(SC03.[CM06_ProvinceId] = CM06.[CM06_ProvinceID])
               INNER JOIN [NNT_DataCenter_2].[dbo].[NT02_NewsType] AS NT02 
                  ON(NT01.[NT02_TypeID] = NT02.[NT02_TypeID])
               INNER JOIN [NNT_DataCenter_2].[dbo].[NT03_NewsSubType] AS NT03 
                  ON(NT01.[NT03_SubTypeID] = NT03.[NT03_SubTypeID])
            WHERE  SC03.[SC07_DepartmentId] = '" . $this->getSC07DepartmentId() . "'
               " . ($condition != "" ? " AND $condition " : "");
        // echo $query;
        $ait->queryString = $query;
        $rs = $ait->query();
        return $rs['result'][0]->CountRow;
    }

    /** 2. Count Public News by DepartmentID
     *   Uses Broadcast |
     */
    function countPublicNewsByDepartmentId()
    {
        $condition = array();
        if ($this->getStartDate() != "") {
            $formatEnd = explode("/", $this->getStartDate());
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 00:00:00";
            array_push($condition, " NT01.[NT01_NewsDate]>= '" . $newFormat . "' ");
        }
        if ($this->getEndDate() != "") {
            $formatEnd = explode("/", $this->getEndDate());
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 23:59:59";
            array_push($condition, " NT01.[NT01_NewsDate]<= '" . $newFormat . "' ");
        }

        $condition_dummy = "";
        if ($this->getNewsTypeId() != "0" && $this->getNewsTypeId() != "") {
            $condition_dummy = " (NT01.[NT02_TypeID]= '" . $this->getNewsTypeId() . "' ";
            if ($this->getSubNewsTypeId() != "0" && $this->getSubNewsTypeId() != "") {
                $condition_dummy .= " AND NT01.[NT03_SubTypeID]= '" . $this->getSubNewsTypeId() . "' ";
            }
            $condition_dummy .= ")";
            array_push($condition, $condition_dummy);
        }
        if ($this->getParentDepartmentId() != "0" && $this->getParentDepartmentId() != "") {
            $dept = " (SC07.[SC07_ParentDepartmentId] = '" . $this->getParentDepartmentId() . "' ";
            if ($this->getDepartmentId() != "0" && $this->getDepartmentId() != "") {
                $dept .= " AND SC07.[SC07_DepartmentId] = '" . $this->getDepartmentId() . "' ";
            }
            $dept .= ") ";
            array_push($condition, $dept);
        }

        if ($this->getRegionId() != "0" && $this->getRegionId() != "") {
            array_push($condition, " CM05.[CM05_RegionID] = '" . $this->getRegionId() . "' ");
            if ($this->getProvinceId() != "0" && $this->getProvinceId() != "") {
                array_push($condition, " CM06.[CM06_ProvinceID] = '" . $this->getProvinceId() . "' ");
            }
        }

        if ($this->getReporterId() != "0" && $this->getReporterId() != "") {
            array_push($condition, " NT01.[NT01_ReporterID] = '" . $this->getReporterId() . "' ");
        }

        $conditionArr = array();
        if (count($condition) > 0) {
            foreach ($condition as $val) {
                $conditionArr[] = $val;
            }
            $condition = implode(" AND ", $conditionArr);
        } else {
            $condition = "";
        }

        $ait = $this->ait;
        $query = "
            SELECT   COUNT(NT01.[NT01_NewsID]) AS CountRow
            FROM    " . $this->getDbPrefix() . $this->getTableName() . " AS NT01
               INNER JOIN [NNT_DataCenter_2].[dbo].[SC03_User] AS SC03
                  ON(NT01.[NT01_ReporterID] = SC03.[SC03_UserId])
               INNER JOIN [NNT_DataCenter_2].[dbo].[SC07_Department] AS SC07
                  ON(SC03.[SC07_DepartmentId] = SC07.[SC07_DepartmentId])
               INNER JOIN [NNT_DataCenter_2].[dbo].[CM05_Region] AS CM05
                  ON(SC03.[CM05_RegionId] = CM05.[CM05_RegionID])
               INNER JOIN [NNT_DataCenter_2].[dbo].[CM06_Province] AS CM06
                  ON(SC03.[CM06_ProvinceId] = CM06.[CM06_ProvinceID])
               INNER JOIN [NNT_DataCenter_2].[dbo].[NT02_NewsType] AS NT02 
                  ON(NT01.[NT02_TypeID] = NT02.[NT02_TypeID])
               INNER JOIN [NNT_DataCenter_2].[dbo].[NT03_NewsSubType] AS NT03 
                  ON(NT01.[NT03_SubTypeID] = NT03.[NT03_SubTypeID])
            WHERE   (NT01.[NT08_PubTypeID] <> 8 OR NT01.[NT08_PubTypeID] IS NOT NULL)
               AND SC07.[SC07_DepartmentId] = '" . $this->getSC07DepartmentId() . "'
               " . ($condition != "" ? " AND $condition " : "");
        $ait->queryString = $query;
        $rs = $ait->query();
        return $rs['result'][0]->CountRow;
    }

    /** 3.Count RawNews DepartmentID
     *   Uses Broadcast |
     */
    function countNewsbyDepartmentAndPublictype()
    {
        $condition = array();
        if ($this->getStartDate() != "") {
            $formatEnd = explode("/", $this->getStartDate());
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 00:00:00";
            array_push($condition, " NT01.[NT01_NewsDate]>= '" . $newFormat . "' ");
        }
        if ($this->getEndDate() != "") {
            $formatEnd = explode("/", $this->getEndDate());
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 23:59:59";
            array_push($condition, " NT01.[NT01_NewsDate]<= '" . $newFormat . "' ");
        }

        $condition_dummy = "";
        if ($this->getNewsTypeId() != "0" && $this->getNewsTypeId() != "") {
            $condition_dummy = " (NT01.[NT02_TypeID]= '" . $this->getNewsTypeId() . "' ";
            if ($this->getSubNewsTypeId() != "0" && $this->getSubNewsTypeId() != "") {
                $condition_dummy .= " AND NT01.[NT03_SubTypeID]= '" . $this->getSubNewsTypeId() . "' ";
            }
            $condition_dummy .= ")";
            array_push($condition, $condition_dummy);
        }
        if ($this->getParentDepartmentId() != "0" && $this->getParentDepartmentId() != "") {
            $dept = " (SC07.[SC07_ParentDepartmentId] = '" . $this->getParentDepartmentId() . "' ";
            if ($this->getDepartmentId() != "0" && $this->getDepartmentId() != "") {
                $dept .= " AND SC07.[SC07_DepartmentId] = '" . $this->getDepartmentId() . "' ";
            }
            $dept .= ") ";
            array_push($condition, $dept);
        }

        if ($this->getRegionId() != "0" && $this->getRegionId() != "") {
            array_push($condition, " CM05.[CM05_RegionID] = '" . $this->getRegionId() . "' ");
            if ($this->getProvinceId() != "0" && $this->getProvinceId() != "") {
                array_push($condition, " CM06.[CM06_ProvinceID] = '" . $this->getProvinceId() . "' ");
            }
        }

        if ($this->getReporterId() != "0" && $this->getReporterId() != "") {
            array_push($condition, " NT01.[NT01_ReporterID] = '" . $this->getReporterId() . "' ");
        }

        $conditionArr = array();
        if (count($condition) > 0) {
            foreach ($condition as $val) {
                $conditionArr[] = $val;
            }
            $condition = implode(" AND ", $conditionArr);
        } else {
            $condition = "";
        }

        $ait = $this->ait;
        $query = "
            SELECT   COUNT(NT01.[NT01_NewsID]) AS CountRow
            FROM    " . $this->getDbPrefix() . $this->getTableName() . " AS NT01
               INNER JOIN [NNT_DataCenter_2].[dbo].[SC03_User] AS SC03
                  ON(NT01.[NT01_ReporterID] = SC03.[SC03_UserId])
               INNER JOIN [NNT_DataCenter_2].[dbo].[SC07_Department] AS SC07
                  ON(SC03.[SC07_DepartmentId] = SC07.[SC07_DepartmentId])
               INNER JOIN [NNT_DataCenter_2].[dbo].[CM05_Region] AS CM05
                  ON(SC03.[CM05_RegionId] = CM05.[CM05_RegionID])
               INNER JOIN [NNT_DataCenter_2].[dbo].[CM06_Province] AS CM06
                  ON(SC03.[CM06_ProvinceId] = CM06.[CM06_ProvinceID])
               INNER JOIN [NNT_DataCenter_2].[dbo].[NT02_NewsType] AS NT02 
                  ON(NT01.[NT02_TypeID] = NT02.[NT02_TypeID])
               INNER JOIN [NNT_DataCenter_2].[dbo].[NT03_NewsSubType] AS NT03 
                  ON(NT01.[NT03_SubTypeID] = NT03.[NT03_SubTypeID])
               INNER JOIN [NNT_DataCenter_2].[dbo].[NT08_PublicType] AS NT08
                  ON(NT01.[NT08_PubTypeID] = NT08.[NT08_PubTypeID])
            WHERE   (NT01.[NT08_PubTypeID] <> 8 OR NT01.[NT08_PubTypeID] IS NOT NULL)
               AND SC07.[SC07_DepartmentId] = '" . $this->getSC07DepartmentId() . "'
               AND NT08.[NT08_PubTypeID] = '" . $this->getNT08PubTypeID() . "'
               " . ($condition != "" ? " AND $condition " : "");
        $ait->queryString = $query;
        $rs = $ait->query();
        return $rs['result'][0]->CountRow;
    }

    /** 4.Count news by PublicTypeId
     *   Uses Exchange |
     */
    function countAllByPubTypeId()
    {
        $ait = $this->ait;
        $condition = array();
        if ($this->getStartDate() != "") {
            $formatStart = explode("/", $this->getStartDate());
            $newFormat = $formatStart[2] . "-" . $formatStart[1] . "-" . $formatStart[0] . " 00:00:00";
            array_push($condition, " t1.[NT01_NewsDate]>= '" . $newFormat . "' ");
        }
        if ($this->getEndDate() != "") {
            $formatEnd = explode("/", $this->getEndDate());
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 23:59:59";
            array_push($condition, " t1.[NT01_NewsDate]<= '" . $newFormat . "' ");
        }
        if ($this->getNewsTypeId() != "0" && $this->getNewsTypeId() != "") {
            array_push($condition, " t1.[NT02_TypeID]= '" . $this->getNewsTypeId() . "' ");
        }
        if ($this->getSubNewsTypeId() != "0" && $this->getSubNewsTypeId() != "") {
            array_push($condition, " t1.[NT03_SubTypeID]= '" . $this->getSubNewsTypeId() . "' ");
        }
        if ($this->getParentDepartmentId() != "0" && $this->getParentDepartmentId() != "") {
            $dept = " (t5.[SC07_ParentDepartmentId] = '" . $this->getParentDepartmentId() . "' ";
            if ($this->getDepartmentId() != "0" && $this->getDepartmentId() != "") {
                $dept .= " AND t5.[SC07_DepartmentId] = '" . $this->getDepartmentId() . "' ";
            }
            $dept .= ") ";
            array_push($condition, $dept);
        }

        if ($this->getRegionId() != "0" && $this->getRegionId() != "") {
            array_push($condition, " t4.[CM05_RegionID] = '" . $this->getRegionId() . "' ");

            if ($this->getProvinceId() != "0" && $this->getProvinceId() != "") {
                array_push($condition, " t4.[CM06_ProvinceID] = '" . $this->getProvinceId() . "' ");
            }
        }

        if ($this->getReporterId() != "0" && $this->getReporterId() != "") {
            array_push($condition, " t1.[NT01_ReporterID] = '" . $this->getReporterId() . "' ");
        }

        $conditionArr = array();
        foreach ($condition as $val) {
            $conditionArr[] = $val;
        }

        $condition = implode(" AND ", $conditionArr);
        $query = "
            SELECT COUNT(t1.[NT01_NewsID]) as CountRow
            FROM " . $this->getDbPrefix() . $this->getTableName() . " t1
               INNER JOIN " . $this->getDbPrefix() . "[SC03_User] t2
                  ON(t1.[NT01_ReporterID] = t2.[SC03_UserId])
               INNER JOIN " . $this->getDbPrefix() . "[CM05_Region] t3
                  ON(t2.[CM05_RegionId] = t3.[CM05_RegionID])
               INNER JOIN " . $this->getDbPrefix() . "[CM06_Province] t4
                  ON(t2.[CM06_ProvinceId] = t4.[CM06_ProvinceId])
               INNER JOIN " . $this->getDbPrefix() . "[SC07_Department] t5
                  ON(t2.[SC07_DepartmentId] = t5.[SC07_DepartmentId])
            WHERE t1.[NT08_PubTypeID] = '" . $this->getPubTypeId() . "'
            " . ($condition != "" ? " AND $condition" : "");
        $ait->queryString = $query;
        $result = $ait->query();
        return $result['result'][0]->CountRow;
    }

    /** 5.News list by PublicTypeId
     *   Uses Exchange |
     */
    function findByPubTypeId()
    {
        $ait = $this->ait;

        $start = ($this->getCurrentpage() == 1 ? 0 : $this->getCurrentpage * $this->getPageRow() - ($this->getPageRow()) + 1);
        $end = $this->getCurrentpage() * $this->getPageRow();

        $condition = array();
        if ($this->getStartDate() != "") {
            $formatStart = explode("/", $this->getStartDate());
            $newFormat = $formatStart[2] . "-" . $formatStart[1] . "-" . $formatStart[0] . " 00:00:00";
            array_push($condition, " t1.[NT01_NewsDate]>= '" . $newFormat . "' ");
        }
        if ($this->getEndDate() != "") {
            $formatEnd = explode("/", $this->getEndDate());
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 23:59:59";
            array_push($condition, " t1.[NT01_NewsDate]<= '" . $newFormat . "' ");
        }
        if ($this->getNewsTypeId() != "0" && $this->getNewsTypeId() != "") {
            array_push($condition, " t1.[NT02_TypeID]= '" . $this->getNewsTypeId() . "' ");
        }
        if ($this->getSubNewsTypeId() != "0" && $this->getSubNewsTypeId() != "") {
            array_push($condition, " t1.[NT03_SubTypeID]= '" . $this->getSubNewsTypeId() . "' ");
        }
        if ($this->getParentDepartmentId() != "0" && $this->getParentDepartmentId() != "") {

            $dept = " (t5.[SC07_ParentDepartmentId] = '" . $this->getParentDepartmentId() . "' ";

            if ($this->getDepartmentId() != "0" && $this->getDepartmentId() != "") {
                $dept .= " AND t5.[SC07_DepartmentId] = '" . $this->getDepartmentId() . "' ";
            }
            $dept .= ") ";
            array_push($condition, $dept);
        }

        if ($this->getRegionId() != "0" && $this->getRegionId() != "") {
            array_push($condition, " t3.[CM05_RegionID] = '" . $this->getRegionId() . "' ");

            if ($this->getProvinceId() != "0" && $this->getProvinceId() != "") {
                array_push($condition, " t4.[CM06_ProvinceID] = '" . $this->getProvinceId() . "' ");
            }
        }

        if ($this->getReporterId() != "0" && $this->getReporterId() != "") {
            array_push($condition, " t1.[NT01_ReporterID] = '" . $this->getReporterId() . "' ");
        }

        $conditionArr = array();
        foreach ($condition as $val) {
            $conditionArr[] = $val;
        }

        $condition = implode(" AND ", $conditionArr);

        $query = "
         WITH DATASET AS (
            SELECT t1.[NT01_NewsID] as newsId,
                  t1.[NT01_NewsTitle] as newsTitle,
                  CONVERT(varchar(11),t1.[NT01_NewsDate],105) as newsDate,
                  t1.[NT01_ReporterID] as reporterId,
                  t1.[NT02_TypeID] as typeId,
                  t1.[NT03_SubTypeID] as subTypeId,
                  t1.[CM05_RegionID] as regionId,
                  t1.[CM06_ProvinceID] as provinceId,
                  t1.[NT08_PubTypeID] as pubTypeId,
                  t1.[SC07_DepartmentId] as departmentId,
                  t1.[NT26_IssueID] as issueId,
                  t5.[SC07_DepartmentName] as departmentName,
                  ROW_NUMBER() OVER (ORDER BY t1.[NT01_NewsDate] DESC) AS 'RowNumber'
            FROM " . $this->getDbPrefix() . $this->getTableName() . " t1
               INNER JOIN " . $this->getDbPrefix() . "[SC03_User] t2
                  ON(t1.[NT01_ReporterID] = t2.[SC03_UserId])
               INNER JOIN " . $this->getDbPrefix() . "[CM05_Region] t3
                  ON(t2.[CM05_RegionId] = t3.[CM05_RegionID])
               INNER JOIN " . $this->getDbPrefix() . "[CM06_Province] t4
                  ON(t2.[CM06_ProvinceId] = t4.[CM06_ProvinceId])
               INNER JOIN " . $this->getDbPrefix() . "[SC07_Department] t5
                  ON(t2.[SC07_DepartmentId] = t5.[SC07_DepartmentId])
            WHERE t1.[NT01_Status] = 'Y' 
               AND t1.[NT08_PubTypeID] = '" . $this->getPubTypeId() . "'
            " . ($condition != "" ? " AND $condition" : "") . "
            )
         SELECT * FROM DATASET WHERE RowNumber BETWEEN $start AND $end";
        echo $query;
        $ait->queryString = $query;
        $rs = $ait->query();
        return $rs['result'];
    }

    function countNewsByDate($departmentId, $newsType, $date)
    {

        $ait = $this->ait;
        $query = "
      SELECT count(*) as CountNews 
      FROM " . $this->getDbPrefix() . $this->getTableName() . "
      WHERE CONVERT(VARCHAR(11), [NT01_NewsDate], 121) LIKE '$date%'
      AND [NT02_TypeID] = '$newsType'
      AND [SC07_DepartmentId] ='$departmentId'";
        $this->ait->queryString =
            $this->ait->init();
        $query = $this->ait->query();
        $count = 0;
        foreach ($query['result'] as $val) {
            $count = $val->CountNews;
        }
        return $count;
    }

    function getDistinctDate($date)
    {
        $this->ait->queryString = "WITH DATASETS AS(SELECT DISTINCT SUBSTRING(CONVERT(VARCHAR(19),
      [NT01_NewsDate], 121),0,11) AS NT01_NewsDate,
      ROW_NUMBER() OVER (ORDER BY NT01_NewsDate DESC) AS 'RowDateNumber'
      FROM [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y')
      SELECT NT01_NewsDate, RowDateNumber FROM DATASETS ";
        $this->ait->init();
        $query = $this->ait->query();
        return $query;
    }

    function count()
    {
        $this->ait->queryString = "SELECT COUNT([NT01_NewsID]) as NUMROW from [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y'";
        $this->ait->init();
        $result = $this->ait->query();
        foreach ($result['result'] as $val) {
            return $val->NUMROW;
        }
    }

    function countBy()
    {
        $condition = array();
        if ($this->getStartDate() != "") {
            $formatStart = explode("/", $this->getStartDate());
            $newFormat = $formatStart[2] . "-" . $formatStart[1] . "-" . $formatStart[0] . " 00:00:00";
            array_push($condition, " [NT01_NewsDate]>= '" . $newFormat . "' ");
        }
        if ($this->getEndDate() != "") {
            $formatEnd = explode("/", $this->getEndDate());
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 23:59:59";
            array_push($condition, " [NT01_NewsDate]<= '" . $newFormat . "' ");
        }
        if ($this->getNewsType() != "0") {
            array_push($condition, " [NT02_TypeID]= '" . $this->getNewsType() . "' ");
        }
        if ($this->getSubNewsType() != "0") {
            array_push($condition, " [NT03_SubTypeID]= '" . $this->getSubNewsType() . "' ");
        }
        if ($this->getDepartment() != "0") {

            $dept = " ([SC07_ParentDepartmentId] = '" . $this->getDepartment() . "' ";

            if ($this->getSubDepartment() != "0") {
                $dept .= " AND [SC07_DepartmentId] = '" . $this->getSubDepartment() . "' ";
            }
            $dept .= ") ";
            array_push($condition, $dept);
        }

        if ($this->getRegion() != "0") {
            array_push($condition, " [CM05_RegionID] = '" . $this->getRegion() . "' ");
        }
        if ($this->getProvince() != "0") {
            array_push($condition, " [CM06_ProvinceID] = '" . $this->getProvince() . "' ");
        }
        if ($this->getUserId() != "0") {
            array_push($condition, " [NT01_ReporterID] = '" . $this->getUserId() . "' ");
        }

        $conditionArr = array();
        foreach ($condition as $val) {
            $conditionArr[] = $val;
        }

        $condition = implode(" AND ", $conditionArr);

        $this->ait->queryString = "SELECT COUNT([NT01_NewsID]) as NUMROW from [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y' " . ($condition != "" ? " AND " . $condition : "");
        $this->ait->init();
        $result = $this->ait->query();
        foreach ($result['result'] as $val) {
            return $val->NUMROW;
        }
    }

    function findAll($page = 1, $row_per_page = 20)
    {

        $start = $page == 1 ? 0 : $page * $row_per_page - ($row_per_page);
        $end = $page * $row_per_page;
        $this->ait->queryString = "WITH LIMIT AS(SELECT [NT01_NewsID],[NT01_NewsTitle],
          CONVERT(VARCHAR(19), [NT01_NewsDate], 121) AS NT01_NewsDate,
          ROW_NUMBER() OVER (ORDER BY [NT01_NewsID] DESC) AS 'RowNumber'
          FROM [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y' )

      SELECT * from LIMIT WHERE RowNumber BETWEEN $start AND $end";
        $this->ait->init();
        return $this->ait->query();
    }


    function search($page = 1, $row_per_page = 20)
    {
        $condition = array();
        if ($this->getStartDate() != "") {
            $formatStart = explode("/", $this->getStartDate());
            $newFormat = $formatStart[2] . "-" . $formatStart[1] . "-" . $formatStart[0] . " 00:00:00";
            array_push($condition, " [NT01_NewsDate]>= '" . $newFormat . "' ");
        }
        if ($this->getEndDate() != "") {
            $formatEnd = explode("/", $this->getEndDate());
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 23:59:59";
            array_push($condition, " [NT01_NewsDate]<= '" . $newFormat . "' ");
        }
        if ($this->getNewsType() != "0") {
            array_push($condition, " [NT02_TypeID]= '" . $this->getNewsType() . "' ");
        }
        if ($this->getSubNewsType() != "0") {
            array_push($condition, " [NT03_SubTypeID]= '" . $this->getSubNewsType() . "' ");
        }
        if ($this->getDepartment() != "0") {

            $dept = " ([SC07_ParentDepartmentId] = '" . $this->getDepartment() . "' ";

            if ($this->getSubDepartment() != "0") {
                $dept .= " AND [SC07_DepartmentId] = '" . $this->getSubDepartment() . "' ";
            }
            $dept .= ") ";
            array_push($condition, $dept);
        }

        if ($this->getRegion() != "0") {
            array_push($condition, " [CM05_RegionID] = '" . $this->getRegion() . "' ");
        }
        if ($this->getProvince() != "0") {
            array_push($condition, " [CM06_ProvinceID] = '" . $this->getProvince() . "' ");
        }
        if ($this->getUserId() != "0") {
            array_push($condition, " [NT01_ReporterID] = '" . $this->getUserId() . "' ");
        }

        $conditionArr = array();
        foreach ($condition as $val) {
            $conditionArr[] = $val;
        }

        $condition = implode(" AND ", $conditionArr);

        $start = $page == 1 ? 0 : $page * $row_per_page - ($row_per_page);
        $end = $page * $row_per_page;

        $this->ait->queryString = "WITH LIMIT AS(SELECT [NT01_NewsID],[NT01_NewsTitle],
          CONVERT(VARCHAR(19), [NT01_NewsDate], 121) AS NT01_NewsDate,
          ROW_NUMBER() OVER (ORDER BY [NT01_NewsID] DESC) AS 'RowNumber'
          FROM [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y' " .
            ($condition != "" ? " AND " . $condition : "") . " )
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

    function findAllGroupByDate($page = 1, $row_per_page = 20)
    {

        $condition = array();
        if ($this->getStartDate() != "") {
            $formatStart = explode("/", $this->getStartDate());
            $newFormat = $formatStart[2] . "-" . $formatStart[1] . "-" . $formatStart[0] . " 00:00:00";
            array_push($condition, " [NT01_NewsDate]>= '" . $newFormat . "' ");
        }
        if ($this->getEndDate() != "") {
            $formatEnd = explode("/", $this->getEndDate());
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 23:59:59";
            array_push($condition, " [NT01_NewsDate]<= '" . $newFormat . "' ");
        }
        if ($this->getNewsType() != "0") {
            array_push($condition, " [NT02_TypeID]= '" . $this->getNewsType() . "' ");
        }
        if ($this->getSubNewsType() != "0") {
            array_push($condition, " [NT03_SubTypeID]= '" . $this->getSubNewsType() . "' ");
        }
        if ($this->getDepartment() != "0") {

            $dept = " ([SC07_ParentDepartmentId] = '" . $this->getDepartment() . "' ";

            if ($this->getSubDepartment() != "0") {
                $dept .= " AND [SC07_DepartmentId] = '" . $this->getSubDepartment() . "' ";
            }
            $dept .= ") ";
            array_push($condition, $dept);
        }

        if ($this->getRegion() != "0") {
            array_push($condition, " [CM05_RegionID] = '" . $this->getRegion() . "' ");
        }
        if ($this->getProvince() != "0") {
            array_push($condition, " [CM06_ProvinceID] = '" . $this->getProvince() . "' ");
        }
        if ($this->getUserId() != "0") {
            array_push($condition, " [NT01_ReporterID] = '" . $this->getUserId() . "' ");
        }

        $conditionArr = array();
        foreach ($condition as $val) {
            $conditionArr[] = $val;
        }

        $condition = implode(" AND ", $conditionArr);

        $start = $page == 1 ? 0 : $page * $row_per_page - ($row_per_page);
        $end = $page * $row_per_page;

        $this->ait->queryString = "WITH LIMIT AS(SELECT [NT01_NewsID],[NT01_NewsTitle], CONVERT(VARCHAR(19),
          [NT01_NewsDate], 121) AS NT01_NewsDate,
         ROW_NUMBER() OVER ( ORDER BY [NT01_NewsID] DESC ) AS 'RowNumber'
         FROM [NNT_DataCenter_2].[dbo].[NT01_News] WHERE [NT01_Status] ='Y' " .
            ($condition != "" ? " AND " . $condition : "") . " )
         SELECT * from LIMIT WHERE RowNumber BETWEEN $start AND $end";
        $this->ait->init();
        return $this->ait->query();
    }


    function countByNewsType($newsType)
    {

        $this->ait->queryString = "SELECT COUNT(*) AS CountRow
      FROM [NNT_DataCenter_2].[dbo].[NT01_News]
      WHERE [NT01_Status] ='Y' AND [NT02_TypeID]= '" . $newsType . "'";
        $count = 0;
        foreach ($this->ait->query()['row'] as $val) {
            $count = $val;
        }
        return $count;
    }


    // for Cross portal
    function  getDistinctYear()
    {
        $condition = array();
        if ($this->getStartDate() != "") {
            $formatStart = explode("/", $this->getStartDate());
            $newFormat = $formatStart[2] . "-" . $formatStart[1] . "-" . $formatStart[0] . " 00:00:00";
            array_push($condition, " t1.[NT01_NewsDate]>= '" . $newFormat . "' ");
        }
        if ($this->getEndDate() != "") {
            $formatEnd = explode("/", $this->getEndDate());
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 23:59:59";
            array_push($condition, " t1.[NT01_NewsDate]<= '" . $newFormat . "' ");
        }
        if ($this->getPubTypeId() != "0" && $this->getPubTypeId() != "") {
            array_push($condition, " t1.[NT02_TypeID]= '" . $this->getPubTypeId() . "' ");
        }
        if ($this->getSubNewsTypeId() != "0" && $this->getSubNewsTypeId() != "") {
            array_push($condition, " t1.[NT03_SubTypeID]= '" . $this->getSubNewsTypeId() . "' ");
        }
        if ($this->getParentDepartmentId() != "0" && $this->getParentDepartmentId() != "") {

            $dept = " (t5.[SC07_ParentDepartmentId] = '" . $this->getParentDepartmentId() . "' ";

            if ($this->getDepartmentId() != "0" && $this->getDepartmentId() != "") {
                $dept .= " AND t5.[SC07_DepartmentId] = '" . $this->getDepartmentId() . "' ";
            }
            $dept .= ") ";
            array_push($condition, $dept);
        }

        if ($this->getRegionId() != "0" && $this->getRegionId() != "") {
            array_push($condition, " t3.[CM05_RegionID] = '" . $this->getRegionId() . "' ");
        }
        if ($this->getProvinceId() != "0" && $this->getProvinceId() != "") {
            array_push($condition, " t4.[CM06_ProvinceID] = '" . $this->getProvinceId() . "' ");
        }
        if ($this->getReporterId() != "0" && $this->getReporterId() != "") {
            array_push($condition, " t1.[NT01_ReporterID] = '" . $this->getReporterId() . "' ");
        }

        $conditionArr = array();
        foreach ($condition as $val) {
            $conditionArr[] = $val;
        }

        $condition = implode(" AND ", $conditionArr);

        $ait = $this->ait;
        $query = "WITH DATASET AS(
         SELECT distinct SUBSTRING(CONVERT(VARCHAR(10),[NT01_NewsDate],121),0,8)as yearDate
         FROM [NNT_DataCenter_2].[dbo].[NT01_News]t1
         INNER JOIN [NNT_DataCenter_2].[dbo].[SC03_User] t2 ON(t1.[NT01_ReporterID] = t2.[SC03_UserId])
         INNER JOIN [NNT_DataCenter_2].[dbo].[CM05_Region] t3 ON(t2.[CM05_RegionId] = t3.[CM05_RegionID])
         INNER JOIN [NNT_DataCenter_2].[dbo].[CM06_Province] t4 ON(t2.[CM06_ProvinceId] = t4.[CM06_ProvinceId])
         INNER JOIN [NNT_DataCenter_2].[dbo].[SC07_Department] t5 ON(t2.[SC07_DepartmentId] = t5.[SC07_DepartmentId])
         " . ($condition != "" ? "WHERE $condition" : "") . "
         GROUP BY [NT01_NewsDate]
         )
      SELECT *, ROW_NUMBER() OVER (ORDER BY yearDate DESC) AS 'RowNumber'
      FROM DATASET as Dataset order by yearDate desc";
        $ait->queryString = $query;
        $ait->init();
        $rs = $ait->query();
        return $rs['result'];
    }

    function getMonthName($month)
    {
        $monthArr = array(
            "01" => "มกราคม", "02" => "กุมภาพันธ์", "03" => "มีนาคม", "04" => "เมษายน", "05" => "พฤษภาคม", "06" => "มิถุนายน", "07" => "กรกฎาคม", "08" => "สิงหาคม", "09" => "กันยายน", "10" => "ตุลาคม", "11" => "พฤษจิกายน", "12" => "ธันวาคม"
        );
        return $monthArr[$month];
    }

    function countNewsByDateAndPubTypeId($date, $pubtype)
    {
        $condition = array();
        if ($this->getStartDate() != "") {
            $formatStart = explode("/", $this->getStartDate());
            $newFormat = $formatStart[2] . "-" . $formatStart[1] . "-" . $formatStart[0] . " 00:00:00";
            array_push($condition, " t1.[NT01_NewsDate]>= '" . $newFormat . "' ");
        }
        if ($this->getEndDate() != "") {
            $formatEnd = explode("/", $this->getEndDate());
            $newFormat = $formatEnd[2] . "-" . $formatEnd[1] . "-" . $formatEnd[0] . " 23:59:59";
            array_push($condition, " t1.[NT01_NewsDate]<= '" . $newFormat . "' ");
        }
        if ($this->getNewsType() != "0" && $this->getNewsType() != "") {
            array_push($condition, " t1.[NT02_TypeID]= '" . $this->getNewsType() . "' ");
        }
        if ($this->getSubNewsType() != "0" && $this->getSubNewsType() != "") {
            array_push($condition, " t1.[NT03_SubTypeID]= '" . $this->getSubNewsType() . "' ");
        }
        if ($this->getDepartment() != "0" && $this->getDepartment() != "") {

            $dept = " (t5.[SC07_ParentDepartmentId] = '" . $this->getDepartment() . "' ";

            if ($this->getSubDepartment() != "0" && $this->getSubDepartment() != "") {
                $dept .= " AND t5.[SC07_DepartmentId] = '" . $this->getSubDepartment() . "' ";
            }
            $dept .= ") ";
            array_push($condition, $dept);
        }

        if ($this->getRegion() != "0" && $this->getRegion() != "") {
            array_push($condition, " t3.[CM05_RegionID] = '" . $this->getRegion() . "' ");
        }
        if ($this->getProvince() != "0" && $this->getProvince() != "") {
            array_push($condition, " t4.[CM06_ProvinceID] = '" . $this->getProvince() . "' ");
        }
        if ($this->getUserId() != "0" && $this->getUserId() != "") {
            array_push($condition, " t1.[NT01_ReporterID] = '" . $this->getUserId() . "' ");
        }

        $conditionArr = array();
        foreach ($condition as $val) {
            $conditionArr[] = $val;
        }

        $condition = implode(" AND ", $conditionArr);

        $query = "SELECT COUNT([NT01_NewsID]) as CountNews
      FROM [NNT_DataCenter_2].[dbo].[NT01_News] t1
      INNER JOIN [NNT_DataCenter_2].[dbo].[SC03_User] t2 ON(t1.[NT01_ReporterID] = t2.[SC03_UserId])
      INNER JOIN [NNT_DataCenter_2].[dbo].[CM05_Region] t3 ON(t2.[CM05_RegionId] = t3.[CM05_RegionID])
      INNER JOIN [NNT_DataCenter_2].[dbo].[CM06_Province] t4 ON(t2.[CM06_ProvinceId] = t4.[CM06_ProvinceId])
      INNER JOIN [NNT_DataCenter_2].[dbo].[SC07_Department] t5 ON(t2.[SC07_DepartmentId] = t5.[SC07_DepartmentId])
      WHERE
      CONVERT(VARCHAR(25), [NT01_NewsDate], 126) LIKE '$date%'
      " . ($condition != "" ? " AND $condition" : "") . "
      AND [NT08_PubTypeID] = '$pubtype'";
        $ait = $this->ait;
        $ait->queryString = $query;
        $ait->init();
        $count = 0;
        $rs = $ait->query();
        foreach ($rs['result'] as $val) {
            $count = $val->CountNews;
        }
        return $count;
    }

    function avgNewsPerDays($month, $qty)
    {
        $monthArr = array(
            "01" => "31", "02" => "28", "03" => "13", "04" => "30", "05" => "31", "06" => "30", "07" => "31", "08" => "31", "09" => "30", "10" => "31", "11" => "30", "12" => "31"
        );
        return number_format($qty / $monthArr[$month], 2);
    }


    function findAllDistinctDay($page = 1)
    {
        $start = $page == 1 ? 0 : $page;
        $end = ($start == 0 ? $start + 1 : $start);

        $query = "WITH DATASET AS(
         SELECT SUBSTRING(CONVERT(VARCHAR(10),[NT01_NewsDate],121),0,11) as yearDate
         ,ROW_NUMBER() OVER (ORDER BY SUBSTRING(CONVERT(VARCHAR(10),[NT01_NewsDate],121),0,11) DESC) 
         AS 'RowNumber'
         FROM [NNT_DataCenter_2].[dbo].[NT01_News]t1
         INNER JOIN [NNT_DataCenter_2].[dbo].[SC03_User] t2 ON(t1.[NT01_ReporterID] = t2.[SC03_UserId])
         INNER JOIN [NNT_DataCenter_2].[dbo].[CM05_Region] t3 ON(t2.[CM05_RegionId] = t3.[CM05_RegionID])
         INNER JOIN [NNT_DataCenter_2].[dbo].[CM06_Province] t4 ON(t2.[CM06_ProvinceId] = t4.[CM06_ProvinceId])
         GROUP BY SUBSTRING(CONVERT(VARCHAR(10),[NT01_NewsDate],121),0,11)
         )
      SELECT * FROM DATASET WHERE RowNumber BETWEEN $start and $end ";
        $ait = $this->ait;
        $ait->queryString = $query;
        $ait->init();
        return $ait->query();
    }

    function countAllDistinctDay()
    {
        $query = "WITH DATASET AS(
         SELECT SUBSTRING(CONVERT(VARCHAR(10),[NT01_NewsDate],121),0,11) as yearDate
         ,ROW_NUMBER() OVER (ORDER BY SUBSTRING(CONVERT(VARCHAR(10),[NT01_NewsDate],121),0,11) DESC) 
         AS 'RowNumber'
         FROM [NNT_DataCenter_2].[dbo].[NT01_News]t1
         INNER JOIN [NNT_DataCenter_2].[dbo].[SC03_User] t2 ON(t1.[NT01_ReporterID] = t2.[SC03_UserId])
         INNER JOIN [NNT_DataCenter_2].[dbo].[CM05_Region] t3 ON(t2.[CM05_RegionId] = t3.[CM05_RegionID])
         INNER JOIN [NNT_DataCenter_2].[dbo].[CM06_Province] t4 ON(t2.[CM06_ProvinceId] = t4.[CM06_ProvinceId])
         GROUP BY SUBSTRING(CONVERT(VARCHAR(10),[NT01_NewsDate],121),0,11)
         )
      SELECT COUNT(*) as CountRow FROM DATASET ";
        $ait = $this->ait;
        $ait->queryString = $query;
        $ait->init();
        $count = 0;
        foreach ($ait->query()['result'] as $val) {
            $count = $val->CountRow;
        }
        return $count;
    }

    function countNewsByDateAndRegion($date)
    {
        $condition = array();
        if ($this->getRegion() != "0" && $this->getRegion() != "") {
            array_push($condition, " t2.[CM05_RegionId] = '" . $this->getRegion() . "' ");

            if ($this->getProvince() != "0" && $this->getProvince() != "") {
                array_push($condition, " t2.[CM06_ProvinceId] = '" . $this->getProvince() . "' ");
            }
        }

        $conditionArr = array();
        foreach ($condition as $val) {
            $conditionArr[] = $val;
        }

        $condition = implode(" AND ", $conditionArr);

        $query = "SELECT COUNT(t1.[NT01_NewsID])as CountNews
      FROM [NNT_DataCenter_2].[dbo].[NT01_News] t1
      INNER JOIN [NNT_DataCenter_2].[dbo].[SC03_User] t2 ON(t1.[NT01_ReporterID] = t2.[SC03_UserId])
      INNER JOIN [NNT_DataCenter_2].[dbo].[CM05_Region] t3 ON(t2.[CM05_RegionId] = t3.[CM05_RegionID])
      INNER JOIN [NNT_DataCenter_2].[dbo].[CM06_Province] t4 ON(t2.[CM06_ProvinceId] = t4.[CM06_ProvinceId])
      WHERE SUBSTRING(CONVERT(VARCHAR(10),t1.[NT01_NewsDate],121),0,11) = '$date'
      " . ($condition != "" ? " AND $condition" : "");

        $ait = $this->ait;
        $ait->queryString = $query;
        $ait->init();
        $rs = $ait->query();
        $count = 0;
        foreach ($rs['result'] as $val) {
            $count = $val->CountNews;
        }
        return $count;
    }

    function findAllStatus($page = 1, $row_per_page = 20)
    {

        $start = $page == 1 ? 0 : $page * $row_per_page - ($row_per_page);
        $end = $page * $row_per_page;

        $this->ait->queryString = "WITH LIMIT AS(
         SELECT t1.[NT01_NewsID],t1.[NT01_NewsTitle],SUBSTRING(t1.[NT01_NewsDesc],0,100) as NT01_NewsDesc,
         t1.[NT02_TypeID],t1.[NT03_SubTypeID],t1.[NT01_ReporterID],t1.[NT01_ReWriteID],
         CONVERT(VARCHAR(11), t1.[NT01_NewsDate], 121) AS NT01_NewsDate,t5.[SC07_DepartmentName],t5.[SC07_DepartmentId],
         t3.[CM05_RegionName],t4.[CM06_ProvinceName],t6.[NT08_PubTypeName],t1.[NT01_Status],
         ROW_NUMBER() OVER (ORDER BY t1.[NT01_NewsDate] DESC) AS 'RowNumber'
         FROM [NNT_DataCenter_2].[dbo].[NT01_News] t1
         INNER JOIN [NNT_DataCenter_2].[dbo].[SC03_User] t2 ON(t1.[NT01_ReporterID] = t2.[SC03_UserId])
         INNER JOIN [NNT_DataCenter_2].[dbo].[CM05_Region] t3 ON(t2.[CM05_RegionId] = t3.[CM05_RegionID])
         INNER JOIN [NNT_DataCenter_2].[dbo].[CM06_Province] t4 ON(t2.[CM06_ProvinceId] = t4.[CM06_ProvinceId])
         INNER JOIN [NNT_DataCenter_2].[dbo].[SC07_Department] t5 ON(t2.[SC07_DepartmentId] = t5.[SC07_DepartmentId])
         INNER JOIN [NNT_DataCenter_2].[dbo].[NT08_PublicType] t6 ON(t1.[NT08_PubTypeID] =t6.[NT08_PubTypeID])
         )
      SELECT * from LIMIT WHERE RowNumber BETWEEN $start AND $end";
        $this->ait->init();
        return $this->ait->query();
    }

    function getStatusName($status)
    {
        switch ($status) {
            case 'W':
                return "รอตรวจสอบ";
                break;
            case 'N':
                return "ไม่ใช้งาน";
                break;
            case 'D':
                return "ลบ";
                break;

            default:
                return "ตรวจสอบแล้ว";
                break;
        }
    }
}