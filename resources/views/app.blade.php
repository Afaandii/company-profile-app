<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Alamon Go | Company Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Poppins&family=Roboto&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/svg+xml" href="{{ asset('storage/image/logos-bg.png') }}" />
    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

    <!-- AOS untuk animasi fade-in, up, down -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @inertiaHead
</head>

<body>
    @inertia

    <!-- Setting Aos -->
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1200, // durasi animasi 1 detik
            once: true, // hanya animasi sekali saat pertama muncul
        });
    </script>

    <!-- JS Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
