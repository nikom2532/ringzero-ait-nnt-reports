<?php
/*=======================================================================
* TODO : Viewstat Controller เปรียบเทียบการใช้ช่องทางเผยแพร่
* Filename: controllers/Viewstat.php
* Auther: Mr.Boripat@ait
* Modify: 6/10/2014
*======================================================================*/
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Viewstat extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->lang->load('viewstat', 'thai');
        $this->load->model(array("user_model", "news_model", "news_type_model", "department_model", "region_model", "publicType_model"));
        $this->ait->parseData += array(
            "report_name" => $this->lang->line('summary_view_stat_news'),
            "lbl_news_no" => $this->lang->line('lbl_news_no'),
            "lbl_news_topic" => $this->lang->line('lbl_news_topic'),
            "lbl_news_date" => $this->lang->line('lbl_news_date'),
            "lbl_news_ori" => $this->lang->line('lbl_news_ori'),
            "lbl_news_line" => $this->lang->line('lbl_news_line'),
            "lbl_news_by" => $this->lang->line('lbl_news_by'),

            "lbl_department" => $this->lang->line('lbl_department'),
            "lbl_rawnews" => $this->lang->line('lbl_rawnews'),
            "lbl_thainews" => $this->lang->line('lbl_thainews'),
            "lbl_sharing" => $this->lang->line('lbl_sharing'),
            "lbl_ios" => $this->lang->line('lbl_ios'),
            "lbl_android" => $this->lang->line('lbl_android'),
            "lbl_blackberry" => $this->lang->line('lbl_blackberry'),
            "lbl_win8" => $this->lang->line('lbl_win8'),
            "lbl_smartTV" => $this->lang->line('lbl_smartTV'),
            "lbl_facebook" => $this->lang->line('lbl_facebook'),
            "lbl_twitter" => $this->lang->line('lbl_twitter'),
            "lbl_email" => $this->lang->line('lbl_email'),
            "lbl_rss" => $this->lang->line('lbl_rss'),
            "lbl_rawnews_public" => $this->lang->line('lbl_rawnews_public'),
            "lbl_rawnews_no_public" => $this->lang->line('lbl_rawnews_no_public')
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
        $this->parser->parse("summary_view_stat_news", $this->ait->parseData);
    }

    /*-----------------------------------------------------------------
    * TODO : Data List
    * @agument: $page : is a current page active.
    * @return: 	setter Array data in Variable $data.
    *-----------------------------------------------------------------*/
    public function datalist($page = 1)
    {
        // Samples data
        $row_per_page = 20;

        $newsType_list = $this->news_type_model->findAll();
        $parentDepartment_list = $this->department_model->findParentDepartment();
        $region_list = $this->region_model->findAll();
        $publicType_list = $this->publicType_model->findAll();
        $user_list = $this->user_model->findAll();

        //=================================================================================

        $department_list = $this->department_model->findAll($page, $row_per_page);

        $count_row = $this->department_model->count();

        //=================================================================================

        $this->ait->pagination($count_row, "broadcast/datalist/", $page, $row_per_page);

        $this->ait->parseData += array(
            "newsType_list" => $newsType_list,
            "parentDepartment_list" => $parentDepartment_list,
            "region_list" => $region_list,
            "publicType_list" => $publicType_list,
            "user_list" => $user_list,
            "department_list" => $department_list,
            "count_row" => $count_row,
            "start_date" => "",
            "end_date" => "",
            "newsType" => "",
            "region" => "",
            "news_sub_type" => "",
            "department" => "",
            "sub_department" => "",
            "province" => "",
            "userId" => ""
        );
        $this->init();
    }

    /*/*-----------------------------------------------------------------
    * TODO : Search
    * @agument: $page : is a current page active.
    * @return: 	setter Array data in Variable $data.
    *-----------------------------------------------------------------*/
    public function search($page = 1)
    {
        // Samples data
        $result_array = array(
            array(
                "no" => "1",
                "news_id" => "TNOHT5702030010087",
                "news_topic" => "เกษตรกรชาวนามรวมตัวปิดถนนเพชรเกษมรอยต่อจังหวัดเพชรบุรี",
                "news_date" => "03/02/2557 14:30",
                "news_ori" => "ประมวล มุ่งมาตร",
                "news_line" => "อื่นๆ",
                "news_by" => "มงคล ขำเพชร"
            ),
            array(
                "no" => "2", "news_id" => "TNOHT5702030010088",
                "news_topic" => "อปท.จังหวัดสรีสะเกษมอบเงิสนับสนุนการแข่งขันกีฬาเยาวชนแห่งชาติจำนวน 6 ล้านบาท",
                "news_date" => "03/02/2557 14:30",
                "news_ori" => "ประมวล มุ่งมาตร",
                "news_line" => "อื่นๆ",
                "news_by" => "มงคล ขำเพชร"
            ),
            array(
                "no" => "3", "news_id" => "TNOHT5702030010087",
                "news_topic" => "เกษตรกรชาวนามรวมตัวปิดถนนเพชรเกษมรอยต่อจังหวัดเพชรบุรี",
                "news_date" => "03/02/2557 14:30",
                "news_ori" => "ประมวล มุ่งมาตร",
                "news_line" => "อื่นๆ",
                "news_by" => "มงคล ขำเพชร"
            ),
            array(
                "no" => "4", "news_id" => "TNOHT5702030010088",
                "news_topic" => "อปท.จังหวัดสรีสะเกษมอบเงิสนับสนุนการแข่งขันกีฬาเยาวชนแห่งชาติจำนวน 6 ล้านบาท",
                "news_date" => "03/02/2557 14:30",
                "news_ori" => "ประมวล มุ่งมาตร",
                "news_line" => "อื่นๆ",
                "news_by" => "มงคล ขำเพชร"
            )

        );

        $this->ait->pagination($result_array, "viewstat/search/", $page);
        $this->ait->parseData += array(
            // Language
            "result_array" => $result_array,
            "count_row" => count($result_array)
        );

        $this->init();
    }
}