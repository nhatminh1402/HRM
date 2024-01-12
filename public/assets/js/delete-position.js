$(document).ready(function() {
    $('#btn-delete').on('click', function(event) {
        event.preventDefault();

        Swal.fire({
            title: 'Xác nhận',
            text: 'Bạn có chắc chắn muốn xóa chức vụ này không?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy',
        }).then((result) => {
            if (result.isConfirmed) {
                $('#form-delete').submit();
            }
        });
    });
});
