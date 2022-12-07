<?php 

function displayStatus($value) {
    if ($value == 1) {
        echo '<td>Activo</td>';
    } else {
        echo '<td>Inactivo</td>';
    }
}

function displaySelectedServiceSchedule($array) {
    $startHours = ['7:00', '7:30', '8:00', '8:30', '9:00', '9:30', '10:00', '10:30', '11:00', '11:30', '12:00'];
    $endHours = ['12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00'];
    echo 
    '<div class="select-item">
        <input id="'. $array['day'] .'" type="checkbox" class="select-checkbox" name="day[]" value="'. $array['day'] .'" checked>
        <div class="titulo active">
            '. $array['day'] .'
        </div>
        <div class="pivote">
            <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
        </div>
        <div class="accion">
            <p>Hora Inicio</p>
            <select class="select-hour-start" id="'.$array['day'].'-inicio" name="startHour[]">';
    for ($i=0; $i < sizeof($startHours); $i++) { 
        if ($array['startHour'] == $startHours[$i]) {
            echo '<option value="'. $startHours[$i]. '" selected>'.$startHours[$i].'</option>';
        }else {
            echo '<option value="'. $startHours[$i]. '">'.$startHours[$i].'</option>';
        }
    }
    echo 
           '</select>
            <p>Hora Final</p>
            <select class="select-hour-end" id="'.$array['day'].'-fin" name="endHour[]">';
    for ($i=0; $i < sizeof($endHours); $i++) { 
        if ($array['endHour'] == $endHours[$i]) {
            echo '<option value="'. $endHours[$i]. '" selected>'.$endHours[$i].'</option>';
        }else {
            echo '<option value="'. $endHours[$i]. '">'.$endHours[$i].'</option>';
        }
    }
    echo 
'           </select>
        </div>
    </div>';
}

function displayDefaultServiceSchedule($value) {
    $startHours = ['7:00', '7:30', '8:00', '8:30', '9:00', '9:30', '10:00', '10:30', '11:00', '11:30', '12:00'];
    $endHours = ['12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00'];
    echo 
    '<div class="select-item">
        <input id="'. $value .'" type="checkbox" class="select-checkbox" name="day[]" value="'. $value .'">
        <div class="titulo">
            '. $value .'
        </div>
        <div class="pivote">
            <button class="btn-editar" type="button"><i class="fa-regular fa-pen-to-square"></i></button>
        </div>
        <div class="accion">
            <p>Hora Inicio</p>
            <select class="select-hour-start" id="'.$value.'-inicio" name="startHour[]">
            <option value="" selected></option>';
    for ($i=0; $i < sizeof($startHours); $i++) { 
        echo '<option value="'. $startHours[$i]. '">'.$startHours[$i].'</option>';
    }
    echo 
           '</select>
            <p>Hora Final</p>
            <select class="select-hour-end" id="'.$value.'-fin" name="endHour[]">
            <option value="" selected></option>';
    for ($i=0; $i < sizeof($endHours); $i++) { 
        echo '<option value="'. $endHours[$i]. '">'.$endHours[$i].'</option>';
    }
    echo 
'           </select>
        </div>
    </div>';
}

function dateToFormat_ES($date){
    $newDate = date("d/m/Y", strtotime($date));
    return $newDate;
}