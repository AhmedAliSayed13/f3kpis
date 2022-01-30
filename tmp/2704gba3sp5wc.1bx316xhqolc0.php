<!DOCTYPE html>
<html lang="ar" dir="rtl">
  <head>
    <?php echo $this->render('/layouts/header.html',NULL,get_defined_vars(),0); ?>
     <link rel="stylesheet" href="<?= ($BASE) ?>/ui/css/nour_style.css"/>

   </head>
   <body>
   <?php echo $this->render('/layouts/nav.html',NULL,get_defined_vars(),0); ?>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
       <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>



    <div class="page-5">

      <div class="page-content pb-2">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-12 text-right">
              <h3 class="page-title">نماذج البحث و الأسترجاع </h3>
              <div class="under-line"></div>
            </div>
          </div>
        </div>
        <div class="container-fluid">
          <ul class="nav nav-pills" id="pills-tab" role="tablist">
            <li class="nav-item"><a class="nav-link active" id="pills-0-tab" data-toggle="pill" href="#pills-0" role="tab" aria-controls="pills-0" aria-selected="aria-selected">نماذج المناطق</a></li>
            <li class="nav-item"><a class="nav-link" id="pills-1-tab" data-toggle="pill" href="#pills-1" role="tab" aria-controls="pills-1">نماذج المقاوليين</a></li>
            <li class="nav-item"><a class="nav-link" id="pills-2-tab" data-toggle="pill" href="#pills-2" role="tab" aria-controls="pills-2">نماذج الأدارات التعليمية</a></li>
          </ul>

<!-- ///  نماذج المناطق // -->

          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-0" role="tabpanel" aria-labelledby="pills-0-tab">
              <div class="container-fluid">
                <div class="row">
<!-- /////// المشاريع ///// -->
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h3>  المشاريع  </h3>
                        <button class="toggle-body-button"><i class="fas fa-minus"></i></button>
                      </div>
                      <div class="card-body d-block">
                        <ul class="list-unstyled">
                          <?php for ($i=0;$i < count($reports);$i++): ?>
                            <?php if (trim($reports[$i]['rep_cat'])  == 4): ?>

                              <li><a class=" btn-primary text-white  " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white   btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>


                            <?php endif; ?>
                          <?php endfor; ?>
                         </ul>
                      </div>
                      <div id="theModal" class="modal fade text-center">
                         <div class="modal-dialog">
                           <div class="modal-content">
                           </div>
                         </div>
                       </div>


                    </div>
                  </div>

<!-- // المشاريع تحت التنفيذ -->

<div class="col-lg-4 col-md-6 col-sm-12">
  <div class="card">
    <div class="card-header">
      <h3>   المشاريع تحت التنفيذ   </h3>
      <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
    </div>
    <div class="card-body ">
      <ul class="list-unstyled">
        <?php for ($i=0;$i < count($reports);$i++): ?>


          <?php if (trim($reports[$i]['rep_cat'])  == 20): ?>

            <li><a class=" btn-primary text-white  " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white   btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>
         <?php endif; ?>

        <?php endfor; ?>
       </ul>
    </div>
    <div id="theModal" class="modal fade text-center">
       <div class="modal-dialog">
         <div class="modal-content">
         </div>
       </div>
     </div>


  </div>
</div>


<!-- /////// مستوى الانجاز الفعلي ///// -->
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h3>  مستوى الانجاز الفعلي  </h3>
                        <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                      </div>
                      <div class="card-body ">
                        <ul class="list-unstyled">
                          <?php for ($i=0;$i < count($reports);$i++): ?>


                            <?php if (trim($reports[$i]['rep_cat'])  == 5): ?>

                              <li><a class=" btn-primary text-white  " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white   btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>
                           <?php endif; ?>

                          <?php endfor; ?>
                         </ul>
                      </div>
                      <div id="theModal" class="modal fade text-center">
                         <div class="modal-dialog">
                           <div class="modal-content">
                           </div>
                         </div>
                       </div>


                    </div>
                  </div>


  <!-- /////// مدة المشاريع ///// -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="card">
                        <div class="card-header">
                          <h3>  مدة المشاريع  </h3>
                          <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="card-body ">
                          <ul class="list-unstyled">
                            <?php for ($i=0;$i < count($reports);$i++): ?>
                              <?php if (trim($reports[$i]['rep_cat'])  == 6): ?>

                                <li><a class=" btn-primary text-white  " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white   btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>

                              <?php endif; ?>
                            <?php endfor; ?>
                           </ul>
                        </div>
                        <div id="theModal" class="modal fade text-center">
                           <div class="modal-dialog">
                             <div class="modal-content">
                             </div>
                           </div>
                         </div>


                      </div>
                    </div>


  <!-- /////// المقاولين  ///// -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="card">
                        <div class="card-header">
                          <h3> المقاولين  </h3>
                          <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="card-body ">
                          <ul class="list-unstyled">
                            <?php for ($i=0;$i < count($reports);$i++): ?>
                              <?php if (trim($reports[$i]['rep_cat'])  == 7): ?>

                                <li><a class=" btn-primary text-white  " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white   btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>

                              <?php endif; ?>
                            <?php endfor; ?>
                           </ul>
                        </div>
                        <div id="theModal" class="modal fade text-center">
                           <div class="modal-dialog">
                             <div class="modal-content">
                             </div>
                           </div>
                         </div>

                      </div>
                    </div>

<!-- ///////التكاليف ///// -->
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h3>التكاليف  </h3>
                        <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                      </div>
                      <div class="card-body ">
                        <ul class="list-unstyled">
                          <?php for ($i=0;$i < count($reports);$i++): ?>
                            <?php if (trim($reports[$i]['rep_cat'])  == 8): ?>

                              <li><a class=" btn-primary text-white  " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white   btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>

                            <?php endif; ?>
                          <?php endfor; ?>
                         </ul>
                      </div>
                      <div id="theModal" class="modal fade text-center">
                         <div class="modal-dialog">
                           <div class="modal-content">
                           </div>
                         </div>
                       </div>
                    </div>
                  </div>

<!-- ///////الانذارات ///// -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                  <div class="card">
                    <div class="card-header">
                      <h3>الانذارات  </h3>
                      <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                    </div>
                    <div class="card-body ">
                      <ul class="list-unstyled">
                        <?php for ($i=0;$i < count($reports);$i++): ?>
                          <?php if (trim($reports[$i]['rep_cat'])  == 9): ?>

                            <li><a class=" btn-primary text-white  " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white   btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>

                          <?php endif; ?>
                        <?php endfor; ?>
                       </ul>
                    </div>
                    <div id="theModal" class="modal fade text-center">
                       <div class="modal-dialog">
                         <div class="modal-content">
                         </div>
                       </div>
                     </div>


                  </div>
                </div>



<!-- ///////////////////// -->
                </div>
              </div>
            </div>
 <!-- نماذج المقاوليين -->

            <div class="tab-pane fade" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
              <div class="container-fluid">
                <div class="row">
              <!-- /////// المشاريع ///// -->
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h3>  المشاريع  </h3>
                        <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                      </div>
                      <div class="card-body d-block">
                        <ul class="list-unstyled">
                          <?php for ($i=0;$i < count($reports);$i++): ?>
                            <?php if (trim($reports[$i]['rep_cat'])  == 10): ?>

                              <li><a class=" btn-primary text-white  " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white   btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>

                            <?php endif; ?>
                          <?php endfor; ?>
                         </ul>
                      </div>
                      <div id="theModal1" class="modal fade text-center">
                         <div class="modal-dialog">
                           <div class="modal-content">
                           </div>
                         </div>
                       </div>


                    </div>
                  </div>


              <!-- /////// مستوى الانجاز الفعلي ///// -->
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h3>  مستوى الانجاز الفعلي  </h3>
                        <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                      </div>
                      <div class="card-body ">
                        <ul class="list-unstyled">
                          <?php for ($i=0;$i < count($reports);$i++): ?>


                            <?php if (trim($reports[$i]['rep_cat'])  == 11): ?>

                              <li><a class=" btn-primary text-white  " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white   btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>
                           <?php endif; ?>

                          <?php endfor; ?>
                         </ul>
                      </div>
                      <div id="theModal1" class="modal fade text-center">
                         <div class="modal-dialog">
                           <div class="modal-content">
                           </div>
                         </div>
                       </div>


                    </div>
                  </div>


              <!-- /////// التكاليف المشاريع ///// -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="card">
                        <div class="card-header">
                          <h3> التكاليف </h3>
                          <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="card-body ">
                          <ul class="list-unstyled">
                            <?php for ($i=0;$i < count($reports);$i++): ?>
                              <?php if (trim($reports[$i]['rep_cat'])  == 12): ?>

                                <li><a class=" btn-primary text-white  "    href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white   btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p style="font: normal normal 600 14px/22px Cairo !important;"> <?= ($reports[$i]["rep_title"]) ?> </p>

                              <?php endif; ?>
                            <?php endfor; ?>
                           </ul>
                        </div>
                        <div id="theModal1" class="modal fade text-center">
                           <div class="modal-dialog">
                             <div class="modal-content">
                             </div>
                           </div>
                         </div>


                      </div>
                    </div>


              <!-- /////// الانذارات  ///// -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="card">
                        <div class="card-header">
                          <h3> الانذارات  </h3>
                          <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="card-body ">
                          <ul class="list-unstyled">
                            <?php for ($i=0;$i < count($reports);$i++): ?>
                              <?php if (trim($reports[$i]['rep_cat'])  == 13): ?>

                                <li><a class=" btn-primary text-white  " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white   btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>

                              <?php endif; ?>
                            <?php endfor; ?>
                           </ul>
                        </div>

                        <div id="theModal1" class="modal fade text-center">
                           <div class="modal-dialog">
                             <div class="modal-content">
                             </div>
                           </div>
                         </div>
                      </div>
                    </div>


              <!-- ///////////////////// -->
                </div>
              </div>

          </div>

          <!-- //////////////////////////// -->
            <div class="tab-pane fade" id="pills-2" role="tabpanel" aria-labelledby="pills-2-tab">
              <div class="container-fluid">
                <div class="row">
              <!-- /////// المشاريع ///// -->
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h3>  المشاريع  </h3>
                        <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                      </div>
                      <div class="card-body d-block">
                        <ul class="list-unstyled">
                          <?php for ($i=0;$i < count($reports);$i++): ?>
                            <?php if (trim($reports[$i]['rep_cat'])  == 14): ?>

                              <li><a class=" btn-primary text-white " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white   btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>

                            <?php endif; ?>
                          <?php endfor; ?>
                         </ul>
                      </div>
                      <div id="theModal2" class="modal fade text-center">
                         <div class="modal-dialog">
                           <div class="modal-content">
                           </div>
                         </div>
                       </div>


                    </div>
                  </div>


                  <!-- // المشاريع تحت التنفيذ -->

                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h3>   المشاريع تحت التنفيذ   </h3>
                        <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                      </div>
                      <div class="card-body ">
                        <ul class="list-unstyled">
                          <?php for ($i=0;$i < count($reports);$i++): ?>


                            <?php if (trim($reports[$i]['rep_cat'])  == 21): ?>

                              <li><a class=" btn-primary text-white " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white  btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>
                           <?php endif; ?>

                          <?php endfor; ?>
                         </ul>
                      </div>
                      <div id="theModal" class="modal fade text-center">
                         <div class="modal-dialog">
                           <div class="modal-content">
                           </div>
                         </div>
                       </div>


                    </div>
                  </div>


              <!-- /////// مستوى الانجاز الفعلي ///// -->
                  <div class="col-lg-4 col-md-6 col-sm-12">
                    <div class="card">
                      <div class="card-header">
                        <h3>  مستوى الانجاز الفعلي  </h3>
                        <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                      </div>
                      <div class="card-body ">
                        <ul class="list-unstyled">
                          <?php for ($i=0;$i < count($reports);$i++): ?>


                            <?php if (trim($reports[$i]['rep_cat'])  == 15): ?>

                              <li><a class=" btn-primary text-white " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white  btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>
                           <?php endif; ?>

                          <?php endfor; ?>
                         </ul>
                      </div>
                      <div id="theModal2" class="modal fade text-center">
                         <div class="modal-dialog">
                           <div class="modal-content">
                           </div>
                         </div>
                       </div>


                    </div>
                  </div>


              <!-- /////// مدة المشاريع ///// -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="card">
                        <div class="card-header">
                          <h3>  مدة المشاريع  </h3>
                          <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="card-body ">
                          <ul class="list-unstyled">
                            <?php for ($i=0;$i < count($reports);$i++): ?>
                              <?php if (trim($reports[$i]['rep_cat'])  == 19): ?>

                                <li><a class=" btn-primary text-white " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>

                              <?php endif; ?>
                            <?php endfor; ?>
                           </ul>
                        </div>

                        <div id="theModal2" class="modal fade text-center">
                           <div class="modal-dialog">
                             <div class="modal-content">
                             </div>
                           </div>
                         </div>

                      </div>
                    </div>


              <!-- /////// المقاولين  ///// -->
                    <div class="col-lg-4 col-md-6 col-sm-12">
                      <div class="card">
                        <div class="card-header">
                          <h3> المقاولين  </h3>
                          <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                        </div>
                        <div class="card-body ">
                          <ul class="list-unstyled">
                            <?php for ($i=0;$i < count($reports);$i++): ?>
                              <?php if (trim($reports[$i]['rep_cat'])  == 16): ?>

                                <li><a class=" btn-primary text-white" href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>

                              <?php endif; ?>
                            <?php endfor; ?>
                           </ul>
                        </div>

                        <div id="theModal2" class="modal fade text-center">
                           <div class="modal-dialog">
                             <div class="modal-content">
                             </div>
                           </div>
                         </div>

                      </div>
                    </div>


                    <!-- ///////التكاليف ///// -->
                                      <div class="col-lg-4 col-md-6 col-sm-12">
                                        <div class="card">
                                          <div class="card-header">
                                            <h3>التكاليف  </h3>
                                            <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                                          </div>
                                          <div class="card-body ">
                                            <ul class="list-unstyled">
                                              <?php for ($i=0;$i < count($reports);$i++): ?>
                                                <?php if (trim($reports[$i]['rep_cat'])  == 17): ?>

                                                  <li><a class=" btn-primary text-white " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>

                                                <?php endif; ?>
                                              <?php endfor; ?>
                                             </ul>
                                          </div>
                                          <div id="theModal" class="modal fade text-center">
                                             <div class="modal-dialog">
                                               <div class="modal-content">
                                               </div>
                                             </div>
                                           </div>
                                        </div>
                                      </div>

                    <!-- ///////الانذارات ///// -->
                                    <div class="col-lg-4 col-md-6 col-sm-12">
                                      <div class="card">
                                        <div class="card-header">
                                          <h3>الانذارات  </h3>
                                          <button class="toggle-body-button"><i class="fas fa-plus"></i></button>
                                        </div>
                                        <div class="card-body ">
                                          <ul class="list-unstyled">
                                            <?php for ($i=0;$i < count($reports);$i++): ?>
                                              <?php if (trim($reports[$i]['rep_cat'])  == 18): ?>

                                                <li><a class=" btn-primary text-white " href="/report/table2/<?= ($reports[$i]["rep_id"]) ?>" title=" عرض كامل الفترة "><i class="fas fa-eye"></i></a> <a   href="/report/modal/<?= ($reports[$i]["rep_id"]) ?>" class='li-modal text-white  btn-info' title="تحديد فترة "><i class="fa fa-calendar" aria-hidden="true"></i></a></a>  <p> <?= ($reports[$i]["rep_title"]) ?> </p>

                                              <?php endif; ?>
                                            <?php endfor; ?>
                                           </ul>
                                        </div>
                                        <div id="theModal" class="modal fade text-center">
                                           <div class="modal-dialog">
                                             <div class="modal-content">
                                             </div>
                                           </div>
                                         </div>


                                      </div>
                                    </div>
              <!-- ///////////////////// -->
                </div>
              </div>


            </div>

<!-- ///////////////////////////////////// -->


          </div>
        </div>
      </div>
    </div>


      <script>
      $('.li-modal').on('click', function(e){
        e.preventDefault();
        $('#theModal').modal('show').find('.modal-content').load($(this).attr('href'));
      });

      $('.li-modal').on('click', function(e){
        e.preventDefault();
        $('#theModal1').modal('show').find('.modal-content').load($(this).attr('href'));
      });

      $('.li-modal').on('click', function(e){
        e.preventDefault();
        $('#theModal2').modal('show').find('.modal-content').load($(this).attr('href'));
      });


    </script>

        <script src="<?= ($BASE) ?>/ui/js/app.js"></script>

   <?php echo $this->render('/layouts/footer.html',NULL,get_defined_vars(),0); ?>

  </body>

</html>
