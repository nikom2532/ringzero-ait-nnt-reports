<?php
/**
 * Created by IntelliJ IDEA.
 * User: Jawsour
 * Date: 6/19/14
 * Time: 2:20 PM
 * To change this template use File | Settings | File Templates.
 */ 
class Issue_model extends CI_Model {
    var $db_prefix = "[NNT_DataCenter_2].[dbo].";
    var $table_name = "[NT26_IOCIssue]";
    var $NT26_IssueID = "";
    var $NT26_IssueTitle = "";


    function getDbPrefix(){
        return $this->db_prefix;
    }
    function getTableName(){
        return $this->table_name;
    }
    function setIssueId($issueId){
        $this->NT26_IssueID = $issueId;
    }
    function getIssueId(){
        return $this->NT26_IssueID;
    }
    function setIssueTitle($issueTitle){
        $this->NT26_IssueTitle = $issueTitle;
    }
    function getIssueTitle(){
        return $this->NT26_IssueTitle;
    }

    function toString(){
        $ait = $this->ait;
        $query = "
            SELECT [NT26_IssueTitle] as issueTitle
            FROM ".$this->getDbPrefix().$this->getTableName()."
            WHERE [NT26_IssueID]= '".$this->getIssueId()."' ";
        $ait->queryString = $query;
        $result = $ait->query();
        return $result['result'][0]->issueTitle;
    }
}
