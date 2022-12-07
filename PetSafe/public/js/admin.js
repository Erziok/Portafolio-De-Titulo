const deleteForm = document.getElementsByClassName('formulario-eliminar');

for (let i = 0; i < deleteForm.length; i++) {
    deleteForm[i].addEventListener('submit', function(event) {
        event.preventDefault();
        Swal.fire({
                title: '¡Espera un momento!',
                text: "Esta acción no es reversible, ¿Estas seguro de querer eliminarlo?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#009578',
                cancelButtonColor: '#f44336',
                cancelButtonText: 'Cancelar',
                confirmButtonText: 'Sí, eliminalo',
            }).then((result) => {
            if (result.isConfirmed) {
                deleteForm[i].submit()
            }
        })
    });
}

var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
