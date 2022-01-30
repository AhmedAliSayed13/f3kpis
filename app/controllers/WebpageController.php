<?php
class WebpageController extends Controller {
    function welcome() {

        echo  \Template::instance()->render('welcome.html');
    }
	function getUser($f3) {
        $db=new DB\SQL(
    'mysql:host=localhost;port=3306;dbname=contractors_pm3',
    'root',
    ''
);
	//echo var_dump($db);
	$f3->set('result',$db->exec('SELECT ID, P_CONTRACT_NAME FROM p_data LIMIT 10 OFFSET 0'));
	//echo Template::instance()->render('abc.htm');
	echo  \Template::instance()->render('template.html');

    }
	function display($f3) {
        //echo 'I cannot object to an object';
		$f3->set('lang',' اللغه العربية الجميله ');
		echo  \Template::instance()->render('template.html');
    }
}
