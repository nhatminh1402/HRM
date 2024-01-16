$(".btn-delete").on("click", function () {
    let form = $(this).parent()
    Swal.fire({
        text: "BẠN CÓ CHẮC CHẮN MUỐN XÓA?",
        icon: "error",
        confirmButtonText: "Xóa ngay!",
        showCancelButton: true,
        cancelButtonColor: "#d33",
    }).then((result) => {
        if (result.isConfirmed) {
            $(form).submit()
        }
    });
})
