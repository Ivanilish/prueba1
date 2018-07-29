
function validarced()
{
    var i;
    var cedula;
    var acumulado;
    cedula = document.form.ced.value;
    var instancia;
    acumulado = 0;
    for (i = 1; i <= 9; i++)
    {
        if (i % 2 != 0)
        {
            instancia = cedula.substring(i - 1, i) * 2;
            if (instancia > 9)
                instancia -= 9;
        } else
            instancia = cedula.substring(i - 1, i);
        acumulado += parseInt(instancia);
    }
    while (acumulado > 0)
        acumulado -= 10;
    if (cedula.substring(9, 10) != (acumulado * -1))
    {
        ced.style.backgroundColor = '#ffccd2';
        document.form.ced.setfocus();
    }
    ced.style.backgroundColor = '#fff';
    document.form.nombres.disabled = !document.form.nombres.disabled;
    document.form.direccion.disabled = !document.form.direccion.disabled;
    document.form.telefono.disabled = !document.form.telefono.disabled;
    document.form.guardar.disabled = !document.form.guardar.disabled;
    document.form.nombres.setfocus();

}

function numeroCaracteres() {

    var input = document.getElementById('ced');
    input.addEventListener('input', function () {
        if (this.value.length >= 10)
            this.value = this.value.slice(0, 10 );
    })
}

function soloNumeros(e)
{
    var keynum = window.event ? window.event.keyCode : e.which;
    if ((keynum === 8) || (keynum === 46))
        return true;
    return /\d/.test(String.fromCharCode(keynum));
}

function SoloLetras(e)
{
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    tecla_especial = false
    for (var i in especiales) {
        if (key === especiales[i]) {
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla) === -1 && !tecla_especial) {
        return false;
    }
}

