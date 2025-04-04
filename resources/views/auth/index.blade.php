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
      <nav class="navbar navbar-custom navbar-transparent navbar-fixed-top one-page" role="navigation">
        <div class="container">
          <div class="navbar-header">
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a class="navbar-brand" href="{{ url('/') }}">Cluster <span style="color:rgb(52, 183, 183)">Madrid</span></a>
          </div>
          <div class="collapse navbar-collapse" id="custom-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li><a href="#totop">Beranda</a></li>
              <li><a class="section-scroll" href="#tentang">Tentang</a></li>
              <li><a class="section-scroll" href="#fasilitas">Fasilitas</a></li>
              <li><a class="section-scroll" href="#kontak">Kontak Emergensi</a></li>
              <li><a class="section-scroll" href="#tata-tertib">Tata Tertib</a></li>
              <li><a class="section-scroll" href="#pengurus">Pengurus</a></li>
              <li><a class="section-scroll" href="{{ url('/login') }}">Login</a></li>
            </ul>
          </div>
        </div>
      </nav>
      <section class="home-section home-full-height bg-dark bg-gradient" id="home" data-background="{{ asset('assets/img/cluster.webp') }}">
        <div class="titan-caption">
          <div class="caption-content">
            <div class="font-alt mb-30 titan-title-size-1">Selamat Datang di</div>
            <div class="font-alt mb-40 titan-title-size-4">Cluster Madrid</div><a class="section-scroll btn btn-border-w btn-round" href="#tentang">Learn More</a>
          </div>
        </div>
      </section>
      <div class="main">
        <section class="module" id="tentang" style="background-color: rgb(236, 236, 236)">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-4">
                        <center>
                            <img src="{{ asset('assets/img/madrid.png') }}" style="width: 250px" class="zoom-effect" alt="Cluster Madrid"/>
                        </center>
                    </div>
                    <div class="col-sm-6 col-md-8 col-lg-8">
                        <div class="work-details">
                            <h2 class="work-details-title font-alt judul" style="color:black">Tentang Kami</h2>
                            <p style="font-size: 15px">Kawasan Cluster Madrid adalah area atau lingkungan yang di peruntukkan dan dipergunakan sebagai suatu kawasan perumahan berupa hunian tempat tinggal beserta fasilitas pendukungnya yang terletak di Perumahan Mutiara Gading City, Desa Kedung Jaya, Kecamatan Babelan, Kabupaten Bekasi Jawa Barat.</p>
                            <p style="font-size: 15px">Cluster Madrid dikelola secara profesional oleh Kepengurusan RT & RW yang siap memberikan pelayanan maksimal kepada seluruh penghuni. Dalam Cluster Madrid ini juga terdapat beberapa Fasilitas yang Aman, Nyaman, dan Tenang.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="module" id="fasilitas">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                  <h2 class="module-title font-alt judul" style="color:black">Fasilitas</h2>
                    <div class="module-subtitle font-serif">Fasilitas ini dibangun melalui usaha dan kontribusi bersama para penghuni. Pendekatan swadaya ini mencerminkan rasa kebersamaan dan tanggung jawab yang kuat di antara para warga. Dengan mengumpulkan sumber daya dan bekerja sama, para penghuni memastikan bahwa pengembangan ini sesuai dengan kebutuhan dan harapan mereka, menciptakan lingkungan tempat tinggal yang benar-benar milik bersama.</div>
                </div>
            </div>
            <div class="container">
                <ul class="works-grid works-grid-gut works-grid-3 works-hover-w" id="works-grid">
                    @foreach ($fasilitas as $fas)
                        <li class="work-item illustration webdesign">
                            <a href="{{ url('/storage/'.$fas->fasilitas) }}" target="_blank">
                                <div class="work-image"><img src="{{ asset('/storage/'.$fas->fasilitas) }}" alt="{{ $fas->nama ?? '-' }}"/><h3>{{ $fas->nama ?? '-' }}</h3></div>

                                <div class="work-caption font-alt">
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </section>

        <section class="module-small bg-dark" id="kontak">
            <div class="row">
                <div class="col-sm-8 col-sm-offset-2">
                  <h2 class="module-title font-alt judul2" style="color:white">Kontak Emergensi</h2>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    @foreach ($kontak as $kon)
                        <div class="col-sm-6 col-md-6 col-lg-6 col-lg-offset-2">
                            <div class="callout-text font-alt">
                            <h3 class="callout-title"><i class="fa fa-phone"></i> {{ $kon->nama ?? '-' }}</h3>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-2">
                            <div class="callout-btn-box"><a class="btn btn-w btn-round" style="display: block; width: 100%; text-align: center; min-width: 150px; padding: 10px 15px;" href="tel:{{ $kon->nomor }}">{{ $kon->nomor }}</a></div>
                        </div>
                        <br>
                        <br>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="module" id="tata-tertib" style="background-color: rgb(236, 236, 236)">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt judul">Tata Tertib</h2>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2">
                <ol>
                    @foreach ($tata_tertib as $key => $tertib)
                        <li style="font-size: 18px">
                            <p>{{ $tertib->nama ?? '-' }}</p>
                        </li>
                    @endforeach
                </ol>
              </div>
            </div>
          </div>
        </section>


        <hr class="divider-w">
        <section class="module" id="pengurus">
          <div class="container">
            <div class="row">
              <div class="col-sm-6 col-sm-offset-3">
                <h2 class="module-title font-alt judul">Pengurus</h2>
              </div>
            </div>
            <div class="row">
                @foreach ($pengurus as $urus)
                    <div class="mb-sm-20 wow fadeInUp col-sm-6 col-md-3" style="margin-bottom: 20px" onclick="wow fadeInUp">
                        <div class="team-item">
                            <div class="team-image"><img style="width: 250px; height: 340px; object-fit: cover;" src="{{ url('/storage/'.$urus->foto_pengurus) }}" alt="Member Photo"/>
                            <div class="team-detail">
                                <div class="team-social">
                                    <a href="{{ $urus->instagram ?? '#pengurus' }}" target="{{ $urus->instagram ? '_blank' : '' }}"><i class="fa fa-instagram"></i></a>
                                    <a href="{{ $urus->youtube ?? '#pengurus' }}" target="{{ $urus->youtube ? '_blank' : '' }}"><i class="fa fa-youtube"></i></a>
                                    <a href="{{ $urus->whatsapp ?? '#pengurus' }}" target="{{ $urus->whatsapp ? '_blank' : '' }}"><i class="fa fa-whatsapp"></i></a>
                                    <a href="{{ $urus->facebook ?? '#pengurus' }}" target="{{ $urus->facebook ? '_blank' : '' }}"><i class="fa fa-facebook"></i></a>
                                </div>
                            </div>
                            </div>
                            <div class="team-descr font-alt">
                            <div class="team-name">{{ $urus->nama ?? '-' }}</div>
                            <div class="team-role">{{ $urus->posisi ?? '-' }}</div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
          </div>
        </section>

        <section id="map-section">
            <div class="map-container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.945894680764!2d107.0143520746822!3d-6.137971593848913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69896256bda113%3A0x596e1f76c0918196!2sCluster%20Madrid%20Mutiara%20Gading%20City!5e0!3m2!1sid!2sid!4v1743026420211!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </section>
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
