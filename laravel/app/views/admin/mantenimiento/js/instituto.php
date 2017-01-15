<script type="text/javascript">
$(document).ready(function() {  
    Sedes.CargarSedes(activarTabla);

    $('#sedeModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // captura al boton
      var titulo = button.data('titulo'); // extrae del atributo data-
      var sede_id = button.data('id');
      // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
      // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
      var modal = $(this); //captura el modal
      modal.find('.modal-title').text(titulo+' Sede');
      $('#form_sedes [data-toggle="tooltip"]').css("display","none");
      $("#form_sedes input[type='hidden']").remove();

        if(titulo=='Nuevo'){

            modal.find('.modal-footer .btn-primary').text('Guardar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Agregar();');
            $('#form_sedes #slct_estado').val(1);
            $('#form_sedes #slct_modalidad_id').val(0);
            $('#form_sedes #txt_nombre').focus();
        }
        else {
            //enviar peticion de las carreras y ciclos asociados a este instituto
            var id = SedeObj[sede_id].id;
            Sedes.ConsultarCarrerasCiclos(id);

            modal.find('.modal-footer .btn-primary').text('Actualizar');
            modal.find('.modal-footer .btn-primary').attr('onClick','Editar();');
            $('#form_sedes #txt_nombre').val( SedeObj[sede_id].nombre );
            $('#form_sedes #slct_estado').val( SedeObj[sede_id].estado );
            $('#form_sedes #slct_modalidad_id').val(SedeObj[sede_id].modalidad_id);
            $("#form_sedes").append("<input type='hidden' value='"+id+"' name='id'>");
        }
    });

    $('#sedeModal').on('hide.bs.modal', function (event) {
        var modal = $(this); //captura el modal
        modal.find('.modal-body input').val(''); // busca un input para copiarle texto
    });
});
cargarModalidades=function(Obj){
    var html="";
    $.each(Obj,function(index,data){
        html += "<option value=\"" + data.id + "\">" + data.nombre + "</option>";
    });
    $("#slct_modalidad_id").html(html);
};
cargarCiclos=function(Obj){
    var html="";
    $.each(Obj,function(index,data){
        html += "<option value=\"" + data.id + "\">" + data.nombre + "</option>";
    });
    $("#slct_ciclos").html(html);
    
    slctGlobalHtml("slct_ciclos",'multiple');
};
cargarCarreras=function(Obj){
    var html="";
    $.each(Obj,function(index,data){
        html += "<option value=\"" + data.id + "\">" + data.nombre + "</option>";
    });
    $("#slct_carreras").html(html);
    slctGlobalHtml("slct_carreras",'multiple');
};
beforeSubmit=function (){};
        success=function (){};
activarTabla=function(){
    $("#t_sedes").dataTable(); // inicializo el datatable    
};

Editar=function(){
    if(validaSedes()){
        Sedes.AgregarEditarSede(1);
    }
};

activar=function(id){
    Sedes.CambiarEstadoSedes(id,1);
};
HTMLCargarSede=function(datos){
    var html="", estadohtml="";
    $('#t_sedes').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        estadohtml='<span id="'+data.id+'" onClick="activar('+data.id+')" class="btn btn-danger">Inactivo</span>';
        if(data.estado==1){
            estadohtml='<span id="'+data.id+'" onClick="desactivar('+data.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr>"+
            "<td>"+data.nombre+"</td>"+
            "<td id='estado_"+data.id+"' data-estado='"+data.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#sedeModal" data-id="'+index+'" data-titulo="Editar"><i class="fa fa-edit fa-lg"></i> </a></td>';

        html+="</tr>";
    });
    $("#tb_sedes").html(html);
    activarTabla();
};

desactivar=function(id){
    Sedes.CambiarEstadoSedes(id,0);
};

Agregar=function(){
    if(validaSedes()){
        Sedes.AgregarEditarSede(0);
    }
};

validaSedes=function(){
    $('#form_sedes [data-toggle="tooltip"]').css("display","none");
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
