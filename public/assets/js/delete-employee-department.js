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

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#add-employee-btn").on("click", function () {
        let selected_employees = $("#selected_employees").val();
        let id_department = $("#id-deparment").val();
    
        if (selected_employees.length==0) {
            $('#update_error_select').html('Vui lòng chọn nhân viên !')
            return;
        }
        
        $.ajax({
            url: "/admin/department/employee/add/"+id_department,
            method: "POST",
            data: {
                id_employee: selected_employees,
            },
            success: function (data) {
                $("#add-employee").modal("hide");
                Swal.fire({
                    icon: "success",
                    title: "Thêm mới phòng ban thành công",
                    showConfirmButton: false,
                });
                setTimeout(function () {
                    location.reload();
                }, 1000);
            },
        });
    });

    $('#selected_employees').on('change', function () {
            $('#update_error_select').html('');
    });
});
