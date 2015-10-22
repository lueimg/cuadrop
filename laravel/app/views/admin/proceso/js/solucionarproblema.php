<script type="text/javascript">
$(document).ready(function() {
    Problemas.Cargar();
    $('#problemaModal').on('show.bs.modal', function (event) {
        $('#fecha_estado').daterangepicker({
            singleDatePicker: true,
            timePicker: true,
            timePicker24Hour: true,
            format: 'YYYY-MM-DD HH:mm'
        });
        var button = $(event.relatedTarget);
        //var titulo = button.data('titulo');
        var id = button.data('id');
        var modal = $(this); //captura el modal
        modal.find('.modal-title').text(' Solucion');
        $('#form_problemas [data-toggle="tooltip"]').css("display","none");
        $("#form_problemas input[type='hidden']").remove();
        //create
        modal.find('.modal-footer .btn-primary').text('Actualizar');
        modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
        //ProblemaObj[id]
        $('#form_problemas #l_sede').html( ProblemaObj[id].sede );
        $('#form_problemas #l_tipo_problema').html( ProblemaObj[id].tipo_problema );
        $('#form_problemas #l_descripcion').html( ProblemaObj[id].descripcion );
        $("#form_problemas").append("<input type='hidden' value='"+ProblemaObj[id].id+"' name='problema_id'>");
    });
    $('#problemaModal').on('hide.bs.modal', function (event) {
        var modal = $(this);
        modal.find('.modal-body input').val('');
    });
});
Agregar=function(){
    var datos=$("#form_problemas").serialize().split("txt_").join("").split("slct_").join("");
    Problemas.Crear();
};
HTMLCargar=function(datos){
    var html="";
    $('#t_problemas').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        //solo para estado en espera =1
        estado_problema=data.estado_problema;
        clase =data.clase_boton;
        if (clase==='undefined' || clase===undefined) {
            clase='default';
        }
        if(data.estado_problema_id==1){
            estadohtml='<span onClick="CambiarEstado('+data.id+')" class="btn btn-'+clase+'">'+estado_problema+'</span>';
        } else {
            estadohtml='<span class="btn btn-'+clase+' disabled">'+estado_problema+'</span>';
        }
        html+="<tr>"+
            "<td>"+(index+1)+' '+"</td>"+
            "<td>"+data.sede+' '+"</td>"+
            "<td>"+data.tipo_problema+"</td>"+
            "<td>"+data.descripcion+"</td>"+
            "<td>"+data.fecha_registro+"</td>"+
            "<td>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#problemaModal" data-id="'+index+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i> </a></td>';

        html+="</tr>";
    });
    $("#tb_problemas").html(html);
    $("#t_problemas").dataTable();
};
CambiarEstado=function(id){
    $("#form_problemas input[type='hidden']").remove();
    f = new Date();
    var fecha=f.getFullYear()+"-"+(f.getMonth() +1)+"-"+f.getDate()+" "+f.getHours()+":"+f.getMinutes()+":00";
    var resultado = "actualizado a atendido";
    $("#form_problemas").append("<input type='hidden' value='"+resultado+"' name='resultado'>");
    $("#form_problemas").append("<input type='hidden' value='"+id+"' name='problema_id'>");
    $("#form_problemas").append("<input type='hidden' value='"+fecha+"' name='fecha_estado'>");
    datos = $("#form_problemas").serialize();
    Problemas.Crear(datos);
};
</script>
