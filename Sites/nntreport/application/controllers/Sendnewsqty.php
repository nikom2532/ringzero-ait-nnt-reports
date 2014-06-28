<?php
/*=======================================================================
* TODO : Send news Qty Controller รายงานสรุปจำนวนการส่งข่าว
* Filename: controllers/Sendnewsqty.php
* Auther: Mr.Boripat@ait
* Modify: 6/11/2014
*======================================================================*/
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Sendnewsqty extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->lang->load( 'sendnewsqty', 'thai' );
		$this->ait->parseData += array(
			"report_name"       => $this->lang->line( 'summary_sendnews_qty' ),
			"lbl_date"       => $this->lang->line( 'lbl_date' ),
			"lbl_tag"    => $this->lang->line( 'lbl_tag' ),
			"lbl_category"     => $this->lang->line( 'lbl_category' ),
			"lbl_qty"      => $this->lang->line( 'lbl_qty' )
		);
	}
	public function index($page = 1)
	{
		$this->datalist($page);
	}

	/*-----------------------------------------------------------------
	* TODO : Initialize data
	* @return: 	parser data to view/summary_broadcast_news.html template.
	*-----------------------------------------------------------------*/
	public function init()
	{
		$this->parser->parse( "summary_sendnews_qty.html", $this->ait->parseData );
	}
	
	/*-----------------------------------------------------------------
	* TODO : Data List
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

		$this->ait->pagination($result_array,"sendnewsqty/datalist/",$page);
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

		$this->ait->pagination($result_array,"sendnewsqty/search/",$page);
		$this->ait->parseData +=  array(
			"result_array" => $result_array,
			"count_row"=>count($result_array)
		); 
				
		$this->init();
	}
}