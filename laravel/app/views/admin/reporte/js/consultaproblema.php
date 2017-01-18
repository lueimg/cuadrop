<script type="text/javascript">
$(document).ready(function() {
    $('.fecha').daterangepicker({
        format: 'YYYY-MM-DD',
        singleDatePicker: true
    });

    var data={porusuario:1,estado:1};
    slctGlobal.listarSlct('tipoproblema','slct_tipo_problema','multiple',null,data);
    
    data={estado:1};
    slctGlobal.listarSlct('lista/sedepersona','slct_sede','multiple');
    slctGlobal.listarSlct('lista/estadoproblemaestado','slct_estado','multiple',null,data);

    $("#buscar").click(mostrar);

    $("#btnExportar").click(exportar);
});

exportar=function(){
    /*var datos=$("#reporte").serialize().split("txt_").join("").split("slct_").join("");
    ConsultaProblema.exportar(datos);*/
    $("#reporte").submit();
    //window.location='reporte/listadoproblema';
}

mostrar=function(){
    var datos=$("#reporte").serialize().split("txt_").join("").split("slct_").join("");
    ConsultaProblema.reporte(HTMLreporte,datos);
}

HTMLreporte=function(datos){
    var html="";
    $('#t_problemas').dataTable().fnDestroy();
    $.each(datos,function(index,data){
        estado_problema=data.estado_problema;
        clase =data.clase_boton;

        //solo para estado en espera (1)
        if (clase==='undefined' || clase===undefined) {
            clase='default';
        }

            estadohtml='<span class="btn btn-'+clase+' disabled">'+estado_problema+'</span>';

        html+="<tr>"+
            "<td>"+(index+1)+' '+"</td>"+
            "<td>"+data.sede+' '+"</td>"+
            "<td>"+data.tipo_problema+"</td>"+
            "<td>"+data.descripcion+"</td>"+
            "<td>"+data.fecha_problema+"</td>"+
            "<td>"+data.fecha_registro+"</td>"+
            "<td>"+estadohtml+"</td>";
        html+="</tr>";
    });
    $("#tb_problemas").html(html);
    $("#t_problemas").dataTable();
}
</script>
