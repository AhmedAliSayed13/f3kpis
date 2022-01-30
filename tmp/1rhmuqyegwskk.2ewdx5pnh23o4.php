<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <?php echo $this->render('/layouts/header.html',NULL,get_defined_vars(),0); ?>
    <link rel="stylesheet" href="<?= ($BASE) ?>/css/theme.default.min.css">
    <link href="<?= ($BASE) ?>/ui/css/ahmed-style.css" type="text/css" rel="stylesheet" />
</head>
<body class="bg-white">
<div class="page-6 ">

    <?php echo $this->render('/layouts/nav.html',NULL,get_defined_vars(),0); ?>
<div class="page-5 ">
    <div class="page-content pb-2 ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 text-right">
                    <h3 class="page-title">
                        <a class="page-title" href="/wkpis/home">الرئيسية</a>/
                        <a class="page-title" href="/projections/show/group">الاستنباط-التنبؤ</a>/
                    </h3>
                    <h3 class="page-title"><?= ($title) ?></h3>
                    <div class="under-line"></div>
                </div>
                <div class="col-12 into-div-head ">
                    <?= ($this->raw($description))."
" ?>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="tab-content pro-collapse-div" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
                    <div class="container-fluid">
                        <div class="row">
                            <?php if ($type==1): ?>

                                    <?php for ($i=0;$i < count($projection_roots);$i++): ?>
                                        <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                                            <div class="card">
                                                <div class="card-header ">
                                                    <h3><?= ($projection_roots[$i]['prj_title']) ?> </h3>
                                                    <button class="toggle-body-button">



                                                        <?= (($i==0?'<i class="fas fa-minus"></i>':'<i class="fas fa-plus"></i>'))."
" ?>

                                                    </button>
                                                </div>

                                                <div class="card-body item-collapse <?= (($i==0? '':'d-block')) ?> ">
                                                    <ul class="list-unstyled">
                                                        <?php for ($x=0;$x < count($projections_sub);$x++): ?>
                                                            <?php if ($projections_sub[$x]['prj_id']!=42): ?>
                                                                <?php if ($projections_sub[$x]['prj_root_id']==$projection_roots[$i]['prj_id']): ?>
                                                                    <li><a href="/projections/details/<?= ($projections_sub[$x]['prj_id']) ?>"><img src="/ui/images/icons/analytics-11.svg" alt=""><span><?= ($projections_sub[$x]['prj_title']) ?></span></a></li>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>

                            <?php endif; ?>
                            <?php if ($type==2): ?>

                                    <?php for ($i=0;$i < count($projection_roots);$i++): ?>
                                        <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3><?= ($projection_roots[$i]['prj_title']) ?> </h3>
                                                    <button class="toggle-body-button">
                                                        <?= (($i==0?'<i class="fas fa-minus"></i>':'<i class="fas fa-plus"></i>'))."
" ?>
                                                    </button>
                                                </div>
                                                <div class="card-body item-collapse <?= (($i==0? '':'d-block')) ?>">
                                                    <ul class="list-unstyled">
                                                        <?php for ($x=0;$x < count($projections_sub);$x++): ?>
                                                            <?php if ($projections_sub[$x]['prj_root_id']==$projection_roots[$i]['prj_id']): ?>
                                                                <li><a href="/projections/details/<?= ($projections_sub[$x]['prj_id']) ?>"><img src="/ui/images/icons/analytics-11.svg" alt=""><span><?= ($projections_sub[$x]['prj_title']) ?></span></a></li>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>

                            <?php endif; ?>
                            <?php if ($type==3): ?>

                                    <?php for ($i=0;$i < count($projection_roots);$i++): ?>
                                        <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3><?= ($projection_roots[$i]['prj_title']) ?> </h3>
                                                    <button class="toggle-body-button">
                                                        <?= (($i==0?'<i class="fas fa-minus"></i>':'<i class="fas fa-plus"></i>'))."
" ?>
                                                    </button>
                                                </div>
                                                <div class="card-body item-collapse <?= (($i==0? '':'d-block')) ?>">
                                                    <ul class="list-unstyled">
                                                        <?php for ($x=0;$x < count($projections_sub);$x++): ?>
                                                            <?php if ($projections_sub[$x]['prj_id']==44 or $projections_sub[$x]['prj_id']==46): ?>
                                                                <?php if ($projections_sub[$x]['prj_root_id']==$projection_roots[$i]['prj_id']): ?>
                                                                    <li><a href="/projections/details/<?= ($projections_sub[$x]['prj_id']) ?>"><img src="/ui/images/icons/analytics-11.svg" alt=""><?= ($projections_sub[$x]['prj_title']) ?></span></a></li>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>

                            <?php endif; ?>
                            <?php if ($type==4): ?>

                                    <?php for ($i=0;$i < count($projection_roots);$i++): ?>
                                        <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3><?= ($projection_roots[$i]['prj_title']) ?> </h3>
                                                    <button class="toggle-body-button">
                                                        <?= (($i==0?'<i class="fas fa-minus"></i>':'<i class="fas fa-plus"></i>'))."
" ?>
                                                    </button>
                                                </div>
                                                <div class="card-body item-collapse <?= (($i==0? '':'d-block')) ?>">
                                                    <ul class="list-unstyled">
                                                        <?php for ($x=0;$x < count($projections_sub);$x++): ?>
                                                            <?php if ($projections_sub[$x]['prj_id']!=41): ?>
                                                                <?php if ($projections_sub[$x]['prj_root_id']==$projection_roots[$i]['prj_id']): ?>
                                                                    <li><a href="/projections/details/<?= ($projections_sub[$x]['prj_id']) ?>"><img src="/ui/images/icons/analytics-11.svg" alt=""><?= ($projections_sub[$x]['prj_title']) ?></span></a></li>
                                                                <?php endif; ?>
                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>

                            <?php endif; ?>
                            <?php if ($type==5): ?>
                                    <?php for ($i=0;$i < count($projection_roots);$i++): ?>
                                        <div class="col-lg-4 col-md-6 col-sm-12 mt-4">
                                            <div class="card">
                                                <div class="card-header">
                                                    <h3><?= ($projection_roots[$i]['prj_title']) ?> </h3>
                                                    <button class="toggle-body-button">
                                                        <?= (($i==0?'<i class="fas fa-minus"></i>':'<i class="fas fa-plus"></i>'))."
" ?>
                                                    </button>
                                                </div>
                                                <div class="card-body item-collapse <?= (($i==0? '':'d-block')) ?>">
                                                    <ul class="list-unstyled">
                                                        <?php for ($x=0;$x < count($projections_sub);$x++): ?>
                                                            <?php if ($projections_sub[$x]['prj_id']==37): ?>

                                                                    <li><a href="#" data-toggle="modal" data-target="#proj37Modal"><img src="/ui/images/icons/analytics-11.svg" alt=""><span><?= ($projections_sub[$x]['prj_title']) ?></span></a></li>

                                                                <?php else: ?>
                                                                    <?php if ($projections_sub[$x]['prj_id']!=39): ?>
                                                                        <li><a href="/projections/details/<?= ($projections_sub[$x]['prj_id']) ?>"><img src="/ui/images/icons/analytics-11.svg" alt=""><span><?= ($projections_sub[$x]['prj_title']) ?></span></a></li>
                                                                    <?php endif; ?>

                                                            <?php endif; ?>
                                                        <?php endfor; ?>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="proj37Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h5 class="modal-title">اختار المقاول لعرض بياناته</h5>
            </div>

            <form method="post" action="">
                <div class="modal-body text-right">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <select class="  js-example-basic-single "  >
                                    <?php foreach (($contractors?:[]) as $ikey=>$contractor): ?>
                                        <option value="<?= ($contractor['cont_id']) ?>"><?= ($contractor['cont_name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-left">
                    <a  href="/projections/details/37" class=" btn btn-primary p-2 m-2"  type="submit">عرض</a>
                </div>
            </form>
        </div>
    </div>
</div>

<?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>
<script src="<?= ($BASE) ?>/ui/js/app_proj.js"></script>
</div>
</body>
</html>
