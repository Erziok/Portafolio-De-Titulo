const navbarItem = document.getElementsByClassName('navbar-item'),
      dropdownItem = document.getElementsByClassName('dropdown'),
      chevronNav = document.getElementsByClassName('chevron-link'),
      linksContainer = document.getElementById('links-container'),
      mobileMenu = document.getElementById('mobile-menu');


for (let i = 0; i < navbarItem.length; i++) {
    navbarItem[i].addEventListener('click', function () {
        if (dropdownItem[i].classList.contains("remove-item")) {
            dropdownItem[i].classList.remove("remove-item");
        }
        dropdownItem[i].classList.toggle("dropdown-active");
        chevronNav[i].classList.toggle("dropdown-active-icon");
    });
}

mobileMenu.addEventListener("click", function () {
    linksContainer.classList.toggle("links-container-active");
    for (let i = 0; i < dropdownItem.length; i++) {
        if (dropdownItem[i].classList.contains("dropdown-active")) {
            chevronNav[i].classList.remove("dropdown-active-icon");

            dropdownItem[i].classList.add("remove-item");
            dropdownItem[i].classList.remove("dropdown-active")
            
        }
    }
});
