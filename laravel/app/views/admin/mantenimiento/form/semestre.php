<!-- /.modal -->
<div class="modal fade" id="semestreModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header logo">
        <button class="btn btn-sm btn-default pull-right" data-dismiss="modal">
            <i class="fa fa-close"></i>
        </button>
        <h4 class="modal-title">New message</h4>
      </div>
        <form id="form_semestres" name="form_semestres" action="" method="post" data-toggle="validator" role="form">
      <div class="modal-body">
          <div class="form-group">
            <label for="txt_nombre" class="control-label">Nombre
                <a id="error_nombre" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese Nombre">
                    <i class="fa fa-exclamation"></i>
                </a>
            </label>
            <input type="text" pattern="[0-9]{1,4}-([A-Za-z]{1,2})" class="form-control" placeholder="AAAA-I" name="txt_nombre" id="txt_nombre" required="required">
          </div>
          <div class="form-group">
            <label class="control-label">Estado:
            </label>
            <select class="form-control" name="slct_estado" id="slct_estado">
                <option value='0'>Inactivo</option>
                <option value='1' selected>Activo</option>
            </select>
          </div>
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
        </form>
    </div>
  </div>
</div>
<!-- /.modal -->
