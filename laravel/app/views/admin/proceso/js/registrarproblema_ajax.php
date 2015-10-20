<script type="text/javascript">
var Alumno={
    Cargar:function(evento){
        $.ajax({
            url: "alumno/index",
            type: 'GET',
            contentType: false,
            processData: false,
            cache: false,
            dataType: "json",
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success: function(respAjax) {
                $(".overlay,.loading-img").remove();
                evento(respAjax.datos);
            },
            error: function(respAjax) {
                $(".overlay,.loading-img").remove();
                Psi.mensaje('danger', 'ocurrio un error en la carga', 6000);
            }
        });
    },
    AgregarEditarArea:function(AE){
        //var formData = new FormData($("#form_areas")[0]); 
        //$("#form_areas input[name='h_imagenp']").remove();
        //$("#form_areas").append("<input type='hidden' value='"+$("#imagenp")[0]+"' name='h_imagenp'>");

        var datos=$("#form_alumno").serialize().split("txt_").join("").split("slct_").join("");
        var accion="alumno/create";
        if(AE==1){
            accion="alumno/update";
        }

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
                    Psi.mensaje('success', obj.msj, 6000);
                    Alumno.Cargar(alumnosHTML);
                    $('#alumnoModal .modal-footer [data-dismiss="modal"]').click();
                } else { 
                    $.each(obj.msj,function(index,datos){
                        $("#error_"+index).attr("data-original-title",datos);
                        $('#error_'+index).css('display','');
                    });     
                }
            },
            error: function(){
                $(".overlay,.loading-img").remove();
                Psi.mensaje('danger', 'ocurrio un error en la carga', 6000);
            }
        });
        
    },
};
var Problema={
    Cargar:function(evento){
        $.ajax({
            url: "registrar_problema/cargar",
            type: 'POST',
            contentType: false,
            processData: false,
            cache: false,
            dataType: "json",
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success: function(respAjax) {
                $(".overlay,.loading-img").remove();
                evento(respAjax.datos);
            },
            error: function(respAjax) {
                $(".overlay,.loading-img").remove();
                Psi.mensaje('danger', 'ocurrio un error en la carga', 6000);
            }
        });
    },
    cargar2:function(form, url){
        $.ajax({
            url: url,
            type: 'POST',
            data: form,
            contentType: false,
            processData: false,
            cache: false,
            dataType: "json",
            beforeSend : function() {
                $("body").append('<div class="overlay"></div><div class="loading-img"></div>');
            },
            success: function(respAjax) {
                $(".overlay,.loading-img").remove();
                if(respAjax.estado){
                    $("#fileOutput").html('');
                    Psi.mensaje('success', respAjax.msj, 6000);
                }
                else{
                    Psi.mensaje('danger', respAjax.msj, 6000);
                }
                localStorage.clear();
            },
            error: function(respAjax) {
                $(".overlay,.loading-img").remove();
                Psi.mensaje('danger', 'no se cargo archivo', 6000);
                //alert('no se cargo archivo');
            }
        });
    }
};
</script>