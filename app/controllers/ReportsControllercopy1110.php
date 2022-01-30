<?php
class ReportsController extends Controller {

	function beforeroute() {
		 // check for user session
		 if($this->f3->get('SESSION.user[0]["usr_id"]') === null ) {
         $this->f3->reroute('/login');
		 exit;
		}
        }

////
function home() {

	$this->f3->set('ShowNav', 'true');
  echo  \Template::instance()->render('wkpis_home.html');
}
////////////////

function datepicker() {

	$this->f3->set('ShowNav', 'true');
  echo  \Template::instance()->render('datepicker.php');
}


 		/////
		function list() {

		// priv_admin check
		if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
			$reports = $this->db->exec('SELECT * FROM reports_rep');
			$category = $this->db->exec('SELECT DISTINCT rep_id , rep_title FROM reports_categories_rcat , reports_rep WHERE rep_root_id = 1 and rep_cat = 4 and rep_cat = rcat_id');

		}else{
			$id = array (
				 array( "pro1" , 4 ),
				 array( "pro2" , 5 ),
				 array( "pro2" , 6 ),

			);

			for($i=0; $i<=6 ; $i++){

					$category = $this->db->exec('SELECT * FROM reports_rep where rep_cat =' .$id[0][1]);
}
 		}

		if(count($category)){

		$this->f3->set('ShowNav', 'true');
  	$this->f3->set('reports', $reports);
		$this->f3->set('category', $category);

		echo  \Template::instance()->render('reports_list.html');
		}

		}

	 ///////////
		function details() {


		// priv_admin check
    if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
      $reports = $this->db->exec('SELECT * FROM reports_rep');


    }else{
      $reports = $this->db->exec('SELECT * FROM reports_rep  where rep_id ='.$this->f3->get('PARAMS.rep_id'));

					}

 		if(count($reports)){
		$this->f3->set('reports', $reports);
		$this->f3->set('ShowNav', 'true');

     $file_path = 'report_'.$this->f3->get('PARAMS.rep_id').'.R ';



		echo  \Template::instance()->render('reports_details.php');
		}else{


     $this->f3->set('ShowNav', 'true');

		$this->f3->set('error_message_main', 'البيانات المطلوبه غير متاحه');
		$this->f3->set('error_message_link', 'الرجوع الي الصفحة الرئيسية ');
		$this->f3->set('link','/report/list');

		echo  \Template::instance()->render('app_message.html');
		}

	}
	//////////////
	///table ////

	function table() {


	// priv_admin check
	if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
		$reports = $this->db->exec('SELECT * FROM reports_rep');


	}else{
		$reports = $this->db->exec('SELECT * FROM reports_rep  where rep_id ='.$this->f3->get('PARAMS.rep_id'));

				}

	if(count($reports)){
		$ids = array("4", "7" );

$this->f3->set('ids', $ids);
	$this->f3->set('reports', $reports);
	$this->f3->set('ShowNav', 'true');

	 $file_path = 'report_'.$this->f3->get('PARAMS.rep_id').'.R ';



	echo  \Template::instance()->render('table.php');
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
	$reports = $this->db->exec('SELECT * FROM reports_rep');


}else{
	$reports = $this->db->exec('SELECT * FROM reports_rep  where rep_id ='.$this->f3->get('PARAMS.rep_id'));

			}

if(count($reports)){
	$ids = array("1", "2" , "5");

$this->f3->set('ids', $ids);
$this->f3->set('reports', $reports);
$this->f3->set('ShowNav', 'true');

 $file_path = 'report_'.$this->f3->get('PARAMS.rep_id').'.R ';



echo  \Template::instance()->render('table2.php');
}else{


 $this->f3->set('ShowNav', 'true');

$this->f3->set('error_message_main', 'البيانات المطلوبه غير متاحه');
$this->f3->set('error_message_link', 'الرجوع الي الصفحة الرئيسية ');
$this->f3->set('link','/report/list');

echo  \Template::instance()->render('app_message.html');
}

}
	// function modal() {
	//
	// 	$this->f3->set('ShowNav', 'true');
	// 	echo  \Template::instance()->render('report_modal.html');
	// }
    ////////////////////
		function updateform() {


      if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
  			$reports = $this->db->exec('SELECT * FROM reports_rep');


  		}else{
  			$reports = $this->db->exec('SELECT * FROM reports_rep ');

  		}

  		if(count($reports)){
			$this->f3->set('reports', $reports);
			$this->f3->set('ShowNav', 'true');

			echo  \Template::instance()->render('reports_updateform.html');
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
    $reports = $this->db->exec('SELECT * FROM reports_rep');


  }else{
    $reports = $this->db->exec('SELECT * FROM reports_rep ');

  }

		if(count($reports)){

exec('Rscript RCODE/report_'.$this->f3->get('PARAMS.rep_id').'.R '.$this->f3->get('POST.form_fromdate').' '.$this->f3->get('POST.form_todate'), $output, $return_var);
// if($return_var !== 0){
// $this->f3->set('ShowNav', 'true');
// $this->f3->set('error_message_main', 'البيانات المطلوبه غير متاحه');
// $this->f3->set('error_message_link', 'الرجوع الي الصفحة الرئيسية ');
// $this->f3->set('link','/report/details');
//
//
// echo  \Template::instance()->render('reports_details.php');
// }
// else{
// 	echo  \Template::instance()->render('reports_details.php');


 	echo  \Template::instance()->render('reports_details.php');

}
		else{
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


	}else{
		$reports = $this->db->exec('SELECT * FROM reports_rep  where rep_id ='.$this->f3->get('PARAMS.rep_id'));

				}

	if(count($reports)){
		$ids2 = array("1", "2" , "3", "5");
		$ids = array("4", "7" );

$this->f3->set('ids', $ids);
$this->f3->set('ids2', $ids2);

	$this->f3->set('reports', $reports);

	$this->f3->set('ShowNav', 'true');
  echo  \Template::instance()->render('report_modal.html');
}

}

////  update modal /////

function updateReport() {

  if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
    $reports = $this->db->exec('SELECT * FROM reports_rep');


  }else{
    $reports = $this->db->exec('SELECT * FROM reports_rep ');
}


  if(count($reports)){
	$this->f3->set('reports', $reports);
	$this->f3->set('ShowNav', 'true');

	echo  \Template::instance()->render('reports_updateform.html');
}else{
	$this->f3->set('ShowNav', 'true');
	$this->f3->set('error_message_main', 'البيانات المطلوبه غير متاحه');
	$this->f3->set('error_message_link', 'الرجوع الي الصفحة الرئيسية ');
	$this->f3->set('link','/wkpis/list');
	echo  \Template::instance()->render('app_message.html');
}

}
/////////////////
function executeReport() {

		// priv_admin check
    if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
      $reports = $this->db->exec('SELECT * FROM reports_rep');


    }else{
      $reports = $this->db->exec('SELECT * FROM reports_rep ');
}


		if(count($reports)){

exec('Rscript RCODE/report_'.$this->f3->get('PARAMS.rep_id').'.R '.$this->f3->get('POST.form_fromdate').' '.$this->f3->get('POST.form_todate'), $output, $return_var);
// if($return_var !== 0){
$this->f3->set('ShowNav', 'true');
$this->f3->set('error_message_main', 'البيانات المطلوبه غير متاحه');
$this->f3->set('error_message_link', 'الرجوع الي الصفحة الرئيسية ');
$this->f3->set('link','/report/list');


//////////////////////////

$this->f3->set('reports', $reports);

$this->f3->set('ShowNav', 'true');


echo  \Template::instance()->render('reports_details.php');
// }



		}else{
					$this->f3->set('ShowNav', 'true');

				$this->f3->set('errorMessage', 'البيانات المطلوبه غير متاحه');
				echo ($this->f3->get('errorMessage'));
				echo  \Template::instance()->render('app_message.html');
				}

    }

//////////////////////
//////////////////////
/////////////////////

////////////////////////////



	 function list22() {
	 // $id={4};
 	 $id = array (
	    array( "pro1" , 4 ),
			array( "pro2" , 5 )
	 );

echo $id[0][1] ;
			 $category = $this->db->exec('SELECT * FROM reports_rep where rep_cat =' .$id[0][1]);

			 $this->f3->set('category', $category);

					 echo  \Template::instance()->render(' reports_list.html');

}



}
