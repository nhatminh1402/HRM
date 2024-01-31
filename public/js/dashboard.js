// funtion to get a array random color
function getArrRandomColor(numberColor) {
    let arrColor = []

    for (let i = 0; i < numberColor; i++) {
        let x = Math.floor(Math.random() * 256);
        let y = Math.floor(Math.random() * 256);
        let z = Math.floor(Math.random() * 256);
        arrColor.push("rgb(" + x + "," + y + "," + z + ")")
    }

    return arrColor
}

// init year picker
$('#selectYearPickerEmployee').yearpicker({
    // Start Year
    startYear: 2023,
});


let currentDate = new Date();
let currentYear = currentDate.getFullYear();
$("#selectYearPickerEmployee").val(currentYear)


function renderEmployeeChart(dataSet) {
    // Biểu đồ biến động nhân sự
    var xValues = ["THÁNG 1", "THÁNG 2", "THÁNG 3", "THÁNG 4", "THÁNG 5", "THÁNG 6",
        "THÁNG 7", "THÁNG 8", "THÁNG 9", "THÁNG 10", "THÁNG 11", "THÁNG 12"]

    new Chart("chartEmployee", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                label: 'NHÂN SỰ ',
                fill: true,
                lineTension: 0,
                borderColor: "#ED6D85",
                data: dataSet,
            }]
        },
        options: {
            legend: {
                display: false
            },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        max: 50
                    }
                }],
            }
        }
    });
}

// ajax request to get a dataset employee
function drawEmployeeChart(statisticalYear) {
    $.ajax({
        type: "get",
        url: "/admin/statistics/employees",
        method: "get",
        dataType: "json",
        data: {
            year: statisticalYear
        },
        success: function (response) {
            var yValues = []

            response.forEach(function (item) {
                yValues.push(item.total);
            })

            //draw a chart
            renderEmployeeChart(yValues, statisticalYear)
        }, error: function (xhr, status, error) {
            window.location.reload();
        }
    });
}

//draw a chart with current year if this is the 1st load into the website
drawEmployeeChart(currentYear)

// ajax request to get a new dataset employee if user change year
$('#selectYearPickerEmployee').on("change", function () {
    drawEmployeeChart($(this).val())
});


// draw department chart
$.ajax({
    type: "get",
    url: "/admin/statistics/EmployeeEachDepartment",
    dataType: "json",
    success: function (response) {
        drawDepartmentChart(response)
    }, error: function (xhr, status, error) {
        window.location.reload();
    }
});

function drawDepartmentChart(response) {

    var xValues = [];
    var yValues = [];

    response.forEach(item => {
        xValues.push(item.name)
        yValues.push(item.total)
    })

    var barColors = getArrRandomColor(xValues.length)

    new Chart("chartDepartment", {
        type: "doughnut",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "DANH SÁCH PHÒNG BAN VÀ SỐ LƯỢNG NHÂN VIÊN"
            }
        }
    });
}


// draw project chart
$.ajax({
    type: "get",
    url: "/admin/statistics/EmployeeEachProject",
    dataType: "json",
    success: function (response) {
        drawProjectChart(response)
    }, error: function (xhr, status, error) {
        window.location.reload();
    }
});

function drawProjectChart(response) {

    var xValues = [];
    var yValues = [];

    response.forEach(item => {
        xValues.push(item.name)
        yValues.push(item.total)
    })

    console.log(xValues)

    var barColors = getArrRandomColor(xValues.length)

    new Chart("chartProject", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: { display: false },
            title: {
                display: true,
                text: "CÁC DỰ ÁN TRONG NĂM VÀ SỐ LƯỢNG NHÂN VIÊN MỖI DỰ ÁN"
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    }
                }]
            }
        }
    });
}
