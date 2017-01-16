<script type="text/javascript">
var sede_id, SedeObj;
var CategoriaTipoProblema={
    AgregarEditarCategoriaTipoProblema:function(AE){
        //var formData = new FormData($("#form_categoria_tipo_problemas")[0]); 
        //$("#form_categoria_tipo_problemas input[name='h_imagenp']").remove();
        //$("#form_categoria_tipo_problemas").append("<input type='hidden' value='"+$("#imagenp")[0]+"' name='h_imagenp'>");

        var datos=$("#form_categoria_tipo_problemas").serialize().split("txt_").join("").split("slct_").join("");
        var accion="categoriatipoproblema/crear";
        if(AE==1){
            accion="categoriatipoproblema/editar";
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
                    $('#t_categoria_tipo_problemas').dataTable().fnDestroy();

                    CategoriaTipoProblema.CargarCategoriaTipoProblema(activarTabla);
                    $("#msj").html('<div class="alert alert-dismissable alert-success">'+
                                        '<i class="fa fa-check"></i>'+
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+
                                        '<b>'+obj.msj+'</b>'+
                                    '</div>');

                    $('#categoriatipoproblemaModal .modal-footer [data-dismiss="modal"]').click();

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
    CargarCategoriaTipoProblema:function(evento){
        $.ajax({
            url         : 'categoriatipoproblema/cargar',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                if(obj.rst==1){
                    HTMLCargarCategoriaTipoProblema(obj.datos);
                    SedeObj = obj.datos;
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
    CambiarEstadoCategoriaTipoProblema:function(id,AD){
        $("#form_categoria_tipo_problemas").append("<input type='hidden' value='"+id+"' name='id'>");
        $("#form_categoria_tipo_problemas").append("<input type='hidden' value='"+AD+"' name='estado'>");
        var datos=$("#form_categoria_tipo_problemas").serialize().split("txt_").join("").split("slct_").join("");
        $.ajax({
            url         : 'categoriatipoproblema/cambiarestado',
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
                    $('#t_categoria_tipo_problemas').dataTable().fnDestroy();
                    CategoriaTipoProblema.CargarCategoriaTipoProblema(activarTabla);
                    $("#msj").html('<div class="alert alert-dismissable alert-info">'+
                                        '<i class="fa fa-info"></i>'+
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+
                                        '<b>'+obj.msj+'</b>'+
                                    '</div>');
                    $('#sedeModal .modal-footer [data-dismiss="modal"]').click();
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
