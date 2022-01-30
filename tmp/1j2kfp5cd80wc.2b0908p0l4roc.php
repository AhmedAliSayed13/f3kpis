<!DOCTYPE html>
<html lang="en">

 <head>

 <?php echo $this->render('/layouts/header.html',NULL,get_defined_vars(),0); ?>
 <link rel="stylesheet" href="<?= ($BASE) ?>/ui/css/nour_style.css"/>

</head>
<style>
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
.form-control {
    width: auto ;
  }
.dropdown .dd-menu {
    top: 62px;
  }
  .dropdown .exp_btn {
  background: none;
    border: 0;
  }

.img {
     margin-top: -81px;
   }
   p span{
     color: black;
     line-height: 3;
   }

.home-page #data-container {
    margin-top: 0;
  }
  nav.page-header .page-data-content p span {
      padding: 0 !important;
  }
  label{
    color: white;
    font-weight: 600;
    width: 100%;
  }
  form label{
    font: normal normal bold 16px/37px Cairo;
    letter-spacing: 0px;
    color: #272d3b;
    width: auto;
  }
  #tab {
    width: 100%;
    overflow-x: auto;
}
/* /////////////////// */



  .bootstrap-datetimepicker-widget table th {
    height: -14px;
    line-height: 0px;
}
table thead th {
    color: #fff;
    background-color: white !important;
}
td, td + td, th + th {
    border-left: 0 solid white !important;
    border-right: 0 solid white !important;
}
thead {
    border-right: 0 solid white;
}
table th {
    padding: 0!important;

}
table td {
    padding: 5px !important;
}
table {
    padding: 0px  ;
  }
.list-unstyled li span {
   font: normal normal 500 13px/0 Cairo !important;
}
.bootstrap-datetimepicker-widget .picker-switch td span {
     height: 0;
  }
  .home-page .card .card-header ul {
    padding-right: 0px;
    padding-left: 0px !important;
}
table {
     border-spacing: 0px;
}
.bootstrap-datetimepicker-widget table th {
       border-radius: 0;
}


/* ///////////// */

#tblData thead th {
    color: #fff;
    background-color: #0c8575 !important;

}
#tblData td, td + td, th + th {
    border-left: 10px solid white !important;
    border-right: 10px solid white !important;
}
#tblData thead {
    border-right: 10px solid white;
}
#tblData th {
    padding: 1.5rem !important;
}
#tblData td {
    padding: 10px !important;
}
#tblData {
    padding: 0px 50px !important;
  }
.list-unstyled li span {
   font: normal normal 500 13px/0 Cairo !important;
}
.bootstrap-datetimepicker-widget .picker-switch td span {
     height: 0;
  }
  .home-page .card .card-header ul {
    padding-right: 0px;
    padding-left: 0px !important;
}
  #tblData {
    border-spacing: 6px;
}
#tblData td, #tblData th {
   border-radius: 4px;
}

.home-page .card .card-header {
  padding: 15px 0px 15px !important;
}
/* ///////////// */
</style>

<body >
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
  <script src="<?= ($BASE) ?>/ui/js/bootstrap-hijri-datetimepickermin.js"></script>

<?php echo $this->render('/layouts/nav.html',NULL,get_defined_vars(),0); ?>
  <?php foreach (($kpi?:[]) as $kpidetails): ?>

  <?php endforeach; ?>
  <div class="home-page">
    <nav class="page-header" >
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 col-md-8 text-right">
            <div class="right-bookmark">
              <p> .</p>
            </div>
            <div class="page-data-content">
              <h3 class="page-title"> <a  class="page-title2" href="/wkpis/home" >الرئيسية / </a><a href="/wkpis/kpi" style="color: #272d3b; text-decoration: none;">مؤشرات الأداء </a></h3>
                <div class="under-line"></div>
                <p  class="sub-title ">   <span class="sub-title"> <?= ($caption) ?> </span> </p>
                <?php if ($from  != ''): ?>
                  <p class="sub-title  ">    من <span class="sspan"> <?= ($from) ?>  </span> الي  <span id="hijri1" class="sspan"> <?= ($to) ?> </span> </p>
                <?php endif; ?>
            </div>
          </div>
          <div class=" col-md-4 img">
            <img src="<?= ($BASE) ?>/ui/img/logo.png" width="150" height="110"  alt="" >
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="hr"></div>
          </div>
        </div>
      </div>
    </nav>

<div class="container-fluid" id="data-container">
  <ul class="nav nav-pills" id="pills-tab" role="tablist">
   <li class="nav-item" >
       <input   name='chart-type' id='msColumn3D' type='radio' value='msColumn3D' checked />
    <label for="msColumn3D">   أعمدة ثلاثي الأبعاد</label>
   </li>
    <li class="nav-item">
     <input name='chart-type' id='msarea' type='radio' value='msarea' />
     <label for="msarea">   سطحي  </label>
    </li>
    <li class="nav-item">
      <input name='chart-type' id='msline' type='radio' value='msline'   />
      <label for="msline"> خطي </label>
    </li>
    <!-- <?php if (in_array( $kpidetails['kpi_id'] , $ids)): ?>
    <li class="nav-item" >
      <input   name='chart-type' id='doughnut3d' type='radio' value='doughnut3d'  />
      <label for="doughnut3d">     حلقي  </label>
    </li>
    <li class="nav-item" >
     <input name='chart-type' id='pie3d' type='radio' value='pie3d'   />
     <label for="pie3d">     دائري </label>
    </li>
    <li class="nav-item" >
      <input   name='chart-type' id='bar3d' type='radio' value='bar3d'   />
      <label for="bar3d">     عمودي </label>
    </li>
    <?php endif; ?> -->
</ul>

  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
      <div class="card">
        <div class="card-header text-right">
          <ul class="list-inline">
            <li class="list-inline-item">
              <label class="dropdown ">
                <div class="dd-button export-item">
                <span>  <i class="fas fa-plus"></i> تصدير </span>
                </div>
                <input type="checkbox" class="dd-input" id="test">
                 <ul class="dd-menu">
                  <li>
                    <input type="button" value="تصدير PDF" class="exp_btn"
                       id="btPrint" onclick="createPDF()" />
                    </li>
                  <li>
                    <input type="button" value="تصدير Excel" onclick="exportTableToExcel('tblData')" class="exp_btn"/>
                  </li>
                </ul>
              </label>
             </li>
             <li class="list-inline-item">
<!-- form -->
              <div style="position:relative"  >
                <form method="POST" action="/wkpis/executeupdate/<?= ($PARAMS['kpi_id']) ?>"   >

                  <li class="list-inline-item select-date-title">أختيار تاريخ محدد</li>
                  <li class="list-inline-item">
                    <label for="from">من </label>

                      <input id="hijri-picker1" type="text" value= "  <?php if ($from == ''): ?>  1429-01-01  <?php else: ?> <?= ($from) ?>  <?php endif; ?>" class="form-control" name="form_fromdate"  onkeyup="addHyphen(this)" />
                  </li>
                  <li class="list-inline-item">
                    <label for="to">إلى</label>

                    <input id="hijri-picker2" type="text" value= "  <?php if ($to != ''): ?>   <?= ($to) ?>    <?php endif; ?>" class="form-control" name="form_todate" onkeyup="addHyphen(this)"  />
                  </li>
                  <li class="list-inline-item update">
                    <button type="submit" value="Update KPI" class="date-item"  >تحديث</button>
                  </li>
                </form>
              </div>
  <!-- end form -->
           </li>
          </ul>
         </div>
      <div id="table_div" >
        <div class="card-body">
          <div class="container-fluid statics">
            <div class="row">
              <div class="col-lg-12 col-sm-12 text-right">
                    <div id="chart-container">FusionCharts XT will load here!</div>
               </div>
               <div id="tab">
               <table style="border-collapse:collapse;" class=table_5239 border=1 id="tblData">
                 <thead>
                   <tr>
                     <th id="tableHTML_header_3">م</th>

                     <th id="tableHTML_header_3"><?= ($data31) ?></th>
                     <th id="tableHTML_header_4"> <?= ($data5) ?></th>
                     <?php if ($data6  != ''): ?>

                     <th id="tableHTML_header_5">   <?= ($data6) ?></th>
                    <?php endif; ?>
                    <?php if ($data7  != ''): ?>
                    <th id="tableHTML_header_6"><?= ($data7) ?></th>
                    <?php endif; ?>
                    <?php if ($data8  != ''): ?>
                    <th id="tableHTML_header_7">  <?= ($data8) ?>  </th>
                    <?php endif; ?>
                    <?php if ($data20  != ''): ?>
                    <th id="tableHTML_header_7">  <?= ($data20) ?>  </th>
                    <?php endif; ?>
                    <?php if ($data21  != ''): ?>
                    <th id="tableHTML_header_7">  <?= ($data21) ?>  </th>
                    <?php endif; ?>
                    <?php if ($data22  != ''): ?>
                    <th id="tableHTML_header_7">  <?= ($data22) ?>  </th>
                    <?php endif; ?>
                    <?php if ($data23  != ''): ?>
                    <th id="tableHTML_header_7">  <?= ($data23) ?>  </th>
                    <?php endif; ?>
                    <?php if ($data24  != ''): ?>
                    <th id="tableHTML_header_7">  <?= ($data24) ?>  </th>
                    <?php endif; ?>
                    <?php if ($data25  != ''): ?>
                    <th id="tableHTML_header_7">  <?= ($data25) ?>  </th>
                    <?php endif; ?>
                    <?php if ($data26  != ''): ?>
                    <th id="tableHTML_header_7">  <?= ($data26) ?>  </th>
                    <?php endif; ?>
                    <?php if ($data27  != ''): ?>
                    <th id="tableHTML_header_7">  <?= ($data27) ?>  </th>
                    <?php endif; ?>
                    <?php if ($data28  != ''): ?>
                    <th id="tableHTML_header_7">  <?= ($data28) ?>  </th>
                    <?php endif; ?>
                    <?php if ($data29  != ''): ?>
                    <th id="tableHTML_header_7">  <?= ($data29) ?>  </th>
                    <?php endif; ?>
                  </tr>
                </thead>
              <tbody>

            <?php for ($i=0;$i < count(  $num2 );$i++): ?>

              <tr>
                <td id="tableHTML_rownames"><?= ($i+1) ?></td>
                <td id="tableHTML_column_1">  <?= ($num2[$i]["label"]) ?>    </td>
                 <?php if ($data5  != ''): ?>

                <td id="tableHTML_column_2"> <?= ($num[$i]["value"]) ?></td>

              <?php endif; ?>
              <?php if ($data6  != ''): ?>

                <td id="tableHTML_column_3"><?= ($num3[$i]["value"]) ?></td>
              <?php endif; ?>

                <?php if ($data7  != ''): ?>

                <td id="tableHTML_column_4"><?= ($num4[$i]["value"]) ?></td>
              <?php endif; ?>
              <?php if ($data8  != ''): ?>

                <td id="tableHTML_column_5"><?= ($num5[$i]["value"]) ?></td>
              <?php endif; ?>
              <?php if ($data9  != ''): ?>

                <td id="tableHTML_column_6"><?= ($num6[$i]["value"]) ?></td>
              <?php endif; ?>
                <?php if ($data10  != ''): ?>

                <td id="tableHTML_column_5"><?= ($num7[$i]["value"]) ?></td>
              <?php endif; ?>
              <?php if ($data11  != ''): ?>

                <td id="tableHTML_column_5"><?= ($num8[$i]["value"]) ?></td>
              <?php endif; ?>
              <?php if ($data12  != ''): ?>

                <td id="tableHTML_column_5"><?= ($num9[$i]["value"]) ?></td>
              <?php endif; ?>
              <?php if ($data13  != ''): ?>

                <td id="tableHTML_column_5"><?= ($num10[$i]["value"]) ?></td>
              <?php endif; ?>
              <?php if ($data14  != ''): ?>

                <td id="tableHTML_column_5"><?= ($num11[$i]["value"]) ?></td>
              <?php endif; ?>
              <?php if ($data15  != ''): ?>

                <td id="tableHTML_column_5"><?= ($num12[$i]["value"]) ?></td>
              <?php endif; ?>
              <?php if ($data16  != ''): ?>

                <td id="tableHTML_column_5"><?= ($num13[$i]["value"]) ?></td>
              <?php endif; ?>
              <?php if ($data17  != ''): ?>

                <td id="tableHTML_column_5"><?= ($num14[$i]["value"]) ?></td>
              <?php endif; ?>
              <?php if ($data18  != ''): ?>

                <td id="tableHTML_column_5"><?= ($num15[$i]["value"]) ?></td>
              <?php endif; ?>
              <?php if ($data19  != ''): ?>
                <td id="tableHTML_column_5"><?= ($num16[$i]["value"]) ?></td>
              <?php endif; ?>
              <?php if ($data40  != ''): ?>
                <td id="tableHTML_column_5"><?= ($num17[$i]["value"]) ?></td>
              <?php endif; ?>
              <!-- //for more series -->
              <?php if ($data41  != ''): ?>
                <td id="tableHTML_column_5"><?= ($num18[$i]["value"]) ?></td>
              <?php endif; ?>
              <?php if ($data42  != ''): ?>
                  <td id="tableHTML_column_5"><?= ($num19[$i]["value"]) ?></td>
              <?php endif; ?>
                <!-- //for more series end -->
             </tr>
           <?php endfor; ?>
        </tbody>
     </table>
   
  <div>
 </div>
</div>
     <!-- /////////////////// -->
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
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

<script type="text/javascript">
  // Create an Instance with chart options
  var chartInstance = new FusionCharts({
       type: 'msColumn3D',
       renderAt: 'chart-container',
       width: '100%',
       height: '600',
       theme: "fusion",
       dataFormat: 'jsonurl',
       dataSource: '../../r_json/ind_'+<?= (trim($kpidetails['kpi_id'])) ?>+'.json',
  });
  // Render
  chartInstance.render();
//type //
radio = document.getElementsByTagName('input');
for (i = 0; i < radio.length; i++) {
 radElem = radio[i];
 if (radElem.type === 'radio') {
   radElem.onclick = function() {
     val = this.getAttribute('value');
     val && chartInstance.chartType(val);
   };
 }
}
// datapicker
</script>
<?php echo $this->render('pdf_excel.html',NULL,get_defined_vars(),0); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script src="<?= ($BASE) ?>/ui/js/bootstrap-hijri-datetimepickermin.js"></script>

<!-- set date input value -->
<?php if ($to == ''): ?>
  <script>
  var to = moment().format('iYYYY-iM-iD');
  document.getElementById("hijri-picker2").value =  to;
  </script>
<?php endif; ?>
<script>
// datapicker
       $(function () {
           initHijrDatePicker();
           //initHijrDatePickerDefault();
       });
       function initHijrDatePicker() {
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
 // datapicker end
 // pdf

function createPDF() {

    var sTable = document.getElementById('table_div').innerHTML;
     var style = "<style>";
    style = style + "table {width: 100%;font: 30px Calibri;direction:rtl;  }";
    style = style + "h5 {margin: 33px auto; text-align: center; font-size:20px}";
    style = style + "table {border: 1; border-collapse: collapse;";
    style = style + "padding: 2px 3px;text-align: center; margin-top:0px; }";
    style = style + "td {border:1px solid #009788; }";
    style = style + "th {color: #6a6b6b;font-size: 20px; padding: 20px;}";
    style = style + ".tablerow1{ width: 100%;display: inline-block;}";
    style = style + ".tablerow{ width: 33%;display: inline-block;float: right;}";
    style = style + ".tablerow img{ margin-top: 20px;}";
    style = style + "thead th {border: none;padding: 25px 0px; color: white; background : #009788;  }";
     style = style + "table {width: 100%;font: 30px Calibri;direction:rtl;  }";
    style = style + "h3 {margin: 33px auto; text-align: right; font-size:20px }";
    style = style + "p {margin: 33px auto; text-align: right; font-size:20px }";
    style = style + "nav.page-header {border-bottom: 6px solid #0c8575; padding-bottom: 30px; border-top: 18px solid #0c8575;margin-top: -10px;padding : 60px 0px}";
    style = style + ".right-bookmark {height: 231px; float: right; display: inline-block;background-color: #0c8575;padding: 5px;  color: #fff;position: relative;  top: -100px;margin-left: 33px;width: 16px;  border-bottom-right-radius: 6px;border-bottom-left-radius: 6px;}";
    style = style + ".text-right { padding-right: 45px; margin-top: -31px; border-top: 39px solid #0c8575;}";
    style = style + ".right-bookmark p {    color: #0c8575; position: relative; top: 45%;right: 10px;   font-size: 0px;font-weight: bolder; }";
    style = style + ".page-data-content a { display:none}";
    style = style + "table {border: none; border-collapse: collapse; width: 90%; margin: auto;";
    style = style + "padding: 2px 3px;text-align: center; margin-top:0px; }";
    style = style + "td {border:1px solid #009788; }";
    style = style + "th {color: #6a6b6b;font-size: 20px; padding: 20px;}";
    style = style + ".tablerow1{ width: 100%;display: inline-block;}";
    style = style + ".tablerow{ width: 33%;display: inline-block;float: right;}";
    style = style + ".tablerow img{ margin-top: 20px;}";
    style = style + "thead th {border: none;padding: 25px 0px; color: white; background : #009788;  }";
    style = style + "tr:nth-child(even) { background-color: #f2f2f2;}";
    style = style + "td, td + td, th + th { padding: 10px 0; border-left: 10px solid white;border-right: 10px solid white; border-bottom: 10px solid white;}";
    style = style + ".text-right { border-top: none;}";
    style = style + ".img{ width: 25%;margin-top: -147px;margin-left: 33px;}";
    style = style + ".span{ display:none;}";
     // style = style + ".text-right{ display: inline-block;}";
    style = style + "</style>";
    // CREATE A WINDOW OBJECT.
    var win = window.open(' ', '', 'height=1000,width=1000');
    win.document.write('<html><head>');
     win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
    win.document.write('</head>');
    win.document.write('<body>');
    // win.document.write(sTable2);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
    win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
    win.document.write('</body></html>');
    win.document.close();
    win.focus();
    win.print();
    win.close();   //
    win.print();     // PRINT THE CONTENTS.
}
    // excel
function exportTableToExcel(tableID, filename = 'chart'){
var downloadLink;
var dataType = 'application/vnd.ms-excel';
var tableSelect = document.getElementById(tableID);
var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

// Specify file name
filename = filename?filename+'.xls':'excel_data.xls';

// Create download link element
downloadLink = document.createElement("a");

document.body.appendChild(downloadLink);

if(navigator.msSaveOrOpenBlob){
    var blob = new Blob(['\ufeff', tableHTML], {
        type: dataType
    });
    navigator.msSaveOrOpenBlob( blob, filename);
}else{
    // Create a link to the file
    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

    // Setting the file name
    downloadLink.download = filename;

    //triggering the function
    downloadLink.click();
}
}

</script>
<!-- ////////////// -->

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

<!-- ///////////// -->
<script src="<?= ($BASE) ?>/ui/js/owl.carousel.min.js"></script>
<script src="<?= ($BASE) ?>/ui/js/app.js"></script>

<!-- // button scroll top -->
<script src="<?= ($BASE) ?>/ui/js/vanillatop.min.js"></script>
<a  class="vanillatop"></a>
<script>
   jQuery(function($) {
   $('body').scrollToTop({
       skin: 'cycle'
   });
});
</script>
 <!-- // end button scroll top -->
</body>

</html>
