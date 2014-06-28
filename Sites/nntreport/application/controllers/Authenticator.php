<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Authenticator extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );

		$this->load->model("Authenticator_model","authen");
		$this->lang->load ( 'common', 'thai' );
		$this->lang->load ( 'login', 'thai' );
	}
	
	public function index() {
		$data = array (
				"base_url" => base_url (),
				"site_title" => $this->lang->line ( 'site_title' ),
				"lbl_username" => $this->lang->line ( 'lbl_username' ),
				"lbl_password" => $this->lang->line ( 'lbl_password' ),
				"btn_login" => $this->lang->line ( 'btn_login' ) 
		);
		$this->parser->parse ( "login.html", $data );
	}
	
	public function signin(){
		$this->authen->setUsername(trim($_POST['username']));
		$this->authen->setPassword(trim($_POST['password']));
		$result = $this->authen->signIn();
		if($result==1){
			redirect("/main/index","refresh");
		}else{
			redirect("/main/index","refresh");
		}
	}

	/**
	 * Signout function
	 *
	 * @return void
	 * @author Mr.Boripat
	 **/
	public function signout()
	{
		redirect("./");
	}
}
