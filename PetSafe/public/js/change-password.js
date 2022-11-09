
const form = document.getElementById("form")
const submitButton = document.getElementById("submit-btn")

let timeout = null;

let errors = {
    actual_password: true,
    password: true,
    confirm_password: true,
}


document.querySelectorAll('.form-box').forEach((box) => {
    const boxInput = box.querySelector('input');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
    
        validateInput(box, boxInput) 
    
    })
});


validateInput = (box, boxInput) => {

    if(boxInput.value == ''){
        showError(true, box, boxInput);
    }else{
        showError(false, box, boxInput);
    }

    if(boxInput.name == 'password'){

        if(boxInput.value.length < 6){
            showError(true, box, boxInput);
        }else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'confirm_password'){

        if(boxInput.value.length < 3){
            showError(true, box, boxInput);
        }else if(boxInput.value != password.value){
            showError(true, box, boxInput);
        }else{
            showError(false, box, boxInput);
        }

    }

    submitController();

}

showError = (check, box, boxInput) => {
    if(check){
        box.classList.remove('form-success');
        box.classList.add('form-error');
        errors[boxInput.name] = true
    }else{
        box.classList.remove('form-error');
        box.classList.add('form-success');
        errors[boxInput.name] = false
    }
}

submitController = () => {
    if(errors.actual_password || errors.password || errors.confirm_password){
        console.log('Hay un error')
    }
    else{
        // console.log("Todo ok")
        form.submit();
    }
}

