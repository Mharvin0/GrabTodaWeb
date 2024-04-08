<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
    @vite(['public/css/booking.css'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
</head>
<body>
    <div class="container">
        <div class="title">Book Your Ride</div>
        @auth
        <form id="booking-form" action="{{ route('bookings.store')}}" method="POST">
            @csrf
            <div class="form-group">
                <label for="pickup"><i class="fas fa-map-marker-alt"></i> Pick-up</label>
                <select name="pickup" id="pickup">
                    @foreach ($seededData as $location)
                        <option value="{{$location->id}}">{{$location->location}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="dropoff"><i class="fas fa-map-marker-alt"></i> Drop off</label>
                <select name="dropoff" id="dropoff">
                    @foreach ($seededData as $location)
                        <option value="{{$location->id}}">{{$location->location}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="name"><i class="fas fa-user"></i> Name</label>
                <input type="text" id="name" name="name" placeholder="Enter your name" value="{{ auth()->user()->name }}" readonly>
            </div>
            <div class="form-group">
                <button type="button" class="btn" onclick="openPopup()"><i class="fas fa-taxi"></i> Book Now</button>
            </div>
        </form>
        @else
            <p>Please <a href="{{ route('login') }}">log in</a> to book a ride.</p>
        @endauth
    </div>
    <div class="popup" id="popup">
        <img src="/images/tick.png">
        <h2>Booking success!</h2>
        <p style="text-align: justify">Thank you for booking with us. Your ride will arrive shortly!</p>
        <button type="button" class="btn-ok" onclick="closePopup()">Confirm</button>
    </div>
    <p>
        Book your ride with us now! Simply fill up the form and wait for your Rider or you can use our mobile application to book your ride.
        Our mobile application is just one tap away!
    </p>
    @vite(['public/js/booking-location.js'])
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const pickupSelect = document.getElementById('pickup');
            const dropoffSelect = document.getElementById('dropoff');

            pickupSelect.addEventListener('change', function () {
                const selectedPickup = this.value;

                for (let i = 0; i < dropoffSelect.options.length; i++) {
                    dropoffSelect.options[i].disabled = false;
                }

                for (let i = 0; i < dropoffSelect.options.length; i++) {
                    if (dropoffSelect.options[i].value === selectedPickup) {
                        dropoffSelect.options[i].disabled = true;
                    }
                }
            });

            dropoffSelect.addEventListener('change', function () {
                const selectedDropoff = this.value;

                for (let i = 0; i < pickupSelect.options.length; i++) {
                    pickupSelect.options[i].disabled = false;
                }

                for (let i = 0; i < pickupSelect.options.length; i++) {
                    if (pickupSelect.options[i].value === selectedDropoff) {
                        pickupSelect.options[i].disabled = true;
                    }
                }
            });
        });

        let popup = document.getElementById("popup");

        function openPopup() {
            popup.classList.add("open-popup");
        }

        function closePopup() {
            popup.classList.remove("open-popup");
            document.getElementById('booking-form').submit();
        }
    </script>
</body>
</html>
