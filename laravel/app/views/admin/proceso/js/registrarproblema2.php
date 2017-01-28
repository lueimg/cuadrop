<script type="text/javascript">
var AlumnosObj, alumno_id;
$(document).ready(function() { 
    $("#form_problemas").validate();
    $('#fecha_problema,#txt_pe_fecha,#txt_te2_fecha').val('<?php echo date("Y-m-d H:i");?>');
    $('#fecha_problema,#txt_pe_fecha,#txt_te2_fecha').daterangepicker({
        singleDatePicker: true,
        timePicker: true,
        timePicker24Hour: true,
        format: 'YYYY-MM-DD HH:mm',
        showDropdowns: true
    });
    $('#txt_le_fecha,#txt_log_fecha,#txt_fecha_seminario').val('<?php echo date("Y-m-d");?>');
    $('#txt_le_fecha,#txt_log_fecha,#txt_fecha_seminario').daterangepicker({
        singleDatePicker: true,
        timePicker: false,
        format: 'YYYY-MM-DD',
        showDropdowns: true
    });
    $('#guardar').click(function(event) {
        if (Validar() ) {
            Guardar();
        }
    });

    $("#form_problemas .grupog").css("display","none");
    $("#form_problemas input.grupo,#form_problemas textarea.grupo,#form_problemas select.grupo").val("");
    $("#form_problemas input.ids").val("1");
    $("#form_problemas input.grupo,#form_problemas textarea.grupo,#form_problemas select.grupo").attr("disabled","true");
    $("#t_ciclosemestre,#t_articulos,#tb_cursos,#tb_pagos,.grupo-archivo table tbody tr").html("");
    /******************************Cargar Datos********************************/
    var funcionesSede = {success:successSede};

    slctGlobal.listarSlct('lista/sedepersona','slct_sede_id','simple',null,null,null,null,null,null,null,funcionesSede);

    var data={estado:1}
    slctGlobal.listarSlct('lista/tipoarticulo','slct_tipo_articulo','simple',null,data,null,'#slct_articulo_id','TA');
    slctGlobal.listarSlct('lista/articulo','slct_articulo_id','simple',null,null,1,null,null,null,null);
    var data={estado:1,servicio:1}
    slctGlobal.listarSlct('articulo','slct_le_articulo_id','simple',null,data);
    slctGlobalHtml('slct_categoria_tipo_problema_id,#slct_le_razon_id,#slct_log_moneda,#slct_log_tipotelefono','simple');

    var data={estado:1};
    slctGlobal.listarSlct2('area/listar','slct_pe_area_id','simple',null,data);
    slctGlobal.listarSlct('municipalidad','slct_le_municipal_id','simple',null,data);
    slctGlobal.listarSlct('licencia','slct_le_licencia_id','simple',null,data);
    var data={porusuario:1,estado:1};
    slctGlobal.listarSlct('tipoproblema','slct_tipo_problema_id','simple',null,data);
    slctGlobal.listarSlct('lista/carrerainstituto','slct_carrera_id','simple',null,null,1,'#slct_especialidad_id','C');
    slctGlobal.listarSlct('lista/cicloinstituto','slct_cs_ciclo_id,#slct_ciclo_id','simple',null,null,1);
    slctGlobal.listarSlct('lista/cicloinstituto','slct_ciclo_ids','multiple',null,null,1);
    slctGlobal.listarSlct('lista/especialidad','slct_especialidad_id','simple',null,null,1);
    slctGlobal.listarSlct('lista/semestre','slct_semestre_ini_id,#slct_semestre_fin_id,#slct_semestre_reserva_id,#slct_semestre_reincorporarse_id','simple');
    /**************************************************************************/
    /***********************************Alumnos********************************/
    Alumno.Cargar(alumnosHTML);
    Alumno.CargarP(personasHTML);
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
            $('#form_alumno #txt_codigo').val( AlumnosObj[id].codigo );
            $("#form_alumno").append("<input type='hidden' value='"+AlumnosObj[id].id+"' name='id'>");
        }
    });

    $('#alumnoModal').on('hide.bs.modal', function (event) {
        var modal = $(this);
        modal.find('.modal-body input').val('');
    });
    /**************************************************************************/
    /***********************************Pagos**********************************/
    var i, cant;
    $('#nro_pagos').change(function(event) {
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
                    '<input type="hidden" readonly id="pago_archivo'+i+'" name="tp_archivo[]">'+
                    '<label class="btn bg-olive btn-flat margin">'+
                        '<i class="fa fa-file-pdf-o fa-lg"></i>'+
                        '<i class="fa fa-file-word-o fa-lg"></i>'+
                        '<i class="fa fa-file-image-o fa-lg"></i>'+
                        '<input type="file" style="display: none;" onchange="onPagos(event,'+i+');" >'+
                    '</label>'+
                '</td>';
            html+="</tr>";
        }
        $("#tb_pagos").html(html);
        $('.fecha').daterangepicker({
            format: 'YYYY-MM-DD',
            singleDatePicker: true,
            showDropdowns: true
        });
    });
    /**************************************************************************/
    /**********************************Cursos**********************************/
    $('#nro_cursos').change(function(event) {
        var html='';
        cant = $(this).val();
        for (i = 0; i < cant; i++) {
            j=i+1;
            html+="<tr>"+
                '<td>'+j+'</td>'+
                '<td>'+
                        '<input type="text" class="form-control" pattern="[A-Za-z]{3,10}\s\(([0-9]{1,2})\)" name="tc_curso[]" id="tc_curso_'+j+'" value="" required data-mask >'+
                '</td>'+
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
    /**************************************************************************/
    /******************************Tipo Problema*******************************/
    $('#slct_tipo_problema_id').change(function(event) {
        $("#slct_categoria_tipo_problema_id,#slct_instituto_id").multiselect('destroy');
        var data={estado:1,porusuario:1,tipo_problema_id:this.value};
        slctGlobal.listarSlct('categoriatipoproblema','slct_categoria_tipo_problema_id','simple',null,data);
        var data={estado:1,tipo_problema_id:this.value}
        slctGlobal.listarSlct('instituto','slct_instituto_id','simple',null,data,null,'#slct_carrera_id,#slct_cs_ciclo_id,#slct_ciclo_id,#slct_ciclo_ids','I');
    });
    /**************************************************************************/
    /*************************Categoría Tipo Problema**************************/
    $('#slct_categoria_tipo_problema_id').change(function(event) {
        alumno_id=undefined;
        $("#tb_alumnos tr").removeClass("selec");
        $("#form_problemas input.grupo,#form_problemas textarea.grupo").val("");
        $("#form_problemas input.ids").val("1");
        $("#form_problemas input.grupo,#form_problemas textarea.grupo").attr("disabled","true");
        $("#form_problemas select.grupo").multiselect("disable");
        $("#form_problemas .grupog").css("display","none");

        $("#t_ciclosemestre,#t_articulos,#tb_cursos,#tb_pagos,.grupo-archivo table tbody tr").html("");

        if(this.value!=''){
            var datos={categoria_tipo_problema_id:this.value};
            $(".grupo-pago .panel-title").html("Pago de: <b>"+$(this).find("option:selected").text()+"</b>");
            Problema.Validar(ValidarHTML,datos);
        }
    });
    /**************************************************************************/
});
IngresarConyugue=function(val){
    $("#txt_le2_persona_conyugue,#txt_le2_dni_conyugue").removeAttr("readonly");
    $("#txt_le2_persona_conyugue,#txt_le2_dni_conyugue").val("");
    if( val=="2" ){
        $("#txt_le2_persona_conyugue").focus();
    }
    else{
        $("#txt_le2_persona_conyugue,#txt_le2_dni_conyugue").attr("readonly","true");
    }

}
ValidarHTML=function(datos){
    $.each(datos,function(index,data){
        $("#form_problemas .grupo-"+data.grupo).css("display","");
        $("#form_problemas .grupo-"+data.grupo+"-d").css("display","");
        if( data.campos!='' ){
            $("#form_problemas .grupo-"+data.grupo+"-d").css("display","none");
            for (var i =0; i<data.campos.split(",").length; i++) {
                $("#form_problemas .grupo-"+data.grupo+" .grupo-"+data.campos.split(",")[i]).css("display","");
                $("#form_problemas .grupo-"+data.grupo+" .grupo-"+data.campos.split(",")[i]+" input.grupo").removeAttr("disabled");
                $("#form_problemas .grupo-"+data.grupo+" .grupo-"+data.campos.split(",")[i]+" textarea.grupo").removeAttr("disabled");
                $("#form_problemas .grupo-"+data.grupo+" .grupo-"+data.campos.split(",")[i]+" select.grupo").multiselect("enable");
            }
        }
        else{
            $("#form_problemas .grupo-"+data.grupo+" input.grupo").removeAttr("disabled");
            $("#form_problemas .grupo-"+data.grupo+" select.grupo").multiselect("enable");
            $("#form_problemas .grupo-"+data.grupo+" textarea.grupo").removeAttr("disabled");
        }
        $('#form_problemas select.grupo').multiselect('deselectAll', false);
        $('#form_problemas select.grupo').multiselect('refresh');
        $('#form_problemas select.grupo').trigger('change');
    });
}
onPagos=function(event,item){
    var files = event.target.files || event.dataTransfer.files;
    if (!files.length)
      return;
    var image = new Image();
    var reader = new FileReader();
    reader.onload = (e) => {
        $('#pago_archivo'+item).val(e.target.result);
    };
    reader.readAsDataURL(files[0]);
    $('#pago_nombre'+item).val(files[0].name);
    console.log(files[0].name);
};
/******************************************************************************/
/**********************************Articulos***********************************/
AgregarArticulo=function(){
    var articulo_id=$('#slct_articulo_id option:selected').val();
    var articulo=$('#slct_articulo_id option:selected').text();
    var buscar_cargo = $('#ar_div_articulo_'+articulo_id).text();
    if (articulo_id!=='') {
        if (buscar_cargo=="") {

            var html='';
            html+="<li class='list-group-item'><div class='row'>";
            html+="<div class='col-sm-4' id='ar_div_articulo_"+articulo_id+"'><input type='hidden' name='ar_articulo_id[]' value='"+articulo_id+"'><h5>"+articulo+"</h5></div>";

            html+="<div class='col-sm-3'>";
            html+="<input type='text' class='form-control' placeholder='ingrese cantidad' name='ar_cantidad[]' id='cantidad"+articulo_id+"'></div>";
            html+="<div class='col-sm-3'>";
            html+="<input type='text' class='form-control' placeholder='ingrese descripcion' name='ar_descripcion[]' id='descripcion"+articulo_id+"'></div>";

            html+='<div class="col-sm-2">';
            html+='<button type="button" id="'+articulo_id+'" Onclick="EliminarArticulo(this)" class="btn btn-danger btn-sm" >';
            html+='<i class="fa fa-minus fa-sm"></i> </button></div>';
            html+="</div></li>";

            $("#t_articulos").append(html);
        } else 
            alert("Ya se agrego este Articulo");
    } else 
        alert("Seleccione Articulo");
};
EliminarArticulo=function(obj){
    obj.parentNode.parentNode.parentNode.remove();
};
/******************************************************************************/
/**********************************Ciclo Semestre***********************************/
AgregarCicloSemestre=function(){
    var ciclo_id=$('#slct_cs_ciclo_id option:selected').val();
    var ciclo=$('#slct_cs_ciclo_id option:selected').text();
    var buscar_cargo = $('#cs_div_ciclo_'+ciclo_id).text();
    if (ciclo_id!=='') {
        if (buscar_cargo=="") {
            var html='';
            html+="<li class='list-group-item'><div class='row'>";
            html+="<div class='col-sm-1' id='cs_div_ciclo_"+ciclo_id+"' ><input type='hidden' name='cs_ciclo_id[]' value='"+ciclo_id+"'><h5>"+ciclo+"</h5></div>";

            html+=" <div class='col-sm-3'>"+
                        "<label class='control-label'>Semestre Inicio:</label>"+
                        "<select name='slct_cs_semestre_ini_id[]' id='slct_cs_semestre_ini_id"+ciclo_id+"' class='form-control'>"+
                        "</select>"+
                    "</div>";

            html+=" <div class='col-sm-3'>"+
                        "<label class='control-label'>Semestre Final:</label>"+
                        "<select name='slct_cs_semestre_fin_id[]' id='slct_cs_semestre_fin_id"+ciclo_id+"' class='form-control'>"+
                        "</select>"+
                    "</div>";

            html+='<div class="col-sm-2">';
            html+='<button type="button" id="'+ciclo_id+'" Onclick="EliminarCicloSemestre(this)" class="btn btn-danger btn-sm" >';
            html+='<i class="fa fa-minus fa-sm"></i> </button></div>';
            html+="</div></li>";

            $("#t_ciclosemestre").append(html);
            $("#slct_cs_semestre_ini_id"+ciclo_id).html( $("#slct_semestre_ini_id").html() );
            $("#slct_cs_semestre_fin_id"+ciclo_id).html( $("#slct_semestre_fin_id").html() );
            slctGlobalHtml('slct_cs_semestre_ini_id'+ciclo_id+',#slct_cs_semestre_fin_id'+ciclo_id,'simple');
        } else 
            alert("Ya se agrego este Ciclo");
    } else 
        alert("Seleccione Ciclo");
};
EliminarCicloSemestre=function(obj){
    obj.parentNode.parentNode.parentNode.remove();
};
/******************************************************************************/
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
    var r=true;
    /****************************Problema**************************************/
    if( $.trim($("#slct_sede_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Sede",4000);
        r=false;
    }
    if( $("#slct_instituto_id").attr("disabled")==undefined && $.trim($("#slct_instituto_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Instituto",4000);
        r=false;
    }
    if( $.trim($("#slct_tipo_problema_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Problema General",4000);
        r=false;
    }
    if( $.trim($("#slct_categoria_tipo_problema_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Tipo Problema",4000);
        r=false;
    }
    if( $.trim($("#fecha_problema").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Fecha del Problema",4000);
        r=false;
    }
    if( $.trim($("#descripcion").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Descripción del Problema",4000);
        r=false;
    }
    /**************************************************************************/
    /*****************************Carrera**************************************/
    if( $("#slct_carrera_id").attr("disabled")==undefined && $.trim($("#slct_carrera_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Carrera",4000);
        r=false;
    }
    if( $("#slct_especialidad_id").attr("disabled")==undefined && $.trim($("#slct_especialidad_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Especialidad/Diploma",4000);
        r=false;
    }
    /**************************************************************************/
    /*****************************Seminario************************************/
    if( $("#txt_tema_seminario").attr("disabled")==undefined && $.trim($("#txt_tema_seminario").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Tema del Seminario",4000);
        r=false;
    }
    if( $("#txt_hora_seminario").attr("disabled")==undefined && $.trim($("#txt_hora_seminario").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Hora del Seminario",4000);
        r=false;
    }
    if( $("#txt_fecha_seminario").attr("disabled")==undefined && $.trim($("#txt_fecha_seminario").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Fecha del Seminario",4000);
        r=false;
    }
    /**************************************************************************/
    /*****************************Ciclo Semestre*******************************/
    if( $("#slct_cs_ciclo_id").attr("disabled")==undefined && r==true ){
        if( $("#t_ciclosemestre .list-group-item").length==0 ){
            Psi.mensaje("warning","Agregue almenos 1 Ciclo",4000);
            r=false;
        }
        else{
            $("#t_ciclosemestre .list-group-item").map(function(){
                if( $(this).find("select:eq(0)").val()=='' && r==true ){
                    Psi.mensaje("warning","Seleccione Semestre Inicio del ciclo "+$(this).find("h5").text(),4000);
                    r=false;
                }
                else if( $(this).find("select:eq(1)").val()=='' && r==true ){
                    Psi.mensaje("warning","Seleccione Semestre Final del ciclo "+$(this).find("h5").text(),4000);
                    r=false;
                }
            });
        }
    }
    /**************************************************************************/
    /*****************************Semestre*************************************/
    if( $("#slct_semestre_ini_id").attr("disabled")==undefined && $.trim($("#slct_semestre_ini_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Semestre Inicio",4000);
        r=false;
    }
    if( $("#slct_semestre_fin_id").attr("disabled")==undefined && $.trim($("#slct_semestre_fin_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Semestre Fin",4000);
        r=false;
    }
    /**************************************************************************/
    /*****************************Semestre2************************************/
    if( $("#slct_semestre_reserva_id").attr("disabled")==undefined && $.trim($("#slct_semestre_reserva_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Semestre a Reservar",4000);
        r=false;
    }
    if( $("#slct_semestre_reincorporarse_id").attr("disabled")==undefined && $.trim($("#slct_semestre_reincorporarse_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Semestre a Reincorporarse",4000);
        r=false;
    }
    /**************************************************************************/
    /*****************************Articulo*************************************/
    if( $("#slct_articulo_id").attr("disabled")==undefined && r==true ){
        if( $("#t_articulos .list-group-item").length==0 ){
            Psi.mensaje("warning","Agregue almenos 1 artículo",4000);
            r=false;
        }
        else{
            $("#t_articulos .list-group-item").map(function(){
                if( $(this).find("input:eq(1)").val()=='' && r==true ){
                    Psi.mensaje("warning","Ingrese Cantidad de '"+$(this).find("h5").text()+"'",4000);
                    r=false;
                }
                else if( $(this).find("input:eq(2)").val()=='' && r==true ){
                    Psi.mensaje("warning","Ingrese Descripción de '"+$(this).find("h5").text()+"'",4000);
                    r=false;
                }
            });
        }
    }
    /**************************************************************************/
    /********************************Carta*************************************/
    if( $("#txt_cp_instituto").attr("disabled")==undefined && $.trim($("#txt_cp_instituto").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Instituto",4000);
        r=false;
    }
    if( $("#txt_cp_persona").attr("disabled")==undefined && $.trim($("#txt_cp_persona").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Persona",4000);
        r=false;
    }
    if( $("#txt_cp_cargo").attr("disabled")==undefined && $.trim($("#txt_cp_cargo").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Cargo",4000);
        r=false;
    }
    if( $("#txt_cp_area").attr("disabled")==undefined && $.trim($("#txt_cp_area").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Área",4000);
        r=false;
    }
    /**************************************************************************/
    /******************************Adicional***********************************/
    if( $("#txt_ad_cambiando").attr("disabled")==undefined && $.trim($("#txt_ad_cambiando").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Cambiando",4000);
        r=false;
    }
    if( $("#txt_ad_nota").attr("disabled")==undefined && $.trim($("#txt_ad_nota").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Nota",4000);
        r=false;
    }
    if( $("#txt_diafalto").attr("disabled")==undefined && $.trim($("#txt_diafalto").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Días que falto",4000);
        r=false;
    }
    if( $("#slct_ciclo_id").attr("disabled")==undefined && $.trim($("#slct_ciclo_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Ciclo",4000);
        r=false;
    }
    if( $("#slct_ciclo_ids").attr("disabled")==undefined && $.trim($("#slct_ciclo_ids").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione almenos 1 Ciclo",4000);
        r=false;
    }
    /**************************************************************************/
    /*******************************Alumno*************************************/
    if( $("#alumno_id").attr("disabled")==undefined && $.trim($("#alumno_id").val())=='' && r==true ){
        Psi.mensaje("warning","Busque y Seleccione Alumno",4000);
        r=false;
    }
    /**************************************************************************/
    /*******************************Persona************************************/
    if( $("#persona_id").attr("disabled")==undefined && $.trim($("#persona_id").val())=='' && r==true ){
        Psi.mensaje("warning","Busque y Seleccione Persona",4000);
        r=false;
    }
    /**************************************************************************/
    /*******************************Personal***********************************/
    if( $("#slct_pe_area_id").attr("disabled")==undefined && $.trim($("#slct_pe_area_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Área",4000);
        r=false;
    }
    if( $("#txt_pe_jefe").attr("disabled")==undefined && $.trim($("#txt_pe_jefe").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Jefe",4000);
        r=false;
    }
    if( $("#txt_pe_motivo").attr("disabled")==undefined && $.trim($("#txt_pe_motivo").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Motivo",4000);
        r=false;
    }
    if( $("#txt_pe_solicita").attr("disabled")==undefined && $.trim($("#txt_pe_solicita").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese que Solicita",4000);
        r=false;
    }
    if( $("#txt_pe_fecha").attr("disabled")==undefined && $.trim($("#txt_pe_fecha").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Fecha",4000);
        r=false;
    }
    /**************************************************************************/
    /**********************************Legal***********************************/
    if( $("#slct_le_razon_id").attr("disabled")==undefined && $.trim($("#slct_le_razon_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Razon Social",4000);
        r=false;
    }
    if( $("#txt_le_observacion").attr("disabled")==undefined && $.trim($("#txt_le_observacion").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Observación",4000);
        r=false;
    }
    if( $("#slct_le_licencia_id").attr("disabled")==undefined && $.trim($("#slct_le_licencia_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Licencia",4000);
        r=false;
    }
    if( $("#slct_le_municipal_id").attr("disabled")==undefined && $.trim($("#slct_le_municipal_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Municipal",4000);
        r=false;
    }
    if( $("#slct_le_articulo_id").attr("disabled")==undefined && $.trim($("#slct_le_articulo_id").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Servicio",4000);
        r=false;
    }
    if( $("#txt_le_fecha").attr("disabled")==undefined && $.trim($("#txt_le_fecha").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Fecha de Notificación",4000);
        r=false;
    }
    if( $("#txt_le_entidad").attr("disabled")==undefined && $.trim($("#txt_le_entidad").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Nombre Entidad",4000);
        r=false;
    }
    /**************************************************************************/
    /**********************************Legal2***********************************/
    if( $("#slct_le2_tipo_persona").attr("disabled")==undefined && $.trim($("#slct_le2_tipo_persona").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Tipo Personal",4000);
        r=false;
    }
    if( $("#txt_le2_observacion").attr("disabled")==undefined && $.trim($("#txt_le2_observacion").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Observación",4000);
        r=false;
    }
    if( $("#txt_le2_persona").attr("disabled")==undefined && $.trim($("#txt_le2_persona").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Datos del Arrendador",4000);
        r=false;
    }
    if( $("#txt_le2_dni").attr("disabled")==undefined && $.trim($("#txt_le2_dni").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese DNI del Arrendador",4000);
        r=false;
    }
    if( $("#txt_le2_direccion").attr("disabled")==undefined && $.trim($("#txt_le2_direccion").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Dirección del Arrendador",4000);
        r=false;
    }
    if( $("#txt_le2_departamento").attr("disabled")==undefined && $.trim($("#txt_le2_departamento").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Departamento",4000);
        r=false;
    }
    if( $("#txt_le2_provincia").attr("disabled")==undefined && $.trim($("#txt_le2_provincia").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Provincia",4000);
        r=false;
    }
    if( $("#txt_le2_distrito").attr("disabled")==undefined && $.trim($("#txt_le2_distrito").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Distrito",4000);
        r=false;
    }
    if( $("#slct_le2_estado_civil").attr("disabled")==undefined && $.trim($("#slct_le2_estado_civil").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Estado Civil",4000);
        r=false;
    }
    if( $("#txt_le2_persona_conyugue").attr("disabled")==undefined && $.trim($("#txt_le2_persona_conyugue").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Datos del Conyugue",4000);
        r=false;
    }
    if( $("#txt_le2_dni_conyugue").attr("disabled")==undefined && $.trim($("#txt_le2_dni_conyugue").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese DNI del Conyugue",4000);
        r=false;
    }
    if( $("#txt_le2_direccion2").attr("disabled")==undefined && $.trim($("#txt_le2_direccion2").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Dirección del mueble arrendar",4000);
        r=false;
    }
    if( $("#txt_le2_tiempo_contrato").attr("disabled")==undefined && $.trim($("#txt_le2_tiempo_contrato").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Duración del contrato",4000);
        r=false;
    }
    if( $("#txt_le2_departamento2").attr("disabled")==undefined && $.trim($("#txt_le2_departamento2").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Departamento",4000);
        r=false;
    }
    if( $("#txt_le2_provincia2").attr("disabled")==undefined && $.trim($("#txt_le2_provincia2").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Provincia",4000);
        r=false;
    }
    if( $("#txt_le2_distrito2").attr("disabled")==undefined && $.trim($("#txt_le2_distrito2").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Distinto",4000);
        r=false;
    }
    /**************************************************************************/
    /*****************************Contabilidad*********************************/
    if( $("#txt_co_proveedor").attr("disabled")==undefined && $.trim($("#txt_co_proveedor").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Proveedor",4000);
        r=false;
    }
    if( $("#txt_co_recibo").attr("disabled")==undefined && $.trim($("#txt_co_recibo").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Recibo",4000);
        r=false;
    }
    if( $("#txt_co_fecha").attr("disabled")==undefined && $.trim($("#txt_co_fecha").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Fecha Notificación",4000);
        r=false;
    }
    if( $("#txt_co_observacion").attr("disabled")==undefined && $.trim($("#txt_co_observacion").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Observación",4000);
        r=false;
    }
    /**************************************************************************/
    /*******************************Logística**********************************/
    if( $("#txt_log_arrendador").attr("disabled")==undefined && $.trim($("#txt_log_arrendador").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Arrendador",4000);
        r=false;
    }
    if( $("#slct_log_moneda").attr("disabled")==undefined && $.trim($("#slct_log_moneda").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Tipo Moneda",4000);
        r=false;
    }
    if( $("#txt_log_empresa").attr("disabled")==undefined && $.trim($("#txt_log_empresa").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Empresa",4000);
        r=false;
    }
    if( $("#txt_log_ruc").attr("disabled")==undefined && $.trim($("#txt_log_ruc").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese RUC",4000);
        r=false;
    }
    if( $("#txt_log_telefono").attr("disabled")==undefined && $.trim($("#txt_log_telefono").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Teléfono",4000);
        r=false;
    }
    if( $("#txt_log_observacion").attr("disabled")==undefined && $.trim($("#txt_log_observacion").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Observación",4000);
        r=false;
    }
    if( $("#txt_log_direccion").attr("disabled")==undefined && $.trim($("#txt_log_direccion").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Dirección",4000);
        r=false;
    }
    if( $("#txt_log_personal").attr("disabled")==undefined && $.trim($("#txt_log_personal").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Personal de contacto",4000);
        r=false;
    }
    if( $("#txt_log_telpersonal").attr("disabled")==undefined && $.trim($("#txt_log_telpersonal").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Teléfono del personal de contacto",4000);
        r=false;
    }
    if( $("#txt_log_plazo").attr("disabled")==undefined && $.trim($("#txt_log_plazo").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Plazo de ejecución del servicio",4000);
        r=false;
    }
    if( $("#txt_log_multa").attr("disabled")==undefined && $.trim($("#txt_log_multa").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Tipo de Multa",4000);
        r=false;
    }
    if( $("#txt_log_impuesto").attr("disabled")==undefined && $.trim($("#txt_log_impuesto").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Tipo de Impuesto",4000);
        r=false;
    }
    if( $("#txt_log_recibo").attr("disabled")==undefined && $.trim($("#txt_log_recibo").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Recibo",4000);
        r=false;
    }
    if( $("#txt_log_suministro").attr("disabled")==undefined && $.trim($("#txt_log_suministro").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Nro Suministro",4000);
        r=false;
    }
    if( $("#txt_log_monto").attr("disabled")==undefined && $.trim($("#txt_log_monto").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Monto",4000);
        r=false;
    }
    if( $("#txt_log_comprobante").attr("disabled")==undefined && $.trim($("#txt_log_comprobante").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Tipo Comprobante",4000);
        r=false;
    }
    if( $("#txt_log_nrocomprobante").attr("disabled")==undefined && $.trim($("#txt_log_nrocomprobante").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Nro Comprobante",4000);
        r=false;
    }
    if( $("#txt_log_autorizo").attr("disabled")==undefined && $.trim($("#txt_log_autorizo").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Persona que autorizó",4000);
        r=false;
    }
    if( $("#slct_log_tipotelefono").attr("disabled")==undefined && $.trim($("#slct_log_tipotelefono").val())=='' && r==true ){
        Psi.mensaje("warning","Seleccione Tipo Teléfono",4000);
        r=false;
    }
    if( $("#txt_log_operador").attr("disabled")==undefined && $.trim($("#txt_log_operador").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Operador",4000);
        r=false;
    }
    if( $("#txt_log_cantidad").attr("disabled")==undefined && $.trim($("#txt_log_cantidad").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Cantidad",4000);
        r=false;
    }
    if( $("#txt_log_medida").attr("disabled")==undefined && $.trim($("#txt_log_medida").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Unidad de Medida",4000);
        r=false;
    }
    if( $("#txt_log_fecha").attr("disabled")==undefined && $.trim($("#txt_log_fecha").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Fecha estimada de entrega",4000);
        r=false;
    }
    /**************************************************************************/
    /*****************************Tesorería*********************************/
    if( $("#txt_te_contrato").attr("disabled")==undefined && $.trim($("#txt_te_contrato").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Quien contrató",4000);
        r=false;
    }
    if( $("#txt_te_gana").attr("disabled")==undefined && $.trim($("#txt_te_gana").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Cuanto gana",4000);
        r=false;
    }
    if( $("#txt_te_autorizo").attr("disabled")==undefined && $.trim($("#txt_te_autorizo").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Quien autorizó",4000);
        r=false;
    }
    if( $("#txt_te_mes").attr("disabled")==undefined && $.trim($("#txt_te_mes").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Mes que se le debe",4000);
        r=false;
    }
    if( $("#txt_te_nrocta").attr("disabled")==undefined && $.trim($("#txt_te_nrocta").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Nro de Cuenta",4000);
        r=false;
    }
    if( $("#txt_te_banco").attr("disabled")==undefined && $.trim($("#txt_te_banco").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Nombre del Banco",4000);
        r=false;
    }
    /**************************************************************************/
    /******************************Tesorería 2*********************************/
    if( $("#txt_te2_para").attr("disabled")==undefined && $.trim($("#txt_te2_para").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Para",4000);
        r=false;
    }
    if( $("#txt_te2_area").attr("disabled")==undefined && $.trim($("#txt_te2_area").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Área",4000);
        r=false;
    }
    if( $("#txt_te2_ode").attr("disabled")==undefined && $.trim($("#txt_te2_ode").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Ode",4000);
        r=false;
    }
    if( $("#txt_te2_cajero").attr("disabled")==undefined && $.trim($("#txt_te2_cajero").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Nombre del cajero",4000);
        r=false;
    }
    if( $("#txt_te2_cantidad").attr("disabled")==undefined && $.trim($("#txt_te2_cantidad").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Cantidad",4000);
        r=false;
    }
    if( $("#txt_te2_empresa").attr("disabled")==undefined && $.trim($("#txt_te2_empresa").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Empresa",4000);
        r=false;
    }
    if( $("#txt_te2_ultboleta").attr("disabled")==undefined && $.trim($("#txt_te2_ultboleta").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Nro de última boleta de venta",4000);
        r=false;
    }
    if( $("#txt_te2_enviar").attr("disabled")==undefined && $.trim($("#txt_te2_enviar").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese a enviar por",4000);
        r=false;
    }
    if( $("#txt_te2_fecha").attr("disabled")==undefined && $.trim($("#txt_te2_fecha").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese fecha y hora aproximado de envio",4000);
        r=false;
    }
    if( $("#txt_te2_adicional").attr("disabled")==undefined && $.trim($("#txt_te2_adicional").val())=='' && r==true ){
        Psi.mensaje("warning","Ingrese Información adicional",4000);
        r=false;
    }
    /**************************************************************************/
    /*******************************Cursos*************************************/
    if( $("#nro_cursos").attr("disabled")==undefined && r==true ){
        if( $("#tb_cursos tr").length==0 ){
            Psi.mensaje("warning","Agregue almenos 1 curso/tema",4000);
            r=false;
        }
        else{
            $("#tb_cursos tr").map(function(){
                if( $(this).find("input:eq(0)").val()=='' && r==true ){
                    Psi.mensaje("warning","Ingrese Tema del item '"+$(this).find("td:eq(0)").text()+"'",4000);
                    r=false;
                }
                else if( $(this).find("input:eq(1)").val()=='' && r==true ){
                    Psi.mensaje("warning","Ingrese Frecuencia del item '"+$(this).find("td:eq(0)").text()+"'",4000);
                    r=false;
                }
                else if( $(this).find("input:eq(2)").val()=='' && r==true ){
                    Psi.mensaje("warning","Ingrese Horario del item '"+$(this).find("td:eq(0)").text()+"'",4000);
                    r=false;
                }
                else if( $(this).find("input:eq(3)").val()=='' && r==true ){
                    Psi.mensaje("warning","Ingrese Profesor del item '"+$(this).find("td:eq(0)").text()+"'",4000);
                    r=false;
                }
                else if( $(this).find("input:eq(4)").val()=='' && r==true ){
                    Psi.mensaje("warning","Ingrese Fecha Inicio del item '"+$(this).find("td:eq(0)").text()+"'",4000);
                    r=false;
                }
                else if( $(this).find("input:eq(5)").val()=='' && r==true ){
                    Psi.mensaje("warning","Ingrese Fecha Fin del item '"+$(this).find("td:eq(0)").text()+"'",4000);
                    r=false;
                }
                else if( $(this).find("input:eq(6)").val()=='' && r==true ){
                    Psi.mensaje("warning","Ingrese Nota del item '"+$(this).find("td:eq(0)").text()+"'",4000);
                    r=false;
                }
            });
        }
    }
    /**************************************************************************/
    /********************************Pagos*************************************/
    if( $("#nro_pagos").attr("disabled")==undefined && r==true ){
        if( $("#tb_pagos tr").length==0 ){
            Psi.mensaje("warning","Agregue almenos 1 pago",4000);
            r=false;
        }
        else{
            $("#tb_pagos tr").map(function(){
                if( $(this).find("input:eq(0)").val()=='' && r==true ){
                    Psi.mensaje("warning","Ingrese Fecha de Pago del item '"+$(this).find("td:eq(0)").text()+"'",4000);
                    r=false;
                }
                else if( $(this).find("input:eq(1)").val()=='' && r==true ){
                    Psi.mensaje("warning","Ingrese Recibo de Pago del item '"+$(this).find("td:eq(0)").text()+"'",4000);
                    r=false;
                }
                else if( $(this).find("input:eq(2)").val()=='' && r==true ){
                    Psi.mensaje("warning","Ingrese Monto de Pago del item '"+$(this).find("td:eq(0)").text()+"'",4000);
                    r=false;
                }
            });
        }
    }
    /**************************************************************************/
    /********************************Pagos*************************************/
    if( $(".grupo-archivo table tbody tr").length>0 && r==true ){
        $(".grupo-archivo table tbody tr").map(function(){
            if( $(this).find("input:eq(0)").val()=='' && r==true ){
                Psi.mensaje("warning","Ingrese Nombre del Archivo",4000);
                r=false;
            }
            else if( $(this).find("input:eq(1)").val()=='' && r==true ){
                Psi.mensaje("warning","Busque y Seleccione Archivo",4000);
                r=false;
            }
        });
    }
    /**************************************************************************/
    return r;
};
Guardar=function(){
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
        if(a[i]==false){
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
            "<td>"+data.codigo+"</td>"+
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
personasHTML=function(datos){
    AlumnosObj=datos;
    $('#t_personas').dataTable().fnDestroy();
    var sexo='Masculino', html='';
    $.each(datos,function(index,data){

        estado='onClick="seleccionarp('+data.id+',this)"';
        html+="<tr "+estado+" >"+
            "<td>"+data.paterno+"</td>"+
            "<td>"+data.materno+"</td>"+
            "<td>"+data.nombre+"</td>"+
            "<td>"+data.sexo+"</td>"+
            "<td>"+data.email+"</td>"+
            "<td>"+data.telefono+"</td>";
        html+="</tr>";
    });
    $("#tb_personas").html(html);
    $("#t_personas").dataTable();
};
seleccionar=function(id,tr){
    if(alumno_id!==id){
        if ($( tr ).hasClass( "selec" )) {
            $(tr).removeClass("selec");
            alumno_id=undefined;
            return;
        }
        alumno_id=id;
        $("#alumno_id").val(alumno_id);

        var trs = tr.parentNode.children;
        for(var i =0;i<trs.length;i++)
            $(trs[i]).removeClass("selec");

        $(tr).addClass( "selec" );
    }
};
seleccionarp=function(id,tr){
    if(persona_id!==id){
        if ($( tr ).hasClass( "selec" )) {
            $(tr).removeClass("selec");
            persona_id=undefined;
            return;
        }
        persona_id=id;
        $("#persona_id").val(persona_id);

        var trs = tr.parentNode.children;
        for(var i =0;i<trs.length;i++)
            $(trs[i]).removeClass("selec");

        $(tr).addClass( "selec" );
    }
};
limpiar=function(){
    $('#slct_categoria_tipo_problema_id,#slct_tipo_problema_id').multiselect('deselectAll', false);
    $('#slct_categoria_tipo_problema_id,#slct_tipo_problema_id').multiselect('refresh');
    $('#slct_categoria_tipo_problema_id,#slct_tipo_problema_id').trigger('change');

    alumno_id=undefined;
    $("#tb_alumnos tr").removeClass("selec");
    $("#form_problemas input.grupo").val("");
    $("#form_problemas input.grupo").attr("disabled","true");
    $("#form_problemas select.grupo").multiselect("disable");
    $("#form_problemas .grupog").css("display","none");
    $("#t_ciclosemestre,#t_articulos,#tb_cursos,#tb_pagos,.grupo-archivo table tbody tr").html("");

    $('#fecha_problema').val('<?php echo date("Y-m-d H:i");?>');
    $('#descripcion').val('');
    alumno_id=undefined;
};
</script>
