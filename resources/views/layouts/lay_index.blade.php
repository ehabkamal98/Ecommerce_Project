<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>E-Commerce - Home Page</title>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/app.css')}}" rel="stylesheet">
</head>

<body>

<header id="header">
    <div class="container-fluid">

        <div class="logo float-left">
            <h1 class="text-dark"><a href="/"><i class="bx text-dark bx-cart"></i><span class="text-dark">ECP</span></a></h1>
        </div>
        <span class="nav-toggle">
            <a href="{{route('show_login')}}" style="padding: 10px"> <i class="bx bx-log-in"></i> </a>
            <a href="{{route('show_reg')}}" style="padding: 10px"> <i class="bx bx-user-plus"></i> </a>
        </span>

    </div>
</header>

<section id="base">
    <div class="base-container">
        <h1>E-Commerce</h1>
        <h2>Join Us and shop</h2>
    @yield('form')
    </div>
</section>

<section id="why-us" class="why-us section-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="card">
                    <div class="card-icon">
                        <i class="bx bx-book-reader"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="">Our Mission</a></h5>
                        <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="card">
                    <div class="card-icon">
                        <i class="bx bx-calendar-edit"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="">Our Plan</a></h5>
                        <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="card">
                    <div class="card-icon">
                        <i class="bx bx-landscape"></i>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title"><a href="">Our Vision</a></h5>
                        <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia magni dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet. </p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<section id="about" class="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{asset('images/0design/us.jpg')}}" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0">
                <h1 class="text-center" style="margin-bottom: 50px">Project Team</h1>
               <h3><ul>
                    <li><i class="bx bx-user"></i> Ehab Kamal Fayez</li>
                    <li><i class="bx bx-user"></i> Bavly Boshra Zakhary</li>
                    <li><i class="bx bx-user"></i> Joseph Tharwat</li>
                    <li><i class="bx bx-user"></i> Aya Saiyd</li>
                </ul>
               </h3>
            </div>
        </div>

    </div>
</section>


<footer id="footer">
    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>Ecommerce Section 2</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
            Supervisor <b>Prof Islam Tag El-din</b> <br>
            Supervisor <b>Prof Mina Nagy</b>
        </div>
    </div>
</footer>

<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="vendor/php-email-form/validate.js"></script>
<script src="assets/js/main.js"></script>

</body>

</html>
