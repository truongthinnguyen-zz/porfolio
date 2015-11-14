$(function() {
    /* Tags */
    $("#tags-table").DataTable({
    });

    /* Upload */
    $("#uploads-table").DataTable();

    /* Articles */
    $("#articles-table").DataTable({
        order: [[0, "desc"]]
    });

    /* Create article*/
    $("#publish_date").pickadate({
        format: "mmm-d-yyyy"
    });
    $("#publish_time").pickatime({
        format: "h:i A"
    });
    $("#tags").selectize({
        create: true
    });

    tinymce.init({
        selector : "textarea#content",
        plugins : ["advlist autolink lists link image charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste"],
        toolbar : "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image"
    });
});

// Confirm file delete
function delete_file(name) {
    $("#delete-file-name1").html(name);
    $("#delete-file-name2").val(name);
    $("#modal-file-delete").modal("show");
}

// Confirm folder delete
function delete_folder(name) {
    $("#delete-folder-name1").html(name);
    $("#delete-folder-name2").val(name);
    $("#modal-folder-delete").modal("show");
}

// Preview image
function preview_image(path) {
    $("#preview-image").attr("src", path);
    $("#modal-image-view").modal("show");
}