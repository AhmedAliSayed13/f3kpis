
<!DOCTYPE html>

<html>

   <head>
     <link rel="stylesheet" href="<?= ($BASE) ?>/ui/css/style.css"/>
     <link href="<?= ($BASE) ?>/ui/css/style.css" type="text/css" rel="stylesheet" />  
      <?php echo $this->render('/layouts/header.html',NULL,get_defined_vars(),0); ?>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
<style>

.login-page .left-side .logo-box{

   top:30%;
}
.login-page .right-side .form-group input{
  height: 55px
}
.login-page .right-side .form-group {
    margin-bottom: 5.5px;
  }
.form_btn{
      margin-bottom: 62.5px;
}
.login-page .right-side h3{
  font-size: 24px !important;
    font-weight: bold;
}
.login-page .right-side .form-group label, .forgot-password .right-side .form-group label {
    height: 57px;
  }
  .login-page .right-side .form-group button[type=submit]{
    padding: 1px;
    margin-top: 13px;
  }
  .clearfix span{
    color: red
  }
</style>
   <body>
     <div class="login-page">
       <div class="container-row">
         <div class="row">
           <div class="col-lg-4 col-sm-12 left-side">
             <div class="logo-box"><img src="<?= ($BASE) ?>/ui/images/logo.png" alt="Logo"/></div>
           </div>
           <div class="col-lg-6 col-sm-12 right-side">
             <h3>لوحة القادة لمؤشرات أداء مشاريع وكالة المشاريع و الصيانة</h3>
             <div class="clearfix" >
            <form action="/wkpis/home" class="  needs-validation" method="POST" novalidate >

                <div class="form-group">
                  <label for="name">اسم المستخدم</label>
                  <input class="form-control" type="text"  id="form_username"  name="form_username" required/>
                  <div class="invalid-feedback">يرجى ادخال اسم المستخدم.</div>
                </div>
                <div class="form-group form_btn">
                  <label for="password">كلمة المرور </label>
                  <input class="form-control" type="password" id="form_password" name="form_password" required />
                  <div class="invalid-feedback">يرجي ادخال كلمة المرور.</div>
                </div>

               <span> <?= ($error_message_main) ?> </span>

                <div class="form-group ">
                  <button class="btn btn-primary" type="submit">دخول</button>

                </div>
            </form>

      </div>
    </div>
  </div>
</div>

<script>
// Disable form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Get the forms we want to add validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

</script>
         <?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>
</body>

</html>
