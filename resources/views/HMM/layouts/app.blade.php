<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Klassy Delecious Resturant</title>

    <link rel="shortcut icon" href="" type="image/jpg">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">
    {{-- style --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('assets/css/owl-carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightbox.css')}}">

    {{-- script --}}
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

<!-- jQuery -->
<script src="{{ asset('assets/js/jquery-2.1.0.min.js')}}"></script>

<!-- Bootstrap -->
<script src="{{ asset('assets/js/popper.js')}}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js')}}"></script>

<!-- Plugins -->
<script src="{{ asset('assets/js/owl-carousel.js')}}"></script>
<script src="{{ asset('assets/js/accordions.js')}}"></script>
<script src="{{ asset('assets/js/datepicker.js')}}"></script>
<script src="{{ asset('assets/js/scrollreveal.min.js')}}"></script>
<script src="{{ asset('assets/js/waypoints.min.js')}}"></script>
<script src="{{ asset('assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{ asset('assets/js/imgfix.min.js')}}"></script> 
<script src="{{ asset('assets/js/slick.js')}}"></script> 
<script src="{{ asset('assets/js/lightbox.js')}}"></script> 
<script src="{{ asset('assets/js/isotope.js')}}"></script> 

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- DataTables CSS and JS files -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.0/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>

<!-- DataTables Buttons CSS and JS files -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.0.1/css/buttons.dataTables.min.css">
<script src="https://cdn.datatables.net/buttons/2.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.5.0/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js"></script>


<!-- Global Init -->
<script src="{{ asset('assets/js/custom.js')}}"></script>

    @if (request()->segment(2) != 'home')
        <style>
            .nav-icon{
                transition: all 5s ease;
                width: 20px;
                text-decoration: none;
            }
            .nav-icon i{
                width: 100%;
                height: auto;
            }
            .nav-icon i:nth-child(2){
                display: none;
            }
            .nav-icon:hover i:nth-child(1){
                display: none;
            }
            .nav-icon:hover i:nth-child(2){
                display: block;
            }
        </style>
    @endif
</head>

<body>

    @include('HMM.layouts.partials.nav')

    <main class="container">
        @yield('content')
    </main>
</body>

</html>
