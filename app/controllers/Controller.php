<?php
class Controller {
    
	protected $f3;
    protected $db;

    function beforeroute() {
    }

    function afterroute() {
    }

    function __construct() {

        $f3=Base::instance();

        $db=new DB\SQL(
            $f3->get('db_dns') . $f3->get('db_name'),
            $f3->get('db_user'),
            $f3->get('db_pass'),
			array( \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION )
        );

	$this->f3=$f3;
	$this->db=$db;
    }
}