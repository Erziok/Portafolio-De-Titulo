<?php 

function displayStatus($value) {
    if ($value == 1) {
        echo '<td>Activo</td>';
    } else {
        echo '<td>Inactivo</td>';
    }
    
}