
@php
    // Fetch the first site setting
    $siteSetting = \App\Models\SiteSetting::first();
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>BARANGAY CENTRO 2</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="template/img/favicon.png" rel="icon">
  <link href="template/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800&family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
  <!-- Vendor CSS Files -->
  <link href="{{asset('template/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/bootstrap-icons/bootstrap-icons.css')}}"" rel="stylesheet">
  <link href="{{ asset('template/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('template/vendor/swiper/swiper-bundle.min.css ')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('template/css/main.css') }}" rel="stylesheet">

    <style>
        /* Custom slider styling */
.custom-slider {
    height: 500px; /* Adjust the slider height as needed */
    overflow: hidden;
    margin-top: 100px; /* Add top margin to prevent overlap with the header */
}

/* Slider image styling */
.custom-slider .carousel-item img {
    object-fit: cover; /* Makes the image cover the entire slider area */
    height: 100%; /* Takes the full height of the slider */
    width: 100%; /* Takes the full width of the slider */
}
/* Full-width slider styling */
.custom-slider {
    height: 500px; /* Adjust the slider height as needed */
    overflow: hidden;
}

/* Remove padding from the container-fluid to stretch the slider */
.container-fluid {
    padding: 0;
}

/* Slider image styling */
.custom-slider .carousel-item img {
    object-fit: cover; /* Makes the image cover the entire slider area */
    height: 100%; /* Takes the full height of the slider */
    width: 100%; /* Takes the full width of the slider */
}

    </style>
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid position-relative d-flex align-items-center justify-content-between">

      <a href="#hero" class="logo d-flex align-items-center me-auto me-xl-0">
        @if ($siteSetting && $siteSetting->logo)
                    <img src="{{ asset('storage/' . $siteSetting->logo) }}" alt="Barangay Logo" style="max-height: 50px;">
                @else
                    <img src="https://via.placeholder.com/50x50.png?text=Logo" alt="Barangay Logo"> <!-- Fallback logo -->
                @endif
        <h1 class="sitename">BARANGAY</h1>CENTRO 2<span></span>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#portfolio">Visitor's Launch </a></li>
          {{-- <li><a href="#pricing">Pricing</a></li> --}}
          <li><a href="#team">Barangay officials</a></li>
          {{-- <li><a href="#blog">Blog</a></li> --}}
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
                <ul>
                  <li><a href="#">Deep Dropdown 1</a></li>
                  <li><a href="#">Deep Dropdown 2</a></li>
                  <li><a href="#">Deep Dropdown 3</a></li>
                  <li><a href="#">Deep Dropdown 4</a></li>
                  <li><a href="#">Deep Dropdown 5</a></li>
                </ul>
              </li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ auth()->check() ? route('filament.admin.pages.dashboard') : route('filament.admin.auth.login') }}">
        {{ auth()->check() ? 'Dashboard' : 'Login' }}
    </a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    {{-- <section id="hero" class="hero section dark-background" style="position: relative; overflow: hidden;"> --}}

        <!-- Background Image -->
        {{-- <img src="assets/img/hero-bg.jpg" alt="" class="background-image" data-aos="fade-in" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; z-index: -1;"> --}}

        <!-- Content Container -->
       <!-- Content Container -->
       {{-- <section id="hero" class="hero section dark-background"> --}}
        <!-- Full-width Slider Container -->
        <div class="container-fluid position-relative" style="z-index: 1; padding: 0;">
            <div class="row">
                <div class="col-lg-12" data-aos="fade-up" data-aos-delay="300">
                    <!-- Slider Section -->
                    @if(isset($siteSetting->slider_images) && is_array($siteSetting->slider_images) && count($siteSetting->slider_images) > 0)
                    <div id="slider" class="carousel slide custom-slider" data-bs-ride="carousel">
                        <div class="carousel-inner">
                            @foreach($siteSetting->slider_images as $index => $image)
                            <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                <img src="{{ asset('storage/' . $image) }}" class="d-block w-100 slider-image" alt="Slider Image {{ $index + 1 }}">
                            </div>
                            @endforeach
                        </div>
                        <!-- Controls for Slider -->
                        <a class="carousel-control-prev" href="#slider" role="button" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#slider" role="button" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </a>
                    </div>
                    @else
                    <p>No slider images available.</p>
                    @endif
                </div>
            </div>
        </div>
    </section>

    {{-- </section><!-- /Hero Section --> --}}

    <!-- Clients Section -->
    <section id="clients" class="clients section">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          {{-- <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="template/img/clients/client-1.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="template/img/clients/client-2.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="template/img/clients/client-3.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="template/img/clients/client-4.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="template/img/clients/client-5.png" class="img-fluid" alt="">
          </div><!-- End Client Item -->

          <div class="col-xl-2 col-md-3 col-6 client-logo">
            <img src="template/img/clients/client-6.png" class="img-fluid" alt="">
          </div><!-- End Client Item --> --}}

        </div>

      </div>

    </section><!-- /Clients Section -->

    <!-- About Section -->
    <section id="about" class="about section light-background">

      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="row align-items-xl-center gy-5">

          <div class="col-xl-5 content">
            <h3>About Us</h3>
            <h2>Our History</h2>
            <p>The history of our barangay dates back to the early 1900s. It was originally a small farming community that gradually evolved into a vibrant hub of culture and commerce. Our ancestors worked hard to establish the barangay as a place of unity, progress, and shared values.</p>
            <p>Through the years, the barangay has overcome various challenges, including natural disasters, economic hardships, and social changes. Despite these obstacles, our community has remained resilient, maintaining its core values of unity, hard work, and mutual respect.</p>
            <p>Today, our barangay continues to thrive, blending modern progress with our rich cultural heritage. We honor our past by remembering the efforts and sacrifices of those who came before us, and we strive to build a brighter future for the generations to come.</p>
            <a href="#" class="read-more"><span>Read More</span><i class="bi bi-arrow-right"></i></a>
          </div>

          <div class="col-xl-7">
            <div class="row gy-4 icon-boxes">

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="icon-box">
                  <i class="bi bi-buildings"></i>
                  <h3>Mission</h3>
                  <p>To provide satisfactory services through democratic leadership that enables the people to become politically responsible, morally upright, and economically capable.</p>
                </div>
              </div> <!-- End Icon Box -->

               <!-- End Icon Box -->

             <!-- End Icon Box -->

              <div class="col-md-6" data-aos="fade-up" data-aos-delay="500">
                <div class="icon-box">
                  <i class="bi bi-graph-up-arrow"></i>
                  <h3>Vision</h3>
                  <p>An exemplary barangay with unified, disciplined, and God-loving constituents working together towards prosperity</p>
                </div>
              </div> <!-- End Icon Box -->

            </div>
          </div>

        </div>
      </div>

    </section><!-- /About Section -->

    <!-- Stats Section -->
    <section id="stats" class="stats section dark-background">
        <img src="{{ asset('template/img/stats-bg.jpg') }}" alt="" data-aos="fade-in">

        <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
             <!-- Title for the Demographic Section -->
    <h2 class="mb-5 text-center">Demographic Statistics</h2>
            <div class="row gy-4">

            <!-- Total Population -->
            <div class="col-lg-3 col-md-6">
              <div class="text-center stats-item w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $totalPopulation }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Total Population</p>
              </div>
            </div><!-- End Stats Item -->

            <!-- Male Count -->
            <div class="col-lg-3 col-md-6">
              <div class="text-center stats-item w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $maleCount }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Male Count</p>
              </div>
            </div><!-- End Stats Item -->

            <!-- Female Count -->
            <div class="col-lg-3 col-md-6">
              <div class="text-center stats-item w-100 h-100">
                <span data-purecounter-start="0" data-purecounter-end="{{ $femaleCount }}" data-purecounter-duration="1" class="purecounter"></span>
                <p>Female Count</p>
              </div>
            </div><!-- End Stats Item -->

            <!-- Population by Age Groups -->
            <div class="col-lg-3 col-md-6">
              <div class="text-center stats-item w-100 h-100">
                <h3>Population by Age Groups</h3>
                <ul>
                  @foreach ($ageGroups as $ageRange => $count)
                    <li>{{ $ageRange }}: {{ $count }}</li>
                  @endforeach
                </ul>
              </div>
            </div><!-- End Stats Item -->

          </div>
        </div>
      </section><!-- /Stats Section -->

    <!-- Services Section -->
    <section id="services" class="services section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Services</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="100">
            <div class="service-item d-flex">
              <div class="flex-shrink-0 icon"><i class="bi bi-briefcase"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Community Clean-up</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident</p>
              </div>
            </div>
          </div>
          <!-- End Service Item -->

          <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="200">
            <div class="service-item d-flex">
              <div class="flex-shrink-0 icon"><i class="bi bi-card-checklist"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Health and Wellness Programs</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="300">
            <div class="service-item d-flex">
              <div class="flex-shrink-0 icon"><i class="bi bi-bar-chart"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Security and Safety Patrols</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="400">
            <div class="service-item d-flex">
              <div class="flex-shrink-0 icon"><i class="bi bi-binoculars"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Educational Workshops</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="500">
            <div class="service-item d-flex">
              <div class="flex-shrink-0 icon"><i class="bi bi-brightness-high"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link"> Disaster Preparedness Training</a></h4>
                <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
              </div>
            </div>
          </div><!-- End Service Item -->

          <div class="col-lg-6 " data-aos="fade-up" data-aos-delay="600">
            <div class="service-item d-flex">
              <div class="flex-shrink-0 icon"><i class="bi bi-calendar4-week"></i></div>
              <div>
                <h4 class="title"><a href="#" class="stretched-link">Others</a></h4>
                <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
              </div>
            </div>
          </div><!-- End Service Item -->

        </div>

      </div>

    </section><!-- /Services Section -->

    <!-- Features Section -->
    <section id="features" class="features section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Announcement</h2>
            <p>Discover the latest announcements and features in our community.</p>
        </div><!-- End Section Title -->

        <div class="container">
            @foreach($announcements as $index => $announcement)
                <div class="row gy-4 align-items-center features-item">
                    <!-- Alternate the layout for each announcement -->
                    <div class="{{ $index % 2 == 0 ? 'order-2' : 'order-1' }} col-lg-5 {{ $index % 2 == 0 ? 'order-lg-1' : 'order-lg-2' }}" data-aos="fade-up" data-aos-delay="200">
                        <h3>{{ $announcement->name }}</h3>
                        <p>{{ $announcement->description }}</p>
                        <a class="btn-getstarted" href="#">Get Started</a>
                    </div>

                    <div class="{{ $index % 2 == 0 ? 'order-1' : 'order-2' }} col-lg-7 {{ $index % 2 == 0 ? 'order-lg-2' : 'order-lg-1' }} d-flex align-items-center" data-aos="zoom-out" data-aos-delay="100">
                        <div class="image-stack">
                            @if($announcement->image)
                                <img src="{{ asset('storage/' . $announcement->image) }}" alt="{{ $announcement->name }}" class="stack-front img-fluid">
                            @else
                                <img src="{{ asset('template/img/default.jpg') }}" alt="Default Image" class="stack-front img-fluid">
                            @endif
                        </div>
                    </div>
                </div><!-- Features Item -->
            @endforeach
        </div>

    </section><!-- /Features Section -->

    <!-- Portfolio Section -->
    <section id="portfolio" class="portfolio section">
        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
            <h2>Visitors' Launch</h2>
            <p>Explore the tourist spots, restaurants, hotels, parks, schools, hospitals, churches, and SK programs in our barangay.</p>
        </div><!-- End Section Title -->

        <div class="container">
            <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">
                <!-- Portfolio Items -->
                <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

                    <!-- Tourist Spots -->
                    @foreach($touristSpots as $spot)
                    <div class="col-lg-4 col-md-6 portfolio-item isotope-item">
                        <!-- Add GLightbox functionality -->
                        <a href="{{ asset('storage/' . $spot->image) }}" class="glightbox">
                            <img src="{{ asset('storage/' . $spot->image) }}" class="img-fluid" alt="{{ $spot->name }}">
                        </a>
                        <div class="portfolio-info">
                            <h4>{{ $spot->name }}</h4>
                            <p>{{ $spot->description }}</p>
                            <a href="{{ asset('storage/' . $spot->image) }}" title="{{ $spot->name }}" data-gallery="portfolio-gallery" class="glightbox preview-link">
                                <i class="bi bi-zoom-in"></i>
                            </a>
                        </div>
                    </div>
                @endforeach

                    <!-- Restaurants -->
                    @foreach($restaurants as $restaurant)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-restaurant">
                            <a href="{{ asset('storage/' . $restaurant->image) }}" class="glightbox">
                            <img src="{{ asset('storage/' . $restaurant->image) }}" class="img-fluid" alt="{{ $restaurant->name }}">
                            <div class="portfolio-info">
                                <h4>{{ $restaurant->name }}</h4>
                                <p>{{ $restaurant->description }}</p>
                                <a href="{{ asset('storage/' . $restaurant->image) }}" title="{{ $restaurant->name }}" data-gallery="portfolio-gallery-restaurant" class="glightbox preview-link">
                                    <i class="bi bi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Hotels -->
                    @foreach($hotels as $hotel)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hotel">
                            <a href="{{ asset('storage/' . $hotel->image) }}" class="glightbox">
                            <img src="{{ asset('storage/' . $hotel->image) }}" class="img-fluid" alt="{{ $hotel->name }}">
                            <div class="portfolio-info">
                                <h4>{{ $hotel->name }}</h4>
                                <p>{{ $hotel->description }}</p>
                                <a href="{{ asset('storage/' . $hotel->image) }}" title="{{ $hotel->name }}" data-gallery="portfolio-gallery-hotel" class="glightbox preview-link">
                                    <i class="bi bi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Parks -->
                    @foreach($parks as $park)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-park">
                            <a href="{{ asset('storage/' . $park->image) }}" class="glightbox">
                            <img src="{{ asset('storage/' . $park->image) }}" class="img-fluid" alt="{{ $park->name }}">
                            <div class="portfolio-info">
                                <h4>{{ $park->name }}</h4>
                                <p>{{ $park->description }}</p>
                                <a href="{{ asset('storage/' . $park->image) }}" title="{{ $park->name }}" data-gallery="portfolio-gallery-park" class="glightbox preview-link">
                                    <i class="bi bi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Schools -->
                    @foreach($schools as $school)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-school">
                            <a href="{{ asset('storage/' . $school->image) }}" class="glightbox">
                            <img src="{{ asset('storage/' . $school->image) }}" class="img-fluid" alt="{{ $school->name }}">
                            <div class="portfolio-info">
                                <h4>{{ $school->name }}</h4>
                                <p>{{ $school->description }}</p>
                                <a href="{{ asset('storage/' . $school->image) }}" title="{{ $school->name }}" data-gallery="portfolio-gallery-school" class="glightbox preview-link">
                                    <i class="bi bi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Hospitals -->
                    @foreach($hospitals as $hospital)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-hospital">
                            <a href="{{ asset('storage/' . $hospital->image) }}" class="glightbox">
                            <img src="{{ asset('storage/' . $hospital->image) }}" class="img-fluid" alt="{{ $hospital->name }}">
                            <div class="portfolio-info">
                                <h4>{{ $hospital->name }}</h4>
                                <p>{{ $hospital->description }}</p>
                                <a href="{{ asset('storage/' . $hospital->image) }}" title="{{ $hospital->name }}" data-gallery="portfolio-gallery-hospital" class="glightbox preview-link">
                                    <i class="bi bi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <!-- Churches -->
                    @foreach($churches as $church)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-church">
                            <a href="{{ asset('storage/' . $church->image) }}" class="glightbox">
                            <img src="{{ asset('storage/' . $church->image) }}" class="img-fluid" alt="{{ $church->name }}">
                            <div class="portfolio-info">
                                <h4>{{ $church->name }}</h4>
                                <p>{{ $church->description }}</p>
                                <a href="{{ asset('storage/' . $church->image) }}" title="{{ $church->name }}" data-gallery="portfolio-gallery-church" class="glightbox preview-link">
                                    <i class="bi bi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                    <!-- SK Programs -->
                    @foreach($skPrograms as $program)
                        <div class="col-lg-4 col-md-6 portfolio-item isotope-item filter-skprogram">
                            <a href="{{ asset('storage/' . $program->image) }}" class="glightbox">
                            <img src="{{ asset('storage/' . $program->image) }}" class="img-fluid" alt="{{ $program->name }}">
                            <div class="portfolio-info">
                                <h4>{{ $program->name }}</h4>
                                <p>{{ $program->description }}</p>
                                <a href="{{ asset('storage/' . $program->image) }}" title="{{ $program->name }}" data-gallery="portfolio-gallery-skprogram" class="glightbox preview-link">
                                    <i class="bi bi-zoom-in"></i>
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div><!-- End Portfolio Container -->
            </div>
        </div>
    </section><!-- /Portfolio Section -->

    <!-- Pricing Section -->
    {{-- <section id="pricing" class="pricing section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Pricing</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="zoom-in" data-aos-delay="100">

        <div class="row g-4">

          <div class="col-lg-4">
            <div class="pricing-item">
              <h3>Free Plan</h3>
              <div class="icon">
                <i class="bi bi-box"></i>
              </div>
              <h4><sup>$</sup>0<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Pharetra massa massa ultricies</span></li>
                <li class="na"><i class="bi bi-x"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4">
            <div class="pricing-item featured">
              <h3>Business Plan</h3>
              <div class="icon">
                <i class="bi bi-rocket"></i>
              </div>

              <h4><sup>$</sup>29<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

          <div class="col-lg-4">
            <div class="pricing-item">
              <h3>Developer Plan</h3>
              <div class="icon">
                <i class="bi bi-send"></i>
              </div>
              <h4><sup>$</sup>49<span> / month</span></h4>
              <ul>
                <li><i class="bi bi-check"></i> <span>Quam adipiscing vitae proin</span></li>
                <li><i class="bi bi-check"></i> <span>Nec feugiat nisl pretium</span></li>
                <li><i class="bi bi-check"></i> <span>Nulla at volutpat diam uteera</span></li>
                <li><i class="bi bi-check"></i> <span>Pharetra massa massa ultricies</span></li>
                <li><i class="bi bi-check"></i> <span>Massa ultricies mi quis hendrerit</span></li>
              </ul>
              <div class="text-center"><a href="#" class="buy-btn">Buy Now</a></div>
            </div>
          </div><!-- End Pricing Item -->

        </div>

      </div>

    </section><!-- /Pricing Section --> --}}

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <div class="container">

        <div class="row gy-4">

            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                @foreach($programs as $program)
                    <div class="mb-4 content px-xl-5">
                        <!-- Check if the program has an image -->
                        @if($program->image)
                            <img src="{{ asset('storage/' . $program->image) }}" class="mb-3 img-fluid" alt="{{ $program->name }}">
                        @endif
                        <h3><span>{{ $program->name }} </span><strong>Programs</strong></h3>
                        <p>{{ $program->description }}</p>
                    </div>
                @endforeach
            </div>

          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

            <div class="faq-container">
              <div class="faq-item faq-active">
                <h3><span class="num">1.</span> <span>Non consectetur a erat nam at lectus urna duis?</span></h3>
                <div class="faq-content">
                  <p>Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">2.</span> <span>Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque?</span></h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">3.</span> <span>Dolor sit amet consectetur adipiscing elit pellentesque?</span></h3>
                <div class="faq-content">
                  <p>Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">4.</span> <span>Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla?</span></h3>
                <div class="faq-content">
                  <p>Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3><span class="num">5.</span> <span>Tempus quam pellentesque nec nam aliquam sem et tortor consequat?</span></h3>
                <div class="faq-content">
                  <p>Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>
        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Team Section -->
    <section id="team" class="team section light-background">
            <!-- Section Title -->
            <div class="container section-title" data-aos="fade-up">
                <h2>BARANGAY OFFICIALS</h2>
                <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
            </div>

            <div class="container">
                <div class="row gy-5">
                    @foreach($barangayOfficials as $official)
                        <div class="col-lg-4 col-md-6 member" data-aos="fade-up" data-aos-delay="100">
                            <div class="member-img">
                                <img src="{{ asset('storage/' . $official->image) }}" class="img-fluid" alt="{{ $official->name }}">
                                <div class="social">
                                    <a href="#"><i class="bi bi-twitter"></i></a>
                                    <a href="#"><i class="bi bi-facebook"></i></a>
                                    <a href="#"><i class="bi bi-instagram"></i></a>
                                    <a href="#"><i class="bi bi-linkedin"></i></a>
                                </div>
                            </div>
                            <div class="text-center member-info">
                                <h4>{{ $official->name }}</h4>
                                <span>{{ $official->designation }}</span>
                                <p>{{ $official->description }}</p>
                            </div>
                        </div><!-- End Team Member -->
                    @endforeach
                </div>
            </div>
        </section>

    <!-- Call To Action Section -->
    <section id="call-to-action" class="call-to-action section dark-background">

      <img src="assets/img/cta-bg.jpg" alt="">

      <div class="container">
        <div class="row justify-content-center" data-aos="zoom-in" data-aos-delay="100">
          <div class="col-xl-10">
            <div class="text-center">
              <h3>Call To Action</h3>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              <a class="cta-btn" href="#">Call To Action</a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Call To Action Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section light-background">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 info" data-aos="fade-up" data-aos-delay="100">
                    <h3>Our Schoolar</h3>
                    <p>What our scholars have to say</p>
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="200">
                    <div class="swiper init-swiper">
                        <script type="application/json" class="swiper-config">
                        {
                            "loop": true,
                            "speed": 600,
                            "autoplay": {
                                "delay": 5000
                            },
                            "slidesPerView": "auto",
                            "pagination": {
                                "el": ".swiper-pagination",
                                "type": "bullets",
                                "clickable": true
                            }
                        }
                        </script>
                        <div class="swiper-wrapper">
                            @foreach($testimonials as $testimonial)
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="d-flex">
                                        <img src="{{ asset('storage/' . $testimonial->image) }}" class="flex-shrink-0 testimonial-img" alt="{{ $testimonial->name }}">
                                        <div>
                                            <h3>{{ $testimonial->name }}</h3>
                                            <h4>{{ $testimonial->designation }}</h4>
                                            <div class="stars">
                                                <!-- You can add dynamic star ratings here if available -->
                                                <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <p>
                                        <i class="bi bi-quote quote-icon-left"></i>
                                        <span>{{ $testimonial->description }}</span>
                                        <i class="bi bi-quote quote-icon-right"></i>
                                    </p>
                                </div>
                            </div><!-- End testimonial item -->
                            @endforeach
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

   <!-- Recent Posts Section -->
<section id="recent-posts" class="recent-posts section">
    <!-- Section Title -->
    <div class="container section-title" data-aos="fade-up">
        <h2>Events</h2>
        <p>Check out our latest events</p>
    </div><!-- End Section Title -->

    <div class="container">
        <div class="row gy-4">
            @foreach($events as $event)
                <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <article>
                        <div class="post-img">
                            <!-- Assuming you have an 'image' column or want to display a placeholder image -->
                            {{-- <img src="{{ asset('storage/' . $event->image) }}" alt="{{ $event->title }}" class="img-fluid"> --}}
                        </div>

                        <p class="post-category">{{ $event->location }}</p>

                        <h2 class="title">
                            <a href="{{ route('event.details', $event->id) }}">{{ $event->title }}</a>
                        </h2>

                        <p>{{ $event->description }}</p>

                        <div class="d-flex align-items-center">
                            <div class="post-meta">
                                <p class="post-date">
                                    <time datetime="{{ $event->event_date }}">{{ \Carbon\Carbon::parse($event->event_date)->format('M d, Y') }}</time>
                                </p>
                            </div>
                        </div>
                    </article>
                </div><!-- End post list item -->
            @endforeach
        </div><!-- End recent posts list -->
    </div>
</section><!-- /Recent Posts Section -->
<section id="citizens-charter" class="section light-background">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>CITIZENS CHARTER</h2>
            <p>Pursuant to Section 6 of R.A 9485</p>
            <h4>VISION: Centro 2: An exemplar Barangay with unified, disciplined, and God-loving constituents towards prosperity</h4>
            <h4>MISSION: To provide satisfactory services through democratic leadership that would enable the people to become politically responsible, morally upright, and economically capable</h4>
        </div>

        <div class="charter-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>BARANGAY OFFICIAL</th>
                        <th>FRONTLINE SERVICES</th>
                        <th>STEP / PROCEDURES</th>
                        <th>RESPONSIBLE PERSON</th>
                        <th>MAXIMUM RESPONSE TIME</th>
                        <th>REQUIREMENTS</th>
                        <th>AMOUNT OF FEES</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Row 1 -->
                    <tr>
                        <td>Camilo P. Perdido<br>Punong Barangay</td>
                        <td>ISSUANCE OF CLEARANCES AND CERTIFICATE (CTC)</td>
                        <td>
                            1. Filling-up of Request Slip<br>
                            2. Receiving/Recording of request<br>
                            3. Issuance/Approval of CTC
                        </td>
                        <td>Officer of the Day<br>Barangay Secretary<br>Barangay Treasurer</td>
                        <td>
                            5 minutes<br>
                            3 minutes<br>
                            2 minutes
                        </td>
                        <td>None</td>
                        <td>P5.00 Basic Tax plus 0.001 of his/her preceding annual income</td>
                    </tr>

                    <!-- Row 2 -->
                    <tr>
                        <td>Vicky C. Fuertes<br>Chairman - Peace & Order</td>
                        <td>ISSUANCE OF CLEARANCES AND CERTIFICATIONS</td>
                        <td>
                            1. Filling-up of Request Slip<br>
                            2. Receiving/Recording of request<br>
                            3. Approval/Release of document
                        </td>
                        <td>Barangay Secretary<br>Barangay Treasurer</td>
                        <td>
                            5 minutes<br>
                            2 minutes<br>
                            3 minutes
                        </td>
                        <td>Barangay Clearance</td>
                        <td>P100.00 - P200.00</td>
                    </tr>

                    <!-- Row 3 -->
                    <tr>
                        <td>Recto S. Obispo<br>Chairman - Facilities & Public Utilities</td>
                        <td>FILING OF SUMMONS</td>
                        <td>
                            1. Filing of Complaint Form<br>
                            2. Approval of the request<br>
                            3. Scheduling of hearings
                        </td>
                        <td>Punong Barangay</td>
                        <td>10 minutes</td>
                        <td>CTC</td>
                        <td>P100.00</td>
                    </tr>

                    <!-- Row 4 -->
                    <tr>
                        <td>Andrew L. Pagayatan<br>Chairman - Public Works & Highways</td>
                        <td>ISSUANCE OF PERMIT</td>
                        <td>
                            1. Filling-up of Request Slip<br>
                            2. Receiving/Recording of request<br>
                            3. Processing of requested permit<br>
                            4. Paying of fees<br>
                            5. Approving/Issuing of requested document
                        </td>
                        <td>Barangay Secretary<br>Barangay Treasurer</td>
                        <td>
                            3 minutes<br>
                            2 minutes<br>
                            10 minutes<br>
                            3 minutes<br>
                            2 minutes
                        </td>
                        <td>Barangay Clearance</td>
                        <td>P200.00</td>
                    </tr>

                    <!-- Row 5 -->
                    <tr>
                        <td>Alfonso S. Grande Jr.<br>Chairman - Peace & Order and Public Safety</td>
                        <td>HEALTH SERVICES</td>
                        <td>
                            1. Filling-up of Request Slip<br>
                            2. Evaluation of request<br>
                            3. Check-up (if medical attention required)
                        </td>
                        <td>Barangay Health Workers</td>
                        <td>5 minutes</td>
                        <td>CTC</td>
                        <td>FREE</td>
                    </tr>
                    <!-- Add more rows as necessary -->
                </tbody>
            </table>
            <p>Note: Each frontline service shall be given two (2) days processing time extension.</p>
        </div>
    </div>
</section>
    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Necessitatibus eius consequatur ex aliquid fuga eum quidem sint consectetur velit</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
                <div class="col-md-6">
                  <div class="info-item" data-aos="fade" data-aos-delay="200">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Address</h3>
                    <p>A108 Adam Street</p>
                    <p>New York, NY 535022</p>
                  </div>
                </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                  <p>+1 6678 254445 41</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                  <p>contact@example.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Monday - Friday</p>
                  <p>9:00AM - 05:00PM</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-6">
            <form id="contactForm" action="get" class="php-email-form" onsubmit="sendMail(); return false;" data-aos="fade-up" data-aos-delay="200">
                <div class="row gy-4">
                  <div class="col-md-6">
                    <input type="text" id="name" class="form-control" placeholder="Your Name" required>
                  </div>

                  <div class="col-md-6">
                    <input type="email" id="email" class="form-control" placeholder="Your Email" required>
                  </div>

                  <div class="col-12">
                    <input type="text" id="subject" class="form-control" placeholder="Subject" required>
                  </div>

                  <div class="col-12">
                    <textarea id="message" class="form-control" rows="6" placeholder="Message" required></textarea>
                  </div>

                  <div class="text-center col-12">
                    <!-- Remove error-related elements to avoid unnecessary error messages -->
                    <div class="loading" style="display: none;">Loading</div>
                    <div class="error-message" style="display: none;"></div>
                    <div class="sent-message" style="display: none;">Your message has been sent. Thank you!</div>

                    <button type="submit">Send Message</button>
                  </div>
                </div>
              </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer position-relative light-background">

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">Barangay Centro 2</span>
          </a>
          <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus.</p>
          <div class="mt-4 social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">About us</a></li>
            <li><a href="#">Services</a></li>
            <li><a href="#">Terms of service</a></li>
            <li><a href="#">Privacy policy</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><a href="#">Web Design</a></li>
            <li><a href="#">Web Development</a></li>
            <li><a href="#">Product Management</a></li>
            <li><a href="#">Marketing</a></li>
            <li><a href="#">Graphic Design</a></li>
          </ul>
        </div>

        <div class="text-center col-lg-3 col-md-12 footer-contact text-md-start">
          <h4>Contact Us</h4>
          <p>A108 Adam Street</p>
          <p>New York, NY 535022</p>
          <p>United States</p>
          <p class="mt-4"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
          <p><strong>Email:</strong> <span>info@example.com</span></p>
        </div>

      </div>
    </div>

    <div class="container mt-4 text-center copyright">
      <p>© <span>Copyright</span> <strong class="sitename">Ursulum</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://facebook.com/">Barangay Centro</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('template/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('template/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('template/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('template/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('template/vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('template/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('template/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('template/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="{{ asset('template/js/main.js') }}"></script>
<!-- Smooth Scroll JS -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
      const links = document.querySelectorAll('a[href^="#"]');

      links.forEach(link => {
        link.addEventListener('click', function(e) {
          e.preventDefault();

          const targetId = this.getAttribute('href').substring(1);
          const targetElement = document.getElementById(targetId);

          if (targetElement) {
            targetElement.scrollIntoView({
              behavior: 'smooth',
              block: 'start'
            });
          }
        });
      });
    });

  </script>
  <script>
       document.addEventListener('DOMContentLoaded', function () {
    const lightbox = GLightbox({
        selector: '.glightbox'
    });
});
  </script>
  <script>
    function sendMail() {
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const subject = document.getElementById('subject').value;
      const message = document.getElementById('message').value;

      // Construct the mailto link
      const mailtoLink = `mailto:example@example.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(`Name: ${name}\nEmail: ${email}\n\n${message}`)}`;

      // Use window.location to trigger the mailto link
      window.location.href = mailtoLink;

      // Optionally, display a confirmation message
      document.querySelector('.sent-message').style.display = 'block';
    }
  </script>
</script>
</body>

</html>
