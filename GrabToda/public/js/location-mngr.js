fetch('{{ route("admin.locations.index") }}')
    .then(response => response.json())
    .then(data => {
        const locations = data.locations;
        const tableBody = document.querySelector('#locationsTable tbody');
        tableBody.innerHTML = '';

        locations.forEach(location => {
            const row = `
                <tr>
                    <td>${location.id}</td>
                    <td>${location.name}</td>
                    <td>
                        <a href="{{ route("admin.locations.edit") }}/${location.id}" class="btn btn-sm btn-primary">Edit</a>
                        <form id="deleteForm_${location.id}" style="display: inline-block;">
                            <button type="button" onclick="deleteLocation(${location.id})" class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            `;
            tableBody.innerHTML += row;
        });
    });

// Show add location modal
var modal = document.getElementById("add-location-modal");
var btn = document.getElementById("add-location-btn");
var span = document.getElementsByClassName("close")[0];

btn.onclick = function () {
    modal.style.display = "block";
}

span.onclick = function () {
    modal.style.display = "none";
}

window.onclick = function (event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

$('#add-location-form').submit(function (e) {
    e.preventDefault();
    var locationName = $('#location-name').val();
    $.post('{{ route("admin.locations.store") }}', { name: locationName })
        .done(function (response) {
            modal.style.display = "none";
        })
        .fail(function (error) {
            console.error("Error adding location:", error);
        });
});

function deleteLocation(id) {
    if (confirm("Are you sure you want to delete this location?")) {
        $.ajax({
            url: '{{ route("admin.locations.destroy") }}/' + id,
            type: 'DELETE',
            success: function (result) {
            },
            error: function (error) {
                console.error("Error deleting location:", error);
            }
        });
    }
}
