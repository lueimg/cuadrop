<!DOCTYPE html>
@extends('layouts.master')

@section('includes')
    @parent
    {{ HTML::style('lib/daterangepicker/css/daterangepicker-bs3.css') }}
    {{ HTML::style('lib/bootstrap-multiselect/dist/css/bootstrap-multiselect.css') }}
    {{ HTML::script('//cdn.jsdelivr.net/momentjs/2.9.0/moment.min.js') }}
    {{ HTML::script('lib/daterangepicker/js/daterangepicker_single.js') }}
    {{ HTML::script('lib/bootstrap-multiselect/dist/js/bootstrap-multiselect.js') }}

    @include( 'admin.js.slct_global_ajax' )
    @include( 'admin.js.slct_global' )
    @include( 'admin.proceso.js.registrarproblema_ajax' )
    @include( 'admin.proceso.js.registrarproblema' )
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
</style>
            <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Carga individual Digitalizaci&oacute;n
                        <small> </small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                        <li><a href="#">Hist&oacute;rico</a></li>
                        <li class="active">Carga individual</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <div class="col-sm-6">
                                <label class="control-label">Tipo de problema</label>
                                <select class="form-control" name="slct_tipo_problema" id="slct_tipo_problema">
                                </select>
                            </div>
                            <div class="col-sm-6" id="div_tipo_carrera">
                                <label class="control-label">Tipo de carrera</label>
                                <select class="form-control" name="slct_tipo_carrera" id="slct_tipo_carrera">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div id="div_descripcion">
                        
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-3">
                                    <label class="control-label">Descripcion:</label>
                                </div>
                                <div class="col-sm-9">
                                    <textarea id="descripcion" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <a class='btn btn-default btn-sm' id="eventAlumno" role="button" data-toggle="collapse" href="#collapseAlumno" aria-expanded="false" aria-controls="collapseAlumno">
                            <i class="fa fa-caret-square-o-up"> Ocultar Alumnos </i></a>
                        </div>
                    </div>

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

                    <div id="profesional">
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-6">
                                    <label class="control-label">CARRERA:</label>
                                    <select class="form-control" name="slct_carrera" id="slct_carrera">
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <label class="control-label">CICLO:</label>
                                    <select class="form-control" name="slct_ciclo" id="slct_ciclo">
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-5">
                                    <label class="control-label">DESCRIPCIÓN DEL DOCUMENTO SOLICITADO: ejm. CERTIFICADO DE EXPERTO EN COMP. E INFORMATICA:</label>
                                </div>
                                <div class="col-sm-7">
                                    <textarea id="p_documento" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-5">
                                    <label class="control-label">OBSERVACIONES:</label>
                                </div>
                                <div class="col-sm-7">
                                    <textarea id="p_observacion" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="tecnico">
                        
                        <div class="row form-group">
                            <div class="col-sm-12">
                                <div class="col-sm-5">
                                    <label class="control-label">DESCRIPCIÓN DE LA CARRERA: ejm.COMP. E INFORMATICA</label>
                                </div>
                                <div class="col-sm-7">
                                    <textarea id="t_carrera" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-5">
                                    <label class="control-label">DESCRIPCIÓN DEL DOCUMENTO SOLICITADO: ejm. CERTIFICADO DE EXPERTO EN COMP. E INFORMÁTICA</label>
                                </div>
                                <div class="col-sm-7">
                                    <textarea id="t_documento" class="form-control" rows="2"></textarea>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-5">
                                    <label class="control-label">OBSERVACIONES:</label>
                                </div>
                                <div class="col-sm-7">
                                    <textarea id="t_observacion" class="form-control" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12">
                                <div class="col-sm-3">
                                    <label class="control-label">Nro de cursos :</label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="nro_cursos" id="nro_cursos" class="form-control" value="" required="required" title="">
                                </div>

                            </div>
                            <div class="col-sm-12">
                            <!-- Inicia contenido -->
                                <div class="box">
                                    <div class="box-body table-responsive">
                                        <table id="t_cursos" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>N</th>
                                                    <th>Curso</th>
                                                    <th>Frecuencia</th>
                                                    <th>Hora</th>
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
                                                    <th>Curso</th>
                                                    <th>Frecuencia</th>
                                                    <th>Hora</th>
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
                            <div class="col-sm-12">
                                <div class="col-sm-3">
                                    <label class="control-label">Nro de pagos :</label>
                                </div>
                                <div class="col-sm-2">
                                    <input type="text" name="nro_pagos" id="nro_pagos" class="form-control" value="" required="required" title="">
                                </div>
                            </div>
                            <div class="col-sm-12">
                            <!-- Inicia contenido -->
                                <div class="box">
                                    <div class="box-body table-responsive">
                                        <table id="t_pagos" class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Cursos</th>
                                                    <th>N° Recibo</th>
                                                    <th>Monto</th>
                                                </tr>
                                            </thead>
                                            <tbody id="tb_pagos"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Cursos</th>
                                                    <th>N° Recibo</th>
                                                    <th>Monto</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        
                                    </div><!-- /.box-body -->
                                </div><!-- /.box -->
                                <!-- Finaliza contenido -->
                            </div>
                        </div>

                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            
                            <a class="btn btn-danger btn-sm" id="guardar">
                                <i class="fa fa-save fa-lg">  Guardar  </i>
                            </a>
                            
                        </div>
                    </div>
                </section><!-- /.content -->
@stop

@section('formulario')
     @include( 'admin.proceso.form.alumno' )
@stop