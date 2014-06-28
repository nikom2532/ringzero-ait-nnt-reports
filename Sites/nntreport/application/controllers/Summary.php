<?php

// No use.


if (! defined ( 'BASEPATH' ))
	exit ( 'No direct script access allowed' );
class Summary extends CI_Controller {
	var $data = array();
	
	function __construct() {
		parent::__construct();
	}
		
	/*-----------------------------------------------------------------
	* TODO : สรุปสถิติการเข้าชมข่าว
	* -----------------------------------------------------------------*/
	public function view_stat($page=1) {
		$result_array = array();
		$this->pagination($result_array,"summary/view_stat/",$page);
		$this->data +=  array(
				// Language
				"report_name" => $this->lang->line( 'summary_view_stat_news' ),
				// Data Table
				"result_array" => $result_array,
				"count_row"=>count($result_array)
		
		);
		$this->parser->parse( "summary_view_stat_news.html", $this->data );
	}
	
	/*-----------------------------------------------------------------
	* TODO : เปรียบเทียบการใช้ช่องทางเผยแพร่
	*-----------------------------------------------------------------*/
	public function cross_portal($page=1) {
		$result_array = array();
		$this->pagination($result_array,"summary/cross_portal/",$page);
		$this->data +=  array(
				// Language
				"report_name" => $this->lang->line( 'summary_cross_portal' ),
				// Data Table
				"result_array" => $result_array,
				"count_row"=>count($result_array)
		
		);
		$this->parser->parse( "summary_cross_portal.html", $this->data );
	}
	
	/*-----------------------------------------------------------------
	* TODO : สรุปจำนวนสมาชิกผู้ใช้งานระบบ
	*-----------------------------------------------------------------*/
	public function member_qty($page=1) {
		$result_array = array();
		$this->pagination($result_array,"summary/member_qty/",$page);
		$this->data +=  array(
				// Language
				"report_name" => $this->lang->line( 'summary_member_qty' ),
				// Data Table
				"result_array" => $result_array,
				"count_row"=>count($result_array)
		
		);
		$this->parser->parse( "summary_member_qty.html", $this->data );
	}
	
	/*-----------------------------------------------------------------
	* TODO : สรุปสถิติสถานที่เกิดข่าว
	*-----------------------------------------------------------------*/
	public function place_news($page=1) {
		$result_array = array();
		$this->pagination($result_array,"summary/place_news/",$page);
		$this->data +=  array(
				// Language
				"report_name" => $this->lang->line( 'summary_place_news' ),
				// Data Table
				"result_array" => $result_array,
				"count_row"=>count($result_array)
		
		);
		$this->parser->parse( "summary_place_news.html", $this->data );
	}
	
	/*-----------------------------------------------------------------
	* TODO : สรุปสถิติสถานที่เกิดข่าว
	*-----------------------------------------------------------------*/
	public function actor_news($page=1) {
		
		$result_array = array();
		$this->pagination($result_array,"summary/actor_news/",$page);
		$this->data +=  array(
				// Language
				"report_name" => $this->lang->line( 'summary_actor_news' ),
				"result_array" => $result_array,
				"count_row"=>count($result_array)
		);
		$this->parser->parse( "summary_actor_news.html", $this->data );
	}
	
	/*-----------------------------------------------------------------
	* TODO : รายงานสรุปการส่งข่าว
	*-----------------------------------------------------------------*/
	public function send_news($page=1) {
		
		$result_array = array();
		$this->pagination($result_array,"summary/send_news/",$page);
		$this->data +=  array(
				// Language
				"report_name" => $this->lang->line( 'summary_send_news' ),
				"result_array" => $result_array,
				"count_row"=>count($result_array)
		);
		$this->parser->parse( "summary_send_news.html", $this->data );
	}
	
	/*-----------------------------------------------------------------
	* TODO : วิเคราะห์ความเชื่อมโยงของบุคคลในข่าว
	*-----------------------------------------------------------------*/
	public function actor_relation($page=1) {
		
		$result_array = array();
		$this->pagination($result_array,"summary/actor_relation/",$page);
		$this->data +=  array(
				// Language
				"report_name" => $this->lang->line( 'summary_actor_relation' ),
				"result_array" => $result_array,
				"count_row"=>count($result_array)
		);
		$this->parser->parse( "summary_actor_relation.html", $this->data );
	}
	
	/*-----------------------------------------------------------------
	* TODO : สรุปผลการค้นหาข้อมูลผ่านระบบ
	*-----------------------------------------------------------------*/
	public function search_news($page=1) {
		$result_array = array();
		$this->pagination($result_array,"summary/search_news/",$page);
		$this->data +=  array(
				// Language
				"report_name" => $this->lang->line( 'summary_search_news' ),
				"result_array" => $result_array,
				"count_row"=>count($result_array)
		);
		$this->parser->parse( "summary_search_news.html", $this->data );
	}
	
	/*-----------------------------------------------------------------
	* TODO : รายงานสรุปจำนวนการส่งข่าว
	*-----------------------------------------------------------------*/
	public function sendnews_qty($page=1) {
		$result_array = array();
		$this->pagination($result_array,"summary/sendnews_qty/",$page);
		$this->data +=  array(
				// Language
				"report_name" => $this->lang->line( 'summary_sendnews_qty' ),
				"result_array" => $result_array,
				"count_row"=>count($result_array)
		);
		$this->parser->parse( "summary_sendnews_qty.html", $this->data );
	}
	
	/*-----------------------------------------------------------------
	* TODO : รายงานสรุปจำนวนผู้ใช้งานที่ Download ผ่านโปรแกรมประยุกต์
	*-----------------------------------------------------------------*/
	public function download($page=1) {
		$result_array = array();
		$this->pagination($result_array,"summary/download/",$page);
		$this->data +=  array(
				// Language
				"report_name" => $this->lang->line( 'summary_download' ),
				"result_array" => $result_array,
				"count_row"=>count($result_array)
		);
		$this->parser->parse( "summary_download.html", $this->data );
	}
	
	/*-----------------------------------------------------------------
	* TODO : รายงานสรุปการใช้งานระบบของเจ้าหน้าที่(Log File)
	*-----------------------------------------------------------------*/
	public function log($page=1) {
		$result_array = array();
		$this->pagination($result_array,"summary/log/",$page);
		$this->data +=  array(
				// Language
				"report_name" => $this->lang->line( 'summary_log' ),
				"result_array" => $result_array,
				"count_row"=>count($result_array)
		);
		$this->parser->parse( "summary_log.html", $this->data );
	}
	
	
}