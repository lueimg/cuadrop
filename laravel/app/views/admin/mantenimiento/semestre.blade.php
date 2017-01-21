<!DOCTYPE html>
@extends('layouts.master')  

@section('includes')
    @parent 
    {{ HTML::script('https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js') }}
    @include( 'admin.mantenimiento.js.semestre_ajax' )
    @include( 'admin.mantenimiento.js.semestre' )
@stop
<!-- Right side column. Contains the navbar and content of the page -->
@section('contenido')
<style type="text/css">
/* Estilo por defecto para validacion */
input:required:invalid {  border: 1px solid red;  }  input:required:valid {  border: 1px solid green;  }
</style>
    <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Mantenimiento de Semestres
                <small> </small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
                <li><a href="#">Mantenimientos</a></li>
                <li class="active">Mantenimiento de Semestres</li>
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
                            <table id="t_semestres" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th> [ ] </th>
                                    </tr>
                                </thead>
                                <tbody id="tb_semestres">
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Estado</th>
                                        <th> [ ] </th>
                                    </tr>
                                </tfoot>
                            </table>
                            <a class='btn btn-primary btn-sm' class="btn btn-primary" 
                            data-toggle="modal" data-target="#semestreModal" data-titulo="Nuevo"><i class="fa fa-plus fa-lg"></i>&nbsp;Nuevo</a>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                    <!-- Finaliza contenido -->
                </div>
            </div>

        </section><!-- /.content -->
@stop

@section('formulario')
     @include( 'admin.mantenimiento.form.semestre' )
@stop
