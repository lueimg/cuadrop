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
    {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.24/vue.min.js') }}

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
                                    <label class="control-label">Descripcion del problema:</label>
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
                                <div class="col-sm-6 grupo-carrera-carrera">
                                    <label class="control-label">Carrera:</label>
                                    <select class="form-control grupo" name="slct_carrera_id" id="slct_carrera_id">
                                    </select>
                                </div>
                                <div class="col-sm-6 grupo-carrera-especialidad">
                                    <label class="control-label">Especialidad/Diploma:</label>
                                    <select class="form-control grupo" name="slct_especialidad_id" id="slct_especialidad_id">
                                    </select>
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
                            <fieldset>
                                <legend>Lista de Ciclo Semestre</legend>
                                <ul class="list-group" id="t_ciclosemestre"></ul>
                            </fieldset>
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
                                                        <th>Apellido P</th>
                                                        <th>Apellido M</th>
                                                        <th>Nombres</th>
                                                        <th>Sexo</th>
                                                        <th>Telefono</th>
                                                        <th>Email</th>
                                                        <th> [ ] </th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tb_alumnos"></tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>Apellido P</th>
                                                        <th>Apellido M</th>
                                                        <th>Nombres</th>
                                                        <th>Sexo</th>
                                                        <th>Telefono</th>
                                                        <th>Email</th>
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

                        <div class="panel panel-info grupog grupo-adicional">
                          <div class="panel-heading">
                            <h3 class="panel-title">Datos requeridos</h3>
                          </div>
                          <div class="panel-body">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <label class="control-label">Nota Alumno:</label>
                                    <input type="number" name="txt_ad_nota" id="txt_ad_nota" class="form-control grupo">
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">Cambiando:</label>
                                    <input type="number" name="txt_ad_cambiando" id="txt_ad_cambiando" class="form-control grupo">
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
@stop
