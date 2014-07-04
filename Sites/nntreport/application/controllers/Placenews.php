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
	$this->load->model(array("user_model","news_model","department_model","region_model","province_model"));
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
		$this->parser->parse( "summary_place_news", $this->ait->parseData );
	}
	
	/*-----------------------------------------------------------------
	* TODO : Data List
	* @agument: $page : is a current page active.
	* @return: 	setter Array data in Variable $data. 
	*-----------------------------------------------------------------*/
	public function datalist($page=1) {
		// Samples data
		$row_per_page = 20;
		$region_list = $this->region_model->findAll(array("Y"));
		$publicType_list = $this->publicType_model->findAll(array("Y"));

		//=================================================================================
		
		$result_array = $this->news_model->findAllDistinctDay($page,$row_per_page);
		$count_row = $this->news_model->countAllDistinctDay();
		
		//=================================================================================
		
		$this->ait->pagination($count_row,"placenews/datalist/",$page,$row_per_page);
		
		$this->ait->parseData +=  array(
			"region_list"=>$region_list['result'],
			"result_array" => $result_array['result'],
			"count_row"=>$count_row,
			"start_date"=>"",
			"end_date"=>"",
			"region"=>"",
			"province"=>""
			); 
		$this->init();
	}

	/*/*-----------------------------------------------------------------
	* TODO : Search
	* @agument: $page : is a current page active.
	* @return: 	setter Array data in Variable $data. 
	*-----------------------------------------------------------------*/
	public function search($page=1){
		$row_per_page = 20;
		$region_list = $this->region_model->findAll(array("Y"));
		//=================================================================================
		
		$result_array = $this->news_model->findAllDistinctDay($page,$row_per_page);
		$count_row = $this->news_model->countAllDistinctDay();
		
		//=================================================================================
		
		$this->ait->pagination($count_row,"placenews/search/",$page,$row_per_page);
		
		$this->ait->parseData +=  array(
			"region_list"=>$region_list['result'],
			"result_array" => $result_array['result'],
			"count_row"=>$count_row,
			"start_date"=>"",
			"end_date"=>"",
			"region"=>"",
			"province"=>""
			); 
		$this->init();
	}
}