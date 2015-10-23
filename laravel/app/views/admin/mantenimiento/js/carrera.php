<script type="text/javascript">
$(document).ready(function() {  
    Carreras.CargarCarreras(activarTabla);

    $('#carreraModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // captura al boton
      var titulo = button.data('titulo'); // extrae del atributo data-
      var carrera_id = button.data('id');
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this); //captura el modal
      modal.find('.modal-title').text(titulo+' Carrera');
      $('#form_carreras [data-toggle="tooltip"]').css("display","none");
      $("#form_carreras input[type='hidden']").remove();

        if(titulo=='Nuevo'){

            modal.find('.modal-footer .btn-primary').text('Guardar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
            $('#form_carreras #slct_estado').val(1); 
            $('#form_carreras #slct_tipo_carrera').val(''); 
            $('#form_carreras #txt_nombre').focus();
        }
        else{
            var id = CarreraObj[carrera_id].id;

            modal.find('.modal-footer .btn-primary').text('Actualizar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');
            $('#form_carreras #txt_nombre').val( CarreraObj[carrera_id].nombre );
            $('#form_carreras #slct_tipo_carrera').val( CarreraObj[carrera_id].tipo_carrera_id );
            $('#form_carreras #slct_estado').val( CarreraObj[carrera_id].estado );
            $("#form_carreras").append("<input type='hidden' value='"+id+"' name='id'>");
        }
    });

    $('#carreraModal').on('hide.bs.modal', function (event) {
        var modal = $(this); //captura el modal
        modal.find('.modal-body input').val(''); // busca un input para copiarle texto
    });
});
beforeSubmit=function (){};
        success=function (){};
activarTabla=function(){
    $("#t_carreras").dataTable(); // inicializo el datatable    
};

Editar=function(){
    if(validaCarreras()){
        Carreras.AgregarEditarCarrera(1);
    }
};

activar=function(id){
    Carreras.CambiarEstadoCarreras(id,1);
};
HTMLCargarCarrera=function(datos){
    var html="", estadohtml="";
    $('#t_carreras').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        estadohtml='<span id="'+data.id+'" onClick="activar('+data.id+')" class="btn btn-danger">Inactivo</span>';
        if(data.estado==1){
            estadohtml='<span id="'+data.id+'" onClick="desactivar('+data.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr>"+
            "<td>"+data.nombre+"</td>"+
            "<td>"+data.tipo+"</td>"+
            "<td id='estado_"+data.id+"' data-estado='"+data.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#carreraModal" data-id="'+index+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i> </a></td>';

        html+="</tr>";
    });
    $("#tb_carreras").html(html);
    activarTabla();
};

desactivar=function(id){
    Carreras.CambiarEstadoCarreras(id,0);
};

Agregar=function(){
    if(validaCarreras()){
        Carreras.AgregarEditarCarrera(0);
    }
};

validaCarreras=function(){
    $('#form_carreras [data-toggle="tooltip"]').css("display","none");
    var a=[];
    a[0]=valida("txt","nombre","");
    a[1]=valida("slct","tipo_carrera","");
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
</script>
