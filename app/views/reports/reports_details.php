<!DOCTYPE html>
<html lang="en">

 <head>
  <include href="/layouts/header.html" />
   <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
  <include href="pdf_excel.html" />
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js"></script>
  <script src="{{@BASE}}/ui/js/bootstrap-hijri-datetimepickermin.js"></script>
  <link rel="stylesheet" href="{{@BASE}}/ui/css/nour_style.css"/>

  </head>
  <style>
  nav.page-header .right-bookmark {
        top: -112px;
  }
   @media (max-width: 1025px){
      nav.page-header .right-bookmark {
          top: -145px !important;
          height: 105px;
      }

    }
    @media (max-width: 481px){

    nav.page-header .right-bookmark {
        top: -116px !important;
        height: 118px;
        margin-left: 9px;
    }
     .text-right {
        margin-top: 0;
        margin-bottom: 0px;
      }
    .page-data-content {
        margin: 0;
        margin-right: 0px;
      }
      nav.page-header .page-data-content .sub-title {
      font-size: 15px!important;
      line-height: 0;
  }
}
    .text-red {
        color: white !important;
        background: #159588;
        margin-top: -5px;
    }
    .text-red:hover {
        color: white !important;
        background: #272d3b!important;
        margin-top: -9px;
    }
  </style>
<body>
<include href="/layouts/nav.html" />
  <repeat group="{{ @reports }}" value="{{ @reports }}">
  </repeat>
  <repeat group="{{ @cont }}" value="{{ @cont }}">
  </repeat>
    <div id="table_div" >
      <table class="pdf_table">
      <thead>
        <tr>
            <th style=" padding: 0px !important;  background-color: white;">
              <nav class="page-header" >
                <div class="container-fluid">
                  <div class="row">
                    <div class="col-lg-8 col-md-8 text-right">
                      <div class="right-bookmark">
                        <p> .</p>
                      </div>
                      <div class="page-data-content">
                        <h3 class="page-title"> <a  class="page-title2" href="/wkpis/home" >الرئيسية / </a><a href="/report/list/{{  @reports.rep_id  }}" style="color: #0c8575 ; text-decoration: none;"> نماذج البحث و الأسترجاع  </a></h3>
                          <div class="under-line"></div>
                          <p  class="sub-title ">   <span class="sub-title"> {{  @reports.rep_title  }}  </span> </p>
                        <check if="{{ @from }} != '' ">
                          <p class="sub-title  ">    من <span class="sspan"> {{@from}}  </span> الي  <span id="hijri1" class="sspan"> {{@to}} </span>  <a href="/report/modal/{{@reports["rep_id"] }}" class='li-modal text-red   btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a>  </p>
                        </check>

                        <check if="{{ @cont.cont_name }} != '' ">
                          <p class="sub-title  " style="padding-top:10px">   للمقاول : <span class="sspan"> {{@cont.cont_name}}  </span> </p>
                        </check>
                      </div>
                    </div>
                    <div class=" col-md-4 img">
                      <img src="{{@BASE}}/ui/img/logo.png" width="150" height="110"  alt="" >
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-12">
                      <div class="hr"></div>
                    </div>
                  </div>
                </div>
              </nav>
            </th>
          </tr>
        </thead>
      <tbody>
      <tr>
    <td>

<div class="container-fluid">

   <div class="row">
     <div class="col-md-1"></div>

     <div class="col-md-10 div_table"  >

       <include href="{{'../../r_json/report_'.@PARAMS.rep_id.'.html'}}" />

    </div>

   </div>
</div>
</td>
 </tr>
</<tbody>
</table>
</div>

<section id="fixed-form-container">
    <div id="btn-print" class="button"><span>  تصدير </span></div>
    <div class="body">
        <div class="form-group">
            <a href="/r_json/report_{{ @PARAMS.rep_id }}.xlsx"  > Excel  </a>
            <input type="button" value=" PDF" id="btPrint" onclick="createPDF()" />
        </div>
    </div>
</section>

<div id="theModal" class="modal fade text-center">
   <div class="modal-dialog">
     <div class="modal-content">
     </div>
   </div>
 </div>
<script>
// export button
$("#fixed-form-container .body").hide();

$('#btn-print').click(function () {
     $(this).toggleClass("expanded"); // for + and -

    if($("#fixed-form-container .body").is(":visible")){
        $("#fixed-form-container .body").hide();

     }else{
        $("#fixed-form-container .body").show();

     }
});

//////////////////
       $('.li-modal').on('click', function(e){
        e.preventDefault();
        $('#theModal').modal('show').find('.modal-content').load($(this).attr('href'));
      });

      ///////////////
</script>


<script src="{{@BASE}}/ui/js/owl.carousel.min.js"></script>

<script src="{{@BASE}}/ui/js/app.js"></script>

<!-- // button scroll top -->
<script src="{{@BASE}}/ui/js/vanillatop.min.js"></script>
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
