<script type="text/javascript">
$(document).ready(function() {  
    Municipalidades.CargarMunicipalidades(activarTabla);

    $('#municipalidadModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // captura al boton
      var titulo = button.data('titulo'); // extrae del atributo data-
      var municipalidad_id = button.data('id');
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this); //captura el modal
      modal.find('.modal-title').text(titulo+' Municipalidad');
      $('#form_municipalidades [data-toggle="tooltip"]').css("display","none");
      $("#form_municipalidades input[type='hidden']").remove();

        if(titulo=='Nueva'){

            modal.find('.modal-footer .btn-primary').text('Guardar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
            $('#form_municipalidades #slct_estado').val(1); 
            $('#form_municipalidades #txt_nombre').focus();
        }
        else{
            var id = MunicipalidadObj[municipalidad_id].id;

            modal.find('.modal-footer .btn-primary').text('Actualizar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');
            $('#form_municipalidades #txt_nombre').val( MunicipalidadObj[municipalidad_id].nombre );
            $('#form_municipalidades #slct_estado').val( MunicipalidadObj[municipalidad_id].estado );
            $("#form_municipalidades").append("<input type='hidden' value='"+id+"' name='id'>");
        }
    });

    $('#municipalidadModal').on('hide.bs.modal', function (event) {
        var modal = $(this); //captura el modal
        modal.find('.modal-body input').val(''); // busca un input para copiarle texto
    });
});
beforeSubmit=function (){};
        success=function (){};
activarTabla=function(){
    $("#t_municipalidades").dataTable(); // inicializo el datatable    
};

Editar=function(){
    if(validaMunicipalidades()){
        Municipalidades.AgregarEditarMunicipalidad(1);
    }
};

activar=function(id){
    Municipalidades.CambiarEstadoMunicipalidades(id,1);
};
HTMLCargarMunicipalidad=function(datos){
    var html="", estadohtml="";
    $('#t_municipalidades').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        estadohtml='<span id="'+data.id+'" onClick="activar('+data.id+')" class="btn btn-danger">Inactivo</span>';
        if(data.estado==1){
            estadohtml='<span id="'+data.id+'" onClick="desactivar('+data.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr>"+
            "<td>"+data.nombre+"</td>"+
            "<td id='estado_"+data.id+"' data-estado='"+data.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#municipalidadModal" data-id="'+index+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i> </a></td>';

        html+="</tr>";
    });
    $("#tb_municipalidades").html(html);
    activarTabla();
};

desactivar=function(id){
    Municipalidades.CambiarEstadoMunicipalidades(id,0);
};

Agregar=function(){
    if(validaMunicipalidades()){
        Municipalidades.AgregarEditarMunicipalidad(0);
    }
};

validaMunicipalidades=function(){
    $('#form_municipalidades [data-toggle="tooltip"]').css("display","none");
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
