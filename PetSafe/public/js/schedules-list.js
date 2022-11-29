let csfr_token = document.getElementsByName('csrf-token')[0].getAttribute('content');
let btnVerDetalles = document.getElementsByClassName('ver-detalles-horario');
const base_url = document.getElementsByName('base-url')[0].getAttribute('content');

for (let i = 0; i < btnVerDetalles.length; i++) {
    btnVerDetalles[i].addEventListener('click', (evento)=>{
        $.ajax({
            url:base_url+'/admin/get-schedules/' + btnVerDetalles[i].dataset.service,
            method:'post',
            data: {
                "_token": csfr_token
            },
            success:function(response){
                let bodyModal = document.getElementById('body-modal-horarios');
                let html = '';
                for (let i = 0; i < response.schedules.length; i++) {
                    html += `
                        <ul>
                            <li><span>${response.schedules[i]['day']} desde las ${response.schedules[i]['startHour']} hasta las ${response.schedules[i]['endHour']}</span></li>    
                        </ul>
                    `;
                }
                bodyModal.innerHTML = html;
            }
        });    
    });
}