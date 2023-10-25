<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 10 Custom User Registration & Login Tutorial - AllPHPTricks.com</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300;400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/scrollreveal@4.0.7/dist/scrollreveal.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/typed.js@2.0.12"></script>


</head>

<body>
    <div id="navbar-container">
        <div id="navbar">
            <h4>Portofolio</h4>
            <ul id="list-konten">
                <li><a href="">Home</a></li>
                <li><a href="">About Me</a></li>
                <li><a href="">Portofolio</a></li>
                <li><a href="">Contact</a></li>
                <li><a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <section class="home" id="home">
        <div class="home-content">
            <h3><span>Hello</span>,My Name Is</h3>
            <h1>Naufal Tri Subakti</h1>
            <h3>And I'm A <span>Software Engineering Student</span></h3>
            <p>Welcome to My Profile. Don't hesitate to introduce yourself, this website is not a formal website and I hope this is a place to express myself.
                And don't forget to visit My Social Media,
                my YouTube channel and give me a message or impression, enjoy your life guys...</p>


            <div class="social-media">
                <div class="social-media">
                    <a href="https://www.instagram.com/nauvaltri_?r=nametag"><i class="fab fa-instagram"></i></a>
                    <a href="comingsoon.html"><i class="fab fa-facebook"></i></a>
                    <a href="https://twitter.com/Nauval_rebahan?t=hte_2YLeQk2rDxtrYd-9rw&s=09"><i class="fab fa-twitter"></i></a>
                    <a href="comingsoon.html"><i class='bx bxl-tiktok'></i></a>
                </div>
            </div>



            <div class="container">
                <a href="comingsoon.html"><i class="fab fa-youtube"></i></a>
                <a href="comingsoon.html"><i class="btn">SUBSCRIBE</i></a>
            </div>


        </div>
        <div class="home-img">
            <img src="home 1.jpeg" alt="">

        </div>
    </section>




    <section class="about" id="about">
        <div class="about-img">
            <img src="about.jpeg" alt="">

        </div>
        <div class="about-content">
            <h2 class="heading">About <span>Me</span></h2>
            <h3>This is My Biography </h3>
            <P>Hello friends! You can call me "Naufal" or "Nopal". I am a third semester student at a university in Yogyakarta. I live in Tirtorahayu, Galur, Kulon Progo. born in tangerang city, the last child of 3 siblings, as usual 3 boys became tom and jerry when they were little:v and chicken noodle is one of my favorite foods</P>
            <h5>Kutipan Hidup</h5>
            <h4>"Lu punya duit,lu punya kuasa tapi buat gua nggak,Gua punya Allah gua punya segalanya hehe" (nauval)</h4>

            <a class="btn" id="read-more-btn">Read More</a>
        </div>
    </section>




    <section class="hobby" id="hobby">
        <h2 class="heading">My <span>Portofolio</span></h2>
        <div class="hobby-container">

            <div class="hobby-box">
                <img src="2.jpg" alt="">
                <div class="hobby-layer">
                    <h4>Sports</h4>
                </div>
            </div>

            <div class="hobby-box">
                <img src="1.jpg" alt="">
                <div class="hobby-layer">
                    <h4>Book and Coffee</h4>
                </div>
            </div>

            <div class="hobby-box">
                <img src="3.png" alt="">
                <div class="hobby-layer">
                    <h4>Play Music</h4>
                </div>
            </div>

            <div class="hobby-box">
                <img src="4.png" alt="">
                <div class="hobby-layer">
                    <h4>Programming Enthuisht</h4>
                </div>
            </div>

            <div class="hobby-box">
                <img src="7.jpg" alt="">
                <div class="hobby-layer">
                    <h4>Photograph</h4>
                </div>
            </div>

            <div class="hobby-box">
                <img src="6.jpg" alt="">
                <div class="hobby-layer">
                    <h4>Speaker</h4>
                </div>
            </div>

        </div>
    </section>

    <section class="pesan" id="pesan">
        <h2 class="heading">Pesan <span>Untuk Info Loker</span></h2>
        <form action="https://script.google.com/macros/s/AKfycbwLX27QCxjHAK7ztlG4tUh7oHfc0IP9RQSTsaZIkU98t-PmglgwX9iun_N6jwhDG72Q/exec" method="POST">
            <textarea id="message" name="message" cols="50" rows="15" placeholder="Pesan " required></textarea>
            <input type="submit" value="Send " class="btn">
            <input type="reset" value="Reset" class="btn">
        </form>
        </div>
    </section>




    <div class="contact-me" id="contact">
        <h2 class="heading"><span>Let's</span> be patner with me</h2>
        <h2 class="heading">Contact <span>Here!</span></h2>
        <div class="medsos">
            <a href="https://line.me/ti/p/VBJMvIH49x"><i class="fab fa-line"></i></a>
            <a href="https://line.me/ti/p/VBJMvIH49x"><i class="fab fa-whatsapp"></i></a>
        </div>
    </div>




    <footer class="footer">
        <div class="footer-text">
            <p>Copyright by Naufal || All Rights Reserved</p>
        </div>
        <div class="footer-iconTop">
            <a href="#home"><i class='bx bx-up-arrow-alt'></i></a>

        </div>
    </footer>
</body>

</html>