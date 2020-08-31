$('.brand-slider').owlCarousel({
    loop: true,
    dots: false,
    nav: true,
    navText: ['', ''],
    margin: 120,
    responsive: {
        1200: {
            items: 5
        },
        970: {
            items: 4
        },
        768: {
            items: 3,
            nav: false,
        },
        480: {
            items: 2,
            nav: false,
        },
        0: {
            items: 2,
            nav: false,
            margin: 40,
        },
    }
})