let btnChangeAvatar = document.getElementById('btn-change-avatar');
let inptFileAvatar = document.getElementById('customFile2');
let avatarForm = document.getElementById('avatar-form');

btnChangeAvatar.addEventListener('click', (event)=> {
    event.preventDefault();
    inptFileAvatar.click();
    inptFileAvatar.addEventListener('change', function(){
        avatarForm.submit();
    });
});