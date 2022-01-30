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
                <div class="page-data-content">
                    <h3 class="page-title">
                        <a class="page-title" href="/home">الرئيسية</a>/
                        <a class="page-title" >الاعدادات</a>
                        <?php if ($breadcrumb): ?>
                            /<a class="page-title" href="/projections/Category/<?= ($prj_cat) ?>"><?= ($breadcrumb) ?></a>
                        <?php endif; ?>
                    </h3>
                </div>
                <div class="col-lg-12 text-right">
                    <h3 class="page-title">الملف الشخصى </h3>
                    <div class="under-line"></div>
                </div>

            </div>
        </div>
        <div class="container-fluid">

            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 text-right">
                                <form method="POST" action="" >
                                    <input type="hidden" name="token" value="<?= ($CSRF) ?>">
                                    <div class="form-group">
                                        <label >اﻷسم</label>
                                        <input class="form-control edit-account" type="text"  name="name" value="<?= ($SESSION['user'][0]['name']) ?>"  />
                                        <div class=" danger mt-1">
                                            <strong><?= ($errors['name']) ?></strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label >البريد الالكتروني</label>
                                        <input class="form-control edit-account" type="email"  name="email" value="<?= ($SESSION['user'][0]['email']) ?>"  />
                                        <div class=" danger mt-1">
                                            <strong><?= ($errors['email']) ?></strong>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label >الموبيل</label>
                                        <input class="form-control edit-account" type="text"  name="phone" value="<?= ($SESSION['user'][0]['phone']) ?>"  />
                                        <div class=" danger mt-1">
                                            <strong><?= ($errors['phone']) ?></strong>
                                        </div>
                                    </div>
                                    <div class=" danger mt-1">
                                        <strong><?= ($error) ?></strong>
                                    </div>
                                    <div class=" success mt-1">
                                        <strong><?= ($success) ?></strong>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-primary">تعديل</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>
    <script src="<?= ($BASE) ?>/ui/js/app_proj.js"></script>
</div>
</body>
</html>