const frm = document.querySelector('#formulario');

document.addEventListener('DOMContentLoaded',function(){
    $( '.select-auto' ).select2( {
        theme: 'bootstrap-5'
    } );
    //VALIDAR CAMPOS
    frm.addEventListener('submit',function(e){
        e.preventDefault();
        if (frm.fechallegada.value == '' ||
        frm.fechasalida.value == '' ||
        frm.habitacion.value == '')
        {
            alertSW('TODOS LOS CAMPOS SON REQUERIDOS','warning')
        }
        else 
        {
            this.submit();
        }
    });//VIDEO 21
})
