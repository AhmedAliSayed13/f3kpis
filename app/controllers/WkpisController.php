<?php
class WkpisController extends Controller {
	function beforeroute() {
		 // check for user session
		 if($this->f3->get('SESSION.user[0]["usr_id"]') === null ) {
         $this->f3->reroute('/login');
		 exit;
	  	}
    }
		function list() {
		// priv_admin check
		if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
			$kpis = $this->db->exec('SELECT * FROM kpis_kpi');
		}else{
			$kpis = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').')  ');
		}
		if(count($kpis)){
		$this->f3->set('ShowNav', 'true');
		$this->f3->set('kpis', $kpis);
		echo  \Template::instance()->render('wkpis/wkpis_list.html');
		}
    }
		function home() {
			$this->f3->set('ShowNav', 'true');
		  echo  \Template::instance()->render('wkpis/wkpis_home.html');
		}
 		/////
		function listKpis() {
		// priv_admin check
		if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
			$kpis = $this->db->exec('SELECT * FROM kpis_kpi');
			$category = $this->db->exec('SELECT *  FROM  kpis_categories_kcat') ;
		}else{
			$kpis = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').')  ');
			$category = $this->db->exec('SELECT DISTINCT kcat_id , kcat_title FROM kpis_kpi , kpis_categories_kcat WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').') AND kpi_cat = kcat_id ') ;
			$category2 = $this->db->exec('SELECT DISTINCT kcat_id , kcat_title FROM kpis_kpi , kpis_categories_kcat WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').') ') ;
		}
		if(count($kpis)){
		$this->f3->set('ShowNav', 'true');
		$this->f3->set('category', $category);
		$this->f3->set('category2', $category2);
 		$this->f3->set('kpis', $kpis);
		echo  \Template::instance()->render('wkpis/wkpis_kpi.html');
		}
		}

		function listCarosel2() {
		// priv_admin check
		if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
			$kpis = $this->db->exec('SELECT * FROM kpis_kpi WHERE  kpi_cat ='.$this->f3->get('PARAMS.kcat_id') );
			$category = $this->db->exec('SELECT * FROM kpis_categories_kcat ');
		}else{
			$kpis = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').') and kpi_cat ='.$this->f3->get('PARAMS.kcat_id'));
			$category = $this->db->exec('SELECT * FROM kpis_categories_kcat  WHERE  kcat_id ='.$this->f3->get('PARAMS.kcat_id'));
		}
		if(count($kpis)){
			$this->f3->set('ShowNav', 'true');
		  $this->f3->set('kpis', $kpis);
		  $this->f3->set('category', $category);
	  	echo  \Template::instance()->render('wkpis/wkpis_caros.html');
		}
		}
	///////
		function details() {
		// priv_admin check
		if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
			$kpi = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id ='.$this->f3->get('PARAMS.kpi_id'));
		}else{
			$kpi = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').') AND kpi_id ='.$this->f3->get('PARAMS.kpi_id'));
		}
		if(count($kpi)){
		$this->f3->set('kpi', $kpi);
		$this->f3->set('ShowNav', 'true');
/// bar and dounts ///
		$ids = array("1", "2" , "5" , "6" , "13", "28" , "29" , "30" , "33", "34" , "35" , "36" , "37", "38" , "39" , "40");
		$this->f3->set('ids', $ids);
		$file_path = 'r_json/ind_'.$this->f3->get('PARAMS.kpi_id').'.json';
		$file_cont = json_decode($this->f3->read($file_path));
    $caption =     $file_cont->chart->caption ;
 		$category =  $file_cont->categories[0]->category ;
		$data =   $file_cont->dataset[0]->data ;
		$data5 =   $file_cont->dataset[0]->seriesname ;
		$data6 =   $file_cont->dataset[1]->seriesname ;
		$data7 =   $file_cont->dataset[2]->seriesname ;
		$data8 =   $file_cont->dataset[3]->seriesname ;
		$data20 =   $file_cont->dataset[4]->seriesname ;
		$data21 =   $file_cont->dataset[5]->seriesname ;
		$data22 =   $file_cont->dataset[6]->seriesname ;
		$data23 =   $file_cont->dataset[7]->seriesname ;
		$data24 =   $file_cont->dataset[8]->seriesname ;
		$data25 =   $file_cont->dataset[9]->seriesname ;
 		$data26 =   $file_cont->dataset[10]->seriesname ;
		$data27 =   $file_cont->dataset[11]->seriesname ;
		$data28 =   $file_cont->dataset[12]->seriesname ;
		$data29 =   $file_cont->dataset[13]->seriesname ;
		$data31 =     $file_cont->chart->xAxisName ;
		$data30 =     $file_cont->chart->yAxisName ;
/////// one series////////
		$id_series = $this->f3->get('PARAMS.kpi_id');
		if($id_series === "1" or $id_series === "2" or $id_series === "5" or $id_series === "6" or $id_series === "13"
		 or $id_series === "28"   or $id_series === "29"   or $id_series === "30"  or $id_series === "33"  or $id_series === "34"
		 or $id_series === "35"  or $id_series === "36"  or $id_series === "37"  or $id_series === "38" or $id_series === "40"   ){
			$data31 =  $file_cont->chart->xAxisName ;
			$data5 =  $caption ;
		}
////// test series end////////

////////////////////////  data9 /////////////
		$data9 =   $file_cont->dataset[4]->data ;
		$json6 = json_encode($data9);
		$num6 = json_decode($json6, true);
		$this->f3->set('num6', $num6);
 		////////////////////////  end data7 /////////////
		////////////////////////  data7 /////////////
		$data10 =   $file_cont->dataset[5]->data ;
		$json7 = json_encode($data10);
		$num7 = json_decode($json7, true);
		$this->f3->set('num7', $num7);
 		////////////////////////  end data7 /////////////
		////////////////////////  data7 /////////////
		$data11 =   $file_cont->dataset[6]->data ;
		$json8 = json_encode($data11);
		$num8 = json_decode($json8, true);
		$this->f3->set('num8', $num8);
	 		////////////////////////  end data7 /////////////
			////////////////////////  data7 /////////////
		$data12 =   $file_cont->dataset[7]->data ;
		$json9 = json_encode($data12);
		$num9 = json_decode($json9, true);
		$this->f3->set('num9', $num9);
	////////////////////////  end data7 /////////////
	////////////////////////  data7 /////////////
		$data13 =   $file_cont->dataset[8]->data ;
		$json10 = json_encode($data13);
		$num10 = json_decode($json10, true);
		$this->f3->set('num10', $num10);
			////////////////////////  end data7 /////////////
		////////////////////////  data7 /////////////
		$data14 =   $file_cont->dataset[9]->data ;
		$json11 = json_encode($data14);
		$num11 = json_decode($json11, true);
		$this->f3->set('num11', $num11);
			////////////////////////  end data7 /////////////
			////////////////////////  data7 /////////////
		$data15 =   $file_cont->dataset[10]->data ;
		$json12 = json_encode($data15);
		$num12 = json_decode($json12, true);
		$this->f3->set('num12', $num12);
			////////////////////////  end data7 /////////////
			////////////////////////  data7 /////////////
		$data16 =   $file_cont->dataset[11]->data ;
		$json13 = json_encode($data16);
		$num13 = json_decode($json13, true);
		$this->f3->set('num13', $num13);
			////////////////////////  end data7 /////////////
			$data17 =   $file_cont->dataset[12]->data ;
			$json14 = json_encode($data17);
			$num14 = json_decode($json14, true);
			$this->f3->set('num14', $num14);
			////////////////////////  data7 /////////////
			$data18 =   $file_cont->dataset[13]->data ;
			$json15 = json_encode($data18);
			$num15 = json_decode($json15, true);
			$this->f3->set('num15', $num15);
			////////////////////////  end data7 /////////////
			$data19 =   $file_cont->dataset[14]->data ;
			$json16 = json_encode($data19);
			$num16 = json_decode($json16, true);
			$this->f3->set('num16', $num16);
			////////////////////////  data7 /////////////
			$data40 =   $file_cont->dataset[15]->data ;
			$json17 = json_encode($data40);
			$num17 = json_decode($json17, true);
			$this->f3->set('num17', $num17);
			////////////////////////  end data7 /////////////
			////////////////////////  check more series  /////////////
			$data41 =   $file_cont->dataset[16]->data ;
			$json18 = json_encode($data41);
			$num18 = json_decode($json18, true);
			$this->f3->set('num18', $num18);

			$data42 =   $file_cont->dataset[17]->data ;
			$json19 = json_encode($data42);
			$num19 = json_decode($json19, true);
			$this->f3->set('num19', $num19);
			////////////////////////  end data7 /////////////
			////////////////////////  data7 /////////////
		$json = json_encode($data);
		$num = json_decode($json, true);
		$this->f3->set('num', $num);
		//  data 2
		$data2 =   $file_cont->dataset[1]->data ;
		$json3 = json_encode($data2);
		$num3 = json_decode($json3, true);
		// var_dump ( $book3 );
		$this->f3->set('num3', $num3);
		$this->f3->set('data2', $data2);
		//  data 3
		$data3 =   $file_cont->dataset[2]->data ;
		$json4 = json_encode($data3);
		$num4 = json_decode($json4, true);
		$this->f3->set('num4', $num4);
		$this->f3->set('data3', $data3);
		//  data 3
		$data4 =   $file_cont->dataset[3]->data ;
		$json5 = json_encode($data4);
		$num5 = json_decode($json5, true);
		$this->f3->set('num5', $num5);
		$this->f3->set('data4', $data4);
		//  category
		$json2 = json_encode($category);
		$num2 = json_decode($json2, true);
		$this->f3->set('num2', $num2);
		$this->f3->set('file_cont', $file_cont);
		$this->f3->set('caption', $caption);
		$this->f3->set('category', $category);
		$this->f3->set('data', $data);
		$this->f3->set('data5', $data5);
		$this->f3->set('data6', $data6);
		$this->f3->set('data7', $data7);
		$this->f3->set('data8', $data8);
		$this->f3->set('data9', $data9);
		$this->f3->set('data10', $data10);
		$this->f3->set('data11', $data11);
		$this->f3->set('data12', $data12);
		$this->f3->set('data13', $data13);
		$this->f3->set('data14', $data14);
		$this->f3->set('data15', $data15);
		$this->f3->set('data16', $data16);
		$this->f3->set('data17', $data17);
		$this->f3->set('data18', $data18);
		$this->f3->set('data19', $data19);
		$this->f3->set('data40', $data40);
		$this->f3->set('data41', $data41);
		$this->f3->set('data42', $data42);
		$this->f3->set('data20', $data20);
		$this->f3->set('data21', $data21);
		$this->f3->set('data22', $data22);
		$this->f3->set('data23', $data23);
		$this->f3->set('data24', $data24);
		$this->f3->set('data25', $data25);
		$this->f3->set('data26', $data26);
		$this->f3->set('data27', $data27);
		$this->f3->set('data28', $data28);
		$this->f3->set('data29', $data29);
		$this->f3->set('data30', $data30);
		$this->f3->set('data31', $data31);
		$this->f3->set('data4', $data4);
		echo  \Template::instance()->render('wkpis/wkpis_details.php');
		}else{
    $this->f3->set('ShowNav', 'true');
		$this->f3->set('error_message_main', 'البيانات المطلوبه غير متاحه');
		$this->f3->set('error_message_link', 'الرجوع الي الصفحة الرئيسية ');
		$this->f3->set('link','/wkpis/kpi');
		echo  \Template::instance()->render('app_message.html');
		}
    }
		///////////////////////////////
		function updateform() {
		if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
			$kpi = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id ='.$this->f3->get('PARAMS.kpi_id'));
		}else{
			$kpi = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').') AND kpi_id ='.$this->f3->get('PARAMS.kpi_id'));
		}
		if(count($kpi)){
			$this->f3->set('kpis', $kpis);
			$this->f3->set('ShowNav', 'true');
			echo  \Template::instance()->render('wkpis/wkpi_updateform.html');
		}else{
			$this->f3->set('ShowNav', 'true');
			$this->f3->set('error_message_main', 'البيانات المطلوبه غير متاحه');
			$this->f3->set('error_message_link', 'الرجوع الي الصفحة الرئيسية ');
			$this->f3->set('link','/wkpis/list');
 			echo  \Template::instance()->render('app_message.html');
		}
    }
/////////////////
function executeupdate() {
		// priv_admin check
		if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
			$kpi = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id ='.$this->f3->get('PARAMS.kpi_id'));
		}else{
			$kpi = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').') AND kpi_id ='.$this->f3->get('PARAMS.kpi_id'));
		}
		if(count($kpi)){
			exec('Rscript r_file/ind_'.$this->f3->get('PARAMS.kpi_id').'.R '.$this->f3->get('POST.form_fromdate').' '.$this->f3->get('POST.form_todate'), $output, $return_var);
			$from = $this->f3->get('POST.form_fromdate');
 			$to = $this->f3->get('POST.form_todate');
			$this->f3->set('to', $to);
			$this->f3->set('from', $from);
/////////////////////
			$this->f3->set('kpi', $kpi);
			$this->f3->set('ShowNav', 'true');
			/// bar and dounts ///
			$ids = array("1", "2" , "5" , "6" , "13", "28" , "29" , "30" , "33", "34" , "35" , "36" , "37", "38" , "39" , "40");
			$this->f3->set('ids', $ids);
			$file_path = 'r_json/ind_'.$this->f3->get('PARAMS.kpi_id').'.json';
			$file_cont = json_decode($this->f3->read($file_path));
			$caption =     $file_cont->chart->caption ;
			$category =  $file_cont->categories[0]->category ;
			$data =   $file_cont->dataset[0]->data ;
			$data5 =   $file_cont->dataset[0]->seriesname ;
			$data6 =   $file_cont->dataset[1]->seriesname ;
			$data7 =   $file_cont->dataset[2]->seriesname ;
			$data8 =   $file_cont->dataset[3]->seriesname ;
			$data20 =   $file_cont->dataset[4]->seriesname ;
			$data21 =   $file_cont->dataset[5]->seriesname ;
			$data22 =   $file_cont->dataset[6]->seriesname ;
			$data23 =   $file_cont->dataset[7]->seriesname ;
			$data24 =   $file_cont->dataset[8]->seriesname ;
			$data25 =   $file_cont->dataset[9]->seriesname ;
			$data26 =   $file_cont->dataset[10]->seriesname ;
			$data27 =   $file_cont->dataset[11]->seriesname ;
			$data28 =   $file_cont->dataset[12]->seriesname ;
			$data29 =   $file_cont->dataset[13]->seriesname ;
			$data31 =     $file_cont->chart->xAxisName ;
			$data30 =     $file_cont->chart->yAxisName ;
			/////// one series////////
			$id_series = $this->f3->get('PARAMS.kpi_id');
			if($id_series === "1" or $id_series === "2" or $id_series === "5" or $id_series === "6" or $id_series === "13"
			or $id_series === "28"   or $id_series === "29"   or $id_series === "30"  or $id_series === "33"  or $id_series === "34"
			or $id_series === "35"  or $id_series === "36"  or $id_series === "37"  or $id_series === "38" or $id_series === "40"   ){
			$data31 =  $file_cont->chart->xAxisName ;
			$data5 =  $caption ;
			}
			////// test series end////////
			////////////////////////  data9 /////////////
			$data9 =   $file_cont->dataset[4]->data ;
			$json6 = json_encode($data9);
			$num6 = json_decode($json6, true);
			$this->f3->set('num6', $num6);
			////////////////////////  end data7 /////////////
			////////////////////////  data7 /////////////
			$data10 =   $file_cont->dataset[5]->data ;
			$json7 = json_encode($data10);
			$num7 = json_decode($json7, true);
			$this->f3->set('num7', $num7);
			////////////////////////  end data7 /////////////
			////////////////////////  data7 /////////////
			$data11 =   $file_cont->dataset[6]->data ;
			$json8 = json_encode($data11);
			$num8 = json_decode($json8, true);
			$this->f3->set('num8', $num8);
				////////////////////////  end data7 /////////////
				////////////////////////  data7 /////////////
			$data12 =   $file_cont->dataset[7]->data ;
			$json9 = json_encode($data12);
			$num9 = json_decode($json9, true);
			$this->f3->set('num9', $num9);
			////////////////////////  end data7 /////////////
			////////////////////////  data7 /////////////
			$data13 =   $file_cont->dataset[8]->data ;
			$json10 = json_encode($data13);
			$num10 = json_decode($json10, true);
			$this->f3->set('num10', $num10);
				////////////////////////  end data7 /////////////
			////////////////////////  data7 /////////////
			$data14 =   $file_cont->dataset[9]->data ;
			$json11 = json_encode($data14);
			$num11 = json_decode($json11, true);
			$this->f3->set('num11', $num11);
				////////////////////////  end data7 /////////////
				////////////////////////  data7 /////////////
			$data15 =   $file_cont->dataset[10]->data ;
			$json12 = json_encode($data15);
			$num12 = json_decode($json12, true);
			$this->f3->set('num12', $num12);
				////////////////////////  end data7 /////////////
				////////////////////////  data7 /////////////
			$data16 =   $file_cont->dataset[11]->data ;
			$json13 = json_encode($data16);
			$num13 = json_decode($json13, true);
			$this->f3->set('num13', $num13);
			////////////////////////  end data7 /////////////
			$data17 =   $file_cont->dataset[12]->data ;
			$json14 = json_encode($data17);
			$num14 = json_decode($json14, true);
			$this->f3->set('num14', $num14);
			////////////////////////  data7 /////////////
			$data18 =   $file_cont->dataset[13]->data ;
			$json15 = json_encode($data18);
			$num15 = json_decode($json15, true);
			$this->f3->set('num15', $num15);
			////////////////////////  end data7 /////////////
			$data19 =   $file_cont->dataset[14]->data ;
			$json16 = json_encode($data19);
			$num16 = json_decode($json16, true);
			$this->f3->set('num16', $num16);
			////////////////////////  data7 /////////////
			$data40 =   $file_cont->dataset[15]->data ;
			$json17 = json_encode($data40);
			$num17 = json_decode($json17, true);
			$this->f3->set('num17', $num17);
			////////////////////////  end data7 /////////////
			////////////////////////  check more series  /////////////
			$data41 =   $file_cont->dataset[16]->data ;
			$json18 = json_encode($data41);
			$num18 = json_decode($json18, true);
			$this->f3->set('num18', $num18);
			$data42 =   $file_cont->dataset[17]->data ;
			$json19 = json_encode($data42);
			$num19 = json_decode($json19, true);
			$this->f3->set('num19', $num19);
			////////////////////////  end data7 /////////////
			$json = json_encode($data);
			$num = json_decode($json, true);
			$this->f3->set('num', $num);
			//  data 2
			$data2 =   $file_cont->dataset[1]->data ;
			$json3 = json_encode($data2);
			$num3 = json_decode($json3, true);
			// var_dump ( $book3 );
			$this->f3->set('num3', $num3);
			$this->f3->set('data2', $data2);
			//  data 3
			$data3 =   $file_cont->dataset[2]->data ;
			$json4 = json_encode($data3);
			$num4 = json_decode($json4, true);
			$this->f3->set('num4', $num4);
			$this->f3->set('data3', $data3);
			//  data 3
			$data4 =   $file_cont->dataset[3]->data ;
			$json5 = json_encode($data4);
			$num5 = json_decode($json5, true);
			$this->f3->set('num5', $num5);
			$this->f3->set('data4', $data4);
			//  category
			$json2 = json_encode($category);
			$num2 = json_decode($json2, true);
			$this->f3->set('num2', $num2);
			$this->f3->set('file_cont', $file_cont);
			$this->f3->set('caption', $caption);
			$this->f3->set('category', $category);
			$this->f3->set('data', $data);
			$this->f3->set('data5', $data5);
			$this->f3->set('data6', $data6);
			$this->f3->set('data7', $data7);
			$this->f3->set('data8', $data8);
			$this->f3->set('data9', $data9);
			$this->f3->set('data10', $data10);
			$this->f3->set('data11', $data11);
			$this->f3->set('data12', $data12);
			$this->f3->set('data13', $data13);
			$this->f3->set('data14', $data14);
			$this->f3->set('data15', $data15);
			$this->f3->set('data16', $data16);
			$this->f3->set('data17', $data17);
			$this->f3->set('data18', $data18);
			$this->f3->set('data19', $data19);
			$this->f3->set('data40', $data40);
			$this->f3->set('data41', $data41);
			$this->f3->set('data42', $data42);
			$this->f3->set('data20', $data20);
			$this->f3->set('data21', $data21);
			$this->f3->set('data22', $data22);
			$this->f3->set('data23', $data23);
			$this->f3->set('data24', $data24);
			$this->f3->set('data25', $data25);
			$this->f3->set('data26', $data26);
			$this->f3->set('data27', $data27);
			$this->f3->set('data28', $data28);
			$this->f3->set('data29', $data29);
			$this->f3->set('data30', $data30);
			$this->f3->set('data31', $data31);
			$this->f3->set('data4', $data4);
			if($return_var !== 0){
			$this->f3->set('ShowNav', 'true');
			$this->f3->set('error_message_main', 'البيانات المطلوبه غير متاحه');
			$this->f3->set('error_message_link', 'الرجوع الي الصفحة الرئيسية ');
			$this->f3->set('link','/wkpis/kpi');
 			//////////////////////////
 			$this->f3->set('kpi', $kpi);
 			$this->f3->set('ShowNav', 'true');
 			echo  \Template::instance()->render('wkpis/wkpis_details.php');
			}
			else{
				echo  \Template::instance()->render('wkpis/wkpis_details.php');
			}
		}else{
				$this->f3->set('ShowNav', 'true');
 				$this->f3->set('errorMessage', 'البيانات المطلوبه غير متاحه');
				echo ($this->f3->get('errorMessage'));
				echo  \Template::instance()->render('app_message.html');
				}
    }
		///modal ////
		function modal() {
			$this->f3->set('ShowNav', 'true');
		  echo  \Template::instance()->render('wkpis/wkpis_modal.html');
		}
 	///modal ////
		function date() {
			echo  \Template::instance()->render('wkpis/wkpis_datepicker.php');
		}
}
?>
