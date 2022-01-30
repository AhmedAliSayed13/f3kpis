<!DOCTYPE html>
<html lang="en">

 <head>

  <include href="/layouts/header.html" />

</head>
<style>
/* table{
   border: 0px;
}
table thead tr {
    color: #fff;
    background-color: #0c8575;
}
table td{
    border-right: none;
}
td,
td + td,
th + th { border-left: 10px solid white;
          border-right: 10px solid white;
        }
tr + tr { border-top: 10px solid white; }
tr:nth-child(even) {
  background-color: #f2f2f2;
}
table td {
    padding: .75rem !important;
}
table{
  margin-bottom: 80px;
}
.div_table{
overflow-x:auto;
  }
  .export-item{
    background: #eee5ff 0% 0% no-repeat padding-box;
    opacity: 1;
    padding: 3px 6px 8px 40px;
    border-radius: 6px;
    color: #000;
    margin-right: 15px;
    float: right;
    border: 1px solid;
    text-align: center;
    margin-bottom: 20px
  } */

</style>

<body>
<include href="/layouts/nav.html" />
<div id="table_div" >
  <repeat group="{{ @reports }}" value="{{ @reports }}">
  </repeat>
<nav class="page-header">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-md-12 text-right">
        <div class="right-bookmark">
          <p>  </p>
        </div>
        <div class="page-data-content">
          <h3>نماذج البحث و الأسترجاع</h3>
          <p>   <span> {{  @reports.rep_title  }}</span>  </p>
          <check if="{{ @from }} != '' ">
            <p>    من  {{@from}}  الي  {{@to}}  </p>
          </check>
        </div>
      </div>
      <div class=" col-md-4 img">
        <img src="http://35.156.184.175/wakalapm3/stat/assets/img/moe_logo.png" width="150" height="110"  alt="" >
      </div>
    </div>
    <div class="row">
      <div class="col-12">
        <div class="hr"></div>
      </div>
    </div>
  </div>
</nav>

<div class="container-fluid">

   <div class="row">
     <div class="col-md-1"></div>

     <div class="col-md-10 div_table"  >
     <include href="{{'../../RCODE/report_'.@rep_id .'.html'}}" />
   </div>

   </div>

</div>
</div>


<section id="fixed-form-container">
 <div class="button"><span>  تصدير </span></div>
   <div class="body">
    <div class="form-group">
           <a href="/RCODE/report_{{ @rep_id }}.xlsx"  > اكسيل  </a>
          <input type="button" value="تصدير PDF"
          id="btPrint" onclick="createPDF()" />
      </div>

    </div>
</section>

<script>
$("#fixed-form-container .body").hide();
$("#fixed-form-container .button").click(function () {
        $(this).next("#fixed-form-container div").slideToggle(400);
        $(this).toggleClass("expanded");
    });

</script>


<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<include href="pdf_excel.html" />



<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>

<script>
$(document).ready(function(){

  ////  add table id

   $("table").attr("id", "myTable");


 ////   table id end
 ////  add table row

  var table = document.getElementById("myTable");
  var row = table.insertRow(0);
  var cell0 = row.insertCell(0);
  var cell1 = row.insertCell(1);
  var cell2 = row.insertCell(2);
  cell0.rowSpan = "2";
  cell1.rowSpan = "2";

  cell2.colSpan = "4";
  cell0.innerHTML = "م";
  cell1.innerHTML = "اسم المنطقة";
  cell2.innerHTML = "حالات المشروع";

});


</script>
<include href="/layouts/footer.html" />
</body>
</html>