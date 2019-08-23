$(document).ready(function() {
$('.btn-del-modal').click(function(){
   lock_screen();
    window.location=  $('.eliminado').data('url');
 });
    $('.btn-cancel-modal').click(function(){
        $('.btn-delete').removeClass('eliminado');
    });
    $('.btn-delete').click(function(){
        $(this).addClass('eliminado');
    });
    $('table tbody tr td').mouseenter(function(){
       if( $('html').outerWidth()<768)
         $(this).get(0).lastElementChild.classList.remove('hidden');
    });
    $('table tbody tr').click(function(){
        if($(this).hasClass('row-selected'))
            $(this).removeClass('row-selected');
        else
            $(this).addClass('row-selected');
    });
    $('table tbody tr td').mouseleave(function(){
        if( $('html').outerWidth()<768)
        $('.btn-flotantes').addClass('hidden');
    });

    window.mostrarMSG =function(texto,classe){
        if(classe == undefined)
            classe='success';
        var msg='<div  class="mensage alert alert-'+classe+' alert-dismissable" role="alert"  > ' +
            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button> ' +
            '<i  class=" fa fa-exclamation-triangle fa-2x fa-fw"></i>'+ texto+'</div>';
        $('body').append(msg);
        $('.mensage').fadeIn(100,function(){
            $('.mensage').fadeOut(6000,function(){
                $('.mensage').remove();
            });
        });
    };


   /* <i class="icon-valid fa fa-check"></i>*/
    $(window).bind("load resize", function() {
        if($(this).width() < 320){
            $('#option-xs').css('text-align','left')
        }
        if($(this).width() >= 320){
            $('#option-xs').css('text-align','right')
        }
        if ($(this).width() < 768) {
            $('.mensage').css('width','70%');
            $('textarea').attr('rows',1);

            $('.list-group > span.list-group-item >span').removeClass('pull-right text-muted')
        } else {
            $('textarea').attr('rows',5);
            $('.list-group > span.list-group-item >span').addClass('pull-right text-muted')

        }

    })

    /**
     * CARGANDO DATOS
     */
    window.lock_screen = function () {
        $('.cp-overlay').remove();
        $('body').prepend('<div class="cp-overlay" style="position: fixed; z-index: 9999; left: 0; top: 0; right: 0; bottom: 0; background-color: rgba(100, 100, 100, 0.5)"><i class="fa fa-gear fa-spin fa-3x" style="z-index: 999; position: absolute; left: 48%; color: #fff; margin-top: 330px;"></i></div>');
    };
    window.unlock_screen = function () {
        $('.cp-overlay').remove();
    };


});
