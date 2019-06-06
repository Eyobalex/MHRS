<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Modern House Rental System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicons -->
    <link href="{{ asset("img/favicon.png") }}" rel="icon">
    <link href="{{ asset("img/apple-touch-icon.png")}}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">

    <!-- Bootstrap CSS File -->
    <link href="{{ asset("lib/bootstrap/css/bootstrap.min.css") }}" rel="stylesheet">

    <!-- Libraries CSS Files -->
    <link href="{{ asset("lib/font-awesome/css/font-awesome.min.css") }}" rel="stylesheet">
    <link href="{{ asset("lib/animate/animate.min.css") }}" rel="stylesheet">
    <link href="{{ asset("lib/ionicons/css/ionicons.min.css") }}" rel="stylesheet">
    <link href="{{ asset("lib/owlcarousel/assets/owl.carousel.min.css") }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset("plugins/simplemde/simplemde.min.css") }}">
    <!-- Main Stylesheet File -->
    <link href="{{ asset("css/style.css") }}" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/css/jasny-bootstrap.min.css">


    <!-- =======================================================
      Theme Name: EstateAgency
      Theme URL: https://bootstrapmade.com/real-estate-agency-bootstrap-template/
      Author: BootstrapMade.com
      License: https://bootstrapmade.com/license/
    ======================================================= -->
</head>

<body>

<div class="click-closed"></div>


@yield('content')


<!--/ footer Star /-->

<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <nav class="nav-footer">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#">Home</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">About</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Property</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Blog</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Contact</a>
                        </li>
                    </ul>
                </nav>
                <div class="socials-a">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-facebook" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-twitter" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-instagram" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-pinterest-p" aria-hidden="true"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-dribbble" aria-hidden="true"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="copyright-footer">
                    <p class="copyright color-text-a">
                        &copy; Copyright
                        <span class="color-a">EstateAgency</span> All Rights Reserved.
                    </p>
                </div>
                <div class="credits">
                    <!--
                      All the links in the footer should remain intact.
                      You can delete the links only if you purchased the pro version.
                      Licensing information: https://bootstrapmade.com/license/
                      Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=EstateAgency
                    -->
                    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<!--/ Footer End /-->

<a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<div id="preloader"></div>

<!-- JavaScript Libraries -->
<script src="{{ asset("lib/jquery/jquery.min.js") }}"></script>
<script src="{{ asset("lib/jquery/jquery-migrate.min.js") }}"></script>
<script src="{{ asset("lib/popper/popper.min.js") }}"></script>
<script src="{{ asset("lib/bootstrap/js/bootstrap.min.js") }}"></script>
<script src="{{ asset("lib/easing/easing.min.js") }}"></script>
<script src="{{ asset("lib/owlcarousel/owl.carousel.min.js") }}"></script>
<script src="{{ asset("lib/scrollreveal/scrollreveal.min.js") }}"></script>
<!-- Contact Form JavaScript File -->
<script src="{{ asset("contactform/contactform.js") }}"></script>

<script src="{{ asset("/plugins/simplemde/simplemde.min.js") }}"></script>

<!-- Template Main Javascript File -->
<script src="{{ asset("js/main.js") }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.14.1/moment-with-locales.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jasny-bootstrap/3.1.3/js/jasny-bootstrap.min.js"></script>

<script type="text/javascript">
    $('ul.pagination').addClass('no-margin pagination-sm');
    $('#title').on('blur', function (){
        var theTitle = this.value.toLowerCase().trim(),
            slugInput = $('#slug'),
            theSlug = theTitle.replace(/&/g, '-and-')
                .replace(/[^a-z0-9-]+/g,'-')
                .replace(/\-\-+/g, '-')
                .replace(/^-+|-+$/g, '');
        slugInput.val(theSlug);
    });

    var simplemde = new SimpleMDE({ element: $("description")[0] });


</script>
</body>
</html>


