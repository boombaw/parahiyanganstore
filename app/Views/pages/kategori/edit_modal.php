<form class="update-kategori">
    <?= csrf_field() ?>
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="<?= $kategori->id ?>">
    <div class="modal-header no-bd">
        <h5 class="modal-title">
            <span class="fw-mediumbold">
                Update Kategori
            </span>
        </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="modal-body">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <input id="addName" name="kategori_name" type="text" class="form-control" placeholder="Masukkan Nama Kategori" value="<?= $kategori->name ?>">
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-footer no-bd">
        <button type="button" id="updateRowButton" class="btn btn-primary">Ubah</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
    </div>
</form>

<script>
    $(".update-kategori").on("keyup keypress", function(e) {
        var keyCode = e.keyCode || e.which;
        if (keyCode === 13) {
            e.preventDefault();
            $("#updateRowButton").prop("disabled", true);
            updateKategori();
            $("#updateRowButton").prop("disabled", false);
        }
    });

    $("#updateRowButton").on('click', function(e) {
        e.preventDefault();
        $("#updateRowButton").prop("disabled", true);
        updateKategori();
        $("#updateRowButton").prop("disabled", false);
    })


    function updateKategori() {
        var data = $(".update-kategori").serialize();
        $.ajax({
            url: baseURL + "/kategori/update",
            type: "PUT",
            data: data,
            dataType: "JSON",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data) {
                //if success close modal and reload ajax table
                if (!$.isEmptyObject(data.error)) {
                    let tag = $(".update-kategori input[name=kategori_name]");
                    tag.addClass("is-invalid");
                    tag.parent().addClass("has-error");
                    tag.first().next().text(data.error.kategori_name);
                } else {
                    $("#add-kategori")
                        .DataTable()
                        .ajax.reload();

                    let tag = $(".update-kategori input[name=kategori_name]");
                    tag.removeClass("is-invalid");
                    tag.parent().removeClass("has-error");
                    tag.first().next().text("");

                    $("#EditRowModal").modal("hide");
                    $("#EditRowModal").on("hidden.bs.modal", function(e) {
                        $(this)
                            .find("input,textarea,select")
                            .val("")
                            .end()
                            .find("input[type=checkbox], input[type=radio]")
                            .prop("checked", "")
                            .end();
                    });
                    $.notify({
                        icon: "fa fa-bell",
                        title: "Kategori",
                        message: data.message,
                    });
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert("Error adding / update data");
            },
        });
    }
</script>