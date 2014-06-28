<?php
/**
* Model : User_model
*/
class User_model extends CI_Model
{		
	var $table_name = "VW07_User";

	function __construct()
	{
		parent::__construct();
		
	}

	function findAll(){
		$this->ait->queryString = "SELECT [UserID],[Title],[FName],[LName]
			FROM ".$this->table_name."
			ORDER BY [UserID] ASC";
		$this->ait->init();
		return $this->ait->query();
	}
}