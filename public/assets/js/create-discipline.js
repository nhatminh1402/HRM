$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $('#add-discipline-btn').on('click', function () {
        var codediscipline = $('#code_discipline').val();
        var name = $('#name').val();
        var description = editor.getData();

        $.ajax({
            url: '/admin/discipline/create',
            type: 'POST',
            data: {
                code_discipline: codediscipline,
                name: name,
                description: description
            },
            success: function (data) {
                $('#create-discipline').modal('hide');
                Swal.fire({
                    icon: 'success',
                    title: 'Thêm mới kỷ luật thành công',
                    showConfirmButton: false
                });
                setTimeout(function () {
                    location.replace("/admin/discipline");
                }, 1000);
            },
            error: function (xhr) {
                if (name) {
                    $('#error_name').html('');
                } else {
                    $('#error_name').html('Xin vui lòng nhập tên kỷ luật');
                }
            }
        });
    });

    $('input[name=name]').on('keydown ', function() {
        $('#error_name').html('');
    });
});
