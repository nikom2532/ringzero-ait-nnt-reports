<?php
/**
* 
*/
class Memberqty extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->lang->load( 'memberqty', 'thai' );
		$this->load->model(array("user_model","news_model","province_model","news_type_model","department_model","region_model","publicType_model"));
		$this->ait->parseData += array(
			"report_name"       => $this->lang->line( 'summary_member_qty' ),
			"lbl_date_register"       => $this->lang->line( 'lbl_date_register' ),
			"lbl_username"    => $this->lang->line( 'lbl_username' ),
			"lbl_fullname"     => $this->lang->line( 'lbl_fullname' ),
			"lbl_region"      => $this->lang->line( 'lbl_region' ),
			"lbl_province"     => $this->lang->line( 'lbl_province' ),
			"lbl_group"=> $this->lang->line( 'lbl_group' ),
			"lbl_organize"=> $this->lang->line( 'lbl_organize' ),
			"lbl_type_position"=> $this->lang->line( 'lbl_type_position' ),
			"lbl_position"=> $this->lang->line( 'lbl_position' ),
			"lbl_working_status"=> $this->lang->line( 'lbl_working_status' )
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
		$this->parser->parse( "summary_member_qty", $this->ait->parseData );
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
		
		$result_array = $this->user_model->listAll($page,$row_per_page);
		$count_row = $this->user_model->countAll();
		
		//=================================================================================

		
		$this->ait->pagination($count_row,"memberqty/datalist/",$page,$row_per_page);
		
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
			"region"=>"",
			"department"=>"",
			"sub_department"=>"",
			"province"=>"",
			"status"=>""
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
		$row_per_page = 20;

		$parentDepartment_list = $this->department_model->findParentDepartment(array("Y"));
		$region_list = $this->region_model->findAll(array("Y"));
		$publicType_list = $this->publicType_model->findAll(array("Y"));
		$user_list = $this->user_model->findAll();

		$this->user_model->startDate= $_POST['start_date'];
		$this->user_model->endDate  =$_POST['end_date'];
		$this->user_model->SC07_ParentDepartmentId = $_POST['department'];
		$this->user_model->SC07_DepartmentId = $_POST['sub_department'];
		$this->user_model->CM05_RegionID = $_POST['region'];
		$this->user_model->CM06_ProvinceID = $_POST['province'];
		$this->user_model->SC03_Status = $_POST['status'];
		//=================================================================================
		
		$result_array = $this->user_model->listAll($page,$row_per_page);
		$count_row = $this->user_model->countAll();
		
		//=================================================================================
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
		
		$this->ait->pagination($count_row,"memberqty/search/",$page,$row_per_page);
		
		$this->ait->parseData +=  array(
			"parentDepartment_list"=>$parentDepartment_list['result'],
			"region_list"=>$region_list['result'],
			"publicType_list"=>$publicType_list['result'],
			"user_list"=>$user_list['result'],
			"result_array" => $result_array['result'],
			"count_row"=>$count_row,
			"start_date"=>$_POST['start_date'],
			"end_date"=>$_POST['end_date'],
			"department"=>$_POST['department'],
			"sub_department"=> $_POST['sub_department'],
			"subDepartment"=>$subDepartment,
			"region"=>$_POST['region'],
			"province"=>$_POST['province'],
			"provinceList"=>$province,
			"status"=> $_POST['status']
			); 
		$this->init();
	
	}


}