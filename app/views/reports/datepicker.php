<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
     <link rel="preconnect" href="https://fonts.gstatic.com">
     <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
     <title>
         Hijri Date Picker
    </title>
    <link href="{{@BASE}}/ui/css/bootstrap4.min.css" rel="stylesheet">
    <link href="{{@BASE}}/ui/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{@BASE}}/ui/css/multi-select.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
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
  text-align: right;
}
.modal-body{
  direction: rtl;
  text-align: center;
}
.date-item-btn{
background: #007bff;
border: none;
padding: 2px 14px 6px;
color: white;
border-radius: 4px;
}

.list-unstyled {
  padding-right: 0;
}
.close{
  position: absolute;
  margin: 20px;
}
.close i{
    color: #159588;
}
.modal-body{
  font-family: 'Cairo', sans-serif;
  margin-top: 33px;
}
.bootstrap-datetimepicker-widget {
    display: block !important;
  }
  .date_btn{
    float: left
  }
  .select2-results__option {
      text-align: right;
      font-family: 'Cairo', sans-serif;
      font-size: 17px;
  }
  .select2-container--default .select2-results__option[aria-selected=true] {
      background-color: #5897fb;
      text-align: right;
      color: white;
    }
    .select2-results__option {
      text-align: right;
       font-family: 'Cairo', sans-serif;
    }
    .select2-container[dir="rtl"] .select2-selection--single .select2-selection__rendered {
      padding-right: 8px;
      padding-left: 20px;
      text-align: right;
      padding: 10px
      }
  .select2-container .select2-selection--single {
      height: 51px;
      }
  .select2-container--default .select2-selection--single .select2-selection__rendered {
    color: #444;
    line-height: 2.1;
    text-align: right;
    font-size: 20px
      }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
    top: 13px;
  }
  .form-group {
    margin-bottom: 1rem;
    margin-top: 10px;
    padding-right: 0px;
    text-align: right;
}
button, input {
    overflow: hidden ;
}
/* /alert */

#modalContainer {
	background-color:rgba(0, 0, 0, 0.3);
	position:absolute;
  top:0;
	width:100%;
	height:100%;
	left:0px;
	z-index:10000;
	background-image:url(tp.png); /* required by MSIE to prevent actions on lower z-index elements */
  font-family: 'Cairo', sans-serif;
}

#alertBox {
	position:relative;
	width:36%;
	min-height:100px;
  max-height:400px;
	margin-top:50px;
	border:1px solid #fff;
	background-color:#fff;
	background-repeat:no-repeat;
  top:30%;
}

#modalContainer > #alertBox {
	position:fixed;
}

#alertBox h1 {
	margin:0;
	font:bold 1em Raleway,arial;
	background-color:#159587;
	color:#FFF;
	border-bottom:1px solid #159587;
	padding:10px 5px 10px 5px;
  font-family: 'Cairo', sans-serif;
}

#alertBox p {
	height:70px;
	padding :4px;
  padding-top:30px;
  text-align:center;
  vertical-align:middle;
  font-family: 'Cairo', sans-serif;
}

#alertBox #closeBtn {
	display:block;
	position:relative;
	margin:45px auto 10px auto;
	padding:7px;
	border:0 none;
	width:70px;
	text-transform:uppercase;
	text-align:center;
	color:#FFF;
	background-color:#159587;
	border-radius: 0px;
	text-decoration:none;
  outline:0!important;
  font-family: 'Cairo', sans-serif;
}

/* unrelated styles */

#mContainer {
	position:relative;
	width:600px;
	margin:auto;
	padding:5px;
	border-top:2px solid #fff;
	border-bottom:2px solid #fff;
}

h1,h2 {
	margin:0;
	padding:4px;
  text-align: right;
}

code {
	font-size:1.2em;
	color:#069;
}

#credits {
	position:relative;
	margin:25px auto 0px auto;
	width:350px;
	font:0.7em verdana;
	border-top:1px solid #000;
	border-bottom:1px solid #000;
	height:90px;
	padding-top:4px;
}

#credits img {
	float:left;
	margin:5px 10px 5px 0px;
	border:1px solid #000000;
	width:80px;
	height:79px;
}

.important {
	background-color:#F5FCC8;
	padding:2px;

}

@media (max-width: 600px)
{
  #alertBox {
	position:relative;
	width:90%;
  top:30%;
}
}

.form-control2 {
    width: 28%;
    margin: 0px 23px;
  }
.select2-container {
  width: 70% !important;

  }
  .date-item-btn {
      padding: 5px 14px 8px;
      margin-top: 2px;
}
.date-title ,.date-item label ,.form-group label{
  color: #0c8575;
 }
 .form-control2 {
    width: 100%;
    margin: 0;
}
.form-group {
  padding-right: 17px;
}
.select2-container {
    width: 75% !important;
}
.date-item2{
  float: left;
  margin: 5px 0;
  }
  .form-control2 {
      width: 115%;
      margin: 0;
      margin-right: -30px;
      margin-top: -10px;
  }
  @media (max-width: 481px){
  .select2-container {
    margin: 0 9px;
  }
  .select2-container {
    width: 76% !important;
    /* width: 87% !important; */

}
  .date-title   {
    text-align: right;
    padding: 0px 15px;
  }
  .date-item   {
    float: right;
    padding: 0px 15px;
  }
  .form-control2 {
      width: 100%;
      margin: 0;
      margin-right: 0px;
      margin-top: 0px;
  }
  #hijri-picker2{
    padding-right: 10px;
  margin-right: 7px;
    }
    #hijri-picker1{
      padding-right: 10px;
    margin-right: 11px;
      }
    .dates{
       margin: 20px auto;
      }
    .dates2{
        float: left;
      }
}

</style>

<body>


<div class="modal-body">
  <div class="panel panel-default">

   <form method="POST" action="/report/executeupdate/{{ @rep_idd  }}" id="myForm" name="myForm" target='_parent' >
     <check if="in_array( {{@rep_idd}}, @ids)">
     <true>
        <div class="row">

         <div class="col-sm-12">
        <div class="form-group search-form">
        <label for="to"> حدد  اسم المقاول : </label>

       <select id="single" class="js-states form-control" name="form_contractor_id" >

          <repeat group="{{ @conts }}" value="{{ @conts }}"   >

          <option value="{{ trim(@conts.cont_id) }}">
             {{ trim(@conts.cont_name) }}

           </option>

        </repeat>
      </select>

      </div>
      </div>

      <div class="col-sm-4">

      <p class="date-title">أختيار تاريخ محدد من:</p>

      </div>

          <div class="col-sm-3">
            <div class="date-item">
              <input id="hijri-picker1" type="text" value= "  <check if="{{@from}} == ''"> <true> 1429-01-01 </true> <false> {{@from}} </false> </check>" class="form-control form-control2" name="form_fromdate" onkeyup="addHyphen(this)"  />
        </div>
        </div>
        <div class="col-sm-2">
          <div class="date-item">

            <label for="to">إلى :</label>
          </div>
        </div>

        <div class="col-sm-3">
          <div class="date-item ">

            <input id="hijri-picker2" type="text" class="form-control form-control2" name="form_todate"     />
      </div>
      </div>





      <div class="col-sm-12 dates ">

      <div class="date-item date-item2 dates2">
        <button type="submit" value="Update KPI" class="date-item-btn"     >عرض</button>

      </div>
      </div>
   </div>
 </div>
</div>


</true>
<!-- ///////////////////////////
///////////////////////// -->
 <false>
<div class="row">
<div class="col-md-12">

<p class="date-title">أختيار تاريخ محدد</p>

</div>
    <div class="col-sm-5">
      <div class="date-item">

    <label for="from">من </label>
    <input id="hijri-picker1" type="text" value= "  <check if="{{@from}} == ''"> <true> 1429-01-01 </true> <false> {{@from}} </false> </check>" class="form-control" name="form_fromdate" onkeyup="addHyphen(this)"  />
  </div>
</div>

  <div class="col-sm-5">

 <div class="date-item">
  <label for="to">إلى</label>
  <input id="hijri-picker2" type="text" class="form-control" name="form_todate"  onkeyup="addHyphen(this)"   />
</div>

</div>
<div class="col-xs-12 dates">

<div class="date-item">
  <button type="submit" value="Update KPI" class="date-item-btn"    >عرض</button>

</div>
</div>
</div>


</false>
</check>
</form>
</div>

      </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
    <script src="{{@BASE}}/ui/js/bootstrap-hijri-datetimepickermin.js"></script>

 <!-- set date input value -->
    <script>
    	var to = moment().format('iYYYY-iM-iD');
       // document.getElementById("hijri-picker1").value =  "1430-01-01";
       document.getElementById("hijri-picker2").value =  to;
    </script>
    <script type="text/javascript">



        $(function () {

            initDefault();

        });

        function initDefault() {

          $("#hijri-picker1").hijriDatePicker({
            showClear: true,
           showTodayButton: true,
           showClose: true,
           ignoreReadonly: true,
           locale: "ar-sa",
           sideBySide: true,
           useCurrent: true,
           keepOpen: false,
           focusOnShow: true,
           format: "YYYY-MM-DD",
           hijriFormat:"iYYYY-iMM-iDD",
           useCurrent: true,
            isRTL: true,
            hijri: true,
            maxDate: new Date(),
            minDate: new Date(2008, 1 - 1, 10),
            keepInvalid: false,

           });

          $("#hijri-picker2").hijriDatePicker({
            showClear: true,
           showTodayButton: true,
           showClose: true,
           ignoreReadonly: true,
           locale: "ar-sa",
           sideBySide: true,
           useCurrent: true,
           keepOpen: false,
           focusOnShow: true,
           format: "YYYY-MM-DD",
           hijriFormat:"iYYYY-iMM-iDD",
           useCurrent: true,
            isRTL: true,
            hijri: true,
             maxDate: new Date(),
             minDate: new Date(2008, 1 - 1, 10),

           });




           $("#hijri-picker2").on('dp.change', function () {

             var  d1=document.getElementById("hijri-picker1").value;
             var  d2=document.getElementById("hijri-picker2").value;


             if (moment(d2).isBefore(d1) ===  true){
               alert ("يرجي ادخال تاريخ اكبر من التاريخ السابق");
             }

             });

        }

    </script>
    <!-- Select2 -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>
    <script>
    $(document).ready(function() {
        $('#single').select2();

    });
    </script>
<script>
<!-- alert -->
var ALERT_TITLE = " ! عفوا";
var ALERT_BUTTON_TEXT = "Ok";

if(document.getElementById) {
window.alert = function(txt) {
  createCustomAlert(txt);
}
}

function createCustomAlert(txt) {
d = document;

if(d.getElementById("modalContainer")) return;

mObj = d.getElementsByTagName("body")[0].appendChild(d.createElement("div"));
mObj.id = "modalContainer";
mObj.style.height = d.documentElement.scrollHeight + "px";

alertObj = mObj.appendChild(d.createElement("div"));
alertObj.id = "alertBox";
if(d.all && !window.opera) alertObj.style.top = document.documentElement.scrollTop + "px";
alertObj.style.left = (d.documentElement.scrollWidth - alertObj.offsetWidth)/2 + "px";
alertObj.style.visiblity="visible";

h1 = alertObj.appendChild(d.createElement("h1"));
h1.appendChild(d.createTextNode(ALERT_TITLE));

msg = alertObj.appendChild(d.createElement("p"));
//msg.appendChild(d.createTextNode(txt));
msg.innerHTML = txt;

btn = alertObj.appendChild(d.createElement("a"));
btn.id = "closeBtn";
btn.appendChild(d.createTextNode(ALERT_BUTTON_TEXT));
btn.href = "#";
btn.focus();
btn.onclick = function() { removeCustomAlert();return false; }

alertObj.style.display = "block";

}

function removeCustomAlert() {
document.getElementsByTagName("body")[0].removeChild(document.getElementById("modalContainer"));
}
function ful(){
alert('Alert this pages');
}
</script>
<!-- add "-" automatic to date in typing -->
<script>
	function addHyphen (element) {
    	let ele = document.getElementById(element.id);
        ele = ele.value.split('-').join('');    // Remove dash (-) if mistakenly entered.

        let finalVal = ele.match(/.{1,4}/g).join('-') ;

        let finalVal2 = finalVal.match(/.{1,7}/g).join('-') ;

        document.getElementById(element.id).value = finalVal2;
     }
</script>



</body>

</html>
