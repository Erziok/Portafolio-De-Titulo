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
select.addEventListener('click', function() {
    list.classList.toggle('active');
});

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
    if (searchIpt.value) {
        removeSearch.classList.add('active');
    }else {
        removeSearch.classList.remove('active');
    }
}

searchIpt.addEventListener('keyup', function (){
    checkSearchInput();
});

removeSearch.addEventListener('click', function(){
    searchIpt.value = "";
    checkSearchInput();
});

searchForm.addEventListener('submit', (event)=>{
    event.preventDefault();
    if(!searchIpt.value) {
        window.location.href = "publicaciones";
    }else {
        searchForm.submit();
    }
});

// Add/Remove favourite

for (let i = 0; i < favBtn.length; i++) {
    favorite[i].addEventListener('click', function(){
        $.ajax({
            url:base_url+'/agregar-favorito/'+ this.dataset.fav,
            type:'post',
            data: {
                "_token": csfr_token
            },
            success:function(response){
                console.log(response);
            }
        })
    })
    noFavorite[i].addEventListener('click', function(){
        $.ajax({
            url:base_url+'/quitar-favorito/'+ this.dataset.fav,
            type:'post',
            data: {
                "_token": csfr_token
            },
            success:function(response){
                console.log(response);
            }
        })
    })
}