<!DOCTYPE html>
<html>
    <head>
     <link rel="stylesheet" href="<?= ($BASE) ?>/ui/css/nour_style.css"/>
        <?php echo $this->render('/layouts/header.html',NULL,get_defined_vars(),0); ?>

    </head>
    <style>
    #single {
    margin-top: -11px;
      }
    body{
      overflow: hidden;
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

    </style>
<body>
<?php echo $this->render('/layouts/nav.html',NULL,get_defined_vars(),0); ?>
<div class="home-page">

  <div class="page-content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12 text-right">
            <h3 class="page-title">مؤشرات الأداء</h3>
            <div class="under-line"></div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-8">
            <div class="row">
              <div class="col-lg-6">
                <div class="form-group search-form">

             <select id="single" class="js-states form-control" onchange="location = this.value;" >

               <option value="">
                اختر المؤشر المطلوب

                </option>

             <?php foreach (($kpis?:[]) as $kpi): ?>


             <option value="/wkpis/details/<?= (trim($kpi['kpi_id'])) ?>">
                <?= (trim($kpi['kpi_title']))."
" ?>

              </option>

           <?php endforeach; ?>

            </select>

          </div>
        </div>


<!-- //// -->

    <div class="col-lg-6">
      <div class="form-group select-menu">
        <label for="select">تصنيف المؤشرات</label>

      <select id="multiple" class="form-control" name="multiple"   >
        <option  >
         اختر المجموعة

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
  </div>
 </div>
</div>






 <div id="output" style="direction: ltr; ">



</div>

  </div>

<!-- /////////////////////////////// -->


 </div>
</div>


<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Select2 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js" defer></script>

<script type="text/javascript">

//////////////

$('#multiple').on('change', function() {

    $.ajax({
          type: "GET",
          url: "http://localhost:8000/wkpis/carosel/"+$(this).find(":selected").val() ,  // your PHP generating ONLY the inner DIV code
              // data:   "showimages=100",
              success: function(html){
                  $("#output").html(html);
              },
      });
});



  /** $.ajaxComplete */
  $(document).ajaxComplete(function () {

    $("#owl-carousel-container").carousel("pause").removeData();
  $("#owl-carousel-container").carousel(target_slide_index);

  });


  $(document).ready(function() {
      $('#single').select2();
      $('#multiple').select2();

  });



</script>



<?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>
</body>
</html>
