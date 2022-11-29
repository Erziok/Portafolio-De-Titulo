let csfr_token = document.getElementsByName('csrf-token')[0].getAttribute('content');
const base_url = document.getElementsByName('base-url')[0].getAttribute('content');


let months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];

let currentDate = new Date();

let currentDayNumber = currentDate.getDate();
let currentMonthNumber = currentDate.getMonth()
let currentYearNumber = currentDate.getFullYear()

let monthItem = document.getElementById('month');
let yearItem = document.getElementById('year');

let startHour = document.getElementById('hora-inicio');
let endHour = document.getElementById('hora-final');

let calendarBody = document.getElementById('calendar-body');

writeCalendar(currentMonthNumber, currentYearNumber); 
loadSelect();

function writeCalendar(month, year) {
    monthAndYear.textContent = months[month]+ ' ' + year.toString();
    daysInMonth = new Date(year, month + 1, 0).getDate();
    firstMonthDay = new Date(year, month, 0).getDay();

    let dayCounter = 01;
    calendarBody.innerHTML = "";
    for (let i = 0; i < 6; i++) {//creating table rows
        let html = `<tr>`;
        for (let j = 0; j < 7; j++) {//creating table cells
            if (i === 0 && j < firstMonthDay) {
                html += `<td></td>`
            }else if(dayCounter > daysInMonth) {
                break
            }else {
                html += `<td class="item-day" data-date="${year+'-'+(month+1)+'-'+dayCounter}">${dayCounter}</td>`
                dayCounter++;
            }
        }
        html += `</tr>`;
        calendarBody.innerHTML += html;
    }
}

function next() {
    if (validateSelectedDates()) {
        if (currentMonthNumber !== 11) {
            currentMonthNumber++;
        }else {
            currentMonthNumber = 0;
            currentYearNumber++;
        }
        writeCalendar(currentMonthNumber, currentYearNumber);
        loadSelect();   
    } else {
        confirm("Asegurese de guardar los dias seleccionados antes de continuar");
    }
}
function previous() {
    if (validateSelectedDates()) {
        if (currentMonthNumber !== 0) {
            currentMonthNumber--;
        }else {
            currentMonthNumber =11;
            currentYearNumber--;
        }
        writeCalendar(currentMonthNumber, currentYearNumber);
        loadSelect();
    } else {
        confirm("Asegurese de guardar los dias seleccionados antes de continuar");
    }
}

function loadSelect() {
    document.querySelectorAll('#calendar .item-day').forEach(
        day => {
            day.addEventListener('click', event => {
                event.currentTarget.classList.toggle('active-date');
            });
        }
    );
}

function removeSelect() {
    let itemDay = document.getElementsByClassName('item-day');
    for (let i = 0; i < itemDay.length; i++) {
        itemDay[i].classList.remove('active-date');
    }
}
//Validar hora
function validateHours(){
    let errors = false;
    if (startHour.value.trim() == '') {
        document.getElementById('hora-inicio-error').classList.add('active');
        errors = true;
    }else {
        document.getElementById('hora-inicio-error').classList.remove('active');
    }
    if (endHour.value.trim() == '') {
        document.getElementById('hora-fin-error').classList.add('active');
        errors = true;
    } else {
        document.getElementById('hora-fin-error').classList.remove('active');
    }
    return errors;
}
//validar campos seleccionados sin guardar
function validateSelectedDates() { 
    let selectedDates = document.getElementsByClassName('active-date');
    let noErrors = true;
    if (selectedDates.length > 0 && selectedDates.length != schedule.length) {
        noErrors = false;
    }
    return noErrors;
}

let btnSave = document.getElementById('btn-agregar');
const schedule = [];

function addToList() { //guardar los objetos en un array y retornarlos
    let selectedDates = document.getElementsByClassName('active-date');
    for (let i = 0; i < selectedDates.length; i++) {
        let obj = {};
        obj.date = selectedDates[i].dataset.date;
        obj.startHour = startHour.value;
        obj.endHour = endHour.value;
        schedule.push(obj);
    }
}

//eliminando elementos de la agenda
function loadRemoveOptions() {
    let removeBtn = document.getElementsByClassName('remove-horario-item');
    for (let i = 0; i < removeBtn.length; i++) {
        removeBtn[i].addEventListener('click', function(){
            schedule.splice(i, 1);
            displaySchedule();
        });
    }
}

//mostrando elementos de la agenda
function displaySchedule() {
    let agendaBox = document.getElementById('agenda-box');
    html = '';
    for (let i = 0; i < schedule.length; i++) {
        html += `
        <div class="horario-item mt-2 mb-2">
            Sesión ${i+1}: ${schedule[i]['date']} desde las ${schedule[i]['startHour']} hasta las ${schedule[i]['endHour']}
            <i class="fa-solid fa-xmark remove-horario-item"></i>
            <input type="hidden" name="date[]" value="${schedule[i]['date']}">
            <input type="hidden" name="startHour[]" value="${schedule[i]['startHour']}">
            <input type="hidden" name="endHour[]" value="${schedule[i]['endHour']}">
        </div>
        `;
    }
    agendaBox.innerHTML = html;
    loadRemoveOptions();
    removeSelect();
}
//Guardando
btnSave.addEventListener('click', function(){
    if(validateHours() != true) {
        addToList();
        displaySchedule();
        
    }
});

let btnGuardarAgenda = document.getElementById('guardar-agenda');

btnGuardarAgenda.addEventListener('click', function(event) {
    event.preventDefault();
    let agendaError = document.getElementById('agenda-vacia-error');
    if (schedule.length == 0) {
        agendaError.classList.add('active');
    } else {
        agendaError.classList.remove('active');
        let sessionsForm = document.getElementById('form-store-sessions');
        sessionsForm.submit();
    }
});

$(document).ready(function(){
    $.ajax({
        url: base_url+'/admin/get-sessions/' + course_id,
        method:'post',
        data: {
            "_token": csfr_token
        },
        success:function(response){
            console.log(response);
            for (let i = 0; i < response.sessions.length; i++) {
                let obj = {};
                obj.date = response.sessions[i].date;
                obj.startHour = response.sessions[i].startHour;
                obj.endHour = response.sessions[i].endHour;
                schedule.push(obj);
            }
            displaySchedule();
        }
    })
})
