import { isInputEmptyValue, isSelectUnselectValue, addErrorToInput } from "./module/validate_data.js"

// Khai báo form data
let form_data = new FormData()

// Validate dữ liệu phía front-end trước khi submit
let isError = false

// Biến kiểm tra xem người dùng có thay đổi ảnh hay không
let imageChanged = false;

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
            // Cập nhật lại trạng thái người dùng có chọn thay đổi file
            imageChanged = true
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
    // Lấy ra employee ID cần chỉnh sửa thông tin
    let url = window.location.href
    let elementURL = url.split('/')
    let employee_id = elementURL[elementURL.length - 1]
    $.ajax({
        url: "/admin/employees/update/" + employee_id,
        processData: false,
        contentType: false,
        method: "post",
        dataType: "json",
        data: form_data,
        success: function (response) {
            Swal.fire({
                icon: 'success',
                title: 'CẬP NHẬT THÔNG TIN THÀNH CÔNG',
                timer: 1000,
                showConfirmButton: false
            });
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
    //employee id
    let employee_id = $("#form-employee input[name='employeeID']")
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
    //=======get all input type is check-box==========
    let status = $("input[type='radio'][name='status']:checked")

    // validate input
    isError = isInputEmptyValue([employee_id, full_name, phone_number, email, identify_number, dob, major, basic_salary])
    //validate select
    isError = isSelectUnselectValue([province_id, district_id, ward_id])
    //validate img
    if (!form_data.get("image_file") && imageChanged == true) {
        isError = true
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "VUI LÒNG CẬP NHẬT ẢNH!",
        });
    }

    if (isError == false) {
        form_data.append('employee_id', employee_id.val());
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
        form_data.append('status', status.val());
        form_data.append('_token', $("input[name='_token']").val());
        form_data.append('basic_salary', basic_salary.val());
        //ajax request
        sendRequestToSaveEmployee()
    }
})
