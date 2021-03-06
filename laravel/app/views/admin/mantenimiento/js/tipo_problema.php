<script type="text/javascript">
$(document).ready(function() {  
    TipoProblema.CargarTipoProblema(activarTabla);
    var data={estado:1};
    slctGlobal.listarSlct2('lista/instituto','slct_instituto','multiple',null,data);

    $('#tipoproblemaModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // captura al boton
      var titulo = button.data('titulo'); // extrae del atributo data-
      var tipoproblema_id = button.data('id');
    $('#slct_instituto').multiselect('deselectAll', false);
    $('#slct_instituto').multiselect('destroy');
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this); //captura el modal
      modal.find('.modal-title').text(titulo+' TipoProblema');
      $('#form_tipoproblema [data-toggle="tooltip"]').css("display","none");
      $("#form_tipoproblema input[type='hidden']").remove();

        if(titulo=='Nuevo'){

            modal.find('.modal-footer .btn-primary').text('Guardar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
            $('#form_tipoproblema #slct_estado').val(1); 
            $('#form_tipoproblema #txt_nombre').focus();
            slctGlobalHtml('slct_instituto','multiple');
        }
        else{
            var id = TipoProblemaObj[tipoproblema_id].id;

            modal.find('.modal-footer .btn-primary').text('Actualizar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');
            $('#form_tipoproblema #txt_nombre').val( TipoProblemaObj[tipoproblema_id].nombre );
            $('#form_tipoproblema #slct_estado').val( TipoProblemaObj[tipoproblema_id].estado );
            $("#form_tipoproblema").append("<input type='hidden' value='"+id+"' name='id'>");
            if( TipoProblemaObj[tipoproblema_id].instituto_ids!='' ){
                slctGlobalHtml('slct_instituto','multiple',TipoProblemaObj[tipoproblema_id].instituto_ids.split(","));
            }
            else{
                slctGlobalHtml('slct_instituto','multiple');
            }
        }
    });

    $('#tipoproblemaModal').on('hide.bs.modal', function (event) {
        var modal = $(this); //captura el modal
        modal.find('.modal-body input').val(''); // busca un input para copiarle texto
    });
});
beforeSubmit=function (){};
success=function (){};
        
activarTabla=function(){
    $("#t_tipoproblema").dataTable(); // inicializo el datatable    
};

Editar=function(){
    if(validaTipoProblema()){
        TipoProblema.AgregarEditarTipoProblema(1);
    }
};

activar=function(id){
    TipoProblema.CambiarEstadoTipoProblema(id,1);
};

HTMLCargarTipoProblema=function(datos){
    var html="", estadohtml="";
    $('#t_tipoproblema').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        estadohtml='<span id="'+data.id+'" onClick="activar('+data.id+')" class="btn btn-danger">Inactivo</span>';
        if(data.estado==1){
            estadohtml='<span id="'+data.id+'" onClick="desactivar('+data.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr>"+
            "<td>"+data.nombre+"</td>"+
            "<td id='estado_"+data.id+"' data-estado='"+data.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tipoproblemaModal" data-id="'+index+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i> </a></td>';

        html+="</tr>";
    });
    $("#tb_tipoproblema").html(html);
    activarTabla();
};

desactivar=function(id){
    TipoProblema.CambiarEstadoTipoProblema(id,0);
};

Agregar=function(){
    if(validaTipoProblema()){
        TipoProblema.AgregarEditarTipoProblema(0);
    }
};

validaTipoProblema=function(){
    $('#form_tipoproblema [data-toggle="tooltip"]').css("display","none");
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
</script>
