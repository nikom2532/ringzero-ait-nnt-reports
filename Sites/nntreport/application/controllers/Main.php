<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Main extends CI_Controller {
	function __construct() {
		parent::__construct ();
		$this->load->helper ( 'url' );
	}
	
	function index(){
		$this->parser->parse( "main_report.html", $this->ait->parseData );
	}
}