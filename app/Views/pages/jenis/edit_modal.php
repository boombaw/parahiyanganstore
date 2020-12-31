<div class="modal-header no-bd">
    <h5 class="modal-title">
        <span class="fw-mediumbold">
            Update Jenis
        </span>
    </h5>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
<div class="modal-body">
    <form class="update-jenis">
        <?= csrf_field() ?>
        <input type="hidden" name="_method" value="PUT">
        <input type="hidden" name="id" value="<?= $jenis->id ?>">
        <div class="row">
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nama Kategori</label>
                    <select name="kategori" class="form-control">
                        <option selected disabled>-- Pilih Kategori --</option>
                        <?php foreach ($kategori->getResult() as $ke => $item) : ?>
                            <option value="<?= $item->id ?>" <?= $item->id == $jenis->parent ? 'selected' : '' ?>><?= $item->name ?></option>
                        <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback"></div>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <label>Nama Jenis</label>
                    <input id="addName" name="jenis_name" type="text" class="form-control" placeholder="Masukkan Nama Jenis" value="<?= $jenis->name ?>">
                    <div class="invalid-feedback"></div>
                </div>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer no-bd">
    <button type="submit" id="updateRowButton" class="btn btn-primary">Ubah</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
</div>
<script>
    $(".update-jenis").on("keypress", function(e) {
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
        var data = $(".update-jenis").serialize();
        $.ajax({
            url: baseURL + "/jenis/update",
            type: "PUT",
            data: data,
            dataType: "JSON",
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            },
            success: function(data) {
                //if success close modal and reload ajax table
                if (!$.isEmptyObject(data.error)) {

                    if (!$.isEmptyObject(data.error.kategori)) {
                        let select = $('.update-jenis select[name="kategori"]');
                        select.addClass("is-invalid");
                        select.parent().addClass("has-error");
                        select.first().next().text(data.error.kategori);
                    }
                    let tag = $(".update-jenis input[name=jenis_name]");
                    tag.addClass("is-invalid");
                    tag.parent().addClass("has-error");
                    tag.first().next().text(data.error.jenis_name);

                    clearModal("EditJenisModal")
                } else {
                    $("#add-jenis")
                        .DataTable()
                        .ajax.reload();

                    let select = $('.update-jenis select[name="kategori"]');
                    select.removeClass("is-invalid");
                    select.parent().removeClass("has-error");
                    select.first().next().text("");

                    let tag = $(".update-jenis input[name=jenis_name]");
                    tag.removeClass("is-invalid");
                    tag.parent().removeClass("has-error");
                    tag.first().next().text("");

                    clearModal('EditJenisModal', true);

                    $.notify({
                        icon: "fa fa-bell",
                        title: "Jenis",
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