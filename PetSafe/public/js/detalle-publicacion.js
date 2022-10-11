//Imagenes preview
const imgs = document.querySelectorAll('.img-select a'),
      imgBtns = [...imgs],
      btnShowMore = document.getElementById('show-more'),
      petDesc = document.getElementById('pet-description');
let imgId = 1;

imgBtns.forEach((imgItem) => {
    imgItem.addEventListener('click', (event) => {
        event.preventDefault();
        imgId = imgItem.dataset.id;
        slideImage();
    });
});

function slideImage(){
    const displayWidth = document.querySelector('.img-showcase img:first-child').clientWidth;

    document.querySelector('.img-showcase').style.transform = `translateX(${- (imgId - 1) * displayWidth}px)`;
}

window.addEventListener('resize', slideImage);
//Imagenes preview

if (petDesc.clientHeight > 360) {
    btnShowMore.classList.add('active');
    petDesc.classList.add('limited-height');
}
if (petDesc.clientHeight < 360) {
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