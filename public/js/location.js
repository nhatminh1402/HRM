// Function to get all district when province change
function getAlllDistrictsByProvinceId(province_id) {
    $.ajax({
        url: "/api/districts",
        method: "get",
        data: {
            province_id: province_id
        },
        dataType: "json",
        success: function (respone) {
            let listDistrict = renderOptionTag(respone.districts)
            listDistrict = '<option value="un-check">CHỌN QUẬN/HUYỆN</option>' + listDistrict
            $("#district-select").html(listDistrict)
        }, error: function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Đã xảy ra lỗi',
                text: 'Vui lòng thử lại sau.',
                showConfirmButton: false
            });

            setTimeout(function () {
                location.reload();
            }, 3000);
        }
    })
}

// Function to render a html content contain option tag of district
function renderOptionTag(listData) {
    let html = ''
    listData.forEach((item) => {
        html += "<option value='" + item.id + "'>" + item.name + "</option>"
    });
    return html
}

$("#province-select").on("change", function () {
    if ($(this).val() !== 'un-check') {
        getAlllDistrictsByProvinceId($(this).val())
        $("#ward-select").html('<option value="un-check" disable>CHỌN PHƯỜNG/XÃ</option>')
    } else {
        $("#ward-select").html('<option value="un-check" disable>CHỌN QUẬN/HUYỆN</option>')
        $("#district-select").html('<option value="un-check" disable>CHỌN PHƯỜNG/XÃ</option>')
    }
})

$("#district-select").on("change", function () {
    getAlllWardByDistrictId($(this).val())
})

// Function to get all ward when district change
function getAlllWardByDistrictId(district_id) {
    $.ajax({
        url: "/api/wards",
        method: "get",
        data: {
            district_id: district_id
        },
        dataType: "json",
        success: function (respone) {
            let listward = renderOptionTag(respone.wards)
            $("#ward-select").html(listward)
        }, error: function (xhr, status, error) {
            Swal.fire({
                icon: 'error',
                title: 'Đã xảy ra lỗi',
                text: 'Vui lòng thử lại sau.',
                showConfirmButton: false
            });

            setTimeout(function () {
                location.reload();
            }, 3000);
        }
    })
}

