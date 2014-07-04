<?php
/*=======================================================================
* TODO : Broadcast Controller สรุปการเผยแพร่ข่าว
* Filename: controllers/Broadcase.php
* Auther: Mr.Boripat@ait
* Modify: 6/8/2014
*======================================================================*/
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Broadcast extends CI_Controller {
	function __construct() {
        parent::__construct();
		$this->lang->load( 'broadcast', 'thai' );
		$this->lang->load("common","thai");
        $this->load->model(array("user_model","news_model","news_type_model","department_model","region_model","publicType_model"));
		$this->ait->parseData+= array(
			"report_name" => $this->lang->line( 'summary_broadcast_news' ),
			"lbl_news_no" => $this->lang->line( 'lbl_news_no' ),
			"lbl_news_topic" => $this->lang->line( 'lbl_news_topic' ),
			"lbl_news_date" => $this->lang->line( 'lbl_news_date' ),
			"lbl_news_ori" => $this->lang->line( 'lbl_news_ori' ),
			"lbl_news_line" => $this->lang->line( 'lbl_news_line' ),
			"lbl_news_presenter" => $this->lang->line( 'lbl_news_presenter' ),
			"lbl_create_chart"=>$this->lang->line('lbl_create_chart'),

			"lbl_department"    => $this->lang->line( 'lbl_department' ),
			"lbl_rawnews"    	=> $this->lang->line( 'lbl_rawnews' ),
			"lbl_thainews"     => $this->lang->line( 'lbl_thainews' ),
			"lbl_sharing"      => $this->lang->line( 'lbl_sharing' ),
			"lbl_ios"     		=> $this->lang->line( 'lbl_ios' ),
			"lbl_android"		=> $this->lang->line( 'lbl_android' ),
			"lbl_blackberry"    => $this->lang->line( 'lbl_blackberry' ),
			"lbl_win8"    		=> $this->lang->line( 'lbl_win8' ),
			"lbl_smartTV"     => $this->lang->line( 'lbl_smartTV' ),
			"lbl_facebook"      => $this->lang->line( 'lbl_facebook' ),
			"lbl_twitter"     		=> $this->lang->line( 'lbl_twitter' ),
			"lbl_email"		=> $this->lang->line( 'lbl_email' ),
			"lbl_rss"      => $this->lang->line( 'lbl_rss' ),
			"lbl_rawnews_public"     		=> $this->lang->line( 'lbl_rawnews_public' ),
			"lbl_rawnews_no_public"		=> $this->lang->line( 'lbl_rawnews_no_public' )
		);
		
	}

	function index($page=1){
		$this->datalist($page);
	}

	/*-----------------------------------------------------------------
	* TODO : Initialize data 
	* @return: 	parser data to view/summary_broadcast_news.html template. 
	*-----------------------------------------------------------------*/
	function init(){
		$this->load->view( "summary_broadcast_news", $this->ait->parseData );
	}
	
	/*-----------------------------------------------------------------
	* TODO : สรุปการเผยแพร่ข่าว
	* @agument: $page : is a current page active.
	* @return: 	setter Array data in Variable $data. 
	*-----------------------------------------------------------------*/
	function datalist($page=1) {
		$row_per_page = 20;
		// Include Library
		$ait = $this->ait;
		// Include Model
		$newsType = $this->news_type_model;
		$dept = $this->department_model;
		$region = $this->region_model;
		$publicType = $this->publicType_model;
		$users = $this->user_model;

		$newsType_list = $newsType->findAll();
		$parentDepartment_list = $dept->findParentDepartment();
		$region_list = $region->findAll();
		$publicType_list = $publicType->findAll();
		$user_list = $users->findAll();

		// Primary Data====================================================================
		$dept->setCurrentPage($page);
		$dept->setPageRow($row_per_page);
		$department_list = $dept->findAll();
		$count_row = $dept->count();		
		//=================================================================================
		
		$ait->pagination($count_row,"broadcast/datalist/",1,20);
		
		$this->ait->parseData +=  array(
			"newsType_list"=>$newsType_list,
			"parentDepartment_list"=>$parentDepartment_list,
			"region_list"=>$region_list,
			"publicType_list"=>$publicType_list,
			"user_list"=>$user_list,
			"department_list" => $department_list,
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

	/*-----------------------------------------------------------------
	* TODO : Search
	* @agument: $page : is a current page active.
	* @return: 	setter Array data in Variable $data. 
	*-----------------------------------------------------------------*/

	function search($page=1){
		$row_per_page = 20;
		// Include Library
		$ait = $this->ait;
		// Include Model
		$newsType = $this->news_type_model;
		$dept = $this->department_model;
		$region = $this->region_model;
		$publicType = $this->publicType_model;
		$news = $this->news_model;
		$users = $this->user_model;

		$newsType_list = $newsType->findAll();
		$parentDepartment_list = $dept->findParentDepartment();
		$region_list = $region->findAll();
		$publicType_list = $publicType->findAll();
		$user_list = $users->findAll();

		$news->setStartDate($_POST['start_date']);
		$news->setEndDate($_POST['end_date']);
		$news->setSubNewsTypeId($_POST['news_sub_type']);
		$news->setNewsTypeId($_POST['newsType']);
		$news->setRegionId($_POST['region']);
		$news->setParentDepartmentId($_POST['department']);
		$news->setDepartmentId($_POST['sub_department']);
		$news->setProvinceId($_POST['province']);
		$dept->setRegionId($_POST['region']);
		$dept->setParentDepartmentId($_POST['department']);
		$dept->setDepartmentId($_POST['sub_department']);
		$dept->setProvinceId($_POST['province']);
		$dept->setReporterId($_POST['userId']);
		
		$newsSubType = array();
		if($_POST['newsType']){
			$this->load->model("news_sub_type_model","nstm");
			$this->nstm->setTypeId($_POST['newsType']);
			$newsSubType = $this->nstm->findByTypeID();
		}
		$subDepartment = array();
		if($_POST['department']){
			$this->load->model("department_model","dept");
			$this->dept->setParentDepartmentId($_POST['department']);
			$subDepartment = $this->dept->findChildDepartment();
		}
		$province = array();
		if($_POST['region']){
			$this->load->model("province_model","prov");
			$this->prov->setRegionId($_POST['region']);
			$province = $this->prov->findByRegionId();
		}
		
		// Primary Data====================================================================
		$dept->setCurrentPage($page);
		$dept->setPageRow($row_per_page);
		$department_list = $dept->findAll();
		$count_row = $dept->count();		
		//=================================================================================
		
		$this->ait->pagination($count_row,"broadcast/search/",$page,$row_per_page);
		$this->ait->parseData +=  array(
			"newsType_list"=>$newsType_list,
			"parentDepartment_list"=>$parentDepartment_list,
			"region_list"=>$region_list,
			"user_list"=>$user_list,
			"department_list" => $department_list,
			"count_row"=>$count_row,
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
			"userId"=>$_POST['userId'],
			"publicType_list"=>$publicType_list
		); 
		$this->init();
	}
	
	function ajaxNewssubtype($typeId) {
		$this->load->model("news_sub_type_model","nstm");
		$this->nstm->setTypeId($typeId);
		$result = $this->nstm->findByTypeID();
		$optionString = "<option value='0'>".$this->lang->line( 'default_select' ).$this->lang->line( 'domain_sub_news_category' )."</option>";
		foreach($result as $val){
			$optionString .="<option value='".$val->subTypeId."'>".$val->subTypeName."</option>";
		}
		echo $optionString;
	}
	
	function ajaxDepartment($deptId){
		$this->load->model("department_model","dept");
		$this->dept->setParentDepartmentId($deptId);
		$result = $this->dept->findChildDepartment();
		$optionString = "<option value='0'>".$this->lang->line( 'default_select' ).$this->lang->line( 'domain_organize' )."</option>";
		foreach($result as $val){
			$optionString .="<option value='".$val->departmentId."'>".$val->departmentName."</option>";
		}
		echo $optionString;
	}
	
	function ajaxRegion($regionId){
		$this->load->model("province_model","prov");
		$this->prov->setRegionId($regionId);
		$result = $this->prov->findByRegionId();
		$optionString = "<option value='0'>".$this->lang->line( 'default_select' ).$this->lang->line( 'domain_province' )."</option>";
		foreach($result as $val){
			$optionString .="<option value='".$val->provinceId."'>".$val->provinceName."</option>";
		}
		echo $optionString;
	}
	
	function export_excel(){
		
		$ait = $this->ait;
		// Include Model
		$newsType = $this->news_type_model;
		$dept = $this->department_model;
		$region = $this->region_model;
		$publicType = $this->publicType_model;
		$news = $this->news_model;
		$users = $this->user_model;

		$news->setStartDate($_POST['start_date']);
		$news->setEndDate($_POST['end_date']);
		$news->setSubNewsTypeId($_POST['news_sub_type']);
		$news->setNewsTypeId($_POST['newsType']);
		$news->setRegionId($_POST['region']);
		$news->setParentDepartmentId($_POST['department']);
		$news->setDepartmentId($_POST['sub_department']);
		$news->setProvinceId($_POST['province']);

		$dept->setRegionId($_POST['region']);
		$dept->setParentDepartmentId($_POST['department']);
		$dept->setDepartmentId($_POST['sub_department']);
		$dept->setProvinceId($_POST['province']);
		$dept->setReporterId($_POST['userId']);
		
		//Primary Data====================================================================
		$dept->setCurrentPage(0);
		$department_list = $dept->findAll();
		//=================================================================================

		$data = array(
			"result" =>$department_list
		);
			
		$this->load->view("summary_broadcast_excel",$data);
	}
	
	function export_pdf($page=1){
		
		$ait = $this->ait;
		// Include Model
		$newsType = $this->news_type_model;
		$dept = $this->department_model;
		$region = $this->region_model;
		$publicType = $this->publicType_model;
		$news = $this->news_model;
		$users = $this->user_model;

		$news->setStartDate($_POST['start_date']);
		$news->setEndDate($_POST['end_date']);
		$news->setSubNewsTypeId($_POST['news_sub_type']);
		$news->setNewsTypeId($_POST['newsType']);
		$news->setRegionId($_POST['region']);
		$news->setParentDepartmentId($_POST['department']);
		$news->setDepartmentId($_POST['sub_department']);
		$news->setProvinceId($_POST['province']);

		$dept->setRegionId($_POST['region']);
		$dept->setParentDepartmentId($_POST['department']);
		$dept->setDepartmentId($_POST['sub_department']);
		$dept->setProvinceId($_POST['province']);
		$dept->setReporterId($_POST['userId']);
		
		//Primary Data====================================================================
		$dept->setCurrentPage(0);
		$department_list = $dept->findAll();
		//=================================================================================

		$data = array(
			"result" =>$department_list
		);
			
		$this->load->view("summary_broadcast_pdf",$data);
	}

	function export_word($page=1){

		$ait = $this->ait;
		// Include Model
		$newsType = $this->news_type_model;
		$dept = $this->department_model;
		$region = $this->region_model;
		$publicType = $this->publicType_model;
		$news = $this->news_model;
		$users = $this->user_model;

		$news->setStartDate($_POST['start_date']);
		$news->setEndDate($_POST['end_date']);
		$news->setSubNewsTypeId($_POST['news_sub_type']);
		$news->setNewsTypeId($_POST['newsType']);
		$news->setRegionId($_POST['region']);
		$news->setParentDepartmentId($_POST['department']);
		$news->setDepartmentId($_POST['sub_department']);
		$news->setProvinceId($_POST['province']);

		$dept->setRegionId($_POST['region']);
		$dept->setParentDepartmentId($_POST['department']);
		$dept->setDepartmentId($_POST['sub_department']);
		$dept->setProvinceId($_POST['province']);
		$dept->setReporterId($_POST['userId']);
		
		//Primary Data====================================================================
		$dept->setCurrentPage(0);
		$department_list = $dept->findAll();
		//=================================================================================

		$data = array(
			"result" =>$department_list
		);
			
		$this->load->view("summary_broadcast_word",$data);
	}

	function export_chart(){

		$ait = $this->ait;
		// Include Model
		$newsType = $this->news_type_model;
		$dept = $this->department_model;
		$region = $this->region_model;
		$publicType = $this->publicType_model;
		$news = $this->news_model;
		$users = $this->user_model;

		$news->setStartDate($_POST['start_date']);
		$news->setEndDate($_POST['end_date']);
		$news->setSubNewsTypeId($_POST['news_sub_type']);
		$news->setNewsTypeId($_POST['newsType']);
		$news->setRegionId($_POST['region']);
		$news->setParentDepartmentId($_POST['department']);
		$news->setDepartmentId($_POST['sub_department']);
		$news->setProvinceId($_POST['province']);

		$dept->setRegionId($_POST['region']);
		$dept->setParentDepartmentId($_POST['department']);
		$dept->setDepartmentId($_POST['sub_department']);
		$dept->setProvinceId($_POST['province']);
		$dept->setReporterId($_POST['userId']);
		
		//Primary Data====================================================================
		$dept->setCurrentPage(0);
		$department_list = $dept->findAll();
		//=================================================================================

		$data = array(
			"result" =>$department_list,
			"report_name" => $this->lang->line( 'summary_broadcast_news' ),
			"lbl_welcome" => $this->lang->line( 'lbl_welcome' ),
			"lbl_signout" => $this->lang->line( 'lbl_signout' )
		);
		$this->load->view("summary_broadcast_chart",$data);
	}

}