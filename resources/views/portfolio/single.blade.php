<!DOCTYPE html>
<html lang="en">

<head>
    <title>Clark - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/default.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/highlight.min.js"></script>

    <!-- and it's easy to individually load additional languages -->
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/languages/go.min.js"></script> --}}

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/styles/tomorrow-night.min.css">
    <script src="https://cdn.jsdelivr.net/npm/highlightjs-line-numbers.js/dist/highlightjs-line-numbers.min.js"></script>

    <script src="https://unpkg.com/highlightjs-copy/dist/highlightjs-copy.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/highlightjs-copy/dist/highlightjs-copy.min.css" />
    <script>
        hljs.initHighlightingOnLoad();
    </script>

    <style>
        img {
            display: block;
            margin: 0 auto;
        }

        .blog-body{
padding: 4rem;
          box-shadow:
                /* -50px -50px 0 -48px #ffbd39, */
                50px 0px 0 -48px #ffbd39;
            opacity: 30%;
        }

        .blog-body img{
            max-width: 100%;
            height: auto;
            margin-left: 0;
            text-align: start;

        }

        img {
          border-radius: 10px
        }
        pre {
          border-radius: 20px
        }
        .hero-wrap .overlay{
            opacity: 1 !important;
        }
        .overlay {
    position: absolute !important; /* Change from fixed to absolute */
    top: 0 !important;
    left: 0 !important;
    width: 100% !important;
    height: 100% !important;
  
    background-color: rgba(0, 0, 0, 0.5) !important; /* Adjust opacity as needed */
    z-index: 1 !important; /* Ensure it's below the text but above the background */
    display: block !important; /* Make sure it is visible */
    cursor: pointer !important; /* Change if needed */
}
#other {
    position: absolute !important;
    top: 50% !important;        /* Move down to the middle */
    left: 50% !important;       /* Move right to the middle */
    transform: translate(-50%, -50%) !important; /* Shift back by half its own width and height */
    z-index: 2 !important;
}

    </style>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand skilltext" href="{{ route('home') }}">Kiya</a>
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

    <section class="hero-wrap js-fullheight"
        style="background-image: url('{{ asset($blogPost['thumbnail'] ?? 'images/bg_2.png') }}')"
        data-stellar-background-ratio="0.5">
        
        <div class="overlay" ></div>

        <div class="container" id="other">
            <div class="row no-gutters slider-text js-fullheight align-items-end justify-content-center">
                <div class="col-md-12 ftco-animate pb-5 mb-3 text-center">
                    <h1 class="mb-3 bread">{{ $blogPost['title'] }}</h1>

                    @php
                        $classes = ['primary', 'dark'];
                    @endphp
                    @foreach ($blogPost->categories as $category)
                        <!-- Assuming each blog has a categories relationship -->
                        @php
                            // Randomly pick a class for the category badge
                            $randomClass = $classes[array_rand([0, 1])];

                        @endphp

                        <span class="badge badge-{{ $randomClass }}">{{ $category->title }}</span>
                    @endforeach
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('home') }}">Home <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span class="mr-2"><a
                                href="{{ route('home') }}#blog-section">Blog <i
                                    class="ion-ios-arrow-forward"></i></a></span> <span
                            style="color:#ffbd39;">{{ $blogPost['slug'] }}
                            <i class="ion-ios-arrow-forward"></i></span></p>
                            <div><span class="icon-eye"></span> Total Views  {{ $blogPost->view_count }}</div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row">
                <div class=" col-md-8 ftco-animate blog-body">
                    <h2 class="text-start w-100" style="color:#ffbd39;">{{ $blogPost['title'] }}</h2>

                    {!! $blogPost['body'] !!}
                </div> <!-- .col-md-8 -->
                <div class="offset-1 col-md-3 sidebar ftco-animate">

                    <div class="sidebar-box ftco-animate">
                        <h3 class="heading-sidebar">Categories</h3>
                        <ul class="categories">
                          <li><a href="{{route('allblogs')}}" class="btn btn-dark text-start">Show All Blogs</a></li>
                          @foreach ($categories as $category)
                              <li>
                                  <a href="{{route('blog.category',['category'=>$category->title])}}">
                                      {{ $category->title }}
                                      <span>({{ $category->posts_count }})</span>
                                  </a>
                              </li>
                          @endforeach
                      </ul>
                    </div>






                </div>

            </div>
        </div>
    </section> <!-- .section -->


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




    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>


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
    <script src="https://unpkg.com/highlightjs-copy/dist/highlightjs-copy.min.js"></script>
    <script>
        // Get all <code> elements
        const codeElements = document.getElementsByTagName('code');
        const pre = document.getElementsByTagName('pre');


        for (let i = 0; i < pre.length; i++) {
            codeElements[i].classList.add('col-md-6');
        }
        // Loop through the NodeList and log each element
        for (let i = 0; i < codeElements.length; i++) {
            console.log("true");
            console.log(codeElements[i].textContent); // Output the text content of each <code> element
        }
    </script>
    <script>
        hljs.addPlugin(
            new CopyButtonPlugin({
                hook: (text, el) => {
                    let {
                        replace,
                        replacewith
                    } = el.dataset;
                    if (replace && replacewith) {
                        return text.replace(replace, replacewith);
                    }
                    return text;
                },
                callback: (text, el) => {
                    /* logs `gretel configure --key grtf32a35bbc...` */
                    console.log(text);
                },
            })
        );
        hljs.highlightAll();

       
    </script>

</body>

</html>
