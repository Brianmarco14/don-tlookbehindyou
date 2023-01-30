<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Don't Look Behind You</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Dangrek&display=swap');

        .swiper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            font-size: 1.1rem;

            /* Center slide text vertically */
            display: -webkit-box;
            display: -ms-flexbox;
            display: -webkit-flex;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            -webkit-justify-content: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            -webkit-align-items: center;
            align-items: center;
            transition: .3s;
        }

        .swiper-slide:hover {
            transform: translateY(5px)
        }

        .btn {
            transition: .3s;

        }

        .btn:hover {
            transform: translateX(-5px);

        }
    </style>

</head>

<body class=" bg-dark text-light" style="font-family: 'Dangrek', cursive;">
    <nav class="navbar bg-dark shadow">
        <div class="container-fluid">
            <a class="nav-link text-white ms-auto me-auto" href="{{ url('/') }}">
                <img src="{{ asset('yt2.png') }}" alt="" width="100px" height="100px">
            </a>
        </div>
    </nav>
    
    <div class="container-fluid">
            @yield('isi')
        </div>

        
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 mt-5 border-top">
        <p class="col-md-4 mb-0 text-muted">© 2023 Don't Look Behind You, Inc</p>

        <a href="/"
            class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
            <img src="{{ asset('yt2.png') }}" width="50px" height="50px" alt="">
        </a>

        <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="{{ route('show',1) }}" class="nav-link px-2 text-muted">Creepy</a></li>
            <li class="nav-item"><a href="{{ route('show',2) }}" class="nav-link px-2 text-muted">Riddle</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Kontak</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
        </ul>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <script>
        AOS.init();
    </script>
    <script>
        var swiper = new Swiper(".mySwiper", {
            slidesPerView: 4,
            spaceBetween: 30,
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
        });
    </script>
</body>

</html>
