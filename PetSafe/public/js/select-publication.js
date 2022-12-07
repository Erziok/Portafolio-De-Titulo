const base_url = document.getElementsByName('base-url')[0].getAttribute('content');
const specie = document.getElementById('specie');
const breed = document.getElementById('breed_id');

specie.addEventListener('change', function() {
    $.ajax({
        url: base_url+'/formulario-mascota/'+specie.value,
        method:'GET',
        data:'',
        success:function(data){
            let html = '<option value="" disabled selected>Seleccione una raza</option>';

            for (let i = 0; i < data.length; i++) {
                html += `<option value="${data[i].id}"> ${data[i].breed} </option>`;
                
            }
            breed.innerHTML = html;
            
        }
    })
})
