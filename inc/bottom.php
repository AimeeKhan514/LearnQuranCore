
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<!-- <script src="vendor/bootstrap/dist/js/bootstrap.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"
    integrity="sha512-6PM0qYu5KExuNcKt5bURAoT6KCThUmHRewN3zUFNaoI6Di7XJPTMoT6K0nsagZKk2OB4L7E3q1uQKHNHd4stIQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script type="text/javascript" src="./js/slick.js"></script>
<!-- <script src="vendor/local/js/main.min.js"></script> -->
<script src="./js/wow.min.js"></script>
<script src="./js/app.js"></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js">
</script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    AOS.init();
    // AOS.init({disable: 'mobile'});
</script>
<script type="text/javascript">
    var $videoSrc;
    $('.video-btn').click(function() {
        $videoSrc = $(this).data("src");
    });
    $('#video_pop').on('shown.bs.modal', function(e) {
        $("#video").attr('src', $videoSrc + "?rel=0&amp;showinfo=0&amp;modestbranding=1&amp;autoplay=1");
    })
    $('#video_pop').on('hide.bs.modal', function(e) {
        $("#video").attr('src', $videoSrc);
    })
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#testimonial-slider").owlCarousel({
            items: 1,
            itemsDesktop: [1000, 1],
            itemsDesktopSmall: [979, 1],
            itemsTablet: [768, 1],
            pagination: true,
            transitionStyle: "backSlide",
            autoPlay: true
        });
    });
</script>
<script>
    $(document).ready(function(e) {
        $(document).on('click', '#contact', function(e) {
            e.preventDefault();
            var name = $('#name').val();
            var phone = $('#phone').val();
            var email = $('#email').val();
            $.ajax({
                type: 'POST',
                url: '/message-store',
                data: {
                    'name': name,
                    'phone': phone,
                    'email': email,
                    '_token': 'ooSSjrQTNqDRd0wU3rZHFZ5yO4xVv6jruIgIt0em'
                },
                success: function(res) {
                    console.log(res);
                    localStorage.setItem("message", "Your Request Send successfully")
                    window.location.reload();
                },
                error: function(error) {
                    console.log(error.responseJSON.errors.name)
                    if (error.responseJSON.errors.name) {
                        Toastify({
                            text: error.responseJSON.errors.name,
                            className: "info",
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            }
                        }).showToast();
                    }
                    if (error.responseJSON.errors.phone) {
                        Toastify({
                            text: error.responseJSON.errors.phone,
                            className: "info",
                            style: {
                                background: "linear-gradient(to right, #00b09b, #96c93d)",
                            }
                        }).showToast();
                    }
                }
            })
        })
    });
    $(document).ready(function() {
        //get it if Status key found
        if (localStorage.getItem("message")) {
            Toastify({
                text: "Your Request Send successfully",
                className: "info",
                style: {
                    background: "linear-gradient(to right, #00b09b, #96c93d)",
                }
            }).showToast();
            localStorage.clear();
        }
        var myCarousel = document.querySelector('#myCarousel')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 3000,
            wrap: true
        })
    });
</script>
<script>
    $('.msg').fadeTo(2500, 0.7).fadeOut(2500);
</script>
</body>
<!-- JavaScript -->

<!-- Page Scripts -->

</html>
