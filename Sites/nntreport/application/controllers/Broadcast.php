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

	public function index($page=1){
		$this->datalist($page);
	}

	/*-----------------------------------------------------------------
	* TODO : Initialize data 
	* @return: 	parser data to view/summary_broadcast_news.html template. 
	*-----------------------------------------------------------------*/
	public function init(){
		$this->load->view( "summary_broadcast_news", $this->ait->parseData );
	}
	
	/*-----------------------------------------------------------------
	* TODO : สรุปการเผยแพร่ข่าว
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
		
		$department_list = $this->department_model->findAll($page,$row_per_page);

		$count_row = $this->department_model->count(array("Y"));
		
		//=================================================================================

		$result_array = $this->news_model->findAll($page,$row_per_page);
		
		$this->ait->pagination($count_row,"broadcast/datalist/",$page,$row_per_page);
		
		$this->ait->parseData +=  array(
			"newsType_list"=>$newsType_list["result"],
			"parentDepartment_list"=>$parentDepartment_list['result'],
			"region_list"=>$region_list['result'],
			"publicType_list"=>$publicType_list['result'],
			"user_list"=>$user_list['result'],
			"department_list" => $department_list['result'],
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

	public function search($page=1){
		$row_per_page = 20;
		
		$newsType_list = $this->news_type_model->findAll(array("Y"));
		$parentDepartment_list = $this->department_model->findParentDepartment(array("Y"));
		$region_list = $this->region_model->findAll(array("Y"));
		$publicType_list = $this->publicType_model->findAll(array("Y"));
		$user_list = $this->user_model->findAll();

		$this->news_model->setStartDate($_POST['start_date']);
		$this->news_model->setEndDate($_POST['end_date']);
		$this->department_model->NT02_TypeID = $_POST['newsType'];
		$this->department_model->CM05_RegionID = $_POST['region'];
		$this->news_model->setSubNewsType($_POST['news_sub_type']);
		$this->department_model->SC07_ParentDepartmentId = $_POST['department'];
		$this->department_model->SC07_DepartmentId = $_POST['sub_department'];
		$this->department_model->CM06_ProvinceID = $_POST['province'];
		$this->department_model->NT01_ReporterID = $_POST['userId'];
		

		$count_row = $this->department_model->count(array("Y"));

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
		
		$department_list = $this->department_model->findAll($page,$row_per_page);
		
		$this->ait->pagination($count_row,"broadcast/search/",$page,$row_per_page);
		$this->ait->parseData +=  array(
			"newsType_list"=>$newsType_list["result"],
			"parentDepartment_list"=>$parentDepartment_list['result'],
			"region_list"=>$region_list['result'],
			"user_list"=>$user_list['result'],
			"department_list" => $department_list['result'],
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
			"publicType_list"=>$publicType_list['result']
		); 
		$this->init();
	}
	
	function ajaxNewssubtype($typeId) {
		$this->load->model("news_sub_type_model","nstm");
		$this->nstm->NT02_TypeID = $typeId;
		$result = $this->nstm->findByTypeID(array("Y"));
		$optionString = "<option value='0'>".$this->lang->line( 'default_select' ).$this->lang->line( 'domain_sub_news_category' )."</option>";
		foreach($result['result'] as $val){
			$optionString .="<option value='".$val->NT03_SubTypeID."'>".$val->NT03_SubTypeName."</option>";
		}
		echo $optionString;
	}
	
	function ajaxDepartment($deptId){
		$this->load->model("department_model","dept");
		$this->dept->SC07_ParentDepartmentId = $deptId;
		$result = $this->dept->findChildDepartment(array("Y"));
		$optionString = "<option value='0'>".$this->lang->line( 'default_select' ).$this->lang->line( 'domain_organize' )."</option>";
		foreach($result['result'] as $val){
			$optionString .="<option value='".$val->SC07_DepartmentId."'>".$val->SC07_DepartmentName."</option>";
		}
		echo $optionString;
	}
	
	function ajaxRegion($regionId){
		$this->load->model("province_model","prov");
		$this->prov->CM05_RegionID = $regionId;
		$result = $this->prov->findByRegionId(array("Y"));
		$optionString = "<option value='0'>".$this->lang->line( 'default_select' ).$this->lang->line( 'domain_province' )."</option>";
		foreach($result['result'] as $val){
			$optionString .="<option value='".$val->CM06_ProvinceID."'>".$val->CM06_ProvinceName."</option>";
		}
		echo $optionString;
	}
	
	function export_excel($page=1){
		
		$this->news_model->setStartDate($_POST['start_date']);
		$this->news_model->setEndDate($_POST['end_date']);
		$this->news_model->setNewsType($_POST['newsType']);
		$this->news_model->setRegion($_POST['region']);
		$this->news_model->setSubNewsType($_POST['news_sub_type']);
		$this->news_model->setDepartment($_POST['department']);
		$this->news_model->setSubDepartment($_POST['sub_department']);
		$this->news_model->setProvince($_POST['province']);
		$this->news_model->setUserId($_POST['userId']);
		
		$count_row = $this->news_model->countBy();
		
		$result_array = $this->news_model->search($page,$count_row);
		$data = array(
			"result" =>$result_array['result']
		);
			
		$this->load->view("summary_broadcast_excel",$data);
	}
	
	function export_pdf($page=1){
		
		$this->news_model->setStartDate($_POST['start_date']);
		$this->news_model->setEndDate($_POST['end_date']);
		$this->news_model->setNewsType($_POST['newsType']);
		$this->news_model->setRegion($_POST['region']);
		$this->news_model->setSubNewsType($_POST['news_sub_type']);
		$this->news_model->setDepartment($_POST['department']);
		$this->news_model->setSubDepartment($_POST['sub_department']);
		$this->news_model->setProvince($_POST['province']);
		$this->news_model->setUserId($_POST['userId']);
		
		$count_row = $this->news_model->countBy();
		
		$result_array = $this->news_model->search($page,$count_row);
		$data = array(
			"result" =>$result_array['result'],
			"count" =>$result_array['num_row']
		);
			
		$this->load->view("summary_broadcast_pdf",$data);
	}

	function generateChart($page=1){

		$this->news_model->setStartDate($_POST['start_date']);
		$this->news_model->setEndDate($_POST['end_date']);
		$this->news_model->setNewsType($_POST['newsType']);
		$this->news_model->setRegion($_POST['region']);
		$this->news_model->setSubNewsType($_POST['news_sub_type']);
		$this->news_model->setDepartment($_POST['department']);
		$this->news_model->setSubDepartment($_POST['sub_department']);
		$this->news_model->setProvince($_POST['province']);
		$this->news_model->setUserId($_POST['userId']);
		$data =  $this->ait->parseData;

		$chartType = $_POST["chartType"];
		if($chartType=="1"){
			$newsType = $this->news_type_model->findAll(array("Y"));
			$data['task'] = $newsType["result"];
			$qty = array();
			foreach ($newsType['result'] as $val) {
				$count = $this->news_model->countByNewsType($val->NT02_TypeID);
				array_push($qty, $count);
			}
			$data['qty'] = $qty;
		}
		$count_row = $this->news_model->countBy();
		
		$result_array = $this->news_model->search($page,$count_row);
		$this->ait->parseData +=  array(
			"result" =>$result_array['result'],
			"count" =>$result_array['num_row']
		);
		$this->load->view("summary_broadcast_chart",$data);
	}

}