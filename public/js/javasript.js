let menuIcon = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menuIcon.onclick = () => {
    menuIcon.classList.toggle('bx-x');
    navbar.classList.toggle('active');
};

ScrollReveal({
    reset: true,
    distance: '90px',
    duration: 2000,
    delay: 300
});
ScrollReveal().reveal('.home-content,.heading,.about-content,.about-img img', { origin: 'top' });
ScrollReveal().reveal('.home-img,.hobby-box,.about-img img,.pesan form,.about-content h4,.about-content h5', { origin: 'bottom' });

const typed = new Typed('.multiple-text', {
    strings: ['SAD BOY', 'GOOD BOY', 'SANTUY BOY'],
    typeSpeed: 100,
    backDelay: 1000,
    backSpeed: 100,
    loop: true
});

