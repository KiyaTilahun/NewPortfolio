<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clark - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Tiny5&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
        .services-1:hover {
            text-decoration: none !important;
            /* Ensures no underline on hover */
            /* background: #ffbd3969 !important;  */
            background: none !important;


            color: inherit !important;
            /* Ensures the color remains the same on hover */
        }

        .services-1 {

            padding: 1em !important;
        }

        .heading-section h1.big {
            font-size: 70px !important;
        }

        .icon-container:hover {

            transform: scaleY(1.1);
            animation: ease-in 0.5s;

        }
        .skilltext {

font-family: "Tiny5", sans-serif;
font-weight: 400;
font-style: normal;

}

        .icon-container {
            transition: transform 1.5s ease-in-out;
            /* Smooth transition */

        }

        .skilltext {

            font-family: "Tiny5", sans-serif;
            font-weight: 400;
            font-style: normal;

        }

        div.project.framed:hover {
            box-shadow:
                -50px -50px 0 -40px #ffbd39,
                50px 50px 0 -40px #ffbd39;
            opacity: 30%;

        }

        .spinner-border {
            width: 1rem;
            height: 1rem;
            border-width: 0.2em;
            display: none;
            /* Initially hidden */
        }
        .page-item.active .page-link {
    z-index: 1;
    color: #fff;
    background-color: #ffbd39 !important ;
    border-color: #ffbd39 !important;
}

.page-link {
    position: relative;
    display: block;
    padding: 0.5rem 0.75rem;
    margin-left: -1px;
    line-height: 1.25;

    background-color: black !important;
    border: 1px solid #dee2e6;
    color: white !important ;
}
    </style>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">

    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand  skilltext" href="{{ route('home') }}">Kiya</a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link"><span>Main Page</span></a></li>
                    {{-- <li class="nav-item"><a href="index.html#about-section" class="nav-link"><span>About</span></a></li>
                    <li class="nav-item"><a href="index.html#resume-section" class="nav-link"><span>Resume</span></a>
                    </li>
                    <li class="nav-item"><a href="index.html#services-section"
                            class="nav-link"><span>Services</span></a></li>
                    <li class="nav-item"><a href="index.html#skills-section" class="nav-link"><span>Skills</span></a>
                    </li>
                    <li class="nav-item"><a href="index.html#projects-section"
                            class="nav-link"><span>Projects</span></a></li>
                    <li class="nav-item"><a href="index.html#blog-section" class="nav-link"><span>My Blog</span></a>
                    </li> --}}
                    <li class="nav-item"><a href="{{ route('home') }}#contact-section"
                            class="nav-link"><span>Contact</span></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <section class="ftco-section" id="blog-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Blogs</h1>
                    <h2 class="mb-4"><span class="skilltext">LaravelHubET</span> </h2>
                    <p>Check out some of the articles I have posted</p>
                </div>
            </div>
            {{-- <div class="row d-flex">
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="single.html" class="block-20" style="background-image: url('images/image_1.jpg');">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <div class="d-flex align-items-center mb-3 meta">
                                <p class="mb-0">
                                    <span class="mr-2">June 21, 2019</span>
                                    <a href="#" class="mr-2">Admin</a>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </p>
                            </div>
                            <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                    Growth</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry justify-content-end">
                        <a href="single.html" class="block-20" style="background-image: url('images/image_2.jpg');">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <div class="d-flex align-items-center mb-3 meta">
                                <p class="mb-0">
                                    <span class="mr-2">June 21, 2019</span>
                                    <a href="#" class="mr-2">Admin</a>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </p>
                            </div>
                            <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                    Growth</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex ftco-animate">
                    <div class="blog-entry">
                        <a href="single.html" class="block-20" style="background-image: url('images/image_3.jpg');">
                        </a>
                        <div class="text mt-3 float-right d-block">
                            <div class="d-flex align-items-center mb-3 meta">
                                <p class="mb-0">
                                    <span class="mr-2">June 21, 2019</span>
                                    <a href="#" class="mr-2">Admin</a>
                                    <a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>
                                </p>
                            </div>
                            <h3 class="heading"><a href="single.html">Why Lead Generation is Key for Business
                                    Growth</a></h3>
                            <p>A small river named Duden flows by their place and supplies it with the necessary
                                regelialia.</p>
                        </div>
                    </div>
                </div>
            </div> --}}
            @php
            $classes = ['primary', 'secondary', 'dark'];
        @endphp
      <form class="form-inline mr-auto mb-5 d-flex justify-content-between" action="{{ route('allblogs') }}" method="GET">
        @if(request()->has('query')||request()->routeIs('blog.category'))
        <div class="mr-2  my-3" >
            <a href="{{ route('allblogs') }}"><svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" viewBox="0 0 24 24" fill="#ffbd39">
<path d="M10 15H12C15.3137 15 18 12.3137 18 9C18 5.68629 15.3137 3 12 3H8C4.68629 3 2 5.68629 2 9C2 10.5367 2.57771 11.9385 3.52779 13M16 21C19.3137 21 22 18.3137 22 15C22 13.4633 21.4223 12.0615 20.4722 11M12 21C8.68629 21 6 18.3137 6 15C6 11.6863 8.68629 9 12 9H14" stroke="#1C274C" stroke-width="1.5" stroke-linecap="round"/>
</svg> Go to all Posts</a>
        </div>
    @endif

       <div class="align-self-end ml-auto"> <input class="form-control mr-sm-2" type="search" name="query" value="{{$query??''}}" aria-label="Search" required>
        <button class="btn btn-outline-warning my-3 " type="submit">Search</button></div>
    

    </form>
    
            <div class="row d-flex">
              
                @foreach ($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <a href="{{route('blog.name',['slug'=>$blog->slug])}}" class="block-20" style="background-image: url('{{ asset($blog->thumbnail??'images/image_2.jpg') }}'); background-size: cover; background-position: center; width: 300px; height: 200px;">
                            </a>
                            <div class="text mt-3 float-right d-block">
                                <div class="d-flex align-items-center mb-3 meta">
                                    <p class="mb-0">
                                        <span class="mr-2">{{ $blog->published_at->format('F j, Y') }}</span>
                                        <a href="{{route('blog.name',['slug'=>$blog->slug])}}" class="mr-2">{{ $blog->author ?? 'Kiya' }}</a>
                                        <a href="{{route('blog.name',['slug'=>$blog->slug])}}" class="meta-chat"><span class="icon-chat"></span> {{ $blog->view_count }}</a>
                                    </p>
                                </div>
                                <div class="categories mt-2">
                                    @foreach ($blog->categories as $category) 
                                    
                                     <!-- Assuming each blog has a categories relationship -->
                                     @php
                                     // Randomly pick a class for the category badge
                                     $randomClass = $classes[array_rand([0,1,2])];
                                    
                                    @endphp
                  
                                 <span class="badge badge-{{ $randomClass }}">{{ $category->title }}</span>
                                    @endforeach
                                </div>
                                <h3 class="heading"><a href="">{{ $blog->title }}</a></h3>
                                <p>{{ strip_tags(Str::limit($blog->body, 100)) }}</p> <!-- Limits the body text to 100 characters -->
                               
                            </div>
                        </div>
                    </div>
                @endforeach
                @if(session('message'))
               

                <p class="text-center w-100 m-auto"><a href="{{ route('download', ['file_label' => 'CV']) }}"
                    class="btn btn-primary py-3 px-3" target="_blank">   {{ session('message') }}</a></p>
@endif
            </div>
            
            <!-- Pagination links -->
            <div class="pagination justify-content-center">
                {{ $blogs->links() }}
            </div>
            
            
        </div>
    </section>
    <footer class="ftco-footer ftco-section">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">About</h2>
                        <p>Software Engineer specializing in backend development, mainly using PHP and Laravel</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                            <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md">
                    <div class="ftco-footer-widget mb-4 ml-md-4">
                        <h2 class="ftco-heading-2">Links</h2>
                        <ul class="list-unstyled">
                            <li><a href="{{route('home')}}"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                          
                            <li><a href="{{route('home')}}#contact-section"><span class="icon-long-arrow-right mr-2"></span>Contact</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="col-md">
                    <div class="ftco-footer-widget mb-4">
                        <h2 class="ftco-heading-2">Have a Questions?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon icon-map-marker"></span><span class="text">Addis
                                        Ababa,Ethiopia</span></li>
                                <li><a href="tel:+251943072433"><span class="icon icon-phone"></span><span
                                            class="text">+251943072433</span></a></li>


                                <li><a href="mailto:kiyatilahun0@gmail.com"><span
                                            class="icon icon-envelope"></span><span
                                            class="text">kiyatilahun0@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 text-center">

                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        Copyright &copy;
                        <script>
                            document.write(new Date().getFullYear());
                        </script> All rights reserved 
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>
        </div>
    </footer>

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('js/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/aos.js') }}"></script>
    <script src="{{ asset('js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('js/scrollax.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('input, textarea').on('focus', function() {
            const errorMessage = $(this).next('.text-danger');
            if (errorMessage.length) {
                errorMessage.remove(); // Remove the error message
            }
        });
            $('.contact-form').on('submit', function(e) {
                e.preventDefault(); // Prevent the default form submission
                const submitButton = $(this).find('button[type="submit"]');
                const spinner = submitButton.find('.spinner-border');
                submitButton.prop('disabled', true); // Disable the button to prevent multiple submissions
                spinner.show();
                $.ajax({
                    url: $(this).attr('action'), // Form action URL
                    method: 'POST',
                    data: $(this).serialize(), // Serialize form data
                    success: function(response) {
                        // Show success message
                        $('.alert-success').remove(); // Remove any previous alerts
                        const alert = `
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${response.success}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>`;

                        // Prepend alert inside the form
                        $('.contact-form').prepend(alert);
                        // Reset form fields
                        $('.contact-form')[0].reset();
                    },
                    error: function(xhr) {
                        // Handle validation errors
                        const errors = xhr.responseJSON.errors;
                        $('.text-danger').remove(); // Clear previous error messages
                        for (const key in errors) {
                            const errorMessage = errors[key][0]; // Get the first error message
                            $('[name="' + key + '"]').after('<span class="text-danger">' +
                                errorMessage + '</span>');
                        }
                    },
                    complete: function() {
                    // Hide the spinner and enable the button again
                    spinner.hide(); // Hide the spinner
                    submitButton.prop('disabled', false); // Enable the button
                }
                });
            });
        });
    </script>

</body>

</html>
