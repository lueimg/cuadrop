<script type="text/javascript">
var carrera_id, CarreraObj;
var Carreras={
    AgregarEditarCarrera:function(AE){
        //var formData = new FormData($("#form_carreras")[0]); 
        //$("#form_carreras input[name='h_imagenp']").remove();
        //$("#form_carreras").append("<input type='hidden' value='"+$("#imagenp")[0]+"' name='h_imagenp'>");

        var datos=$("#form_carreras").serialize().split("txt_").join("").split("slct_").join("");
        var accion="carrera/crear";
        if(AE==1){
            accion="carrera/editar";
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
                    if(AE==0){//subir imagenes despues de crear el carrera
                        var carrera_id=obj.carrera_id
                    }
                    $('#t_carreras').dataTable().fnDestroy();

                    Carreras.CargarCarreras(activarTabla);
                    $("#msj").html('<div class="alert alert-dismissable alert-success">'+
                                        '<i class="fa fa-check"></i>'+
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+
                                        '<b>'+obj.msj+'</b>'+
                                    '</div>');

                    $('#carreraModal .modal-footer [data-dismiss="modal"]').click();

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
    CargarCarreras:function(evento){
        $.ajax({
            url         : 'carrera/cargar',
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success : function(obj) {
                if(obj.rst==1){
                    HTMLCargarCarrera(obj.datos);
                    CarreraObj = obj.datos;
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
    CambiarEstadoCarreras:function(id,AD){
        $("#form_carreras").append("<input type='hidden' value='"+id+"' name='id'>");
        $("#form_carreras").append("<input type='hidden' value='"+AD+"' name='estado'>");
        var datos=$("#form_carreras").serialize().split("txt_").join("").split("slct_").join("");
        $.ajax({
            url         : 'carrera/cambiarestado',
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
                    $('#t_carreras').dataTable().fnDestroy();
                    Carreras.CargarCarreras(activarTabla);
                    $("#msj").html('<div class="alert alert-dismissable alert-info">'+
                                        '<i class="fa fa-info"></i>'+
                                        '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>'+
                                        '<b>'+obj.msj+'</b>'+
                                    '</div>');
                    $('#carreraModal .modal-footer [data-dismiss="modal"]').click();
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
