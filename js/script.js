document.addEventListener("DOMContentLoaded", function() {
    const toggleButton = document.getElementById('toggle-events')??false;
    const eventItems = document.querySelectorAll('.event-item');
    let showMore = true;
    let eventIdToDelete = null;

    if (toggleButton) {
        toggleButton.addEventListener('click', function() {
            eventItems.forEach((item, index) => {
                if (index >= 4) {
                    item.style.display = showMore ? 'block' : 'none';
                }
            });
            toggleButton.textContent = showMore ? 'Show less' : 'Show more';
            showMore = !showMore;
        });
    }

    document.querySelectorAll('.delete-icon').forEach(function(deleteButton) {
        deleteButton.addEventListener('click', function(e) {
            e.preventDefault();
            const eventId = deleteButton.closest('.event-item').dataset.id;
            eventIdToDelete = eventId;
            $('#deleteModal').modal('show');
        });
    });

    document.getElementById('confirmDelete').addEventListener('click', function() {
        if (eventIdToDelete) {
            document.getElementById('confirmDelete').closest('a').href = "/event_delete?id="+eventIdToDelete
        }
    });
});
