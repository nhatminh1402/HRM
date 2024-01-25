import { isInputEmptyValue, isSelectUnselectValue, addErrorToInput } from "./module/validate_data.js"
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

//remove error when type
$("#form-employee input").on("keypress", function () {
    $(this).removeClass('is-invalid')
    $(this).nextAll('.err-area').first().html("")
});

// Validate image upload
$(function () {
    $("#file-field").on("change", function () {
        const fileUpload = this.files[0]

        if (fileUpload) {
            const img = document.createElement("img")
            img.style.width = "100%";
            img.style.height = "auto";
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
            form_data.append("image_file", fileUpload)
            $("#upload-img-area").html(img)
            const reader = new FileReader();
            reader.onload = (e) => {
                img.src = e.target.result;
            };
            reader.readAsDataURL(fileUpload);
        }
    })
})


function sendRequestToSaveEmployee() {
    $.ajax({
        url: "/admin/employees/store",
        processData: false,
        contentType: false,
        method: "post",
        dataType: "json",
        data: form_data,
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'Thêm mới thành công',
                showConfirmButton: false
            });

            setTimeout(function () {
                location.replace("/admin/employees/lists");
            }, 3000);
        }, error: function (xhr, status, error) {
            if (xhr.status === 422) {
                let errorData = xhr.responseJSON.errors;
                addErrorToInput(errorData);
            } else {
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

// submit button
$("#btn-submit").on("click", () => {
    //delete all old err message
    $("#form-employee .is-invalid").removeClass("is-invalid")
    $("div.err-area").html('')
    //=======get all input type is text==========
    //employee code
    let employee_code = $("#form-employee input[name='employee_code']")
    //full name
    let full_name = $("#form-employee input[name='full_name']")
    //phone number
    let phone_number = $("#form-employee input[name='phone_number']")
    //email
    let email = $("#form-employee input[name='email']")
    // cccd
    let identify_number = $("#form-employee input[name='identify_number']")
    // dob
    let dob = $("#form-employee input[name='dob']")
    // major
    let major = $("#form-employee input[name='major']")
    //password
    let password = $("#form-employee input[name='password']")
    //password
    let rePassword = $("#form-employee input[name='re-password']")
    let basic_salary = $("#form-employee input[name='basic_salary']")
    //=======get all input type is select==========
    // gender input
    let gender = $("select[name='gender'] option:selected")
    //degree
    let degree = $("select[name='degree'] option:selected")
    //department id
    let department_id = $("select[name='department_id'] option:selected")
    //position id
    let position_id = $("select[name='position_id'] option:selected")
    //province_id
    let province_id = $("select#province-select option:selected")
    //district_id
    let district_id = $("select#district-select option:selected")
    //ward_id
    let ward_id = $("select#ward-select option:selected")

    // validate input
    isError = isInputEmptyValue([employee_code, full_name, phone_number, email, identify_number, dob, major, password, rePassword, basic_salary])
    //validate select
    isError = isSelectUnselectValue([province_id, district_id, ward_id])
    //validate img
    if (!form_data.get("image_file")) {
        isError = true
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "VUI LÒNG CẬP NHẬT ẢNH!",
        });
    }

    if (isError == false) {
        form_data.append('code_employee', employee_code.val());
        form_data.append('full_name', full_name.val());
        form_data.append('phone_number', phone_number.val());
        form_data.append('email', email.val());
        form_data.append('identify_number', identify_number.val());
        form_data.append('dob', dob.val());
        form_data.append('major', major.val());
        form_data.append('gender', gender.val());
        form_data.append('degree', degree.val());
        form_data.append('department_id', department_id.val());
        form_data.append('position_id', position_id.val());
        form_data.append('province_id', province_id.val());
        form_data.append('district_id', district_id.val());
        form_data.append('ward_id', ward_id.val());
        form_data.append('password', password.val());
        form_data.append('re_password', rePassword.val());
        form_data.append('_token', $("input[name='_token']").val());
        form_data.append('basic_salary', basic_salary.val());
        //ajax request
        sendRequestToSaveEmployee()
    }
})
