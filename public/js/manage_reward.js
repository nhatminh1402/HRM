import { isInputEmptyValue, addErrorToInput } from "./module/validate_data.js"


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
    let description = $('#modal-add-reward #description').val()
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
                description: description,
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

// Modal edit pop up
$(".btn-edit").on("click", function () {
    let id = $(this).data("id")
    $("#modalUpdateReward input[name='id']").val(id)
    $.ajax({
        url: "/admin/reward/find/" + id,
        method: "get",
        dataType: "json",
        success: function (response) {
            $('#modalUpdateReward input[name="name"]').val(response.name)
            $('#modalUpdateReward textarea[name="description"]').val(response.description)
        }, error: function (xhr, status, error) {

        }
    })
})

// Modal edit pop up
$(".btn-edit").on("click", function () {
    let id = $(this).data("id")
    $("#modalUpdateReward input[name='id']").val(id)
    $.ajax({
        url: "/admin/reward/find/" + id,
        method: "get",
        dataType: "json",
        success: function (response) {
            $('#modalUpdateReward input[name="name"]').val(response.name)
            $('#modalUpdateReward textarea[name="description"]').val(response.description)
        }, error: function (xhr, status, error) {

        }
    })
})

// submit update reward
$(".btn-submit-update").on("click", function () {
    let id = $("#modalUpdateReward input[name='id']").val()
    let name = $('#modalUpdateReward input[name="name"]')
    let description = $('#modalUpdateReward textarea[name="description"]').val()
    let _token = $("input[name='_token']").val()
    let isErr = false

    isErr = isInputEmptyValue([name])

    if (isErr == false) {
        $.ajax({
            url: "/admin/reward/update/" + id,
            method: "post",
            dataType: "json",
            data: {
                name: name.val(),
                description: description,
                _token: _token
            },
            success: function (response) {
                $("#modalUpdateReward").toggle()
                Swal.fire({
                    icon: 'success',
                    title: 'CẬP NHẬT THÀNH CÔNG',
                    showConfirmButton: false
                });

                setTimeout(function () {
                    window.location.reload();
                }, 3000);
            }, error: function (xhr, status, error) {
                if (xhr.status == 422) {
                    let listErr = xhr.responseJSON.errors;

                    for (let errName in listErr) {
                        let inputTag = $("#modalUpdateReward [name='" + errName + "']")
                        $(inputTag).addClass("is-invalid")
                        $(inputTag).nextAll('.err-area').first().html("<div style='color: red; font-size: 14px; margin-top: 10px'>" + listErr[errName][0] + "</div>")
                    }

                } else {
                    window.location.reload();
                }
            }
        })
    }
})

