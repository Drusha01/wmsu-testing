<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel').' - '.$title }}</title>
    <link rel="stylesheet" href="{{ asset('css/user.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Abril+Fatface&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="shortcut icon" href="{{ asset('images/favicon/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('images/favicon/favicon.ico') }}" type="image/x-icon"></head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@livewireStyles
</head>
<body>
    @livewire('components.header.header-navigation')
    @include('student-components.student-navtabs')
    {{ $slot }}


    @livewireScripts
    <script>
         window.addEventListener('swal:message', event => {
            Swal.fire({
                position: event.detail.position,
                icon: event.detail.icon,
                title: event.detail.title,
                text: event.detail.text,
                showConfirmButton: false,
                timer: event.detail.timer,
                timerProgressBar: true,
                allowOutsideClick: false,
                allowEscapeKey: false
            })
        });

        window.addEventListener('swal:redirect', event => {
            Swal.fire({
                    position: event.detail.position,
                    icon: event.detail.icon,
                    title: event.detail.title,
                    text: event.detail.text,
                    showConfirmButton: false,
                    timer: event.detail.timer,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                    })
                .then(function() {
                    window.location.href = `${event.detail.link}`
                });
        });

        window.addEventListener('swal:confirm', event => {
            Swal.fire({
                    position: event.detail.position,
                    icon: event.detail.icon,
                    title: event.detail.title,
                    text: event.detail.text,
                    showConfirmButton: true,
                    })
                .then(function() {
                    window.location.href = `${event.detail.link}`
                });
        });

        window.addEventListener('swal:accessrole', event => {
            Swal.fire({
                position: event.detail.position,
                icon: event.detail.icon,
                title: event.detail.title,
                html: event.detail.html,
                timer: event.detail.timer
            })
        });

        window.addEventListener('swal:redirect-link', event => {
            Swal.fire({
                    position: event.detail.position,
                    icon: event.detail.icon,
                    title: event.detail.title,
                    html: event.detail.html,
                    timer: event.detail.timer
                })
                .then(function() {
                    window.location.href = `${event.detail.link}`
                });
        });

        window.addEventListener('swal:refresh', event => {
            Swal.fire({
                    position: event.detail.position,
                    icon: event.detail.icon,
                    title: event.detail.title,
                    text: event.detail.text,
                    showConfirmButton: false,
                    timer: event.detail.timer,
                    timerProgressBar: true,
                    allowOutsideClick: false,
                    allowEscapeKey: false
                })
                .then(function() {
                    location.reload();
                });
        });


        window.addEventListener('swal:confirmation', event => {
            Swal.fire({
                position: event.detail.position,
                icon: event.detail.icon,
                title: event.detail.title,
                text: event.detail.text,
                showDenyButton: event.detail.showDenyButton,
                showCancelButton: event.detail.showCancelButton,
                confirmButtonText: event.detail.confirmButtonText,
                denyButtonText: event.detail.denyButtonText
            }).then((result) => {
                if (result.isConfirmed) {
                    window.livewire.emit('confirm');
                } else if (result.isDenied) {
                    Swal.fire(event.detail.fail_message);
                }
            })
        });

        window.addEventListener('swal:close-current-tab', event => {
            Swal.fire({
                position: event.detail.position,
                icon: event.detail.icon,
                title: event.detail.title,
                timer: event.detail.timer
            }).then(function() {
                window.close();
            });
        });
    </script>
</body>
</html>