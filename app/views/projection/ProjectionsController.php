<?php
class ProjectionsController extends Controller
{
    public function beforeroute()
    {
        // check for user session
        if ($this->f3->get('SESSION.user[0]["usr_id"]') === null) {
            $this->f3->reroute('/login');
            exit;
        }

    }
    function list() {

        $this->f3->set('ShowNav', 'true');

        if ($this->f3->get('SESSION.user[0]["priv_admin"]') == 'Y') {
            $projections_prj = $this->db->exec('SELECT * FROM projections_prj');
        } else {
            $arr = $this->f3->get('SESSION.user[0]["projections_ids"]');
            $projections_prj = $this->db->exec('SELECT * FROM projections_prj WHERE prj_id IN (' . $arr . ')  ');

        }

        if (count($projections_prj)) {
            $this->f3->set('projections', $projections_prj);
            echo \Template::instance()->render('Projections_list.html');
        }

    }
    public function details4()
    {
        $this->f3->set('ShowNav', 'true');
        $projection_id = $this->f3->get('PARAMS.projection_id');
        $this->f3->set('id', $projection_id);
        if ($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y') {
            $projection = $this->db->exec('SELECT * FROM projections_prj WHERE prj_id =' . $projection_id);
        } else {
            $projection = $this->db->exec('SELECT * FROM projections_prj WHERE prj_id IN (' . $this->f3->get('SESSION.user[0]["projections_ids"]') . ') AND prj_id =' . $projection_id);
        }

        $this->f3->set('intro', $projection[0]['prj_intro']);
        $this->f3->set('comment', $projection[0]['prj_comment']);
        $this->f3->set('prj_cat', $projection[0]['prj_cat']);




        switch ($projection[0]['prj_cat']) {
            case 1:
                $this->f3->set('breadcrumb', 'التجميع');
                break;
            case 2:
                $this->f3->set('breadcrumb', 'فترات الثقة');
                break;
            case 3:
                $this->f3->set('breadcrumb', 'الانحدار');
                break;
            case 4:
                $this->f3->set('breadcrumb', 'الاحتمالات');
                break;
            case 5:
                $this->f3->set('breadcrumb', 'مستوى أداء المقاولين');
                break;
        }
        if ($projection_id == 27 or $projection_id == 17 or $projection_id == 37 or $projection_id == 38 or $projection_id == 39) {
            $contractors = $this->db->exec('SELECT cont_id,cont_name FROM contractors_cont');
            $this->f3->set('contractors', $contractors);

        }
        if ($projection_id == 43 or $projection_id == 44 or $projection_id == 45 or $projection_id == 46) {
            $areas = $this->db->exec('SELECT area_id,area_name FROM options_area');
            $this->f3->set('areas', $areas);
        }

        if ($projection != null and (in_array($projection_id, [43, 44, 45, 46]))) {
            $this->f3->set('proj_id', $projection_id);
            $path = 'r_json/proj_' . $projection_id . '.json';
            $file_content = json_decode($this->f3->read($path));
            $caption = $file_content->chart->caption;
            $dataset0_Name = $file_content->chart->xAxisName;
            $dataset1_Name = $file_content->dataset[0]->seriesname;

            $dataset0_value = $file_content->categories[0]->category;
            $dataset1_value = $file_content->dataset[0]->data;
            $this->f3->set('caption', $caption);
            $this->f3->set('dataset0_Name', $dataset0_Name);
            $this->f3->set('dataset1_Name', $dataset1_Name);

            $this->f3->set('dataset0_value', $dataset0_value);
            $this->f3->set('dataset1_value', $dataset1_value);
            $this->f3->set('count', count($dataset1_value));
            echo \Template::instance()->render('projection/Projections_14_details.html');
        } elseif ($projection != null and (in_array($projection_id, [4, 5, 6, 7, 8, 9, 10, 11, 12, 13]))) {

            $this->f3->set('proj_id', $projection_id);
            $path = 'r_json/proj_' . $projection_id . '.json';
            $file_content = json_decode($this->f3->read($path));
            $caption = $file_content->chart->caption;
            $dataset0_Name = $file_content->chart->xAxisName;
            $dataset1_Name = $file_content->dataset[0]->seriesname;
            $dataset2_Name = $file_content->dataset[1]->seriesname;
            $dataset3_Name = $file_content->dataset[2]->seriesname;
            $dataset0_value = $file_content->categories[0]->category;
            $dataset1_value = $file_content->dataset[0]->data;
            $dataset2_value = $file_content->dataset[1]->data;
            $dataset3_value = $file_content->dataset[2]->data;
            $this->f3->set('caption', $caption);
            $this->f3->set('dataset0_Name', $dataset0_Name);
            $this->f3->set('dataset1_Name', $dataset1_Name);
            $this->f3->set('dataset2_Name', $dataset2_Name);
            $this->f3->set('dataset3_Name', $dataset3_Name);
            $this->f3->set('dataset0_value', $dataset0_value);
            $this->f3->set('dataset1_value', $dataset1_value);
            $this->f3->set('dataset2_value', $dataset2_value);
            $this->f3->set('dataset3_value', $dataset3_value);
            $this->f3->set('count', count($dataset3_value));

            echo \Template::instance()->render('projection/Projections_details.html');
        } elseif ($projection != null and (in_array($projection_id, [22, 19, 21, 20, 1, 23, 24, 26, 25, 2, 27, 30, 29, 28, 3]))) {
            $this->f3->set('proj_root_id', $projection[0]['prj_root_id']);
            $path = 'r_json/proj_' . $projection_id . '.json';
            $file_content = json_decode($this->f3->read($path));
            $caption = $file_content->chart->caption;
            $dataset0_Name = $file_content->chart->xAxisName;
            $dataset1_Name = $file_content->dataset[0]->seriesname;
            $dataset2_Name = $file_content->dataset[1]->seriesname;
            $dataset3_Name = $file_content->dataset[2]->seriesname;

            $dataset0_value = $file_content->categories[0]->category;
            $dataset1_value = $file_content->dataset[0]->data;
            $dataset2_value = $file_content->dataset[1]->data;
            $dataset3_value = $file_content->dataset[2]->data;

            $this->f3->set('caption', $caption);
            $this->f3->set('dataset0_Name', $dataset0_Name);
            $this->f3->set('dataset1_Name', $dataset1_Name);
            $this->f3->set('dataset2_Name', $dataset2_Name);
            $this->f3->set('dataset3_Name', $dataset3_Name);
            $this->f3->set('dataset0_value', $dataset0_value);
            $this->f3->set('dataset1_value', $dataset1_value);
            $this->f3->set('dataset2_value', $dataset2_value);
            $this->f3->set('dataset3_value', $dataset3_value);
            $this->f3->set('count', count($dataset3_value));
            echo \Template::instance()->render('projection/Projections_1_details.html');
        } elseif ($projection != null and (in_array($projection_id, [15]))) {

            $this->f3->set('proj_id', $projection_id);
            $path = 'r_json/proj_' . $projection_id . '.json';
            $file_content = json_decode($this->f3->read($path));
            $caption = $file_content->chart->caption;
            $dataset0_Name = $file_content->chart->xAxisName;
            $dataset1_Name = $file_content->dataset[0]->seriesname;
            $dataset2_Name = $file_content->dataset[1]->seriesname;
            $dataset3_Name = $file_content->dataset[2]->seriesname;
            $dataset4_Name = $file_content->dataset[3]->seriesname;
            $dataset5_Name = $file_content->dataset[4]->seriesname;
            $dataset6_Name = $file_content->dataset[5]->seriesname;
            $dataset7_Name = $file_content->dataset[6]->seriesname;
            $dataset8_Name = $file_content->dataset[7]->seriesname;
            $dataset9_Name = $file_content->dataset[8]->seriesname;
            $dataset10_Name = $file_content->dataset[9]->seriesname;
            $dataset11_Name = $file_content->dataset[10]->seriesname;
            $dataset12_Name = $file_content->dataset[11]->seriesname;
            $dataset13_Name = $file_content->dataset[12]->seriesname;

            $dataset0_value = $file_content->categories[0]->category;
            $dataset1_value = $file_content->dataset[0]->data;
            $dataset2_value = $file_content->dataset[1]->data;
            $dataset3_value = $file_content->dataset[2]->data;
            $dataset4_value = $file_content->dataset[3]->data;
            $dataset5_value = $file_content->dataset[4]->data;
            $dataset6_value = $file_content->dataset[5]->data;
            $dataset7_value = $file_content->dataset[6]->data;
            $dataset8_value = $file_content->dataset[7]->data;
            $dataset9_value = $file_content->dataset[8]->data;
            $dataset10_value = $file_content->dataset[9]->data;
            $dataset11_value = $file_content->dataset[10]->data;
            $dataset12_value = $file_content->dataset[11]->data;
            $dataset13_value = $file_content->dataset[12]->data;

            $this->f3->set('caption', $caption);
            $this->f3->set('dataset0_Name', $dataset0_Name);
            $this->f3->set('dataset1_Name', $dataset1_Name);
            $this->f3->set('dataset2_Name', $dataset2_Name);
            $this->f3->set('dataset3_Name', $dataset3_Name);
            $this->f3->set('dataset4_Name', $dataset4_Name);
            $this->f3->set('dataset5_Name', $dataset5_Name);
            $this->f3->set('dataset6_Name', $dataset6_Name);
            $this->f3->set('dataset7_Name', $dataset7_Name);
            $this->f3->set('dataset8_Name', $dataset8_Name);
            $this->f3->set('dataset9_Name', $dataset9_Name);
            $this->f3->set('dataset10_Name', $dataset10_Name);
            $this->f3->set('dataset11_Name', $dataset11_Name);
            $this->f3->set('dataset12_Name', $dataset12_Name);
            $this->f3->set('dataset13_Name', $dataset13_Name);

            $this->f3->set('dataset0_value', $dataset0_value);
            $this->f3->set('dataset1_value', $dataset1_value);
            $this->f3->set('dataset2_value', $dataset2_value);
            $this->f3->set('dataset3_value', $dataset3_value);
            $this->f3->set('dataset4_value', $dataset4_value);
            $this->f3->set('dataset5_value', $dataset5_value);
            $this->f3->set('dataset6_value', $dataset6_value);
            $this->f3->set('dataset7_value', $dataset7_value);
            $this->f3->set('dataset8_value', $dataset8_value);
            $this->f3->set('dataset9_value', $dataset9_value);
            $this->f3->set('dataset10_value', $dataset10_value);
            $this->f3->set('dataset11_value', $dataset11_value);
            $this->f3->set('dataset12_value', $dataset12_value);
            $this->f3->set('dataset13_value', $dataset13_value);

            $this->f3->set('count', count($dataset2_value));

            echo \Template::instance()->render('projection/Projections_15_details.html');
        } elseif ($projection != null and (in_array($projection_id, [16, 17]))) {

            $this->f3->set('proj_id', $projection_id);
            $path = 'r_json/proj_' . $projection_id . '.json';
            $file_content = json_decode($this->f3->read($path));
            $caption = $file_content->chart->caption;
            $dataset0_Name = $file_content->chart->xAxisName;
            $dataset1_Name = $file_content->dataset[0]->seriesname;
            $dataset2_Name = $file_content->dataset[1]->seriesname;
            $dataset3_Name = $file_content->dataset[2]->seriesname;
            $dataset4_Name = $file_content->dataset[3]->seriesname;
            $dataset5_Name = $file_content->dataset[4]->seriesname;
            $dataset6_Name = $file_content->dataset[5]->seriesname;
            $dataset7_Name = $file_content->dataset[6]->seriesname;
            $dataset8_Name = $file_content->dataset[7]->seriesname;
            $dataset9_Name = $file_content->dataset[8]->seriesname;
            $dataset10_Name = $file_content->dataset[9]->seriesname;
            $dataset11_Name = $file_content->dataset[10]->seriesname;
            $dataset12_Name = $file_content->dataset[11]->seriesname;
            $dataset13_Name = $file_content->dataset[12]->seriesname;

            $dataset0_value = $file_content->categories[0]->category;
            $dataset1_value = $file_content->dataset[0]->data;
            $dataset2_value = $file_content->dataset[1]->data;
            $dataset3_value = $file_content->dataset[2]->data;
            $dataset4_value = $file_content->dataset[3]->data;
            $dataset5_value = $file_content->dataset[4]->data;
            $dataset6_value = $file_content->dataset[5]->data;
            $dataset7_value = $file_content->dataset[6]->data;
            $dataset8_value = $file_content->dataset[7]->data;
            $dataset9_value = $file_content->dataset[8]->data;
            $dataset10_value = $file_content->dataset[9]->data;
            $dataset11_value = $file_content->dataset[10]->data;
            $dataset12_value = $file_content->dataset[11]->data;
            $dataset13_value = $file_content->dataset[12]->data;

            $this->f3->set('caption', $caption);
            $this->f3->set('dataset0_Name', $dataset0_Name);
            $this->f3->set('dataset1_Name', $dataset1_Name);
            $this->f3->set('dataset2_Name', $dataset2_Name);
            $this->f3->set('dataset3_Name', $dataset3_Name);
            $this->f3->set('dataset4_Name', $dataset4_Name);
            $this->f3->set('dataset5_Name', $dataset5_Name);
            $this->f3->set('dataset6_Name', $dataset6_Name);
            $this->f3->set('dataset7_Name', $dataset7_Name);
            $this->f3->set('dataset8_Name', $dataset8_Name);
            $this->f3->set('dataset9_Name', $dataset9_Name);
            $this->f3->set('dataset10_Name', $dataset10_Name);
            $this->f3->set('dataset11_Name', $dataset11_Name);
            $this->f3->set('dataset12_Name', $dataset12_Name);
            $this->f3->set('dataset13_Name', $dataset13_Name);

            $this->f3->set('dataset0_value', $dataset0_value);
            $this->f3->set('dataset1_value', $dataset1_value);
            $this->f3->set('dataset2_value', $dataset2_value);
            $this->f3->set('dataset3_value', $dataset3_value);
            $this->f3->set('dataset4_value', $dataset4_value);
            $this->f3->set('dataset5_value', $dataset5_value);
            $this->f3->set('dataset6_value', $dataset6_value);
            $this->f3->set('dataset7_value', $dataset7_value);
            $this->f3->set('dataset8_value', $dataset8_value);
            $this->f3->set('dataset9_value', $dataset9_value);
            $this->f3->set('dataset10_value', $dataset10_value);
            $this->f3->set('dataset11_value', $dataset11_value);
            $this->f3->set('dataset12_value', $dataset12_value);
            $this->f3->set('dataset13_value', $dataset13_value);

            $this->f3->set('count', count($dataset2_value));

            echo \Template::instance()->render('projection/Projections_16_17details.html');
        } elseif ($projection != null and (in_array($projection_id, [18]))) {

            $this->f3->set('proj_id', $projection_id);
            $path = 'r_json/proj_' . $projection_id . '.json';
            $file_content = json_decode($this->f3->read($path));
            $caption = $file_content->chart->caption;

            $dataset0_Name = $file_content->chart->xAxisName;
            $dataset1_Name = $file_content->dataset[0]->seriesname;
            $dataset2_Name = $file_content->dataset[1]->seriesname;
            $dataset3_Name = $file_content->dataset[2]->seriesname;
            $dataset4_Name = $file_content->dataset[3]->seriesname;
            $dataset5_Name = $file_content->dataset[4]->seriesname;
            $dataset6_Name = $file_content->dataset[5]->seriesname;
            $dataset7_Name = $file_content->dataset[6]->seriesname;
            $dataset8_Name = $file_content->dataset[7]->seriesname;
            $dataset9_Name = $file_content->dataset[8]->seriesname;

            $dataset0_value = $file_content->categories[0]->category;
            $dataset1_value = $file_content->dataset[0]->data;
            $dataset2_value = $file_content->dataset[1]->data;
            $dataset3_value = $file_content->dataset[2]->data;
            $dataset4_value = $file_content->dataset[3]->data;
            $dataset5_value = $file_content->dataset[4]->data;
            $dataset6_value = $file_content->dataset[5]->data;
            $dataset7_value = $file_content->dataset[6]->data;
            $dataset8_value = $file_content->dataset[7]->data;
            $dataset9_value = $file_content->dataset[8]->data;

            $this->f3->set('caption', $caption);
            $this->f3->set('dataset0_Name', $dataset0_Name);
            $this->f3->set('dataset1_Name', $dataset1_Name);
            $this->f3->set('dataset2_Name', $dataset2_Name);
            $this->f3->set('dataset3_Name', $dataset3_Name);
            $this->f3->set('dataset4_Name', $dataset4_Name);
            $this->f3->set('dataset5_Name', $dataset5_Name);
            $this->f3->set('dataset6_Name', $dataset6_Name);
            $this->f3->set('dataset7_Name', $dataset7_Name);
            $this->f3->set('dataset8_Name', $dataset8_Name);
            $this->f3->set('dataset9_Name', $dataset9_Name);

            $this->f3->set('dataset0_value', $dataset0_value);
            $this->f3->set('dataset1_value', $dataset1_value);
            $this->f3->set('dataset2_value', $dataset2_value);
            $this->f3->set('dataset3_value', $dataset3_value);
            $this->f3->set('dataset4_value', $dataset4_value);
            $this->f3->set('dataset5_value', $dataset5_value);
            $this->f3->set('dataset6_value', $dataset6_value);
            $this->f3->set('dataset7_value', $dataset7_value);
            $this->f3->set('dataset8_value', $dataset8_value);
            $this->f3->set('dataset9_value', $dataset9_value);
            $this->f3->set('count', count($dataset3_value));

            echo \Template::instance()->render('projection/Projections_18_details.html');
        } elseif ($projection != null and (in_array($projection_id, [37, 38]))) {
            $this->f3->set('proj_id', $projection_id);
            $path = 'r_json/proj_' . $projection_id . '.json';
            $file_content = json_decode($this->f3->read($path));
            $caption = $file_content->chart->caption;
            $dataset0_Name = $file_content->chart->xAxisName;
            $dataset1_Name = $file_content->dataset[0]->seriesname;
            $dataset2_Name = $file_content->dataset[1]->seriesname;
            $dataset3_Name = $file_content->dataset[2]->seriesname;
            $dataset4_Name = $file_content->dataset[3]->seriesname;
            $dataset5_Name = $file_content->dataset[4]->seriesname;
            $dataset6_Name = $file_content->dataset[5]->seriesname;
            $dataset7_Name = $file_content->dataset[6]->seriesname;
            $dataset8_Name = $file_content->dataset[7]->seriesname;
            $dataset9_Name = $file_content->dataset[8]->seriesname;

            $dataset0_value = $file_content->categories[0]->category;
            $dataset1_value = $file_content->dataset[0]->data;
            $dataset2_value = $file_content->dataset[1]->data;
            $dataset3_value = $file_content->dataset[2]->data;
            $dataset4_value = $file_content->dataset[3]->data;
            $dataset5_value = $file_content->dataset[4]->data;
            $dataset6_value = $file_content->dataset[5]->data;
            $dataset7_value = $file_content->dataset[6]->data;
            $dataset8_value = $file_content->dataset[7]->data;
            $dataset9_value = $file_content->dataset[8]->data;

            $this->f3->set('id', $projection_id);
            $this->f3->set('caption', $caption);
            $this->f3->set('dataset0_Name', $dataset0_Name);
            $this->f3->set('dataset1_Name', $dataset1_Name);
            $this->f3->set('dataset2_Name', $dataset2_Name);
            $this->f3->set('dataset3_Name', $dataset3_Name);
            $this->f3->set('dataset4_Name', $dataset4_Name);
            $this->f3->set('dataset5_Name', $dataset5_Name);
            $this->f3->set('dataset6_Name', $dataset6_Name);
            $this->f3->set('dataset7_Name', $dataset7_Name);
            $this->f3->set('dataset8_Name', $dataset8_Name);
            $this->f3->set('dataset9_Name', $dataset9_Name);

            $this->f3->set('dataset0_value', $dataset0_value);
            $this->f3->set('dataset1_value', $dataset1_value);
            $this->f3->set('dataset2_value', $dataset2_value);
            $this->f3->set('dataset3_value', $dataset3_value);
            $this->f3->set('dataset4_value', $dataset4_value);
            $this->f3->set('dataset5_value', $dataset5_value);
            $this->f3->set('dataset6_value', $dataset6_value);
            $this->f3->set('dataset7_value', $dataset7_value);
            $this->f3->set('dataset8_value', $dataset8_value);
            $this->f3->set('dataset9_value', $dataset9_value);
            $this->f3->set('count', count($dataset3_value));

            echo \Template::instance()->render('projection/Projections_37_38details.html');
        } elseif ($projection != null and (in_array($projection_id, [39]))) {
            $this->f3->set('proj_id', $projection_id);
            $path = 'r_json/proj_40.json';
            $file_content = json_decode($this->f3->read($path));
            $caption = $file_content->chart->caption;

            $dataset1_Name = $file_content->dataset[0]->seriesname;
            $dataset2_Name = $file_content->dataset[1]->seriesname;
            $dataset3_Name = $file_content->dataset[2]->seriesname;
            $dataset4_Name = $file_content->dataset[3]->seriesname;
            $dataset5_Name = $file_content->dataset[4]->seriesname;
            $dataset6_Name = $file_content->dataset[5]->seriesname;
            $dataset7_Name = $file_content->dataset[6]->seriesname;
            $dataset8_Name = $file_content->dataset[7]->seriesname;
            $dataset9_Name = $file_content->dataset[8]->seriesname;

            $dataset1_value = $file_content->dataset[0]->data;
            $dataset2_value = $file_content->dataset[1]->data;
            $dataset3_value = $file_content->dataset[2]->data;
            $dataset4_value = $file_content->dataset[3]->data;
            $dataset5_value = $file_content->dataset[4]->data;
            $dataset6_value = $file_content->dataset[5]->data;
            $dataset7_value = $file_content->dataset[6]->data;
            $dataset8_value = $file_content->dataset[7]->data;
            $dataset9_value = $file_content->dataset[8]->data;

            $this->f3->set('id', $projection_id);
            $this->f3->set('caption', $caption);

            $this->f3->set('dataset1_Name', $dataset1_Name);
            $this->f3->set('dataset2_Name', $dataset2_Name);
            $this->f3->set('dataset3_Name', $dataset3_Name);
            $this->f3->set('dataset4_Name', $dataset4_Name);
            $this->f3->set('dataset5_Name', $dataset5_Name);
            $this->f3->set('dataset6_Name', $dataset6_Name);
            $this->f3->set('dataset7_Name', $dataset7_Name);
            $this->f3->set('dataset8_Name', $dataset8_Name);
            $this->f3->set('dataset9_Name', $dataset9_Name);

            $this->f3->set('dataset1_value', $dataset1_value);
            $this->f3->set('dataset2_value', $dataset2_value);
            $this->f3->set('dataset3_value', $dataset3_value);
            $this->f3->set('dataset4_value', $dataset4_value);
            $this->f3->set('dataset5_value', $dataset5_value);
            $this->f3->set('dataset6_value', $dataset6_value);
            $this->f3->set('dataset7_value', $dataset7_value);
            $this->f3->set('dataset8_value', $dataset8_value);
            $this->f3->set('dataset9_value', $dataset9_value);
            $this->f3->set('count', count($dataset3_value));

            echo \Template::instance()->render('projection/Projections_39details.html');
        } else {
            $this->f3->set('errorMessage', 'البيانات المطلوبه غير متاحه');
            echo ($this->f3->get('errorMessage'));
            echo \Template::instance()->render('app_message.html');
        }

    }
    public function details($projection_id,$contractor_id)
    {
        
        $this->f3->set('ShowNav', 'true');
        $projection_id = $projection_id;
        $contractor_id=$contractor_id;
        if($contractor_id!=null){
            $contractor = $this->db->exec('SELECT cont_name FROM contractors_cont where cont_id='.$contractor_id.' ;');
             $this->f3->set('contractor', $contractor[0]['cont_name']);
            //print ($contractor[0]['cont_name']);
        }
        $this->f3->set('id', $projection_id);
        if ($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y') {
            $projection = $this->db->exec('SELECT * FROM projections_prj WHERE prj_id =' . $projection_id);
        } else {
            $projection = $this->db->exec('SELECT * FROM projections_prj WHERE prj_id IN (' . $this->f3->get('SESSION.user[0]["projections_ids"]') . ') AND prj_id =' . $projection_id);
        }
        $this->f3->set('intro', $projection[0]['prj_intro']);
        $this->f3->set('comment', $projection[0]['prj_comment']);
        $this->f3->set('prj_cat', $projection[0]['prj_cat']);
        switch ($projection[0]['prj_cat']) {
            case 1:
                $this->f3->set('breadcrumb', 'التجميع');
                break;
            case 2:
                $this->f3->set('breadcrumb', 'فترات الثقة');
                break;
            case 3:
                $this->f3->set('breadcrumb', 'الانحدار');
                break;
            case 4:
                $this->f3->set('breadcrumb', 'الاحتمالات');
                break;
            case 5:
                $this->f3->set('breadcrumb', 'مستوى أداء المقاولين');
                break;
        }
        if ($projection_id == 27 or $projection_id == 28 or $projection_id == 29 or $projection_id == 30 or $projection_id == 42 or $projection_id == 17 or $projection_id == 37 or $projection_id == 38 or $projection_id == 39 or $projection_id == 42 or $projection_id == 41) {
            $contractors = $this->db->exec('SELECT cont_id,cont_name FROM contractors_cont');
            $this->f3->set('contractors', $contractors);
        }
        if ($projection_id == 43 or $projection_id == 44 or $projection_id == 45 or $projection_id == 46) {
            $regions = $this->db->exec('SELECT reg_id,reg_name FROM options_region');
            $this->f3->set('regions', $regions);
        }
            if ($projection != null and (in_array($projection_id, [22, 19, 21, 20, 1, 23, 24, 26, 25, 2, 27, 30, 29, 28, 3, 42]))) {
                $this->f3->set('proj_root_id', $projection[0]['prj_root_id']);
                $path = 'r_json/proj_' . $projection_id . '.json';
                $file_content = json_decode($this->f3->read($path));
                $caption = $file_content->chart->caption;
                $dataset0_Name = $file_content->chart->xAxisName;
                $dataset1_Name = $file_content->dataset[0]->seriesname;
                $dataset2_Name = $file_content->dataset[1]->seriesname;
                $dataset3_Name = $file_content->dataset[2]->seriesname;
    
                $dataset0_value = $file_content->categories[0]->category;
                $dataset1_value = $file_content->dataset[0]->data;
                $dataset2_value = $file_content->dataset[1]->data;
                $dataset3_value = $file_content->dataset[2]->data;
    
                $this->f3->set('caption', $caption);
                $this->f3->set('dataset0_Name', $dataset0_Name);
                $this->f3->set('dataset1_Name', $dataset1_Name);
                $this->f3->set('dataset2_Name', $dataset2_Name);
                $this->f3->set('dataset3_Name', $dataset3_Name);
                $this->f3->set('dataset0_value', $dataset0_value);
                $this->f3->set('dataset1_value', $dataset1_value);
                $this->f3->set('dataset2_value', $dataset2_value);
                $this->f3->set('dataset3_value', $dataset3_value);
                $this->f3->set('count', count($dataset3_value));
                echo \Template::instance()->render('projection/Projections_1_details.html');
            } elseif ($projection != null and (in_array($projection_id, [4, 5, 6, 7, 8, 9, 10, 11, 12, 13]))) {
    
                $this->f3->set('proj_id', $projection_id);
                $path = 'r_json/proj_' . $projection_id . '.json';
                $file_content = json_decode($this->f3->read($path));
                $caption = $file_content->chart->caption;
                $dataset0_Name = $file_content->chart->xAxisName;
                $dataset1_Name = $file_content->dataset[0]->seriesname;
                $dataset2_Name = $file_content->dataset[1]->seriesname;
                $dataset3_Name = $file_content->dataset[2]->seriesname;
                $dataset0_value = $file_content->categories[0]->category;
                $dataset1_value = $file_content->dataset[0]->data;
                $dataset2_value = $file_content->dataset[1]->data;
                $dataset3_value = $file_content->dataset[2]->data;
                $this->f3->set('caption', $caption);
                $this->f3->set('dataset0_Name', $dataset0_Name);
                $this->f3->set('dataset1_Name', $dataset1_Name);
                $this->f3->set('dataset2_Name', $dataset2_Name);
                $this->f3->set('dataset3_Name', $dataset3_Name);
                $this->f3->set('dataset0_value', $dataset0_value);
                $this->f3->set('dataset1_value', $dataset1_value);
                $this->f3->set('dataset2_value', $dataset2_value);
                $this->f3->set('dataset3_value', $dataset3_value);
                $this->f3->set('count', count($dataset3_value));
    
                echo \Template::instance()->render('projection/Projections_details.html');
            } elseif ($projection != null and (in_array($projection_id, [43, 44, 45, 46]))) {
                $this->f3->set('proj_id', $projection_id);
                $path = 'r_json/proj_' . $projection_id . '.json';
                $file_content = json_decode($this->f3->read($path));
                $caption = $file_content->chart->caption;
                $dataset0_Name = $file_content->chart->xAxisName;
                $dataset1_Name = $file_content->dataset[0]->seriesname;
    
                $dataset0_value = $file_content->categories[0]->category;
                $dataset1_value = $file_content->dataset[0]->data;
                $this->f3->set('caption', $caption);
                $this->f3->set('dataset0_Name', $dataset0_Name);
                $this->f3->set('dataset1_Name', $dataset1_Name);
    
                $this->f3->set('dataset0_value', $dataset0_value);
                $this->f3->set('dataset1_value', $dataset1_value);
                $this->f3->set('count', count($dataset1_value));
                echo \Template::instance()->render('projection/Projections_14_details.html');
            } elseif ($projection != null and (in_array($projection_id, [15]))) {
    
                $this->f3->set('proj_id', $projection_id);
                $path = 'r_json/proj_' . $projection_id . '.json';
                $file_content = json_decode($this->f3->read($path));
                $caption = $file_content->chart->caption;
                $dataset0_Name = $file_content->chart->xAxisName;
                $dataset1_Name = $file_content->dataset[0]->seriesname;
                $dataset2_Name = $file_content->dataset[1]->seriesname;
                $dataset3_Name = $file_content->dataset[2]->seriesname;
                $dataset4_Name = $file_content->dataset[3]->seriesname;
                $dataset5_Name = $file_content->dataset[4]->seriesname;
                $dataset6_Name = $file_content->dataset[5]->seriesname;
                $dataset7_Name = $file_content->dataset[6]->seriesname;
                $dataset8_Name = $file_content->dataset[7]->seriesname;
                $dataset9_Name = $file_content->dataset[8]->seriesname;
                $dataset10_Name = $file_content->dataset[9]->seriesname;
                $dataset11_Name = $file_content->dataset[10]->seriesname;
                $dataset12_Name = $file_content->dataset[11]->seriesname;
                $dataset13_Name = $file_content->dataset[12]->seriesname;
    
                $dataset0_value = $file_content->categories[0]->category;
                $dataset1_value = $file_content->dataset[0]->data;
                $dataset2_value = $file_content->dataset[1]->data;
                $dataset3_value = $file_content->dataset[2]->data;
                $dataset4_value = $file_content->dataset[3]->data;
                $dataset5_value = $file_content->dataset[4]->data;
                $dataset6_value = $file_content->dataset[5]->data;
                $dataset7_value = $file_content->dataset[6]->data;
                $dataset8_value = $file_content->dataset[7]->data;
                $dataset9_value = $file_content->dataset[8]->data;
                $dataset10_value = $file_content->dataset[9]->data;
                $dataset11_value = $file_content->dataset[10]->data;
                $dataset12_value = $file_content->dataset[11]->data;
                $dataset13_value = $file_content->dataset[12]->data;
    
                $this->f3->set('caption', $caption);
                $this->f3->set('dataset0_Name', $dataset0_Name);
                $this->f3->set('dataset1_Name', $dataset1_Name);
                $this->f3->set('dataset2_Name', $dataset2_Name);
                $this->f3->set('dataset3_Name', $dataset3_Name);
                $this->f3->set('dataset4_Name', $dataset4_Name);
                $this->f3->set('dataset5_Name', $dataset5_Name);
                $this->f3->set('dataset6_Name', $dataset6_Name);
                $this->f3->set('dataset7_Name', $dataset7_Name);
                $this->f3->set('dataset8_Name', $dataset8_Name);
                $this->f3->set('dataset9_Name', $dataset9_Name);
                $this->f3->set('dataset10_Name', $dataset10_Name);
                $this->f3->set('dataset11_Name', $dataset11_Name);
                $this->f3->set('dataset12_Name', $dataset12_Name);
                $this->f3->set('dataset13_Name', $dataset13_Name);
    
                $this->f3->set('dataset0_value', $dataset0_value);
                $this->f3->set('dataset1_value', $dataset1_value);
                $this->f3->set('dataset2_value', $dataset2_value);
                $this->f3->set('dataset3_value', $dataset3_value);
                $this->f3->set('dataset4_value', $dataset4_value);
                $this->f3->set('dataset5_value', $dataset5_value);
                $this->f3->set('dataset6_value', $dataset6_value);
                $this->f3->set('dataset7_value', $dataset7_value);
                $this->f3->set('dataset8_value', $dataset8_value);
                $this->f3->set('dataset9_value', $dataset9_value);
                $this->f3->set('dataset10_value', $dataset10_value);
                $this->f3->set('dataset11_value', $dataset11_value);
                $this->f3->set('dataset12_value', $dataset12_value);
                $this->f3->set('dataset13_value', $dataset13_value);
    
                $this->f3->set('count', count($dataset2_value));
    
                echo \Template::instance()->render('projection/Projections_15_details.html');
            } elseif ($projection != null and (in_array($projection_id, [16, 17, 41]))) {
    
                $this->f3->set('proj_id', $projection_id);
                $path = 'r_json/proj_' . $projection_id . '.json';
                $file_content = json_decode($this->f3->read($path));
                $caption = $file_content->chart->caption;
                $dataset0_Name = $file_content->chart->xAxisName;
                $dataset1_Name = $file_content->dataset[0]->seriesname;
                $dataset2_Name = $file_content->dataset[1]->seriesname;
                $dataset3_Name = $file_content->dataset[2]->seriesname;
                $dataset4_Name = $file_content->dataset[3]->seriesname;
                $dataset5_Name = $file_content->dataset[4]->seriesname;
                $dataset6_Name = $file_content->dataset[5]->seriesname;
                $dataset7_Name = $file_content->dataset[6]->seriesname;
                $dataset8_Name = $file_content->dataset[7]->seriesname;
                $dataset9_Name = $file_content->dataset[8]->seriesname;
                $dataset10_Name = $file_content->dataset[9]->seriesname;
                $dataset11_Name = $file_content->dataset[10]->seriesname;
                $dataset12_Name = $file_content->dataset[11]->seriesname;
                $dataset13_Name = $file_content->dataset[12]->seriesname;
    
                $dataset0_value = $file_content->categories[0]->category;
                $dataset1_value = $file_content->dataset[0]->data;
                $dataset2_value = $file_content->dataset[1]->data;
                $dataset3_value = $file_content->dataset[2]->data;
                $dataset4_value = $file_content->dataset[3]->data;
                $dataset5_value = $file_content->dataset[4]->data;
                $dataset6_value = $file_content->dataset[5]->data;
                $dataset7_value = $file_content->dataset[6]->data;
                $dataset8_value = $file_content->dataset[7]->data;
                $dataset9_value = $file_content->dataset[8]->data;
                $dataset10_value = $file_content->dataset[9]->data;
                $dataset11_value = $file_content->dataset[10]->data;
                $dataset12_value = $file_content->dataset[11]->data;
                $dataset13_value = $file_content->dataset[12]->data;
    
                $this->f3->set('caption', $caption);
                $this->f3->set('dataset0_Name', $dataset0_Name);
                $this->f3->set('dataset1_Name', $dataset1_Name);
                $this->f3->set('dataset2_Name', $dataset2_Name);
                $this->f3->set('dataset3_Name', $dataset3_Name);
                $this->f3->set('dataset4_Name', $dataset4_Name);
                $this->f3->set('dataset5_Name', $dataset5_Name);
                $this->f3->set('dataset6_Name', $dataset6_Name);
                $this->f3->set('dataset7_Name', $dataset7_Name);
                $this->f3->set('dataset8_Name', $dataset8_Name);
                $this->f3->set('dataset9_Name', $dataset9_Name);
                $this->f3->set('dataset10_Name', $dataset10_Name);
                $this->f3->set('dataset11_Name', $dataset11_Name);
                $this->f3->set('dataset12_Name', $dataset12_Name);
                $this->f3->set('dataset13_Name', $dataset13_Name);
    
                $this->f3->set('dataset0_value', $dataset0_value);
                $this->f3->set('dataset1_value', $dataset1_value);
                $this->f3->set('dataset2_value', $dataset2_value);
                $this->f3->set('dataset3_value', $dataset3_value);
                $this->f3->set('dataset4_value', $dataset4_value);
                $this->f3->set('dataset5_value', $dataset5_value);
                $this->f3->set('dataset6_value', $dataset6_value);
                $this->f3->set('dataset7_value', $dataset7_value);
                $this->f3->set('dataset8_value', $dataset8_value);
                $this->f3->set('dataset9_value', $dataset9_value);
                $this->f3->set('dataset10_value', $dataset10_value);
                $this->f3->set('dataset11_value', $dataset11_value);
                $this->f3->set('dataset12_value', $dataset12_value);
                $this->f3->set('dataset13_value', $dataset13_value);
    
                $this->f3->set('count', count($dataset2_value));
    
                echo \Template::instance()->render('projection/Projections_16_17details.html');
            } elseif ($projection != null and (in_array($projection_id, [18]))) {
    
                $this->f3->set('proj_id', $projection_id);
                $path = 'r_json/proj_' . $projection_id . '.json';
                $file_content = json_decode($this->f3->read($path));
                $caption = $file_content->chart->caption;
    
                $dataset0_Name = $file_content->chart->xAxisName;
                $dataset1_Name = $file_content->dataset[0]->seriesname;
                $dataset2_Name = $file_content->dataset[1]->seriesname;
                $dataset3_Name = $file_content->dataset[2]->seriesname;
                $dataset4_Name = $file_content->dataset[3]->seriesname;
                $dataset5_Name = $file_content->dataset[4]->seriesname;
                $dataset6_Name = $file_content->dataset[5]->seriesname;
                $dataset7_Name = $file_content->dataset[6]->seriesname;
                $dataset8_Name = $file_content->dataset[7]->seriesname;
                $dataset9_Name = $file_content->dataset[8]->seriesname;
    
                $dataset0_value = $file_content->categories[0]->category;
                $dataset1_value = $file_content->dataset[0]->data;
                $dataset2_value = $file_content->dataset[1]->data;
                $dataset3_value = $file_content->dataset[2]->data;
                $dataset4_value = $file_content->dataset[3]->data;
                $dataset5_value = $file_content->dataset[4]->data;
                $dataset6_value = $file_content->dataset[5]->data;
                $dataset7_value = $file_content->dataset[6]->data;
                $dataset8_value = $file_content->dataset[7]->data;
                $dataset9_value = $file_content->dataset[8]->data;
    
                $this->f3->set('caption', $caption);
                $this->f3->set('dataset0_Name', $dataset0_Name);
                $this->f3->set('dataset1_Name', $dataset1_Name);
                $this->f3->set('dataset2_Name', $dataset2_Name);
                $this->f3->set('dataset3_Name', $dataset3_Name);
                $this->f3->set('dataset4_Name', $dataset4_Name);
                $this->f3->set('dataset5_Name', $dataset5_Name);
                $this->f3->set('dataset6_Name', $dataset6_Name);
                $this->f3->set('dataset7_Name', $dataset7_Name);
                $this->f3->set('dataset8_Name', $dataset8_Name);
                $this->f3->set('dataset9_Name', $dataset9_Name);
    
                $this->f3->set('dataset0_value', $dataset0_value);
                $this->f3->set('dataset1_value', $dataset1_value);
                $this->f3->set('dataset2_value', $dataset2_value);
                $this->f3->set('dataset3_value', $dataset3_value);
                $this->f3->set('dataset4_value', $dataset4_value);
                $this->f3->set('dataset5_value', $dataset5_value);
                $this->f3->set('dataset6_value', $dataset6_value);
                $this->f3->set('dataset7_value', $dataset7_value);
                $this->f3->set('dataset8_value', $dataset8_value);
                $this->f3->set('dataset9_value', $dataset9_value);
                $this->f3->set('count', count($dataset3_value));
    
                echo \Template::instance()->render('projection/Projections_18_details.html');
            } elseif ($projection != null and (in_array($projection_id, [37, 38]))) {
                $this->f3->set('proj_id', $projection_id);
                $path = 'r_json/proj_' . $projection_id . '.json';
                $file_content = json_decode($this->f3->read($path));
                $caption = $file_content->chart->caption;
                $dataset0_Name = $file_content->chart->xAxisName;
                $dataset1_Name = $file_content->dataset[0]->seriesname;
                $dataset2_Name = $file_content->dataset[1]->seriesname;
                $dataset3_Name = $file_content->dataset[2]->seriesname;
                $dataset4_Name = $file_content->dataset[3]->seriesname;
                $dataset5_Name = $file_content->dataset[4]->seriesname;
                $dataset6_Name = $file_content->dataset[5]->seriesname;
                $dataset7_Name = $file_content->dataset[6]->seriesname;
                $dataset8_Name = $file_content->dataset[7]->seriesname;
                $dataset9_Name = $file_content->dataset[8]->seriesname;
    
                $dataset0_value = $file_content->categories[0]->category;
                $dataset1_value = $file_content->dataset[0]->data;
                $dataset2_value = $file_content->dataset[1]->data;
                $dataset3_value = $file_content->dataset[2]->data;
                $dataset4_value = $file_content->dataset[3]->data;
                $dataset5_value = $file_content->dataset[4]->data;
                $dataset6_value = $file_content->dataset[5]->data;
                $dataset7_value = $file_content->dataset[6]->data;
                $dataset8_value = $file_content->dataset[7]->data;
                $dataset9_value = $file_content->dataset[8]->data;
    
                $this->f3->set('id', $projection_id);
                $this->f3->set('caption', $caption);
                $this->f3->set('dataset0_Name', $dataset0_Name);
                $this->f3->set('dataset1_Name', $dataset1_Name);
                $this->f3->set('dataset2_Name', $dataset2_Name);
                $this->f3->set('dataset3_Name', $dataset3_Name);
                $this->f3->set('dataset4_Name', $dataset4_Name);
                $this->f3->set('dataset5_Name', $dataset5_Name);
                $this->f3->set('dataset6_Name', $dataset6_Name);
                $this->f3->set('dataset7_Name', $dataset7_Name);
                $this->f3->set('dataset8_Name', $dataset8_Name);
                $this->f3->set('dataset9_Name', $dataset9_Name);
    
                $this->f3->set('dataset0_value', $dataset0_value);
                $this->f3->set('dataset1_value', $dataset1_value);
                $this->f3->set('dataset2_value', $dataset2_value);
                $this->f3->set('dataset3_value', $dataset3_value);
                $this->f3->set('dataset4_value', $dataset4_value);
                $this->f3->set('dataset5_value', $dataset5_value);
                $this->f3->set('dataset6_value', $dataset6_value);
                $this->f3->set('dataset7_value', $dataset7_value);
                $this->f3->set('dataset8_value', $dataset8_value);
                $this->f3->set('dataset9_value', $dataset9_value);
                $this->f3->set('count', count($dataset3_value));
    
                echo \Template::instance()->render('projection/Projections_37_38details.html');
            } elseif ($projection != null and (in_array($projection_id, [39]))) {
                $this->f3->set('proj_id', $projection_id);
                $path = 'r_json/proj_40.json';
                $file_content = json_decode($this->f3->read($path));
                $caption = $file_content->chart->caption;
    
                $dataset1_Name = $file_content->dataset[0]->seriesname;
                $dataset2_Name = $file_content->dataset[1]->seriesname;
                $dataset3_Name = $file_content->dataset[2]->seriesname;
                $dataset4_Name = $file_content->dataset[3]->seriesname;
                $dataset5_Name = $file_content->dataset[4]->seriesname;
                $dataset6_Name = $file_content->dataset[5]->seriesname;
                $dataset7_Name = $file_content->dataset[6]->seriesname;
                $dataset8_Name = $file_content->dataset[7]->seriesname;
                $dataset9_Name = $file_content->dataset[8]->seriesname;
    
                $dataset1_value = $file_content->dataset[0]->data;
                $dataset2_value = $file_content->dataset[1]->data;
                $dataset3_value = $file_content->dataset[2]->data;
                $dataset4_value = $file_content->dataset[3]->data;
                $dataset5_value = $file_content->dataset[4]->data;
                $dataset6_value = $file_content->dataset[5]->data;
                $dataset7_value = $file_content->dataset[6]->data;
                $dataset8_value = $file_content->dataset[7]->data;
                $dataset9_value = $file_content->dataset[8]->data;
    
                $this->f3->set('id', $projection_id);
                $this->f3->set('caption', $caption);
    
                $this->f3->set('dataset1_Name', $dataset1_Name);
                $this->f3->set('dataset2_Name', $dataset2_Name);
                $this->f3->set('dataset3_Name', $dataset3_Name);
                $this->f3->set('dataset4_Name', $dataset4_Name);
                $this->f3->set('dataset5_Name', $dataset5_Name);
                $this->f3->set('dataset6_Name', $dataset6_Name);
                $this->f3->set('dataset7_Name', $dataset7_Name);
                $this->f3->set('dataset8_Name', $dataset8_Name);
                $this->f3->set('dataset9_Name', $dataset9_Name);
    
                $this->f3->set('dataset1_value', $dataset1_value);
                $this->f3->set('dataset2_value', $dataset2_value);
                $this->f3->set('dataset3_value', $dataset3_value);
                $this->f3->set('dataset4_value', $dataset4_value);
                $this->f3->set('dataset5_value', $dataset5_value);
                $this->f3->set('dataset6_value', $dataset6_value);
                $this->f3->set('dataset7_value', $dataset7_value);
                $this->f3->set('dataset8_value', $dataset8_value);
                $this->f3->set('dataset9_value', $dataset9_value);
                $this->f3->set('count', count($dataset3_value));
    
                echo \Template::instance()->render('projection/Projections_39details.html');
            } else {
                $this->f3->set('errorMessage', 'البيانات المطلوبه غير متاحه');
                echo ($this->f3->get('errorMessage'));
                echo \Template::instance()->render('app_message.html');
            }
    }

    public function updateform()
    {
        // priv_admin check
        if ($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y') {
            $kpi = $this->db->exec('SELECT * FROM projections_prj WHERE prj_id =' . $this->f3->get('PARAMS.projection_id'));
        } else {
            $kpi = $this->db->exec('SELECT * FROM projections_prj WHERE prj_id IN (' . $this->f3->get('SESSION.user[0]["projections_ids"]') . ') AND prj_id =' . $this->f3->get('PARAMS.projection_id'));
        }
        // priv_admin check
        if (count($kpi)) {
            echo \Template::instance()->render('projection/Projection_updateform.html');
        } else {
            $this->f3->set('errorMessage', 'البيانات المطلوبه غير متاحه');
            echo ($this->f3->get('errorMessage'));
            echo \Template::instance()->render('projection/app_message.html');
        }
    }
    public function executeupdate($PARAMS)
    {
           $projection_id = $this->f3->get('PARAMS.projection_id');
           $contractor_id = $this->f3->get('POST.contractor_id');
           $region_id = $this->f3->get('POST.region_id');
           $cost = $this->f3->get('POST.cost');
           $time = $this->f3->get('POST.time');
            // echo $projection_id.' '.$contractor_id.' '.$region_id.' '. $cost.' '. $time;
         if ($projection_id != null  and in_array($projection_id, [42, 41, 37, 39])) {
             exec('Rscript r_file/proj_' . $projection_id . '.R  ' . $contractor_id, $output, $return_var);
         } elseif ($projection_id != null  and in_array($projection_id, [43])) {
             exec('Rscript r_file/proj_' . $projection_id . '.R  '.$cost.' '.$region_id, $output, $return_var);
         }elseif ($projection_id != null  and in_array($projection_id, [44])) {
             exec('Rscript r_file/proj_' . $projection_id . '.R  '.$cost, $output, $return_var);
         }elseif ($projection_id != null  and in_array($projection_id, [45])) {
         exec('Rscript r_file/proj_' . $projection_id . '.R  '.$time.' '.$region_id, $output, $return_var);
         }elseif ($projection_id != null  and in_array($projection_id, [46])) {
             exec('Rscript r_file/proj_' . $projection_id . '.R  '.$time, $output, $return_var);
         }elseif ($projection_id != null  and in_array($projection_id, [19,20,21,22])) {
             exec('Rscript r_file/proj_' . 1 . '.R  '.$region_id.' '.$time, $output, $return_var);
         }elseif ($projection_id != null  and in_array($projection_id, [23,24,25,26])) {
             exec('Rscript r_file/proj_' . 2 . '.R  '.$region_id.' '.$time, $output, $return_var);
         }elseif ($projection_id != null  and in_array($projection_id, [27,28,29,30])) {
             exec('Rscript r_file/proj_' . 3 . '.R  '.$region_id.' '.$time, $output, $return_var);
         }else{
             exec('Rscript r_file/proj_' . $projection_id . '.R  ', $output, $return_var);
         }

         if ($return_var !== 0) {
             echo 'البيانات المطلوبه غير متاحه';
         } else {
             $this->details($projection_id,$contractor_id);
         }
        //$contractor_id = $this->f3->get('POST.contractor_id');
        //$projection_id = $this->f3->get('PARAMS.projection_id');
        //$this->details($projection_id,$contractor_id);
    }
    public function ShowGroup()
    {
        $this->f3->set('ShowNav', 'true');
        $projection_categories = $this->db->exec('SELECT * FROM projections_categories_pcat');
        $contractors = $this->db->exec('SELECT cont_id,cont_name FROM contractors_cont');
        $this->f3->set('contractors', $contractors);
        $this->f3->set('projection_categories', $projection_categories);
        echo \Template::instance()->render('projection/show_group.html');
    }
    public function ShowCategory($PARAMS){
        $this->f3->set('ShowNav', 'true');
        $id = $this->f3->get('PARAMS.id');
        $main_category = $this->db->exec('SELECT * FROM projections_categories_pcat where pcat_id=' . $id . ' ;');
        $title = $main_category[0]['pcat_title'];
        $description = $main_category[0]['pcat_description'];
        $regions = $this->db->exec('SELECT reg_id,reg_name FROM options_region');
        $this->f3->set('regions', $regions);

        $this->f3->set('title', $title);
        $this->f3->set('description', $description);
        $projection_roots = $this->db->exec('SELECT * FROM projections_prj where prj_cat=' . $id . ' and prj_root_id=0;');

        $projections_sub = $this->db->exec('SELECT * FROM projections_prj where prj_cat=' . $id . ' and prj_root_id !=0 ;');
        switch ($id) {
            case 1:
                $this->f3->set('projection_roots', $projection_roots);
                $this->f3->set('projections_sub', $projections_sub);
                $this->f3->set('count', count($projection_roots));
                $this->f3->set('type', 1);
                echo \Template::instance()->render('projection/show_category.html');
                break;
            case 2:
                $this->f3->set('projection_roots', $projection_roots);
                $this->f3->set('projections_sub', $projections_sub);
                $this->f3->set('count', count($projection_roots));
                $this->f3->set('type', 2);
                echo \Template::instance()->render('projection/show_category.html');
                break;
            case 4:
                $this->f3->set('projection_roots', $projection_roots);
                $this->f3->set('projections_sub', $projections_sub);
                $this->f3->set('count', count($projection_roots));
                $this->f3->set('type', 4);
                echo \Template::instance()->render('projection/show_category.html');
                break;
            case 3:
                $this->f3->set('projection_roots', $projection_roots);
                $this->f3->set('projections_sub', $projections_sub);
                $this->f3->set('count', count($projection_roots));
                $this->f3->set('type', 3);
                echo \Template::instance()->render('projection/show_category.html');
                break;
            case 5:
                $contractors = $this->db->exec('SELECT cont_id,cont_name FROM contractors_cont');
                $this->f3->set('contractors', $contractors);
                $this->f3->set('projection_roots', $projection_roots);
                $this->f3->set('projections_sub', $projections_sub);
                $this->f3->set('count', count($projection_roots));
                $this->f3->set('type', 5);
                echo \Template::instance()->render('projection/show_category.html');
                break;
            default:
                echo \Template::instance()->render('projection/show_category.html');
        }
    }
    public function details2($projection_id)
    {
        //$projection_id = $this->f3->get('projection_id');
        echo $projection_id;
    }
    public function test(){
         echo \Template::instance()->render('projection/test.html');
        
    }
}
