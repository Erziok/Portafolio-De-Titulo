const horaInicio = document.getElementById('hora-inicio');
const horaFin = document.getElementById('hora-fin');
const selectHourStart = document.getElementsByClassName('select-hour-start');
const selectHourEnd = document.getElementsByClassName('select-hour-end');
const selectCheckbox = document.getElementsByClassName('select-checkbox');


    for (let i = 0; i < selectCheckbox.length; i++) {
        tituloSelect[i].addEventListener('click', function() {
            if(selectCheckbox[i].checked == true){
                selectHourStart[i].value = horaInicio.value
                selectHourEnd[i].value = horaFin.value
            } else {
                selectHourStart[i].value = null
                selectHourEnd[i].value = null
            }
        })  
    }





