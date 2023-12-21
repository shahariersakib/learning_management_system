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
    <link href="{{ asset('/frontend') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/fontawesome.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/templatemo-grad-school.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/owl.css">
    <link rel="stylesheet" href="{{ asset('/frontend') }}/assets/css/lightbox.css">

    <style>
        .course-card {
            background-color: #ffffff;
            transition: transform 0.3s ease-in-out;
        }

        .course-card:hover {
            transform: scale(1.03);
        }

        .course-title {
            color: #333;
            font-size: 28px;
            margin-bottom: 10px;
        }

        .course-desc {
            color: #555;
            font-size: 16px;
            margin-bottom: 20px;
        }

        .course-price {
            color: #ff6600;
            font-size: 18px;
        }

        .enroll-button {
            margin-top: 20px;
        }

        section.why-us {
            padding-bottom: 58px;
            padding-top: 10px;
        }
    </style>
</head>

<body>
    <!--header-->
    @include('layouts.frontend_layout.navbar')

    <section class="section course-details why-us" style="margin-top: 80px; background-color: #f4f4f4; width:100%;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if ($courses)
                    <div class="course-card p-4 rounded shadow">
                        <h2 class="course-title">{{ $courses->course_name }}</h2>
                        <p class="course-desc">{{ $courses->course_desc }}</p>
                        <p class="course-price">Price: {{ $courses->course_price }}</p>
                        <video controls height="300px" width="1060px">
                            <source src="{!! $courses->course_intro_link !!}" type="video/youtube">
                            Your browser does not support the video tag.
                        </video><br>
                        @if (!$enrollmentAccepted ?? false)
                        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#enrollModal">
                            Enroll Now
                        </button>
                        @endif
                    </div>
                    @else
                    <p class="text-center">No course details available.</p>
                    @endif
                </div>
                <div class="col-md-4">
                    <!-- Course Intro Video Goes Here -->
                </div>
            </div>
        </div>
    </section>

    <!-- Enroll Now Modal -->
    <div class="modal fade" id="enrollModal" tabindex="-1" role="dialog" aria-labelledby="enrollModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="enrollModalLabel">Enroll in Course</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="enrollForm" action="{{ route('enroll.submit', ['course_id' => $courses->id]) }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="sender_mobile_number">Sender Mobile Number</label>
                            <input type="text" class="form-control" id="sender_mobile_number" name="sender_mobile_number" required>
                        </div>
                        <div class="form-group">
                            <label for="trx_number">Transaction Number</label>
                            <input type="text" class="form-control" id="trx_number" name="trx_number" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Amount</label>
                            <input type="number" class="form-control" id="amount" name="amount" required>
                        </div>
                        <div class="form-group">
                            <label for="payment_method">Payment Method</label>
                            <select class="form-control" id="payment_method" name="pay_method" required>
                                <option value="" default>--Select--</option>
                                <option value="Bkash">Bkash</option>
                                <option value="Rocket">Rocket</option>
                                <option value="Nagad">Nagad</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Enroll Now</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Lessons Section (Displayed if enrollment is accepted) -->
    {{-- <!-- @if ($enrollmentAccepted ?? false) --> --}}
    <section class="section course-lessons">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>Course Lessons</h2>
                    <div class="lessons-list">
                        @foreach ($lessons as $lesson)
                        <div class="lesson-item">
                            <h4>{{ $lesson->lesson_name }}</h4>
                            <!-- <video controls>
                                <source src="{! $lesson->lesson_link !}" type="video/youtube">
                            </video> -->
                            <p>{!! $lesson->lesson_link !!}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <!-- @endif --> --}}

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
    <script src="{{ asset('/frontend') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('/frontend') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('/frontend') }}/assets/js/isotope.min.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/owl-carousel.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/lightbox.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/tabs.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/video.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/slick-slider.js"></script>
    <script src="{{ asset('/frontend') }}/assets/js/custom.js"></script>
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

