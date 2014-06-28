<?php
class Authenticator_model extends CI_Model{
	var $id='';
	var $fullname='';
	var $username='';
	var $password='';

	function __construct(){
		parent::__construct();
	}

	function setId($id){
		$this->id = $id;
	}

	function getId(){
		return $this->id;
	}

	function setFullname($fullname){
		$this->fullname = $fullname;
	}

	function getFullname(){
		return $fullname->fullname;
	}

	function setUsername($username){
		$this->username = $username;
	}

	function getUsername(){
		return $this->username;
	}

	function setPassword($password){
		$this->password = $password;
	}

	function getPassword(){
		return $this->password;
	}

	function signIn(){
		/*$this->ait->init(
			array(
				"table_name"=>"authenticator",
				"condition"=> array(
						"username"=>$this->getUsername(),
						"password"=>$this->getPassword()
					)
				)
			);
		$this->ait->findBy();
		if($result['num_row']==0){
		return 0;
		}else{
			return 1;
		}*/
	}

	function signOut(){
		
	}
}