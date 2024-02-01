$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#add-posiiton-btn').on('click', function () {
        var codePosition = $('#code_position').val().trim();
        var name = $('#name').val().trim();
        var salary_day = $('#salary_day').val().trim();
        var description = $('#description').val().trim();

        $('input[name=name]').on('keydown', function() {
            $('#error_name').html('');
        });

        $('input[name=salary_day]').on('keyup', function() {
            var value = $(this).val();

            if (!/^\d+(\.\d+)?$/.test(value) || parseFloat(value) < 0) {
                $('#error_salary').html('Xin vui lòng nhập số tiền lương hợp lệ!');
            } else {
                $('#error_salary').html('');
            }
        });

        $.ajax({
            url: CREATE_POSITION_URL,
            type: 'POST',
            data: {
                code_position: codePosition,
                name: name,
                salary_day: salary_day,
                description: description
            },
            success: function (data) {
                $('#create-position').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Thêm mới chức vụ thành công',
                    showConfirmButton: false
                });
                setTimeout(function () {
                    location.replace("/admin/position");
                }, 1000);
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                $('#error_name').html(errors && errors.name ? errors.name[0] : '');
                $('#error_salary').html(errors && errors.salary_day ? errors.salary_day[0] : '');
            }
        });
    });
});
