// $(window).scroll(function () {
//     console.log($(window).scrollTop());
// });

$(document).ready(function () {

    $('a.nav-link:nth-child(1)').on('click', function () {
        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top - 87
            }, 800);
        }

    });

    $('a.nav-link:nth-child(2)').on('click', function () {
        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top - 100
            }, 800);
        }

    });

    $('a.nav-link:nth-child(3)').on('click', function () {
        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top - 70
            }, 800);
        }
    });

    $('a.nav-link:nth-child(4)').on('click', function () {
        if (this.hash !== "") {
            event.preventDefault();

            var hash = this.hash;

            $('html, body').animate({
                scrollTop: $(hash).offset().top - 100
            }, 800);
        }
    });

    $(window).scroll(function () {
        function getPos() {
            var Pos = $(window).scrollTop();
            return Pos;
        }

        if (getPos() < 626) {
            $('.nav-link').removeClass('active');
            $('.nav-link:nth-child(1)').addClass('active');
        }

        if (getPos() >= 626) {
            $('.nav-link').removeClass('active');
            $('.nav-link:nth-child(2)').addClass('active');
        }

        if (getPos() >= 1725) {
            $('.nav-link').removeClass('active');
            $('.nav-link:nth-child(3)').addClass('active');
        }

        if (getPos() >= 2430) {
            $('.nav-link').removeClass('active');
            $('.nav-link:nth-child(4)').addClass('active');
        }
    });

    $('.kirim').on('click', function () {
        Swal.fire({
            type: 'success',
            title: 'Pesan',
            text: 'Berhasil dikirim',
        });
    });

});