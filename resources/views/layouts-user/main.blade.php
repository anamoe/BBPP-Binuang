<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BBBPP Binuang</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" rel="stylesheet">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.css" rel="stylesheet">

    <style>
        /* Navbar utama */
        .navbar-bbpp {
            background: linear-gradient(90deg, #c3dcc3ff 0%, #66a074ff 40%, #3f8e55ff 100%);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
        }

        /* Link menu */
        .navbar-bbpp .nav-link {
            color: #1b5e20;
            font-weight: 600;
            font-size: 15.5px;
        }

        /* Hover */
        .navbar-bbpp .nav-link:hover {
            color: #2e7d32;
        }

        /* Active menu */
        .navbar-bbpp .nav-link.active {
            color: #2e7d32;
            border-bottom: 2px solid #2e7d32;
        }

        /* Brand text kalau ada */
        .navbar-bbpp .navbar-brand {
            color: #1b5e20;
            font-weight: 700;
        }


        /* Dropdown transparan & elegan */
        .dropdown-menu {
            background: rgba(255, 255, 255, 0.85);
            /* transparan */
            backdrop-filter: blur(8px);
            /* efek glass */
            border: none;
            /* hilangkan garis tebal */
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.08);
            /* shadow halus */
            border-radius: 10px;
            padding: 8px 0;
        }

        /* Item di dalam dropdown */
        .dropdown-menu .dropdown-item {
            font-size: 15px;
            font-weight: 500;
            /* tidak terlalu tebal */
            padding: 10px 18px;
            transition: all 0.2s ease;
        }

        /* Hover elegan */
        .dropdown-menu .dropdown-item:hover {
            background: rgba(13, 110, 253, 0.08);
            padding-left: 22px;
            /* efek geser halus */
        }

        .dropdown-menu .dropdown-item {
            font-size: 16px !important;
            font-weight: 600 !important;
        }

        .navbar .nav-link {
            font-size: 16.5px;
            font-weight: 600;
        }

        .navbar .nav-link {
            color: white !important;
            font-weight: 700;
        }

        .navbar .nav-link:hover {
            color: #000000ff !important;
        }

        .navbar .nav-link.active {
            color: black !important;
        }

        */ body {
            font-family: 'Inter', sans-serif;
            font-weight: 400;
            line-height: 1.6;
        }

        .topbar a {
            color: #000;
            font-weight: 500;
        }

        .navbar {
            background-color: #fff !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        .navbar-brand {
            font-weight: 700;
            color: #3e7712 !important;
            font-size: 1.3rem;
        }

        /* .nav-link {
            color: #333 !important;
            font-weight: 500;
            margin: 0 6px;
            transition: all 0.3s;
        }

        .nav-link:hover,
        .nav-link.active {
            color: #3e7712 !important;
        } */

        .hero .carousel-item img {
            height: 600px;
            object-fit: cover;
            filter: brightness(0.7);
        }

        .hero .carousel-caption {
            bottom: 150px;
            text-align: left;
        }

        .hero h1 {
            font-size: 2.8rem;
            font-weight: 700;
        }

        .section-title {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-title h2 {
            font-weight: 400;
            position: relative;
            display: inline-block;
        }

        #tentang img {
            transition: transform 0.5s ease;
        }

        #tentang img:hover {
            transform: scale(1.03);
        }

        #layanan .card {
            border: none;
            background: #fff;
            transition: all 0.3s ease;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        #layanan .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        #produk .card {
            border: none;
            transition: all 0.3s ease;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        #produk .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        #kontak form input,
        #kontak form textarea {
            border-radius: 8px;
            border: 1px solid #ccc;
            transition: all 0.3s;
        }

        #kontak form input:focus,
        #kontak form textarea:focus {
            border-color: #3e7712;
            box-shadow: 0 0 5px rgba(25, 135, 84, 0.4);
        }

        footer {
            background-color: #2f451e;
            color: white;
            padding: 60px 0 20px;
        }

        footer h5 {
            color: rgb(248, 248, 248);
            margin-bottom: 20px;
            font-weight: 300;
        }

        /* footer a,p, h3 {
            color: #7e7e7e;
            text-decoration: none;
        } */
        footer a,
        footer p,
        footer h3 {
            color: white;
            text-decoration: none;
        }

        footer a:hover {
            color: #3e7712;
        }

        .footer-bottom {
            border-top: 1px solid #ccc;
            padding-top: 20px;
            margin-top: 40px;
            text-align: center;
            font-size: 0.9rem;
        }

        .social-icon {
            display: inline-block;
            color: #fff;
            margin-right: 10px;
            font-size: 20px;
            transition: 0.3s;
        }

        .social-icon:hover {
            color: #1abc9c;
        }

        /* Section title */
        .section-title h2 {
            font-weight: 700;
            font-size: 2rem;
        }

        #upt {
            position: relative;
        }

        .custom-nav-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #3e7712;
            border-radius: 50%;
            color: #fff;
            font-size: 20px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
            position: absolute;
            top: 55%;
            transform: translateY(-50%);
            cursor: pointer;
            transition: all 0.3s ease;
            z-index: 10;
        }

        .swiper-button-prev {
            left: 20px;
            margin-top: 12px
        }

        .swiper-button-next {
            right: 20px;
            margin-top: 12px
        }

        .custom-nav-btn:hover {
            background-color: #145a32;
            transform: translateY(-50%) scale(1.1);
        }

        .swiper-button-prev::after,
        .swiper-button-next::after {
            display: none !important;
        }

        .swiper-pagination-bullet {
            background: #c7e6d1 !important;
            opacity: 1 !important;
            margin-top: 30px !important;
        }

        .swiper-pagination-bullet-active {
            background: #3e7712 !important;
        }

        .alumni-section {
            position: relative;
            background: url('image/alumni.jpg');
            color: white;
        }

        .alumni-section .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.55);
            /* lapisan gelap */
            z-index: 1;
        }

        .alumni-section .container {
            position: relative;
            z-index: 2;
        }

        .social-box {
            background: #fff;
            overflow: hidden;
            /* bisa diganti auto kalau ingin scroll */
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 10px;
            /* beri sedikit ruang di dalam box */
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            /* jangan pakai height tetap */
        }

        #calendar {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .fc-toolbar-title {
            font-weight: 700;
            font-size: 1.8rem;
            color: #3e7712;
        }

        .fc-daygrid-event {
            border-radius: 8px;
            padding: 4px 6px;
            font-size: 0.85rem;
            cursor: pointer;
        }

        .fc-daygrid-event:hover {
            opacity: 0.85;
            box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
        }

        .fc-button {
            background-color: #3e7712;
            border: none;
            color: #fff;
            font-weight: 500;
            border-radius: 6px;
        }

        .fc-button:hover {
            background-color: #145a32;
        }

        .bg-success {
            background-color: #3e7712 !important;
        }

        .btn-success {
            background-color: #3e7712 !important;
        }

        .bg-success {
            background-color: #3e7712 !important;
        }

        .img-wrapper {
            position: relative;
            overflow: hidden;
        }

        .img-title-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.6);
            color: #fff;
            padding: 8px;
            text-align: center;
            opacity: 0;
            transition: 0.3s;
            font-weight: bold;
            font-size: 14px;
        }

        .img-wrapper:hover .img-title-overlay {
            opacity: 1;
        }

        .dropdown-menu .dropdown-item:hover {
            background-color: var(--bs-success);
            color: #fff;
        }
    </style>
</head>

<body>

    @include('partials.navbar-front')

    @yield('content')

    @include('partials.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 6,
            spaceBetween: 2,
            loop: true,
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 2
                },
                576: {
                    slidesPerView: 3
                },
                992: {
                    slidesPerView: 6
                },
            },
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.9/index.global.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/main.min.js"></script>
    {{-- === AOS === --}}
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <!-- <script src="https://cdn.userway.org/widget.js" data-account="FYN6Hghdh8"></script> -->
    <script>
        (function(d) {
            var s = d.createElement("script");
            /* uncomment the following line to override default position*/
            s.setAttribute("data-position", 2);
            /* uncomment the following line to override default size (values: small, large)*/
            /* s.setAttribute("data-size", "small");*/
            /* uncomment the following line to override default language (e.g., fr, de, es, he, nl, etc.)*/
            /* s.setAttribute("data-language", "language");*/

            s.setAttribute("data-color", "#0fa00fff");
            /* uncomment the following line to override type set via widget (1=person, 2=chair, 3=eye, 4=text)*/
            /* s.setAttribute("data-type", "1");*/
            /* s.setAttribute("data-statement_text:", "Our Accessibility Statement");*/
            /* s.setAttribute("data-statement_url", "http://www.example.com/accessibility")";*/
            /* uncomment the following line to override support on mobile devices*/
            /* s.setAttribute("data-mobile", true);*/
            /* uncomment the following line to set custom trigger action for accessibility menu*/
            /* s.setAttribute("data-trigger", "triggerId")*/
            /* uncomment the following line to override widget's z-index property*/
            /* s.setAttribute("data-z-index", 10001);*/
            /* uncomment the following line to enable Live site translations (e.g., fr, de, es, he, nl, etc.)*/
            s.setAttribute("data-site-language", "null");
            s.setAttribute("data-widget_layout", "full")
            s.setAttribute("data-account", "FYN6Hghdh8");
            s.setAttribute("src", "https://cdn.userway.org/widget.js");
            (d.body || d.head).appendChild(s);
        })(document)
    </script>
    <noscript>Please ensure Javascript is enabled for purposes of <a href="https://userway.org">website accessibility</a></noscript>

    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 80
        });
    </script>

    <script>
        const bulanIndo = [
            "Januari", "Februari", "Maret", "April", "Mei", "Juni",
            "Juli", "Agustus", "September", "Oktober", "November", "Desember"
        ];

        const now = new Date();
        const bulan = bulanIndo[now.getMonth()];
        const tahun = now.getFullYear();

        const updateText = document.getElementById("update-text");
        if (updateText) {
            updateText.innerText = `Update ${bulan} ${tahun}`;
        }

        const copyright = document.getElementById("c");
        if (copyright) {
            copyright.innerText = `© BBPP Binuang ${tahun}`;
        }
    </script>

    @yield('js')


    <script>
        function speak(text) {
            if (!text) return;

            const msg = new SpeechSynthesisUtterance(text);
            msg.lang = "id-ID";

            window.speechSynthesis.cancel();
            window.speechSynthesis.speak(msg);
        }

      
        document.addEventListener('click', function() {
            speak("");//suara
        }, {
            once: true
        });

   
        document.addEventListener('mousemove', function(e) {

            const menu = e.target.closest('.nav-link, .dropdown-item');
            if (!menu) return;

            if (menu.dataset.speaking) return; 

            menu.dataset.speaking = "1";

            const text = menu.dataset.voice || menu.textContent.trim();
            speak(text);

            setTimeout(() => menu.dataset.speaking = "", 800);

        });
    </script>

    <div id="fb-root"></div>

    <script>
        window.fbAsyncInit = function() {
            FB.init({
                xfbml: true,
                version: 'v17.0'
            });
        };
    </script>

    <script async defer crossorigin="anonymous"
        src="https://connect.facebook.net/id_ID/sdk.js"></script>

    <script async src="https://www.instagram.com/embed.js"></script>

    <script async src="https://www.tiktok.com/embed.js"></script>

    <script>
        window.addEventListener("load", function() {
            if (window.FB) {
                FB.XFBML.parse();
            }
        });
    </script>


</body>

</html>