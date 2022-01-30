<?php
class ProtectedController extends Controller {
	function beforeroute() {
		 // check for user session
		 if($this->f3->get('SESSION.user[0]["usr_id"]') === null ) {
         $this->f3->reroute('/login');
		 exit;
		//print_r(array('<script>alert("No, session '.$this->f3->get('SESSION.user[0]["usr_id"]').'")</script>'));
		//echo  \Template::instance()->render('error.html');
		//echo  \Template::instance()->render('login.html');
		//exit;
		}
        }
		function another() {
		echo ("another content")." </br>";
		var_dump ($this->f3->get('SESSION'));
		$this->f3->set('errorMessage', 'تفاصيل الخطأ و كيفية حدوثه');
		//echo ($this->f3->get('errorMessage'));
		
		echo  \Template::instance()->render('app_message.html');
		//$this->f3->reroute('/error');
		//var_dump ($this->f3->get('SESSION.user[0]["usr_id"]') === null );

        //echo  \Template::instance()->render('logout.html');
    }
		
	

	
}