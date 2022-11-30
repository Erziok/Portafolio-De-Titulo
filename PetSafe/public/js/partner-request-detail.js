let csfr_token = document.getElementsByName('csrf-token')[0].getAttribute('content');
const base_url = document.getElementsByName('base-url')[0].getAttribute('content');
let btnVerDetalles = document.getElementsByClassName('ver-detalles-solicitud');

for (let i = 0; i < btnVerDetalles.length; i++) {
    btnVerDetalles[i].addEventListener('click', (evento)=>{
        $.ajax({
            url:base_url+'/admin/associations/requests/' + btnVerDetalles[i].dataset.service,
            method:'get',
            data: {
                "_token": csfr_token
            },
            success:function(response){
                let bodyModal = document.getElementById('body-modal-solicitud');
                console.log(response);
                let html = '';
                html += `
                <div class="card w-100 p-0">
                    <div class="card-header">
                        Autor
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Nombre: ${response.solicitudes[0].user.firstname+' '+response.solicitudes[0].user.lastname}</li>
                            <li>Email: ${response.solicitudes[0].user.firstname}</li>
                            <li>Run: ${response.solicitudes[0].user.run}</li>
                        </ul>
                    </div>
                </div>
                `;
                html += `
                <div class="card w-100 p-0 mt-3">
                    <div class="card-header">
                        Detalles del servicio
                    </div>
                    <div class="card-body">
                        <ul>
                            <li>Nombre: ${response.solicitudes[0].name}</li>
                            <li>Dirección: ${response.solicitudes[0].address}</li>
                            <li>Teléfono: ${response.solicitudes[0].phone}</li>
                            <li>Email: ${response.solicitudes[0].email}</li>
                            <li>Tipo de negocio: ${response.solicitudes[0].type.type}</li>
                            <li>Descripción:</li>
                            <div class="ml-2">${response.solicitudes[0].description}</div>
                            <li>Foto:</li>
                            <div class="img-box ml-2">
                                <img src="${base_url + '/' + response.solicitudes[0].photo}">
                            </div>
                        </ul>
                    </div>
                </div>
                `;
                html += `
                <div class="card w-100 p-0 mt-3">
                    <div class="card-header">
                        Horario
                    </div>
                    <div class="card-body">
                        <ul>`
                for (let i = 0; i < response.solicitudes[0].schedule.length; i++) {
                    html += `
                    <li>${response.solicitudes[0].schedule[i].day}, desde las ${response.solicitudes[0].schedule[i].startHour} hasta las ${response.solicitudes[0].schedule[i].endHour}</li>`;   
                }
                html += `</ul>
                    </div>
                </div>
                `;
                
                bodyModal.innerHTML = html;
            }
        });    
    });
}
