<script src="{{ asset ('assets') }}/js/core/jquery-3.7.1.min.js"></script>
<script src="{{ asset ('assets') }}/js/core/popper.min.js"></script>
<script src="{{ asset ('assets') }}/js/core/bootstrap.min.js"></script>

<!-- jQuery Scrollbar -->
<script src="{{ asset ('assets') }}/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

<!-- Chart JS -->
<script src="{{ asset ('assets') }}/js/plugin/chart.js/chart.min.js"></script>

<!-- jQuery Sparkline -->
<script src="{{ asset ('assets') }}/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

<!-- Chart Circle -->
<script src="{{ asset ('assets') }}/js/plugin/chart-circle/circles.min.js"></script>

<!-- Datatables -->
<script src="{{ asset ('assets') }}/js/plugin/datatables/datatables.min.js"></script>

<!-- Bootstrap Notify -->
<script src="{{ asset ('assets') }}/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

<!-- jQuery Vector Maps -->
<script src="{{ asset ('assets') }}/js/plugin/jsvectormap/jsvectormap.min.js"></script>
<script src="{{ asset ('assets') }}/js/plugin/jsvectormap/world.js"></script>

<!-- Sweet Alert -->
<script src="{{ asset ('assets') }}/js/plugin/sweetalert/sweetalert.min.js"></script>

<!-- Kaiadmin JS -->
<script src="{{ asset ('assets') }}/js/kaiadmin.min.js"></script>

<script>
  $("#lineChart").sparkline([102, 109, 120, 99, 110, 105, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#177dff",
    fillColor: "rgba(23, 125, 255, 0.14)",
  });

  $("#lineChart2").sparkline([99, 125, 122, 105, 110, 124, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#f3545d",
    fillColor: "rgba(243, 84, 93, .14)",
  });

  $("#lineChart3").sparkline([105, 103, 123, 100, 95, 105, 115], {
    type: "line",
    height: "70",
    width: "100%",
    lineWidth: "2",
    lineColor: "#ffa534",
    fillColor: "rgba(255, 165, 52, .14)",
  });
</script>
<script src="{{ asset ('assets/js/bootstrap.bundle.min.js') }}" crossorigin="anonymous"></script>
<script src="{{ asset ('assets/js/scripts.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

<script>
  $(document).ready(function() {
      $('#exampleTable').DataTable();
  });
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).on('click', '.edit-status-btn', function () {
    let orderId = $(this).data('id');
    let currentStatus = $(this).data('status');

    Swal.fire({
        title: 'Edit Order Status',
        input: 'select',
        inputOptions: {
            pending: 'Pending',
            processing: 'Processing',
            delivered: 'Delivered',
            cancelled: 'Cancelled',
        },
        inputValue: currentStatus,
        showCancelButton: true,
        confirmButtonText: 'Update',
        cancelButtonText: 'Cancel',
        inputValidator: (value) => {
            if (!value) {
                return 'You need to select a status!';
            }
        }
    }).then((result) => {
        if (result.isConfirmed) {
            // AJAX call to update the status
            $.ajax({
                url: `/admin/update-order-status/${orderId}`,
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    status: result.value
                },
                success: function (response) {
                    if (response.success) {
                        Swal.fire('Success', response.message, 'success').then(() => {
                            location.reload(); // Reload page to reflect changes
                        });
                    } else {
                        Swal.fire('Error', response.message, 'error');
                    }
                },
                error: function () {
                    Swal.fire('Error', 'An error occurred while updating the status.', 'error');
                }
            });
        }
    });
});

</script>



