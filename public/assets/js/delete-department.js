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
        var form = $(this).closest("#formDeleteDeparment");
        Swal.fire({
            title: "Bạn có chắc xóa phòng ban   này không?",
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

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#add-department-btn").on("click", function () {
        let name = $("#name").val();
        let description = $("#description").val();
        let selected_employees = $('#selected_employees').val();


        $.ajax({
            url: "/admin/department/add_department",
            type: "POST",
            data: {
                name: name,
                description: description,
                id_employee: selected_employees,
            },
            success: function (data) {
                $("#create-deparment").modal("hide");
                Swal.fire({
                    icon: "success",
                    title: "Thêm mới phòng ban thành công",
                    showConfirmButton: false,
                });
                setTimeout(function () {
                    location.replace("/admin/department");
                }, 1000);
            },
            error: function (xhr) {
                if (name) {
                    $("#error_name").html("");
                } else {
                    $("#error_name").html("Xin vui lòng nhập tên phòng ban");
                }

                if (description) {
                    $("#error_description").html("");
                } else {
                    $("#error_description").html("Xin vui lòng nhập mô tả");
                }
            },
        });
    });

    $("input[name=name]").on("keydown ", function () {
        $("#error_name").html("");
    });
});
