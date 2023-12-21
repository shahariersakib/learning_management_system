@php
    $courses = DB::table('courses')->where('status', 1)->get();
@endphp
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet">
    <script src="https://vjs.zencdn.net/7.14.3/video.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Educo Lab</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/owl.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/lightbox.css">
    <style>
        .site-footer {
            background-color: #162238;
            padding: 40px 0;
            font-size: 14px;
            color: black;
            display: flex;
        }

        .site-footer p {
            margin: 8px 0;
        }

        .footer-content {
            text-align: center;
        }

        .footer-logo {
            font-size: 24px;
            margin-bottom: 20px;
            color: white;
        }

        .footer-info {
            margin: 5px 0;
        }

        .social-icons {
            margin-top: 20px;
        }

        .social-icons a {
            display: inline-block;
            margin-right: 15px;
            font-size: 18px;
            color: white;
        }

        .social-icons a:hover {
            color: black;
        }

        @media (max-width: 768px) {
            .site-footer {
                padding: 20px 0;
            }
        }
    </style>
</head>

<body>

    <!--header-->
    @include('layouts.frontend_layout.navbar')

    <!-- ***** Main Banner Area Start ***** -->
    <section class="section main-banner" id="top" data-section="section1">
        <video autoplay muted loop id="bg-video">
            <source src="https://www.youtube.com/embed/1RzKcWEpb5Q" type="video/youtube" />
        </video>
    </section>

    <section class="section why-us" data-section="section2">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Why choose Educo Lab?</h2>
                    </div>
                </div>
                <div class="col-md-12">
                    <div id='tabs'>
                        <ul>
                            <li><a href='#tabs-1'>Best Education</a></li>
                            <li><a href='#tabs-2'>Top Management</a></li>
                            <li><a href='#tabs-3'>Quality Classes</a></li>
                        </ul>
                        <section class='tabs-content'>
                            <article id='tabs-1'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ asset('/frontend') }}/assets/images/choose-us-image-01.png"
                                            alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Best Education</h4>
                                        <p>Educo Lab is free educational HTML template with Bootstrap 4.5.2 CSS layout.
                                            Feel free to use it for educational or commercial purposes. You may want to
                                            make <a href="https://paypal.me/templatemo" target="_parent"
                                                rel="sponsored">a little donation</a> to TemplateMo. Please tell your
                                            friends about us. Thank you.</p>
                                    </div>
                                </div>
                            </article>
                            <article id='tabs-2'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ asset('/frontend') }}/assets/images/choose-us-image-02.png"
                                            alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Top Level</h4>
                                        <p>You can modify this HTML layout by editing contents and adding more pages as
                                            you needed. Since this template has options to add dropdown menus, you can
                                            put many HTML pages.</p>
                                        <p>Suspendisse tincidunt, magna ut finibus rutrum, libero dolor euismod odio,
                                            nec interdum quam felis non ante.</p>
                                    </div>
                                </div>
                            </article>
                            <article id='tabs-3'>
                                <div class="row">
                                    <div class="col-md-6">
                                        <img src="{{ asset('/frontend') }}/assets/images/choose-us-image-03.png"
                                            alt="">
                                    </div>
                                    <div class="col-md-6">
                                        <h4>Quality Meeting</h4>
                                        <p>You are NOT allowed to redistribute this template ZIP file on any template
                                            collection website. However, you can use this template to convert into a
                                            specific theme for any kind of CMS platform such as WordPress. For more
                                            information, you shall <a rel="nofollow"
                                                href="https://templatemo.com/contact" target="_parent">contact
                                                TemplateMo</a> now.</p>
                                    </div>
                                </div>
                            </article>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section courses" data-section="section4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Choose Your Course</h2>
                    </div>
                </div>
                <div class="owl-carousel">
                    @foreach ($courses as $row)
                    <div class="item">
                        <!-- Custom Video Player -->
                        <div class="custom-video-player">
                            <video controls autoplay muted width="270px">
                                <source src="{!! $row->course_intro_link !!}" type="video/youtube">
                                Your browser does not support the video tag.
                            </video>
                        </div>
                        <div class="down-content">
                            <h4>{{ $row->course_name }}</h4>
                            <p>{{ $row->course_desc }}</p>
                            <p>{{ $row->course_price }}</p>
                            <div class="text-button-pay">
                                <a href="{{ route('course.details',$row->course_slug) }}">Details<i class="fa fa-angle-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="footer-content">
                    <p class="footer-logo"><i class="fa fa-graduation-cap"></i> Educo Lab</p>
                        <div class="social-icons">
                            {{-- <a href="{{ $data['facebook'] }}"><i class="fa fa-facebook"></i></a>
                            <a href="{{ $data['twitter'] }}"><i class="fa fa-twitter"></i></a>
                            <a href="{{ $data['instagram'] }}"><i class="fa fa-instagram"></i></a>
                            <a href="{{ $data['youtube'] }}"><i class="fa fa-youtube"></i></a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('/frontend') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('/frontend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('/frontend') }}/assets/js/isotope.min.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/owl-carousel.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/lightbox.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/tabs.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/video.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/slick-slider.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
            var
                direction = section.replace(/#/, ''),
                reqSection = $('.section').filter('[data-section="' + direction + '"]'),
                reqSectionPos = reqSection.offset().top - 0;

            if (isAnimate) {
                $('body, html').animate({
                        scrollTop: reqSectionPos
                    },
                    800);
            } else {
                $('body, html').scrollTop(reqSectionPos);
            }

        };

        var checkSection = function checkSection() {
            $('.section').each(function() {
                var
                    $this = $(this),
                    topEdge = $this.offset().top - 80,
                    bottomEdge = topEdge + $this.height(),
                    wScroll = $(window).scrollTop();
                if (topEdge < wScroll && bottomEdge > wScroll) {
                    var
                        currentId = $this.data('section'),
                        reqLink = $('a').filter('[href*=\\#' + currentId + ']');
                    reqLink.closest('li').addClass('active').
                    siblings().removeClass('active');
                }
            });
        };

        $('.main-menu, .scroll-to-section').on('click', 'a', function(e) {
            if ($(e.target).hasClass('external')) {
                return;
            }
            e.preventDefault();
            $('#menu').removeClass('active');
            showSection($(this).attr('href'), true);
        });

        $(window).scroll(function() {
            checkSection();
        });
    </script>

    <script>
        var player = videojs('my-video');
    </script>
</body>

</html>
