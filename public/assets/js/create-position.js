$(document).ready(function () {
    let editor;
    ClassicEditor
        .create(document.querySelector('#description'))
        .then(newEditor => {
            editor = newEditor;
        })
        .catch(error => {
            console.error(error);
        });

    
        $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#add-posiiton-btn').on('click', function () {
        var codePosition = $('#code_position').val();
        var name = $('#name').val();
        var salaryDay = $('#salary_day').val();
        var description = editor.getData();

        $.ajax({
            url: '/admin/position/create',
            type: 'POST',
            data: {
                code_position: codePosition,
                name: name,
                salary_day: salaryDay,
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
                if (name) {
                    $('#error_name').html('');
                } else {
                    $('#error_name').html('Xin vui lòng nhập tên chức vụ.');
                }

                if (salaryDay) {
                    $('#error_salary').html('');
                } else {
                    $('#error_salary').html('Xin vui lòng nhập số tiền lương.');
                }
            }
        });
    });

    $('input[name=name]').on('keydown ', function() {
        $('#error_name').html('');
    });

    $('input[name=salary_day]').on('keydown ', function() {
        $('#error_salary').html('');
    });
});
