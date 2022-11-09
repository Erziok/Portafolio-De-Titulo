
const form = document.getElementById("form")
const submitButton = document.getElementById("submit-btn")

let timeout = null;

let errors = {
    firstname: true,
    lastname: true,
}

const nameRegex = /^[a-zA-ZÀ-ÿ\s]{1,40}$/


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

    if(boxInput.name == 'firstname'){

        if(boxInput.value.length < 3){
            showError(true, box, boxInput);
        }
        else if(!boxInput.value.match(nameRegex)){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'lastname'){

        if(boxInput.value.length < 3){
            showError(true, box, boxInput);
        }
        else if(!boxInput.value.match(nameRegex)){
            showError(true, box, boxInput)
        }
        else{
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
    if(errors.firstname || errors.lastname){
        console.log('Hay un error')
    }
    else{
        // console.log("Todo ok")
        form.submit();
    }
}








