@php
    $totalUsers = \App\Models\User::count();
    $totalBookings = \App\Models\Booking::count();
    $totalLocations = \App\Models\Destination::count();
@endphp


@component('admin::layouts.app')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    @vite(['public/css/adminhome.css', 'public/js/admin-script1.js'])


<div class="box-container">

				<div class="box box1">
					<div class="text">
						<h2 class="topic-heading">{{ $totalUsers }}</h2>
						<h2 class="topic">Total Users</h2>
					</div>

					<img src="/images/user_stats.svg" alt="Total Users">
				</div>

				<div class="box box2">
					<div class="text">
						<h2 class="topic-heading">{{ $totalBookings }}</h2>
						<h2 class="topic">Total Bookings</h2>
					</div>
					<img src="/images/bookings.svg" alt="Bookings">
				</div>
                <div class="box box2">
					<div class="text">
						<h2 class="topic-heading">{{ $totalLocations }}</h2>
						<h2 class="topic">Total Locations</h2>
					</div>
					<img src="/images/bookings.svg" alt="Locations">
				</div>

        <canvas id="myChart" width="750" height="300"></canvas>
        <script>
            fetch('/users-and-bookings-by-month')
                .then(response => response.json())
                .then(data => {
                    const usersByMonth = data.usersByMonth.map(entry => ({
                        x: `${entry.year}-${entry.month}`,
                        y: entry.count
                    }));

                    const bookingsByMonth = data.bookingsByMonth.map(entry => ({
                        x: `${entry.year}-${entry.month}`,
                        y: entry.count
                    }));

                    const chartData = {
                        labels: usersByMonth.map(entry => entry.x),
                        datasets: [{
                            label: 'Total Users',
                            data: usersByMonth.map(entry => entry.y),
                            borderColor: 'rgb(255, 99, 132)',
                            backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        }, {
                            label: 'Total Bookings',
                            data: bookingsByMonth.map(entry => entry.y),
                            borderColor: 'rgb(54, 162, 235)',
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        }]
                    };

                    const ctx = document.getElementById('myChart').getContext('2d');
                    window.myChart = new Chart(ctx, {
                        type: 'line',
                        data: chartData,
                        options: {
                            scales: {
                                x: {
                                    type: 'time',
                                    time: {
                                        unit: 'month',
                                        displayFormats: {
                                            month: 'MMM YYYY'
                                        }
                                    },
                                    title: {
                                        display: true,
                                        text: 'Month'
                                    }
                                },
                                y: {
                                    title: {
                                        display: true,
                                        text: 'Count'
                                    }
                                }
                            }
                        }
                    });
                })
                .catch(error => {
                    console.error('Error fetching data:', error);
                });
        </script>

@endcomponent
