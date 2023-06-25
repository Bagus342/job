<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="css/landingPage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Job Street</title>
</head>

<body>

    <!-- navbar starts  -->

    <nav class="navbar navbar-expand-lg bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="landingPage.html"><span class="text-warning">Job</span>Street</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Daftar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php">Masuk</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- navbar ends -->

    <!-- carousel starts -->

    <div class="carousel slide" data-bs-ride="carousel" id="carouselExampleIndicators">
        <div class="carousel-indicators">
            <button aria-label="Slide 1" class="active" data-bs-slide-to="0" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 2" data-bs-slide-to="1" data-bs-target="#carouselExampleIndicators" type="button"></button> <button aria-label="Slide 3" data-bs-slide-to="2" data-bs-target="#carouselExampleIndicators" type="button"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img alt="..." class="d-block w-100" src="img/1.jpg">
                <div class="carousel-caption">
                    <h5>Daftar online dan buat iklan lowongan pekerjaan Anda</h5>
                    <p><a class="btn btn-warning mt-3" href="login.php">Daftar</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="..." class="d-block w-100" src="img/2.jpg">
                <div class="carousel-caption">
                    <h5>Posting iklan pekerjaan Anda</h5>
                    <p><a class="btn btn-warning mt-3" href="login.php">Daftar</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img alt="..." class="d-block w-100" src="img/3.jpg">
                <div class="carousel-caption">
                    <h5>Daftar sekarang untuk menemukan lowongan untukmu</h5>
                    <p><a class="btn btn-warning mt-3" href="login.php">Daftar</a></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" data-bs-slide="prev" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-prev-icon"></span> <span class="visually-hidden">Previous</span></button>
        <button class="carousel-control-next" data-bs-slide="next" data-bs-target="#carouselExampleIndicators" type="button"><span aria-hidden="true" class="carousel-control-next-icon"></span> <span class="visually-hidden">Next</span></button>
    </div>

    <!-- carousel end -->

    <!-- services section Starts -->

    <section class="services section-padding" id="services">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-5">
                        <h2>Apa saja kelebihan JobStreet</h2>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-center pb-2">
                        <div class="card-body">
                            <i class="bi bi-laptop"></i>
                            <h3 class="card-title">Lowongan Pekerjaan</h3>
                            <p class="lead">Buat iklan lowongan pekerjaan dan memulain untuk merekrut</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-center pb-2">
                        <div class="card-body">
                            <i class="bi bi-journal"></i>
                            <h3 class="card-title">Melamar Pekerjaan</h3>
                            <p class="lead">Dapatkan pekerjaan yang berarti bagimu.</p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-center pb-2">
                        <div class="card-body">
                            <i class="bi bi-intersect"></i>
                            <h3 class="card-title">Pekerjaan Sesuai Kategori</h3>
                            <p class="lead">Dapatkan pekerjaan berdasarkan preferensimu</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>

    <!-- services section end -->

    <!-- footer starts -->

    <footer>
        <div class="container">

            <div class="row">

                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <h2>Perusahaan</h2>
                        <ul>
                            <li><a href="#">Beranda</a></li>
                            <li><a href="#">Daftar</a></li>
                            <li><a href="#">Masuk</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <h2>Layanan</h2>
                        <ul>
                            <li><a href="#">Iklan Lowongan</a></li>
                            <li><a href="#">Talent Search</a></li>
                            <li><a href="#">Layanan Branding Perusahaan</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <h2>Bantuan</h2>
                        <ul>
                            <li><a href="#">Help Center</a></li>
                            <li><a href="#">Hubungi Kami</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-sm-6">
                    <div class="single-box">
                        <h2>Follow us on</h2>
                        <p class="socials">
                            <a href="#"><i class="fa fa-facebook"></i>
                                <a href="#"><i class="fa fa-instagram"></i>
                                    <a href="#"><i class="fa fa-twitter"></i>
                        </p>
                    </div>
                </div>

            </div>
        </div>
    </footer>

    <!-- footer end -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>