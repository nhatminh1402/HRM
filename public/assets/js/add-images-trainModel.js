Dropzone.options.dropzoneForm = {
    autoProcessQueue: false,
    acceptedFiles: ".png,.jpg,.gif,.bmp,.jpeg",
    init: function() {
        var submitButton = document.querySelector("#submit-all");
        myDropzone = this;

        submitButton.addEventListener('click', function() {
            myDropzone.processQueue();
        });
        this.on("complete", function() {
            if (this.getQueuedFiles().length == 0 && this.getUploadingFiles().length == 0) {
                var _this = this;
                _this.removeAllFiles();
            }
            load_images();
        });
    }
};

load_images();

function load_images() {
    $.ajax({
        url: "/user/images/fetch",
        dataType: 'json',
        success: function(response) {
            if (response.status === 'success') {
                var images = response.images;
                var html = '';
                for (var i = 0; i < images.length; i++) {
                    html += '<div class="col-md-2 mb-4 text-center">';
                    html += '<img src="' + images[i].url +
                        '" class="img-thumbnail" width="175" height="175" style="height: 175px;" />';
                    html += '<button type="button" class="btn btn-link remove_image" id="' + images[i]
                        .filename + '">Remove</button>';
                    html += '</div>';
                }
                $('#uploaded_image').html(html);
            }
        }
    });
}

$(document).on('click', '.remove_image', function() {
    var name = $(this).attr('id');
    $.ajax({
        url: "/user/images/delete",
        data: {
            name: name
        },
        success: function(data) {
            load_images();
        }
    })
});