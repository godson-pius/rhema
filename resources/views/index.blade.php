@extends('layouts.app')

@section('content')
  <body>

    <div class="container">
      <div class="my-3 text-center">

      @if (session('status'))
          <div class="sent-message alert alert-success">{{ session('status') }}</div>
      @endif
      
      @if (session('update'))
          <div class="sent-message alert alert-success">{{ session('update') }}</div>
      @endif
      
      @if (session('delete'))
          <div class="sent-message alert alert-success">{{ session('delete') }}</div>
      @endif
      
      @if (session('logout'))
          <div class="sent-message alert alert-danger">{{ session('logout') }}</div>
      @endif
      
    </div>
    
    <div class="my-3 text-center">

      @if (session('success'))
          <div class="sent-message alert alert-success">{{ session('success') }}</div>
      @endif
      
    </div>
    </div>

  <!-- ======= Mobile nav toggle button ======= -->
  <!-- <button type="button" class="mobile-nav-toggle d-xl-none"><i class="bi bi-list mobile-nav-toggle"></i></button> -->
  <i class="bi bi-list mobile-nav-toggle d-xl-none"></i>
  <!-- ======= Header ======= -->
  <header id="header" class="d-flex flex-column justify-content-center">

    <nav id="navbar" class="navbar nav-menu">
      <ul>
        <li><a href="#hero" class="nav-link scrollto active"><i class="bx bx-home"></i> <span>Home</span></a></li>
        <li><a href="#about" class="nav-link scrollto"><i class="bx bx-user"></i> <span>About</span></a></li>

        <li><a href="#portfolio" class="nav-link scrollto"><i class="bx bx-book-content"></i> <span>Rhema</span></a></li>
        <li><a href="#services" class="nav-link scrollto"><i class="bx bx-server"></i> <span>Services</span></a></li>
        <li><a href="#contact" class="nav-link scrollto"><i class="bx bx-envelope"></i> <span>Contact</span></a></li>
      </ul>
    </nav><!-- .nav-menu -->

  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex flex-column justify-content-center">
    <div class="container" data-aos="zoom-in" data-aos-delay="100">
      <h1>Rhema</h1>
      <p>A place of <span class="typed" data-typed-items="Growth, Increase, Spiritual Upliftment, Power, Real Encounter with God"></span></p>
      <div class="social-links">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>About</h2>
          <p>Rhema, a platform where generals are built through the word and prophetic sounds of God. Sermons are been posted here and the prophetic psalms from Zion are also been posted here. Be blessed</p>
        </div>

        @if (auth()->user())

            <div class="row">
          <div class="col-lg-4">
            <img src="assets/img/profile-img.jpg" class="img-fluid" alt="">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
            <h3>{{ auth()->user()->name }}</h3>
            <p class="fst-italic">
              {{ auth()->user()->name }}, your account was created {{ auth()->user()->created_at->diffForHumans() }}
            </p>
            <div class="row">
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Name:</strong> <span>{{ auth()->user()->name }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Password:</strong> <span>your preferred password</span></li>
                </ul>
              </div>
              <div class="col-lg-6">
                <ul>
                  <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong> <span>{{ auth()->user()->email }}</span></li>
                  <li><i class="bi bi-chevron-right"></i> <strong>Joined:</strong> <span>{{ auth()->user()->created_at->format('D - M - Y') }}</span></li>
                </ul>
              </div>
              <div class="container">
                <a href="{{ route('upload') }}" class="btn btn-primary shadow mt-3">Upload Rhema</a>
                <a href="{{ route('logout') }}" class="btn btn-dark shadow mt-3 mr-5">Logout</a>
              </div>
            </div>
         
          </div>
        </div>
        @else
          <div class="container text-center">
            <i class="bx bxs-left-arrow-alt h6"></i><a href="{{ route('login') }}" class="h4 text-primary">Login to upload</a><i class="bx bxs-right-arrow-alt h5"></i>
          </div>
        @endif

      </div>
    </section><!-- End About Section -->

    <!-- ======= Rhema Section ======= -->
    <section id="portfolio" class="portfolio section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Rhema</h2>
          <p>Rhema, a platform where generals are built through the word and prophetic sounds of God. Sermons are been posted here and the prophetic psalms from Zion are also been posted here. Be blessed</p>

          @if (auth()->user())
            <a href="{{ route('upload') }}" class="btn btn-primary shadow mt-3">Upload Rhema</a>
          @endif

        </div>

        <div class="row">
          <div class="col-lg-12 d-flex justify-content-center" data-aos="fade-up" data-aos-delay="100">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-sermon">Sermons</li>
              <li data-filter=".filter-song">Spiritual Songs</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          @if ($uploads->count())

              @foreach ($uploads as $upload)
                  <div class="col-lg-4 col-md-6 portfolio-item filter-{{ $upload->tag }}">
                    <div class="portfolio-wrap bg-primary shadow mb-2" style="min-height: 278px; background-image: url('{{ $upload->image }}'); background-position: center; background-size: cover; background-repeat: no-repeat;">
                      <div class="portfolio-info">
                        <h4>{{ $upload->title }}</h4>
                        <p>{{ $upload->minister }}</p>
                        <small class="">{{ $upload->created_at->diffForHumans() }}</small>
                        <div class="portfolio-links">
                          <a href="{{ $upload->url }}" download="{{ $upload->title }}" title="Download Rhema"><i class="bx bx-link"></i></a>

                          @if (auth()->user())
                              @if (auth()->user()->id === $upload->user_id)
                                  <a href="{{ route('edit', $upload) }}" title="Edit Rhema"><i class="bx bxs-cog"></i></a>
                                  <a href="{{ route('delete', $upload) }}" class="text-danger" title="Delete Rhema"><i class="bx bxs-trash"></i></a>
                              @endif
                          @endif

                          

                        </div>
                      </div>
                    </div>
                    <span class="h6"><b>Source</b>: {{ $upload->uploadedBy($upload->user_id)->name }}</span>
                  </div>
              @endforeach
          @else

            <div class="text-center text-primary">
              <i class="bx bxs-left-arrow-alt h5"></i><span class="h3">No Uploads Yet</span><i class="bx bxs-right-arrow-alt h5"></i>
            </div>

          @endif

          {{-- <div class="col-lg-4 col-md-6 portfolio-item filter-song">
            <div class="portfolio-wrap">
              <img src="assets/img/portfolio/portfolio-4.jpg" class="img-fluid" alt="">
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a href="assets/img/portfolio/portfolio-4.jpg" data-gallery="portfolioGallery" class="portfolio-lightbox" title="Card 2"><i class="bx bx-plus"></i></a>
                  <a href="portfolio-details.html" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bx-link"></i></a>
                </div>
              </div>
            </div>
          </div> --}}

        </div>

      </div>
    </section><!-- End Portfolio Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Services</h2>
          <p>Rhema, a platform where generals are built through the word and prophetic sounds of God. Sermons are been posted here and the prophetic psalms from Zion are also been posted here. Be blessed</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
            <div class="icon-box iconbox-blue">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,521.0016835830174C376.1290562159157,517.8887921683347,466.0731472004068,529.7835943286574,510.70327084640275,468.03025145048787C554.3714126377745,407.6079735673963,508.03601936045806,328.9844924480964,491.2728898941984,256.3432110539036C474.5976632858925,184.082847569629,479.9380746630129,96.60480741107993,416.23090153303,58.64404602377083C348.86323505073057,18.502131276798302,261.93793281208167,40.57373210992963,193.5410806939664,78.93577620505333C130.42746243093433,114.334589627462,98.30271207620316,179.96522072025542,76.75703585869454,249.04625023123273C51.97151888228291,328.5150500222984,13.704378332031375,421.85034740162234,66.52175969318436,486.19268352777647C119.04800174914682,550.1803526380478,217.28368757567262,524.383925680826,300,521.0016835830174"></path>
                </svg>
                <i class="bx bxl-dribbble"></i>
              </div>
              <h4><a href="">Spiritual Songs</a></h4>
              <p>Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-md-0" data-aos="zoom-in" data-aos-delay="200">
            <div class="icon-box iconbox-orange ">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,582.0697525312426C382.5290701553225,586.8405444964366,449.9789794690241,525.3245884688669,502.5850820975895,461.55621195738473C556.606425686781,396.0723002908107,615.8543463187945,314.28637112970534,586.6730223649479,234.56875336149918C558.9533121215079,158.8439757836574,454.9685369536778,164.00468322053177,381.49747125262974,130.76875717737553C312.15926192815925,99.40240125094834,248.97055460311594,18.661163978235184,179.8680185752513,50.54337015887873C110.5421016452524,82.52863877960104,119.82277516462835,180.83849132639028,109.12597500060166,256.43424936330496C100.08760227029461,320.3096726198365,92.17705696193138,384.0621239912766,124.79988738764834,439.7174275375508C164.83382741302287,508.01625554203684,220.96474134820875,577.5009287672846,300,582.0697525312426"></path>
                </svg>
                <i class="bx bx-file"></i>
              </div>
              <h4><a href="">God's Word</a></h4>
              <p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 d-flex align-items-stretch mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="300">
            <div class="icon-box iconbox-pink">
              <div class="icon">
                <svg width="100" height="100" viewBox="0 0 600 600" xmlns="http://www.w3.org/2000/svg">
                  <path stroke="none" stroke-width="0" fill="#f5f5f5" d="M300,541.5067337569781C382.14930387511276,545.0595476570109,479.8736841581634,548.3450877840088,526.4010558755058,480.5488172755941C571.5218469581645,414.80211281144784,517.5187510058486,332.0715597781072,496.52539010469104,255.14436215662573C477.37192572678356,184.95920475031193,473.57363656557914,105.61284051026155,413.0603344069578,65.22779650032875C343.27470386102294,18.654635553484475,251.2091493199835,5.337323636656869,175.0934190732945,40.62881213300186C97.87086631185822,76.43348514350839,51.98124368387456,156.15599469081315,36.44837278890362,239.84606092416172C21.716077023791087,319.22268207091537,43.775223500013084,401.1760424656574,96.891909868211,461.97329694683043C147.22146801428983,519.5804099606455,223.5754009179313,538.201503339737,300,541.5067337569781"></path>
                </svg>
                <i class="bx bx-tachometer"></i>
              </div>
              <h4><a href="">Spiritual Growth</a></h4>
              <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Contact</h2>
        </div>

        <div class="row mt-1">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Enugu State, Nigeria</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@rhema.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+234 814 787 1946</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="{{ route('contact') }}" method="post">
              @csrf

              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>

              <div class="text-center"><button type="submit" class="btn btn-primary mt-3">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->
@endsection