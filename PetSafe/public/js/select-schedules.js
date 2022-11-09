const btnCambiar = document.getElementsByClassName('btn-editar');
const tituloSelect = document.getElementsByClassName('titulo');
const checkboxSelect = document.getElementsByClassName('select-checkbox');
const accionBox = document.getElementsByClassName('accion');
const guardarBtn = document.getElementById('guardar-btn');



for (let i = 0; i < tituloSelect.length; i++) {
    tituloSelect[i].addEventListener("click", function () {
        tituloSelect[i].classList.toggle('active');
        if (isChecked(checkboxSelect[i])) {
            accionBox[i].classList.remove('active');
            checkboxSelect[i].checked = false;
        } else {
            checkboxSelect[i].checked = true;
        }        
    });
}
for (let i = 0; i < btnCambiar.length; i++) {
    btnCambiar[i].addEventListener("click", function() {
        accionBox[i].classList.toggle('active');
    });
}

function isChecked(checkbox) {
    if (checkbox.checked == true) {
        return true;
    } else {
        return false;
    }
}


