$(document).ready(function () {
    $('.btn-delete').on('click', function (event) {
        event.preventDefault();

        var form = $(this).closest('#form-delete');

        Swal.fire({
            title: 'Xác nhận',
            text: 'Bạn có chắc chắn muốn xóa dự án này không?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xóa',
            cancelButtonText: 'Hủy',
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }
        });
    });
});
