
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
            <form action="{{ route('bookings.store')}}" method="POST">
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
                    <select name="pickup" id="pickup">
                        @foreach ($seededData as $location)
                            <option value="{{$location->id}}">{{$location->location}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name"><i class="fas fa-user"></i> Name</label>
                    <input type="text" id="name" name="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn"><i class="fas fa-taxi"></i> Book Now</button>
                </div>
            </form>
            </div>

        </div>

        <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit quo inventore odit saepe reprehenderit maiores dolorum id! Consequatur,
            reprehenderit soluta! Facilis aut quo omnis fugit atque, eaque aspernatur voluptate ullam?
        </p>

</body>
</html>
