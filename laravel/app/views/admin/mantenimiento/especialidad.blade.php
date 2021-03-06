<!DOCTYPE html>
@extends('layouts.master')  

@section('includes')
    @parent
    {{ HTML::style('lib/bootstrap-multiselect/dist/css/bootstrap-multiselect.css') }}
    {{ HTML::script('lib/bootstrap-multiselect/dist/js/bootstrap-multiselect.js') }}
    @include( 'admin.mantenimiento.js.especialidad_ajax' )
    @include( 'admin.mantenimiento.js.especialidad' )
    @include( 'admin.js.slct_global_ajax' )
    @include( 'admin.js.slct_global' )
@stop
<!-- Right side column. Contains the navbar and content of the page -->
@section('contenido')
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Mantenimiento de Categoria de Especialidades
                <small> </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="#">Mantenimientos</a></li>
                <li class="active">Mantenimiento de Especialidades</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <!-- Inicia contenido -->
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">Filtros</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body table-responsive">
                            <table id="t_especialidades" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Carrera</th>
                                        <th>Estado</th>
                                        <th> [ ] </th>
                                    </tr>
                                </thead>
                                <tbody id="tb_especialidades">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Tipo Problema</th>
                                        <th>Estado</th>
                                        <th> [ ] </th>
                                    </tr>
                                </tfoot>
                            </table>
                            <a class='btn btn-primary btn-sm' class="btn btn-primary" 
                            data-toggle="modal" data-target="#especialidadModal" data-titulo="Nueva"><i class="fa fa-plus fa-lg"></i>&nbsp;Nuevo</a>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <!-- Finaliza contenido -->
                </div>
            </div>

        </section><!-- /.content -->
@stop

@section('formulario')
     @include( 'admin.mantenimiento.form.especialidad' )
@stop
