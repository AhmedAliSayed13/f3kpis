<?php
class KpisController extends Controller {
	function beforeroute() {
		 // check for user session
		 if($this->f3->get('SESSION.user[0]["usr_id"]') === null ) {
         $this->f3->reroute('/login');
		 exit;
		}
        }
		function list() {
//		echo ("kpis")." </br>";
//		var_dump ($this->f3->get('SESSION'));
//		echo (" <hr/>");

		// priv_admin check
		if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
			$kpis = $this->db->exec('SELECT * FROM kpis_kpi');


		}else{
			$kpis = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').')  ');
			//$kpis = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id IN (:name)', array(':name'=>$this->f3->get('SESSION.user[0]["kpis_ids"]')));

		}

		//echo ('SELECT * FROM kpis_kpi WHERE kpi_id IN (?)   '. $this->f3->get('SESSION.user[0]["kpis_ids"]'));
		//echo ('SELECT * FROM kpis_kpi WHERE kpi_id IN ('. $this->f3->get('SESSION.user[0]["kpis_ids"]').')');
//		var_dump ($kpis);
		if(count($kpis)){
		$this->f3->set('kpis', $kpis);
		echo  \Template::instance()->render('kpis_list.html');
		}

		//echo  \Template::instance()->render('kpis_list.html');

		//$this->f3->set('errorMessage', 'تفاصيل الخطأ و كيفية حدوثه');
		//echo ($this->f3->get('errorMessage'));
		//echo  \Template::instance()->render('app_message.html');

		//var_dump ($this->f3->get('SESSION.user[0]["usr_id"]') === null );

        //echo  \Template::instance()->render('logout.html');
    }
		function details() {
//		echo ("kpi details")." </br>";
//		var_dump ($this->f3->get('SESSION'));
//		echo (" <hr/>");
//		var_dump ($this->f3->get('PARAMS.kpi_id'));
		//var_dump ($this->f3->get('PARAMS'));
//		echo (" <hr/>");

		// priv_admin check
		if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
			$kpi = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id ='.$this->f3->get('PARAMS.kpi_id'));


		}else{
			$kpi = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').') AND kpi_id ='.$this->f3->get('PARAMS.kpi_id'));
			//$kpi = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id IN (:name)', array(':name'=>$this->f3->get('SESSION.user[0]["kpis_ids"]')));

		}

		//echo ('SELECT * FROM kpis_kpi WHERE kpi_id ='.$this->f3->get('PARAMS.kpi_id'));
		//echo ('SELECT * FROM kpis_kpi WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').') AND kpi_id ='.$this->f3->get('PARAMS.kpi_id'));
		//echo ('SELECT * FROM kpis_kpi WHERE kpi_id IN (?)   '. $this->f3->get('SESSION.user[0]["kpis_ids"]'));
		//echo ('SELECT * FROM kpis_kpi WHERE kpi_id IN ('. $this->f3->get('SESSION.user[0]["kpis_ids"]').')');
//		var_dump ($kpi);
		if(count($kpi)){
		$this->f3->set('kpi', $kpi);
		echo  \Template::instance()->render('kpis_details.html');
		}else{
		$this->f3->set('errorMessage', 'البيانات المطلوبه غير متاحه');
		echo ($this->f3->get('errorMessage'));
		echo  \Template::instance()->render('app_message.html');
		}

		//echo  \Template::instance()->render('kpis_list.html');

		//$this->f3->set('errorMessage', 'تفاصيل الخطأ و كيفية حدوثه');
		//echo ($this->f3->get('errorMessage'));
		//echo  \Template::instance()->render('app_message.html');

		//var_dump ($this->f3->get('SESSION.user[0]["usr_id"]') === null );

        //echo  \Template::instance()->render('logout.html');
    }
		function updateform() {

		//var_dump(in_array($this->f3->get('PARAMS.kpi_id'), explode(',', $this->f3->get('SESSION.user[0]["kpis_ids"]')), true));
		//die;

		// priv_admin check
		if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
			$kpi = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id ='.$this->f3->get('PARAMS.kpi_id'));


		}else{
			$kpi = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').') AND kpi_id ='.$this->f3->get('PARAMS.kpi_id'));

		}

		// priv_admin check
		if(count($kpi)){
			echo  \Template::instance()->render('kpi_updateform.html');
		}else{
			$this->f3->set('errorMessage', 'البيانات المطلوبه غير متاحه');
			echo ($this->f3->get('errorMessage'));
			echo  \Template::instance()->render('app_message.html');
		}


    }
		function executeupdate() {
		echo ("kpi execute update")." </br>";
		var_dump ($this->f3->get('SESSION'));
		echo (" <hr/>");
		var_dump ($this->f3->get('PARAMS.kpi_id'));
		//var_dump ($this->f3->get('PARAMS'));
		echo (" <hr/>");

		// priv_admin check
		if($this->f3->get('SESSION.user[0]["priv_admin"]') === 'Y'){
			$kpi = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id ='.$this->f3->get('PARAMS.kpi_id'));


		}else{
			$kpi = $this->db->exec('SELECT * FROM kpis_kpi WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').') AND kpi_id ='.$this->f3->get('PARAMS.kpi_id'));

		}

		//echo ('SELECT * FROM kpis_kpi WHERE kpi_id ='.$this->f3->get('PARAMS.kpi_id'));
		echo ('SELECT * FROM kpis_kpi WHERE kpi_id IN ('.$this->f3->get('SESSION.user[0]["kpis_ids"]').') AND kpi_id ='.$this->f3->get('PARAMS.kpi_id'));
		var_dump ($kpi);
		if(count($kpi)){
		//$this->f3->set('kpi', $kpi);
		//echo  \Template::instance()->render('kpis_details.html');
echo ('Rscript')."<br/>";
echo ($this->f3->get('PARAMS.kpi_id'))."<br/>";
echo ($this->f3->get('POST.form_fromdate'))."<br/>";
echo ($this->f3->get('POST.form_todate'))."<br/>";

//exec('Rscript ind_1.R '.$this->f3->get('POST.form_fromdate').' '.$this->f3->get('POST.form_todate'), $output, $return_var);
//exec('Rscript ind_'.$this->f3->get('PARAMS.kpi_id').'.R '.$this->f3->get('POST.form_fromdate').' '.$this->f3->get('POST.form_todate'), $output, $return_var);
exec('Rscript RCODE/ind_'.$this->f3->get('PARAMS.kpi_id').'.R '.$this->f3->get('POST.form_fromdate').' '.$this->f3->get('POST.form_todate'), $output, $return_var);
if($return_var !== 0){
// exec is successful only if the $return_var was set to 0. !== means equal and identical, that is it is an integer and it also is zero.
    echo "Rscript was not executed : ";
	print_r($output);
}
else{
    echo "Rscript Executed Successfully . ";

}


		}else{
		$this->f3->set('errorMessage', 'البيانات المطلوبه غير متاحه');
		echo ($this->f3->get('errorMessage'));
		echo  \Template::instance()->render('app_message.html');
		}

    }


}
