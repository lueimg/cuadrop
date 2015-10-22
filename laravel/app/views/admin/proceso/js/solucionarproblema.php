<script type="text/javascript">
$(document).ready(function() {
    Problemas.Cargar(activarTabla);
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
activarTabla=function(){
    $("#t_problemas").dataTable();
};
Agregar=function(){
    Problemas.Crear();
};
HTMLCargar=function(datos){
    var html="";
    $('#t_problemas').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        html+="<tr>"+
            "<td >"+(index+1)+' '+"</td>"+
            "<td >"+data.sede+' '+"</td>"+
            "<td >"+data.tipo_problema+"</td>"+
            "<td >"+data.descripcion+"</td>"+
            "<td >"+data.fecha_registro+"</td>"+
            "<td >"+data.estado+"</td>"+
            '<td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#problemaModal" data-id="'+index+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i> </a></td>';

        html+="</tr>";
    });
    $("#tb_problemas").html(html);
    activarTabla();
};
</script>
