<?php
/**
 * TODO : Crossportal Controller สรุปสถิติการเข้าชมข่าว
 * Filename: controllers/Crossportal.php
 * Auther: Mr.Boripat@ait
 * Modify: 6/10/2014
 */
class Crossportal extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->lang->load('crossportal', 'thai');
        $this->load->model(array("user_model", "news_model", "news_type_model", "department_model", "region_model", "publicType_model"));
        $this->ait->parseData += array(
            "report_name" => $this->lang->line('summary_cross_portal'),
            "lbl_news_no" => $this->lang->line('lbl_news_no'),
            "lbl_news_topic" => $this->lang->line('lbl_news_topic'),
            "lbl_news_date" => $this->lang->line('lbl_news_date'),
            "lbl_news_ori" => $this->lang->line('lbl_news_ori'),
            "lbl_news_line" => $this->lang->line('lbl_news_line'),
            "lbl_news_by" => $this->lang->line('lbl_news_by'),

            "lbl_year" => $this->lang->line('lbl_year'),
            "lbl_month" => $this->lang->line('lbl_month'),
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
        $this->parser->parse("summary_cross_portal", $this->ait->parseData);
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

        $year_list = $this->news_model->getDistinctYear();

        $count_row = $this->department_model->count();

        //=================================================================================

        $this->ait->pagination($count_row, "crossportal/datalist/", $page, $row_per_page);

        $this->ait->parseData += array(
            "newsType_list" => $newsType_list,
            "parentDepartment_list" => $parentDepartment_list,
            "region_list" => $region_list,
            "publicType_list" => $publicType_list,
            "user_list" => $user_list,
            "year_list" => $year_list,
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
        $row_per_page = 20;

        $newsType_list = $this->news_type_model->findAll();
        $parentDepartment_list = $this->department_model->findParentDepartment();
        $region_list = $this->region_model->findAll();
        $publicType_list = $this->publicType_model->findAll();
        $user_list = $this->user_model->findAll();



        if (isset($_POST['start_date'])) {
            $this->news_model->setStartDate($_POST['start_date']);
        }
        if (isset($_POST['end_date'])) {
            $this->news_model->setEndDate($_POST['end_date']);
        }
        if (isset($_POST['newsType'])) {
            $this->news_model->setNewsType($_POST['newsType']);
        }
        if (isset($_POST['region'])) {
            $this->news_model->setRegion($_POST['region']);
        }
        if (isset($_POST['news_sub_type'])) {
            $this->news_model->setSubNewsType($_POST['news_sub_type']);
        }
        if (isset($_POST['department'])) {
            $this->news_model->setDepartment($_POST['department']);
        }
        if (isset($_POST['sub_department'])) {
            $this->news_model->setSubDepartment($_POST['sub_department']);
        }
        if (isset($_POST['province'])) {
            $this->news_model->setProvince($_POST['province']);
        }
        if (isset($_POST['userId'])) {
            $this->news_model->setUserId($_POST['userId']);
        }

        $newsSubType = array();
        if (isset($_POST['newsType'])) {
            $this->load->model("news_sub_type_model", "nstm");
            $this->nstm->NT02_TypeID = $_POST['newsType'];
            $result = $this->nstm->findByTypeID();
            $newsSubType = $result;
        }
        $subDepartment = array();
        if (isset($_POST['department'])) {
            $this->load->model("department_model", "dept");
            $this->dept->SC07_ParentDepartmentId = $_POST['department'];
            $result = $this->dept->findChildDepartment();
            $subDepartment = $result;
        }
        $province = array();
        if (isset($_POST['region'])) {
            $this->load->model("province_model", "prov");
            $this->prov->CM05_RegionID = $_POST['region'];
            $result = $this->prov->findByRegionId();
            $province = $result;
        }

        //=================================================================================

        $year_list = $this->news_model->getDistinctYear();

        $count_row = $this->department_model->count();

        //=================================================================================

        $this->ait->pagination($count_row, "crossportal/datalist/", $page, $row_per_page);

        $this->ait->parseData += array(
            "newsType_list" => $newsType_list,
            "parentDepartment_list" => $parentDepartment_list,
            "region_list" => $region_list,
            "publicType_list" => $publicType_list,
            "user_list" => $user_list,
            "year_list" => $year_list,
            "count_row" => $count_row,
            "start_date" => isset($_POST['start_date'])?$_POST['start_date']:"",
            "end_date" => isset($_POST['end_date'])?$_POST['end_date']:"",
            "newsType" => isset($_POST['newsType'])?$_POST['newsType']:"",
            "region" => isset($_POST['region'])?$_POST['region']:"",
            "news_sub_type" => isset($_POST['news_sub_type'])?$_POST['news_sub_type']:"",
            "newsSubType" => $newsSubType,
            "department" => isset($_POST['department'])?$_POST['department']:"",
            "sub_department" => isset($_POST['sub_department'])?$_POST['sub_department']:"",
            "subDepartment" => $subDepartment,
            "province" => isset($_POST['province'])?$_POST['province']:"",
            "provinceList" => $province,
            "userId" => isset($_POST['userId'])?$_POST['userId']:""
        );
        $this->init();
    }
}