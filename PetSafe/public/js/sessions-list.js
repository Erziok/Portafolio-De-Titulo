let csfr_token = document.getElementsByName('csrf-token')[0].getAttribute('content');
let btnVerDetalles = document.getElementsByClassName('ver-detalles-agenda');

for (let i = 0; i < btnVerDetalles.length; i++) {
    btnVerDetalles[i].addEventListener('click', (evento)=>{
        $.ajax({
            url:'get-sessions/' + btnVerDetalles[i].dataset.course,
            method:'post',
            data: {
                "_token": csfr_token
            },
            success:function(response){
                let bodyModal = document.getElementById('body-modal-sesiones');
                let html = '';
                for (let i = 0; i < response.sessions.length; i++) {
                    html += `
                        <ul>
                            <li><span>Sesión ${i+1}: ${response.sessions[i]['date']} desde las ${response.sessions[i]['startHour']} hasta las ${response.sessions[i]['endHour']}</span></li>    
                        </ul>
                    `;
                }
                bodyModal.innerHTML = html;
            }
        });    
    });
}
