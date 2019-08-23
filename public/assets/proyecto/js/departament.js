$(document).ready(function() {

    $('table tbody tr').click(function(){
        var select=$('.row-selected').length;
        if(select==1){
            $('#option-xs li.disabled a.btn_add_indi').parent().removeClass('disabled');
            $('.btn_add_indi').removeClass('hidden');
            $('#btn_add_depa').addClass('hidden');
            var btn=$('.btn_add_indi');
            var ruta=btn.attr('href');
            var p= ruta.split('/indicator/list/departament/');
            btn.attr('href',p[0] +'/indicator/list/departament/'+$('.row-selected').data('val'));
        }
        else
        {
            $('#option-xs li a.btn_add_indi').parent().addClass('disabled');
            btn=$('span .btn_add_indi');
            btn.addClass('hidden');
            $('#btn_add_depa').removeClass('hidden');
            ruta=btn.attr('href');
            p= ruta.split('/indicator/list/departament/');
            btn.attr('href',p[0] +'/indicator/list/departament/');
        }
    });
});
