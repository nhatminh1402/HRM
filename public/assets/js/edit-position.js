$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn-update').click(function () {
        let positionId = $(this).data('id');
        getPositionData(positionId);
    });

    function getPositionData(positionId) {
        if (typeof positionId === 'undefined') {
            console.error('Invalid positionId');
            return;
        }

        $.ajax({
            url: GET_POSITION_URL,
            type: 'GET',
            data: {
                id: positionId,
            },
            success: function (response) {
                let positionData = response.position;
                let pageNumber = response.pageNumber;
                updatePositionForm(positionData, pageNumber);
            },
            error: function (xhr) {
            }
        });
    }

    function updatePositionForm(positionData, pageNumber) {
        $('#position_id').val(positionData.id);
        $('#code_position_update').val(positionData.code_position);
        $('#name_update').val(positionData.name);
        $('#salary_day_update').val(positionData.salary_day);
        $('#description_update').val(positionData.description);

        $('#page_number_input').val(pageNumber);
    }

    $('#update-posiiton-btn').on('click', function () {
        let positionId = $('#position_id').val();
        updatePosition(positionId);
    });

    function updatePosition(positionId) {
        let codePosition = $('#code_position_update').val();
        let name = $('#name_update').val();
        let salaryDay = $('#salary_day_update').val();
        let description = $('#description_update').val();

        if (isNaN(salaryDay) || parseFloat(salaryDay) < 0) {
            $('#error_salary_update').html('Xin vui lòng nhập số tiền lương hợp lệ.');
            return;
        }

        let positionData = {
            _method: 'PUT',
            idPosition: positionId,
            code_position: codePosition,
            name: name,
            salary_day: salaryDay,
            description: description
        };

        $.ajax({
            url: UPDATE_POSITION_URL,
            type: 'POST',
            data: positionData,
            success: function (data) {
                handleUpdateSuccess();
            },
            error: function (xhr) {
                handleUpdateError(xhr);
            }
        });
    }

    function handleUpdateSuccess() {
        $('#update-position').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Cập nhật chức vụ thành công',
            showConfirmButton: false
        });
        setTimeout(function () {
            location.replace("/admin/position");
        }, 1000);
    }

    function handleUpdateError(xhr) {
        let errors = xhr.responseJSON.errors;
        $('#error_name_update').html(errors && errors.name ? errors.name[0] : '');
        $('#error_salary_update').html(errors && errors.salary_day ? errors.salary_day[0] : '');
    }

    $('input[name=name_update]').on('keydown', function () {
        $('#error_name_update').html('');
    });

    $('input[name=salary_day_update]').on('keyup', function () {
        var value = $(this).val();

        if (!/^\d+(\.\d+)?$/.test(value) || parseFloat(value) < 0) {
            $('#error_salary_update').html('Xin vui lòng nhập số tiền lương hợp lệ!');
        } else {
            $('#error_salary_update').html('');
        }
    });
});
