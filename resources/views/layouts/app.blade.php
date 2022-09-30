<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css" rel="stylesheet" />

    <!-- Datatable -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href=" https://cdn.datatables.net/fixedheader/3.2.3/css/fixedHeader.bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.3.0/css/responsive.bootstrap.min.css">

    {{-- <link rel="stylesheed" href="https://cdn.datatables.net/plug-ins/1.10.13/features/mark.js/datatables.mark.min.css"> --}}
    @vite(['resources/sass/app.scss'])

    <!-- Datatables -->
    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css"> --}}

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    @section('css')


    </head>

    <body class="">
        <div id="app">
            <div class="bg-white py-3 shadow-sm rounded-0">
                <div class="d-flex justify-content-between">
                    <div class="col-md-3 text-md-center p-md-0 ps-5">
                        {{-- <a href="#offcanvasWithBothOptions" class="text-dark" data-bs-toggle="offcanvas" role="button"
                        aria-controls="offcanvasExample">
                        <i class="fa-solid fa-bars fa-lg"></i>
                    </a> --}}
                        @if (request()->path() == 'admin')
                            <a href="#canvas" class="text-dark" data-bs-toggle="offcanvas" role="button"
                                aria-controls="offcanvasExample">
                                <i class="fa-solid fa-bars fa-lg"></i>
                            </a>
                        @else
                            <a href="" class="text-dark fa-xl previousLink"> <i
                                    class="fa-solid fa-arrow-left-long"></i>
                            </a>
                        @endif

                    </div>
                    <div class="col-md-6 text-center">
                        <h5 class="mb-0"> @yield('title') </h5>
                    </div>
                    <div class="col-md-3"></div>
                </div>

                <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="canvas"
                    aria-labelledby="offcanvasWithBothOptionsLabel" style="width: 300px;">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasWithBothOptionsLabel">Ginger Shop</h5>
                    </div>
                    <div class="offcanvas-body">
                        <div class="w-100 mb-2">
                            <a href="" class="btn btn-light w-100 text-start text-decoration-none">
                                <i class="fas fa-users me-3"></i>
                                <span class="sidebar-link">Hello</span>
                            </a>
                        </div>
                        <div class="w-100">
                            <a href="" class="btn btn-light w-100 text-start text-decoration-none">
                                <i class="fas fa-users me-3"></i>
                                <span class="sidebar-link">Hello</span>
                            </a>
                        </div>
                        <div class="w-100">
                            <a href="{{route('category.index')}}"
                                class="btn btn-light w-100 text-start text-decoration-none">
                                <i class="fas fa-users me-3"></i>
                                <span class="sidebar-link">Category</span>
                            </a>
                        </div>
                        <div class="w-100">
                            <a href="{{route('cloth.index')}}"
                                class="btn btn-light w-100 text-start text-decoration-none">
                                <i class="fas fa-users me-3"></i>
                                <span class="sidebar-link">Cloth</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <div class="py-4">
                <div class="col-md-12 mx-auto">
                    @yield('content')
                </div>
            </div>

            <div class="bottom-bar d-flex justify-content-around bg-white shadow-lg position-fixed bottom-0 w-100 py-3" style="z-index: 9999999;">
                <a href="" class="text-dark">
                    <i class="fa fa-home fa-xl"></i>
                </a>
                <a href="{{ route('admin-profile') }}" class="text-dark">
                    <i class="fa-solid fa-circle-user fa-xl "></i>
                </a>
                <a href="" class="text-dark">
                    <i class="fa fa-home fa-xl"></i>
                </a>
            </div>

            <div class="my-5"></div>
        </div>





        <!-- Bootstrap -->
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
            integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
            integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>
        <!-- MDB -->
        {{-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"></script> --}}

        <!-- Jquery -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

        <!-- Sweet alert -->
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- Datatable -->
        {{-- <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script> --}}

        <!-- Datatable -->
        <script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap5.min.js"></script>
        <script src="https://cdn.datatables.net/fixedheader/3.2.3/js/dataTables.fixedHeader.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/dataTables.responsive.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.3.0/js/responsive.bootstrap.min.js"></script>

        <script src="https://cdn.jsdelivr.net/g/mark.js(jquery.mark.min.js)"></script>
        <script src="https://cdn.datatables.net/plug-ins/1.10.13/features/mark.js/datatables.mark.js"></script>

        @stack('script')

        <script>
            $(document).ready(function() {
                $(document).on('click', '.previousLink', function(e) {
                    e.preventDefault();
                    window.history.back();
                })
            })
        </script>
        </div>
    </body>

    </html>
