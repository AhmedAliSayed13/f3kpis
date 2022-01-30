<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <?php echo $this->render('/layouts/header.html',NULL,get_defined_vars(),0); ?>
    <link href="<?= ($BASE) ?>/ui/css/ahmed-style.css" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="<?= ($BASE) ?>/ui/js/jquery.tablesorter.js"></script>
    <script>
        //fix the black color problem on Safari browser for fusion chart by send type
         $(document).ready(function() {
             eve.on('raphael.new', function () {
             this.raphael._url = this.raphael._g.win.location.href.replace(/#.*?$/, '');
             });
         });
       // end safari problem
       </script>
</head>
<body class="bg-white">
<div class="page-6">

    <?php echo $this->render('/layouts/nav.html',NULL,get_defined_vars(),0); ?>
<nav class="page-header bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 text-right container-breadcrumb">
                <div class="right-bookmark">
                    <div class="right-bookmark"><br></div>
                </div>
                <div class="page-data-content">
                    <h3 class="page-title">
                        <a class="page-title" href="/wkpis/home">الرئيسية</a>/
                        <a class="page-title" href="/projections/show/group">التنبؤ</a>
                        <?php if ($breadcrumb): ?>
                            /<a class="page-title" href="/projections/category/<?= ($prj_cat) ?>/<?= ($id) ?>"><?= ($breadcrumb) ?> </a>
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
            <div class="col-12 mb-4 intro">
                <?= ($this->raw($intro))."
" ?>

            </div>
        </div>
    </div>
</nav>
<div class="home-page bg-white">

    <div class="page-content">

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
    <div class="row">

        <div class="col-lg-12 home-page proj-div">
            <div class="col-12 divheader">
                <div class='col-12'>
                    <div class='col-4 float-left text-center'><img src='<?= ($BASE) ?>/ui/images/logo.png' /></div>
                    <div class='col-4 float-left text-center'><p style='font-size: 18px;font-weight: bold;margin-top: 30px'>وكالة الوازارة للمشاريع و الصيانة</p></div>
                    <div class='col-4 float-left text-center'><img src='<?= ($BASE) ?>/ui/images/analytics.png' /></div>
                </div>
            </div>
            <div id="table_div" class="table-scroll"  >
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
                                                <h3> <a style="color: #272d3b; text-decoration: none;">الرئيسية / </a>
                                                    <a href="/report/list" style="color: #272d3b; text-decoration: none;"> التنبؤ/</a>
                                                    <a href="/report/list" style="color: #272d3b; text-decoration: none;"> <?= ($breadcrumb) ?> </a>
                                                </h3>
                                                <p><?= (@$caption) ?></p>
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
                                        <table class="table tablesorter table-striped text-right " id="myTable">
                                            <thead>
                                            <tr>
                                                <?php if ($dataset14_Name): ?>
                                                    
                                                        <td>م</td>
                                                        <th> <?= ($dataset0_Name) ?> </th>
                                                        <th> <?= ($dataset1_Name) ?> </th>
                                                        <th> <?= ($dataset2_Name) ?> </th>
                                                        <th> <?= ($dataset3_Name) ?> </th>
                                                        <th> <?= ($dataset4_Name) ?> </th>
                                                        <th> <?= ($dataset5_Name) ?> </th>
                                                        <th> <?= ($dataset6_Name) ?> </th>
                                                        <th> <?= ($dataset7_Name) ?> </th>
                                                        <th> <?= ($dataset8_Name) ?> </th>
                                                        <th> <?= ($dataset9_Name) ?> </th>
                                                        <th> <?= ($dataset10_Name) ?> </th>
                                                        <th> <?= ($dataset11_Name) ?> </th>
                                                        <th> <?= ($dataset12_Name) ?> </th>
                                                        <th> <?= ($dataset13_Name) ?> </th>
                                                        <th> <?= ($dataset14_Name) ?> </th>
                                                        <th> <?= ($dataset15_Name) ?> </th>
                                                    
                                                    <?php else: ?>
                                                        <?php if ($dataset7_Name): ?>
                                                            
                                                                <td>م</td>
                                                                <th> <?= ($dataset0_Name) ?> </th>
                                                                <th> <?= ($dataset1_Name) ?> </th>
                                                                <th> <?= ($dataset2_Name) ?> </th>
                                                                <th> <?= ($dataset3_Name) ?> </th>
                                                                <th> <?= ($dataset4_Name) ?> </th>
                                                                <th> <?= ($dataset5_Name) ?> </th>
                                                                <th> <?= ($dataset6_Name) ?> </th>
                                                                <th> <?= ($dataset7_Name) ?> </th>
                                                                <th> <?= ($dataset8_Name) ?> </th>

                                                            
                                                            <?php else: ?>

                                                                <td>م</td>
                                                                <th> <?= ($dataset0_Name) ?> </th>
                                                                <th> <?= ($dataset1_Name) ?> </th>
                                                                <th> <?= ($dataset2_Name) ?> </th>
                                                                <th> <?= ($dataset3_Name) ?> </th>
                                                            
                                                        <?php endif; ?>
                                                    
                                                <?php endif; ?>

                                                <?php if ($dataset7_Name): ?>
                                                    

                                                    
                                                <?php endif; ?>
                                            </tr>
                                            </thead>
                                            <tbody>




                                            <?php if ($dataset7_value): ?>
                                                
                                                    <?php for ($i=0;$i < $count;$i++): ?>
                                                        <tr>
                                                            <td><?= ($i+1) ?></td>
                                                            <td><?= ($dataset0_value[$i]->label) ?></td>
                                                            <td><?= ($dataset1_value[$i]->value) ?></td>
                                                            <td><?= ($dataset2_value[$i]->value) ?></td>
                                                            <td><?= ($dataset3_value[$i]->value) ?></td>
                                                            <td><?= ($dataset4_value[$i]->value) ?></td>
                                                            <td><?= ($dataset5_value[$i]->value) ?></td>
                                                            <td><?= ($dataset6_value[$i]->value) ?></td>
                                                            <td><?= ($dataset7_value[$i]->value) ?></td>

                                                        </tr>
                                                    <?php endfor; ?>
                                                
                                                <?php else: ?>
                                                    <?php if ($dataset3_value): ?>
                                                        

                                                            <?php for ($i=0;$i < $count;$i++): ?>
                                                                <tr>
                                                                    <td><?= ($i+1) ?></td>
                                                                    <td><?= ($dataset0_value[$i]->label) ?></td>
                                                                    <td><?= ($dataset1_value[$i]->value) ?></td>
                                                                    <td><?= ($dataset2_value[$i]->value) ?></td>
                                                                    <td><?= ($dataset3_value[$i]->value) ?></td>
                                                                </tr>
                                                            <?php endfor; ?>
                                                        
                                                        <?php else: ?>

                                                            <?php for ($i=0;$i < $count;$i++): ?>
                                                                <tr>
                                                                    <td><?= ($i+1) ?></td>
                                                                    <td><?= ($dataset0_value[$i]->label) ?></td>
                                                                    <td><?= ($dataset1_value[$i]->value) ?></td>
                                                                    <td><?= ($dataset2_value[$i]->value) ?></td>
                                                                </tr>
                                                            <?php endfor; ?>
                                                        
                                                    <?php endif; ?>

                                                
                                            <?php endif; ?>
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
        <div class="col-4 text-right home-page proj-div mt-2">
            <!-- <div class="dropdown">
                <button class="btn btn-secondary export-btn pl-4 pr-4  " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-file-medical pl-2"></i>تصدير
                </button>
                <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">
                    <a id="btn_txt" class="dropdown-item export-item proj-item" ><i class="fas fa-file-export"></i>TXT</a>
                    <a onclick="createPDF()" class="dropdown-item export-item proj-item" ><i class="fas fa-file-export"></i>PDF</a>
                    <a id="btn_csv" class="dropdown-item export-item proj-item" ><i class="fas fa-file-export"></i>CSV</a>
                    <a id="btn_json" class="dropdown-item export-item proj-item" ><i class="fas fa-file-export"></i>jSON</a>
                </div>
            </div> -->
        </div>
<!--        <div class="col-4 text-right home-page proj-div">-->
<!--            <button class="btn btn-info"><i class="fas fa-search"></i> اختار مقاول</button>-->
<!--        </div>-->
    </div>
</div>
<div class="home-page bg-white home-page-2">

    <div class="page-content bg-white">

        <div class="container-fluid" >

            <div class="tab-content" >
                <div class="tab-pane fade show active"  role="tabpanel" aria-labelledby="pills-0-tab">
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
    <section id="fixed-form-container">
        <div id="btn-print"  class="button"><i class="fas fa-plus"></i> تصدير </div>
        <div class="body">
            <div class="form-group">
                <a id="btn_csv"  > Excel  </a>
                <input type="button" value=" PDF" id="btPrint" onclick="createPDF()" />
            </div>
        </div>
    </section>
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
    //fix the black color problem on Safari browser for fusion chart by send type
    window.onload  =function() {
                chartInstance.chartType("mscolumn3d");
            }
    // Render
    chartInstance.render();
</script>
<?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>
    <script src="<?= ($BASE) ?>/ui/js/app_proj.js"></script>

</div>
</body>
</html>

