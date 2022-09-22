<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
    <link rel="stylesheet" href="https://drinkshop.up.railway.app/css/app.css">

    <title>Drink Shop</title>
    {{-- <script src="{{ asset('js/mapInput.js') }}"></script> --}}
    <script src="https://drinkshop.up.railway.app/js/mapInput.js"></script>
</head>

<body class="font-body">
    <div class="flex flex-col min-h-screen ">
        {{ $slot }}
    </div>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        var msg = '{{ Session::get('alert') }}';
        var exist = '{{ Session::has('alert') }}';
        if (exist) {
            Swal.fire({
                icon: 'success',
                text: `${msg}`
            })
        }
    </script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&libraries=places&callback=initMap&solution_channel=GMP_QB_addressselection_v1_cABC"
        async defer></script>


    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
