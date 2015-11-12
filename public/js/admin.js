$(function() {
    $("#tags-table").DataTable({
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

    // Startup code
    $(function() {
        $("#uploads-table").DataTable();
    });
});

//# sourceMappingURL=admin.js.map
