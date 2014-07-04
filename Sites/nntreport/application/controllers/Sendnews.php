<?php
/**
* TODO : Send News Controller รายงานสรุปการส่งข่าวเข้าระบบ
* Filename: controllers/Sendnews.php
* Auther: Mr.Boripat@ait
* Modify: 6/10/2014
*/
class Sendnews extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model(array("user_model","news_model","news_sub_type_model","news_type_model","department_model","region_model","publicType_model"));
		$this->lang->load( 'sendnews', 'thai' );
		$this->ait->parseData += array(
			"report_name"       => $this->lang->line( 'summary_send_news' ),
			"lbl_date"       	=> $this->lang->line( 'lbl_date' ),
			"lbl_news_id"   	=> $this->lang->line( 'lbl_news_id' ),
			"lbl_news_title"    => $this->lang->line( 'lbl_news_title' ),
			"lbl_short_title"   => $this->lang->line( 'lbl_short_title' ),
			"lbl_news_type"     => $this->lang->line( 'lbl_news_type' ),
			"lbl_news_sub_type" => $this->lang->line( 'lbl_news_sub_type' ),
			"lbl_reporter"      => $this->lang->line( 'lbl_reporter' ),
			"lbl_authur"       	=> $this->lang->line( 'lbl_authur' ),
			"lbl_parent_department"    => $this->lang->line( 'lbl_parent_department' ),
			"lbl_department"    => $this->lang->line( 'lbl_department' ),
			"lbl_region"     	=> $this->lang->line( 'lbl_region' ),
			"lbl_province"      => $this->lang->line( 'lbl_province' ),
			"lbl_portal"     	=> $this->lang->line( 'lbl_portal' ),
			"lbl_status"     	=> $this->lang->line( 'lbl_status' )
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
		$this->parser->parse( "summary_send_news", $this->ait->parseData );
	}
	
	/*-----------------------------------------------------------------
	* TODO : Data List
	* @agument: $page : is a current page active.
	* @return: 	setter Array data in Variable $data. 
	*-----------------------------------------------------------------*/
	public function datalist($page=1) {
		// Samples data
		$row_per_page = 20;
		$newsType_list = $this->news_type_model->findAll(array("Y"));
		$parentDepartment_list = $this->department_model->findParentDepartment(array("Y"));
		$region_list = $this->region_model->findAll(array("Y"));
		$publicType_list = $this->publicType_model->findAll(array("Y"));
		$user_list = $this->user_model->findAll();
		//=================================================================================
		
		$result_array = $this->news_model->findAllStatus($page,$row_per_page);
		$count_row = $this->news_model->countAllDistinctDay();
		
		//=================================================================================
		
		$this->ait->pagination($count_row,"sendnews/datalist/",$page,$row_per_page);
		
		$this->ait->parseData +=  array(
			"newsType_list"=>$newsType_list["result"],
			"parentDepartment_list"=>$parentDepartment_list['result'],
			"region_list"=>$region_list['result'],
			"publicType_list"=>$publicType_list['result'],
			"user_list"=>$user_list['result'],
			"result_array" => $result_array['result'],
			"count_row"=>$count_row,
			"start_date"=>"",
			"end_date"=>"",
			"newsType"=>"",
			"region"=>"",
			"news_sub_type"=>"",
			"department"=>"",
			"sub_department"=>"",
			"province"=>"",
			"userId"=>""
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
		$newsType_list = $this->news_type_model->findAll(array("Y"));
		$parentDepartment_list = $this->department_model->findParentDepartment(array("Y"));
		$region_list = $this->region_model->findAll(array("Y"));
		$publicType_list = $this->publicType_model->findAll(array("Y"));
		$user_list = $this->user_model->findAll();
		//=================================================================================
		
		$result_array = $this->news_model->findAllStatus($page,$row_per_page);
		$count_row = $this->news_model->countAllDistinctDay();
		
		//=================================================================================
		
		$this->ait->pagination($count_row,"sendnews/datalist/",$page,$row_per_page);
		
		$this->ait->parseData +=  array(
			"newsType_list"=>$newsType_list["result"],
			"parentDepartment_list"=>$parentDepartment_list['result'],
			"region_list"=>$region_list['result'],
			"publicType_list"=>$publicType_list['result'],
			"user_list"=>$user_list['result'],
			"result_array" => $result_array['result'],
			"count_row"=>$count_row,
			"start_date"=>"",
			"end_date"=>"",
			"newsType"=>"",
			"region"=>"",
			"news_sub_type"=>"",
			"department"=>"",
			"sub_department"=>"",
			"province"=>"",
			"userId"=>""
			); 
		$this->init();
	}
}