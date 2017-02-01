<script type="text/javascript">
$(document).ready(function() {
    $('.fecha').daterangepicker({
        format: 'YYYY-MM-DD',
        singleDatePicker: true,
        showDropdowns: true
    });

    var data={porusuario:1,estado:1}
    slctGlobal.listarSlct2('tipoproblema/listargrupo','slct_tipo_problema','multiplegrupo',null,data);

    /*var data={porusuario:1,estado:1};
    slctGlobal.listarSlct('tipoproblema','slct_tipo_problema','multiple',null,data);*/

    data={estado:1};
    slctGlobal.listarSlct('lista/sedepersona','slct_sede','multiple');
    slctGlobal.listarSlct('lista/estadoproblemaestado','slct_estado','multiple',null,data);

    data={estado_problema: 0};

    $("#buscar").click(mostrar);
    /*//Problemas.Cargar();
    //slct_estado_problema_id
    
    var funcionSede={ change:SedeChange};
    var funcionTipo={ change:TipoChange};
    slctGlobal.listarSlct('lista/sedepersona','slct_sede','multiple',null,ids,null,null,null,null,null,funcionSede);
    slctGlobal.listarSlct('lista/tipoproblema','slct_tipo_problema','multiple',null,ids,null,null,null,null,null,funcionTipo);
    */
    slctGlobal.listarSlct('lista/estadoproblemaestado','slct_estado_problema_id','simple',null,data);
    $('#problemaModal').on('show.bs.modal', function (event) {
        $('#fecha_estado').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            timePicker24Hour: false,
            format: 'YYYY-MM-DD HH:mm',
            showDropdowns: true
        });
        var button = $(event.relatedTarget);
        //var titulo = button.data('titulo');
        var id = button.data('id');
        var problema_id= ProblemaObj[id].id;
        var estado_problema_id= ProblemaObj[id].estado_problema_id;
        var datos={problema_id:problema_id};
        Problemas.CargarDetalle(datos);

        var modal = $(this); //captura el modal
        modal.find('.modal-title').text(' Atencion');
        $('#form_problemas [data-toggle="tooltip"]').css("display","none");
        $("#form_problemas input[type='hidden']").remove();
        $("#form_problemas input[type='text'],#form_problemas textarea").val('');
        //create
        modal.find('.modal-footer .btn-primary').text('Actualizar');
        modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
        //ProblemaObj[id]
        $('#form_problemas #l_sede').html( ProblemaObj[id].sede );
        $('#form_problemas #l_tipo_problema').html( ProblemaObj[id].tipo_problema );
        $('#form_problemas #l_descripcion').html( ProblemaObj[id].descripcion );
        $('#form_problemas #l_fecha_problema').html( ProblemaObj[id].fecha_problema );
        $("#form_problemas").append("<input type='hidden' value='"+problema_id+"' name='problema_id'>");
        //cargar tablas
        if (estado_problema_id==2) {//atendiendo
            $('#campos_editables').css('display','');
            $('#b_footer').css('display','');
        } else {
            //ocultar edicion
            $('#campos_editables').css('display','none');
            $('#b_footer').css('display','none');
        }
    });
    $('#problemaModal').on('hide.bs.modal', function (event) {
        var modal = $(this);
        modal.find('.modal-body input').val('');
        $('#form_problemas #slct_estado_problema_id').multiselect('deselectAll', false);
        $('#form_problemas #slct_estado_problema_id').multiselect('rebuild');
        $('#form_problemas #slct_estado_problema_id').multiselect('refresh');
    });
});

mostrar=function(){
    var datos=$("#solucion").serialize().split("txt_").join("").split("slct_").join("");
    Problemas.Filtro(HTMLCargar,datos);
};
/*SedeChange=function(){
    var selec_sede = $('#slct_sede').val();
    var selec_tipo = $('#slct_tipo_problema').val();
    filtrarProblemas(selec_sede, selec_tipo);
};
TipoChange=function(){
    var selec_sede = $('#slct_sede').val();
    var selec_tipo = $('#slct_tipo_problema').val();
    filtrarProblemas(selec_sede, selec_tipo);
};
filtrarProblemas=function(sede, tipo)
{
    var data={sede:sede,tipo:tipo};
    Problemas.Filtro(data);
};*/
Agregar=function(){
    var datos=$("#form_problemas").serialize().split("txt_").join("").split("slct_").join("");
    Problemas.Crear(mostrar,datos);
};
HTMLCargar=function(datos){
    var html="";
    $('#t_problemas').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        estado_problema=data.estado_problema;
        clase =data.clase_boton;
        //habilitar la solucion para atendido (2)
        var modal;
        if (data.estado_problema_id==1) {
            modal='<a class="btn btn-primary disabled" data-id="'+index+'">Solucionar </a></td>';
        } else if (data.estado_problema_id==2) {//atendido
            modal='<a class="btn btn-primary" data-toggle="modal" data-target="#problemaModal" data-id="'+index+'">Solucionar </a></td>';
        } else {
            modal='<a class="btn btn-primary" data-toggle="modal" data-target="#problemaModal" data-id="'+index+'"> Ver </a></td>';
        }
        //solo para estado en espera (1)
        if (clase==='undefined' || clase===undefined) {
            clase='default';
        }
        if(data.estado_problema_id==1){
            estadohtml='<span onClick="CambiarEstado('+data.id+')" class="texto btn btn-'+clase+'">'+estado_problema+'</span>';
        } else {
            estadohtml='<span class="btn btn-'+clase+' disabled">'+estado_problema+'</span>';
        }
        html+="<tr>"+
            "<td>"+(index+1)+' '+"</td>"+
            "<td>"+data.sede+' '+"</td>"+
            "<td>"+data.tipo_problema+"</td>"+
            "<td>"+data.categoria_tipo_problema+"</td>"+
            "<td>"+data.descripcion+"</td>"+
            "<td>"+data.fecha_problema+"</td>"+
            "<td>"+data.fecha_registro+"</td>"+
            "<td>"+estadohtml+"</td>"+
            '<td>'+modal+'</td>';
        html+="</tr>";
    });
    $("#tb_problemas").html(html);
    $("#t_problemas").dataTable();
};
HTMLCargarDetalle=function(datos){
    var html='';
    if (datos.detalle!==undefined && datos.detalle!=='undefined') {
        $.each(datos.detalle, function(index, val) {
            html+="<tr><td>"+(index+1)+"</td>";
            html+="<td>"+val.resultado+"</td>";
            html+="<td><span class='btn btn-"+val.clase_boton+" disabled'>"+val.estado+"</span></td>";
            html+="<td>"+val.created_at+"</td>";
            html+="</tr>";
        });
    }
    $('#tb_detalle').html(html);
    html='';
    if (datos.alumno!==undefined && datos.alumno!=='undefined') {
        $.each(datos.alumno, function(index, val) {

            html+="<div class='col-sm-12'>";
            html+="<div class='col-sm-6'><label>Alumno: &nbsp</label>"+val.alumno+"</div>";
            html+="<div class='col-sm-4'><label>Carrera: &nbsp</label>"+val.carrera+"</div>";
            html+="</div>";
        });
        $('#alumno').css('display','');
    } else {
        $('#alumno').css('display','none');
    }
    $('#alumno').html(html);
    html='';
    if (datos.nota!==undefined && datos.nota!=='undefined') {
        $.each(datos.nota, function(index, val) {
            //val.  console.log();
            html+="<tr><td>"+(index+1)+"</td>";
            html+="<td>"+val.curso+"</td>";
            html+="<td>"+val.frecuencia+"</td>";
            html+="<td>"+val.hora+"</td>";
            html+="<td>"+val.profesor+"</td>";
            html+="<td>"+val.fecha_inicio+"</td>";
            html+="<td>"+val.fecha_fin+"</td>";
            html+="<td>"+val.nota+"</td>";
            html+="</tr>";
        });
        $('#div_notas').css('display','');
    } else {
        $('#div_notas').css('display','none');
    }
    $('#tb_notas').html(html);
    html='';
    if (datos.pago!==undefined && datos.pago!=='undefined') {
        $.each(datos.pago, function(index, val) {
            //val.   console.log();
            html+="<tr><td>"+(index+1)+"</td>";
            html+="<td>"+val.fecha+"</td>";
            html+="<td>"+val.recibo+"</td>";
            html+="<td>"+val.monto+"</td>";
            if( $.trim(val.ruta_archivo)!=''){
                html+="<td><a class='btn bg-navy btn-sm' href='"+val.ruta_archivo+"' TARGET='_blank'><i class='fa fa-cloud-download'></i></a></td>";
            }
            else{
                html+="<td>&nbsp;</td>";
            }
            html+="</tr>";
        });
        $('#div_pagos').css('display','');
    } else {
        $('#div_pagos').css('display','none');
    }
    $('#tb_pagos').html(html);
    html='';
    if (datos.archivo!==undefined && datos.archivo!=='undefined') {
        $.each(datos.archivo, function(index, val) {
            //val.   console.log();
            html+="<tr><td>"+(index+1)+"</td>";
            html+="<td>"+val.nombre_archivo+"</td>";
            html+="<td><a class='btn bg-navy btn-sm' href='"+val.ruta_archivo+"' TARGET='_blank'><i class='fa fa-cloud-download'></i></a></td>";
            html+="</tr>";
        });
        $('#div_archivos').css('display','');
    } else {
        $('#div_archivos').css('display','none');
    }
    $('#tb_archivos').html(html);
};

CambiarEstado=function(id){
    $("#form_problemas input[type='hidden']").remove();
    f = new Date();
    var fecha=f.getFullYear()+"-"+(f.getMonth() +1)+"-"+f.getDate()+" "+f.getHours()+":"+f.getMinutes()+":00";
    var resultado = "actualizado a atendido";
    $("#form_problemas").append("<input type='hidden' value='"+resultado+"' name='resultado'>");
    $("#form_problemas").append("<input type='hidden' value='"+id+"' name='problema_id'>");
    $("#form_problemas").append("<input type='hidden' value='"+fecha+"' name='fecha_estado'>");
    $("#form_problemas").append("<input type='hidden' value='2' name='estado_problema_id'>");//atendido
    datos = $("#form_problemas").serialize();
    Problemas.Crear(mostrar,datos);
};
</script>
