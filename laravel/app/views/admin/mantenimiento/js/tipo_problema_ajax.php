<script type="text/javascript">
var tipoproblema_id, TipoProblemaObj;
var TipoProblema={
    AgregarEditarTipoProblema:function(AE){
        var datos=$("#form_tipoproblema").serialize().split("txt_").join("").split("slct_").join("");
        var accion="tipoproblema/crear";
        if(AE==1){
            accion="tipoproblema/editar";
        }
        var options = { 
            beforeSubmit:   beforeSubmit(),
            success:        success(),
            dataType: 'json' 
        };
        $.ajax({
            url         : accion,
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    if(AE==0){//subir imagenes despues de crear el tipoproblema
                        var tipoproblema_id=obj.tipoproblema_id
                    }
                    $('#t_tipoproblema').dataTable().fnDestroy();

                    TipoProblema.CargarTipoProblema(activarTabla);
                    $("#msj").html('<div class="alert alert-dismissable alert-success">'+
                                        '<i class="fa fa-check"></i>'+
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+
                                        '<b>'+obj.msj+'</b>'+
                                    '</div>');

                    $('#tipoproblemaModal .modal-footer [data-dismiss="modal"]').click();

                }
                else{ 
                    $.each(obj.msj,function(index,datos){
                        $("#error_"+index).attr("data-original-title",datos);
                        $('#error_'+index).css('display','');
                    });     
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                $("#msj").html('<div class="alert alert-dismissable alert-danger">'+
                                    '<i class="fa fa-ban"></i>'+
                                    '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+
                                    '<b>Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.'+
                                '</div>');
            }
        });
        
    },
    CargarTipoProblema:function(evento){
        $.ajax({
            url         : 'tipoproblema/cargar',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                if(obj.rst==1){
                    HTMLCargarTipoProblema(obj.datos);
                    TipoProblemaObj = obj.datos;
                }
                $(".overlay,.loading-img").remove();
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                $("#msj").html('<div class="alert alert-dismissable alert-danger">'+
                    '<i class="fa fa-ban"></i>'+
                    '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+
                    '<b>Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.'+
                '</div>');
            }
        });
    },
    CambiarEstadoTipoProblema:function(id,AD){
        $("#form_tipoproblema").append("<input type='hidden' value='"+id+"' name='id'>");
        $("#form_tipoproblema").append("<input type='hidden' value='"+AD+"' name='estado'>");
        var datos=$("#form_tipoproblema").serialize().split("txt_").join("").split("slct_").join("");
        $.ajax({
            url         : 'tipoproblema/cambiarestado',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : datos,
            beforeSend : function() {                
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                $(".overlay,.loading-img").remove();
                if(obj.rst==1){
                    $('#t_tipoproblema').dataTable().fnDestroy();
                    TipoProblema.CargarTipoProblema(activarTabla);
                    $("#msj").html('<div class="alert alert-dismissable alert-info">'+
                                        '<i class="fa fa-info"></i>'+
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+
                                        '<b>'+obj.msj+'</b>'+
                                    '</div>');
                    $('#tipoproblemaModal .modal-footer [data-dismiss="modal"]').click();
                }
                else{ 
                    $.each(obj.msj,function(index,datos){
                        $("#error_"+index).attr("data-original-title",datos);
                        $('#error_'+index).css('display','');
                    });     
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                $("#msj").html('<div class="alert alert-dismissable alert-danger">'+
                                        '<i class="fa fa-ban"></i>'+
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+
                                        '<b>Ocurrio una interrupción en el proceso,Favor de intentar nuevamente.'+
                                    '</div>');
            }
        });
    }
};
</script>
