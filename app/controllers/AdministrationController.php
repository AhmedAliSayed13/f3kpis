<?php
class AdministrationController extends Controller {
    function form() {
        echo  \Template::instance()->render('login.html');
    }
	 function administration_list_users() {
         $this->f3->set('ShowNav', 'true');
         $priv_admin=$this->f3->get('SESSION.user[0]["priv_admin"]');
         if($priv_admin!='Y'){
             $this->f3->reroute('/privilege');
         }
         else{
             //get all users
             $users = $this->db->exec('SELECT * FROM users_usr where usr_id!= '.$this->f3->get("SESSION.user[0][usr_id]").';');
             //print_r($users);
             $count=count($users);
             $this->f3->set('users',$users);
             $this->f3->set('count',$count);
             $this->f3->get('SESSION.user_pradministration_list_usersiv_admin');
             echo  \Template::instance()->render('administration/list-users.html');
         }
     }
     function privilege() {
         echo  \Template::instance()->render('privilege.html');
     }
     function administration_edit_user_show($f3,$PARAMS) {
         $this->f3->set('ShowNav', 'true');
         $id=$f3->get('PARAMS.count');
         $edit_user = $this->db->exec('SELECT * FROM users_usr where usr_id='.$id.' LIMIT 1  ');
         $kpis_kpis = $this->db->exec('SELECT * FROM kpis_kpi ');
         $projections_prjs = $this->db->exec('SELECT * FROM projections_prj ');
         $reports_reps = $this->db->exec('SELECT * FROM reports_rep ');
         $this->f3->set('edit_user',$edit_user);
         $user_kpis_ids= $this->convertStringToArray($edit_user[0]['kpis_ids']);
         $user_projections_ids= $this->convertStringToArray($edit_user[0]['projections_ids']);
         $user_reports_ids= $this->convertStringToArray($edit_user[0]['reports_ids']);
         $this->f3->set('user_kpis_ids',$user_kpis_ids);
         $this->f3->set('user_projections_ids',$user_projections_ids);
         $this->f3->set('user_reports_ids',$user_reports_ids);
         $this->f3->set('saveEditUser',$user_reports_ids);
         $this->f3->set('kpis_kpis',$kpis_kpis);
         $this->f3->set('projections_prjs',$projections_prjs);
         $this->f3->set('reports_reps',$reports_reps);
         echo  \Template::instance()->render('administration/edit-user.html');
     }
     function saveEditUser() {
         $this->f3->set('ShowNav', 'true');
        $user_id=$this->f3->get("POST.user_id");
        $priv_admin=$this->f3->get("POST.priv_admin");
        if($priv_admin=='Y'){
            $this->db->exec("UPDATE users_usr SET users_usr.priv_admin = '".$priv_admin."',kpis_ids='',projections_ids='',reports_ids=''  WHERE usr_id = ".$user_id." ; ");
            $this->f3->reroute($this->f3->get('SERVER.HTTP_REFERER'));
        }
        else{
            $kpis_kpis=$this->f3->get("POST.kpis_kpis");
            $projections_prjs=$this->f3->get("POST.projections_prjs");
            $reports_ids=$this->f3->get("POST.reports_ids");
            $kpis=$this->convertArrayToString($kpis_kpis);
            $projections=$this->convertArrayToString($projections_prjs);
            $reports=$this->convertArrayToString($reports_ids);
            $this->db->exec("UPDATE users_usr SET users_usr.priv_admin = ' ',kpis_ids='".$kpis."',projections_ids='".$projections."',reports_ids='".$reports."'  WHERE usr_id = ".$user_id." ; ");
            $this->f3->reroute($this->f3->get('SERVER.HTTP_REFERER'));
        }
     }
        function convertArrayToString($array){
            $str='';
            if($array!=null){

                $str= implode(', ', $array);
            }
            return $str;
        }
        function convertStringToArray($str){
            $array=[];
            if($str!=null){
                $array=explode(',', $str);
            }
            return $array;
        }
        function addUser() {
            $this->f3->set('ShowNav', 'true');
            $priv_admin=$this->f3->get('SESSION.user[0]["priv_admin"]');
            if($priv_admin!='Y'){
                $this->f3->reroute('/privilege');
            } else{

                $kpis_kpis = $this->db->exec('SELECT * FROM kpis_kpi ');
                $projections_prjs = $this->db->exec('SELECT * FROM projections_prj ');
                $reports_reps = $this->db->exec('SELECT * FROM reports_rep ');
                $this->f3->set('kpis_kpis',$kpis_kpis);
                $this->f3->set('projections_prjs',$projections_prjs);
                $this->f3->set('reports_reps',$reports_reps);
                echo  \Template::instance()->render('administration/add-user.html');
            }
        }
        function saveAddUser() {
            $this->f3->set('ShowNav', 'true');
            $validator = Validator::instance()->validate($this->f3->get('POST'), array(
                'name' => 'required',
                'email' => 'required|email',
                'username' => 'required',
                'phone' => 'required|numeric',
                'Password' => 'required',
                'confirmPassword' => 'required',
            ),['required'=>'هذه الحقل الزامي','email'=>'البريد الالكتروني غير صالح','numeric'=>'ادخل ارقام فقط']);
            $kpis_kpis = $this->db->exec('SELECT * FROM kpis_kpi ');
            $projections_prjs = $this->db->exec('SELECT * FROM projections_prj ');
            $reports_reps = $this->db->exec('SELECT * FROM reports_rep ');
            $this->f3->set('kpis_kpis',$kpis_kpis);
            $this->f3->set('projections_prjs',$projections_prjs);
            $this->f3->set('reports_reps',$reports_reps);
            if(!$validator->passed()){
                $errors=$validator->errors();
    //            print_r($errors);
                $this->f3->set('errors',$errors);
                echo  \Template::instance()->render('administration/add-user.html');
            }
            else{
    //        echo 'pass';
                $email_lists = $this->db->exec("SELECT * FROM users_usr where email='".$this->f3->get("POST.email")."' limit 1;");
                $username_lists = $this->db->exec("SELECT * FROM users_usr where usr_name='".$this->f3->get("POST.username")."' limit 1;");
                if($email_lists!=null){
                    $this->f3->set('error', ' البريد الالكتروني مستخدم من قبل ');
                    echo  \Template::instance()->render('administration/add-user.html');
                }elseif ($username_lists!=null){
                    $this->f3->set('error', 'اسم المستخدم تم استخدامه من قبل ');
                    echo  \Template::instance()->render('administration/add-user.html');
                }else if(!($this->f3->get("POST.Password")==$this->f3->get("POST.confirmPassword"))){
                    $this->f3->set('error', ' عفوا كلمة المرور الجديدة غير مطابقة ');
                    echo  \Template::instance()->render('administration/add-user.html');
                } else{
                    if($this->f3->get("POST.priv_admin")=='Y'){
                        $this->db->exec("insert into users_usr (usr_name,email,name,phone,usr_password,priv_admin) VALUE ('".$this->f3->get("POST.username")."' ,'".$this->f3->get("POST.email")."','".$this->f3->get("POST.name")."','".$this->f3->get("POST.phone")."','".hash (  'sha256' ,$this->f3->get("POST.Password") )."','".$this->f3->get("POST.priv_admin")."')");
                        $this->f3->set('success', 'تم تغيير كلمة السر بنجاح');
                        echo  \Template::instance()->render('administration/add-user.html');
                    }
                    else{
                        $kpis_kpis=$this->f3->get("POST.kpis_kpis");
                        $projections_prjs=$this->f3->get("POST.projections_prjs");
                        $reports_ids=$this->f3->get("POST.reports_ids");
                        $kpis=$this->convertArrayToString($kpis_kpis);
                        $projections=$this->convertArrayToString($projections_prjs);
                        $reports=$this->convertArrayToString($reports_ids);
                        $this->db->exec("insert into users_usr (usr_name,email,name,phone,usr_password,kpis_ids,projections_ids,reports_ids) VALUE ('".$this->f3->get("POST.username")."' ,'".$this->f3->get("POST.email")."','".$this->f3->get("POST.name")."','".$this->f3->get("POST.phone")."','".hash (  'sha256' ,$this->f3->get("POST.Password") )."','".$kpis."','".$projections."','".$reports."')");
                        $this->f3->set('success', 'تم أنشاء الحساب بنجاح');
                        echo  \Template::instance()->render('administration/add-user.html');
                    }
                }
            }
        }
        function deleteAccountUser($f3){
            $this->f3->set('ShowNav', 'true');
            $id=$f3->get('PARAMS.id');
            $this->db->exec('Delete from  users_usr where usr_id='.$id.';');
            $this->f3->set('success', 'تم حذف الحساب بنجاح');
            $f3->reroute('/admin/list/users');
        }
}
