<!DOCTYPE html>
<html>
    <head>
      <link href="<?= ($BASE) ?>/ui/css/owl.carousel.min.css" type="text/css" rel="stylesheet" />
      <link href="<?= ($BASE) ?>/ui/css/owl.theme.default.min.css" type="text/css" rel="stylesheet" />
      <link href="<?= ($BASE) ?>/ui/css/owl_carousel.css" type="text/css" rel="stylesheet" />


    </head>
    <style>
    #single{
      margin-top: -11px;
    }
    </style>
<body>

    <?php foreach (($kpis?:[]) as $kpi): ?>
    <?php endforeach; ?>
    <?php foreach (($category?:[]) as $category): ?>
    <?php endforeach; ?>


    <div class="row">
      <div class="col-12">
      </div>
    </div>

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

  <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="<?= ($BASE) ?>/js/owl.carousel.min.js"></script>
  <script src="<?= ($BASE) ?>/js/app.js"></script>

  </html>
