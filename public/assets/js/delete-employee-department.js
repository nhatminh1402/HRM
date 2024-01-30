$(document).ready(function () {
    

    function hideSelected(value) {
        if (value && !value.selected) {
            return $("<span>" + value.text + "</span>");
        }
    }

    $(".js-example-basic-multiple-limit").select2({
        maximumSelectionLength: 10,
        allowClear: true,
        placeholder: {
            id: "",
            placeholder: "Leave blank to ...",
        },
        templateResult: hideSelected,
    });


    $(".btn-delete").on("click", function (event) {
        event.preventDefault();
        var deleteUrl = $(this).attr("href");
        Swal.fire({
            title: "Bạn có chắc xóa thành viên này khỏi phòng ban?",
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
                    window.location.href = deleteUrl;
                }, 1500);
            }
        });
    });
});
