
function Validar(form) {

    if (form.user.value == "") {
        alert("Por favor ingrese su Usuario");
        form.user.focus();
        return;
    }

    if (form.password.value == "") {
        alert("Por favor ingrese su password");
        form.password.focus();
        return;
    }
    /*if (form.Nombre.value == "")
     { alert("Por favor ingrese su nombre"); form.Nombre.focus(); return; }

     if (form.Email.value == "")
     { alert("Por favor ingrese su dirección de e-mail"); form.Email.focus(); return; }

     if (form.Domicilio.value == "")
     { alert("Por favor ingrese su domicilio"); form.Domicilio.focus(); return; }

     if (form.Telefono.value == "")
     { alert("Por favor ingrese su número de teléfono"); form.Telefono.focus(); return; }

     if (form.Empresa.value == "")
     { alert("Por favor ingrese el nombre de su empresa"); form.Empresa.focus(); return; }

     if (form.NumeroTarjeta.value == "")
     { alert("Por favor ingrese los números de su tarjeta de crédito"); form.NumeroTarjeta.focus(); return; }

     if (form.Codigo.value == "")
     { alert("Por favor ingrese el código de su tarjeta de crédito"); form.Codigo.focus(); return; }

     if (form.NombreTitular.value == "")
     { alert("Por favor indique el nombre del titular de la tarjeta de crédito"); form.NombreTitular.focus(); return; }

     if (form.Email.value.indexOf('@', 0) == -1 ||
     form.Email.value.indexOf('.', 0) == -1)
     { alert("Dirección de e-mail inválida"); form.Email.focus(); return; }*/

    form.submit();

}