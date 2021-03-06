<!DOCTYPE html>
<html>
<head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.8/slick.min.css">
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="<?= ($BASE) ?>/ui/css/nour_style.css"/>
  <?php echo $this->render('/layouts/header.html',NULL,get_defined_vars(),0); ?>
  <link href="<?= ($BASE) ?>/ui/css/owl.carousel.min.css" type="text/css" rel="stylesheet" />
  <link href="<?= ($BASE) ?>/ui/css/owl.theme.default.min.css" type="text/css" rel="stylesheet" />
  <link href="<?= ($BASE) ?>/ui/css/owl_carousel.css" type="text/css" rel="stylesheet" />

</head>
<style>
    #single {
    margin-top: -11px;
      }
    .select2-results__option {
      text-align: right;
       font-family: 'Cairo', sans-serif;
       font-size: 17px;
    }
    .select2-container--default .select2-results__option[aria-selected=true] {
        background-color: #5897fb;
        text-align: right;
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
      height: 56px;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        color: #444;
        line-height: 1.5;
    }
    #single{
      margin-top: -11px;
          /* width: 100%; */
    }
    .home-page .select-menu select {
    border: 1px solid #aaaaaa;
    color: #444444;
    font: inherit;
}
.select2-container .select2-selection--single {
    height: 50px;
}
.select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__arrow {
    top: 13px;
}
</style>
<body>
<?php echo $this->render('/layouts/nav.html',NULL,get_defined_vars(),0); ?>
<div class="home-page">

  <div class="page-content">
    <div class="container-fluid">
         <div class="row">
          <div class="col-lg-12 text-right">
              <h3 class="page-title">
                  <a class="page-title" href="/wkpis/home">????????????????</a>/
                   ???????????? ????????????
              </h3>
              <div class="under-line"></div>
           </div>
        </div>
      </div>
        <div class="row">
          <div class="col-lg-10">
              <div class="row">

        <!-- //// -->
            <div class="col-lg-5">
              <div class="form-group  search-form">
                <label for="select">?????????? ????????????????</label>

                <select id="multiple" class="form-control" name="multiple"   >
                  <option  >
                   ???????? ????????????????
                   </option>
                   <?php foreach (($category?:[]) as $category): ?>
                      <option value="<?= (trim($category['kcat_id'])) ?>">
                        <?= (trim($category['kcat_title']))."
" ?>
                      </option>
                  <?php endforeach; ?>
               </select>
             </div>
           </div>
        <!-- //// -->
        <div class="col-lg-5">
          <div id="test">

          </div>
        </div>
      <!-- //// -->
      </div>
     </div>
    </div>
    <!-- // carousel // -->
   <div id="output" style="direction: ltr; ">
     <div id="owl-carousel-container" >
       <button class="navigation-button" id="right-nav-button"><i class="fas fa-arrow-right"></i></button>
       <button class="navigation-button" id="left-nav-button"><i class="fas fa-arrow-left"></i></button>
       <div class="owl-carousel">
           <?php for ($i=0;$i < count($kpis);$i += 2): ?>
             <div class="item">
               <div class="info-card">
                 <div class="info-content"><img src="<?= ($BASE) ?>/ui/images/icons/analytics.png" alt=""/>
                    <a href="/wkpis/details/<?= ($kpis[$i]["kpi_id"]) ?>">   <?= ($kpis[$i]["kpi_title"]) ?> </a>
                 </div>
               </div>
               <?php if ($kpis[$i+1]  != ''): ?>
                 <div class="info-card">
                   <div class="info-content"><img src="<?= ($BASE) ?>/ui/images/icons/analytics.png" alt=""/>
                      <a href="/wkpis/details/<?= ($kpis[$i+1]["kpi_id"]) ?>"> <?= ($kpis[$i+1]["kpi_title"]) ?> </a>
                   </div>
                 </div>
               <?php endif; ?>
             </div>
          <?php endfor; ?>
       </div>
     </div>
  </div>
  <!-- // end carousel // -->

  </div>
 </div>
</div>



<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Select2 -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">

//////////////
// ajax
$('#multiple').on('change', function() {

    $.ajax({
          type: "GET",
          url: "<?= ($BASE) ?>/wkpis/carosel/"+$(this).find(":selected").val() ,  // your PHP generating ONLY the inner DIV code
              // data:   "showimages=100",
              success: function(html){
                  $("#test").html(html);
              },
      });
});
//select 2
  $(document).ready(function() {
      $('#single').select2();
      $('#multiple').select2();

  });

</script>


 <script src="<?= ($BASE) ?>/ui/js/owl.carousel.min.js"></script>
 <script src="<?= ($BASE) ?>/ui/js/app.js"></script>
  <!-- // button scroll top -->
 <a  class="vanillatop"></a>
 <script>
     jQuery(function($) {
     $('body').scrollToTop({
         skin: 'cycle'
     });
 });
 </script>
 <script src="<?= ($BASE) ?>/ui/js/vanillatop.min.js"></script>
 <!-- // end button scroll top -->
</body>
</html>
