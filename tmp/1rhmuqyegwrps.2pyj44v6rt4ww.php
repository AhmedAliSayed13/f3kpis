<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />

    <title>
        Bootstrap Hijri Date Picker
    </title>


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= ($BASE) ?>/ui/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />



</head>
<style>
.form-control {
  display: inline-block;
    width: 30%;
}
@media (min-width: 576px){
.modal-dialog {
    max-width: 765px;
    margin: 1.75rem auto;
}
}
.modal-content{
  top:200px;
}
.modal-header{
    background: #f8f9fa;
    padding: 3px 13px;

  }
.modal-content {
      width: 850px;
    }
.close{
  position: absolute;
  margin: 16px 0px;
}
.close i{
   color: #951527;
}

</style>
<script>
 
</script>



<body>


<div id="con">
     <button type="button" class="close" data-dismiss="modal"> <i class="fas fa-window-close"></i></button>


<iframe src="<?= ($BASE) ?>/report/datepicker/<?= ($rep_idd) ?>" height="500" width="830" title="Iframe Example" id="name_of_iframe" style="border:none;"></iframe>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script src="<?= ($BASE) ?>/ui/js/bootstrap-hijri-datetimepickermin.js"></script>

<script type="text/javascript">


$(".close").click(function(){
  window.top.location.href = "<?= ($BASE) ?>/report/list";

});

var specifiedElement = document.getElementById('con');

 document.addEventListener('click', function(event) {
  var isClickInside = specifiedElement.contains(event.target);
  if (isClickInside) {
   } else {
    window.top.location.href = "<?= ($BASE) ?>/report/list";
  }
});

    $(function () {

        initDefault();

    });

    function initDefault() {
        $("#hijri-picker1").hijriDatePicker({
            hijri:true,
            showSwitcher:false
        });
        $("#hijri-picker2").hijriDatePicker({
            hijri:true,
            showSwitcher:false
        });
    }

</script>

</body>

</html>
