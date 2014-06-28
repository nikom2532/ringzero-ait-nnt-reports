<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Report extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
		// 		$this->load->library(array("nntreport"));
		$this->lang->load ( 'common', 'thai' );
		
	}
}