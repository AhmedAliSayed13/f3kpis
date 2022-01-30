

<a  class="vanillatop"></a>

<div class="modal fade" id="proj27Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
   <div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    <h5 class="modal-title">اختار المقاول لعرض بياناته </h5>
   </div>

   <form method="post" action="/projections/details/42">
    <div class="modal-body text-right">
     <div class="row">
      <div class="col-12">
       <div class="form-group">
        <select class="   js-example-basic-single "  name="contractor_id" required>
         <?php foreach (($contractors?:[]) as $ikey=>$contractor): ?>
          <option value="<?= ($contractor['cont_id']) ?>"><?= ($contractor['cont_name']) ?></option>
         <?php endforeach; ?>
        </select>
       </div>
      </div>
     </div>
    </div>
    <div class="modal-footer text-left">
     <button   class=" btn btn-primary p-2 m-2"  type="submit">عرض</button>
    </div>
   </form>
  </div>
 </div>
</div>
<div class="modal fade" id="proj17Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
   <div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    <h5 class="modal-title">اختار المقاول لعرض بياناته</h5>
   </div>

   <form method="post" action="/projections/details/41">
    <div class="modal-body text-right">
     <div class="row">
      <div class="col-12">
       <div class="form-group">
        <select class="  js-example-basic-single "  name="contractor_id" required>
            <?php foreach (($contractors?:[]) as $ikey=>$contractor): ?>
                  <option value="<?= ($contractor['cont_id']) ?>"><?= ($contractor['cont_name']) ?></option>
            <?php endforeach; ?>
        </select>
       </div>
      </div>
     </div>
    </div>
    <div class="modal-footer text-left">
     <button   class=" btn btn-primary p-2 m-2"  type="submit">عرض</button>
    </div>
   </form>
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
   <form method="post" action="/projections/details/37">
    <div class="modal-body text-right">
     <div class="row">
      <div class="col-12">
       <div class="form-group">
        <select class="  js-example-basic-single "   name="contractor_id" required>
         <?php foreach (($contractors?:[]) as $ikey=>$contractor): ?>
          <option value="<?= ($contractor['cont_id']) ?>"><?= ($contractor['cont_name']) ?></option>
         <?php endforeach; ?>
        </select>
       </div>
      </div>
     </div>
    </div>
    <div class="modal-footer text-left">
     <button   class=" btn btn-primary p-2 m-2"  type="submit">عرض</button>
    </div>
   </form>
  </div>
 </div>
</div>
<div class="modal fade" id="proj38Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
   <div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    <h5 class="modal-title">اختار المقاول لعرض بياناته</h5>
   </div>

   <form method="post" action="/projections/details/39">
    <div class="modal-body text-right">
     <div class="row">
      <div class="col-12">
       <div class="form-group">
        <select class="  js-example-basic-single "  name="contractor_id" required>
         <?php foreach (($contractors?:[]) as $ikey=>$contractor): ?>
          <option value="<?= ($contractor['cont_id']) ?>"><?= ($contractor['cont_name']) ?></option>
         <?php endforeach; ?>
        </select>
       </div>
      </div>
     </div>
    </div>
    <div class="modal-footer text-left">
     <button   class=" btn btn-primary p-2 m-2"  type="submit">عرض</button>
    </div>
   </form>
  </div>
 </div>
</div>
<div class="modal fade" id="proj39Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog modal-dialog-centered">
  <div class="modal-content">
   <div class="modal-header">

    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
     <span aria-hidden="true">&times;</span>
    </button>
    <h5 class="modal-title">اختار المقاول لعرض بياناته</h5>
   </div>

   <form method="post" action="/projections/details/39">
    <div class="modal-body text-right">
     <div class="row">
      <div class="col-12">
       <div class="form-group">
        <select class="  js-example-basic-single " name="contractor_id" required>
         <?php foreach (($contractors?:[]) as $ikey=>$contractor): ?>
          <option value="<?= ($contractor['cont_id']) ?>"><?= ($contractor['cont_name']) ?></option>
         <?php endforeach; ?>
        </select>
       </div>
      </div>
     </div>
    </div>
    <div class="modal-footer text-left">
     <button   class=" btn btn-primary p-2 m-2"  type="submit">عرض</button>
    </div>
   </form>
  </div>
 </div>
</div>

<script src="<?= ($BASE) ?>/ui/js/popper.min.js"></script>
<script src="<?= ($BASE) ?>/ui/js/bootstrap.min.js"></script>
<script src="<?= ($BASE) ?>/ui/js/owl.carousel.min.js"></script>
<script src="<?= ($BASE) ?>/ui/js/jquery.multi-select.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
<script type="text/javascript" src="<?= ($BASE) ?>/ui/js/jquery.tablesorter.js"></script>
<script type="text/javascript" src="<?= ($BASE) ?>/ui/js/jquery.tablesorter.widgets.min.js"></script>
<script src="<?= ($BASE) ?>/ui/js/vanillatop.min.js"></script>
<script src="<?= ($BASE) ?>/ui/js/ahmed-script.js"></script>
<script src="<?= ($BASE) ?>/ui/js/printThis.js"></script>
<script src="<?= ($BASE) ?>/ui/js/bootstrap.bundle.min.js"></script>
<script src="<?= ($BASE) ?>/ui/js/tableHTMLExport.js"></script>



<script type="text/javascript">

 $('#kpis_kpis_check_all').change(function () {
  $('#kpis_kpis').multiSelect('select_all');
 });
 $('#kpis_kpis_uncheck_all').change(function () {
  $('#kpis_kpis').multiSelect('deselect_all');
 });
 $('#projections_prjs_check_all').change(function () {
  $('#projections_prjs').multiSelect('select_all');
 });
 $('#projections_prjs_uncheck_all').change(function () {
  $('#projections_prjs').multiSelect('deselect_all');
 });
 $('#reports_ids_check_all').change(function () {
  $('#reports_reps').multiSelect('select_all');
 });
 $('#reports_ids_uncheck_all').change(function () {
  $('#reports_reps').multiSelect('deselect_all');
 });
</script>
