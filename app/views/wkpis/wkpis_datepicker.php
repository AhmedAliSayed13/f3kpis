<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />

    <title>
        Bootstrap Hijri Date Picker
    </title>


    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{@BASE}}/ui/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />

</head>
<style>
.date-title{
  text-align: center;

}
.form-control {
  display: inline-block;
  width: 80%;
  padding: .375rem 5px;
}

.date-item{
  display: inline-block;
}
.modal-body{
  direction: rtl;
  text-align: center;
}
.date-item {
background: #007bff;
border: none;
padding: 2px 14px 6px;
color: white;
border-radius: 10px;
}

form{
  direction:rtl;

}
.datepicker {
    z-index: 1151;
}
</style>


<body class="bg-light" style="position:relative"  >
  <form method="POST" action="/wkpis/executeupdate/{{@PARAMS.kpi_id}}"   >

<li class="list-inline-item select-date-title">أختيار تاريخ محدد</li>
<li class="list-inline-item">
  <label for="from">من </label>
  <input id="hijri-picker1" type="text" class="form-control" name="form_fromdate"   />
</li>
<li class="list-inline-item">
  <label for="to">إلى</label>
  <input id="hijri-picker2" type="text" class="form-control" name="form_todate"   />
</li>
<li class="list-inline-item">
  <button type="submit" value="Update KPI" class="date-item"  >تحديث</button>
</li>

</form>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="{{@BASE}}/ui/js/bootstrap-hijri-datetimepickermin.js"></script>

    <script type="text/javascript">



        $(function () {

            initDefault();

        });

        function initDefault() {
          $("#hijri-picker1").hijriDatePicker({
              locale: "ar-sa",

              format: "YYYY-MM-DD",
              hijriFormat:"iYYYY-iMM-iDD",

              //dayViewHeaderFormat: "MMMM YYYY",
              //hijriDayViewHeaderFormat: "iMMMM iYYYY",
              showSwitcher: true,

              allowInputToggle: false,
               useCurrent: true,
              isRTL: false,
              keepOpen: false,
              hijri: true,
              debug: true,
              showClear: true,
              showTodayButton: true,
              showClose: true,
              ignoreReadonly: true

          });
          $("#hijri-picker2").hijriDatePicker({
              locale: "ar-sa",

              format: "YYYY-MM-DD",
              hijriFormat:"iYYYY-iMM-iDD",

              showSwitcher: true,

              allowInputToggle: false,
              showTodayButton: false,
              useCurrent: true,
              isRTL: false,
              keepOpen: false,
              hijri: true,
              debug: true,
              showClear: true,
              showTodayButton: true,
              showClose: true,
              ignoreReadonly: true

          });
        }

    </script>

</body>

</html>
