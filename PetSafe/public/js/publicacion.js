const select = document.getElementById('select'),
    list = document.getElementById('list'),
    selectText = document.getElementById('select-text'),
    options = document.getElementsByClassName('options'),
    input = document.getElementById('search-input'),
    favBtn = document.getElementsByClassName('add-favorite-btn'),
    favorite = document.getElementsByClassName('favorite'),
    noFavorite = document.getElementsByClassName('no-favorite'),
    searchIpt = document.getElementById('search-inpt'),
    removeSearch = document.getElementById('remove-search-field'),
    searchForm = document.getElementById('search-form');

let csfr_token = document.getElementsByName('csrf-token')[0].getAttribute('content');
const base_url = document.getElementsByName('base-url')[0].getAttribute('content');

checkSearchInput();

for (let i = 0; i < favBtn.length; i++) {
    if (document.body.contains(favBtn[i])) {
        favBtn[i].addEventListener('click', function() {
            if (favorite[i].classList.contains('active')) {
                favorite[i].classList.remove('active');
                noFavorite[i].classList.add('active');
            } else {
                noFavorite[i].classList.remove('active');
                favorite[i].classList.add('active');
            }
        });
    }
}
if (document.body.contains(select)) {
    select.addEventListener('click', function() {
        list.classList.toggle('active');
    });
}

for (item of options) {
    item.addEventListener('click', function() {
        selectText.innerHTML = this.innerHTML;
    });
}

for (let i = 0; i < options.length; i++) {
    options[i].addEventListener('click', function () {
        if (options[i].value === 1 || options[i].value === 2 || options[i].value === 3) {
            let form = document.getElementById('filter-form');
            document.getElementById('filter-input').value = options[i].value;
            form.submit();   
        }     
    });
};

function checkSearchInput() {
    if (document.body.contains(searchIpt)) {
        if (searchIpt.value) {
            removeSearch.classList.add('active');
        }else {
            removeSearch.classList.remove('active');
        }
    }
}

if (document.body.contains(searchIpt)) {
    searchIpt.addEventListener('keyup', function (){
        checkSearchInput();
    });
}

if (document.body.contains(removeSearch)) {
    removeSearch.addEventListener('click', function(){
        searchIpt.value = "";
        checkSearchInput();
    });
}

if (document.body.contains(searchForm)) {
    searchForm.addEventListener('submit', (event)=>{
        event.preventDefault();
        if(!searchIpt.value) {
            window.location.href = "publicaciones";
        }else {
            searchForm.submit();
        }
    });
}

// Add/Remove favourite
const overlay = document.getElementsByClassName('publication-overlay');
const loaderFavourite = document.getElementsByClassName('loader-favourite');
const heartFavourite = document.getElementsByClassName('heart-favourite');

function createFavouriteLoader() {
    let html = `
    <lord-icon
        src="https://cdn.lordicon.com/dpinvufc.json"
        trigger="loop"
        colors="primary:#725cfa,secondary:#08a88a"
        style="width:150px;height:150px"
        class="loader-favourite"
        >
    </lord-icon>`;
    return html;
}

function createFavouriteHeart() {
    let html = `
    <lord-icon
        src="https://cdn.lordicon.com/rjzlnunf.json"
        trigger="loop"
        colors="primary:#725cfa,secondary:#85a1fc"
        stroke="55"
        style="width:200px;height:200px"
        class="heart-favourite">
    </lord-icon>`;
    return html;
}


let itemFavs = document.getElementsByClassName('fav-counter');
for (let i = 0; i < favBtn.length; i++) {
    if (document.body.contains(favorite[i])) {
        favorite[i].addEventListener('click', function(){
            $.ajax({
                url:base_url+'/agregar-favorito/'+ this.dataset.fav,
                type:'post',
                data: {
                    "_token": csfr_token
                },
                beforeSend: function() {
                    overlay[i].classList.add('active');
                    overlay[i].innerHTML = createFavouriteLoader();
                },
                complete: function() {
                    overlay[i].innerHTML = createFavouriteHeart();
                    setTimeout(function(){
                        overlay[i].innerHTML = '';
                        overlay[i].classList.remove('active');
                    }, 1030);

                    let currentValue = parseInt(itemFavs[i].textContent);
                    itemFavs[i].textContent = currentValue + 1;
                },
            })
        })
    }
    if (document.body.contains(noFavorite[i])) {
        noFavorite[i].addEventListener('click', function(){
            $.ajax({
                url:base_url+'/quitar-favorito/'+ this.dataset.fav,
                type:'post',
                data: {
                    "_token": csfr_token
                },
                beforeSend: function() {
                    overlay[i].classList.add('active');
                    overlay[i].innerHTML = createFavouriteLoader();
                },
                complete: function() {
                    overlay[i].innerHTML = '';
                    overlay[i].classList.remove('active');

                    let currentValue = parseInt(itemFavs[i].textContent);
                    itemFavs[i].textContent = currentValue - 1;
                },
            })
        })
    }
}