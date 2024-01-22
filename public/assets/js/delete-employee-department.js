$(document).ready(function () {

    $('.js-example-basic-multiple-limit').select2({
        maximumSelectionLength: 10
    });

    
    $(".btn-delete").on("click", function (event) {
        event.preventDefault();
        var deleteUrl = $(this).attr("href");

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
                window.location.href = deleteUrl;
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

});
