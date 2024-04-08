import  Chart from 'chart.js/auto';
import 'chartjs-adapter-date-fns';
import 'chartjs-adapter-luxon';
window.Chart = Chart;

function updateTotalData() {
        fetch('/total-locations')
            .then(response => response.json())
            .then(data => {
                document.getElementById('totalLocations').textContent = data.totalLocations;
            })
            .catch(error => {
                console.error('Error fetching total locations:', error);
            });

        fetch('/total-users')
            .then(response => response.json())
            .then(data => {
                document.getElementById('totalUsers').textContent = data.totalUsers;
            })
            .catch(error => {
                console.error('Error fetching total users:', error);
            });
        fetch('/total-bookings')
            .then(response => response.json())
            .then(data => {
                document.getElementById('totalBookings').textContent = data.totalBookings;
            })
            .catch(error => {
                console.error('Error fetching total bookings:', error);
            });
        fetch('/users-and-bookings-by-month')
            .then(response => response.json())
            .then(data => {
                console.log('Data fetched from server:', data);
            })
            .catch(error => {
                console.error('Error fetching data:', error);
            });
    }
document.addEventListener('DOMContentLoaded', function() {
    updateTotalData();
});
