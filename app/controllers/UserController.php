<?php
class UserController extends Controller {


    function beforeroute()
    {
        // check for user session
        if ($this->f3->get('SESSION.user[0]["usr_id"]') === null) {
            $this->f3->reroute('/login');
            exit;
        }
    }
    function ChangePassword() {
        $this->f3->set('ShowNav', 'true');
        echo  \Template::instance()->render('user/changePassword.html');
    }
    function saveChangePassword() {
        $this->f3->set('ShowNav', 'true');
        $validator = Validator::instance()->validate($this->f3->get('POST'), array(
            'newPassword' => 'required',
            'confirmPassword' => 'required',
            'oldPassword' => 'required'

        ),['required'=>'هذه الحقل الزامي','confirmed'=>'الرقم السري الجديد غير متطابق']);
        if(!$validator->passed()){
            $errors=$validator->errors();
            $this->f3->set('errors',$errors);
            echo  \Template::instance()->render('user/changePassword.html');
        }else{
            $user = $this->db->exec('SELECT * FROM users_usr  WHERE usr_name ="'.$this->f3->get('SESSION.user[0]["usr_name"]').'"  LIMIT 1   ');
            if(! ($user[0]["usr_password"]===hash (  'sha256' ,$this->f3->get("POST.oldPassword") ))){
                // no user found
                $this->f3->set('error', ' عفوا كلمة المرور الحالية غير صحيحة ');
                echo  \Template::instance()->render('user/changePassword.html');
            } else if(!($this->f3->get("POST.newPassword")==$this->f3->get("POST.confirmPassword"))){
               $this->f3->set('error', ' عفوا كلمة المرور الجديدة غير مطابقة ');
               echo  \Template::instance()->render('user/changePassword.html');
           } else{
               $this->db->exec("UPDATE users_usr SET users_usr.usr_password = '".hash (  'sha256' ,$this->f3->get("POST.newPassword") )."'  WHERE users_usr.usr_name = '".$this->f3->get('SESSION.user[0]["usr_name"]')."' ; ");
               $this->f3->set('success', 'تم تغيير كلمة السر بنجاح');
               echo  \Template::instance()->render('user/changePassword.html');
           }
        }
    }
    function showEditAccountInformation() {
        $this->f3->set('ShowNav', 'true');
        echo  \Template::instance()->render('user/editAccount.html');
    }
    function saveEditAccountInformation() {
        $this->f3->set('ShowNav', 'true');
        $rules=array('required'=>'هذه الحقل الزامي','email'=>'البريد الالكتروني غير صالح','numeric'=>'ادخل ارقام فقط');
        $validator = Validator::instance()->validate($this->f3->get('POST'), array(
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'name' => 'required'
        ),$rules);
        if(!$validator->passed()){
            $errors=$validator->errors();
            $this->f3->set('errors',$errors);
            echo  \Template::instance()->render('user/editAccount.html');
        } else{
            $this->db->exec("UPDATE users_usr SET users_usr.name ='".$this->f3->get("POST.name")."' , users_usr.phone = '".$this->f3->get("POST.phone")."'  , users_usr.email = '".$this->f3->get("POST.email")."'  WHERE users_usr.usr_name = '".$this->f3->get('SESSION.user[0]["usr_name"]')."' ; ");
            //$user = $this->db->exec('SELECT * FROM users_usr  WHERE usr_name ="'.$this->f3->get("POST.form_username").'" ;   ');
            $this->f3->set('SESSION.user[0]["phone"]', $this->f3->get("POST.phone"));
            $this->f3->set('SESSION.user[0]["name"]', $this->f3->get("POST.name"));
            $this->f3->set('SESSION.user[0]["email"]', $this->f3->get("POST.email"));
            $this->f3->set('success', 'تم تعديل الحساب بنجاح');
            echo  \Template::instance()->render('user/editAccount.html');
        }
    }
    function test() {
//        $this->f3->set('ShowNav', 'true');
//        $this->f3->set('ShowNav', 'true');
//        echo  \Template::instance()->render('projection/test.html');
      $this->f3->get('user');
    }
}
