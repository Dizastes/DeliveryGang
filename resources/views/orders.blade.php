<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DeliveryGang</title>
    @include('templates.include')
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
</head>

<body>
    @include('templates.header')
    <main>
        @php
            $string = 'templates.' . $form_name . '_form';
        @endphp
        @include($string)
    </main>
    @include('templates.footer')
    <script>
        var pusher = new Pusher('e4af738018f4c430d7fb', {
            cluster: 'eu'
        });

        var channel = pusher.subscribe('order-accepted-channel');
        channel.bind('App\\Events\\OrderAccepted', function(data) {
            window.location.reload();
        });
    </script>
</body>

</html>
