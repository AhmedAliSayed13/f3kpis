<!DOCTYPE html>
<html>
    <head>
      <?php echo $this->render('/layouts/header.html',NULL,get_defined_vars(),0); ?>
      <link href="<?= ($BASE) ?>/ui/css/test.css" type="text/css" rel="stylesheet" />

    </head>
    <style>
    .welcome-page .content .page-title {
        margin: 95px 0px 81PX;
      }
    .welcome-page .content .card-info {
        margin: auto;
        max-width: 400px;
      }
      .welcome-page .content .cards-container {
    position: relative;
    right: 0;
    padding-left: 0;
}
.welcome-page {
     min-height: 0;
  }
  body{
    background-color: #e5ecec;

  }
    </style>

  <body>
  <?php echo $this->render('/layouts/nav.html',NULL,get_defined_vars(),0); ?>
<div class="welcome-page">
  <div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <h3 class="page-title">من فضلك أختر</h3>
      </div>
    </div>
    <div class="row cards-container">
      <div class="col-lg-4 col-md-6 col-12">
        <div class="card-info">
          <div class="circle"> </div>
          <div class="card-content"><a href="/wkpis/kpi"><img src="<?= ($BASE) ?>/ui/images/icons/website-1.svg" alt="" srcset=""/>مؤشرات الأداء</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12">
        <div class="card-info">
          <div class="circle"> </div>
          <div class="card-content"><a href="/projections/show/group"><img src="<?= ($BASE) ?>/ui/images/icons/analytics-1.svg" alt="" srcset=""/>الأستنباط</a></div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-12">
        <div class="card-info">
          <div class="circle"> </div>
          <div class="card-content"><a href="/report/list"><img src="<?= ($BASE) ?>/ui/images/icons/magnifier-1.svg" alt="" srcset=""/>نماذج البحث و الأسترجاع</a></div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
  <?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>

</body>

</html>
