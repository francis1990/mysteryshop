$(document).ready(function () {
    window.awesomplete=null;
    window.datalist='';
    $('#fm_add_eval').validate({
        rules: {
            date: {required: true, date: true},
            time: {required: true}

        },
        messages: {
            date: "Inserte una fecha valida",
            time: "Name is requiered"

        }
    });
    $('#fm_add_eval').submit(function () {
        return false;
    });
    $('#date,#time,select').change(function () {
        if ($('#fm_add_eval').valid() == true)
            $('#btn_save').removeClass('disabled');
        else
            $('#btn_save').addClass('disabled');
    });

    function salvarGeneral() {
        var evals = [];
        $('.panel-collapse').each(function (i) {
            if ($(this).data('save') == undefined) {
                evals.push(guardarDatos($(this).attr('id')))
            }
        });
        return evals;
    }

    function guardarDatos(selec) {
        var data = {};
        var datos = [];
        $('#' + selec + ' span select').each(function () {
            var d = {'id_indicator': $(this).data('indicator'), 'points': $(this).val()};
            datos.push(d);
        });
        if ($('#' + selec).data('type') == 'dpto') {
            data.id_dpto = $('#' + selec).data('elem');
            data.employee_name = $('#' + selec + ' .employee_name').val();
        }
        data.indicadores = datos;
        return data;
    }

    $('.panel-body .list-group-item select').change(function () {
        var a = $(this);
        var sel = (a.get(0).offsetParent.parentNode.attributes.getNamedItem('data-em').value).split('em');
        $('#collapse' + sel[1]).parent().addClass('panel-default');
        $('#collapse' + sel[1] + '-title i').remove();
        $('#collapse' + sel[1]).parent().removeClass('panel-success');
        $('#collapse' + sel[1]).removeData('save');

    });
    $('#btn_save').click(function (e) {
        e.preventDefault();

        var eval = null;
        var datos = salvarGeneral();
        if ($('#market').data('eval') != "")
            eval = $('#market').data('eval');
        if (datos.length > 0) {
            var url = $('#btn_save').data('url');
            $.ajax({
                type: "POST",
                url: url,
                data: {
                    id_market: $('#market').data('market'),
                    time: $('#time').val(),
                    date: $('#date').val(),
                    id_evaluation: eval,
                    'datos': datos
                },
                success: function (json) {
                    if (json.success) {
                        if (json.msg != "") {
                            mostrarMSG(json.msg);
                        }
                        window.location = $('#btn_close').attr('href');
                    }
                }
            });
        }
    });
    $('input.employee_name').blur(function(){
     var value=$(this).val();
     var datalist=window.datalist;
     var existe=window.datalist.split(value);
     if(existe.length==1) {
         if (window.datalist != '')
             window.datalist=window.datalist + ',' + value;
         else
             window.datalist=value;
     }
        window.awesomplete.destroy();
        window.awesomplete=null;
     });
    $(".employee_name").keyup(function(){
        var input = $(this).get(0);
        if(window.awesomplete==null)
            window.awesomplete = new Awesomplete(input);
        window.awesomplete.list=window.datalist.split(',');
        $(this).focus()
    });
});










