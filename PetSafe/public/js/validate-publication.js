
const form = document.getElementById("form")
const submitButton = document.getElementById("submit-btn")

let timeout = null;

let errors = {
    title: true,
    name: true,
    specie: true,
    breed: true,
    gender: true,
    category: true,
    description: true,
    incidentDate: true,
    photo: true,
}

const nameRegex = /^[a-zA-ZÀ-ÿ\s]{1,40}$/



// Input text
document.querySelectorAll('.form-box-text').forEach((box) => {
    const boxInput = box.querySelector('input');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
    
        validateInput(box, boxInput) 
    
    })

});

// Select
document.querySelectorAll('.form-box-select').forEach((box) => {
    const boxInput = box.querySelector('select');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
    
        validateInput(box, boxInput) 

    })

});


// Textarea
document.querySelectorAll('.form-box-textarea').forEach((box) => {
    const boxInput = box.querySelector('textarea');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
    
        validateInput(box, boxInput) 

    })

});


// Input date
document.querySelectorAll('.form-box-date').forEach((box) => {
    const boxInput = box.querySelector('input');

    form.addEventListener('submit', (event) => {
        event.preventDefault();
    
        validateInput(box, boxInput) 

    })

});


// Input file
document.querySelectorAll('.form-box-file').forEach((box) => {
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

    if(boxInput.name == 'title'){

        if(boxInput.value.length < 5){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'name'){

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

    if(boxInput.name == 'specie'){

        if(boxInput.value == ''){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'breed'){

        if(boxInput.value == ''){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'gender'){

        if(boxInput.value == ''){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'category'){

        if(boxInput.value == ''){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'description'){

        if(boxInput.value.length < 10){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'incidentDate'){

        if(boxInput.value == ''){
            showError(true, box, boxInput);
        }
        else{
            showError(false, box, boxInput);
        }

    }

    if(boxInput.name == 'photo'){

        if(boxInput.value == ''){
            showError(true, box, boxInput);
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
    if(errors.title || errors.name || errors.specie || errors.breed || errors.gender || errors.category || errors.description || errors.incidentDate || errors.photo){
        console.log("Hay un error")
    }
    else{
        // console.log("Todo ok")
        form.submit();
    }
}


