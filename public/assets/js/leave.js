$(document).ready(function () {
    $("#btn-submit").on("click", function (event) {
        event.preventDefault();
        Swal.fire({
            title: "Bạn có chắc tạo và gửi email đến admin",
            text: "Bạn sẽ không thể hoàn tác hành động này !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Đồng ý tạo và gửi emai!",
        }).then((result) => {
            if (result.isConfirmed) {
                $("#submit-leave").submit();
            }
        });
    });

    $("#accept-leave").on("click", function (event) {
        event.preventDefault();
        Swal.fire({
            title: "Bạn có chắc duyệt đơn này?",
            text: "Bạn không thể hoàn tác hành động này !",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Duyệt!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = event.target.href;
            }
        });
    });

    $("#Non-accept-leave").on("click", function (event) {
        event.preventDefault();
        Swal.fire({
            title: "Bạn có chắc không duyệt đơn này?",
            text: "Bạn không thể hoàn tác hành động này!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Xác nhận!",
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = event.target.href;
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

function calculateNumberOfDays() {
    const startDate = new Date(document.getElementById("startDate").value);
    const endDate = new Date(document.getElementById("endDate").value);

    // Kiểm tra nếu ngày kết thúc nhỏ hơn ngày bắt đầu
    if (endDate < startDate) {
        $('#error_date').html('Phải sau ngày bắt đầu');
        document.getElementById("endDate").value = "";
        document.getElementById("numberDays").value = "";
        return;
    }
    const milliseconds = endDate - startDate;

    const numberOfDays = milliseconds / (1000 * 60 * 60 * 24);

    // Kiểm tra nếu số ngày nhỏ hơn 0
    if (numberOfDays < 0) {
        $('#error_date').html('Phải sau ngày bắt đầu')
        document.getElementById("endDate").value = "";
        document.getElementById("numberDays").value = "";
        return;
    }

    document.getElementById("numberDays").value = numberOfDays;
}

function calculateEndDate() {
    const startDate = new Date(document.getElementById("startDate").value);
    const numberOfDays = parseFloat(
        document.getElementById("numberDays").value
    );

    // Kiểm tra nếu số ngày nhỏ hơn hoặc bằng 0
    if (numberOfDays <= 0) {
        $('#error_num_date').html('Số ngày nghỉ không được âm')
        document.getElementById("endDate").value = "";
        return;
    }

    const endDate = new Date(
        startDate.getTime() + numberOfDays * 24 * 60 * 60 * 1000
    );

    const endDateInput = document.getElementById("endDate");
    endDateInput.valueAsDate = endDate;
}
