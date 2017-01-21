<script type="text/javascript">
$(document).ready(function() {  
    Especialidad.CargarEspecialidad(activarTabla);
    var datos={estado:1};
    slctGlobal.listarSlct('carrera','slct_carrera','simple',null,datos);
    
    $('#especialidadModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // captura al boton
      var titulo = button.data('titulo'); // extrae del atributo data-
      var especialidad_id = button.data('id');
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this); //captura el modal
      modal.find('.modal-title').text(titulo+' Especialidad');
      $('#form__especialidades [data-toggle="tooltip"]').css("display","none");
      $("#form__especialidades input[type='hidden']").remove();

        if(titulo=='Nueva'){

            modal.find('.modal-footer .btn-primary').text('Guardar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
            $('#form__especialidades #slct_estado').val(1); 
            $('#form__especialidades #txt_nombre').focus();
        }
        else{
            var id = EspecialidadObj[especialidad_id].id;

            modal.find('.modal-footer .btn-primary').text('Actualizar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');
            $('#form_especialidades #txt_nombre').val( EspecialidadObj[especialidad_id].nombre );
            $('#form_especialidades #slct_estado').val( EspecialidadObj[especialidad_id].estado );
            $('#form_especialidades #slct_carrera').val( EspecialidadObj[especialidad_id].carrera_id );
            $("#form_especialidades").append("<input type='hidden' value='"+id+"' name='id'>");
        }
        
    });

    $('#especialidadModal').on('hide.bs.modal', function (event) {
        var modal = $(this); //captura el modal
        modal.find('.modal-body input').val(''); // busca un input para copiarle texto
        $('#form__especialidades select').val('');
    });
});
beforeSubmit=function (){};
        success=function (){};
activarTabla=function(){
    $("#t_especialidades").dataTable(); // inicializo el datatable    
};

Editar=function(){
    if(validaEspecialidades()){
        Especialidad.AgregarEditarEspecialidad(1);
    }
};

activar=function(id){
    Especialidad.CambiarEstadoEspecialidad(id,1);
};
HTMLCargarEspecialidad=function(datos){
    var html="", estadohtml="";
    $('#t_especialidades').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        estadohtml='<span id="'+data.id+'" onClick="activar('+data.id+')" class="btn btn-danger">Inactivo</span>';
        if(data.estado==1){
            estadohtml='<span id="'+data.id+'" onClick="desactivar('+data.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr>"+
            "<td>"+data.nombre+"</td>"+
            "<td>"+data.carrera+"</td>"+
            "<td id='estado_"+data.id+"' data-estado='"+data.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#especialidadModal" data-id="'+index+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i> </a></td>';

        html+="</tr>";
    });
    $("#tb_especialidades").html(html);
    activarTabla();
};

desactivar=function(id){
    Especialidad.CambiarEstadoEspecialidad(id,0);
};

Agregar=function(){
    if(validaEspecialidades()){
        Especialidad.AgregarEditarEspecialidad(0);
    }
};

validaEspecialidades=function(){
    $('#form__especialidades [data-toggle="tooltip"]').css("display","none");
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
