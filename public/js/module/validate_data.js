export function isInputEmptyValue(listInput) {
    let isEmpty = false
    listInput.forEach(item => {
        if (!item.val()) {
            isEmpty = true
            $(item).addClass("is-invalid")
            $(item).next().html("<div style='color: red; font-size: 14px; margin-top: 10px'>Vui lòng không để trống</div>")
        }
    })
    return isEmpty
}

export function isSelectUnselectValue(listOption) {
    let isEmpty = false
    listOption.forEach(item => {
        if (item.val() === "un-check") {
            isEmpty = true
            $(item).parent().nextAll('.err-area').first().html("<div style='color: red; font-size: 14px; margin-top: 10px'>Vui lòng không để trống</div>")
        }
    })
    return isEmpty
}

// function to add error message when validation failed
export function addErrorToInput(listErr) {
    for (let errName in listErr) {
        let inputTag = $("[name='" + errName + "']")
        $(inputTag).addClass("is-invalid")
        $(inputTag).nextAll('.err-area').first().html("<div style='color: red; font-size: 14px; margin-top: 10px'>" + listErr[errName][0] + "</div>")
    }
}
