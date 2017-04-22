<!DOCTYPE html>
@extends('layouts.master')

@section('includes')
    @parent
    {{ HTML::style('lib/daterangepicker/css/daterangepicker-bs3.css') }}
    {{ HTML::style('lib/bootstrap-multiselect/dist/css/bootstrap-multiselect.css') }}
    {{ HTML::script('//cdn.jsdelivr.net/momentjs/2.9.0/moment.min.js') }}
    {{ HTML::script('http://ajax.aspnetcdn.com/ajax/jquery.validate/1.8/jquery.validate.min.js') }}
    {{ HTML::script('lib/daterangepicker/js/daterangepicker_single.js') }}
    {{ HTML::script('lib/bootstrap-multiselect/dist/js/bootstrap-multiselect.js') }}

    {{ HTML::script('lib/vue.js') }}

    @include( 'admin.js.slct_global_ajax' )
    @include( 'admin.js.slct_global' )
    @include( 'admin.proceso.js.registrarproblema2_ajax' )
    @include( 'admin.proceso.js.registrarproblema2' )
@stop
<!-- Right side column. Contains the navbar and content of the page -->
@section('contenido')
<style type="text/css">
.table-bordered tr {
    cursor: pointer;
}
.table-bordered .selec {
    background-color: #9CD9DE;
}
/* Estilo por defecto para validacion */
input:required:invalid {  border: 1px solid red;  }  input:required:valid {  border: 1px solid green;  }
</style>
            <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Registrar problemas
                        <small> </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                        <li><a href="#">Proceso</a></li>
                        <li class="active">Registrar problemas</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content" id='app'>
                    <form id="form_problemas" name="form_problemas" action="" method="post">
                        <div class="panel panel-info">
                          <div class="panel-heading">
                            <h3 class="panel-title">Datos del Problema</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <label class="control-label">Responsable</label>
                                    <h4>&nbsp;&nbsp;&nbsp;&nbsp;{{ strtoupper( Session::get('persona') ) }} </h4>
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label">Sede</label>
                                    <select class="form-control" name="slct_sede_id" id="slct_sede_id">
                                    </select>
                                </div>
                                <div class="col-sm-4 grupog grupo-instituto">
                                    <label class="control-label">Institución</label>
                                    <select class="form-control grupo" name="slct_instituto_id" id="slct_instituto_id">
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4">
                                    <label class="control-label">Problema General</label>
                                    <select class="form-control" name="slct_tipo_problema_id" id="slct_tipo_problema_id">
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label">Tipo Problema:</label>
                                    <select class="form-control" name="slct_categoria_tipo_problema_id" id="slct_categoria_tipo_problema_id">
                                    </select>
                                </div>
                                <div class="col-sm-4">
                                    <label class="control-label">Fecha del problema:</label>
                                    <input type="text" class="form-control" name="fecha_problema" placeholder="AAAA-MM-DD HH:mm" id="fecha_problema" onfocus="blur()"/>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <br>
                                    <label class="control-label">Descripcion:</label>
                                    <textarea id="descripcion" name="descripcion" class="form-control" rows="2" required></textarea>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-carrera">
                          <div class="panel-heading">
                            <h3 class="panel-title">Carrera</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-6 grupo-carrera-d grupo-carrera_id">
                                    <label class="control-label">Carrera:</label>
                                    <select class="form-control grupo" name="slct_carrera_id" id="slct_carrera_id">
                                    </select>
                                </div>
                                <div class="col-sm-6 grupo-carrera-d grupo-especialidad_id">
                                    <label class="control-label">Especialidad/Diploma:</label>
                                    <select class="form-control grupo" name="slct_especialidad_id" id="slct_especialidad_id">
                                    </select>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-seminario">
                          <div class="panel-heading">
                            <h3 class="panel-title">Seminario</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-seminario-d grupo-tema">
                                    <label class="control-label">Tema del Seminario:</label>
                                    <input type="text" class="form-control grupo" name="txt_tema_seminario" id="txt_tema_seminario"/>
                                </div>
                                <div class="col-sm-4 grupo-seminario-d grupo-hora">
                                    <label class="control-label">Cantidad Hora del Seminario:</label>
                                    <input type="text" class="form-control grupo" name="txt_hora_seminario" id="txt_hora_seminario"/>
                                </div>
                                <div class="col-sm-4 grupo-seminario-d grupo-fecha">
                                    <label class="control-label">Fecha del Seminario:</label>
                                    <input type="text" class="form-control grupo" name="txt_fecha_seminario" id="txt_fecha_seminario"/>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-ciclosemestre">
                          <div class="panel-heading">
                            <h3 class="panel-title">Ciclo - Semestre</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <label class="control-label">Ciclo:</label>
                                    <select class="form-control grupo" id="slct_cs_ciclo_id">
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    </br>
                                    <button type="button" class="btn btn-success" onclick="AgregarCicloSemestre();">
                                      <i class="fa fa-plus fa-sm"></i>
                                      &nbsp;
                                    </button>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <label><h2>Lista de Ciclo Semestre</h2></label>
                                <ul class="list-group" id="t_ciclosemestre"></ul>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-semestre">
                          <div class="panel-heading">
                            <h3 class="panel-title">Semestre</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <label class="control-label">Semestre Inicio:</label>
                                    <select name="slct_semestre_ini_id" id="slct_semestre_ini_id" class="form-control grupo">
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Semestre Final:</label>
                                    <select name="slct_semestre_fin_id" id="slct_semestre_fin_id" class="form-control grupo">
                                    </select>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-semestre2">
                          <div class="panel-heading">
                            <h3 class="panel-title">Semestre</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-6 grupo-semestre2-d grupo-semreserva">
                                    <label class="control-label">Semestre que va Reservar:</label>
                                    <select name="slct_semestre_reserva_id" id="slct_semestre_reserva_id" class="form-control grupo">
                                    </select>
                                </div>
                                <div class="col-sm-6 grupo-semestre2-d grupo-semreincorporarse">
                                    <label class="control-label">Semestre que va Reincorporarse:</label>
                                    <select name="slct_semestre_reincorporarse_id" id="slct_semestre_reincorporarse_id" class="form-control grupo">
                                    </select>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-articulo">
                          <div class="panel-heading">
                            <h3 class="panel-title">Artículos</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-5">
                                    <label class="control-label">Tipo Artículo</label>
                                    <select class="form-control grupo" id="slct_tipo_articulo">
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <label class="control-label">Artículo</label>
                                    <select class="form-control grupo" id="slct_articulo_id">
                                    </select>
                                </div>
                                <div class="col-sm-2">
                                    </br>
                                    <button type="button" class="btn btn-success" onclick="AgregarArticulo();">
                                      <i class="fa fa-plus fa-sm"></i>
                                      &nbsp;
                                    </button>
                                </div>
                            </div>
                            <fieldset>
                                <legend>Lista de Artículos</legend>
                                <ul class="list-group" id="t_articulos"></ul>
                            </fieldset>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-adicional">
                          <div class="panel-heading">
                            <h3 class="panel-title">Datos requeridos</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-3 grupo-adicional-d grupo-ad_cambiando">
                                    <label class="control-label">Cambiando:</label>
                                    <input type="number" name="txt_ad_cambiando" id="txt_ad_cambiando" class="form-control grupo">
                                </div>
                                <div class="col-sm-3 grupo-adicional-d grupo-ad_nota">
                                    <label class="control-label">Nota Alumno:</label>
                                    <input type="number" name="txt_ad_nota" id="txt_ad_nota" class="form-control grupo">
                                </div>
                                <div class="col-sm-3 grupo-adicional-d grupo-diafalto">
                                    <label class="control-label">Días que falto:</label>
                                    <input type="number" class="form-control grupo" name="txt_diafalto" id="txt_diafalto">
                                </div>
                                <div class="col-sm-3 grupo-adicional-d grupo-ciclo_id">
                                    <label class="control-label">Ciclo:</label>
                                    <select class="form-control grupo" name="slct_ciclo_id" id="slct_ciclo_id">
                                    </select>
                                </div>
                                <div class="col-sm-3 grupo-adicional-d grupo-ciclo_ids">
                                    <label class="control-label">Ciclo(s):</label>
                                    <select class="form-control grupo" name="slct_ciclo_ids[]" id="slct_ciclo_ids" multiple>
                                    </select>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-alumno">
                          <div class="panel-heading">
                            <h3 class="panel-title">Alumnos
                                <small>
                                    <a class='btn btn-default btn-sm' id="eventAlumno" role="button" data-toggle="collapse" href="#collapseAlumno" aria-expanded="false" aria-controls="collapseAlumno">
                                    <i class="fa fa-caret-square-o-up"> Ocultar Alumnos </i></a>
                                    <input type='hidden' class="grupo" value='' id='alumno_id' name='alumno_id'>
                                </small>
                            </h3>
                          </div>
                          <div class="panel-body">
                            <div class="row form-group collapse" id="collapseAlumno">
                                <div class="col-sm-12">
                                    <a class='btn btn-primary btn-sm' data-toggle="modal" data-target="#alumnoModal" data-titulo="Nuevo">
                                    <i class="fa fa-plus fa-lg"></i>&nbsp;Nuevo</a>
                                </div>
                                <div class="col-sm-12">
                                    <!-- Inicia contenido -->
                                    <div class="box">
                                        <div class="box-body table-responsive">
                                            <table id="t_alumnos" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Apellido P</th>
                                                        <th>Apellido M</th>
                                                        <th>Nombres</th>
                                                        <th>Sexo</th>
                                                        <th>Email</th>
                                                        <th>Telefono</th>
                                                        <th> [ ] </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tb_alumnos"></tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Código</th>
                                                        <th>Apellido P</th>
                                                        <th>Apellido M</th>
                                                        <th>Nombres</th>
                                                        <th>Sexo</th>
                                                        <th>Email</th>
                                                        <th>Telefono</th>
                                                        <th> [ ] </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                    <!-- Finaliza contenido -->
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-persona">
                          <div class="panel-heading">
                            <h3 class="panel-title">Personas
                                <small>
                                    <a class='btn btn-default btn-sm' id="eventPersona" role="button" data-toggle="collapse" href="#collapsePersona" aria-expanded="false" aria-controls="collapsePersona">
                                    <i class="fa fa-caret-square-o-up"> Ocultar Personas </i></a>
                                    <input type='hidden' class="grupo" value='' id='persona_id' name='persona_id'>
                                </small>
                            </h3>
                          </div>
                          <div class="panel-body">
                            <div class="row form-group collapse" id="collapsePersona">
                                <div class="col-sm-12">
                                    <a class='btn btn-primary btn-sm' data-toggle="modal" data-target="#personaModal" data-titulo="Nuevo">
                                    <i class="fa fa-plus fa-lg"></i>&nbsp;Nuevo</a>
                                </div>
                                <div class="col-sm-12">
                                    <!-- Inicia contenido -->
                                    <div class="box">
                                        <div class="box-body table-responsive">
                                            <table id="t_personas" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Apellido P</th>
                                                        <th>Apellido M</th>
                                                        <th>Nombres</th>
                                                        <th>Sexo</th>
                                                        <th>Telefono</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tb_personas"></tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Apellido P</th>
                                                        <th>Apellido M</th>
                                                        <th>Nombres</th>
                                                        <th>Sexo</th>
                                                        <th>Telefono</th>
                                                        <th>Email</th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div><!-- /.box-body -->
                                    </div><!-- /.box -->
                                    <!-- Finaliza contenido -->
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-personal">
                          <div class="panel-heading">
                            <h3 class="panel-title">Datos requeridos</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-3 grupo-personal-d grupo-area_id">
                                    <label class="control-label">Área:</label>
                                    <select class="form-control grupo" name="slct_pe_area_id" id="slct_pe_area_id">
                                    </select>
                                </div>
                                <div class="col-sm-4 grupo-personal-d grupo-jefe">
                                    <label class="control-label">Jefe:</label>
                                    <input type="text" name="txt_pe_jefe" id="txt_pe_jefe" class="form-control grupo">
                                </div>
                                <div class="col-sm-5 grupo-personal-d grupo-motivo">
                                    <label class="control-label">Motivo:</label>
                                    <input type="text" name="txt_pe_motivo" id="txt_pe_motivo" class="form-control grupo">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-6 grupo-personal-d grupo-solicita">
                                    <label class="control-label">Que solicita:</label>
                                    <input type="text" name="txt_pe_solicita" id="txt_pe_solicita" class="form-control grupo">
                                </div>
                                <div class="col-sm-3 grupo-personal-d grupo-fecha">
                                    <label class="control-label">Fecha:</label>
                                    <input type="text" name="txt_pe_fecha" id="txt_pe_fecha" class="form-control grupo fecha">
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-legal">
                          <div class="panel-heading">
                            <h3 class="panel-title">Datos requeridos</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-3 grupo-legal-d grupo-razon">
                                    <label class="control-label">Razón Social y/o Denominación:</label>
                                    <select class="form-control grupo" name="slct_le_razon_id" id="slct_le_razon_id" required>
                                        <option value="">.::Seleccione::.</option>
                                        <option value="1">Telemática</option>
                                        <option value="2">Intur</option>
                                        <option value="3">Telesup E.I.R.L</option>
                                        <option value="4">Universidad</option>
                                    </select>
                                </div>
                                <div class="col-sm-9 grupo-legal-d grupo-obs">
                                    <label class="control-label">Observaciones:</label>
                                    <textarea rows="2" required name="txt_le_observacion" id="txt_le_observacion" class="form-control grupo"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-3 grupo-legal-d grupo-licencia">
                                    <label class="control-label">Licencia:</label>
                                    <select class="form-control grupo" name="slct_le_licencia_id" id="slct_le_licencia_id" required>
                                    </select>
                                </div>
                                <div class="col-sm-3 grupo-legal-d grupo-municipal">
                                    <label class="control-label">Municipal:</label>
                                    <select class="form-control grupo" name="slct_le_municipal_id" id="slct_le_municipal_id" required>
                                    </select>
                                </div>
                                <div class="col-sm-3 grupo-legal-d grupo-articulo">
                                    <label class="control-label">Servicio:</label>
                                    <select class="form-control grupo" name="slct_le_articulo_id" id="slct_le_articulo_id" required>
                                    </select>
                                </div>
                                <div class="col-sm-3 grupo-legal-d grupo-fecha">
                                    <label class="control-label">Fecha Notificación:</label>
                                    <input type="text" name="txt_le_fecha" id="txt_le_fecha" class="form-control grupo fecha" required>
                                </div>
                                <div class="col-sm-6 grupo-legal-d grupo-entidad">
                                    <label class="control-label">Nombre Entidad:</label>
                                    <input type="text" name="txt_le_entidad" id="txt_le_entidad" class="form-control grupo" required>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-legal2">
                          <div class="panel-heading">
                            <h3 class="panel-title">Datos requeridos</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-3 grupo-legal2-d grupo-tipo">
                                    <label class="control-label">Tipo Persona:</label>
                                    <select class="form-control grupo" name="slct_le2_tipo_persona" id="slct_le2_tipo_persona" required>
                                        <option value="">.::Seleccione::.</option>
                                        <option value="1">Persona Natural</option>
                                        <option value="2">Persona Jurídica</option>
                                    </select>
                                </div>
                                <div class="col-sm-9 grupo-legal2-d grupo-obs">
                                    <label class="control-label">Observaciones:</label>
                                    <textarea rows="2" required name="txt_le2_observacion" id="txt_le2_observacion" class="form-control grupo"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-legal2-d grupo-arrendador">
                                    <label class="control-label">Datos del Arrendedor:</label>
                                    <input type="text" name="txt_le2_persona" id="txt_le2_persona" class="form-control grupo fecha" required>
                                </div>
                                <div class="col-sm-4 grupo-legal2-d grupo-dni">
                                    <label class="control-label">DNI del Arrendedor:</label>
                                    <input type="text" name="txt_le2_dni" id="txt_le2_dni" class="form-control grupo fecha" required>
                                </div>
                                <div class="col-sm-4 grupo-legal2-d grupo-direccion">
                                    <label class="control-label">Dirección del Arrendor:</label>
                                    <textarea rows="2" required name="txt_le2_direccion" id="txt_le2_direccion" class="form-control grupo"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-3 grupo-legal2-d grupo-departamento">
                                    <label class="control-label">Departamento:</label>
                                    <input type="text" name="txt_le2_departamento" id="txt_le2_departamento" class="form-control grupo fecha" required>
                                </div>
                                <div class="col-sm-3 grupo-legal2-d grupo-provincia">
                                    <label class="control-label">Provincia:</label>
                                    <input type="text" name="txt_le2_provincia" id="txt_le2_provincia" class="form-control grupo fecha" required>
                                </div>
                                <div class="col-sm-3 grupo-legal2-d grupo-distrito">
                                    <label class="control-label">Distrito:</label>
                                    <input type="text" name="txt_le2_distrito" id="txt_le2_distrito" class="form-control grupo fecha" required>
                                </div>
                                <div class="col-sm-3 grupo-legal2-d grupo-estado">
                                    <label class="control-label">Estado Civil:</label>
                                    <select class="form-control grupo" name="slct_le2_estado_civil" id="slct_le2_estado_civil" onchange="IngresarConyugue(this.value);" required>
                                        <option value="">.::Seleccione::.</option>
                                        <option value="1">Soltero</option>
                                        <option value="2">Casado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-legal2-d grupo-arrendador">
                                    <label class="control-label">Datos del Conyugue:</label>
                                    <input type="text" name="txt_le2_persona_conyugue" id="txt_le2_persona_conyugue" class="form-control grupo readonly">
                                </div>
                                <div class="col-sm-4 grupo-legal2-d grupo-dni">
                                    <label class="control-label">DNI del Conyugue:</label>
                                    <input type="text" name="txt_le2_dni_conyugue" id="txt_le2_dni_conyugue" class="form-control grupo readonly">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-legal2-d grupo-direccion">
                                    <label class="control-label">Dirección del inmueble arrendar:</label>
                                    <textarea rows="2" required name="txt_le2_direccion2" id="txt_le2_direccion2" class="form-control grupo"></textarea>
                                </div>
                                <div class="col-sm-3 grupo-legal2-d grupo-departamento">
                                    <label class="control-label">Duración de contrato:</label>
                                    <input type="text" name="txt_le2_tiempo_contrato" id="txt_le2_tiempo_contrato" class="form-control grupo" required>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-3 grupo-legal2-d grupo-departamento">
                                    <label class="control-label">Departamento:</label>
                                    <input type="text" name="txt_le2_departamento2" id="txt_le2_departamento2" class="form-control grupo" required>
                                </div>
                                <div class="col-sm-3 grupo-legal2-d grupo-provincia">
                                    <label class="control-label">Provincia:</label>
                                    <input type="text" name="txt_le2_provincia2" id="txt_le2_provincia2" class="form-control grupo" required>
                                </div>
                                <div class="col-sm-3 grupo-legal2-d grupo-distrito">
                                    <label class="control-label">Distrito:</label>
                                    <input type="text" name="txt_le2_distrito2" id="txt_le2_distrito2" class="form-control grupo" required>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-contabilidad">
                          <div class="panel-heading">
                            <h3 class="panel-title">Datos requeridos</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-contabilidad-d grupo-proveedor">
                                    <label class="control-label">Proveedor:</label>
                                    <input type="text" required name="txt_co_proveedor" id="txt_co_proveedor" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-contabilidad-d grupo-recibo">
                                    <label class="control-label">Recibo:</label>
                                    <input type="text" required name="txt_co_recibo" id="txt_co_recibo" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-contabilidad-d grupo-fecha">
                                    <label class="control-label">Fecha Notificación:</label>
                                    <input type="text" required name="txt_co_fecha" id="txt_co_fecha" class="form-control grupo">
                                </div>
                                <div class="col-sm-9 grupo-contabilidad-d grupo-obs">
                                    <label class="control-label">Observaciones:</label>
                                    <textarea rows="2" required name="txt_co_observacion" id="txt_co_observacion" class="form-control grupo"></textarea>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-logistica">
                          <div class="panel-heading">
                            <h3 class="panel-title">Datos requeridos</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-logistica-d grupo-arrendador">
                                    <label class="control-label">Arrendador:</label>
                                    <input type="text" required name="txt_log_arrendador" id="txt_log_arrendador" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-moneda">
                                    <label class="control-label">Tipo Moneda:</label>
                                    <select required name="slct_log_moneda" id="slct_log_moneda" class="form-control grupo">
                                        <option value="">.::Seleccione::.</option>
                                        <option value="1">Soles</option>
                                        <option value="2">Dólares</option>
                                    </select>
                                </div>
                                <div class="col-sm-1 grupo-logistica-d grupo-id">
                                    <input type="hidden" value="1" required name="txt_log_id" id="txt_log_id" class="form-control grupo ids">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-logistica-d grupo-empresa">
                                    <label class="control-label">Empresa:</label>
                                    <input type="text" required name="txt_log_empresa" id="txt_log_empresa" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-ruc">
                                    <label class="control-label">RUC:</label>
                                    <input type="number" required name="txt_log_ruc" id="txt_log_ruc" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-telefono">
                                    <label class="control-label">Teléfono:</label>
                                    <input type="number" required name="txt_log_telefono" id="txt_log_telefono" class="form-control grupo">
                                </div>
                                <div class="col-sm-8 grupo-logistica-d grupo-obs">
                                    <label class="control-label">Observaciones:</label>
                                    <textarea rows="2" required name="txt_log_observacion" id="txt_log_observacion" class="form-control grupo"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-logistica-d grupo-direccion">
                                    <label class="control-label">Dirección:</label>
                                    <textarea rows="2" required name="txt_log_direccion" id="txt_log_direccion" class="form-control grupo"></textarea>
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-personal">
                                    <label class="control-label">Personal Contacto:</label>
                                    <input type="text" required name="txt_log_personal" id="txt_log_personal" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-telpersonal">
                                    <label class="control-label">Teléfono Personal Contacto:</label>
                                    <input type="text" required name="txt_log_telpersonal" id="txt_log_telpersonal" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-plazo">
                                    <label class="control-label">Plazo ejecución del Servicio:</label>
                                    <input type="text" required name="txt_log_plazo" id="txt_log_plazo" class="form-control grupo">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-logistica-d grupo-multa">
                                    <label class="control-label">Tipo Multa:</label>
                                    <input type="text" required name="txt_log_multa" id="txt_log_multa" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-impuesto">
                                    <label class="control-label">Tipo Impuesto:</label>
                                    <input type="text" required name="txt_log_impuesto" id="txt_log_impuesto" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-recibo">
                                    <label class="control-label">Nro Recibo:</label>
                                    <input type="text" required name="txt_log_recibo" id="txt_log_recibo" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-suministro">
                                    <label class="control-label">Nro Suministro:</label>
                                    <input type="text" required name="txt_log_suministro" id="txt_log_suministro" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-monto">
                                    <label class="control-label">Monto:</label>
                                    <input type="text" required name="txt_log_monto" id="txt_log_monto" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-comprobante">
                                    <label class="control-label">Tipo Comprobante:</label>
                                    <input type="text" required name="txt_log_comprobante" id="txt_log_comprobante" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-nrocomprobante">
                                    <label class="control-label">Nro Comprobante:</label>
                                    <input type="text" required name="txt_log_nrocomprobante" id="txt_log_nrocomprobante" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-autorizo">
                                    <label class="control-label">Persona que Autorizó:</label>
                                    <input type="text" required name="txt_log_autorizo" id="txt_log_autorizo" class="form-control grupo">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-logistica-d grupo-tipotelefono">
                                    <label class="control-label">Tipo Teléfono:</label>
                                    <select required name="slct_log_tipotelefono" id="slct_log_tipotelefono" class="form-control grupo">
                                        <option value="">.::Seleccione::.</option>
                                        <option value="1">Movil</option>
                                        <option value="2">Fijo</option>
                                    </select>
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-operador">
                                    <label class="control-label">Operador:</label>
                                    <input type="text" required name="txt_log_operador" id="txt_log_operador" class="form-control grupo">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-logistica-d grupo-cantidad">
                                    <label class="control-label">Cantidad:</label>
                                    <input type="number" required name="txt_log_cantidad" id="txt_log_cantidad" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-medida">
                                    <label class="control-label">Unidad de medida:</label>
                                    <input type="text" required name="txt_log_medida" id="txt_log_medida" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-logistica-d grupo-fecha">
                                    <label class="control-label">Fecha Estimada de Entrega:</label>
                                    <input type="text" required name="txt_log_fecha" id="txt_log_fecha" class="form-control grupo">
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-tesoreria">
                          <div class="panel-heading">
                            <h3 class="panel-title">Datos requeridos</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-tesoreria-d grupo-contrato">
                                    <label class="control-label">Quien Contrató?:</label>
                                    <input type="text" required name="txt_te_contrato" id="txt_te_contrato" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-tesoreria-d grupo-gana">
                                    <label class="control-label">Cuanto Gana:</label>
                                    <input type="text" required name="txt_te_gana" id="txt_te_gana" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-tesoreria-d grupo-autorizo">
                                    <label class="control-label">Quien Autorizó?:</label>
                                    <input type="text" required name="txt_te_autorizo" id="txt_te_autorizo" class="form-control grupo">
                                </div>
                                <div class="col-sm-1 grupo-tesoreria-d grupo-id">
                                    <input type="hidden" required name="txt_te_id" id="txt_te_id" class="form-control grupo ids">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-tesoreria-d grupo-mes">
                                    <label class="control-label">Mes que se le debe:</label>
                                    <input type="text" required name="txt_te_mes" id="txt_te_mes" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-tesoreria-d grupo-nrocta">
                                    <label class="control-label">Nro Cuenta:</label>
                                    <input type="text" required name="txt_te_nrocta" id="txt_te_nrocta" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-tesoreria-d grupo-banco">
                                    <label class="control-label">Nombre Banco:</label>
                                    <input type="text" required name="txt_te_banco" id="txt_te_banco" class="form-control grupo">
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-tesoreria2">
                          <div class="panel-heading">
                            <h3 class="panel-title">Datos requeridos</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-tesoreria2-d grupo-para">
                                    <label class="control-label">Para:</label>
                                    <input type="text" required name="txt_te2_para" id="txt_te2_para" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-tesoreria2-d grupo-area">
                                    <label class="control-label">Área:</label>
                                    <input type="text" required name="txt_te2_area" id="txt_te2_area" class="form-control grupo">
                                </div>
                                <div class="col-sm-1 grupo-tesoreria2-d grupo-id">
                                    <input type="hidden" required name="txt_te2_id" id="txt_te2_id" class="form-control grupo ids">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-tesoreria2-d grupo-ode">
                                    <label class="control-label">Ode Solicitante:</label>
                                    <input type="text" required name="txt_te2_ode" id="txt_te2_ode" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-tesoreria2-d grupo-cajero">
                                    <label class="control-label">Nombre del Cajero:</label>
                                    <input type="text" required name="txt_te2_cajero" id="txt_te2_cajero" class="form-control grupo">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-tesoreria2-d grupo-cantidad">
                                    <label class="control-label">Cantidad:</label>
                                    <input type="text" required name="txt_te2_cantidad" id="txt_te2_cantidad" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-tesoreria2-d grupo-empresa">
                                    <label class="control-label">Empresa:</label>
                                    <input type="text" required name="txt_te2_empresa" id="txt_te2_empresa" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-tesoreria2-d grupo-ultboleta">
                                    <label class="control-label">Nro Última boleta de venta:</label>
                                    <input type="text" required name="txt_te2_ultboleta" id="txt_te2_ultboleta" class="form-control grupo">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-4 grupo-tesoreria2-d grupo-enviar">
                                    <label class="control-label">Enviar por:</label>
                                    <input type="text" required name="txt_te2_enviar" id="txt_te2_enviar" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-tesoreria2-d grupo-fecha">
                                    <label class="control-label">Fecha y Hora aproximado de envio:</label>
                                    <input type="text" required name="txt_te2_fecha" id="txt_te2_fecha" class="form-control grupo">
                                </div>
                                <div class="col-sm-4 grupo-tesoreria2-d grupo-adicional">
                                    <label class="control-label">Información Adicional:</label>
                                    <textarea rows="2" required name="txt_te2_adicional" id="txt_te2_adicional" class="form-control grupo"></textarea>
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-carta-presentacion">
                          <div class="panel-heading">
                            <h3 class="panel-title">Datos requeridos</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <label class="control-label">Nombre de Institución donde va realizar las prácticas:</label>
                                    <input type="text" required name="txt_cp_instituto" id="txt_cp_instituto" class="form-control grupo">
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Nombre de la persona a quien va dirigido la carta y su grado de la perosna:</label>
                                    <input type="text" required name="txt_cp_persona" id="txt_cp_persona" class="form-control grupo">
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">El cargo que tiene la persona:</label>
                                    <input type="text" required name="txt_cp_cargo" id="txt_cp_cargo" class="form-control grupo">
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Área donde se va desempeñar:</label>
                                    <input type="text" required name="txt_cp_area" id="txt_cp_area" class="form-control grupo">
                                </div>
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-curso">
                          <div class="panel-heading">
                            <h3 class="panel-title">Curso</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-3">
                                    <label class="control-label">Nro de cursos :</label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" name="nro_cursos" id="nro_cursos" class="form-control grupo">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <!-- Inicia contenido -->
                                <div class="box">
                                    <div class="box-body table-responsive">
                                        <table id="t_cursos" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>N</th>
                                                    <th>Tema(Horas)</th>
                                                    <th>Frecuencia</th>
                                                    <th>Horario</th>
                                                    <th>Profesor</th>
                                                    <th>Fec. Ini</th>
                                                    <th>Fec. Fin</th>
                                                    <th>Nota</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb_cursos"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>N</th>
                                                    <th>Tema(Horas)</th>
                                                    <th>Frecuencia</th>
                                                    <th>Horario</th>
                                                    <th>Profesor</th>
                                                    <th>Fec. Ini</th>
                                                    <th>Fec. Fin</th>
                                                    <th>Nota</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                                <!-- Finaliza contenido -->
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-pago">
                          <div class="panel-heading">
                            <h3 class="panel-title">Pago</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-3">
                                    <label class="control-label">Nro de pagos :</label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="number" name="nro_pagos" id="nro_pagos" class="form-control grupo">
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <!-- Inicia contenido -->
                                <div class="box">
                                    <div class="box-body table-responsive">
                                        <table id="t_pagos" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>N</th>
                                                    <th>Fecha</th>
                                                    <th>N° Recibo</th>
                                                    <th>Monto</th>
                                                    <th>Archivo</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb_pagos"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>N</th>
                                                    <th>Fecha</th>
                                                    <th>N° Recibo</th>
                                                    <th>Monto</th>
                                                    <th>Archivo</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                                <!-- Finaliza contenido -->
                            </div>
                          </div>
                        </div>

                        <div class="panel panel-info grupog grupo-archivo">
                          <div class="panel-heading">
                            <h3 class="panel-title">Archivos
                                <a @click="addArchivos" class="btn btn-succes btn-sm"><i class="fa fa-plus"></i></a>
                            </h3>
                          </div>
                          <div class="panel-body">
                              <table class="table table-hover table-bordered">
                                <thead>
                                <tr>
                                  <th class="col-sm-5" style="text-align:center;">Nombre</th>
                                  <th class="col-sm-5" style="text-align:center;">Subir Archivo</th>
                                  <th class="col-sm-2" style="text-align:center;">[]</th>
                                </tr>
                                </thead>
                                <tbody>
                                  <tr v-for="(item, index) in archivos">
                                    <td>
                                        <input type="text" name="arc_nombre[]" class="form-control grupo" v-model='archivos[item].nombre'>
                                    </td>
                                    <td>
                                        <input type="text" readonly class="form-control grupo" v-model='archivos[item].name' value="">
                                        <input type="hidden" readonly class="form-control" v-model='archivos[item].archivo' name="arc_archivo[]" value="">
                                        <label class="btn bg-olive btn-flat margin">
                                            <i class="fa fa-file-pdf-o fa-lg"></i>
                                            <i class="fa fa-file-word-o fa-lg"></i>
                                            <i class="fa fa-file-image-o fa-lg"></i>
                                            <input type="file" style="display: none;" onchange="app.onChange(event,@{{item}});">
                                        </label>
                                    </td>
                                    <td>
                                        <a @click="removeArchivos(item)" class="btn btn-danger btn-sm">
                                          <i class="fa fa-trash fa-lg"></i>
                                        </a>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                          </div>
                        </div>
                    </form>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <a class="btn btn-danger btn-sm" id="guardar">
                                    <i class="fa fa-save fa-lg">  Guardar  </i>
                                </a>
                            </div>
                        </div>
                    </div>
                </section><!-- /.content -->
    <script>
        app = new Vue({
            el: '#app',
            data: {
                archivos:[{}],
            },
            methods: {
                addArchivos:function(){
                    app.archivos.push({});
                },
                removeArchivos:function(id){
                    app.archivos.splice( id, 1 );
                },
                onChange: function(event,item) {
                    var files = event.target.files || event.dataTransfer.files;
                    if (!files.length)
                      return;
                    var image = new Image();
                    var reader = new FileReader();
                    reader.onload = (e) => {
                        app.archivos[item].archivo = e.target.result;
                    };
                    reader.readAsDataURL(files[0]);
                    app.archivos[item].name=files[0].name;

                },
            },/*
            ready: function(){
                
            },*/
        });
    </script>
@stop

@section('formulario')
     @include( 'admin.proceso.form.alumno' )
     @include( 'admin.proceso.form.persona' )
@stop
