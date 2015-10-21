<script type="text/javascript">
var AlumnosObj, alumno_id;
$(document).ready(function() {
    $('#guardar').click(function(event) {
        if (Validar() ) {
            Guardar();
        }
    });
    $('#div_tipo_carrera').css('display','none');
    $('#eventAlumno').css('display','none');
    $('#profesional').css('display','none');
    $('#tecnico').css('display','none');
    $('#div_descripcion').css('display','none');

    slctGlobal.listarSlct('lista/tipoproblema','slct_tipo_problema','simple',null);
    slctGlobal.listarSlct('lista/tipocarrera','slct_tipo_carrera','simple',null);
    slctGlobal.listarSlct('lista/carrera','slct_carrera','simple',null);
    slctGlobal.listarSlct('lista/ciclo','slct_ciclo','simple',null);
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
                '<td><input type="text" class="form-control" name="tp_curso_'+j+'" id="tp_curso_'+j+'" value="" required="required"></td>'+
                '<td><input type="text" class="form-control" name="tp_recibo_'+j+'" id="tp_recibo_'+j+'" value="" required="required"></td>'+
                '<td><input type="text" class="form-control" name="tp_monto_'+j+'" id="tp_monto_'+j+'" value="" required="required"></td>';
            html+="</tr>";
        }
        $("#tb_pagos").html(html);
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
                '<td><input type="text" class="form-control" name="tc_curso_'+j+'" id="tc_curso_'+j+'" value="" required="required"></td>'+
                '<td><input type="text" class="form-control" name="tc_frecuencia_'+j+'" id="tc_frecuencia_'+j+'" value="" required="required"></td>'+
                '<td><input type="text" class="form-control" name="tc_hora_'+j+'" id="tc_hora_'+j+'" value="" required="required"></td>'+
                '<td><input type="text" class="form-control" name="tc_profesor_'+j+'" id="tc_profesor_'+j+'" value="" required="required"></td>'+
                '<td><input type="text" class="form-control fecha" name="tc_fecha_ini_'+j+'" placeholder="AAAA-MM-DD" id="tc_fecha_ini_'+j+'" onfocus="blur()"/></td>'+
                '<td><input type="text" class="form-control fecha" name="tc_fecha_fin_'+j+'" placeholder="AAAA-MM-DD" id="tc_fecha_fin_'+j+'" onfocus="blur()"/></td>'+
                '<td><input type="text" class="form-control" name="tc_nota_'+j+'" id="tc_nota_'+j+'" value="" required="required"></td>';
            html+="</tr>";
        }
        $("#tb_cursos").html(html);
        $('.fecha').daterangepicker({
            format: 'YYYY-MM-DD',
            singleDatePicker: true
        });
    });

    $('#slct_tipo_problema').change(function(event) {
        if ( this.value =='3') {
            //constancia y certificado
            $('#div_tipo_carrera').css('display','');
            $('#div_descripcion').css('display','none');
        } else {
            //mostrar solo la descripcion
            $('#div_descripcion').css('display','');
            $('#div_tipo_carrera').css('display','none');
            $('#slct_tipo_carrera').multiselect('deselectAll', false);
            $('#slct_tipo_carrera').multiselect('refresh');
        }
        $('#slct_tipo_carrera').trigger('change');
    });
    $('#slct_tipo_carrera').change(function(event) {

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
            $('#profesional').css('display','none');
            $('#collapseAlumno').css('display','');
            $('#tecnico').css('display','');
        } else if ( this.value =='2' || this.value=='3' ) {
            //profesional
            //cargar y registrar en  alumno_problema
            $('#profesional').css('display','');
            $('#collapseAlumno').css('display','');
            $('#tecnico').css('display','none');

        } else {
            //oculatar todo
            $('#profesional').css('display','none');
            $('#tecnico').css('display','none');
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
Validar=function(){
    var tipo_problema=$('#slct_tipo_problema').val();
    var tipo_carrera=$('#slct_tipo_carrera').val();
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
            if (tipo_carrera=='1' || tipo_carrera=='4') {
                //escolar o tecnico
                var t_carrera = $('#t_carrera').val();
                var t_documento = $('#t_documento').val();
                var t_observacion = $('#t_observacion').val();
                //numero de cursos
                //numero de pagos
                if (t_carrera==='') {
                    Psi.mensaje('danger', 'Ingrese descripcion de la carrera', 6000);
                    return false;
                }
                if (t_documento==='') {
                    Psi.mensaje('danger', 'Ingrese descripcion del documento  ', 6000);
                    return false;
                }
                if (t_observacion==='') {
                    Psi.mensaje('danger', 'Ingrese descripcion de la observacion', 6000);
                    return false;
                }
                //guardar
                return true;
            } else if (tipo_carrera=='2' || tipo_carrera=='3') {
                //profesional
                var carrera =$('#slct_carrera').val();
                var ciclo = $('#slct_ciclo').val();
                var p_documento = $('#p_documento').val();
                var p_observacion = $('#p_observacion').val();
                if (isNaN(carrera) || carrera==='') {
                    Psi.mensaje('danger', 'Seleccione carrera', 6000);
                    return false;
                }
                if (isNaN(ciclo) || ciclo==='') {
                    Psi.mensaje('danger', 'Seleccione ciclo', 6000);
                    return false;
                }
                if (p_documento==='') {
                    Psi.mensaje('danger', 'Ingrese descripcion del documento  ', 6000);
                    return false;
                }
                if (p_observacion==='') {
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
        //debe rellenar descripcion
        var descripcion=$('#descripcion').val();
        if (descripcion==='') {
            Psi.mensaje('danger', 'Ingrese la descripcion', 6000);
            return false;
        }
        //guardar

        return true;
    }
};
Guardar=function(){
    
    Psi.mensaje('success', 'guardado', 6000);
};
Editar=function(){
    if(validaAlumnos()){
        Alumno.AgregarEditarArea(1);
    }
};
Agregar=function(){
    if(validaAlumnos()){
        Alumno.AgregarEditarArea(0);
    }
};
validaAlumnos=function(){
    $('#form_alumno [data-toggle="tooltip"]').css("display","none");
    var a=[];
    a[0]=valida("txt","nombre","");
    var rpta=true;

    for(i=0;i<a.length;i++){
        if(a[i]===false){
            rpta=false;
            break;
        }
    }
    return rpta;
};

valida=function(inicial,id,v_default){
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
</script>