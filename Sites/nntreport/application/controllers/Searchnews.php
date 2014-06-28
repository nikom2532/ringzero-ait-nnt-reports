<?php
/*=======================================================================
* TODO : Broadcast Controller สรุปการเผยแพร่ข่าว
* Filename: controllers/Broadcase.php
* Auther: Mr.Boripat@ait
* Modify: 6/8/2014
*======================================================================*/
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Searchnews extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->lang->load( 'searchnews', 'thai' );
		$this->ait->parseData+= array(
			"report_name" => $this->lang->line( 'lbl_summary_broadcast_news' ),
			"lbl_date" => $this->lang->line( 'lbl_date' ),
			"lbl_tag" => $this->lang->line( 'lbl_tag' ),
			"lbl_category" => $this->lang->line( 'lbl_category' ),
			"lbl_qty" => $this->lang->line( 'lbl_qty' )
		);
	}

	public function index($page=1){
		$this->datalist($page);
	}

	/*-----------------------------------------------------------------
	* TODO : Initialize data 
	* @return: 	parser data to view/summary_broadcast_news.html template. 
	*-----------------------------------------------------------------*/
	public function init(){
		$this->parser->parse( "summary_search_news.html", $this->ait->parseData );
	}
	
	/*-----------------------------------------------------------------
	* TODO : สรุปการเผยแพร่ข่าว
	* @agument: $page : is a current page active.
	* @return: 	setter Array data in Variable $data. 
	*-----------------------------------------------------------------*/
	public function datalist($page=1) {
		// Samples data
		$result_array = array(
				array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"tag"=>"ชื่อภูมิภาค",
						"category"=>"สระบุรี",
						"qty"=>"5"
				),
				array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"tag"=>"ชื่อภูมิภาค",
						"category"=>"สระบุรี",
						"qty"=>"5"
				),
				array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"tag"=>"ชื่อภูมิภาค",
						"category"=>"สระบุรี",
						"qty"=>"5"
				),
				array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"tag"=>"ชื่อภูมิภาค",
						"category"=>"สระบุรี",
						"qty"=>"5"
				)
				
		);

		$this->ait->pagination($result_array,"searchnews/datalist/",$page);
		$this->ait->parseData +=  array(
			"result_array" => $result_array,
			"count_row"=>count($result_array)
		); 
		$this->init();
	}

	/*/*-----------------------------------------------------------------
	* TODO : Search
	* @agument: $page : is a current page active.
	* @return: 	setter Array data in Variable $data. 
	*-----------------------------------------------------------------*/
	public function search($page=1){
		// Samples data
		$result_array = array(
				array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"tag"=>"ชื่อภูมิภาค",
						"category"=>"สระบุรี",
						"qty"=>"5"
				),
				array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"tag"=>"ชื่อภูมิภาค",
						"category"=>"สระบุรี",
						"qty"=>"5"
				),
				array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"tag"=>"ชื่อภูมิภาค",
						"category"=>"สระบุรี",
						"qty"=>"5"
				),
				array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"tag"=>"ชื่อภูมิภาค",
						"category"=>"สระบุรี",
						"qty"=>"5"
				)
		);

		$this->ait->pagination($result_array,"searchnews/search/",$page);
		$this->ait->parseData +=  array(
			// Language
			"result_array" => $result_array,
			"count_row"=>count($result_array)
		); 
				
		$this->init();
	}


}