<?php
/**
* TODO : PlaceNews Controller รายงานสรุปสถิติสถานที่เกิดข่าว
* Filename: controllers/Placenews.php
* Auther: Mr.Boripat@ait
* Modify: 6/10/2014
*/
class Placenews extends CI_Controller
{
	
	function __construct()
	{
	parent::__construct();
		$this->lang->load( 'placenews', 'thai' );
		$this->ait->parseData += array(
			"report_name"       => $this->lang->line( 'summary_place_news' ),
			"lbl_date"       => $this->lang->line( 'lbl_date' ),
			"lbl_region"    => $this->lang->line( 'lbl_region' ),
			"lbl_province"     => $this->lang->line( 'lbl_province' ),
			"lbl_placenews"      => $this->lang->line( 'lbl_placenews' ),
			"lbl_qty"     => $this->lang->line( 'lbl_qty' )
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
		$this->parser->parse( "summary_place_news.html", $this->ait->parseData );
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
				"news_date"=>"03/02/2557 14:30",
				"region"=>"กลาง",
				"province"=>"สระบุรี",
				"place_news"=>"สระบุรี",
				"qty"=>"10",
				),
			array(
				"no"=>"1",
				"news_date"=>"03/02/2557 14:30",
				"region"=>"กลาง",
				"province"=>"สระบุรี",
				"place_news"=>"สระบุรี",
				"qty"=>"10",
				),
			array(
				"no"=>"1",
				"news_date"=>"03/02/2557 14:30",
				"region"=>"กลาง",
				"province"=>"สระบุรี",
				"place_news"=>"สระบุรี",
				"qty"=>"10",
				),
			array(
				"no"=>"1",
				"news_date"=>"03/02/2557 14:30",
				"region"=>"กลาง",
				"province"=>"สระบุรี",
				"place_news"=>"สระบุรี",
				"qty"=>"10",
				)
			
			);

		$this->ait->pagination($result_array,"placenews/datalist/",$page);
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
				"news_date"=>"03/02/2557 14:30",
				"region"=>"กลาง",
				"province"=>"สระบุรี",
				"place_news"=>"สระบุรี",
				"qty"=>"10",
				),
			array(
				"no"=>"1",
				"news_date"=>"03/02/2557 14:30",
				"region"=>"กลาง",
				"province"=>"สระบุรี",
				"place_news"=>"สระบุรี",
				"qty"=>"10",
				),
			array(
				"no"=>"1",
				"news_date"=>"03/02/2557 14:30",
				"region"=>"กลาง",
				"province"=>"สระบุรี",
				"place_news"=>"สระบุรี",
				"qty"=>"10",
				),
			array(
				"no"=>"1",
				"news_date"=>"03/02/2557 14:30",
				"region"=>"กลาง",
				"province"=>"สระบุรี",
				"place_news"=>"สระบุรี",
				"qty"=>"10",
				)
			
			);

		$this->ait->pagination($result_array,"placenews/search/",$page);
		$this->ait->parseData +=  array(
					// Language
			"result_array" => $result_array,
			"count_row"=>count($result_array)
			); 

		$this->init();
	}
}