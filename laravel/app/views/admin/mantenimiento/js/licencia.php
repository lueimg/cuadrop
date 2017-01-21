<script type="text/javascript">
$(document).ready(function() {  
    Licencias.CargarLicencias(activarTabla);

    $('#licenciaModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // captura al boton
      var titulo = button.data('titulo'); // extrae del atributo data-
      var licencia_id = button.data('id');
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this); //captura el modal
      modal.find('.modal-title').text(titulo+' Licencia');
      $('#form_licencias [data-toggle="tooltip"]').css("display","none");
      $("#form_licencias input[type='hidden']").remove();

        if(titulo=='Nueva'){

            modal.find('.modal-footer .btn-primary').text('Guardar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
            $('#form_licencias #slct_estado').val(1); 
            $('#form_licencias #txt_nombre').focus();
        }
        else{
            var id = LicenciaObj[licencia_id].id;

            modal.find('.modal-footer .btn-primary').text('Actualizar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');
            $('#form_licencias #txt_nombre').val( LicenciaObj[licencia_id].nombre );
            $('#form_licencias #slct_estado').val( LicenciaObj[licencia_id].estado );
            $("#form_licencias").append("<input type='hidden' value='"+id+"' name='id'>");
        }
    });

    $('#licenciaModal').on('hide.bs.modal', function (event) {
        var modal = $(this); //captura el modal
        modal.find('.modal-body input').val(''); // busca un input para copiarle texto
    });
});
beforeSubmit=function (){};
        success=function (){};
activarTabla=function(){
    $("#t_licencias").dataTable(); // inicializo el datatable    
};

Editar=function(){
    if(validaLicencias()){
        Licencias.AgregarEditarLicencia(1);
    }
};

activar=function(id){
    Licencias.CambiarEstadoLicencias(id,1);
};
HTMLCargarLicencia=function(datos){
    var html="", estadohtml="";
    $('#t_licencias').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        estadohtml='<span id="'+data.id+'" onClick="activar('+data.id+')" class="btn btn-danger">Inactivo</span>';
        if(data.estado==1){
            estadohtml='<span id="'+data.id+'" onClick="desactivar('+data.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr>"+
            "<td>"+data.nombre+"</td>"+
            "<td id='estado_"+data.id+"' data-estado='"+data.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#licenciaModal" data-id="'+index+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i> </a></td>';

        html+="</tr>";
    });
    $("#tb_licencias").html(html);
    activarTabla();
};

desactivar=function(id){
    Licencias.CambiarEstadoLicencias(id,0);
};

Agregar=function(){
    if(validaLicencias()){
        Licencias.AgregarEditarLicencia(0);
    }
};

validaLicencias=function(){
    $('#form_licencias [data-toggle="tooltip"]').css("display","none");
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
