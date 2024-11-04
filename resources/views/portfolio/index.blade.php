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
    </style>
</head>

<body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">


    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar ftco-navbar-light site-navbar-target" id="ftco-navbar">
        <div class="container">
            <a class="navbar-brand" href="#">KIYA</a>
            <button class="navbar-toggler js-fh5co-nav-toggle fh5co-nav-toggle" type="button" data-toggle="collapse"
                data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>

            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav nav ml-auto">
                    <li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
                    <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
                    <li class="nav-item"><a href="#resume-section" class="nav-link"><span>Resume</span></a></li>
                    <li class="nav-item"><a href="#skill-section" class="nav-link"><span>Skills</span></a></li>
                    {{-- <li class="nav-item"><a href="#skills-section" class="nav-link"><span>Skills</span></a></li> --}}
                    <li class="nav-item"><a href="#projects-section" class="nav-link"><span>Projects</span></a></li>
                    <li class="nav-item"><a href="#blog-section" class="nav-link"><span>My Blog</span></a></li>
                    <li class="nav-item"><a href="#contact-section" class="nav-link"><span>Contact</span></a></li>
                </ul>
            </div>
        </div>
    </nav>
    <section id="home-section" class="hero">
        <div class="home-slider  owl-carousel">
            <div class="slider-item ">
                <div class="overlay"></div>
                <div class="container">
                    <div class="row d-md-flex no-gutters slider-text align-items-end justify-content-end"
                        data-scrollax-parent="true">
                        <div class="one-third js-fullheight order-md-last img"
                            style="background-image:url(images/profile.png);">
                            <div class="overlay"></div>
                        </div>
                        <div class="one-forth d-flex  align-items-center ftco-animate"
                            data-scrollax=" properties: { translateY: '70%' }">
                            {{-- <div class="text">
		          		<span class="subheading">Hello!</span>
			            <h1 class="mb-4 mt-3">I'm <span>Clark Thompson</span></h1>
			            <h2 class="mb-4">A Freelance Web Designer</h2>
			            <p><a href="#" class="btn btn-primary py-3 px-4">Hire me</a> <a href="#" class="btn btn-white btn-outline-white py-3 px-4">My works</a></p>
		            </div> --}}
                            <div class="text">
                                <span class="subheading">Hello!</span>




                                @if (isset($siteFeaturesArray['LANDING']))
                                    <div class="landing-section">
                                        @foreach ($siteFeaturesArray['LANDING']['data'] as $item)
                                            <!-- Accessing the 'data' array -->
                                            @if (isset($item['description']))
                                                <div class="feature-description">
                                                    {!! html_entity_decode($item['description']) !!} <!-- Display the description -->
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
            </div>


    </section>

    <section class="ftco-about img ftco-section ftco-no-pb" id="about-section">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 col-lg-5 d-flex">
                    <div class="img-about img d-flex align-items-stretch">
                        <div class="overlay"></div>
                        <div class="img d-flex  align-items-start"
                            style="background-image: url('{{ asset('images/profile2.png') }}');">
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-7 pl-lg-5 pb-5">
                    <div class="row justify-content-start pb-3">
                        <div class="col-md-12 heading-section ftco-animate">

                            @if (isset($siteFeaturesArray['ABOUT']))
                                <h1 class="big">About</h1>
                                <h2 class="mb-4">About Me</h2>
                                <p>{!! $siteFeaturesArray['ABOUT']['description'] !!}</p>
                                <ul class="about-info mt-4 px-md-0 px-2">

                                    @foreach ($siteFeaturesArray['ABOUT']['data'] as $item)
                                        <!-- Accessing the 'data' array -->
                                        @if (isset($item['description']))
                                            <!-- Display the content in a readable format -->
                                            {!! html_entity_decode($item['description']) !!}
                                        @endif
                                    @endforeach
                            @endif
                            </ul>
                        </div>
                    </div>
                    <div class="counter-wrap ftco-animate d-flex mt-md-3">
                        <div class="text">
                            <p class="mb-4">
                                <span class="number" data-number="120">0</span>
                                <span>Project complete</span>
                            </p>
                            <p><a href="{{ route('download', ['file_label' => 'CV']) }}"
                                    class="btn btn-primary py-3 px-3" target="_blank">Download CV</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb" id="resume-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-10 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Resume</h1>
                    <h2 class="mb-4">Resume</h2>
                    <p>This section provides an overview of my educational background and Job Experience.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    @if (isset($siteFeaturesArray['RESUME']))
                        @foreach ($siteFeaturesArray['RESUME']['data'] as $item)
                            <!-- Accessing the 'data' array -->


                            <div class="resume-wrap ftco-animate">
                                <span class="date">{{ $item['icon'] }}</span>
                                <h2>{{ $item['title'] }}</h2>
                                <span class="position">{{ $item['subtitle'] }}</span>
                                <p class="mt-4">
                                    @if (isset($item['description']))
                                        <!-- Display the content in a readable format -->
                                        {!! html_entity_decode($item['description']) !!}
                                    @endif
                                </p>
                            </div>
                        @endforeach
                    @endif
                </div>


            </div>
            <div class="row justify-content-center mt-5">
                <div class="col-md-6 text-center ftco-animate">
                    <p><a href="{{ route('download', ['file_label' => 'CV']) }}" class="btn btn-primary py-4 px-5"
                            target="_blank">Download CV</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section " id="skill-section">
        <div class="container">
            <div class="row justify-content-center py-5 mt-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Skills</h1>
                    <h2 class="mb-4">Skills</h2>
                    <p>Below, I’ve outlined the specific technologies and frameworks I have experience with:</p>
                </div>
            </div>


            {{-- Languages  --}}
            <div class="col-md-12 heading-section text-center ftco-animate">

                <h1 class="big big-2">Programming Languages</h1>

                <h2 class="mb-4">Programming Languages</h2>
            </div>
            <div class="row text-center">

                @foreach ($socialArray['PROGRAMMING_LANGUAGES']['url'] as $urlEntry)
                    <div class="col-md-2 text-center d-flex icon-container ">


                        <div class="services-1" style="">
                            <span class="icon">

                                @if (isset($urlEntry['url']))
                                    <img src="{{ $urlEntry['url'] }}" alt="{{ $urlEntry['sociallink'] }}"
                                        width="70" height="70">
                                @endif

                            </span>
                            <div class=" skilltext">
                                {{ $urlEntry['sociallink'] ?? 'Default Title' }}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
            {{-- <hr class="hr" style="height: 1px; background-color:#ffbd39; border: none;margin:2em;">  --}}
            {{-- frameworks --}}
            <div class="col-md-12 heading-section text-center ftco-animate">

                <h1 class="big big-2">Frameworks</h1>

                <h2 class="mb-4">Frameworks</h2>
            </div>
            <div class="row">

                @foreach ($socialArray['FRAMEWORKS']['url'] as $urlEntry)
                    <div class="col-md-2 text-center d-flex  icon-container">


                        <div class="services-1" style="">
                            <span class="icon">

                                @if (isset($urlEntry['url']))
                                    <img src="{{ $urlEntry['url'] }}" alt="{{ $urlEntry['sociallink'] }}"
                                        width="70" height="70">
                                @endif

                            </span>
                            <div class="desc skilltext">
                                {{ $urlEntry['sociallink'] ?? 'Default Title' }}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

            {{-- tools --}}
            <div class="col-md-12 heading-section text-center ftco-animate">

                <h1 class="big big-2">Tools</h1>

                <h2 class="mb-4">Tools</h2>
            </div>
            <div class="row">

                @foreach ($socialArray['TOOLS']['url'] as $urlEntry)
                    <div class="col-md-2 text-center d-flex  icon-container">


                        <div class="services-1" style="">
                            <span class="icon">

                                @if (isset($urlEntry['url']))
                                    <img src="{{ $urlEntry['url'] }}" alt="{{ $urlEntry['sociallink'] }}"
                                        width="70" height="70">
                                @endif

                            </span>
                            <div class="desc skilltext">
                                {{ $urlEntry['sociallink'] ?? 'Default Title' }}
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>


    {{-- <section class="ftco-section" id="skills-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Skills</h1>
                    <h2 class="mb-4">My Skills</h2>
                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 animate-box">
                    <div class="progress-wrap ftco-animate">
                        <h3>Photoshop</h3>
                        <div class="progress">
                            <div class="progress-bar color-1" role="progressbar" aria-valuenow="90"
                                aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                <span>90%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 animate-box">
                    <div class="progress-wrap ftco-animate">
                        <h3>jQuery</h3>
                        <div class="progress">
                            <div class="progress-bar color-2" role="progressbar" aria-valuenow="85"
                                aria-valuemin="0" aria-valuemax="100" style="width:85%">
                                <span>85%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 animate-box">
                    <div class="progress-wrap ftco-animate">
                        <h3>HTML5</h3>
                        <div class="progress">
                            <div class="progress-bar color-3" role="progressbar" aria-valuenow="95"
                                aria-valuemin="0" aria-valuemax="100" style="width:95%">
                                <span>95%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 animate-box">
                    <div class="progress-wrap ftco-animate">
                        <h3>CSS3</h3>
                        <div class="progress">
                            <div class="progress-bar color-4" role="progressbar" aria-valuenow="90"
                                aria-valuemin="0" aria-valuemax="100" style="width:90%">
                                <span>90%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 animate-box">
                    <div class="progress-wrap ftco-animate">
                        <h3>WordPress</h3>
                        <div class="progress">
                            <div class="progress-bar color-5" role="progressbar" aria-valuenow="70"
                                aria-valuemin="0" aria-valuemax="100" style="width:70%">
                                <span>70%</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 animate-box">
                    <div class="progress-wrap ftco-animate">
                        <h3>SEO</h3>
                        <div class="progress">
                            <div class="progress-bar color-6" role="progressbar" aria-valuenow="80"
                                aria-valuemin="0" aria-valuemax="100" style="width:80%">
                                <span>80%</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}


    <section class="ftco-section ftco-project" id="projects-section">
        <div class="container">
            <div class="row justify-content-center pb-5">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Projects</h1>
                    <h2 class="mb-4">My Projects</h2>
                    <p>In the following section, you'll find a showcase of some of my projects that demonstrate my skills and passion for innovation.</p>
                </div>
            </div>
            {{-- <div class="row"> --}}
            @foreach ($siteFeaturesArray['PROJECTS']['data'] as $index => $project)
                {{-- Open a new row every two projects --}}
                @if ($index % 2 === 0)
                    <div class="row">
                @endif

                {{-- Alternate between col-md-5 and col-md-7 --}}
                <div class="col-md-{{ $index % 4 === 0 || $index % 4 === 3 ? '7' : '5' }}">
                    <a href="{{ $project['url'] ?? '#' }}" target="_blank">
                        <div class="project img ftco-animate d-flex justify-content-center align-items-center framed"
                            style="background-image: url('{{ $project['image'] }}'); background-position: center !important;">
                            <div class="overlay"></div>
                            <div class="text text-center p-4">
                                <h3>{{ $project['title'] }}</h3>
                                <span>{!! html_entity_decode($project['description']) !!}</span>
                            </div>
                        </div>
                    </a>
                </div>
                {{-- Close the row after two projects --}}
                @if ($index % 2 === 1)
        </div>
        @endif
        @endforeach


        {{-- </div> --}}
        </div>
    </section>


    <section class="ftco-section" id="blog-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Blog</h1>
                    <h2 class="mb-4">My  Blog</h2>
                    <p>Check out some of the articles i have posted</p>
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
                                        <a href="{{route('blog.name',['slug'=>$blog->slug])}}" class="mr-2">{{ $blog->author ?? 'Kiya ' }}</a>
                                        <a href="{{route('blog.name',['slug'=>$blog->slug])}}" class="meta-chat"><span class="icon-eye"></span> {{ $blog->view_count }}</a>
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
            </div>
            
            <!-- Pagination links -->
            {{-- <div class="pagination">
                {{ $blogs->links() }}
            </div> --}}
            
            
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb ftco-counter img" id="section-counter">
        <div class="container">
            <div class="row d-md-flex align-items-center">
                {{-- <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number" data-number="100">0</strong>
                            <span>Awards</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number" data-number="1200">0</strong>
                            <span>Complete Projects</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number" data-number="1200">0</strong>
                            <span>Happy Customers</span>
                        </div>
                    </div>
                </div>
                <div class="col-md d-flex justify-content-center counter-wrap ftco-animate">
                    <div class="block-18">
                        <div class="text">
                            <strong class="number" data-number="500">0</strong>
                            <span>Cups of coffee</span>
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
    </section>
    {{-- style="background-image: url(images/imageportfolio.jpeg)" --}}
    <section class="  img ">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-7 ftco-animate text-center">
                    <h2>I'm <span>Available</span> for freelancing</h2>
                    <p>If you have any project in hand contact me.</p>
                    <p class="mb-0"><a href="mailto:kiyatilahun0@gmail.com" class="btn btn-primary py-3 px-5">Hire me</a></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section ftco-no-pb" id="contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-3">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <h1 class="big big-2">Contact</h1>
                    <h2 class="mb-4">Contact Me</h2>
                    <p>I'm here to help and eager to connect! Whether you have questions, feedback, or just want to say hello, feel free to reach out. </p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                     <!-- Contact Info Section -->
                     <div class="col-md-6">
                        
                        <div class="row d-flex contact-info mb-5">
                            <div class="col-md-6 col-lg-6 d-flex ftco-animate">
                                <div class="align-self-stretch box p-4 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="icon-map-signs"></span>
                                    </div>
                                    <h3 class="mb-4">Address</h3>
                                    <p>Addis Ababa, Ethiopia</p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 d-flex ftco-animate">
                                <div class="align-self-stretch box p-4 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="icon-phone2"></span>
                                    </div>
                                    <h3 class="mb-4">Contact Number</h3>
                                    <p><a href="tel:+251943072433">+251943072433</a></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 d-flex ftco-animate">
                                <div class="align-self-stretch box p-4 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="icon-paper-plane"></span>
                                    </div>
                                    <h3 class="mb-4">Email Address</h3>
                                    <p><a href="mailto:kiyatilahun0@gmail.com">kiyatilahun0@gmail.com</a></p>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6 d-flex ftco-animate">
                                <div class="align-self-stretch box p-4 text-center">
                                    <div class="icon d-flex align-items-center justify-content-center">
                                        <span class="icon-globe"></span>
                                    </div>
                                    <h3 class="mb-4">Website</h3>
                                    <p><a href="https://kiyatilahun.com">www.kiyatilahun.com</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Contact Form Section -->
                    <div class="col-md-6">
                        
                        <form action="{{ route('contact.submit') }}" method="POST" class="bg-light p-4 contact-form">
                            @csrf
                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('success') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
            
                            <div class="form-group">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name" value="{{ old('first_name') }}" required>
                                @if ($errors->has('first_name'))
                                    <span class="text-danger">{{ $errors->first('first_name') }}</span>
                                @endif
                            </div>
            
                            <div class="form-group">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="{{ old('last_name') }}" required>
                                @if ($errors->has('last_name'))
                                    <span class="text-danger">{{ $errors->first('last_name') }}</span>
                                @endif
                            </div>
            
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required>
                                @if ($errors->has('email'))
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
            
                            <div class="form-group">
                                <textarea name="message" cols="30" rows="7" class="form-control" placeholder="Message" required>{{ old('message') }}</textarea>
                                @if ($errors->has('message'))
                                    <span class="text-danger">{{ $errors->first('message') }}</span>
                                @endif
                            </div>
            
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary py-3 px-5">
                                    Send Message 
                                    <span class="spinner-border spinner-border-sm ml-2" role="status" aria-hidden="true"></span>
                                </button>
                            </div>
                        </form>
                    </div>
            
                   
                </div>
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
                            <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                            <li><a href="#about-section"><span class="icon-long-arrow-right mr-2"></span>About</a>
                            </li>
                            <li><a href="#skill-section"><span class="icon-long-arrow-right mr-2"></span>Skills</a>
                            </li>
                            <li><a href="#projects-section"><span
                                        class="icon-long-arrow-right mr-2"></span>Projects</a></li>
                            <li><a href="#contact-section"><span class="icon-long-arrow-right mr-2"></span>Contact</a>
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
