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
                    <?php if ($contractor): ?>
                             <h3>  المقاول : <?= ($contractor) ?></h3>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="hr"></div>
            </div>
            <div class="col-12 intro mb-4">
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
    <div class="container-fluid bg-white"  id="printTable">
        <div class="row">
            <div class="col-lg-12 home-page proj-div" >
                <div class="col-12 divheader">
                    <div class='col-12'>
                        <div class='col-4 float-left text-center'><img src='<?= ($BASE) ?>/ui/images/logo.png' /></div>
                        <div class='col-4 float-left text-center'><p style='font-size: 18px;font-weight: bold;margin-top: 30px'>وكالة الوازارة للمشاريع و الصيانة</p></div>
                        <div class='col-4 float-left text-center'><img src='<?= ($BASE) ?>/ui/images/analytics.png' /></div>
                    </div>
                </div>
                <div id="table_div"  class="table-scroll" >
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
                                            <table  id="myTable" class="table tablesorter table-striped text-right table-scroll">
                                                <thead>
                                                <tr>
                                                    <th>م </th>
                                                    <th><?= ($dataset0_Name) ?> </th>
                                                    <th><?= ($dataset1_Name) ?> </th>
                                                    <th><?= ($dataset2_Name) ?> </th>
                                                    <th><?= ($dataset3_Name) ?> </th>
                                                    <th><?= ($dataset4_Name) ?> </th>
                                                    <th><?= ($dataset5_Name) ?> </th>
                                                    <th><?= ($dataset6_Name) ?> </th>
                                                    <th><?= ($dataset7_Name) ?> </th>
                                                    <th><?= ($dataset8_Name) ?> </th>
                                                    <th><?= ($dataset9_Name) ?> </th>
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
                                                        <td><?= ($dataset6_value[$i]->value) ?></td>
                                                        <td><?= ($dataset7_value[$i]->value) ?></td>
                                                        <td><?= ($dataset8_value[$i]->value) ?></td>
                                                        <td><?= ($dataset9_value[$i]->value) ?></td>

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
            <div class="col-12 text-right home-page proj-div d-flex mt-2">
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
                <?php if ($id==38): ?>
                    
                        <button data-toggle="modal" data-target="#proj38Modal" class="btn btn-info mr-2 btn-contractor"><i class="fas fa-search"></i> اختار مقاول</button>
                    
                    <?php else: ?>
                        <button data-toggle="modal" data-target="#proj37Modal" class="btn btn-info mr-2 btn-contractor"><i class="fas fa-search"></i> اختار مقاول</button>
                    
                <?php endif; ?>
            </div>
        </div>
    </div>

<div  class="home-page bg-white home-page-2">

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
<div class="modal fade" id="projModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form method="post" action="/projections/details/37">
                <div class="modal-body text-right">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <select class="  js-example-basic-single "  name="contractor_id">
                                    <?php foreach (($contractors?:[]) as $ikey=>$contractor): ?>
                                        <option value="<?= ($contractor['cont_id']) ?>"><?= ($contractor['cont_name']) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer text-left">
                    <a  class="btn btn-primary p-2 m-2"  type="submit">عرض</a>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    // Create an Instance with chart options
    var chartInstance = new FusionCharts({
        type: "msbar3d",
        renderAt: "chart-container",
        width: '100%', // Width of the chart
        height: '675', // Height of the chart
        dataFormat: 'jsonurl',
        //dataSource: '../../ind_1.json'
        dataSource: '../../r_json/proj_<?= (trim($proj_id)) ?>.json'
    });
    //fix the black color problem on Safari browser for fusion chart by send type
    window.onload  =function() {
                chartInstance.chartType("msbar3d");
            }
    // Render
    chartInstance.render();
</script>
<?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>
    <script src="<?= ($BASE) ?>/ui/js/app_proj.js"></script>
</div>
</body>
</html>
