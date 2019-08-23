$(document).ready(function() {

    $('table tbody tr').click(function(){
        var select=$('.row-selected').length;
        var p= $('.btn_add_depa').attr('href').split('/list/market/');
        var p2= $('.btn_add_indi').attr('href').split('/list/market/');
        var p3= $('.btn_list_eval').attr('href').split('/list/market/');
        if(select==1){
            $('#option-xs li.disabled a.btn_add_depa,#option-xs li a.btn_add_indi,#option-xs li a.btn_list_eval').parent().removeClass('disabled');
            $('.btn_add_depa,.btn_add_indi,.btn_list_eval').removeClass('hidden');
            $('#btn_add_market').addClass('hidden');
            $('.btn_add_indi').attr('href',p2[0] +'/list/market/'+$('.row-selected').data('val'));
            $('.btn_add_depa').attr('href',p[0] +'/list/market/'+$('.row-selected').data('val'));
            $('.btn_list_eval').attr('href',p3[0] +'/list/market/'+$('.row-selected').data('val'));
        }
        else
        {
            $('#option-xs li a.btn_add_depa,#option-xs li a.btn_add_indi, #option-xs li a.btn_list_eval ').parent().addClass('disabled');
            $('.btn_add_indi,.btn_add_depa,.btn_list_eval').addClass('hidden');
            $('#btn_add_market').removeClass('hidden');;
            $('.btn_add_indi').attr('href',p2[0] +'/list/market/');
            $('.btn_add_depa').attr('href',p[0] +'/list/market/');
            $('.btn_list_eval').attr('href',p3[0] +'/list/market/');
        }
    });
});
