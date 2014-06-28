<?php
/*=======================================================================
* TODO : Exchange Controller รายงานสรุปการแลกเปลี่ยนข่าวกับหน่วยงานและองกรค์
* Filename: controllers/Exchange.php
* Auther: Mr.Boripat@ait
* Modify: 6/9/2014
*======================================================================*/
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Exchange extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->language("exchange","thai");
		
		$this->load->model(array("province_model","news_model","news_type_model","department_model","region_model","publicType_model"));
		$this->ait->parseData +=  array(
			"report_name" => $this->lang->line( 'summary_exchange_news' ),
			"lbl_date" => $this->lang->line( 'lbl_date' ),
			"lbl_category" => $this->lang->line( 'lbl_category' ),
			"lbl_sub_category" => $this->lang->line( 'lbl_sub_category' ),
			"lbl_group" => $this->lang->line( 'lbl_group' ),
			"lbl_organize" => $this->lang->line( 'lbl_organize' ),
			"lbl_region" => $this->lang->line( 'lbl_region' ),
			"lbl_province" => $this->lang->line( 'lbl_province' ),
			"lbl_news_qty" => $this->lang->line( 'lbl_news_qty' )
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
		$this->parser->parse( "summary_exchange_news", $this->ait->parseData );
	}
	
	/*-----------------------------------------------------------------
	* TODO : Data list
	* @agument: $page : is a current page active.
	* @return: 	setter Array data in Variable $data. 
	*-----------------------------------------------------------------*/
	public function datalist($page=1) {
		// Samples data
		$row_per_page = 1;
		$resultDate = $this->news_model->getDistinctDate();
		$date_rs = $resultDate['result'];
		$last_date = $date_rs[0]->NT01_NewsDate;

		$department_arr = $this->department_model->findAll($page,$row_per_page);
		 $count_department = $this->department_model->countDapartment();

		$newsType_list = $this->news_type_model->findAll(array("Y"));
		// $newsType_pageing = $this->news_type_model->findAll_pageing($page,$row_per_page);


		$parentDepartment_list = $this->department_model->findParentDepartment(array("Y"));

		$region_list = $this->region_model->findAll(array("Y"));
		$publicType_list = $this->publicType_model->findAll(array("Y"));
		
		$count_row = $this->news_model->count();
		
		$result_array = $this->news_model->findAllGroupByDate($page,$row_per_page);
		
		$this->ait->pagination($count_department,"exchange/datalist/",$page,$row_per_page);

		$this->ait->parseData +=  array(
			"newsType_list"=>$newsType_list["result"],
			"parentDepartment_list"=>$parentDepartment_list['result'],
			"region_list"=>$region_list['result'],
			"resultDate_list" => $resultDate['result'],
			"publicType_list"=>$publicType_list['result'],
			"count_row"=>$resultDate['num_row'],
			"department_arr"=>$department_arr['result'],
			"start_date"=>"",
			"end_date"=>"",
			"newsType"=>"",
			"region"=>"",
			"news_sub_type"=>array(),
			"department"=>"",
			"sub_department"=>array(),
			"province"=>array()
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
		$row_per_page = 1;
		$resultDate = $this->news_model->getDistinctDate();
		$date_rs = $resultDate['result'];
		$last_date = $date_rs[0]->NT01_NewsDate;

		//Main
		$department_arr = $this->department_model->findAll($page,$row_per_page);
		
		$count_department = $this->department_model->countDapartment();

		$newsType_list = $this->news_type_model->findAll(array("Y"));
		// $newsType_pageing = $this->news_type_model->findAll_pageing($page,$row_per_page);


		$parentDepartment_list = $this->department_model->findParentDepartment(array("Y"));

		$region_list = $this->region_model->findAll(array("Y"));
		$publicType_list = $this->publicType_model->findAll(array("Y"));
		
		$count_row = $this->news_model->count();
		
		$result_array = $this->news_model->findAllGroupByDate($page,$row_per_page);
		

		$this->news_model->setStartDate($_POST['start_date']);
		$this->news_model->setEndDate($_POST['end_date']);
		$this->news_model->setNewsType($_POST['newsType']);
		$this->news_model->setRegion($_POST['region']);
		$this->news_model->setSubNewsType($_POST['news_sub_type']);
		$this->news_model->setDepartment($_POST['department']);
		$this->news_model->setSubDepartment($_POST['sub_department']);
		$this->news_model->setProvince($_POST['province']);
		
		$count_row = $this->news_model->countBy();
		
		$newsSubType = array();
		if($_POST['newsType']){
			$this->load->model("news_sub_type_model","nstm");
			$this->nstm->NT02_TypeID = $_POST['newsType'];
			$result = $this->nstm->findByTypeID(array("Y"));
			$newsSubType = $result['result'];	
		}
		$subDepartment = array();
		if($_POST['department']){
			$this->load->model("department_model","dept");
			$this->dept->SC07_ParentDepartmentId = $_POST['department'];
			$result = $this->dept->findChildDepartment(array("Y"));
			$subDepartment = $result['result'];
		}
		$province = array();
		if($_POST['region']){
			$this->load->model("province_model","prov");
			$this->prov->CM05_RegionID = $_POST['region'];
			$result = $this->prov->findByRegionId(array("Y"));
			$province = $result['result'];
		}


		$this->ait->pagination($count_department,"exchange/datalist/",$page,$row_per_page);

		$this->ait->parseData +=  array(
			"newsType_list"=>$newsType_list["result"],
			"parentDepartment_list"=>$parentDepartment_list['result'],
			"region_list"=>$region_list['result'],
			"resultDate_list" => $resultDate['result'],
			"publicType_list"=>$publicType_list['result'],
			"count_row"=>$resultDate['num_row'],
			"department_arr"=>$department_arr['result'],
			"start_date"=>$_POST['start_date'],
			"end_date"=>$_POST['end_date'],
			"newsType"=>$_POST['newsType'],
			"region"=>$_POST['region'],
			"news_sub_type"=>$_POST['news_sub_type'],
			"newsSubType"=>$newsSubType,
			"department"=>$_POST['department'],
			"sub_department"=>$_POST['sub_department'],
			"subDepartment"=>$subDepartment,
			"province"=>$_POST['province'],
			"provinceList"=>$province,
			"publicType_list"=>$publicType_list['result']
		); 
		$this->init();
	}
}