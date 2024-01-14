// Khai báo form data
let form_data = new FormData()

// Validate dữ liệu phía front-end trước khi submit
let isError = false

// Action hiển thị cửa sổ chọn file
$("#upload-img-area").on("click", function () {
    $("#file-field").click()
})

$(document).ready(function () {
    $('.select-extension').select2();
});

// Validate image upload
$(function () {
    $("#file-field").on("change", function () {
        const fileUpload = this.files[0]

        if (fileUpload) {
            const img = document.createElement("img")
            img.file = fileUpload;

            var allowedImageTypes = [
                "image/jpeg",
                "image/pjpeg",
                "image/png",
                "image/gif",
                "image/bmp",
                "image/x-windows-bmp",
                "image/tiff",
                "image/webp",
                "image/svg+xml"
            ];

            if (allowedImageTypes.indexOf(fileUpload.type) == -1) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "ĐỊNH DẠNG FILE KHÔNG HỢP LỆ!",
                });
                return
            }

            // Thêm ảnh vào formdata và render
            form_data.append("avatar", fileUpload)
            $("#upload-img-area").html(img)
            const reader = new FileReader();
            reader.onload = (e) => {
                img.src = e.target.result;
            };
            reader.readAsDataURL(fileUpload);
        }
    })
})

