@extends('layout.app')

@push('styles')
    <style>
        .slick-prev:before,
        .slick-next:before {
            color: #333;
        }
    </style>
@endpush

@section('content')
            @if (session()->get('success'))
<div class="alert alert-important alert-success alert-dismissible" role="alert">
  <div class="d-flex">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
        fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
        <path d="M5 12l5 5l10 -10"></path>
      </svg>
    </div>
    <div>{{ Session()->get('success') }}</div>
  </div>
  <a class="btn-close btn-close-white" data-bs-dismiss="alert"
    aria-label="close"></a>
</div>
        @endif
         @if (session()->get('error'))
<div class="alert alert-important alert-danger alert-dismissible" role="alert">
  <div class="d-flex">
    <div>
      <svg xmlns="http://www.w3.org/2000/svg" class="icon alert-icon" width="24"
        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
        fill="none" stroke-linecap="round" stroke-linejoin="round">
        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
        <circle cx="12" cy="12" r="9" />
        <line x1="12" y1="8" x2="12" y2="12" />
        <line x1="12" y1="16" x2="12.01" y2="16" />
      </svg>
    </div>
    <div>{{ Session()->get('error') }}</div>
  </div>
  <a class="btn-close btn-close-white" data-bs-dismiss="alert"
    aria-label="close"></a>
</div>
        @endif
    <div class="container py-4">
        <div id="carousel-sample" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="0" class="active"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="1"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="2"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="3"></button>
                <button type="button" data-bs-target="#carousel-sample" data-bs-slide-to="4"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" alt=""
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStA1zREfwdFdKIgkJoGooLrFpQtrplGr88GtVKNwXeYQ&s=10" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt=""
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStA1zREfwdFdKIgkJoGooLrFpQtrplGr88GtVKNwXeYQ&s=10" />
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" alt=""
                        src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStA1zREfwdFdKIgkJoGooLrFpQtrplGr88GtVKNwXeYQ&s=10" />
                </div>
            </div>
            <a class="carousel-control-prev" data-bs-target="#carousel-sample" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" data-bs-target="#carousel-sample" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>

        <div class="mt-4" id="paket-langganan">
            <div class="d-flex align-items-center gap-2 mb-4">
                <span class="badge bg-yellow text-yellow-fg p-3">
                    <i class="fa-solid fa-crown fs-3"></i>
                </span>
                <h2 class="mt-3 text-dark">Paket Langganan</h2>
            </div>
            <div class="row g-4">
                @forelse ($subscriptionPackages ?? [] as $package)
                    <div class="col-md-4">
                        <div class="card h-100" style="background: linear-gradient(135deg, #ffffff 0%, {{ $package->color ?? '#a7f1c6' }})">
                            <div class="card-body row align-items-center">
                                <div class="col-4 text-center">
                                    <span class="badge bg-yellow text-yellow-fg p-3 rounded-circle">
                                        <i class="fa-solid fa-crown fs-2"></i>
                                    </span>
                                </div>
                                <div class="col-8 text-center text-dark">
                                    <h2 style="font-weight: bold;" class="text-uppercase mb-1">{{ $package->name }}</h2>
                                    <p class="text-secondary" style="font-weight: bold; margin: 0 !important;">{{ $package->description }}</p>
                                    <div class="mt-2">
                                        Rp <span style="font-size: 1.8rem; font-weight:bold;" class="text-warning">{{ number_format($package->price, 0, ',', '.') }}</span>
                                        <br>
                                        <span class="text-secondary" style="font-weight: bold; margin: 0 !important;">/ 30 Days</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-md-4">
                        <div class="card h-100" style="background: linear-gradient(135deg, #ffffff 0%, #a7f1c6)">
                            <div class="card-body row">
                                <div class="col-4"></div>
                                <div class="col-6 text-center text-dark">
                                    <h2 style="font-weight: bold ">NON-FICTION</h2>
                                    <p class="text-secondary" style="font-weight: bold; margin: 0 !important;">PACKAGE</p>
                                    <div>
                                        Rp <span style="font-size: 2rem; font-weight:bold; " class="text-warning">49.000</span>
                                        <br>
                                        <span class="text-secondary" style="font-weight: bold; margin: 0 !important;">/30 Days</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100" style="background: linear-gradient(135deg, #ffffff 0%, #a7f1c6)">
                            <div class="card-body row">
                                <div class="col-4"></div>
                                <div class="col-6 text-center text-dark">
                                    <h2 style="font-weight: bold ">PREMIUM</h2>
                                    <p class="text-secondary" style="font-weight: bold; margin: 0 !important;">PACKAGE</p>
                                    <div>
                                        Rp <span style="font-size: 2rem; font-weight:bold; " class="text-warning">99.000</span>
                                        <br>
                                        <span class="text-secondary" style="font-weight: bold; margin: 0 !important;">/30 Days</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card h-100" style="background: linear-gradient(135deg, #ffffff 0%, #a7f1c6)">
                            <div class="card-body row">
                                <div class="col-4"></div>
                                <div class="col-6 text-center text-dark">
                                    <h2 style="font-weight: bold ">FICTION</h2>
                                    <p class="text-secondary" style="font-weight: bold; margin: 0 !important;">PACKAGE</p>
                                    <div>
                                        Rp <span style="font-size: 2rem; font-weight:bold; " class="text-warning">49.000</span>
                                        <br>
                                        <span class="text-secondary" style="font-weight: bold; margin: 0 !important;">/30 Days</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
            </div>
        </div>

        <div class="mt-4">
            <div class="d-flex align-items-center gap-2 mb-4">
                <h2 class="mt-3 text-dark" style="font-weight: bold">Buku Baru Di Miliki</h2>
            </div>
            <div id="wrapper-slider">
                <div class="px-2">
                    <div class="card">
                        <div class="card-body">
                            <img class="d-block mx-auto w-75 h-50"
                                src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkZCNIBFn-dtWtw5_o9VZOYhh-YMiLepBQPTddB8m_FQ&s"
                                alt="">
                            <div class="d-flex gap-2 mt-2">
                                <p class="badge"><i class="fa-solid fa-mobile"></i>PDF</p>
                                <p class="badge">3+</p>
                            </div>
                            <div>
                                <h5><span style="font-size: 0.8rem;" class="text-secondary">Marzzz</span>
                                    <br><span style="font-size: 1rem">Card with Title</span>
                                </h5>
                                <h4 style="font-size: 1.2rem; font-weight: bold;">Rp 49.000</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-2">
                    <div class="card">
                        <div class="card-body">
                            <img class="d-block mx-auto w-75 h-50"
                                src="https://image.gramedia.net/plain/https://ebooks.gramedia.com/ebook-covers/49807/image_highres/ID_POP2019MTH10EPO.jpg"
                                alt="">
                            <div class="d-flex gap-2 mt-2">
                                <p class="badge"><i class="fa-solid fa-mobile"></i>PDF</p>
                                <p class="badge">3+</p>
                            </div>
                            <div>
                                <h5><span style="font-size: 0.8rem;" class="text-secondary">Marzzz</span>
                                    <br><span style="font-size: 1rem">Card with Title</span>
                                </h5>
                                <h4 style="font-size: 1.2rem; font-weight: bold;">Rp 49.000</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-2">
                    <div class="card">
                        <div class="card-body">
                            <img class="d-block mx-auto w-75 h-50"
                                src="https://image.gramedia.net/plain/https://ebooks.gramedia.com/ebook-covers/49184/image_highres/ID_AHPK2019MTH09AHP.jpg"
                                alt="">
                            <div class="d-flex gap-2 mt-2">
                                <p class="badge"><i class="fa-solid fa-mobile"></i>PDF</p>
                                <p class="badge">3+</p>
                            </div>
                            <div>
                                <h5><span style="font-size: 0.8rem;" class="text-secondary">Marzzz</span>
                                    <br><span style="font-size: 1rem">Card with Title</span>
                                </h5>
                                <h4 style="font-size: 1.2rem; font-weight: bold;">Rp 49.000</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-2">
                    <div class="card">
                        <div class="card-body">
                            <img class="d-block mx-auto w-75 h-50"
                                src="https://image.gramedia.net/plain/https://ebooks.gramedia.com/ebook-covers/111810/image_highres/BLK_CC1782792512197.jpg"
                                alt="">
                            <div class="d-flex gap-2 mt-2">
                                <p class="badge"><i class="fa-solid fa-mobile"></i>PDF</p>
                                <p class="badge">3+</p>
                            </div>
                            <div>
                                <h5><span style="font-size: 0.8rem;" class="text-secondary">Marzzz</span>
                                    <br><span style="font-size: 1rem">Card with Title</span>
                                </h5>
                                <h4 style="font-size: 1.2rem; font-weight: bold;">Rp 49.000</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="px-2">
                    <div class="card">
                        <div class="card-body">
                            <img class="d-block mx-auto w-75 h-50"
                                src="https://image.gramedia.net/plain/https://ebooks.gramedia.com/ebook-covers/34843/big_covers/ID_PAB2016MTH10AYOU_B____.jpg"
                                alt="">
                            <div class="d-flex gap-2 mt-2">
                                <p class="badge"><i class="fa-solid fa-mobile"></i>PDF</p>
                                <p class="badge">3+</p>
                            </div>
                            <div>
                                <h5><span style="font-size: 0.8rem;" class="text-secondary">Marzzz</span>
                                    <br><span style="font-size: 1rem">Card with Title</span>
                                </h5>
                                <h4 style="font-size: 1.2rem; font-weight: bold;">Rp 49.000</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <div class="d-flex align-items-center gap-2 mb-4">
                <h2 class="mt-3 text-dark" style="font-weight: bold;">Buku Gratis</h2>
            </div>
            <div class="row">
                <div class="col-4">
                    <div class="card d-flex flex-column">
                        <div class="row row-0 flex-fill">
                            <div class="col-md-3">
                                <a href="#">
                                    <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg" alt="card-side-image" class="w-100 h-100 object-cover">
                                </a>
                            </div>
                            <div class="col">
                                <div class="card-body h-full d-flex flex-column">
                                    <h3 class="card-title">
                                        <div class="badge"><i class="fa-solid ga-mobile"></i>PDF</div>
                                    </h3>
                                    <div class="text-secondary">
                                        Penulis
                                        <br><span class="text-dark">Judul Buku</span>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <h3><span class="text-decoration-line-through text-secondary">Rp 50.000</span>
                                        <span class="text-dark">Rp 0</span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card d-flex flex-column">
                        <div class="row row-0 flex-fill">
                            <div class="col-md-3">
                                <a href="#">
                                    <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg" alt="card-side-image" class="w-100 h-100 object-cover">
                                </a>
                            </div>
                            <div class="col">
                                <div class="card-body h-full d-flex flex-column">
                                    <h3 class="card-title">
                                        <div class="badge"><i class="fa-solid ga-mobile"></i>PDF</div>
                                    </h3>
                                    <div class="text-secondary">
                                        Penulis
                                        <br><span class="text-dark">Judul Buku</span>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <h3><span class="text-decoration-line-through text-secondary">Rp 50.000</span>
                                        <span class="text-dark">Rp 0</span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card d-flex flex-column">
                        <div class="row row-0 flex-fill">
                            <div class="col-md-3">
                                <a href="#">
                                    <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg" alt="card-side-image" class="w-100 h-100 object-cover">
                                </a>
                            </div>
                            <div class="col">
                                <div class="card-body h-full d-flex flex-column">
                                    <h3 class="card-title">
                                        <div class="badge"><i class="fa-solid ga-mobile"></i>PDF</div>
                                    </h3>
                                    <div class="text-secondary">
                                        Penulis
                                        <br><span class="text-dark">Judul Buku</span>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <h3><span class="text-decoration-line-through text-secondary">Rp 50.000</span>
                                        <span class="text-dark">Rp 0</span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card d-flex flex-column">
                        <div class="row row-0 flex-fill">
                            <div class="col-md-3">
                                <a href="#">
                                    <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg" alt="card-side-image" class="w-100 h-100 object-cover">
                                </a>
                            </div>
                            <div class="col">
                                <div class="card-body h-full d-flex flex-column">
                                    <h3 class="card-title">
                                        <div class="badge"><i class="fa-solid ga-mobile"></i>PDF</div>
                                    </h3>
                                    <div class="text-secondary">
                                        Penulis
                                        <br><span class="text-dark">Judul Buku</span>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <h3><span class="text-decoration-line-through text-secondary">Rp 50.000</span>
                                        <span class="text-dark">Rp 0</span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card d-flex flex-column">
                        <div class="row row-0 flex-fill">
                            <div class="col-md-3">
                                <a href="#">
                                    <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg" alt="card-side-image" class="w-100 h-100 object-cover">
                                </a>
                            </div>
                            <div class="col">
                                <div class="card-body h-full d-flex flex-column">
                                    <h3 class="card-title">
                                        <div class="badge"><i class="fa-solid ga-mobile"></i>PDF</div>
                                    </h3>
                                    <div class="text-secondary">
                                        Penulis
                                        <br><span class="text-dark">Judul Buku</span>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <h3><span class="text-decoration-line-through text-secondary">Rp 50.000</span>
                                        <span class="text-dark">Rp 0</span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-4">
                    <div class="card d-flex flex-column">
                        <div class="row row-0 flex-fill">
                            <div class="col-md-3">
                                <a href="#">
                                    <img src="https://marketplace.canva.com/EAFersXpW3g/1/0/1003w/canva-blue-and-white-modern-business-book-cover-cfxNJXYre8I.jpg" alt="card-side-image" class="w-100 h-100 object-cover">
                                </a>
                            </div>
                            <div class="col">
                                <div class="card-body h-full d-flex flex-column">
                                    <h3 class="card-title">
                                        <div class="badge"><i class="fa-solid ga-mobile"></i>PDF</div>
                                    </h3>
                                    <div class="text-secondary">
                                        Penulis
                                        <br><span class="text-dark">Judul Buku</span>
                                    </div>
                                    <div class="d-flex align-items-center pt-4 mt-auto">
                                        <h3><span class="text-decoration-line-through text-secondary">Rp 50.000</span>
                                        <span class="text-dark">Rp 0</span></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')
    <script>
        $('document').ready(function() {
            $('#wrapper-slider').slick({
                dots: true,
                infinite: false,
                speed: 300,
                slidesToShow: 4,
                slidesToScroll: 4,
                responsive: [{
                        breakpoint: 1024,
                        settings: {
                            slidesToShow: 3,
                            slidesToScroll: 3,
                            infinite: true,
                            dots: true
                        }
                    },
                    {
                        breakpoint: 600,
                        settings: {
                            slidesToShow: 2,
                            slidesToScroll: 2
                        }
                    },
                    {
                        breakpoint: 480,
                        settings: {
                            slidesToShow: 1,
                            slidesToScroll: 1
                        }
                    }
                ]
            });

        })
    </script>
@endpush
