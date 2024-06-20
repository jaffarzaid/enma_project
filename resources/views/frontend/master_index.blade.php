<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="generator" content="Mobirise v5.9.18, mobirise.com">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
    <link rel="shortcut icon" href="{{ asset('frontend/assets/images/enma-logo-1-384x384.png') }}" type="image/x-icon">
    <meta name="description" content="">
    <title>Enma Institute</title>

    <link rel="stylesheet" href="{{ asset('frontend/assets/web/assets/mobirise-icons/mobirise-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap/css/bootstrap-grid.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/bootstrap/css/bootstrap-reboot.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/animatecss/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/dropdown/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/socicon/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/theme/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/assets/recaptcha.css') }}">
    <link rel="preload"
        href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap"
        as="style" onload="this.onload=null;this.rel='stylesheet'">
    <noscript>
        <link rel="stylesheet"
            href="https://fonts.googleapis.com/css?family=Inter+Tight:100,200,300,400,500,600,700,800,900,100i,200i,300i,400i,500i,600i,700i,800i,900i&display=swap">
    </noscript>
    {{-- <link rel="preload" as="style" href="{{ asset('assets/mobirise/css/mbr-additional.css?v=AsmSqY') }}"> --}}
    <link rel="stylesheet" href="{{ asset('frontend/assets/mobirise/css/mbr-additional.css?v=AsmSqY') }}"
        type="text/css">

    <link rel="preload" as="style" href="{{ asset('frontend/assets/mobirise/css/mbr-additional.css?v=iCOhHZ') }}">
    <link rel="stylesheet"
        href="{{ asset('frontend/assets/mobirise/css/mbr-additional.css?v=iCOhHZ') }}"type="text/css">
    <!-- font-awesome CDN -->
    <script src="https://kit.fontawesome.com/8061aaf173.js" crossorigin="anonymous" async></script>

    {{-- Country code extension --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/css/intlTelInput.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/intlTelInput.min.js"></script>

    {{-- Flash Notification CSS --}}
    {{-- <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css"> --}}
</head>

<body>
    {{-- header --}}
    @include('frontend.header.header')

    {{-- Body --}}
    @yield('dynamic')

    {{-- Footer --}}
    @include('frontend.footer.footer')

    <script src="{{ asset('frontend/assets/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/smoothscroll/smooth-scroll.js') }}"></script>
    <script src="{{ asset('frontend/assets/ytplayer/index.js') }}"></script>
    <script src="{{ asset('frontend/assets/dropdown/js/navbar-dropdown.js') }}"></script>
    <script src="{{ asset('frontend/assets/theme/js/script.js') }}"></script>
    {{-- <script src="{{ asset('frontend/assets/formoid.assets') }}"></script> --}}

    <script src="{{ asset('JS/trainee_input_validation.js') }}"></script>
</body>

{{-- Script to dispplay country code to Mobile Number --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const phoneInputFields = document.querySelectorAll("#phone_1, #phone_2, #emr_phone");

        phoneInputFields.forEach(function(phoneInputField) {
            const phoneInput = window.intlTelInput(phoneInputField, {
                initialCountry: "bh",
                utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
            });

            // Add an event listener for the input field
            phoneInputField.addEventListener("input", function() {
                const countryData = phoneInput.getSelectedCountryData();
                const formattedNumber = phoneInput.getNumber();

                // Display the formatted number with the country code
                console.log(`Country Code: +${countryData.dialCode}, Phone Number: ${formattedNumber}`);
            });
        });
    });
</script>
</html>
