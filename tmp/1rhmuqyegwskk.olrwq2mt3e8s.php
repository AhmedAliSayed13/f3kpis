
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <?php echo $this->render('/layouts/header.html',NULL,get_defined_vars(),0); ?>
    <link rel="stylesheet" href="<?= ($BASE) ?>/css/theme.default.min.css">
    <link href="<?= ($BASE) ?>/ui/css/ahmed-style.css" type="text/css" rel="stylesheet" />
</head>
<body>
<div class="page-6">

    <?php echo $this->render('/layouts/nav.html',NULL,get_defined_vars(),0); ?>
<div class="page-content">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 text-right">

            <h3 class="page-title">
                <a class="page-title" href="/wkpis/home">الرئيسية</a>/
                الاستنباط-التنبؤ
            </h3>
            <div class="under-line"></div>

            <p class="sub-title mb-3">نتائج الاستنباط/التنبؤ وفقا لخوارزميات التنقيب في البيانات </p>
        </div>
    </div>
    <div class="row">

        <div class="col-lg-4 col-md-6 col-sm-12  card-group1">
            <div class="info-card">
                <div class="card-content">
                    <a href="/projections/Category/<?= ($projection_categories[0]['pcat_id']) ?>">
                        <h3><?= ($projection_categories[0]['pcat_title']) ?></h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12  card-group2">
            <div class="info-card">
                <div class="card-content">
                    <a href="/projections/Category/<?= ($projection_categories[1]['pcat_id']) ?>">
                        <h3><?= ($projection_categories[1]['pcat_title']) ?></h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-12  card-group3">
            <div class="info-card">
                <div class="card-content">
                    <a href="/projections/Category/<?= ($projection_categories[2]['pcat_id']) ?>">
                        <h3><?= ($projection_categories[2]['pcat_title']) ?></h3>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-2 col-md-2 col-sm-0"></div>
        <div class="col-lg-4 text-left col-md-6 col-sm-12  card-group4">
            <div class="info-card">
                <div class="card-content">
                    <a href="/projections/Category/<?= ($projection_categories[3]['pcat_id']) ?>">
                        <h3><?= ($projection_categories[3]['pcat_title']) ?></h3>
                    </a>
                </div>
            </div>
        </div>

        <div class="col-lg-4  col-md-6 col-sm-12  card-group5">
            <div class="info-card">
                <div class="card-content">
                    <a href="/projections/Category/<?= ($projection_categories[4]['pcat_id']) ?>">
                        <h3><?= ($projection_categories[4]['pcat_title']) ?></h3>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-sm-0"></div>
    </div>

</div>
</div>

<?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>
    <script src="<?= ($BASE) ?>/ui/js/app_proj.js"></script>
</div>
</body>
</html>
