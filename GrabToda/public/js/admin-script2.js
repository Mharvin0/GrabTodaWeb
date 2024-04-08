console.log('Fetching recent bookings data...');
fetch('/api/recent-bookings')
    .then(response => response.json())
    .then(data => {
        if (data.recentBookings) {
            const recentBookings = data.recentBookings;
            const recentBookingsTable = document.getElementById('recentBookingsTable');
            recentBookingsTable.innerHTML = ''; // Clear previous data

            recentBookings.forEach(booking => {
                const row = document.createElement('div');
                row.classList.add('report-row');

                const bookerCell = document.createElement('div');
                bookerCell.classList.add('report-cell');
                bookerCell.textContent = booking.user.email;

                const pickupCell = document.createElement('div');
                pickupCell.classList.add('report-cell');
                pickupCell.textContent = booking.pickup_location;

                const dropoffCell = document.createElement('div');
                dropoffCell.classList.add('report-cell');
                dropoffCell.textContent = booking.dropoff_location;

                const dateCell = document.createElement('div');
                dateCell.classList.add('report-cell');
                dateCell.textContent = new Date(booking.created_at).toLocaleString();

                row.appendChild(bookerCell);
                row.appendChild(pickupCell);
                row.appendChild(dropoffCell);
                row.appendChild(dateCell);

                recentBookingsTable.appendChild(row);
            });
        } else {
            console.error('Error fetching recent bookings data');
        }
    })
    .catch(error => {
        console.error('Error fetching recent bookings data:', error);
    });
