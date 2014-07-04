<?php
/*=======================================================================
* TODO : Exchange Controller รายงานสรุปการแลกเปลี่ยนข่าวกับหน่วยงานและองกรค์
* Filename: controllers/Exchange.php
* Auther: Mr.Boripat@ait
* Modify: 6/9/2014
*======================================================================*/
if (!defined('BASEPATH'))
    exit ('No direct script access allowed');

class Exchange extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->language("exchange", "thai");

        $this->load->model(array("issue_model", "user_model", "province_model", "news_model", "news_type_model", "department_model", "region_model", "publicType_model"));
        $this->ait->parseData += array(
            "report_name" => $this->lang->line('summary_exchange_news'),
            "lbl_date" => $this->lang->line('lbl_date'),
            "lbl_category" => $this->lang->line('lbl_category'),
            "lbl_sub_category" => $this->lang->line('lbl_sub_category'),
            "lbl_group" => $this->lang->line('lbl_group'),
            "lbl_organize" => $this->lang->line('lbl_organize'),
            "lbl_region" => $this->lang->line('lbl_region'),
            "lbl_province" => $this->lang->line('lbl_province'),
            "lbl_news_qty" => $this->lang->line('lbl_news_qty'),
            "lbl_news_topic" => $this->lang->line('lbl_news_topic'),
            "lbl_reporter" => $this->lang->line('lbl_reporter'),
            "lbl_news_title" => $this->lang->line('lbl_news_title'),
            "lbl_news_status" => $this->lang->line('lbl_news_status'),
            "lbl_news_read" => $this->lang->line('lbl_news_read')
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
        $this->parser->parse("summary_exchange_news", $this->ait->parseData);
    }

    /*-----------------------------------------------------------------
    * TODO : Data list
    * @agument: $page : is a current page active.
    * @return: 	setter Array data in Variable $data.
    *-----------------------------------------------------------------*/
    public function datalist($page = 1)
    {
        $row_per_page = 20;

        //Include Model
        $newsType = $this->news_type_model;
        $dept = $this->department_model;
        $region = $this->region_model;
        $pubType = $this->publicType_model;
        $users = $this->user_model;
        $news = $this->news_model;

        $newsType_list = $newsType->findAll();
        $parentDepartment_list = $dept->findParentDepartment();
        $region_list = $region->findAll();
        $publicType_list = $pubType->findAll();
        $user_list = $users->findAll();


        //=================================================================================
        $news->setCurrentPage(1);
        $news->setPageRow(20);
        $news->setPubTypeId("11");

        $news_list = $news->findByPubTypeId($page, $row_per_page);
        $count_row = $news->countAllByPubTypeId();
        //=================================================================================

        $this->ait->pagination($count_row, "exchange/datalist/", $page, $row_per_page);

        $this->ait->parseData += array(
            "newsType_list" => $newsType_list,
            "parentDepartment_list" => $parentDepartment_list,
            "region_list" => $region_list,
            "publicType_list" => $publicType_list,
            "user_list" => $user_list,
            "news_list" => $news_list,
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
        $newsTypes = $this->news_type_model;
        $row_per_page = 20;

        //Include Model
        $newsType = $this->news_type_model;
        $dept = $this->department_model;
        $region = $this->region_model;
        $pubType = $this->publicType_model;
        $users = $this->user_model;
        $news = $this->news_model;

        $newsType_list = $newsType->findAll();
        $parentDepartment_list = $dept->findParentDepartment();
        $region_list = $region->findAll();
        $publicType_list = $pubType->findAll();
        $user_list = $users->findAll();

        if (isset($_POST['start_date'])) {
            $news->setStartDate($_POST['start_date']);
        }
        if (isset($_POST['end_date'])) {
            $news->setEndDate($_POST['end_date']);
        }
        if (isset($_POST['newsType'])) {
            $news->setNewsTypeId($_POST['newsType']);
        }
        if (isset($_POST['region'])) {
            $news->setRegionId($_POST['region']);
            if (isset($_POST['news_sub_type'])) {
                $news->setSubNewsTypeId($_POST['news_sub_type']);
            }
        }
        if (isset($_POST['department'])) {
            echo $_POST['department'];

            $news->setParentDepartmentId($_POST['department']);
            if (isset($_POST['sub_department'])) {
                $news->setDepartmentId($_POST['sub_department']);
            }
        }
        if (isset($_POST['province'])) {
            $news->setProvinceId($_POST['province']);
        }
        if (isset($_POST['userId'])) {
            $news->setReporterId($_POST['userId']);
        }

        $newsSubType = array();
        if (isset($_POST['newsType'])) {
            $this->load->model("news_sub_type_model", "nstm");
            $this->nstm->setTypeId($_POST['newsType']);
            $newsSubType = $this->nstm->findByTypeID();
        }
        $subDepartment = array();
        if (isset($_POST['department'])) {
            $this->load->model("department_model", "dept");
            $this->dept->setParentDepartmentId($_POST['department']);
            $subDepartment = $this->dept->findChildDepartment();
        }
        $province = array();
        if (isset($_POST['region'])) {
            $this->load->model("province_model", "prov");
            $this->prov->setRegionId($_POST['region']);
            $province = $this->prov->findByRegionId();
        }
        //=================================================================================
        $news->setCurrentPage($page);
        $news->setPageRow($row_per_page);
        $news->setPubTypeId("11");
        $news_list = $news->findByPubTypeId();
        $count_row = $news->countAllByPubTypeId();
        //=================================================================================

        $this->ait->pagination($count_row, "exchange/search/", $page, $row_per_page);

        $this->ait->parseData += array(
            "newsType_list" => $newsType_list,
            "parentDepartment_list" => $parentDepartment_list,
            "region_list" => $region_list,
            "publicType_list" => $publicType_list,
            "user_list" => $user_list,
            "news_list" => $news_list,
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