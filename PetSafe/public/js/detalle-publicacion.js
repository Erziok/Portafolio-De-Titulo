
const btnShowMore = document.getElementById('show-more'),
      petDesc = document.getElementById('pet-description'),
      replyBtns = document.getElementsByClassName('btn-reply'),
      replyBoxes = document.getElementsByClassName('reply-box');


if (petDesc.clientHeight > 490) {
    btnShowMore.classList.add('active');
    petDesc.classList.add('limited-height');
}
if (petDesc.clientHeight < 490) {
    btnShowMore.classList.remove('active');
}

btnShowMore.addEventListener('click', function () {
    petDesc.classList.toggle('limited-height');
    if (btnShowMore.classList.contains('minus')) {
        btnShowMore.classList.remove('minus');
        btnShowMore.innerHTML = 'Mostrar Más <i class="fa-solid fa-chevron-down"></i>';
    } else {
        btnShowMore.classList.add('minus');
        btnShowMore.innerHTML = 'Mostrar Menos <i class="fa-solid fa-chevron-up"></i>';
    }
    
});

for (let i = 0; i < replyBtns.length; i++) {
    replyBtns[i].addEventListener('click', function () {
        for (let j = 0; j < replyBoxes.length; j++) {
            replyBoxes[j].classList.remove('active');
        }
        replyBoxes[i].classList.toggle('active');
    });        
}

