<script type="text/javascript">
var AlumnosObj, alumno_id;
$(document).ready(function() { $("#form_problemas").validate();
    $('#fecha_problema').val('<?php echo date("Y-m-d H:i");?>');
    $('#fecha_problema').daterangepicker({
        singleDatePicker: true,
        timePicker: true,
        timePicker24Hour: true,
        format: 'YYYY-MM-DD HH:mm',
        showDropdowns: true
    });
    $('#guardar').click(function(event) {
        //if (Validar() ) {
            Guardar();
        //}
    });
    $('#div_tipo_carrera').css('display','none');
    $('#eventAlumno').css('display','none');
    $('#profesional_tecnico').css('display','none');
    $('#profesional').css('display','none');
    $('#tecnico').css('display','none');
    $('#tecnico_detalle').css('display','none');
    var funcionesSede = {success:successSede};

    slctGlobal.listarSlct('lista/sedepersona','slct_sede_id','simple',null,null,null,null,null,null,null,funcionesSede);
    slctGlobal.listarSlct('lista/instituto','slct_instituto_id','simple',null,null,null,'#slct_carrera_id,#slct_ciclo_id','I');

    slctGlobal.listarSlct('lista/tipoarticulo','slct_tipo_articulo','simple',null,null,null,'#slct_articulo_id','TA');
    //slctGlobal.listarSlct('lista/tipocarrera','slct_tipo_carrera_id','simple',null,null,null,'#slct_carrera_id,#slct_ciclo_id','T');

    slctGlobal.listarSlct('lista/articulo','slct_articulo_id','simple',null,null,1,null,null,null,null);
    slctGlobalHtml('slct_categoria_tipo_problema_id','simple');
    /*var data={estado:1}
    slctGlobal.listarSlct('categoriatipoproblema','slct_categoria_tipo_problema_id','simple',null,data);*/

    var data={porusuario:1,estado:1};
    slctGlobal.listarSlct('tipoproblema','slct_tipo_problema_id','simple',null,data);
    slctGlobal.listarSlct('lista/tipocarrera','slct_tipo_carrera_id','simple',null,null,null);
    slctGlobal.listarSlct('lista/carrerainstituto','slct_carrera_id','simple',null,null,1);
    slctGlobal.listarSlct('lista/cicloinstituto','slct_ciclo_id','simple',null,null,1);
    Alumno.Cargar(alumnosHTML);
    //nro_pagos
    var i, cant;
    $('#nro_pagos').change(function(event) {
        //t_pagos
        var html='',j;
        cant = $(this).val();
        for (i = 0; i < cant; i++) {
            j=i+1;
            html+="<tr>"+
                '<td>'+j+'</td>'+
                '<td><input type="text" class="form-control fecha" name="tp_fecha[]" id="tp_fecha_'+j+'" value="" required="required"></td>'+
                '<td><input type="text" class="form-control" name="tp_recibo[]" id="tp_recibo_'+j+'" value="" required="required"></td>'+
                '<td><input type="number" class="form-control" name="tp_monto[]" id="tp_monto_'+j+'" value="" required="required" step="0.01" pattern="[0-9]+([\.|,][0-9]+)?"></td>'+
                '<td>'+
                    '<input type="text" readonly class="form-control" id="pago_nombre'+i+'"" value="">'+
                    '<input type="text" style="display: none;" id="pago_archivo'+i+'" name="pago_archivo[]">'+
                    '<label class="btn bg-olive btn-flat margin">'+
                        '<i class="fa fa-file-pdf-o fa-lg"></i>'+
                        '<i class="fa fa-file-word-o fa-lg"></i>'+
                        '<i class="fa fa-file-image-o fa-lg"></i>'+
                        '<input type="file" style="display: none;" onchange="onPagos('+i+');" >'+
                    '</label>'+
                '</td>';
            html+="</tr>";
        }
        $("#tb_pagos").html(html);
        $('.fecha').daterangepicker({
            singleDatePicker: true,
            format: 'YYYY-MM-DD'
        });
    });
    //nro_cursos
    $('#nro_cursos').change(function(event) {
        //cagar registros en tabla  t_cursos
        var html='';
        cant = $(this).val();
        for (i = 0; i < cant; i++) {
            j=i+1;
            html+="<tr>"+
                '<td>'+j+'</td>'+
                '<td><input type="text" class="form-control" pattern="[A-Za-z]{5,20}\s\(([0-9]{1,2})\)" name="tc_curso[]" id="tc_curso_'+j+'" value="" required="required"></td>'+
                '<td><input type="text" class="form-control" name="tc_frecuencia[]" id="tc_frecuencia_'+j+'" value="" required="required"></td>'+
                '<td><input type="text" class="form-control" name="tc_hora[]" id="tc_hora_'+j+'" value="" required="required"></td>'+
                '<td><input type="text" class="form-control" name="tc_profesor[]" id="tc_profesor_'+j+'" value="" required="required"></td>'+
                '<td><input type="text" class="form-control fecha" name="tc_fecha_ini[]" placeholder="AAAA-MM-DD" id="tc_fecha_ini_'+j+'" onfocus="blur()" required="required"/></td>'+
                '<td><input type="text" class="form-control fecha" name="tc_fecha_fin[]" placeholder="AAAA-MM-DD" id="tc_fecha_fin_'+j+'" onfocus="blur()" required="required"/></td>'+
                '<td><input type="number" class="form-control" name="tc_nota[]" id="tc_nota_'+j+'" value="" required="required" min="0" data-bind="value:replyNumber"></td>';
            html+="</tr>";
        }
        $("#tb_cursos").html(html);
        $('.fecha').daterangepicker({
            format: 'YYYY-MM-DD',
            singleDatePicker: true,
            showDropdowns: true
        });
    });

    $('#slct_tipo_problema_id').change(function(event) {
        if ( this.value =='3') {
            //constancia y certificado
            $('#div_tipo_carrera').css('display','');
            $('#div_articulos').css('display','none');
        } else if ( this.value =='6') {
            //constancia y certificado
            $('#div_tipo_carrera').css('display','none');
            $('#div_articulos').css('display','');
            $('#slct_tipo_carrera_id').multiselect('deselectAll', false);
            $('#slct_tipo_carrera_id').multiselect('refresh');
        } else {
            //mostrar solo la descripcion
            //$('#div_descripcion').css('display','');
            $('#div_tipo_carrera').css('display','none');
            $('#div_articulos').css('display','none');
            $('#slct_tipo_carrera_id').multiselect('deselectAll', false);
            $('#slct_tipo_carrera_id').multiselect('refresh');
        }
        $("#slct_categoria_tipo_problema_id").multiselect('destroy');
        var data={estado:1,porusuario:1,tipo_problema_id:this.value};
        slctGlobal.listarSlct('categoriatipoproblema','slct_categoria_tipo_problema_id','simple',null,data);
        $('#slct_tipo_carrera_id').trigger('change');
    });
    $('#slct_tipo_carrera_id').change(function(event) {

        if (isNaN( this.value ) || this.value==='' ) {
            //mostrar la tabla de alumnos
            $('#eventAlumno').css('display','none');
        } else {
            $('#eventAlumno').css('display','');
            $('#collapseAlumno').collapse();
        }

        if ( this.value =='1' || this.value=='4') {
            //escolar o tecnico
            //alumno_problema, sin guardar ni carrer_id ni ciclo_id
            //pero habilitar registros para alumno_problema_nota, alumno_problema_pago
            $('#profesional_tecnico').css('display','');
            $('#profesional').css('display','none');
            $('#collapseAlumno').css('display','');
            $('#tecnico').css('display','');
            $('#tecnico_detalle').css('display','');
        } else if ( this.value =='2' || this.value=='3' ) {
            //profesional
            //cargar y registrar en  alumno_problema
            $('#profesional_tecnico').css('display','');
            $('#profesional').css('display','');
            $('#collapseAlumno').css('display','');
            $('#tecnico').css('display','none');
            $('#tecnico_detalle').css('display','none');

        } else {
            //oculatar todo
            $('#profesional_tecnico').css('display','none');
            $('#profesional').css('display','none');
            $('#tecnico').css('display','none');
            $('#tecnico_detalle').css('display','none');
            $('#collapseAlumno').css('display','none');
        }
    });
    $('#collapseAlumno').on('hidden.bs.collapse', function () {
        $('#eventAlumno i').attr('class','fa fa-caret-square-o-down');
        $('#eventAlumno i').html(' Mostrar Alumnos ');
    });
    $('#collapseAlumno').on('shown.bs.collapse', function () {
        $('#eventAlumno i').attr('class','fa fa-caret-square-o-up');
        $('#eventAlumno i').html(' Ocultar Alumnos ');
    });
    $('#alumnoModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var titulo = button.data('titulo');
        var id = button.data('id');
        var modal = $(this);
        modal.find('.modal-title').text(titulo+' Alumno');
        $('#form_alumno [data-toggle="tooltip"]').css("display","none");
        $("#form_alumno input[type='hidden']").remove();

        if(titulo=='Nuevo'){
            modal.find('.modal-footer .btn-primary').text('Guardar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
            $('#form_alumno #slct_estado').val(1);
            $('#form_alumno #txt_nombre').focus();
        }
        else{
            //var id = AlumnosObj[id].id;
            modal.find('.modal-footer .btn-primary').text('Actualizar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');

            $('#form_alumno #txt_nombre').val( AlumnosObj[id].nombre );
            $('#form_alumno #txt_paterno').val( AlumnosObj[id].paterno );
            $('#form_alumno #txt_materno').val( AlumnosObj[id].materno );
            $('#form_alumno #txt_telefono').val( AlumnosObj[id].telefono );
            $('#form_alumno #txt_email').val( AlumnosObj[id].email );
            $('#form_alumno #slct_sexo').val( AlumnosObj[id].sexo );
            $('#form_alumno #slct_estado').val( AlumnosObj[id].estado );
            $("#form_alumno").append("<input type='hidden' value='"+AlumnosObj[id].id+"' name='id'>");
        }
    });

    $('#alumnoModal').on('hide.bs.modal', function (event) {
        var modal = $(this);
        modal.find('.modal-body input').val('');
    });
});
onPagos=function(item){
    var files = event.target.files || event.dataTransfer.files;
    if (!files.length)
      return;
    var image = new Image();
    var reader = new FileReader();
    reader.onload = (e) => {
        //pagosObj[item]=[];
        //pagosObj[item].archivo = event.target.result;
        $('#pago_archivo'+item).val(event.target.result);
        //console.log(event.target.result);
    };
    reader.readAsDataURL(files[0]);
    $('#pago_nombre'+item).val(files[0].name);
    console.log(files[0].name);
};
AgregarArticulo=function(){
    var articulo_id=$('#slct_articulo_id option:selected').val();
    var articulo=$('#slct_articulo_id option:selected').text();
    var buscar_cargo = $('#cargo_'+articulo_id).text();
    if (articulo_id!=='') {
        if (buscar_cargo==="") {

            var html='';
            html+="<li class='list-group-item'><div class='row'>";
            html+="<div class='col-sm-4' id='cargo_"+articulo_id+"'><h5>"+articulo+"</h5></div>";

            html+="<div class='col-sm-3'>";
            html+="<input type='text' class='form-control' placeholder='ingrese cantidad' name='cantidad"+articulo_id+"'' id='cantidad"+articulo_id+"'></div>";
            html+="<div class='col-sm-3'>";
            html+="<input type='text' class='form-control' placeholder='ingrese descripcion' name='descripcion"+articulo_id+"'' id='descripcion"+articulo_id+"'></div>";

            html+='<div class="col-sm-2">';
            html+='<button type="button" id="'+articulo_id+'" Onclick="EliminarArticulo(this)" class="btn btn-danger btn-sm" >';
            html+='<i class="fa fa-minus fa-sm"></i> </button></div>';
            html+="</div></li>";

            $("#t_articulos").append(html);
            articulos_selec.push(articulo_id);
        } else 
            alert("Ya se agrego este Articulo");
    } else 
        alert("Seleccione Articulo");
};
EliminarArticulo=function(obj){
    var valor= obj.id;
    obj.parentNode.parentNode.parentNode.remove();
    var index = articulos_selec.indexOf(valor);
    articulos_selec.splice( index, 1 );
};
successSede=function(){
    var numSedes = $("#slct_sede_id option").length;
    $('#slct_sede_id option').each(function(index, el) {
        //seleccionar index=1
        if (index==1) {
            $("#slct_sede_id").multiselect('select',index);
            $("#slct_sede_id").multiselect('refresh');
        }
    });
};
Validar=function(){
    var sede=$('#slct_sede_id').val();
    var instituto=$('#slct_instituto_id').val();
    var tipo_problema=$('#slct_tipo_problema_id').val();
    var tipo_carrera=$('#slct_tipo_carrera_id').val();
    var fecha_problema=$('#fecha_problema').val();

    if (sede==='') {
        Psi.mensaje('danger', 'Seleccione sede', 6000);
        return false;
    }
    if (instituto==='') {
        Psi.mensaje('danger', 'Seleccione instituto', 6000);
        return false;
    }
    if (fecha_problema==='') {
        Psi.mensaje('danger', 'Seleccione fecha del problema', 6000);
        return false;
    }
    //debe rellenar descripcion
    var descripcion=$('#descripcion').val();
    if (descripcion==='') {
        Psi.mensaje('danger', 'Ingrese la descripcion', 6000);
        return false;
    }
    if (tipo_problema=='3') {
        //constancia y certificado
        if (isNaN(tipo_carrera) || tipo_carrera==='') {
            Psi.mensaje('danger', 'Seleccione un tipo de carrera', 6000);
            return false;
        } else {
            if (isNaN(alumno_id) || alumno_id==='') {
                Psi.mensaje('danger', 'Seleccione un alumno', 6000);
                return false;
            }
            //validar carera
            var carrera, documento, observacion, carrera_id, ciclo_id;
            if (tipo_carrera=='1' || tipo_carrera=='4') {
                //escolar o tecnico
                carrera = $('#carrera').val();
                documento = $('#documento').val();
                observacion = $('#observacion').val();
                //numero de cursos
                //numero de pagos
                if (carrera==='') {
                    Psi.mensaje('danger', 'Ingrese descripcion de la carrera', 6000);
                    return false;
                }
                if (documento==='') {
                    Psi.mensaje('danger', 'Ingrese descripcion del documento  ', 6000);
                    return false;
                }
                if (observacion==='') {
                    Psi.mensaje('danger', 'Ingrese descripcion de la observacion', 6000);
                    return false;
                }
                //si nro_cursos nro pagos son mayores que cero validar tablas
                var nro_cursos = $('#nro_cursos').val();
                var nro_pagos = $('#nro_pagos').val();
                if (nro_cursos>0 || nro_pagos>0) {
                    var val;
                    $.each($('#tb_cursos input,#tb_pagos input'), function (index, value) {
                            if( !$(value).val() ) {
                                val=false;
                                return false;
                            }
                        });
                    if (val===false) {
                        Psi.mensaje('danger', 'Ingrese campo correctamente', 6000);
                        return false;
                    }
                    return true;
                } else {
                    //guardar
                    return true;
                }
            } else if (tipo_carrera=='2' || tipo_carrera=='3') {
                //profesional
                carrera_id =$('#slct_carrera_id').val();
                ciclo_id = $('#slct_ciclo_id').val();
                documento = $('#documento').val();
                observacion = $('#observacion').val();
                if (isNaN(carrera_id) || carrera_id==='') {
                    Psi.mensaje('danger', 'Seleccione carrera', 6000);
                    return false;
                }
                if (isNaN(ciclo_id) || ciclo_id==='') {
                    Psi.mensaje('danger', 'Seleccione ciclo', 6000);
                    return false;
                }
                if (documento==='') {
                    Psi.mensaje('danger', 'Ingrese descripcion del documento  ', 6000);
                    return false;
                }
                if (observacion==='') {
                    Psi.mensaje('danger', 'Ingrese  observacion', 6000);
                    return false;
                }
                //guardar
                return true;
            }
        }

    } else if ( isNaN(tipo_problema) || tipo_problema==='' ){
        //mensaje de seleccion
        Psi.mensaje('danger', 'Seleccione un tipo de problema', 6000);
        return false;
    } else {
        return true;
    }
};
Guardar=function(){
    $("#form_problemas input[type='hidden']").remove();
    if (alumno_id!==undefined && alumno_id!=='undefined' && alumno_id!=='') {
        $("#form_problemas").append("<input type='hidden' value='"+alumno_id+"' name='alumno_id'>");
    }
    $("#form_problemas input[name='articulos_selec']").remove();
    $("#form_problemas").append("<input type='hidden' value='"+articulos_selec+"' name='articulos_selec'>");
    $.each(app.archivos, function(index, val) {
        $("#form_problemas").append("<input type='hidden' value='"+val.nombre+"' name='nombre[]'>");
        $("#form_problemas").append("<input type='hidden' value='"+val.archivo+"' name='archivo[]'>");
    });
    $("#form_problemas").append("<input type='hidden' value='"+app.archivos.length+"' name='archivos_length'>");
    var datos=$("#form_problemas").serialize().split("txt_").join("").split("slct_").join("");

    Problema.Crear(datos);
};
Editar=function(){
    if(validaAlumnos()){
        Alumno.AgregarEditar(1);
    }
};
Agregar=function(){
    if(validaAlumnos()){
        Alumno.AgregarEditar(0);
    }
};
validaAlumnos=function(){
    $('#form_alumno [data-toggle="tooltip"]').css("display","none");
    var a=[];
    a[0]=validaA("txt","nombre","");
    var rpta=true;

    for(i=0;i<a.length;i++){
        if(a[i]===false){
            rpta=false;
            break;
        }
    }
    return rpta;
};
validaA=function(inicial,id,v_default){
    var texto="Seleccione";
    if(inicial=="txt"){
        texto="Ingrese";
    }

    if( $.trim($("#"+inicial+"_"+id).val())==v_default ){
        $('#error_'+id).attr('data-original-title',texto+' '+id);
        $('#error_'+id).css('display','');
        return false;
    }
};
alumnosHTML=function(datos){
    AlumnosObj=datos;
    $('#t_alumnos').dataTable().fnDestroy();
    var sexo='Masculino', html='';
    $.each(datos,function(index,data){
        estadohtml='<span id="'+data.id+'" onClick="activar('+data.id+')" class="btn btn-danger">Inactivo</span>';
        if(data.estado==1)
            estadohtml='<span id="'+data.id+'" onClick="desactivar('+data.id+')" class="btn btn-success">Activo</span>';

        if (data.sexo=='F')
            sexo='Femenino';
        else
            sexo='Masculino';

        estado='onClick="seleccionar('+data.id+',this)"';
        html+="<tr "+estado+" >"+
            "<td>"+data.paterno+"</td>"+
            "<td>"+data.materno+"</td>"+
            "<td>"+data.nombre+"</td>"+
            "<td>"+data.sexo+"</td>"+
            "<td>"+data.email+"</td>"+
            "<td>"+data.telefono+"</td>"+
            /*"<td id='estado_"+data.id+"' data-estado='"+data.estado+"'>"+estadohtml+"</td>"+*/
            '<td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#alumnoModal" data-id="'+index+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i> </a></td>';

        html+="</tr>";
    });
    $("#tb_alumnos").html(html);
    $("#t_alumnos").dataTable();
};
seleccionar=function(id,tr){
    if ($( tr ).hasClass( "selec" )) {
        $(tr).removeClass("selec");
        alumno_id='';
        return;
    }
    alumno_id=id;

    var trs = tr.parentNode.children;
    for(var i =0;i<trs.length;i++)
        $(trs[i]).removeClass("selec");

    $(tr).addClass( "selec" );
};
limpiar=function(){
    $('#slct_tipo_problema_id').multiselect('deselectAll', false);
    $('#slct_tipo_problema_id').multiselect('refresh');
    $('#slct_tipo_problema_id').trigger('change');

    $('#slct_tipo_carrera_id').multiselect('deselectAll', false);
    $('#slct_tipo_carrera_id').multiselect('refresh');
    $('#slct_tipo_carrera_id').trigger('change');

    $('#slct_carrera_id').multiselect('deselectAll', false);
    $('#slct_carrera_id').multiselect('refresh');
    $('#slct_carrera_id').trigger('change');

    $('#slct_ciclo_id').multiselect('deselectAll', false);
    $('#slct_ciclo_id').multiselect('refresh');
    $('#slct_ciclo_id').trigger('change');

    $("#slct_tipo_articulo").val('');
    $('#slct_tipo_articulo').multiselect('refresh');
    $('#slct_tipo_articulo').trigger('change');

    $("#slct_articulo_id").val('');
    $('#slct_articulo_id').multiselect('refresh');
    $('#slct_articulo_id').trigger('change');

    $("#t_articulos").html("");
    $('#fecha_problema').val('<?php echo date("Y-m-d H:i");?>');
    $('#descripcion').val('');
    $('#carrera').val('');
    $('#documento').val('');
    $('#observacion').val('');
    $('#nro_cursos').val('');
    $('#nro_pagos').val('');
    alumno_id=undefined;
};
</script>
