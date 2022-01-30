<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <?php echo $this->render('/layouts/header.html',NULL,get_defined_vars(),0); ?>
    <link rel="stylesheet" href="<?= ($BASE) ?>/css/theme.default.min.css">
    <link href="<?= ($BASE) ?>/ui/css/ahmed-style.css" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="<?= ($BASE) ?>/ui/js/jquery.tablesorter.js"></script>
    <script type="text/javascript" src="<?= ($BASE) ?>/ui/js/jquery.tablesorter.widgets.js"></script>
</head>
<body class="bg-white">
<div class="page-6">
<?php echo $this->render('/layouts/nav.html',NULL,get_defined_vars(),0); ?>
<nav class="page-header bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-right">
                <div class="right-bookmark">
                    <div class="right-bookmark"><br></div>
                </div>
                <div class="page-data-content">
                    <h3 class="page-title">
                        <a class="page-title" href="/wkpis/home">الرئيسية</a>/
                        <a class="page-title" href="/projections/show/group">الاستنباط-التنبؤ</a>
                        <?php if ($breadcrumb): ?>
                            /<a class="page-title" href="/projections/Category/<?= ($prj_cat) ?>"><?= ($breadcrumb) ?></a>
                        <?php endif; ?>

                    </h3>
                    <h3> <?= (@$caption) ?></h3>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="hr"></div>
            </div>
            <div class="col-12 mb-4 bg-white">
                <?= ($this->raw($intro))."
" ?>

            </div>
        </div>
    </div>
</nav>
<div class="home-page bg-white">

    <div class="page-content">

        <div class="container-fluid bg-white" id="data-container">

            <div class="tab-content bg-white" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
                    <div class="card">

                        <div class="card-body">
                            <div class="container-fluid statics">
                                <div class="row">
                                    <div class="col-lg-12 col-sm-12 text-right">
                                        <div class="charts">
                                            <div id="chart-container">FusionCharts XT will load here!</div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-white">
<div class="row">
        <div class="col-lg-12 home-page proj-div">

            <div id="table_div" >
                <table style = "margin:auto">
                    <thead>
                    <tr>
                        <th style=" padding: 0px !important;  background-color: white;">
                            <nav class=" header-print-div page-header" >
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-lg-8 col-md-8 text-right">
                                            <div class="right-bookmark">
                                                <p> <br></p>
                                            </div>
                                            <div class="page-data-content">
                                                <h3> <a style="color: #272d3b; text-decoration: none;">الرئيسية / </a><a href="/report/list" style="color: #272d3b; text-decoration: none;"> نماذج البحث و الأسترجاع</a> </h3>
                                                <p>    الاستنباط الاستنباط </p>
                                            </div>
                                        </div>
                                        <div class=" col-md-4 img ">
                                            <img src="../../../ui/images/logo.png" width="150" height="110"  alt="" >
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
                                    <div class="col-md-12 "  >
                                        <table class="table tablesorter table-striped text-right" id="myTable">
                                            <thead>
                                            <tr>
                                                <th> م </th>
                                                <th> <?= ($dataset0_Name) ?> </th>
                                                <th> <?= ($dataset1_Name) ?> </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php for ($i=0;$i < $count;$i++): ?>
                                                <tr>
                                                    <td><?= ($i+1) ?></td>
                                                    <td><?= ($dataset0_value[$i]->label) ?></td>
                                                    <td><?= ($dataset1_value[$i]->value) ?></td>
                                                </tr>
                                            <?php endfor; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>
        <div class="col-12 text-right home-page proj-div">
            <div class="dropdown">
                <button class="btn btn-secondary export-btn pl-4 pr-4  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-file-medical pl-2"></i>تصدير
                </button>
                <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                    <a id="btn_txt" class="dropdown-item export-item proj-item" ><i class="fas fa-file-export"></i>TXT</a>
                    <a onclick="createPDF()" class="dropdown-item export-item proj-item" ><i class="fas fa-file-export"></i>PDF</a>
                    <a id="btn_csv" class="dropdown-item export-item proj-item" ><i class="fas fa-file-export"></i>CSV</a>
                    <a id="btn_json" class="dropdown-item export-item proj-item" ><i class="fas fa-file-export"></i>jSON</a>
                </div>

                <?php if ($id==43): ?>
                        <button data-toggle="modal" data-target="#proj44Modal" class="btn btn-info mr-2 btn-contractor"><i class="fas fa-search"></i> اختار منطقة</button>
                <?php endif; ?>
                <?php if ($id==44): ?>
                    <button data-toggle="modal" data-target="#proj44Modal" class="btn btn-info mr-2 btn-contractor"><i class="fas fa-search"></i> اختار منطقة</button>
                <?php endif; ?>
                <?php if ($id==45): ?>
                        <button data-toggle="modal" data-target="#proj46Modal" class="btn btn-info mr-2 btn-contractor"><i class="fas fa-search"></i> اختار منطقة</button>
                <?php endif; ?>
                <?php if ($id==46): ?>
                    <button data-toggle="modal" data-target="#proj46Modal" class="btn btn-info mr-2 btn-contractor"><i class="fas fa-search"></i> اختار منطقة</button>
                <?php endif; ?>
        </div>
    </div>
</div>
<div class="home-page home-page-2 bg-white">
    <div class="page-content bg-white">
        <div class="container-fluid bg-white" >
            <div class="tab-content bg-white" >
                <div class="tab-pane fade show active"  role="tabpanel" aria-labelledby="pills-0-tab">
                    <div class="card bg-white">
                        <div class="card-body comments">
                            <div class="container-fluid statics">
                                <div class="row">
                                    <?= ($this->raw($comment))."
" ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="proj44Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title">اختار منطقة ليتم التنبؤ خلالها </h5>
                </div>

                <form method="post" action="">
                    <div class="modal-body text-right">
                        <div class="row">
                            <div class="col-12">
                            <div class="form-group">
                                <label class="text" >المنطقة</label>
                                <select class=" form-control  js-example-basic-single "  >
                                    <?php foreach (($regions?:[]) as $ikey=>$region): ?>
                                        <option value="<?= ($region['reg_id']) ?>"><?= ($region['reg_name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="text" >التكلفة بالمليار</label>
                                    <input type="text" class="form-control pop-textbox" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-left">
                        <a  href="/projections/details/43" class=" btn btn-primary p-2 m-2"  type="submit">عرض</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<div class="modal fade" id="proj46Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h5 class="modal-title"> ادخل البيانات ليتم التنبؤ بتكلفة المشروع</h5>
                </div>

                <form method="post" action="">
                    <div class="modal-body text-right">
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="text" >المنطقة</label>
                                    <select class=" form-control  js-example-basic-single "  >
                                        <?php foreach (($regions?:[]) as $ikey=>$region): ?>
                                            <option value="<?= ($region['reg_id']) ?>"><?= ($region['reg_name']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="text" >المدة بالايام</label>
                                    <input type="number" class="form-control" value="1">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer text-left">
                        <a  href="/projections/details/45" class=" btn btn-primary p-2 m-2"  type="submit">عرض</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
<script type="text/javascript">
        // Create an Instance with chart options
        var chartInstance = new FusionCharts({
            type: "mscolumn3d",
            renderAt: "chart-container",
            width: '100%', // Width of the chart
            height: '675', // Height of the chart
            dataFormat: 'jsonurl',
            //dataSource: '../../ind_1.json'
            dataSource: '../../r_json/proj_<?= (trim($proj_id)) ?>.json'
        });
        // Render
        chartInstance.render();
    </script>
<?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>
<script src="<?= ($BASE) ?>/ui/js/app_proj.js"></script>
</div>
</body>
</html>

