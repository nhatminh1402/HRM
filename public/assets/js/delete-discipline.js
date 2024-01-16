$(document).ready(function () {
    $('.btn-delete-discipline').on('click', function (event) {
        event.preventDefault();

        var form = $(this).closest('.form-delete-discipline');

        Swal.fire({
            title: 'Xác nhận',
            text: 'Bạn có chắc chắn muốn xóa loại kỷ luật này không?',
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
