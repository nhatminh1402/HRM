$(document).ready(function () {

    function hideSelected(value) {
        if (value && !value.selected) {
            return $('<span>' + value.text + '</span>');
        }
    }

    function hideSelected(value) {
        if (value && !value.selected) {
            return $('<span>' + value.text + '</span>');
        }
    }

    $('.select-employees').select2({
        maximumSelectionLength: 10,
        templateResult: hideSelected,
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#add-project-btn').on('click', function () {
        let codeProject = $('#code_project').val();
        let name = $('#name').val();
        let selected_employees = $('#selected_employees').val();
        let description = $('#description').val();

        $('input[name=name]').on('keydown ', function () {
            $('#error_name').html('');
        });

        $('#selected_employees').on('change', function () {
            if ($(this).val() && $(this).val().length > 0) {
                $('#error_select').html('');
            }
        });

        $.ajax({
            url: CREATE_PROJECT_URL,
            type: 'POST',
            data: {
                code_project: codeProject,
                name: name,
                selected_employees: selected_employees,
                description: description
            },
            success: function (data) {
                $('#create-project').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Thêm mới dự án thành công',
                    showConfirmButton: false
                });
                setTimeout(function () {
                    location.replace("/admin/project");
                }, 1000);
            },
            error: function (xhr) {
                if (name) {
                    $('#error_name').html('');
                } else {
                    $('#error_name').html('Xin vui lòng nhập tên dự án');
                }

                if (selected_employees.length > 0) {
                    $('#error_select').html('');
                } else {
                    $('#error_select').html('Xin vui lòng chọn nhân viên');
                }
            }
        });
    });
});
