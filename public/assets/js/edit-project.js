$(document).ready(function () {
    $('.btn-delete').on('click', function (event) {
        event.preventDefault();

        var form = $(this).closest('#form-delete');

        Swal.fire({
            title: "Bạn có chắc xóa dự án này không?",
            icon: "warning",
            showCancelButton: true,
            cancelButtonText: "HỦY",
            cancelButtonColor: "#d33",
            confirmButtonText: "XÓA",
            confirmButtonColor: "#3085D6",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Đã xóa!",
                    text: "Bạn đã xóa thành công!",
                    icon: "success",
                    showConfirmButton: false,
                });

                setTimeout(function () {
                    form.submit();
                }, 1500);
            }
        });
    });
});
