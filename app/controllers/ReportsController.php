<?php
class ReportsController extends Controller {
	function beforeroute() {
		 // check for user session
		 if($this->f3->get('SESSION.user[0]["usr_id"]') === null ) {
         $this->f3->reroute('/login');
		 exit;
		 }
    }
    function datepicker() {
    	$this->f3->set('ShowNav', 'true');
      echo  \Template::instance()->render('reports/datepicker.php');
    }
		function list() {
		// priv_admin check
		if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
			$reports = $this->db->exec('SELECT * FROM reports_rep');
		}
		else{
					$reports = $this->db->exec('SELECT * FROM reports_rep   WHERE rep_id IN ('.$this->f3->get('SESSION.user[0]["reports_ids"]').')  ');
    }
		if(count($reports)){
    $ids1 = array("1", "2" , "3" , "4" , "5");
		$ids2 = array("6", "7" , "8" , "9" , "10");
		$ids3 = array("11", "12" , "13" );
		$ids4 = array("14", "15" );
		$ids5 = array( "16" );
		$ids6 = array( "17" , "18");
		$ids7 = array("19", "20" );
		$ids8 = array("21", "22" );
		$ids9 = array("23", "24" );
		$ids10 = array("25", "26" );
		$ids11 = array("27", "28" , "29" );
		$ids12 = array("30", "31" , "32" , "33" , "34");
		$ids13 = array("35", "36" , "37" , "38" , "39");
		$ids14 = array("40", "41" , "42" );
		$ids15 = array("43", "44" );
		$ids16 = array("45");
		$ids17 = array("46", "47" );
		$ids18 = array("48", "49");
 		$this->f3->set('ShowNav', 'true');
  	$this->f3->set('reports', $reports);
		$this->f3->set('category', $category);
		$this->f3->set('ids1', $ids1);
		$this->f3->set('ids2', $ids2);
		$this->f3->set('ids3', $ids3);
		$this->f3->set('ids4', $ids4);
		$this->f3->set('ids5', $ids5);
		$this->f3->set('ids6', $ids6);
		$this->f3->set('ids7', $ids7);
		$this->f3->set('ids8', $ids8);
		$this->f3->set('ids9', $ids9);
		$this->f3->set('ids10', $ids10);
		$this->f3->set('ids11', $ids11);
		$this->f3->set('ids12', $ids12);
		$this->f3->set('ids13', $ids13);
		$this->f3->set('ids14', $ids14);
		$this->f3->set('ids15', $ids15);
		$this->f3->set('ids16', $ids16);
		$this->f3->set('ids17', $ids17);
		$this->f3->set('ids18', $ids18);
		echo  \Template::instance()->render('reports/reports_list.html');
	  	}
		}
	 function list2() {
	 // priv_admin check
	 if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
		 $reports = $this->db->exec('SELECT * FROM reports_rep');
	 }
	 else{
		 $reports = $this->db->exec('SELECT * FROM reports_rep   WHERE rep_id IN ('.$this->f3->get('SESSION.user[0]["reports_ids"]').')  ');
	 }
	 if(count($reports)){
   $this->f3->set('ShowNav', 'true');
	 $this->f3->set('reports', $reports);
	 $this->f3->set('category', $category);
	 echo  \Template::instance()->render('reports/reports_list2.html');
	  }
	 }
   function details() {
		// priv_admin check
    if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
      $reports = $this->db->exec('SELECT * FROM reports_rep where rep_id ='.$this->f3->get('PARAMS.rep_id'));
    }else{
      $reports = $this->db->exec('SELECT * FROM reports_rep  where rep_id IN ('.$this->f3->get('SESSION.user[0]["reports_ids"]').') and  rep_id ='.$this->f3->get('PARAMS.rep_id'));
					}
 		if(count($reports)){
		 $this->f3->set('reports', $reports);
		 $this->f3->set('ShowNav', 'true');
		 $from = $this->f3->get('POST.form_fromdate');
		 $to = $this->f3->get('POST.form_todate');
		 $this->f3->set('to', $to);
		 $this->f3->set('from', $from);
		 echo  \Template::instance()->render('reports/reports_details.php');
		 }else{
     $this->f3->set('ShowNav', 'true');
		 $this->f3->set('error_message_main', 'البيانات المطلوبه غير متاحه');
		 $this->f3->set('error_message_link', 'الرجوع الي الصفحة الرئيسية ');
		 $this->f3->set('link','/report/list');
 		 echo  \Template::instance()->render('app_message.html');
		}
  }
	///table ////
	function table() {
	// priv_admin check
	if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
		$reports = $this->db->exec('SELECT * FROM reports_rep where rep_id ='.$this->f3->get('PARAMS.rep_id') );
	}else{
		$reports = $this->db->exec('SELECT * FROM reports_rep  where rep_id ='.$this->f3->get('PARAMS.rep_id'));
				}
	if(count($reports)){
		$ids = array("4");
		$rep_id = $this->f3->get('PARAMS.rep_id');
    $this->f3->set('ids', $ids);
  	$this->f3->set('reports', $reports);
  	$this->f3->set('ShowNav', 'true');
  	$this->f3->set('rep_id', $rep_id);
  	$file_path = 'report_'.$this->f3->get('PARAMS.rep_id').'.R ';
		echo  \Template::instance()->render('reports/table.php');
		}else{
	  $this->f3->set('ShowNav', 'true');
  	$this->f3->set('error_message_main', 'البيانات المطلوبه غير متاحه');
  	$this->f3->set('error_message_link', 'الرجوع الي الصفحة الرئيسية ');
  	$this->f3->set('link','/report/list');
		echo  \Template::instance()->render('app_message.html');
		}
  }
	///table ////
	function table2() {
    // priv_admin check
    if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
    	$reports = $this->db->exec('SELECT * FROM reports_rep where rep_id ='.$this->f3->get('PARAMS.rep_id') );
    }else{
    	$reports = $this->db->exec('SELECT * FROM reports_rep  where rep_id ='.$this->f3->get('PARAMS.rep_id'));
    	}
    if(count($reports)){
    	$rep_id = $this->f3->get('PARAMS.rep_id');
      $this->f3->set('reports', $reports);
      $this->f3->set('rep_id', $rep_id);
      $this->f3->set('ShowNav', 'true');
      $from = "1430-01-01";
      $this->f3->set('from', $from);
      echo  \Template::instance()->render('reports/table2.php');
      }else{
      $this->f3->set('ShowNav', 'true');
      $this->f3->set('error_message_main', 'البيانات المطلوبه غير متاحه');
      $this->f3->set('error_message_link', 'الرجوع الي الصفحة الرئيسية ');
      $this->f3->set('link','/report/list');
      echo  \Template::instance()->render('app_message.html');
      }
     }
    function updateform() {
      if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
  			$reports = $this->db->exec('SELECT * FROM reports_rep');
  		}else{
  			$reports = $this->db->exec('SELECT * FROM reports_rep ');
  		}
  		if(count($reports)){
			$this->f3->set('reports', $reports);
			$this->f3->set('ShowNav', 'true');
			echo  \Template::instance()->render('reports/reports_updateform.html');
		}else{
			$this->f3->set('ShowNav', 'true');
			$this->f3->set('error_message_main', 'البيانات المطلوبه غير متاحه');
			$this->f3->set('error_message_link', 'الرجوع الي الصفحة الرئيسية ');
			$this->f3->set('link','/report/list');
 			echo  \Template::instance()->render('app_message.html');
		}
   }
		/////////////////
		function executeupdate() {
    if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
      $reports = $this->db->exec('SELECT * FROM reports_rep where  rep_id ='.$this->f3->get('PARAMS.rep_id') );
    }else{
      $reports = $this->db->exec('SELECT * FROM reports_rep where rep_id IN ('.$this->f3->get('SESSION.user[0]["reports_ids"]').') and  rep_id ='.$this->f3->get('PARAMS.rep_id'));
    }
		if(count($reports)){
			if( $this->f3->get('POST.form_contractor_id') != ''){
      exec('Rscript r_file/report_'.$this->f3->get('PARAMS.rep_id').'.R '.$this->f3->get('POST.form_fromdate').' '.$this->f3->get('POST.form_todate').' '.$this->f3->get('POST.form_contractor_id'), $output, $return_var);
			$cont = $this->db->exec('SELECT * FROM contractors_cont where  cont_id ='.$this->f3->get('POST.form_contractor_id') );
		}
		else{
		exec('Rscript r_file/report_'.$this->f3->get('PARAMS.rep_id').'.R '.$this->f3->get('POST.form_fromdate').' '.$this->f3->get('POST.form_todate'), $output, $return_var);
		}
        if($return_var !== 0){
					$this->f3->set('reports', $reports);
					$from = $this->f3->get('POST.form_fromdate');
					$to = $this->f3->get('POST.form_todate');
					$this->f3->set('to', $to);
					$this->f3->set('from', $from);
					$this->f3->set('cont', $cont);
					$this->f3->set('ShowNav', 'true');
       echo  \Template::instance()->render('reports/reports_details.php');
        }
      else{
				$this->f3->set('reports', $reports);
				$from = $this->f3->get('POST.form_fromdate');
				$to = $this->f3->get('POST.form_todate');
				$this->f3->set('to', $to);
				$this->f3->set('from', $from);
				$this->f3->set('ShowNav', 'true');
				$this->f3->set('cont', $cont);
				echo  \Template::instance()->render('reports/reports_details.php');
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
    	if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
    		$reports = $this->db->exec('SELECT * FROM reports_rep');
        $rep_idd = $this->f3->get('PARAMS.rep_id') ;
    	}else{
    		$reports = $this->db->exec('SELECT * FROM reports_rep  where rep_id ='.$this->f3->get('PARAMS.rep_id'));
    		$rep_idd = $this->f3->get('PARAMS.rep_id') ;
    	}
    	if(count($reports)){
    		$ids2 = array("1", "2" , "3", "5" ,"6" , "7" , "8" ,"9");
    		$ids = array("4" );
        $this->f3->set('ids', $ids);
        $this->f3->set('ids2', $ids2);
        $this->f3->set('reports', $reports);
      	$this->f3->set('rep_idd', $rep_idd);
      	$this->f3->set('ShowNav', 'true');
        echo  \Template::instance()->render('reports/report_modal.html');
    }
   }
	///date ////
	function date() {
		if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
			$reports = $this->db->exec('SELECT * FROM reports_rep');
	    $rep_idd = $this->f3->get('PARAMS.rep_id') ;
	    $conts = $this->db->exec('SELECT * FROM contractors_cont ');
		}else{
			$reports = $this->db->exec('SELECT * FROM reports_rep  where rep_id ='.$this->f3->get('PARAMS.rep_id'));
			$rep_idd = $this->f3->get('PARAMS.rep_id') ;
	    $conts = $this->db->exec('SELECT * FROM contractors_cont ');
	 				}
		 if(count($reports)){
	    $ids = array("21", "23" , "25", "28" );
	    $this->f3->set('ids', $ids);
	    $this->f3->set('reports', $reports);
	  	$this->f3->set('rep_idd', $rep_idd);
	    $this->f3->set('conts', $conts);
	  	$this->f3->set('ShowNav', 'true');
	    echo  \Template::instance()->render('reports/datepicker.php');
	  }
	 }
 ////////executeupdate2/////////
 function tables() {
     if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
       $reports = $this->db->exec('SELECT * FROM reports_rep where  rep_id ='.$this->f3->get('PARAMS.rep_id') );
     }else{
       $reports = $this->db->exec('SELECT * FROM reports_rep where rep_id IN ('.$this->f3->get('SESSION.user[0]["reports_ids"]').') and  rep_id ='.$this->f3->get('PARAMS.rep_id'));
     }
   		if(count($reports)){
			$from = "1429-01-01";
			$to = $this->f3->get('PARAMS.to');
 			exec('Rscript r_file/report_'.$this->f3->get('PARAMS.rep_id').'.R '.$from.' '.$to, $output, $return_var);
     if($return_var !== 0){
 			  $this->f3->set('to', $to);
			  $this->f3->set('from', $from);
			  $this->f3->set('reports', $reports);
 			  $this->f3->set('ShowNav', 'true');
        echo  \Template::instance()->render('reports/reports_details.php');
         }
     else{
			 $this->f3->set('ShowNav', 'true');
       $this->f3->set('to', $to);
       $this->f3->set('from', $from);
 		   $this->f3->set('reports', $reports);
			echo  \Template::instance()->render('reports/reports_details.php');
       }
      }else{
          $this->f3->set('ShowNav', 'true');
       		$this->f3->set('errorMessage', 'البيانات المطلوبه غير متاحه');
       		echo ($this->f3->get('errorMessage'));
       		echo  \Template::instance()->render('app_message.html');
       	}
     }
}
?>
