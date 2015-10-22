<!-- /.modal -->
<div class="modal fade" id="problemaModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header logo">
        <button class="btn btn-sm btn-default pull-right" data-dismiss="modal">
            <i class="fa fa-close"></i>
        </button>
        <h4 class="modal-title">New message</h4>
      </div>
      <div class="modal-body">
        <form id="form_problemas" name="form_problemas" action="" method="post">
            <div class="row form-group">

              <div class="col-sm-12">
                <div class="col-sm-4">
                  <label class="control-label">RESPONSABLE
                  </label>
                  <h4><?php echo strtoupper( Session::get('persona') ); ?></h4>
                </div>
                <div class="col-sm-4">
                  <label class="control-label">SEDE
                  </label>
                  <h4 id="l_sede"></h4>
                </div>
                <div class="col-sm-4">
                  <label class="control-label">TIPO DE PROBLEMA:
                  </label>
                  <h4 id="l_tipo_problema"></h4>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-12">
                  <label class="control-label">DESCRIPCIÓN DEL PROBLEMA: 
                  </label>
                  <h4 id="l_descripcion"></h4>
                </div>
              </div>
              <div class="col-sm-12">
                <div class="col-sm-8">
                  <label class="control-label">DESCRIPCIÓN DE LA SOLUCIÓN: 
                      <a id="error_resultado" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese descripcion de solucion">
                          <i class="fa fa-exclamation"></i>
                      </a>
                  </label>
                  <textarea id="resultado" name="resultado" class="form-control" rows="2" required placeholder="Ingrese descripcion de solucion"></textarea>
                </div>
                <div class="col-sm-4">
                  <label class="control-label">FECHA SOLUCION:
                      <a id="error_fecha_estado" style="display:none" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="bottom" title="Ingrese descripcion de solucion">
                          <i class="fa fa-exclamation"></i>
                      </a>
                  </label>
                  <input type="text" class="form-control" placeholder="AAAA-MM-DD HH:mm" name="fecha_estado" id="fecha_estado" onfocus="blur()">
                </div>
              </div>
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
<!-- /.modal -->
