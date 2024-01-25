$(document).ready(function () {
    
    $("#btn-submit").on("click", function (event) {
        event.preventDefault();
        Swal.fire({
            title: "Bạn có chắc tạo và gửi email đến admin",
            text: "Bạn sẽ không thể hoàn tác hành động này !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Đồng ý tạo và gửi emai!",
        }).then((result) => {
            if (result.isConfirmed) {
               $('#submit-leave').submit()
            }
        });
    });


    $("#accept-leave").on("click", function (event) {
        event.preventDefault();
        Swal.fire({
            title: "Bạn có chắc duyệt đơn này?",
            text: "Bạn không thể hoàn tác hành động này !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Duyệt!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = event.target.href;
            }
        });
    });

    $("#Non-accept-leave").on("click", function (event) {
        event.preventDefault();
        Swal.fire({
            title: "Bạn có chắc không duyệt đơn này?",
            text: "Bạn không thể hoàn tác hành động này!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Xác nhân!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = event.target.href;
            }
        });
    });

    let editor;
    ClassicEditor.create(document.querySelector("#description"))
        .then((newEditor) => {
            editor = newEditor;
        })
        .catch((error) => {
            console.error(error);
        });
});