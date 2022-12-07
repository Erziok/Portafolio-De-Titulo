// Checkbox Schedule

let form = document.querySelector('body form');
let checkBoxIds = getCheckBoxIds();
console.log(checkBoxIds);

function getCheckBoxIds() {
    let checkboxs = [];
    document.querySelectorAll('.select-item .select-checkbox').forEach((box) => {
        checkboxs.push(box.id);
    });
    return checkboxs;
}

function getSelectScheduleIds(checkBoxIds) {
    let selectIds = [];
    for (let i = 0; i < checkBoxIds.length; i++) {
        if (document.getElementById(checkBoxIds[i]).checked == true) {
            selectIds.push(checkBoxIds[i].concat('-inicio'));
            selectIds.push(checkBoxIds[i].concat('-fin'));   
        }
    }
    return selectIds;
}


function validateSelectSchedule(array) {
    let emptyField = 0; // sin errores

    if (array.length != 0) {
        array.forEach(value => {
            if (document.getElementById(value).value === '' || document.getElementById(value).value === null) {
                emptyField = 1; // error en los dias seleccionados
            }
        });
    } else {
        emptyField = 2; // sin dias seleccionados
    }
    return emptyField
}

form.addEventListener('submit', function(event) {
    event.preventDefault();
    let scheduleError = document.getElementById('schedule-error');
    scheduleError.style.display="none";
    if (validateSelectSchedule(getSelectScheduleIds(checkBoxIds)) == 1) {
        scheduleError.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Tienes que asignarles un horario a los días seleccionados';
        scheduleError.style.display="block";
    } else if (validateSelectSchedule(getSelectScheduleIds(checkBoxIds)) == 2){
        scheduleError.innerHTML = '<i class="fa-solid fa-circle-exclamation"></i> Tines que definir tus días laborales';
        scheduleError.style.display="block";
    }else {
        form.submit();
    }
});