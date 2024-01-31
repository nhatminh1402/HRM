$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('.btn-update').click(function () {
        let projectId = $(this).data('id');
        getProjectData(projectId);
    });


    function getProjectData(projectId) {
        if (typeof projectId === 'undefined') {
            console.error('Invalid projectId');
            return;
        }

        $.ajax({
            url: GET_PROJECT_URL,
            type: 'GET',
            data: {
                id: projectId,
            },
            success: function (response) {
                let projectData = response.data;
                updateProjectForm(projectData);
                EditProject.renderOptionEmployees(response.data.selectedEmployees);
            },
            error: function (xhr) {
            }
        });
    }

    function updateProjectForm(projectData) {
        $('#project_id').val(projectData.id);
        $('#code_project_update').val(projectData.code_project);
        $('#name_update').val(projectData.name);
        $('#description_update').val(projectData.description);

    }

    $('#update-project-btn').on('click', function () {
        let projectId = $('#project_id').val();
        updateProject(projectId);
    });

    function updateProject(projectId) {
        let codeProject = $('#code_project_update').val();
        let name = $('#name_update').val();
        let selectedEmployees = $('#select-employees').val();
        console.log(selectedEmployees);
        let description = $('#description_update').val();

        let projectData = {
            _method: 'PUT',
            id: projectId,
            code_project: codeProject,
            selected_employees: selectedEmployees,
            name: name,
            description: description
        };

        $.ajax({
            url: UPDATE_PROJECT_URL,
            type: 'POST',
            data: projectData,
            success: function (data) {
                handleUpdateSuccess();
            },
            error: function (xhr) {
                handleUpdateError(xhr);
            }
        });
    }

    function handleUpdateSuccess() {
        $('#update-project').modal('hide');
        Swal.fire({
            icon: 'success',
            title: 'Cập nhật dự án thành công',
            showConfirmButton: false
        });
        setTimeout(function () {
            location.replace("/admin/project");
        }, 1000);
    }

    function handleUpdateError(xhr) {
        let errors = xhr.responseJSON.errors;
        console.log(errors);
        $('#error_name_update').html(errors && errors.name ? errors.name[0] : '');
        $('#error_employee_update').html(errors && errors.selected_employees ? errors.selected_employees[0] : '');
    }

    $('input[name=name_update]').on('keydown', function () {
        $('#error_name_update').html('');
    });

    $('#select-employees').on('change', function () {
        if ($(this).val() && $(this).val().length > 0) {
            $('#error_employee_update').html('');
        }
    });
});

const EditProject = (() => {

    const renderOptionEmployees = (selectedIds) => {
        $.ajax({
            url: GET_ALL_EMPLOYEES,
            type: 'GET',
            success: function (response) {
                let selectEmployees = $('#select-employees');
                selectEmployees.empty();
                if (response.employees !== undefined) {
                    response.employees.forEach(function (employee) {
                        let selected = [...selectedIds].includes(employee.id) ? 'selected' : '';
                        let option = `<option value="${employee.id}" ${selected}>${employee.full_name}</option>`
                        selectEmployees.append(option);
                    });
                }

                selectEmployees.select2();
            },
            error: function (xhr) {
            }
        });
    }

    return {
        renderOptionEmployees
    }
})();
