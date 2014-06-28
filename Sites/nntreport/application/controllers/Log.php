<?php
/*=======================================================================
* TODO : Log Controller รายงานสรุปจำนวนผู้ใช้งานที่ Download ผ่านโปรแกรมประยุกต์
* Filename: controllers/Log.php
* Auther: Mr.Boripat@ait
* Modify: 6/11/2014
*======================================================================*/
if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );

class Log extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->lang->load( 'log', 'thai' );
		$this->ait->parseData += array(
			"report_name"   => $this->lang->line( 'summary_log' ),
			"lbl_username"  => $this->lang->line( 'lbl_username' ),
			"lbl_date"    	=> $this->lang->line( 'lbl_date' ),
			"lbl_fullname"  => $this->lang->line( 'lbl_fullname' ),
			"lbl_dept"      => $this->lang->line( 'lbl_dept' ),
			"lbl_province"  => $this->lang->line( 'lbl_province' ),
			"lbl_type"    	=> $this->lang->line( 'lbl_type' ),
			"lbl_login_time"=> $this->lang->line( 'lbl_login_time' ),
			"lbl_logout_time"=> $this->lang->line( 'lbl_logout_time' )
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
		$this->parser->parse( "summary_log.html", $this->ait->parseData );
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
						"username"=>"zeekun",
						"date"=>"03/02/2013",
						"fullname"=>"พัฒน์ - สหายส",
						"dept"=>"หน่วยงาน<br>(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"type"=>"ส่งข่าว",
						"login"=>"12.30",
						"logout"=>"12.36"
				),
				array(
						"no"=>"2",
						"username"=>"zeekun",
						"date"=>"03/02/2013",
						"fullname"=>"พัฒน์ - สหายส",
						"dept"=>"หน่วยงาน<br>(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"type"=>"ส่งข่าว",
						"login"=>"12.30",
						"logout"=>"12.36"
				),
				array(
						"no"=>"3",
						"username"=>"zeekun",
						"date"=>"03/02/2013",
						"fullname"=>"พัฒน์ - สหายส",
						"dept"=>"หน่วยงาน<br>(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"type"=>"ส่งข่าว",
						"login"=>"12.30",
						"logout"=>"12.36"
				),
				array(
						"no"=>"4",
						"username"=>"zeekun",
						"date"=>"03/02/2013",
						"fullname"=>"พัฒน์ - สหายส",
						"dept"=>"หน่วยงาน<br>(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"type"=>"ส่งข่าว",
						"login"=>"12.30",
						"logout"=>"12.36"
				)
				
		);

		$this->ait->pagination($result_array,"log/datalist/",$page);
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
						"username"=>"zeekun",
						"date"=>"03/02/2013",
						"fullname"=>"พัฒน์ - สหายส",
						"dept"=>"หน่วยงาน<br>(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"type"=>"ส่งข่าว",
						"login"=>"12.30",
						"logout"=>"12.36"
				),
				array(
						"no"=>"2",
						"username"=>"zeekun",
						"date"=>"03/02/2013",
						"fullname"=>"พัฒน์ - สหายส",
						"dept"=>"หน่วยงาน<br>(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"type"=>"ส่งข่าว",
						"login"=>"12.30",
						"logout"=>"12.36"
				),
				array(
						"no"=>"3",
						"username"=>"zeekun",
						"date"=>"03/02/2013",
						"fullname"=>"พัฒน์ - สหายส",
						"dept"=>"หน่วยงาน<br>(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"type"=>"ส่งข่าว",
						"login"=>"12.30",
						"logout"=>"12.36"
				),
				array(
						"no"=>"4",
						"username"=>"zeekun",
						"date"=>"03/02/2013",
						"fullname"=>"พัฒน์ - สหายส",
						"dept"=>"หน่วยงาน<br>(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"type"=>"ส่งข่าว",
						"login"=>"12.30",
						"logout"=>"12.36"
				)
		);

		$this->ait->pagination($result_array,"log/search/",$page);
		$this->ait->parseData +=  array(
			"result_array" => $result_array,
			"count_row"=>count($result_array)
		); 
				
		$this->init();
	}
}