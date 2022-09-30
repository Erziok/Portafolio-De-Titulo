const navbarItem = document.getElementsByClassName('navbar-item'),
      dropdownItem = document.getElementsByClassName('dropdown'),
      chevronNav = document.getElementsByClassName('chevron-link'),
      linksContainer = document.getElementById('links-container'),
      mobileMenu = document.getElementById('mobile-menu');


for (let i = 0; i < navbarItem.length; i++) {
    navbarItem[i].addEventListener('click', function () {
            switch (i) {
                case 0:
                    dropdownItem[i].classList.toggle("dropdown-active-220");
                    chevronNav[i].classList.toggle("dropdown-active-icon");
                    break;
                case 1:
                    dropdownItem[i].classList.toggle("dropdown-active-730");
                    chevronNav[i].classList.toggle("dropdown-active-icon");
                    break;
                case 2:
                    dropdownItem[i].classList.toggle("dropdown-active-255");
                    chevronNav[i].classList.toggle("dropdown-active-icon");
                    break;
                case 3:
                    dropdownItem[i].classList.toggle("dropdown-active-220");
                    chevronNav[i].classList.toggle("dropdown-active-icon");
                    break;
                case 4:
                    dropdownItem[i].classList.toggle("dropdown-active-80");
                    chevronNav[i].classList.toggle("dropdown-active-icon");
                    break;
                default:
                    break;
            }
    });
}

mobileMenu.addEventListener("click", function () {
    for (let i = 0; i < navbarItem.length; i++) {
        switch (i) {
            case 0:
                dropdownItem[i].classList.remove("dropdown-active-220");
                chevronNav[i].classList.remove("dropdown-active-icon");
                break;
            case 1:
                dropdownItem[i].classList.remove("dropdown-active-730");
                chevronNav[i].classList.remove("dropdown-active-icon");
                break;
            case 2:
                dropdownItem[i].classList.remove("dropdown-active-255");
                chevronNav[i].classList.remove("dropdown-active-icon");
                break;
            case 3:
                dropdownItem[i].classList.remove("dropdown-active-220");
                chevronNav[i].classList.remove("dropdown-active-icon");
                break;
            case 4:
                dropdownItem[i].classList.remove("dropdown-active-80");
                chevronNav[i].classList.remove("dropdown-active-icon");
                break;
            default:
                break;
        } 
    }
    linksContainer.classList.toggle("links-container-active");
});