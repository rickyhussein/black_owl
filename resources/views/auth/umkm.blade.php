<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cluster Madrid</title>
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('assets/img/madrid.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('assets/img/madrid.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('assets/img/madrid.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/madrid.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('assets/img/madrid.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('assets/img/madrid.png') }}">
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('assets/img/madrid.png') }}">
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('assets/img/madrid.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/img/madrid.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/img/madrid.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('assets/img/madrid.png') }}">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('assets/img/madrid.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/img/madrid.png') }}">
    <link rel="manifest" href="{{ asset('template/live/assets/images/favicons/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="{{ asset('assets/img/madrid.png') }}">
    <meta name="theme-color" content="#ffffff">

    <link href="{{ asset('template/live/assets/lib/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="{{ asset('template/live/assets/lib/animate.css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('template/live/assets/lib/components-font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/live/assets/lib/et-line-font/et-line-font.css') }}" rel="stylesheet">
    <link href="{{ asset('template/live/assets/lib/flexslider/flexslider.css') }}" rel="stylesheet">
    <link href="{{ asset('template/live/assets/lib/owl.carousel/dist/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/live/assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/live/assets/lib/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">
    <link href="{{ asset('template/live/assets/lib/simple-text-rotator/simpletextrotator.css') }}" rel="stylesheet">
    <link href="{{ asset('template/live/assets/css/style.css') }}" rel="stylesheet">
    <link id="color-scheme" href="{{ asset('template/live/assets/css/colors/default.css') }}" rel="stylesheet">
    <style>
        .works-grid .work-image {
            width: 100%;
            height: 250px;
            overflow: hidden;
        }

        .works-grid .work-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .whatsapp-button {
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .whatsapp-button img {
            width: 50px;
            height: 50px;
        }

        .zoom-effect {
            transition: transform 0.5s ease;
        }

        .zoom-effect:hover {
            transform: scale(1.3);
        }

        .zoom-lens {
          position: absolute;
          border: 1px solid #d4d4d4;
          width: 100px;
          height: 100px;
          display: none;
          pointer-events: none;
          background-color: rgba(255, 255, 255, 0.5);
        }

        .zoom-result {
          position: absolute;
          width: 200px;
          height: 200px;
          display: none;
          z-index: 100000;
          background-repeat: no-repeat;
        }

        .map-container {
          width: 100%;
          max-width: 100%;
          position: relative;
          padding-bottom: 56.25%; /* 16:9 aspect ratio */
          height: 100%;
          max-height: 100%;
          overflow: hidden;
        }

        .map-container iframe {
          position: absolute;
          top: 0;
          left: 0;
          width: 100%;
          height: 100%;
          border: 0;
        }

        .home-section {
            position: relative;
            height: 100vh;
            overflow: hidden;
        }
        .carousel-inner > .item {
            height: 100vh;
        }
        .carousel-inner > .item > img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .carousel-caption {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
            color: white;
        }
        @media (max-width: 768px) {
            .carousel-caption {
                font-size: 14px;
                padding: 10px;
            }

            .icon-madrid {
                width: 400px
            }
        }

        .judul {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: black;
        }

        .judul::before,
        .judul::after {
            content: "";
            flex-grow: 1;
            height: 2px;
            background-color: black;
        }

        .judul2 {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            color: white;
        }

        .judul2::before,
        .judul2::after {
            content: "";
            flex-grow: 1;
            height: 2px;
            background-color: white;
        }

        .work-image {
            position: relative;
            height: auto;
            overflow: hidden;
        }

        .work-image img {
            width: 100%;
            height: auto;
            display: block;
            border-radius: 20px
        }

        .work-image h3 {
            position: absolute;
            bottom: 10px; /* Jarak dari bawah */
            left: 50%;
            transform: translateX(-50%); /* Agar teks tetap di tengah */
            background: rgba(0, 0, 0, 0.6); /* Latar belakang semi-transparan */
            color: white;
            padding: 10px;
            font-size: 16px;
            text-align: center;
            width: 100%;
        }
    </style>
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="{{ url('/') }}">Cluster <span style="color:rgb(52, 183, 183)">Madrid</span></a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ url('/') }}">Beranda</a></li>
              <li><a class="section-scroll" href="{{ url('/') }}">Tentang</a></li>
              <li><a class="section-scroll" href="{{ url('/') }}">Fasilitas</a></li>
              <li><a class="section-scroll" href="{{ url('/') }}">Kontak Emergensi</a></li>
              <li><a class="section-scroll" href="{{ url('/') }}">Tata Tertib</a></li>
              <li><a class="section-scroll" href="{{ url('/') }}">Pengurus</a></li>
              <li><a class="section-scroll active" href="{{ url('/umkm') }}">UMKM</a></li>
              <li><a class="section-scroll" href="{{ url('/login') }}">Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="main">
        <section class="module bg-dark-60 shop-page-header" data-background="{{ url('/assets/img/umkm.jpg') }}">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt"></h2>
              </div>
            </div>
          </div>
        </section>

        <section class="module-small">
          <div class="container">
            <form class="row" action="{{ url('/umkm') }}">
              <div class="col-sm-9 mb-sm-20">
                <input type="text" name="search" id="search" placeholder="Search.." class="form-control" value="{{ request('search') }}">
              </div>
              <div class="col-sm-3">
                <button class="btn btn-block btn-round btn-g" type="submit">Apply</button>
              </div>
            </form>
          </div>
        </section>

        <hr class="divider-w">

        <section class="module-small">
          <div class="container">
            <div class="row multi-columns-row">
              @foreach ($umkms as $umkm)
                @php
                    $firstImage = $umkm->items->first();
                @endphp
                <div class="col-xs-6 col-sm-6 col-md-4 col-lg-4 clickable" data-url="{{ url('/umkm/detail/'.$umkm->id) }}" style="cursor: pointer;">
                    <div class="shop-item">
                    <div class="shop-item-image"><img src="{{ url('/storage/'.$firstImage->umkm_file_path) }}" alt="{{ $umkm->name }}" style="width: 100%; height: 300px; object-fit: cover;" />
                    </div>
                    <h4 class="shop-item-title font-alt"><a href="{{ url('/umkm/detail/'.$umkm->id) }}">{{ $umkm->name }}</a></h4>Rp {{ number_format($umkm->price) }}
                    </div>
                </div>
              @endforeach
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="pagination font-alt">
                        @if ($umkms->onFirstPage())
                            <a href="#"><i class="fa fa-angle-left"></i></a>
                        @else
                            <a href="{{ $umkms->previousPageUrl() }}"><i class="fa fa-angle-left"></i></a>
                        @endif

                        @for ($i = 1; $i <= $umkms->lastPage(); $i++)
                            @if ($i == $umkms->currentPage())
                                <a class="active" href="#">{{ $i }}</a>
                            @else
                                <a href="{{ $umkms->url($i) }}">{{ $i }}</a>
                            @endif
                        @endfor

                        @if ($umkms->hasMorePages())
                            <a href="{{ $umkms->nextPageUrl() }}"><i class="fa fa-angle-right"></i></a>
                        @else
                            <a href="#"><i class="fa fa-angle-right"></i></a>
                        @endif
                    </div>
                </div>
            </div>
          </div>
        </section>

        <section id="map-section">
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.945894680764!2d107.0143520746822!3d-6.137971593848913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69896256bda113%3A0x596e1f76c0918196!2sCluster%20Madrid%20Mutiara%20Gading%20City!5e0!3m2!1sid!2sid!4v1743026420211!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
      </div>

      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
      <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK2Axt8xiFYMBMDwwG1XzBQvEbYpzCvFU"></script>
    </main>
    <!--
    JavaScripts
    =============================================
    -->
    <script src="{{ asset('template/live/assets/lib/jquery/dist/jquery.js') }}"></script>
    <script src="{{ asset('template/live/assets/lib/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/live/assets/lib/wow/dist/wow.js') }}"></script>
    <script src="{{ asset('template/live/assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js') }}"></script>
    <script src="{{ asset('template/live/assets/lib/isotope/dist/isotope.pkgd.js') }}"></script>
    <script src="{{ asset('template/live/assets/lib/imagesloaded/imagesloaded.pkgd.js') }}"></script>
    <script src="{{ asset('template/live/assets/lib/flexslider/jquery.flexslider.js') }}"></script>
    <script src="{{ asset('template/live/assets/lib/owl.carousel/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/live/assets/lib/smoothscroll.js') }}"></script>
    <script src="{{ asset('template/live/assets/lib/magnific-popup/dist/jquery.magnific-popup.js') }}"></script>
    <script src="{{ asset('template/live/assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js') }}"></script>
    <script async="" defer="" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDK2Axt8xiFYMBMDwwG1XzBQvEbYpzCvFU"></script>
    <script src="{{ asset('template/live/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('template/live/assets/js/main.js') }}"></script>
    <script>
        $(document).ready(function() {
            $(".clickable").on("click", function() {
                window.location.href = $(this).data("url");
            });

          $('.features-item').each(function() {
            const featuresItem = $(this);
            const zoomImage = featuresItem.find('.zoom-effect');
            const lens = featuresItem.find('.zoom-lens');
            const result = featuresItem.find('.zoom-result');

            lens.on('mousemove', function(e) { moveLens(e, zoomImage, lens, result); });
            zoomImage.on('mousemove', function(e) { moveLens(e, zoomImage, lens, result); });
            lens.on('mouseleave', function() {
              lens.hide();
              result.hide();
            });
            zoomImage.on('mouseleave', function() {
              lens.hide();
              result.hide();
            });

            function moveLens(e, zoomImage, lens, result) {
              const pos = getCursorPos(e, zoomImage);
              const lensWidth = lens.width() / 2;
              const lensHeight = lens.height() / 2;

              let left = pos.x - lensWidth;
              let top = pos.y - lensHeight;

              if (left < 0) left = 0;
              if (top < 0) top = 0;
              if (left > zoomImage.width() - lens.width()) left = zoomImage.width() - lens.width();
              if (top > zoomImage.height() - lens.height()) top = zoomImage.height() - lens.height();

              lens.css({ left: left + 'px', top: top + 'px' });
              result.css({
                display: 'block',
                backgroundImage: 'url(' + zoomImage.attr('src') + ')',
                backgroundSize: zoomImage.width() * 2 + 'px ' + zoomImage.height() * 2 + 'px',
                backgroundPosition: '-' + (left * 2) + 'px -' + (top * 2) + 'px'
              });

              lens.show();
            }

            function getCursorPos(e, zoomImage) {
              const rect = zoomImage[0].getBoundingClientRect();
              const x = e.pageX - rect.left - window.pageXOffset;
              const y = e.pageY - rect.top - window.pageYOffset;
              return { x: x, y: y };
            }
          });
        });
    </script>
  </body>
</html>
