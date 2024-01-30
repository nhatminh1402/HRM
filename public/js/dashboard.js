// draw employee chart
$.ajax({
    type: "get",
    url: "/admin/statistics/employees",
    dataType: "json",
    success: function (response) {
        drawEmployeeChart(response)
    }, error: function (xhr, status, error) {
    }
});

function drawEmployeeChart(response) {
    // Biểu đồ biến động nhân sự
    var xValues = ["THÁNG 1", "THÁNG 2", "THÁNG 3", "THÁNG 4", "THÁNG 5", "THÁNG 6",
        "THÁNG 7", "THÁNG 8", "THÁNG 9", "THÁNG 10", "THÁNG 11", "THÁNG 12"]
    var yValues = []

    response.forEach(function (item) {
        yValues.push(item.total);
    })

    new Chart("chartEmployee", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                fill: false,
                lineTension: 0,
                borderColor: "#ED6D85",
                data: yValues
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
                        max: 30
                    }
                }],
            }
        }
    });
}