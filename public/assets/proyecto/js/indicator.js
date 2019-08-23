$(document).ready(function() {
    $.validator.addMethod("valuesok", function(value, element){
        var arrValue = value.split(','), resp=true, val = "";
        for(var i=0;i<arrValue.length && resp == true;i++)
        {
            if(isNaN(arrValue[i].trim()))
            {
                resp = false;
            }
            else
                val = val+","+arrValue[i].trim(); //val.replace ('|', arrValue[i].trim()+",|")
        }
        if(resp)
        {
            val = val.replace(',', "");
            $('#values').val(val);
        }
        return resp;
    }, "* End date must be after start date");
    $("#form-indi").validate({
        rules: {
            name: { required: true},
            values: {required: true,valuesok:true},
            position: {number: true}

        },
        messages: {
            name: "Name is requiered",
            values: "Values that can be taken by the indicator are invalid",
            position: "The position is a number to define the order of the indicator"
        }
    });
    function limpiarform(){

      $('#form-indi').get(0).reset();
        $('.exist').addClass('hidden');
        $('#add-form').addClass('disabled');
        $('.new').removeClass('hidden');
    }
    $('input[type=radio]').click(function(){
        if($(this).get(0).checked==true)
        {

            if($(this).val()=='new')
            {
                $('.new').removeClass('hidden');
                $('.exist').addClass('hidden');
            }
            else
            {
                $('.new').addClass('hidden');
                $('.exist').removeClass('hidden');
            }
        }

    });

    $('#desc_indi,#nom_indi,#values,#position').keyup(function(){
        if($('#form-indi').valid()==true)
            $('#add-form').removeClass('disabled');
        else
            $('#add-form').addClass('disabled');
    });
    $('#select_indi').change(function(){
        if($('#select_indi option:selected').length>0)
            $('#add-form').removeClass('disabled');
        else
            $('#add-form').addClass('disabled');
    });
    $('#cancel-form').click(function(){
        limpiarform()
    });

});
