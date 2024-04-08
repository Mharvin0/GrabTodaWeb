<!DOCTYPE html>
<html lang="en">


<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<title>GrabToda</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;500;600;700;800;900&family=Roboto+Slab:wght@100;300;500;600;700;800;900&display=swap" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" rel="stylesheet"/>

<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

@vite(['public/css/style.css', 'public/js/app.js'])
</head>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script type="text/javscript"></script>
<body>
<header>
<nav class="navbar">
    <ul class="links-container">
        <li class="link-item"><a href="#home">Home</a></li>
        <li class="link-item"><a href="#services">Services</a></li>
        <li class="link-item"><a href="#about">About</a></li>
        <li class="link-item"><a href="#payment">Payment</a></li>
        <li class="link-item"><a href="#download">Download</a></li>
        @auth
        <li class="link-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="logout-button">Logout</button>
                </form>
        </li>
        @endauth
    </ul>
</nav>
</header>
</body>
<main class="hero-section" id="hero-section">
<div class="hero-section-content" data-aos="fade-up">
<h1 class="hero-section-sub-heading"></h1>
<div class="content">
    <h1>GrabToda</h1>
    <p>Your instant booking around Dagupan City!</p>
    <button class="book-now">
           <a href="{{ route('booking') }}">Book your ride now!</a></button>
</div>
</div>

<!-- scroll down img -->
<img src="/images/down arrow.png" class="scroll-down-icon" alt="scroll down indicator">
</main>
    <div class="background">
        <img src="/images/dagupan.jpeg" class="background-image" alt="hero-section image">
        <!-- grid -->
        <div class="grid-slider">
            <div class="grid-item hide"></div>
            <div class="grid-item hide"></div>
            <div class="grid-item hide"></div>
            <div class="grid-item hide"></div>
            <div class="grid-item hide"></div>
            <div class="grid-item hide"></div>
        </div>
    </div>

    <section class="home-section" id="home">
        <h1 class="section-title" data-aos="fade-up">Explore Dagupan City in one ride!</h1>
    <div class="tours-container">
        <div class="tour-card" data-aos="fade-up">
            <img src="/images/church.jpg" class="tour-img" alt="tour-image">
            <div class="tour-body">
                <h3 class="tour-name">St. John The Evangelist Cathedral</h3>
            </div>
        </div>

    <div class="tour-card" data-aos="fade-up">
        <img src="/images/sm.jpg" class="tour-img" alt="tour-image">
        <div class="tour-body">
            <h3 class="tour-name">SM Dagupan</h3>
        </div>
    </div>

    <div class="tour-card" data-aos="fade-up">
        <img src="/images/beach.jpg" class="tour-img" alt="tour-image">
        <div class="tour-body">
            <h3 class="tour-name">Tondaligan Beach</h3>
        </div>
    </div>

    <div class="tour-card" data-aos="fade-up">
        <img src="/images/up.jpg" class="tour-img" alt="tour-image">
            <div class="tour-body">
            <h3 class="tour-name">University of Pangasinan</h3>
            </div>
    </div>

    <div class="tour-card" data-aos="fade-up">
        <img src="/images/market.jpg" class="tour-img" alt="tour-image">
            <div class="tour-body">
                <h3 class="tour-name">Dagupan Malimgas Market</h3>
            </div>
    </div>
    </div>

</section>
    <!-- service grid -->
<section class="services-section" id="services">
            <h1 class="section-title" data-aos="fade-up">SERVICES</h1>
                <div class="services-grid">
                <div class="service-card" data-aos="fade-up">
                <div class="circle"></div>
                <i class="fa-solid fa-earth-americas card-icon"></i>
        <p class="service-text">Booking</p>
    </div>
        <div class="service-card" data-aos="fade-up">
        <div class="circle"></div>
            <i class="fa-solid fa-coins card-icon"></i>
            <p class="service-text">Discounts</p>
    </div>
        <div class="service-card" data-aos="fade-up">
        <div class="circle"></div>
            <i class="fa-solid fa-book-open card-icon"></i>
        <p class="service-text">Booking</p>
    </div>
        <div class="service-card" data-aos="fade-up">
            <div class="circle"></div>
            <i class="fa-solid fa-person-snowboarding card-icon"></i>
        <p class="service-text">Ride</p>
    </div>
</div>
</section>
<!-- about grid -->
<section class="about-section" id="about">
        <h1 class="section-title" data-aos="fade-up">ABOUT</h1>
            <div class="bg-circle"></div>
            <div class="bg-circle-2"></div>
        <p class="section-para" data-aos="fade-up">
        The GrabToda is a passenger transport where users can book a tricycle around Dagupan TODA to get a safe and efficient service. From the app: Simply input pick up and drop off details, confirmation fare by pressing the booking, and head to the designated location once you've been allocated a driver. Our service is only available for the  users of Dagupan.
        </p>
</section>
<!-- payment grid -->
<section class="payment-section" id="payment">
        <h1 class="section-title" data-aos="fade-up">PAYMENT</h1>
            <div class="bg-circle"></div>
        <p class="section-para" data-aos="fade-up">
        The Sangguniang Bayan has the power to regulate the operation of tricycles within the territorial jurisdiction of the Municipality subject to guidelines prescribed by the Department of Transportation and Communications.
        </p>
            <div class="payment-grid" id="payment">
                <img src="gcash.jpg" data-aos="fade-up" alt="">
                <img src="cash.jpg" data-aos="fade-up" alt="">
                <img src="ewallet.jpg" data-aos="fade-up" alt="">
        </div>
</section>

<!-- contact section -->
<section class="book-section" id="download">
        <div class="book-content" data-aos="fade-up">
            <h1 class="book-now-title">Download our mobile application now for fast and easy booking!</h1>
        <p class="book-now-text"></p>
        <button class="book-now">
           <a href="">Download</a></button>

        </div>
            <div class="bg-circle-2"></div>
            <img src="/images/booking.png" data-aos="fade-up" class="book-now-img" alt="">
</section>

<!-- footer -->
<footer class="footer">
    <img src="logo.png" class="footer-logo" alt="">
        <div class="footer-text">
            <p>Ride with GrabToda!</p>
            <p>Gmail - grabtoda@gmail.com</p>
            <p>Phone - 99 88 776655, 99 88 776644</p>
            <p>Address - Arellano Street, Dagupan City, Pangasinan</p>
        </div>
    <p class="copyright-line">This design is a concept design. Made by Infinite Loopers ❤️</p>
</footer>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    AOS.init();
</script>
</body>
</html>
