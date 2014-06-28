<?php
/**
* TODO : Send News Controller รายงานสรุปการส่งข่าวเข้าระบบ
* Filename: controllers/Sendnews.php
* Auther: Mr.Boripat@ait
* Modify: 6/10/2014
*/
class Actorrelation extends CI_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->lang->load( 'actorrelation', 'thai' );
		$this->ait->parseData += array(
			"report_name"       => $this->lang->line( 'summary_actor_relation' ),
			"lbl_date"       => $this->lang->line( 'lbl_date' ),
			"lbl_region"    => $this->lang->line( 'lbl_region' ),
			"lbl_province"    => $this->lang->line( 'lbl_province' ),
			"lbl_actor"     => $this->lang->line( 'lbl_actor' ),
			"lbl_relate_word"      => $this->lang->line( 'lbl_relate_word' ),
			"lbl_using_qty"     => $this->lang->line( 'lbl_using_qty' )
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
		$this->parser->parse( "summary_actor_relation.html", $this->ait->parseData );
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
						"region"=>"ชื่อภูมิภาค",
						"province"=>"สระบุรี",
						"actor"=>"ประมวล มุ่งมาตร",
						"relate_word"=>"นักเรียน",
						"using_qty"=>"มงคล ขำเพชร"
				),
				array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"region"=>"ชื่อภูมิภาค",
						"province"=>"สระบุรี",
						"actor"=>"ประมวล มุ่งมาตร",
						"relate_word"=>"นักเรียน",
						"using_qty"=>"มงคล ขำเพชร"
				),
				array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"region"=>"ชื่อภูมิภาค",
						"province"=>"สระบุรี",
						"actor"=>"ประมวล มุ่งมาตร",
						"relate_word"=>"นักเรียน",
						"using_qty"=>"มงคล ขำเพชร"
				),
				array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"region"=>"ชื่อภูมิภาค",
						"province"=>"สระบุรี",
						"actor"=>"ประมวล มุ่งมาตร",
						"relate_word"=>"นักเรียน",
						"using_qty"=>"มงคล ขำเพชร"
				)
			
			);

		$this->ait->pagination($result_array,"actorrelation/datalist/",$page);
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
						"region"=>"ชื่อภูมิภาค",
						"province"=>"สระบุรี",
						"actor"=>"ประมวล มุ่งมาตร",
						"relate_word"=>"นักเรียน",
						"using_qty"=>"มงคล ขำเพชร"
			),
			array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"region"=>"ชื่อภูมิภาค",
						"province"=>"สระบุรี",
						"actor"=>"ประมวล มุ่งมาตร",
						"relate_word"=>"นักเรียน",
						"using_qty"=>"มงคล ขำเพชร"
			),
				array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"region"=>"ชื่อภูมิภาค",
						"province"=>"สระบุรี",
						"actor"=>"ประมวล มุ่งมาตร",
						"relate_word"=>"นักเรียน",
						"using_qty"=>"มงคล ขำเพชร"
				),
				array(
						"no"=>"1",
						"date"=>"03/02/2557",
						"region"=>"ชื่อภูมิภาค",
						"province"=>"สระบุรี",
						"actor"=>"ประมวล มุ่งมาตร",
						"relate_word"=>"นักเรียน",
						"using_qty"=>"มงคล ขำเพชร"
				)
			);

		$this->ait->pagination($result_array,"actorrelation/search/",$page);
		$this->ait->parseData +=  array(
					// Language
			"result_array" => $result_array,
			"count_row"=>count($result_array)
			); 

		$this->init();
	}
}