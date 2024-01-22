$(document).ready(function () {
    $('.js-example-basic-multiple-limit').select2({
        maximumSelectionLength: 10
    });

    
    $(".btn-delete").on("click", function (event) {
        event.preventDefault();
        var form = $(this).closest("#formDeleteDeparment");
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!",
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
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

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#add-department-btn").on("click", function () {
        let name = $("#name").val();
        let description = editor.getData();

        $.ajax({
            url: "/admin/department/add_department",
            type: "POST",
            data: {
                name: name,
                description: description,
            },
            success: function (data) {
                $("#create-deparment").modal("hide");
                Swal.fire({
                    icon: "success",
                    title: "Thêm mới dự án thành công",
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
                    $("#error_name").html("Xin vui lòng nhập phòng ban");
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
