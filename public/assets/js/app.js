$(document).ready(function () {
    // Function to handle the delete confirmation
    function confirmDelete(button) {
        var form = $(button).closest('form');
        var route = form.attr('action');

        // Create and show the modal
        var modalHtml = `
            <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteModalLabel">Delete Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            Are you sure you want to delete this item?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        `;
        $('body').append(modalHtml);
        $('#deleteModal').modal('show');

        // Handle the delete confirmation
        $('#confirmDeleteBtn').on('click', function () {
            $.post(route, {
                _method: 'DELETE',
                _token: $('meta[name="csrf-token"]').attr('content')
            }).done(function (result) {
                // Show success message
                new Noty({
                    type: "success",
                    text: "Item deleted successfully!"
                }).show();

                // Hide the row
                $(button).closest('tr').remove();
                $('#deleteModal').modal('hide');
            }).fail(function (result) {
                // Show error message
                new Noty({
                    type: "warning",
                    text: "An error occurred while deleting the item."
                }).show();
                $('#deleteModal').modal('hide');
            });
        });

        // Clean up the modal after hiding
        $('#deleteModal').on('hidden.bs.modal', function () {
            $(this).remove();
        });
    }

    // Attach delete confirmation handler to delete buttons
    $('body').on('click', '.btn-delete', function (e) {
        e.preventDefault();
        confirmDelete(this);
    });
});

// Function to handle status cell coloring
document.addEventListener('DOMContentLoaded', function () {
    const statusCells = document.querySelectorAll('.status');
    statusCells.forEach(cell => {
      const status = cell.textContent.trim().toLowerCase();
      if (status === 'valid') {
        cell.classList.add('valid');
      } else if (status === 'skip') {
        cell.classList.add('skip');
      } else if (status === 'cancelled') {
        cell.classList.add('cancelled');
      }
    });
  });
