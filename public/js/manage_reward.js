import { isInputEmptyValue, addErrorToInput } from "./module/validate_data.js"


let editor;
ClassicEditor
    .create(document.querySelector('#description'))
    .then(newEditor => {
        editor = newEditor;
    })
    .catch(error => {
        console.error(error);
    });

//remove error when type
$(".modal-body input").on("keypress", function () {
    $(this).removeClass('is-invalid')
    $(this).nextAll('.err-area').first().html("")
});

// delete
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

// ajax request save reward
$("#btn-submit").on("click", function () {
    let name = $('input[name="name"]')
    let token = $('input[name="_token"]')

    let isError = false

    isError = isInputEmptyValue([name])

    if (isError == false) {
        $.ajax({
            url: "/admin/reward/store",
            method: "post",
            dataType: "json",
            data: {
                name: name.val(),
                description: editor.getData(),
                _token: token.val()
            },
            success: function (response) {
                Swal.fire({
                    icon: 'success',
                    title: 'Thêm mới thành công',
                    showConfirmButton: false
                });

                setTimeout(function () {
                    location.replace("/admin/reward");
                }, 2000);
            }, error: function (xhr, status, error) {
                if (xhr.status === 422) {
                    let errorData = xhr.responseJSON.errors;
                    addErrorToInput(errorData);
                }
                else {
                    Swal.fire({
                        icon: 'error',
                        title: 'LỖI HỆ THỐNG! VUI LÒNG THỬ LẠI SAU',
                        showConfirmButton: false
                    });

                    setTimeout(function () {
                        location.reload();
                    }, 3000);
                }
            }
        })
    }
})