<script type="text/javascript">
$(document).ready(function() {  
    CategoriaTipoProblema.CargarCategoriaTipoProblema(activarTabla);
    var datos={estado:1};
    slctGlobal.listarSlct('tipoproblema','slct_tipo_problema','simple',null,datos);
    
    $('#categoriatipoproblemaModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // captura al boton
      var titulo = button.data('titulo'); // extrae del atributo data-
      var sede_id = button.data('id');
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this); //captura el modal
      modal.find('.modal-title').text(titulo+' Categoria Tipo Problema');
      $('#form_categoria_tipo_problemas [data-toggle="tooltip"]').css("display","none");
      $("#form_categoria_tipo_problemas input[type='hidden']").remove();

        if(titulo=='Nueva'){

            modal.find('.modal-footer .btn-primary').text('Guardar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
            $('#form_categoria_tipo_problemas #slct_estado').val(1); 
            $('#form_categoria_tipo_problemas #txt_nombre').focus();
        }
        else{
            var id = SedeObj[sede_id].id;

            modal.find('.modal-footer .btn-primary').text('Actualizar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');
            $('#form_categoria_tipo_problemas #txt_nombre').val( SedeObj[sede_id].nombre );
            $('#form_categoria_tipo_problemas #slct_estado').val( SedeObj[sede_id].estado );
            $('#form_categoria_tipo_problemas #slct_tipo_problema').val( SedeObj[sede_id].tipo_problema_id );
            $("#form_categoria_tipo_problemas").append("<input type='hidden' value='"+id+"' name='id'>");
        }
        
    });

    $('#categoriatipoproblemaModal').on('hide.bs.modal', function (event) {
        var modal = $(this); //captura el modal
        modal.find('.modal-body input').val(''); // busca un input para copiarle texto
        $('#form_categoria_tipo_problemas select').val('');
    });
});
beforeSubmit=function (){};
        success=function (){};
activarTabla=function(){
    $("#t_categoria_tipo_problemas").dataTable(); // inicializo el datatable    
};

Editar=function(){
    if(validaSedes()){
        CategoriaTipoProblema.AgregarEditarCategoriaTipoProblema(1);
    }
};

activar=function(id){
    CategoriaTipoProblema.CambiarEstadoCategoriaTipoProblema(id,1);
};
HTMLCargarCategoriaTipoProblema=function(datos){
    var html="", estadohtml="";
    $('#t_categoria_tipo_problemas').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        estadohtml='<span id="'+data.id+'" onClick="activar('+data.id+')" class="btn btn-danger">Inactivo</span>';
        if(data.estado==1){
            estadohtml='<span id="'+data.id+'" onClick="desactivar('+data.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr>"+
            "<td>"+data.nombre+"</td>"+
            "<td>"+data.tipo_problema+"</td>"+
            "<td id='estado_"+data.id+"' data-estado='"+data.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#categoriatipoproblemaModal" data-id="'+index+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i> </a></td>';

        html+="</tr>";
    });
    $("#tb_categoria_tipo_problemas").html(html);
    activarTabla();
};

desactivar=function(id){
    CategoriaTipoProblema.CambiarEstadoCategoriaTipoProblema(id,0);
};

Agregar=function(){
    if(validaSedes()){
        CategoriaTipoProblema.AgregarEditarCategoriaTipoProblema(0);
    }
};

validaSedes=function(){
    $('#form_categoria_tipo_problemas [data-toggle="tooltip"]').css("display","none");
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
