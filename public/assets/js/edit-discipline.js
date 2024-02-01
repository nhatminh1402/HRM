$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn-update').click(function () {
        let disciplineId = $(this).data('id');
        getPositionData(disciplineId);
    });

    function getPositionData(disciplineId) {
        if (typeof disciplineId === 'undefined') {
            console.error('Invalid positionId');
            return;
        }

        $.ajax({
            url: GET_DISCIPLINE_URL,
            type: 'GET',
            data: {
                idDiscipline: disciplineId,
            },
            success: function (response) {
                let disciplineData = response.discipline;
                let pageNumber = response.pageNumber;
                updatePositionForm(disciplineData, pageNumber);
            },
            error: function (xhr) {
            }
        });
    }

    function updatePositionForm(disciplineData, pageNumber) {
        $('#discipline_id').val(disciplineData.id);
        $('#code_discipline_update').val(disciplineData.code_discipline);
        $('#name_update').val(disciplineData.name);
        $('#description_update').val(disciplineData.description);

        $('#page_number_input').val(pageNumber);
    }

    $('#update-discipline-btn').on('click', function () {
        let positionId = $('#discipline_id').val();
        updatePosition(positionId);
    });

    function updatePosition(disciplineId) {
        let codeDiscipline = $('#code_discipline_update').val();
        let name = $('#name_update').val();
        let description = $('#description_update').val();

        let disciplineData = {
            _method: 'PUT',
            idDiscipline: disciplineId,
            code_discipline: codeDiscipline,
            name: name,
            description: description
        };

        $.ajax({
            url: UPDATE_DISCIPLINE_URL,
            type: 'POST',
            data: disciplineData,
            success: function (data) {
                handleUpdateSuccess();
            },
            error: function (xhr) {
                handleUpdateError(xhr);
            }
        });
    }

    function handleUpdateSuccess() {
        $('#update-discipline').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Cập nhật kỷ luật thành công',
            showConfirmButton: false
        });
        setTimeout(function () {
            location.replace("/admin/discipline");
        }, 1000);
    }

    function handleUpdateError(xhr) {
        let errors = xhr.responseJSON.errors;
        $('#error_name_update').html(errors && errors.name ? errors.name[0] : '');
    }

    $('input[name=name_update]').on('keydown', function () {
        $('#error_name_update').html('');
    });
});
