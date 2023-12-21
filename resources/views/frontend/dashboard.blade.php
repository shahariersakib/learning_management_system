<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Educo Lab</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('public/frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/owl.css">
    <link rel="stylesheet" href="{{ asset('public/frontend') }}/assets/css/lightbox.css">

</head>

<body>
    <!--header-->
    @include('layouts.frontend_layout.navbar')

    <section class="section course-details why-us" style="margin-top: 80px; background-color: #f4f4f4; width:100%;">
        <div class="container">
            <h1>Welcome to Your Student Dashboard, {{ auth()->user()->name }}</h1>

            <h2>Enrolled Courses</h2>
            <ul>
                @foreach ($enrolledCourses as $enroll)
                    <li>{{ $enroll->course->course_name }}</li>
                @endforeach
            </ul>
        </div>
    </section>


    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <p><i class="fa fa-copyright"></i>Copyright &copy; 2023 by Educo Lab</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('public/frontend') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('public/frontend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('public/frontend') }}/assets/js/isotope.min.js"></script>
    <script src="{{ asset('public/frontend') }}/assets/js/owl-carousel.js"></script>
    <script src="{{ asset('public/frontend') }}/assets/js/lightbox.js"></script>
    <script src="{{ asset('public/frontend') }}/assets/js/tabs.js"></script>
    <script src="{{ asset('public/frontend') }}/assets/js/video.js"></script>
    <script src="{{ asset('public/frontend') }}/assets/js/slick-slider.js"></script>
    <script src="{{ asset('public/frontend') }}/assets/js/custom.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $("#enrollModal").modal({
                backdrop: 'static',
                keyboard: false
            });
        });
    </script>
</body>

</html>

