const menu = document.querySelector("#menu-btn");
const header = document.querySelector(".header");
const message = document.querySelector('.message');

window.onload = () => {
    window.location.href = "#home";
}

menu.onclick = () => {
    menu.classList.toggle('fa-times');
    header.classList.toggle('active');
    document.body.classList.toggle('active');
}

document.addEventListener('keydown', function(event) {
    if (event.key === 'q') {
        menu.click();
    }
});

if (message) {
    setTimeout(() => {
        message.remove();
    }, 5000);
}

window.onscroll = () => {
    if (window.innerWidth < 991) {
        menu.classList.remove('fa-times');
        header.classList.remove('active');
        document.body.classList.remove('active');
    }
    document.querySelectorAll('section').forEach(sec => {
        let top = window.scrollY;
        let offset = sec.offsetTop - 150;
        let height = sec.offsetHeight;
        let id = sec.getAttribute('id');

        if (top >= offset && top < offset + height) {
            document.querySelectorAll('.header .navbar a').forEach(links => {
                links.classList.remove('active');
                document.querySelector('.header .navbar a[href*='+ id +']').classList.add('active');
            });
        }
    });
}