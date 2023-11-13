$('.soloNumeros').on('input', function () { 
    this.value = this.value.replace(/[^0-9]/g,'');
});
function initDatatable(idTabla)
{
    $('#'+idTabla).DataTable( {
        "autoWidth":false,
        "responsive":true,
        "ordering": false,
        "lengthMenu": [[5, 10,25, -1], [5, 10,25, "Todos"]],   
        // "order": [[ 1, 'desc' ]],
        "language": {
            "info": "Mostrando la pagina _PAGE_ de _PAGES_. (Total: _MAX_)",
            "search":"",
            "infoFiltered": "(filtrando)",
            "infoEmpty": "No hay registros disponibles",
            "sEmptyTable": "No tiene registros guardados.",
            "lengthMenu":"Mostrar registros _MENU_ .",
            "paginate": {
                "first": "Primero",
                "last": "Ultimo",
                "next": "Siguiente",
                "previous": "Anterior"
            }
        },
        
    } );
    $('input[type=search]').parent().css('width','100%');
    $('input[type=search]').css('width','100%');            
    $('input[type=search]').css('margin','0');
    $('input[type=search]').prop('placeholder','Escriba para buscar en las columnas.');
}
function estadoCotizacion(estado)
{
    let badgeEstado='';
    if(estado == '1') badgeEstado='<span class="shadow badge badge-warning">En proceso</span>';
    if(estado == '2') badgeEstado='<span class="shadow badge badge-success">Publicado</span>';
    if(estado == '3') badgeEstado='<span class="shadow badge badge-primary">Finalizado</span>';
    if(estado == '4') badgeEstado='<span class="shadow badge badge-danger">Corregir</span>';
    return badgeEstado
}
function badgeAccordingUser(tipo)
{
    let badgeAccordingUser='';
    if(tipo == 'administrador') badgeAccordingUser='<span class="badge badge-success">ADMINISTRADOR</span>';
    if(tipo == 'cotizador') badgeAccordingUser='<span class="badge badge-primary">COTIZADOR</span>';
    if(tipo == 'proveedor') badgeAccordingUser='<span class="badge badge-info">FINALIZADO</span>';
    return badgeAccordingUser;
}
function badgeTipoCot(tipo)
{   return tipo=='Servicios'?'<span class="badge badge-light">Servicios</span>':'<span class="badge badge-light">Bienes</span>'}
function cleanFv(form)
{
    var validator = $("#"+form).validate();
    validator.resetForm();
    $("#"+form+" .is-valid").removeClass("is-valid");
    $("#"+form+" .is-invalid").removeClass("is-invalid");
}
function stateRecord(est)
{
    return est=='1'?'<span class="badge badge-success shadow">Activo</span>':'<span class="badge badge-danger shadow">Inactivo</span>';
}
function novDato(dato)
{
    return dato!==null && dato!=''?dato:'--';
}
function msjSimple(estado,mensaje)
{
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        timer: 3000
    });
    Toast.fire({
        icon: estado?'success':'error',
        title: mensaje
    });
}
function msjRee(result)
{
    var Toast = Swal.mixin({
        toast: true,
        position: 'top',
        showConfirmButton: false,
        // timer: 3000
        timer:3000
    });
    if(result.estado)
    {
        Toast.fire({
            icon: 'success',
            title: result.message
        });
    }
    else
    {
        if(result.validator)
        {
            let verifyObject = JSON.parse(result.message);
            if(typeof verifyObject === 'object')
            {
                var message='';
                for (const property in verifyObject) 
                {
                    console.log(`${property}: ${verifyObject[property]}`);
                    message=message+`${verifyObject[property]}`+'<br>';
                }
                Toast.fire({
                    icon: 'error',
                    title: message
                });
            }
        }
        else
        {
            Toast.fire({
                icon: 'error',
                title: result.message
            });
        }
    }
}