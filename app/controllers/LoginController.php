<?php
class LoginController extends Controller {
	function login() {
        echo  \Template::instance()->render('login.html');
    }
		function home() {
      if($this->f3->get('SESSION.user[0]["usr_id"]') === null )
        $this->f3->reroute('/login');

	        echo  \Template::instance()->render('wkpis/wkpis_home.html');
	  }
	function logout() {
		$this->f3->clear('SESSION.user');
        $this->f3->reroute('/login');
		echo  \Template::instance()->render('app_message.html');

    }
	function validate() {
		if(!empty($this->f3->get("POST.form_username")) && !empty($this->f3->get("POST.form_password")))
		{
			$user = $this->db->exec('SELECT * FROM users_usr  WHERE usr_name ="'.$this->f3->get("POST.form_username").'" AND usr_password ="'.$this->f3->get("POST.form_password").'" LIMIT 1   ');
			if(count($user)){
			$this->f3->set('SESSION.user', $user);
			$this->f3->set('ShowNav', 'true');

			echo  \Template::instance()->render('wkpis/wkpis_home.html');
			}else{
			// no user found
			$this->f3->set('ShowNav', 'false');
			$this->f3->set('error_message_main', 'عفوا اسم المستخدم او كلمة المرور غير صحيحة');
			$this->f3->set('error_message_link', 'الرجوع الي صفحة التسجيل ');
      $this->f3->set('link','/login');

			echo  \Template::instance()->render('login.html');

			}

		}else{

		$this->f3->set('loginError', 'عفوا لم يتم إدخال اسم المستخدم او كلمة السر');
		$this->f3->set('ShowNav', 'false');

		echo  \Template::instance()->render('login.html');
		}
    }


}
