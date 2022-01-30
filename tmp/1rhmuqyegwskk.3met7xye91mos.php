  <!DOCTYPE html>
  <html lang="en">

   <head>

    <?php echo $this->render('/layouts/header.html',NULL,get_defined_vars(),0); ?>
    <link rel="stylesheet" href="<?= ($BASE) ?>/ui/css/nour_style.css"/>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <?php echo $this->render('pdf_excel.html',NULL,get_defined_vars(),0); ?>


  </head>

  <body>
  <?php echo $this->render('/layouts/nav.html',NULL,get_defined_vars(),0); ?>
    <?php foreach (($reports?:[]) as $reports): ?>
    <?php endforeach; ?>

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
                      <h3 class="page-title"> <a  class="page-title2" href="/wkpis/home" >الرئيسية / </a><a href="/report/list" style="color: #272d3b; text-decoration: none;"> نماذج البحث و الأسترجاع  </a></h3>
                        <div class="under-line"></div>

                      <p  class="sub-title ">   <span class="sub-title"> <?= ($reports['rep_title']) ?> </span> </p>
                      <?php if ($from  != ''): ?>
                        <p class="sub-title  ">    من <span class="sspan"> <?= ($from) ?>  </span> الي  <span id="hijri1" class="sspan">  </span> </p>
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
         <?php echo $this->render('../../r_json/report_'.$rep_id.'.html',NULL,get_defined_vars(),0); ?>
         </div>
      </div>
  </div>
  </td>
   </tr>
  </<tbody>
  </table>
  </div>
  <section id="fixed-form-container">
  	<div class="button"><span>  تصدير </span></div>
  		<div class="body">
  		 <div class="form-group">
             <a href="/r_file/report_<?= ($rep_id) ?>.xlsx"  > Excel  </a>
            <input type="button" value="PDF"
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
  <script src="<?= ($BASE) ?>/ui/js/moment.min.js" ></script>
  <script src="<?= ($BASE) ?>/ui/js/moment-hijri.js"></script>
  <script>
    var to = moment().format('iYYYY-iMM-iDD');
     document.getElementById("hijri1").innerHTML =  to;
   </script>
   </body>
  </html>
