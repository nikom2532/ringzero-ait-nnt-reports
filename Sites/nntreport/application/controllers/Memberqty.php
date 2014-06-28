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
		$this->ait->parseData += array(
			"report_name"       => $this->lang->line( 'summary_member_qty' ),
			"lbl_username"       => $this->lang->line( 'lbl_username' ),
			"lbl_fullname"    => $this->lang->line( 'lbl_fullname' ),
			"lbl_date_register"     => $this->lang->line( 'lbl_date_register' ),
			"lbl_organize"      => $this->lang->line( 'lbl_organize' ),
			"lbl_province"     => $this->lang->line( 'lbl_province' ),
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
		$this->parser->parse( "summary_member_qty.html", $this->ait->parseData );
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
						"fullname"=>"พัฒน์ - สหายส",
						"date_register"=>"03/02/2013",
						"organize"=>"หน่วยงาน(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"working_status"=>"ยกเลิกการใช้งาน"
				),
				array(
						"no"=>"1",
						"username"=>"zeekun",
						"fullname"=>"พัฒน์ - สหายส",
						"date_register"=>"03/02/2013",
						"organize"=>"หน่วยงาน(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"working_status"=>"ยกเลิกการใช้งาน"
				),
				array(
						"no"=>"1",
						"username"=>"zeekun",
						"fullname"=>"พัฒน์ - สหายส",
						"date_register"=>"03/02/2013",
						"organize"=>"หน่วยงาน(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"working_status"=>"ยกเลิกการใช้งาน"
				),
				array(
						"no"=>"1",
						"username"=>"zeekun",
						"fullname"=>"พัฒน์ - สหายส",
						"date_register"=>"03/02/2013",
						"organize"=>"หน่วยงาน(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"working_status"=>"ยกเลิกการใช้งาน"
				)
		);

		$this->ait->pagination($result_array,"memberqty/datalist/",$page);
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
						"fullname"=>"พัฒน์ - สหายส",
						"date_register"=>"03/02/2013",
						"organize"=>"หน่วยงาน(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"working_status"=>"ยกเลิกการใช้งาน"
				),
				array(
						"no"=>"1",
						"username"=>"zeekun",
						"fullname"=>"พัฒน์ - สหายส",
						"date_register"=>"03/02/2013",
						"organize"=>"หน่วยงาน(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"working_status"=>"ยกเลิกการใช้งาน"
				),
				array(
						"no"=>"1",
						"username"=>"zeekun",
						"fullname"=>"พัฒน์ - สหายส",
						"date_register"=>"03/02/2013",
						"organize"=>"หน่วยงาน(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"working_status"=>"ยกเลิกการใช้งาน"
				),
				array(
						"no"=>"1",
						"username"=>"zeekun",
						"fullname"=>"พัฒน์ - สหายส",
						"date_register"=>"03/02/2013",
						"organize"=>"หน่วยงาน(เครือข่าย)",
						"province"=>"กรุงเทพมหานคร",
						"working_status"=>"ยกเลิกการใช้งาน"
				)
				
		);

		$this->ait->pagination($result_array,"memberqty/search/",$page);
		$this->ait->parseData +=  array(
			// Language
			"result_array" => $result_array,
			"count_row"=>count($result_array)
		); 
				
		$this->init();
	}


}