var mainurl = "<?php echo e(url('/')); ?>";

$(document).ready(function () {
    $('.encSlide').slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 1,
        nextArrow: '.enNext',
        prevArrow: '.enPrev'
        // responsive: [
        // {
        //     breakpoint: 1024,
        //     settings: {
        //     slidesToShow: 3,
        //     slidesToScroll: 3,
        //     infinite: true,
        //     }
        // },
        // {
        //     breakpoint: 600,
        //     settings: {
        //     slidesToShow: 2,
        //     slidesToScroll: 2
        //     }
        // },
        // {
        //     breakpoint: 480,
        //     settings: {
        //     slidesToShow: 1,
        //     slidesToScroll: 1
        //     }
        // }
        // ]
    });
});

$(document).ready(function () {
    $('.hearSlide').slick({
        dots: true,
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false
    });
});


$(document).ready(function () {
    const minus = $('.quantity__minus');
    const plus = $('.quantity__plus');
    const input = $('.quantity__input');
    minus.click(function (e) {
        e.preventDefault();
        var value = input.val();
        if (value > 1) {
            value--;
        }
        input.val(value);
    });

    plus.click(function (e) {
        e.preventDefault();
        var value = input.val();
        value++;
        input.val(value);
    })
});

$('.mqSlider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    // asNavFor: '.slider-for',
    dots: false,
    focusOnSelect: true,
    arrows: false,
});

$('a[data-slide]').click(function (e) {
    e.preventDefault();
    var slideno = $(this).data('slide');
    $('.mqSlider').slick('slickGoTo', slideno - 1);
    $('a[data-slide]').removeClass('active');
    $(this).addClass('active');
});


//hide all tabs first
$('.tab-content-1').hide();
//show the first tab content
$('#tab-1').show();

$('#select-box').change(function () {
    dropdown = $('#select-box').val();
    //first hide all tabs again when a new option is selected
    $('.tab-content-1').hide();
    //then show the tab content of whatever option value was selected
    $('#' + "tab-" + dropdown).show();
});


var btn = $('#upPage');

$(window).scroll(function () {
    if ($(window).scrollTop() > 300) {
        btn.addClass('show');
    } else {
        btn.removeClass('show');
    }
});

btn.on('click', function (e) {
    e.preventDefault();
    $('html, body').animate({scrollTop: 0}, '400');
});


new WOW().init();


$(document).ready(function () {
    $('.collapse')
        .on('shown.bs.collapse', function () {
            $(this)
                .parent()
                .find(".fa-plus")
                .removeClass("fa-plus")
                .addClass("fa-minus");
        })
        .on('hidden.bs.collapse', function () {
            $(this)
                .parent()
                .find(".fa-minus")
                .removeClass("fa-minus")
                .addClass("fa-plus");
        });
});


$('.counter').counterUp({
    delay: 20,
    time: 3000
});

// Add product to cart
$(document).on("click", ".add-cart", function (e) {
    e.preventDefault();
    $.get($(this).data("href"), function (data) {
        console.log(data);
        if (data == "digital") {
            toastr.error('Already Added To Cart.');
        } else if (data[0] == 0) {
            toastr.error('Out Of Stock');
        } else {
            $("#cart-count").html(data[0]);
            $("#cart-count1").html(data[0]);
            $("#total-cost").html(data[1]);
            $(".cart-popup").load(mainurl + "/carts/view");

            toastr.success('Successfully Added To Cart.');
        }
    });
    return false;
});

// Add product to wishlist
$(document).on("click", ".add_to_wishlist", function (e) {
    if ($(this).data("href")) {
        e.preventDefault();
        $.get($(this).data("href"), function (data) {
            if (data[0] == 1) {
                toastr.success(data["success"]);
                $("#wishlist-count").html(data[1]);
                $("#wishlist-count1").html(data[1]);
            } else {
                toastr.error(data["error"]);
            }
        });
    }
});