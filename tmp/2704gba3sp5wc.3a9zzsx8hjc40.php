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
            <div class="col-lg-12">
                <nav class="py-0 page-header" style="padding: 25px 40px 0px">

                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-12 text-right">
                                <div class="page-data-content">
                                    <h3 class="page-title">
                                        <a class="page-title" href="/wkpis/home">الرئيسية</a>/
                                        <a class="page-title" >الاعدادات</a>
                                        <?php if ($breadcrumb): ?>
                                            /<a class="page-title" href="/projections/Category/<?= ($prj_cat) ?>"><?= ($breadcrumb) ?></a>
                                        <?php endif; ?>
                                    </h3>

                                </div>
                            </div>

                            <div class="col-lg-8 col-md-12 text-right">
                                <div class="page-data-content">
                                    <h3>المستخدمين</h3>
                                    <div class="under-line"></div>
                                    <p> عدد المستخدمين الحالى <span><?= ($count) ?> مستخدم</span></p>
                                    <a href="/add/user" class="btn btn-success" id="create_user_btn" ><i class="fas fa-plus"> </i>&nbsp; اضافه عضو جديد</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
                <table class="table table-striped tablesorter text-right" id="myTable">
                    <thead>
                    <tr>
                        <th> م</th>
                        <th>الاسم</th>
                        <th>اسم المستخدم</th>
                        <th>رقم الهاتف</th>
                        <th>اﻷيميل</th>
                        <th>الأعدادات</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php foreach (($users?:[]) as $user): ?>
                            <tr>
                                <td><?= ($user['usr_id']) ?></td>
                                <td><?= ($user['name']) ?></td>
                                <td><?= ($user['usr_name']) ?></td>
                                <td><?= ($user['phone']) ?></td>
                                <td><?= ($user['email']) ?></td>
                                <td>
                                    <a data-toggle="modal" data-target="#see-users-modal-<?= ($user['usr_id']) ?>"  class="btn btn-primary text-white ml-2" title="عرض"><i class="fas fa-eye"></i></a>
                                    <a class="btn btn-info text-white ml-2" href="/administration-edit-user/<?= ($user['usr_id']) ?>" title="تعديل"><i class="fas fa-edit"></i></a>
                                    <a data-toggle="modal" data-target="#create-users-modal" class="btn btn-danger text-white ml-2" href="/user/delete/account/<?= ($user['usr_id']) ?>" title="حذف"><i class="fas fa-trash"></i></a></td>
                                <div class="modal fade" id="see-users-modal-<?= ($user['usr_id']) ?>">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">عرض بيانات عضو </h5>
                                            </div>
                                            <div class="modal-body text-right">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="form-group">
                                                            <label class="item-name-popup" >اﻷسم:</label>
                                                            <p class="pr-5"><?= ($user['name']) ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="item-name-popup">اسم المستخدم:</label>
                                                            <p class="pr-5"><?= ($user['usr_name']) ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="item-name-popup">رقم الهاتف:</label>
                                                            <p class="pr-5"><?= ($user['phone']) ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            <label class="item-name-popup">اﻷيميل:</label>
                                                            <p class="pr-5"><?= ($user['email']) ?></p>
                                                        </div>
                                                    </div>
                                                    <?php if ($user['priv_admin']!='Y'): ?>
                                                        
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="item-name-popup">مؤشرات الأداء:</label>
                                                                    <p class="pr-5"><?= ($user['kpis_ids']) ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="item-name-popup">الأستنباط:</label>
                                                                    <p class="pr-5"><?= ($user['projections_ids']) ?></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="item-name-popup">مؤشرات البحث و الأسترجاع:</label>
                                                                    <p class="pr-5"><?= ($user['reports_ids']) ?></p>
                                                                </div>
                                                            </div>
                                                        
                                                        <?php else: ?>
                                                            <div class="col-12">
                                                                <div class="form-group">
                                                                    <label class="item-name-popup">نوع الحساب:</label>
                                                                    <p class="pr-5">مدير</p>
                                                                </div>
                                                            </div>
                                                        
                                                    <?php endif; ?>


                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


    <div class="modal fade" id="create-users-modal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-body text-right">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label >تاكيد حذف المستخدم</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-left">
                    <a href="/user/delete/account/<?= ($user['usr_id']) ?>" class="btn btn-info p-2" id="create_user_submit_btn" type="submit">تاكيد</a>
                </div>
            </div>
        </div>
    </div>

<?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>
    <script src="<?= ($BASE) ?>/ui/js/app_proj.js"></script>
</div>
</body>
</html>
