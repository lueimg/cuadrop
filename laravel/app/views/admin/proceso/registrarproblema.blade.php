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
                        <div class="col-sm-12
                        ">
                            <div class="col-sm-6">
                                <label class="control-label">Quiebre</label>
                                <select class="form-control" name="slct_tipo_problema" id="slct_tipo_problema">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">

                            <div class="col-sm-6">
                                <label class="control-label">Quiebre</label>
                                <select class="form-control" name="slct_tipo_carrera" id="slct_tipo_carrera">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <div id="actividad" ></div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-12">
                            <div id="fileOutput" class="table-responsive"></div>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-3">
                            <label class="control-label"></label>
                            <button type="button" id="btn_generar" name="btn_generar" class="btn btn-primary" onclick="cargar()">Generar actualizaci&oacute;n</button>
                        </div>
                    </div>

                </section><!-- /.content -->
@stop

@section('formulario')
     @include( 'admin.proceso.form.registrarproblema' )
@stop