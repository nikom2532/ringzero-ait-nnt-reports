<?php
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Dynamic extends CI_Controller {
	
	var $data = array();
	function __construct() {
		parent::__construct ();
	}

	public function init(){
		$this->parser->parse( "summary_dynamic.html", $this->data );
	}

	/*-----------------------------------------------------------------
	* TODO : รายงานแบบไดนามิก
	*-----------------------------------------------------------------*/
	public function index($page=1){

		$result_array = array();
		$this->ait->pagination($result_array,"dynamic/",$page);
		$this->ait->parseData +=  array(
			"report_name" => $this->lang->line( 'summary_dynamic' ),
			"result_array" => $result_array,
			"count_row"=>count($result_array)
			);
		$this->data = $this->ait->parseData;
		$this->init();
	}

	public function create(){
		$this->ait->parseData +=  array(
			"report_name" => $this->lang->line( 'summary_dynamic_form' ),
			);
		$this->parser->parse( "summary_dynamic_form.html", $this->ait->parseData);
	}

	public function createAction(){
		if(isset($_POST["field"])){
			foreach($_POST["field"] as $val){
				echo $val;
				echo "<br/>";
			}
		}
	}
}