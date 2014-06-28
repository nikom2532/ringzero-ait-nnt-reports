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
		$this->lang->load( 'sendnews', 'thai' );
		$this->ait->parseData += array(
			"report_name"       => $this->lang->line( 'summary_send_news' ),
			"lbl_news_no"       => $this->lang->line( 'lbl_news_no' ),
			"lbl_news_topic"    => $this->lang->line( 'lbl_news_topic' ),
			"lbl_news_date"    => $this->lang->line( 'lbl_news_date' ),
			"lbl_news_ori"     => $this->lang->line( 'lbl_news_ori' ),
			"lbl_news_line"      => $this->lang->line( 'lbl_news_line' ),
			"lbl_news_by"     => $this->lang->line( 'lbl_news_by' )
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
		$this->parser->parse( "summary_send_news.html", $this->ait->parseData );
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
						"news_id"=>"TNOHT5702030010087",
						"news_topic"=>"เกษตรกรชาวนามรวมตัวปิดถนนเพชรเกษมรอยต่อจังหวัดเพชรบุรี",
						"news_date"=>"03/02/2557 14:30",
						"news_ori"=>"ประมวล มุ่งมาตร",
						"news_line"=>"อื่นๆ",
						"news_by"=>"มงคล ขำเพชร"
				),
				array(
						"no"=>"2","news_id"=>"TNOHT5702030010088",
						"news_topic"=>"อปท.จังหวัดสรีสะเกษมอบเงิสนับสนุนการแข่งขันกีฬาเยาวชนแห่งชาติจำนวน 6 ล้านบาท",
						"news_date"=>"03/02/2557 14:30",
						"news_ori"=>"ประมวล มุ่งมาตร",
						"news_line"=>"อื่นๆ",
						"news_by"=>"มงคล ขำเพชร"
				),
				array(
						"no"=>"3","news_id"=>"TNOHT5702030010087",
						"news_topic"=>"เกษตรกรชาวนามรวมตัวปิดถนนเพชรเกษมรอยต่อจังหวัดเพชรบุรี",
						"news_date"=>"03/02/2557 14:30",
						"news_ori"=>"ประมวล มุ่งมาตร",
						"news_line"=>"อื่นๆ",
						"news_by"=>"มงคล ขำเพชร"
				),
				array(
						"no"=>"4","news_id"=>"TNOHT5702030010088",
						"news_topic"=>"อปท.จังหวัดสรีสะเกษมอบเงิสนับสนุนการแข่งขันกีฬาเยาวชนแห่งชาติจำนวน 6 ล้านบาท",
						"news_date"=>"03/02/2557 14:30",
						"news_ori"=>"ประมวล มุ่งมาตร",
						"news_line"=>"อื่นๆ",
						"news_by"=>"มงคล ขำเพชร"
				)
			
			);

		$this->ait->pagination($result_array,"sendnews/datalist/",$page);
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
						"news_id"=>"TNOHT5702030010087",
						"news_topic"=>"เกษตรกรชาวนามรวมตัวปิดถนนเพชรเกษมรอยต่อจังหวัดเพชรบุรี",
						"news_date"=>"03/02/2557 14:30",
						"news_ori"=>"ประมวล มุ่งมาตร",
						"news_line"=>"อื่นๆ",
						"news_by"=>"มงคล ขำเพชร"
				),
				array(
						"no"=>"2","news_id"=>"TNOHT5702030010088",
						"news_topic"=>"อปท.จังหวัดสรีสะเกษมอบเงิสนับสนุนการแข่งขันกีฬาเยาวชนแห่งชาติจำนวน 6 ล้านบาท",
						"news_date"=>"03/02/2557 14:30",
						"news_ori"=>"ประมวล มุ่งมาตร",
						"news_line"=>"อื่นๆ",
						"news_by"=>"มงคล ขำเพชร"
				),
				array(
						"no"=>"3","news_id"=>"TNOHT5702030010087",
						"news_topic"=>"เกษตรกรชาวนามรวมตัวปิดถนนเพชรเกษมรอยต่อจังหวัดเพชรบุรี",
						"news_date"=>"03/02/2557 14:30",
						"news_ori"=>"ประมวล มุ่งมาตร",
						"news_line"=>"อื่นๆ",
						"news_by"=>"มงคล ขำเพชร"
				),
				array(
						"no"=>"4","news_id"=>"TNOHT5702030010088",
						"news_topic"=>"อปท.จังหวัดสรีสะเกษมอบเงิสนับสนุนการแข่งขันกีฬาเยาวชนแห่งชาติจำนวน 6 ล้านบาท",
						"news_date"=>"03/02/2557 14:30",
						"news_ori"=>"ประมวล มุ่งมาตร",
						"news_line"=>"อื่นๆ",
						"news_by"=>"มงคล ขำเพชร"
				)
			
			);

		$this->ait->pagination($result_array,"sendnews/search/",$page);
		$this->ait->parseData +=  array(
					// Language
			"result_array" => $result_array,
			"count_row"=>count($result_array)
			); 

		$this->init();
	}
}