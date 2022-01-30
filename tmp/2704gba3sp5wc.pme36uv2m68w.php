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
<nav class="page-header bg-white ">
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
        <div class="row ">
            <div class="col-12">
                <div class="hr"></div>
            </div>
            <div class="col-12 mb-4 intro ">
                <?= ($this->raw($intro))."
" ?>

            </div>
        </div>
    </div>
</nav>
<div class="home-page bg-white">
    <div class="page-content bg-white">
        <div class="container-fluid bg-white" id="data-container">
            <div class="tab-content" id="pills-tabContent">
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
    <div class="row bg-white">

        <div class="col-lg-12 home-page proj-div bg-white">
            <div class="col-12 divheader">
                <div class='col-12'>
                    <div class='col-4 float-left text-center'><img src='<?= ($BASE) ?>/ui/images/logo.png' /></div>
                    <div class='col-4 float-left text-center'><p style='font-size: 18px;font-weight: bold;margin-top: 30px'>وكالة الوازارة للمشاريع و الصيانة</p></div>
                    <div class='col-4 float-left text-center'><img src='<?= ($BASE) ?>/ui/images/analytics.png' /></div>
                </div>
            </div>
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
                                        <table class="table tablesorter table-striped text-right table-scroll" id="myTable">
                                            <thead>
                                            <tr>

                                                <th> م </th>
                                                <th> <?= ($dataset0_Name) ?> </th>
                                                <th> <?= ($dataset1_Name) ?> </th>
                                                <th> <?= ($dataset2_Name) ?> </th>
                                                <th> <?= ($dataset3_Name) ?> </th>
                                                <th> <?= ($dataset4_Name) ?> </th>
                                                <th> <?= ($dataset5_Name) ?> </th>


                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php for ($i=0;$i < $count;$i++): ?>
                                                <tr>

                                                    <td><?= ($i+1) ?></td>
                                                    <td><?= ($dataset0_value[$i]->label) ?></td>
                                                    <td><?= ($dataset1_value[$i]->value) ?></td>
                                                    <td><?= ($dataset2_value[$i]->value) ?></td>
                                                    <td><?= ($dataset3_value[$i]->value) ?></td>
                                                    <td><?= ($dataset4_value[$i]->value) ?></td>
                                                    <td><?= ($dataset5_value[$i]->value) ?></td>



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
            </div>
        </div>
    </div>
</div>
<div class="home-page home-page-2 bg-white">

    <div class="page-content bg-white">

        <div class="container-fluid bg-white" >

            <div class="tab-content bg-white" >
                <div class="tab-pane bg-white fade show active"  role="tabpanel" aria-labelledby="pills-0-tab">
                    <div class="card">

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

