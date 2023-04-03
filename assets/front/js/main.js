// // SLIDER
function mainSlider1Init() {
    var interleaveOffset = 0.5;
    var swiperOptions = {
        loop: true,
        speed: 1000,
        parallax: true,
        // autoplay: {
        //     delay: 3500,
        //     disableOnInteraction: false,
        // },
        autoplay: false,
        grabCursor: false,
        pagination: {
            el: '.swiper-pagination',
            clickable: true
            // type: "fraction",
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev'
        }
        // on: {
        //     progress: function () {
        //         var swiper = this;
        //         for (var i = 0; i < swiper.slides.length; i++) {
        //             var slideProgress = swiper.slides[i].progress;
        //             var innerOffset = swiper.width * interleaveOffset;
        //             var innerTranslate = slideProgress * innerOffset;
        //             swiper.slides[i].querySelector('.slide-inner').style.transform = 'translate3d(' + innerTranslate + 'px, 0, 0)';
        //         }
        //     },
        //     touchStart: function () {
        //         var swiper = this;
        //         for (var i = 0; i < swiper.slides.length; i++) {
        //             swiper.slides[i].style.transition = '';
        //         }
        //     },
        //     setTransition: function (speed) {
        //         var swiper = this;
        //         for (var i = 0; i < swiper.slides.length; i++) {
        //             swiper.slides[i].style.transition = speed + 'ms';
        //             swiper.slides[i].querySelector('.slide-inner').style.transition = speed + 'ms';
        //         }
        //     }
        // }
    };

    var homeSlider = new Swiper('.homeSlider', swiperOptions);

    var pageSection = $('.bg-image');
    pageSection.each(function (indx) {
        if ($(this).attr('data-background')) {
            $(this).css('background-image', 'url(' + $(this).data('background') + ')');
        }
    });
}
mainSlider1Init();

$('a[href="#search"]').on('click', function (event) {
    event.preventDefault();
    $('#search').addClass('open');
    $('#search > form > input[type="search"]').focus();
});

$('#search, #search button.close').on('click keyup', function (event) {
    if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
        $(this).removeClass('open');
    }
});

//gsap loader
const tl = gsap.timeline({ duration: 0.1 });
function preLoader(tl) {
    tl.to('.preLoader.black > img', {
        delay: 1,
        y: 50,
        autoAlpha: 0
    })
        .to('.preLoader.black', {
            yPercent: -100
        })
        .to('.preLoader.white', {
            yPercent: -100
        })
        .to('.preLoader', {
            css: {
                display: 'none'
            }
        })

        .from('.mouse', {
            y: -50,
            autoAlpha: 0
        })
        .from(
            '.scroll',
            {
                autoAlpha: 0,
                y: -100,
                stagger: 0.05
            },
            '>-0.5'
        )

        .from('.navbar-brand > img', {
            x: -50,
            autoAlpha: 0
        })

        .from(
            '.navbar-nav > li, .form-inline a',
            {
                autoAlpha: 0,
                x: 100,
                stagger: 0.05
            },
            '>-0.5'
        )

        .from('.slideOne', {
            autoAlpha: 0,
            yPercent: 100,
            stagger: 0.05
        });
    // .from(
    //  '.bg-image',
    //  {
    //      autoAlpha: 0
    //  },
    //  '<-0.25'
    // )
}

// function initialization
$(window).on('load', function () {
    preLoader(tl);
});

var logoSlider = new Swiper('.logoSlider', {
    loop: true,
    autoplay: true,
    slidesPerView: 5,
    spaceBetween: 10,
    centeredSlides: true,
    roundLengths: true,
    // If we need pagination

    breakpoints: {
        1024: {
            slidesPerView: 5,
            spaceBetween: 10
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 20
        },
        640: {
            slidesPerView: 2,
            spaceBetween: 10
        },
        576: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        375: {
            slidesPerView: 1,
            spaceBetween: 10
        }
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },
    pagination: {
        el: '.swiper-pagination'
        // type: 'fraction'
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar'
    }
});

var industrySlider = new Swiper('.industrySlider', {
    loop: true,
    slidesPerView: 4,
    spaceBetween: 20,
    // If we need pagination

    breakpoints: {
        1024: {
            slidesPerView: 4,
            spaceBetween: 20
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        640: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        576: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        375: {
            slidesPerView: 1,
            spaceBetween: 10
        }
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev'
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar'
    }
});

var logoSlider = new Swiper('.logoSlider', {
    loop: true,
    slidesPerView: 5,
    spaceBetween: 20,
    // If we need pagination

    breakpoints: {
        1024: {
            slidesPerView: 5,
            spaceBetween: 20
        },
        768: {
            slidesPerView: 1,
            spaceBetween: 20
        },
        640: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        576: {
            slidesPerView: 1,
            spaceBetween: 10
        },
        375: {
            slidesPerView: 1,
            spaceBetween: 10
        }
    },

    // Navigation arrows
    navigation: {
        nextEl: '.swiper-button-next2',
        prevEl: '.swiper-button-prev2'
    },

    // And if we need scrollbar
    scrollbar: {
        el: '.swiper-scrollbar'
    }
});

function imgRevealer() {
    let revealContainers = document.querySelectorAll('.reveal');

    revealContainers.forEach((container) => {
        let image = container.querySelector('img');
        let revelerTl = gsap.timeline({
            scrollTrigger: {
                // scroller: '[data-scroll-container]',
                trigger: container,
                toggleActions: 'restart none none reverse'
            }
        });

        revelerTl.set(container, { autoAlpha: 1 });
        revelerTl.from(container, 0.75, {
            xPercent: -100,
            ease: Power2.out
        });
        revelerTl.from(image, 0.75, {
            xPercent: 100,
            scale: 1.3,
            delay: -0.75,
            ease: Power2.out
        });
    });
}

imgRevealer();

function mousecursor() {
    if ($('body')) {
        const e = document.querySelector('.cursor-inner'),
            t = document.querySelector('.cursor-outer');
        let n,
            i = 0,
            o = !1;
        (window.onmousemove = function (s) {
            o || (t.style.transform = 'translate(' + s.clientX + 'px, ' + s.clientY + 'px)'), (e.style.transform = 'translate(' + s.clientX + 'px, ' + s.clientY + 'px)'), (n = s.clientY), (i = s.clientX);
        }),
            $('body').on('mouseenter', 'a, img, .cursor-pointer', function () {
                e.classList.add('cursor-hover'), t.classList.add('cursor-hover');
            }),
            $('body').on('mouseleave', 'a, img, .cursor-pointer', function () {
                ($(this).is('a, img') && $(this).closest('.cursor-pointer').length) || (e.classList.remove('cursor-hover'), t.classList.remove('cursor-hover'));
            }),
            (e.style.visibility = 'visible'),
            (t.style.visibility = 'visible');
    }
}

$(function () {
    mousecursor();
});

const heading = document.querySelectorAll('.secHeading *');

heading.forEach((text) => {
    const headingTl = gsap.timeline({
        scrollTrigger: {
            // scroller: '[data-scroll-container]',
            trigger: text,
            toggleActions: 'play none none reset'
        }
    });
    headingTl.from(text, 1, {
        y: 120,
        autoAlpha: 0,
        ease: 'power4.out'
    });
});

AOS.init({
    duration: 1200
});