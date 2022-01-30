<!DOCTYPE html>
<html lang="en">

 <head>

     <?php echo $this->render('/layouts/header.html',NULL,get_defined_vars(),0); ?>
 <link rel="stylesheet" href="<?= ($BASE) ?>/ui/css/nour_style.css"/>

</head>
<style>
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

.page-header{
  display: none;
}
.img {
     margin-top: -81px;
   }
   p span{
     color: black;
     line-height: 3;
   }
   nav.page-header .right-bookmark {
    top: -118px !important;
    height: 190px;
}
.home-page #data-container {
    margin-top: 0;
  }

</style>

<body >
<?php echo $this->render('/layouts/nav.html',NULL,get_defined_vars(),0); ?>
  <?php foreach (($kpi?:[]) as $kpidetails): ?>

  <?php endforeach; ?>
  <div class="home-page">
    <nav class="page-header" style="display:block" >
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-8 col-md-8 text-right">
            <div class="right-bookmark">
              <p> .</p>
            </div>
            <div class="page-data-content">
              <h3> <a href="/wkpis/home" style="color: #272d3b; text-decoration: none;">الرئيسية / </a><a href="/wkpis/kpi" style="color: #272d3b; text-decoration: none;">مؤشرات الأداء </h3>
              <p>   <span> <?= ($caption) ?></span> </p>
              <?php if ($from  != ''): ?>
                <p>    من  <?= ($from) ?>  الي  <?= ($to) ?>   </p>
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
    <?php if (in_array( $kpidetails['kpi_id'] , $ids)): ?>

      <li class="nav-item" >

      <input   name='chart-type' id='doughnut3d' type='radio' value='doughnut3d'  />
    <label for="doughnut3d">     حلقي  </label>
       </li>

        <li class="nav-item" >

          <input   name='chart-type' id='pie3d' type='radio' value='pie3d'   />
      <label for="pie3d">     دائري </label>

         </li>

        <li class="nav-item" >

          <input   name='chart-type' id='bar3d' type='radio' value='bar3d'   />
      <label for="bar3d">     عمودي </label>

        </li>

    <?php endif; ?>

  </ul>

  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
      <div class="card">
        <div class="card-header text-right">

          <ul class="list-inline">
            <li class="list-inline-item">

              <!-- /////////////////////////// -->
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
                    <input type="button" value="تصدير Excel" onclick="exportTableToExcel('tblData')" class=" exp_btn "/>

                  </li>

                </ul>

              </label>

                            </li>

                            <li class="list-inline-item">

              <iframe src="http://localhost:8000/wkpis/datepicker/<?= ($kpidetails['kpi_id']) ?>"   width="900" frameborder="0" scrolling="yes" onload="this.style.height=(this.contentWindow.document.body.scrollHeight+200)+'px';" id="iframe"></iframe>
</li>

     </ul>

        </div>

        <div id="table_div" >

        <nav class="page-header" >
          <div class="container-fluid">
            <div class="row">
              <div class="col-lg-8 col-md-8 text-right">
                <div class="right-bookmark">
                  <p> .</p>
                </div>
                <div class="page-data-content">
                  <h3> <a href="/report/list" style="color: #272d3b; text-decoration: none;">الرئيسية / </a>مؤشرات الأداء </h3>
                  <p>   <span>  <?= ($caption) ?></span> </p>
                  <?php if ($from  != ''): ?>
                    <p>    من  <?= ($from) ?>  الي  <?= ($to) ?>  </p>
                  <?php endif; ?>
                </div>
              </div>
              <div class=" col-md-4 img">
                <img src="http://35.156.184.175/wakalapm3/stat/assets/img/moe_logo.png" width="150" height="110"  alt="" >
              </div>
            </div>

          </div>
        </nav>
        <div class="card-body">
          <div class="container-fluid statics">
            <div class="row">
              <!-- <h5 class="span"> <?= ($caption)."
" ?>
                <?php if ($from  != ''): ?>
                  <p>    من   <span><?= ($from) ?> </span>  الي   <span><?= ($to) ?> </span>  </p>
                <?php endif; ?>

               </h5> -->
              <div class="col-lg-12 col-sm-12 text-right">
                    <div id="chart-container">FusionCharts XT will load here!</div>
               </div>

               <div id="tab">

               <table style="border-collapse:collapse;" class=table_5239 border=1 id="tblData">

                 <thead>
                   <tr>
                     <th id="tableHTML_header_3">م</th>

                     <th id="tableHTML_header_3">المنطقة</th>
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


                  </tr>
                </thead>

              <tbody>

            <?php for ($i=0;$i < count(  $num2 );$i++): ?>

              <tr>
                <td id="tableHTML_rownames"><?= ($i) ?></td>
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

             </tr>

           <?php endfor; ?>

            </tbody>
            </table>

          </div>
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


<?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>

</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>


<script type="text/javascript">

  // Create an Instance with chart options
  var chartInstance = new FusionCharts({
       type: 'msColumn3D',
      // type: 'mscombidy2d',
      renderAt: 'chart-container',
      width: '100%', // Width of the chart
      height: '600', // Height of the chart
      theme: "fusion",
      "rotatevalues": "1",
      "theme": "fint",
      "rotatevalues":"1",
       "showValues" : "1",
        // legand
      "showLegend": "1",
//          "legendPosition": "right",
      "legendAllowDrag": "1",
     "legendIconBgColor": "#ff0000",
     "legendIconAlpha": "10",
    // "legendIconAlignment": "right",
     "legendIconBgAlpha": "30",
     "legendIconBorderColor": "#123456",
     "legendIconBorderThickness": "20",
  //   "legendCaptionAlignment": "center",
     "legendScrollBgColor": "#867e54",
    "legendShadow": "1",
    "legendItemFontBold":  "500",
    "legendItemFont":  "GE SS Two",
   // "legendItemAlignment":  "right",
    "legendItemFontSize":  "14",
    "legendItemPaddingBottom":  "50",
    "legendItemFontColor":  "#666666",
    "legendItemFontFamily":  "GE SS Two",
    "legendScrollBgColor": "#f0000f",
    // "legendCaptionFontAlignment": "left",
            "reverseLegend": "1",

    "labeldisplay" : "Rotate",
    "slantLabel" : "1" ,
    "xAxisNamePadding" : "30",
     "yAxisNamePadding" : "30",
      "sAxisNamePadding" : "30",

    "smartLineColor": "#d11b2d",
    "smartLineThickness": "2",
    "smartLineAlpha": "75",
    "isSmartLineSlanted": "1",
     "animateClockwise": "1"  ,

      "showplotBorder": "1",
      "plotHighlightEffect": "fadeout|  anchorBgAlpha=200 , color=#7f7f7f, alpha=60",

        "palette":"1",
          "paletteColors":" #bfb6ae  , #36e6ac ,#ffd093  ,#55bdf0 ,#2db59b ,#c667ae  " ,
          "captionFontSize": "20",
           "captionFontBold": "0",
            "baseFont" : "GE SS Two",
         //  y axis font size
            "baseFontSize": "13",
             "xAxisNameFontColor": "#8e8e8e",  /* المناطق */
            "yAxisNameFontColor": "#8e8e8e",  /* الاجمالي */
//                "sYAxisNameFontColor": "#8e8e8e",
            "xAxisNameFontBold": "900",
            "yAxisNameFontBold": "900",
            "xAxisNameFontSize": "16",  /* المناطق */
            "yAxisNameFontSize": "16",  /* الاجمالي */
        // size of column
            "plotSpacePercent": "100",
            "bgColor": "#ffffff",
            "bgAlpha": "200",
            "canvasBgAlpha": "0",
            "canvasBgColor": "#0C7864",

        // color of chart font
            "baseFontColor": "#0c8575",
            "captionPadding": "30",
            "legendPadding": "40",

        // when hover on column
            "toolTipBgColor": "#b5b4b4",
            "toolTipPadding": "13",
            "toolTipBgAlpha": "100",
            "toolTipBorderColor": "#0C7864",
            "toolTipBorderThickness": "2",
            "toolTipBorderRadius": "10",
            "ToolTipBorderAlpha": "30",

        // gradient Color
            "usePlotGradientColor": "2",
            "showAlternateHGridColor": "0",
            "use3DLighting": "2",
            "smartLineColor": "#b5b4b4",
            "smartLineThickness": "1.5",
            "doughnutRadius": "300",
            labelDisplay: "Stagger",
// "enableSmartLabels": "0",
//    "labelDistance": "20"
          "exportEnabled": "1" ,

            "pieRadius": "300",
            "doughnutRadius": "300",
      drawcrossline: "1" ,
      dataFormat: 'jsonurl',
      // dataSource: '../../RCODE/ind_1.json'
      dataSource: '../../RCODE/ind_'+<?= (trim($kpidetails['kpi_id'])) ?>+'.json',
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
////////////////////


// datapicker



</script>
<?php echo $this->render('pdf_excel.html',NULL,get_defined_vars(),0); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
<script src="<?= ($BASE) ?>/ui/js/bootstrap-hijri-datetimepickermin.js"></script>

<script>
// datapicker



       $(function () {

           initHijrDatePicker();

           //initHijrDatePickerDefault();

       });

       function initHijrDatePicker() {

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

       function initHijrDatePickerDefault() {

           $("#hijri-picker1").hijriDatePicker();
           $("#hijri-picker2").hijriDatePicker();
       }



// datapicker end



// pdf

function createPDF() {

   // var sTable2 =  document.getElementById("chart-container").innerHTML;

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
    style = style + ".text-right {   padding-right: 45px; margin-top: -31px; border-top: 39px solid #0c8575;}";
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
    win.document.write('<title>primary_by_reg</title>');   // <title> FOR PDF HEADER.
    win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
    win.document.write('</head>');
    win.document.write('<body>');
    // win.document.write(sTable2);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
    win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.

    win.document.write('</body></html>');

    win.document.close(); 	// CLOSE THE CURRENT WINDOW.

    win.print();    // PRINT THE CONTENTS.
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

<script>
  function resizeIframe(obj) {
    obj.style.height = obj.contentWindow.document.documentElement.scrollHeight + 'px';
  }
</script>
<?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>

</body>

</html>
